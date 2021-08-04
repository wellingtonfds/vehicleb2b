<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_colors')->insert(
            ['color' => 'preto'],
            ['color' => 'branco'],
            ['color' => 'prata'],
            ['color' => 'vermelho'],
            ['color' => 'cinza'],
            ['color' => 'azul'],
            ['color' => 'amarelo'],
            ['color' => 'verde'],
            ['color' => 'laranja'],
        );
    }
}
