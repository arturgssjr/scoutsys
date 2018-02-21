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
        $this->app->bind(\scoutsys\Interfaces\TeamRepository::class, \scoutsys\Repositories\TeamRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\StatusRepository::class, \scoutsys\Repositories\StatusRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\DetailRepository::class, \scoutsys\Repositories\DetailRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\CategoryRepository::class, \scoutsys\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\CategoryableRepository::class, \scoutsys\Repositories\CategoryableRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\StatusableRepository::class, \scoutsys\Repositories\StatusableRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\DetailableRepository::class, \scoutsys\Repositories\DetailableRepositoryEloquent::class);
        //:end-bindings:
    }
}
