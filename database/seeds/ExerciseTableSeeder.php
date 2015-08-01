<?php

use Illuminate\Database\Seeder;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('exercises')->delete();

      $exercises = array(
      	['id' => 1, 'name'=>'Exercise 1', 'slug'=>'exercise-1', 'description'=>'', 'user_id'=>1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      	['id' => 2, 'name'=>'Exercise 2', 'slug'=>'exercise-2', 'description'=>'', 'user_id'=>1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      	['id' => 3, 'name'=>'Exercise 3', 'slug'=>'exercise-3', 'description'=>'', 'user_id'=>1, 'created_at' => new DateTime, 'updated_at' => new DateTime]
      );

      DB::table('exercises')->insert($exercises);
    }
}
