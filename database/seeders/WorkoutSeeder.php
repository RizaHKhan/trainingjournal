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
                'date'       => '2022/10/09',
                'program_id' => 1,
                'user_id'    => 1,
                'exercises'  => [
                    [
                        'exercise_id' => 1,
                        'name'    => 'Bench Press',
                        'weight'      => 100,
                        'rpe'         => 4,
                        'comment'     => 'Things went well, but were difficult'
                    ],
                    [
                        'exercise_id' => 3,
                        'name'    => 'Squat',
                        'weight'      => 200,
                        'rpe'         => 4,
                        'comment'     => ''
                    ],
                    [
                        'exercise_id' => 4,
                        'name'    => 'Deadlift',
                        'weight'      => 300,
                        'rpe'         => 4,
                        'comment'     => 'Difficult, could not get underneath it'
                    ]
                ]
            ],
            [
                'date'       => '2022/10/10',
                'program_id' => 2,
                'user_id'    => 1,
                'exercises'  => [
                    [
                        'exercise_id' => 2,
                        'name'    => 'Shoulder Press',
                        'weight'      => 100,
                        'rpe'         => 4,
                        'comment'     => 'Some other stuff was distracting me'
                    ],
                    [
                        'exercise_id' => 3,
                        'name'    => 'Squat',
                        'weight'      => 205,
                        'rpe'         => 4,
                        'comment'     => ''
                    ],
                    [
                        'exercise_id' => 4,
                        'name'    => 'Deadlift',
                        'weight'      => 300,
                        'rpe'         => 4,
                        'comment'     => 'It was difficult and I had some pain'
                    ]
                ]
            ]
        ]);

        foreach ($arr['workouts'] as $item) {
            DB::table('workouts')->insert([
                'user_id'    => $item['user_id'],
                'program_id' => $item['program_id'],
                'exercises'  => json_encode($item['exercises']),
                'date'       => $item['date'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
