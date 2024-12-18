<?php

namespace Codersgarden\FileEncrypte\Controller;

use App\Http\Controllers\Controller;
use Codersgarden\encrept\Models\Download;

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
            'minetype' => $file->getClientOriginalExtension(),
        ]);

        return $imageName;
    }
    public function stream($ulid)
    {
        $download = Download::where('ulid', $ulid)->first();
        if (!$download) {
            return abort(404);
        }

        $file = Crypt::decrypt(Storage::disk('local')->get($path));
        $filename = basename($download->file);

        return response()->stream(function () use ($file) {
            echo $file;
        }, 200, [
            'Content-Type' => Storage::mimeType($download->file),
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }


    public function getDownloadPath(Request $request)
    {
        try {
            $download = Download::where('ulid', $request->ulid)->first();

            if (!$download) {
                return response()->json([
                    'status' => false,
                    'message' => trans('messages.download.not_found')
                ]);
            }
            return response()->json([
                'status' => true,
                'path' => $this->getDownloadURL($download->ulid)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
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
