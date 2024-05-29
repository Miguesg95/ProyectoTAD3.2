<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    public function run()
    {
        DB::table('ventas')->insert([
            [
                'importeTotal' => 249.98,
                'estado' => 'Completed',
                'user_id' => 1
            ],
            [
                'importeTotal' => 99.99,
                'estado' => 'Pending',
                'user_id' => 2
            ],
        ]);
    }
}
