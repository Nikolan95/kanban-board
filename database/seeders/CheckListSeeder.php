<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class CheckListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);
        $taskIds = [2,6,12,15];
        for($i = 0; $i < 12; $i++){
            DB::table('check_list')->insert([
                'task_id' => $taskIds[rand(0,3)],
                'title' => $faker->sentence(2),
                'completed' => rand(0,1),
            ]);
        }
    }
}
