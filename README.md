# File Encrypte Laravel Package

Welcome to the **File Encrypte Laravel Package Documentation**.This package provides encryption for file data to ensure its security and privacy.

---

## Features

- Seamless integration with Laravel for file encryption
- Ability to encrypt and decrypt files with ease.   
- Full support for encryption and decryption operations.
- Simple and structured error handling for file encryption.

---

# Getting Started

## Installation

You can install the package via Composer:

```bash
composer require codersgarden/fileencrypte:dev-main
```

## Requirements

- **PHP**: >=7.3
- **Laravel**: 8.x, 9.x, 10.x, 11.x
- **Dependencies**:
  - guzzlehttp/guzzle: ^7.0
  - "illuminate/http": "^7.0|^8.0|^9.0|^10.0|^11.0"

### Development Dependencies

- mockery/mockery: ^1.0
- orchestra/testbench: ^6.0
- phpunit/phpunit: ^9.0

---

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
    }
}
```

## Contribution Guide

We welcome contributions to this package! Follow these steps to contribute:

1. Fork the repository.
2. Create a feature branch for your changes.
3. Submit a pull request with detailed explanations of your updates.

For bug reports or feature requests, please open an issue in the repository.

---

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE.md) file for more details.

---

## Contact Us

For support or inquiries, feel free to contact us via [email](mailto:support@codersgarden.com) or create an issue on our GitHub repository.

---
