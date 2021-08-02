<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert([
            [
                'label' => 'Carro',
                'cod_fipe' => 1,
            ],
            [
                'label' => 'Moto',
                'cod_fipe' => 2,
            ],
            [
                'label' => 'Caminhão',
                'cod_fipe' => 3,
            ]
        ]);
    }
}
