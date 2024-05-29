<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolSeeder::class,
            CalzadoSeeder::class,
            CategoriaSeeder::class,
            UserSeeder::class,
            VentaSeeder::class,
            CarritoSeeder::class,
            LineaDeCarritoSeeder::class,
            FavoriteSeeder::class,
            CalzadoCategoriaSeeder::class,
        ]);
    }
}
