<?php

namespace App\Providers;

use App\Services\Location\LocationService;
use App\Services\Location\LocationServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LocationServiceInterface::class,
            LocationService::class
        );
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
