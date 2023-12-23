<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_column')->insert([
            'column_name' => 'To Do',
            'order'  => 1
        ]);
        DB::table('task_column')->insert([
            'column_name' => 'In Progress',
            'order'  => 2
        ]);
        DB::table('task_column')->insert([
            'column_name' => 'Code Review',
            'order'  => 3
        ]);
        DB::table('task_column')->insert([
            'column_name' => 'Done',
            'order'  => 4
        ]);
       
    }
}
