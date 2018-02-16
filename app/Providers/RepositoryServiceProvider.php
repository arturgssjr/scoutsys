<?php

namespace scoutsys\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\scoutsys\Interfaces\UserRepository::class, \scoutsys\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\ProfileRepository::class, \scoutsys\Repositories\ProfileRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\TeamRepository::class, \scoutsys\Repositories\TeamRepositoryEloquent::class);
        //:end-bindings:
    }
}
