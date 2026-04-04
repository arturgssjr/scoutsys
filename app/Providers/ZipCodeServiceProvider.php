<?php

namespace App\Providers;

use App\Services\ZipCode\Contracts\ZipCode;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ZipCodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ZipCode::class, function (Application $app) {
            $provider = $app['config']['zip-code.default'];

            return new $app['config']["zip-code.providers.$provider.class"](
                $app['config']["zip-code.providers.$provider.url"]
            );
        });
    }

    public function boot(): void
    {
        //
    }
}
