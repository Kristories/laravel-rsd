# Laravel Reserved Subdomains

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kristories/laravel-rsd.svg?style=flat-square)](https://packagist.org/packages/kristories/laravel-rsd)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/kristories/laravel-rsd/master.svg?style=flat-square)](https://travis-ci.org/kristories/laravel-rsd)

Subdomain validator for Laravel.

## Requirements

This package requires Laravel 5.5 or higher.

## Installation

You can install this package via composer using this command :

```
composer require kristories/laravel-rsd
```

The package will automatically register itself.

Publish the configuration file :

```
php artisan vendor:publish --tag=config
```

## Usage

```php
// Route
Route::group(['domain' => '{account}.domain.tld'], function () {
    Route::middleware(['rsd'])->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });
    });
});

// Kernel
protected $routeMiddleware = [
    'rsd' => \Kristories\Rsd\Rsd::class,
];
```

Or

```php
// Route
Route::group(['domain' => '{account}.domain.tld'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

// Kernel
rotected $middleware = [
    \Kristories\Rsd\Rsd::class,
];
```

### Driver

#### Array

##### ENV

```
RSD_DRIVER=array
```

##### Config

```php
'subdomains' => [
    'dev',
    'staging',
    'private',
    'reserved',
    'status',
],
```

#### Database

##### ENV

```
RSD_DRIVER=database
```

##### Config

```php
'model' => App\YourModel::class
```

##### Model

```php
use Kristories\Rsd\ReservableTrait;
use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    use ReservableTrait;

    protected $reserved_column = 'name';
}
```

##### Extra scope

```php
use Kristories\Rsd\ReservableTrait;
use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    use ReservableTrait;

    protected $reserved_column = 'name';

    public function scopeReservedExtra($query)
    {
        return $query->where('active', true);
    }
}
```


## Contributing

Please see [CONTRIBUTING](https://github.com/kristories/laravel-rsd/blob/master/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](https://github.com/kristories/laravel-rsd/blob/master/LICENSE.md) for more information.
