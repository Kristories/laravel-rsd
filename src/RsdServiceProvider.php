<?php

namespace Kristories\Rsd;

use Illuminate\Support\ServiceProvider;

class RsdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/reserved-subdomains.php' => config_path('reserved-subdomains.php'),
        ], 'config');
    }
}
