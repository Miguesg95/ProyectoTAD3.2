<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalzadoSeeder extends Seeder
{
    public function run()
    {
        DB::table('calzados')->insert([
            [
                'nombre' => 'Calzado Deportivo',
                'marca' => 'Nike',
                'stock' => 50,
                'descripcion' => 'Calzado cómodo para actividades deportivas',
                'precio' => 99.99
            ],
            [
                'nombre' => 'Calzado Formal',
                'marca' => 'Clarks',
                'stock' => 30,
                'descripcion' => 'Zapato elegante para ocasiones formales',
                'precio' => 149.99
            ],
        ]);
    }
}
