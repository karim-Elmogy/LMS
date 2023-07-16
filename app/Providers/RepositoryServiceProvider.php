<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\Api\AuthInterfaces',
            'App\Http\Repositories\Api\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Api\ForgotInterfaces',
            'App\Http\Repositories\Api\ForgotRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
