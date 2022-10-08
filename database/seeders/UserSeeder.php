<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'       => 'Riza Khan',
            'email'      => 'khanriza@gmail.com',
            'password'   => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
