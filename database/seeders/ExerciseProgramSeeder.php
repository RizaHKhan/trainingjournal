<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExerciseProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercise_program')->insert([
            'program_id'  => 1,
            'exercise_id' => 1,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercise_program')->insert([
            'program_id'  => 1,
            'exercise_id' => 3,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercise_program')->insert([
            'program_id'  => 1,
            'exercise_id' => 4,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercise_program')->insert([
            'program_id'  => 2,
            'exercise_id' => 2,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercise_program')->insert([
            'program_id'  => 2,
            'exercise_id' => 3,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercise_program')->insert([
            'program_id'  => 2,
            'exercise_id' => 4,
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
}
