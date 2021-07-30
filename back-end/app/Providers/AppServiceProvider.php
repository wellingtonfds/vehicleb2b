<?php

namespace App\Providers;

use App\Services\Car\CarService;
use App\Services\Location\LocationService;
use App\Services\Location\LocationServiceInterface;
use App\Services\Vehicle\Api\VehicleApiProxy;
use App\Services\Vehicle\Api\VehicleApiProxyInterface;
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
            LocationServiceInterface::class,
            LocationService::class
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
