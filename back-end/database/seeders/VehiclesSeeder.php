<?php

namespace Database\Seeders;

use App\Services\Vehicle\VehicleServiceInterface;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(VehicleServiceInterface $vehicleService)
    {
        $vehicleService->updateOrCreateFromAPI();
    }
}
