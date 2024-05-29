<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineaDeCarritoSeeder extends Seeder
{
    public function run()
    {
        DB::table('linea_de_carritos')->insert([
            [
                'cantidad' => 2,
                'importeParcial' => 199.98,
                'carrito_id' => 1,
                'calzado_id' => 1
            ],
            [
                'cantidad' => 1,
                'importeParcial' => 79.99,
                'carrito_id' => 2,
                'calzado_id' => 2
            ],
        ]);
    }
}
