<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'rol_id' => '1',

            ],
            [
                'username' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'rol_id' => '2',
            ],

        ]);
    }
}
