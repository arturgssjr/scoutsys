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
        $this->app->bind(\scoutsys\Interfaces\PlayerRepository::class, \scoutsys\Repositories\PlayerRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\CoachRepository::class, \scoutsys\Repositories\CoachRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\StatusRepository::class, \scoutsys\Repositories\StatusRepositoryEloquent::class);
        $this->app->bind(\scoutsys\Interfaces\DetailsRepository::class, \scoutsys\Repositories\DetailsRepositoryEloquent::class);
        //:end-bindings:
    }
}
