<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array('workouts' => [
            [
                'date'       => '2021/08/01',
                'program_id' => 1,
                'user_id'    => 1,
                'exercises'  => [
                    [
                        'excerise_id' => 1,
                        'weight'      => 100,
                        'rpe'         => 4
                    ],
                    [
                        'excerise_id' => 3,
                        'weight'      => 200,
                        'rpe'         => 4
                    ],
                    [
                        'excerise_id' => 4,
                        'weight'      => 300,
                        'rpe'         => 4
                    ]
                ]
            ],
            [
                'date'       => '2021/08/02',
                'program_id' => 2,
                'user_id'    => 1,
                'exercises'  => [
                    [
                        'excerise_id' => 2,
                        'weight'      => 100,
                        'rpe'         => 4
                    ],
                    [
                        'excerise_id' => 3,
                        'weight'      => 200,
                        'rpe'         => 4
                    ],
                    [
                        'excerise_id' => 4,
                        'weight'      => 300,
                        'rpe'         => 4
                    ]
                ]
            ]
        ]);

        foreach ($arr['workouts'] as $item) {
            DB::table('workouts')->insert([
                'user_id'    => $item['user_id'],
                'program_id' => $item['program_id'],
                'exercises'       => json_encode($item['exercises']),
                'date'       => $item['date'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
