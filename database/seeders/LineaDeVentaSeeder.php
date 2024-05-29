<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineaDeVentaSeeder extends Seeder
{
    public function run()
    {
        DB::table('linea_de_ventas')->insert([
            [
                'cantidad' => 1,
                'importeParcial' => 99.99,
                'venta_id' => 1,
                'calzado_id' => 2
            ],
            [
                'cantidad' => 1,
                'importeParcial' => 149.99,
                'venta_id' => 1,
                'calzado_id' => 3
            ],
        ]);
    }
}
