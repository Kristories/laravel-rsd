<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default driver that will be used on requests.
    |
    | Supported: "array", "database"
    |
     */

    'driver'     => env('RSD_DRIVER', 'array'),

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    |
    | When using the "database" driver, you may specify the model we should use
    | to manage subdomains.
    |
     */
    'model'      => App\User::class,

    /*
    |--------------------------------------------------------------------------
    | Subdomains
    |--------------------------------------------------------------------------
    |
    | Reserved subdomains. When using the "array" driver.
    |
     */
    'subdomains' => [
        'dev',
        'staging',
        'private',
        'reserved',
        'status',
        'test',
    ],

];
