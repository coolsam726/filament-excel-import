# Easy imports and exports in FilamentPHP using laravel-excel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coolsam/excel.svg?style=flat-square)](https://packagist.org/packages/coolsam/excel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/coolsam726/excel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/coolsam726/excel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/coolsam726/excel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/coolsam726/excel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/coolsam/excel.svg?style=flat-square)](https://packagist.org/packages/coolsam/excel)



This plugin provides user-friendly Filament actions to enable you create data imports and exports using `maatwebsite/excel` at the click of a button.

## Installation

You can install the package via composer:

```bash
composer require coolsam/excel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="coolsam-excel-config"
```


This is the contents of the published config file:

```php
return [
    'accepted_mimes' => [
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/csv',
        'text/plain',
        'csv',
        'txt',
    ],
    'temporary_files' => [
        'disk' => 'local',
        'directory' => 'coolsam-excel',
    ],
];
```

# Usage

## Imports:
The package provides two types of Actions for importing records: Page Action and Table Action.
### Using Page Actions in the List Page:
Add the following import action in your resource list page, e.g ListUsers
```php
    use Coolsam\FilamentExcel\Actions\ImportAction;
    use Coolsam\FilamentExcel\Actions\ImportField;
    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make('users')->fields([
                ImportField::make('name')->required(),
                ImportField::make('email')->required(),
            ]),
            ... ,// Other Actions
        ];
    }
```
### Using the table Action in your resource Class:
Chain the following into your $table variable in the Resource class.
This is also useful in case you would like to import child records in a relation manager class.
Note that the Action import part is different.
```php
use Coolsam\FilamentExcel\Actions\ImportField;
use Coolsam\FilamentExcel\Actions\Tables\ImportAction;

    $table->headerActions([
        ImportAction::make('import users')
            ->fields([
                ImportField::make('name')->required(),
                ImportField::make('email')->required(),
            ])->uniqueField('email')
            ->createRecordUsing(fn($data) => User::updateOrCreate(
                ['email' => $data['email']],
                $data
            ))
    ])
```

### Unique field:
In case you would like to skip some records which already exist in the DB, you will have to specify a unique field to check for checking existin fields.
```php
    $table->headerActions([
        ImportAction::make('import users')
            ->fields([
                ImportField::make('name')->required(),
                ImportField::make('email')->required(),
            ])->uniqueField('email')
            ->createRecordUsing(fn($data) => User::updateOrCreate(
                ['email' => $data['email']],
                $data
            ))
    ])
```

### Manually handle the record creation process:
You probably love to be in control, and would like to create the record on your own, given the data. Here is how:
```php
    $table->headerActions([
        ImportAction::make('import users')
            ->fields([
                ImportField::make('name')->required(),
                ImportField::make('email')->required(),
            ])->createRecordUsing(fn($data) => User::updateOrCreate(
                ['email' => $data['email']],
                $data
            ))
    ])
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

- [Sam Maosa](https://github.com/coolsam726)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
