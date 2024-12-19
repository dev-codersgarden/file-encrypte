<?php

namespace Codersgarden\FileEncrypt\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\FileEncrypt\Models\Download;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class FileManagementController extends Controller
{

    public function save($file, $model, $directory)
    {

        $imageName = Str::ulid() . '.' . $file->getClientOriginalExtension();
        $filePath = $directory . $imageName;

        // Encrypt and store the file
        Storage::disk('local')->put($filePath, Crypt::encrypt(file_get_contents($file->getRealPath())));

       
        $model->downloadable()->create([
            'ulid' => Str::ulid(),
            'file' => $filePath,
            'mimetype' => $file->getClientOriginalExtension(),
        ]);

        return $imageName;
    }
    public function stream(Request $request, $ulid)
    {  

        if (!$request->hasValidSignature()) {
            abort(403, 'Invalid or expired download link.');
        }

        
        $download = Download::where('ulid', $ulid)->first();

        if (!$download) {
            return abort(404);
        }
        $path = $download->file;

 
        $file = Crypt::decrypt(Storage::disk('local')->get($path));
       
        $filename = basename($download->file);

      
        return response()->stream(function () use ($file) {
            echo $file;
        }, 200, [
            'Content-Type' => Storage::mimeType($download->file),
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }


    public function getDownloadPath($ulid)
    {
        try {
            $download = Download::where('ulid', $ulid)->first();

            if (!$download) {
                 return false;
            }
            return  $this->getDownloadURL($download->ulid);
        
        } catch (\Exception $e) {
             Log::info($e->getMessage());
             return false;
        }
    }


    public function getDownloadURL($ulid, $validityMinutes = 5)
    {
        return URL::temporarySignedRoute(
            'download.stream',
            now()->addMinutes($validityMinutes),
            ['ulid' => $ulid]
        );
    }
}
