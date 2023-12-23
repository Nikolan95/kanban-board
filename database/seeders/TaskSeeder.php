<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);
        for($i = 0; $i < 6; $i++){
            DB::table('task')->insert([
                'task_column_id' => 1,
                'created_user_id' => rand(1,2),
                'joined_user_id' => rand(1,2),
                'color_mark' => $this->random_color(),
                'title' => $faker->sentence(2),
                'label' => $faker->sentence(1),
                'description' => $faker->text(1500),
                'priority' => $i,
            ]);
        }

        for($i = 0; $i < 4; $i++){
            DB::table('task')->insert([
                'task_column_id' => 2,
                'created_user_id' => rand(1,2),
                'joined_user_id' => rand(1,2),
                'color_mark' => $this->random_color(),
                'title' => $faker->sentence(2),
                'label' => $faker->sentence(1),
                'description' => $faker->text(1500),
                'priority' => $i,
            ]);
        }

        for($i = 0; $i < 3; $i++){
            DB::table('task')->insert([
                'task_column_id' => 3,
                'created_user_id' => rand(1,2),
                'joined_user_id' => rand(1,2),
                'color_mark' => $this->random_color(),
                'title' => $faker->sentence(2),
                'label' => $faker->sentence(1),
                'description' => $faker->text(1500),
                'priority' => $i,
            ]);
        }

        for($i = 0; $i < 7; $i++){
            DB::table('task')->insert([
                'task_column_id' => 4,
                'created_user_id' => rand(1,2),
                'joined_user_id' => rand(1,2),
                'color_mark' => $this->random_color(),
                'title' => $faker->sentence(2),
                'label' => $faker->sentence(1),
                'description' => $faker->text(1500),
                'priority' => $i,
            ]);
        }
        
    }

    private function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    private function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }
}
