<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    public function run()
    {
        DB::table('favorites')->insert([
            [
                'user_id' => 1,
                'calzado_id' => 1
            ],
            [
                'user_id' => 2,
                'calzado_id' => 2
            ],
        ]);
    }
}
