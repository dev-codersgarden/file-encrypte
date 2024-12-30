# File Encrypte Laravel Package

Welcome to the **File Encrypte Laravel Package Documentation**.This package provides encryption for file data to ensure its security and privacy.

## Features

- Seamless integration with Laravel for file encryption
- Full support for encryption and decryption operations.
- Handles file storage and retrieval using Laravel's file storage system.

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

**Save a File:**

- Required fields: `file`, `model`, `path-to-directory`.

```php
$fileManagement = new FileManagementController();

$directory = 'uploads/files/'; // Customize the directory as needed
$savedFileName = $fileManagement->save($file, $user, $directory);
```

This function will return the file path, so you can store it in your database.

One thing to note is that this function will store the file in the storage folder with encryption, and you will not be able to see it in the public folder.

---

**Get Download Path:**

- Required fields: `download-ulid`.

you can get this ulid using relationship in model ex: `$user->downloadable->ulid`

than call this method in controller 

```php
$fileManagement = new FileManagementController();
$response = $fileManagement->getDownloadPath($ulid);
```

This will return the URL to stream or download the file, which will expire after 5 minutes.

---

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
