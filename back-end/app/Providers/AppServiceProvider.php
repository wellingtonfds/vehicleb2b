<?php

namespace App\Providers;

use App\Services\Car\CarService;
use App\Services\Locations\LocationServices;
use App\Services\Locations\LocationServicesInterface;
use CarServiceInterface;
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
            LocationServicesInterface::class,
            LocationServices::class
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
