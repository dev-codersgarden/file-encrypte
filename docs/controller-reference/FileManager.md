# FileManagementController Documentation

The `FileEncrypted` manages file encryption, storage, and retrieval using Laravel's file storage system and encryption utilities.

---

## Table of Contents

1. [Using the File Encryption Package](#using-the-file-encrypted-package)
2. [Save a File](#save-a-file)
3. [Get Download Path by ULID](#getDownloadPath-by-ulid)

---

## Using the FileEncrypted Package

To use the FileEncrypted package, start by adding the following method to the model(Ex: User Model):

```php

use Codersgarden\FileEncrypt\Models\Download;

 public function downloadable()
{
    return $this->morphOne(Download::class, 'downloadable');
}
```

---

### save a file

```php

        $user = new User();
        $user->name = 'anc';
        $user->email = 'abc@example.com';
        $user->password = bcrypt('password');
        $user->save();

        //$user means Model name

         $file = $request->file('file');
        $filemanagement = new FileManagementController();

        // Define the directory where the file will be saved
        $directory = 'uploads/files/'; // Customize the directory as needed

        // Call the save method
        $savedFileName = $filemanagement->save($file, $user, $directory);

        // Optionally store the file name or other info in the user model
        $user->file = $savedFileName;
         $user->save();

```

**Description:**

- Required fields: `file`, `user`, `directory`.

### Get Download Path by ULID

```php
$ulid = '01JEDM0EMWTEBGH1V7A9RM3QBB'; 
// Example ID
$response = $FileManagementController->getDownloadPath($ulid);
```

**Description:**

- Retrieves the download path of a file using the specified ULID.

---

## Example Usage in a Controller

Below is a complete example demonstrating how to use the `FileManagementController` class within a Laravel.

```php
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


    public function index(Request $request)
    {
        // 1. save a file

         $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin2@yopmail.com';
        $user->password = bcrypt('password');

         $file = $request->file('file');
        $filemanagement = new FileManagementController();

        // Define the directory where the file will be saved
        $directory = 'uploads/files/'; // Customize the directory as needed

        // Call the save method
        $savedFileName = $filemanagement->save($file, $user, $directory);

        // Optionally store the file name or other info in the user model
        $user->file = $savedFileName;
         $user->save();


        // 2. getDownloadPath

           $ulid = '01JEDM0EMWTEBGH1V7A9RM3QBB';
        $response = $this->filemanagement->getDownloadPath($ulid);
        dd($response);


        //Redirect to the response URL to stream a file.

    }



}
```
