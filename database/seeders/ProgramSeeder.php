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
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        DB::table('programs')->insert([
            'name'        => 'Day 2',
            'description' => 'Day 2 Description',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
}
