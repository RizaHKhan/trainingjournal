<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Models\Exercise;
use App\Models\Program;
use App\Models\Workout;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkoutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Program $program)
    {
        if (!$request->date) {
            return Inertia::render('Dashboard');
        }

        $user = $request->user();

        $existingWorkout = Workout::where(
            [
                'program_id' => $program->id,
                'user_id'    => $user->id,
                'date'       => $request->date
            ]
        )->first();

        if (!$existingWorkout) {
            $exercises = $program->exercises->map(function ($exercise) {
                return [
                    'name'   => $exercise->name,
                    'weight' => 0,
                    'rpe'    => 0
                ];
            });

            return Inertia::render('Workout', [
                'exercises' => $exercises,
                'date'      => $request->date
            ]);
        } else {
            $decoded = json_decode($existingWorkout['exercises'], true);

            $exercises = array_map(function ($exercise) {
                return [
                    'name'   => Exercise::find($exercise['exercise_id'])->only('name')['name'],
                    'weight' => $exercise['weight'],
                    'rpe'    => $exercise['rpe']
                ];
            }, $decoded);

            return Inertia::render('Workout', [
                'exercises' => $exercises,
                'date'      => $request->date
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit(Workout $workout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkoutRequest  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
        //
    }
}
