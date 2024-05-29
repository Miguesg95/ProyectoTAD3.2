<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarritoSeeder extends Seeder
{
    public function run()
    {
        DB::table('carritos')->insert([
            [
                'importeTotal' => 199.98,
                'user_id' => 1
            ],
            [
                'importeTotal' => 79.99,
                'user_id' => 2
            ],
        ]);
    }
}
