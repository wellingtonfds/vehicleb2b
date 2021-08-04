<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(VehicleTypeSeed::class);
        $this->call(VehiclesSeeder::class);
        $this->call(VehicleOptionalSeeder::class);
        $this->call(VehicleColorSeeder::class);
    }
}
