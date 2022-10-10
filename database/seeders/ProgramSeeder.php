<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'name'        => 'Day 1',
            'description' => 'Day 1 Description',
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Day 2',
            'description' => 'Day 2 Description',
            'user_id'     => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Khadija Program 1',
            'description' => 'Khadija 1 Description',
            'user_id'     => 2,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Khadija Program 2',
            'description' => 'Khadija 2 Description',
            'user_id'     => 2,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Hamza Program 1',
            'description' => 'Hamza 1 Description',
            'user_id'     => 3,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Hamza Program 2',
            'description' => 'Hamza 2 Description',
            'user_id'     => 3,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
}
