<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Models\Exercise;
use App\Models\Program;
use App\Models\Workout;

use Illuminate\Http\Request;
use Inertia\Response;

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
    public function store(StoreWorkoutRequest $request): Response
    {
        $user = $request->user();

        Workout::create([
            'exercises'  => json_encode($request->exercises),
            'date'       => $request->date,
            'program_id' => $request->program_id,
            'user_id'    => $user->id,
        ]);

        return Inertia::render('Dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Program $program): Response
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
                    'exercise_id' => $exercise->id,
                    'name'        => $exercise->name,
                    'weight'      => 0,
                    'rpe'         => 0,
                    'comment'     => ''
                ];
            });

            return Inertia::render('Workout', [
                'exercises' => $exercises,
                'programId' => $program->id,
                'date'      => $request->date
            ]);
        } else {
            $decoded = json_decode($existingWorkout['exercises'], true);

            $exercises = array_map(function ($exercise) {
                return [
                    'exercise_id' => $exercise['exercise_id'],
                    'name'        => Exercise::find($exercise['exercise_id'])->only('name')['name'],
                    'weight'      => $exercise['weight'] ?? 0,
                    'rpe'         => $exercise['rpe'] ?? 0,
                    'comment'     => $exercise['comment'] ?? ''
                ];
            }, $decoded);

            return Inertia::render('Workout', [
                'exercises' => $exercises,
                'workoutId' => $existingWorkout->id,
                'programId' => $program->id,
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
    public function update(UpdateWorkoutRequest $request, Workout $workout): Response
    {
        $request->validated();
        $workout->update(['exercises' => $request->exercises]);

        return Inertia::render('Dashboard');
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
