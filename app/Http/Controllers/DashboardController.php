<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $workouts = $user->workouts->pluck('exercises')->map(function ($exercise) {
            return json_decode($exercise);
        })->flatten()->groupBy('exercise_id')->map(function ($item) {
            return [
                'name' => $item->pluck('name')[0],
                'max'  => $item->max('weight')
            ];
        });

        return Inertia::render('Private/Dashboard', [
            'workouts' => $workouts
        ]);
    }
}
