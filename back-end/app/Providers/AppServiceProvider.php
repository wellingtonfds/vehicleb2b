<?php

namespace App\Providers;

use App\Services\Location\LocationService;
use App\Services\Location\LocationServiceInterface;
use App\Services\Plan\PlanService;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Services\Vehicle\VehicleService;
use App\Services\Vehicle\VehicleServiceInterface;
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
        $this->app->bind(
            VehicleServiceInterface::class,
            VehicleService::class
        );
        $this->app->bind(
            PlanServiceInterface::class,
            PlanService::class
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
            Passport::routes(null, ['prefix' => 'api/oauth']);
        }
    }
}
