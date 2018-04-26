<?php

namespace Kristories\Rsd\Tests;

use Kristories\Rsd\Rsd;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Kristories\Rsd\RsdServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getEnvironmentSetUp($app)
    {
        $app->make(Kernel::class)->prependMiddleware(Rsd::class);

        $app['config']->set('app.url', 'http://test.localhost');
        $app['router']->group(['domain' => '{subdomain}.localhost'], function (Router $router) {
            $router->get('/', function () {
                return 'hello';
            });
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            RsdServiceProvider::class,
        ];
    }
}
