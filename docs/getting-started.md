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


