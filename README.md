# File Encrypte Laravel Package

Welcome to the **File Encrypte Laravel Package Documentation**.This package provides encryption for file data to ensure its security and privacy.

---

## Features

- Seamless integration with Laravel for file encryption
- Ability to encrypt and decrypt files with ease.   
- Full support for encryption and decryption operations.
- Simple and structured error handling for file encryption.

---

## Documentation Index

# Getting Started

## Description
This Laravel package provides file encryption and management features, allowing you to securely store, retrieve, and serve encrypted files. It supports temporary signed download URLs for secure file access.

## Installation

You can install the package via Composer:

```bash
composer require codersgarden/fileencrypte:dev-main
```

```php
'providers' => [
    // Other service providers...
    Codersgarden\FileEncrypt\FileEncryptServiceProvider::class
];
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

### Controller Reference


- [Getting Started](docs/controller-reference/FileManager.md)  
  Step-by-step instructions on how to use the controller for file management.
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
