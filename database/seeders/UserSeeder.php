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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'Jon',
            'lastname'  => 'Doe',
            'username' => 'JonDoe',
            'email'     => 'jondoe@gmail.com',
            'address' => 'jondoe 3',
            'city' => 'New York',
            'password' => Hash::make('qwerty123'),
            'remember_token' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'firstname' => 'Jane',
            'lastname'  => 'Doe',
            'username' => 'JaneDoe',
            'email'     => 'janedoe@gmail.com',
            'address' => 'janedoe 3',
            'city' => 'New York',
            'password' => Hash::make('qwerty123'),
            'remember_token' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
