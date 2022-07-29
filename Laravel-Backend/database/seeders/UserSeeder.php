<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thushara',
            'email' => 'thushara@gmail.com',
            'password' => Hash::make('pass'),
        ]);

        DB::table('users')->insert([
            'name' => 'Thushara2',
            'email' => 'thushara2@gmail.com',
            'password' => Hash::make('pass'),
        ]);
    }
}
