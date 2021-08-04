<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleOptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('vehicle_optionals')->insert(
            ['label' => 'Air bag', 'vehicle_type_id' => 1],
            ['label' => 'Alarme', 'vehicle_type_id' => 1],
            ['label' => 'Ar condicionado', 'vehicle_type_id' => 1],
            ['label' => 'Trava elétrica', 'vehicle_type_id' => 1],
            ['label' => 'Vidro elétrico', 'vehicle_type_id' => 1],
            ['label' => 'Som', 'vehicle_type_id' => 1],
            ['label' => 'Sensor de ré', 'vehicle_type_id' => 1],
            ['label' => 'Câmera de ré', 'vehicle_type_id' => 1],
            ['label' => 'Blindado', 'vehicle_type_id' => 1],
            ['label' => 'Direção hidráulica', 'vehicle_type_id' => 1],
            ['label' => 'Direção elétrica', 'vehicle_type_id' => 1],
        );
    }
}
