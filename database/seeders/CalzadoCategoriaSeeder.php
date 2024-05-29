<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalzadoCategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('calzado_categoria')->insert([
            [
                'calzado_id' => 1,
                'categoria_id' => 1
            ],
            [
                'calzado_id' => 2,
                'categoria_id' => 2
            ],
        ]);
    }
}
