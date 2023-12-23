<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);
        $taskIds = [3,9,12,17];
        for($i = 0; $i < 12; $i++){
            DB::table('comment')->insert([
                'task_id' => $taskIds[rand(0,3)],
                'user_id' => 1,
                // 'title' => $faker->sentence(2),
                'body' => $faker->text(),
            ]);
        }
    }
}
