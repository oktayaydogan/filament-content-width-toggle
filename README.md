# This is my package filament-content-width-toggle

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oktayaydogan/filament-content-width-toggle.svg?style=flat-square)](https://packagist.org/packages/oktayaydogan/filament-content-width-toggle)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oktayaydogan/filament-content-width-toggle/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oktayaydogan/filament-content-width-toggle/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oktayaydogan/filament-content-width-toggle/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oktayaydogan/filament-content-width-toggle/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oktayaydogan/filament-content-width-toggle.svg?style=flat-square)](https://packagist.org/packages/oktayaydogan/filament-content-width-toggle)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require oktayaydogan/filament-content-width-toggle
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-content-width-toggle-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-content-width-toggle-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-content-width-toggle-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentContentWidthToggle = new Oktayaydogan\FilamentContentWidthToggle();
echo $filamentContentWidthToggle->echoPhrase('Hello, Oktayaydogan!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oktay Aydoğan](https://github.com/oktayaydogan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
