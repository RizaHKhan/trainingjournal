<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercises')->insert([
            'name'        => 'Bench Press',
            'description' => 'Lay down and press it!',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercises')->insert([
            'name'        => 'Shoulder Press',
            'description' => 'Press it overhead',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercises')->insert([
            'name'        => 'Squat',
            'description' => 'At least parallel',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercises')->insert([
            'name'        => 'Deadlift',
            'description' => 'At least parallel',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercises')->insert([
            'name'        => 'Pullup',
            'description' => 'Chin to the bar',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('exercises')->insert([
            'name'        => 'Bentover Row',
            'description' => 'To the chest!',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
}
