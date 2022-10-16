<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Response
    {
        $user     = $request->user();
        $programs = Program::with('exercises')
            ->whereRelation('user', 'id', $user->id)
            ->get();

        return Inertia::render('Private/Program/Programs', [
            'programs' => $programs
        ]);
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
     * @param  \App\Http\Requests\StoreProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program): Response
    {
        $target    = Program::with(['exercises'])->where(['id' => $program->id])->first();
        $exercises = Exercise::all();

        return Inertia::render('Private/Program/EditProgram', [
            'program'   => $target,
            'exercises' => $exercises
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramRequest  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        $user = $request->user();
        $program->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        array_map(function ($exercise) use ($program, $user) {
            $id = $exercise['id'];
            if (!$program->exercises->contains($id)) {
                $program->exercises()->toggle([['exercise_id' => $id, 'user_id' => $user->id]]);
            }
        }, $request->exercises);

        // If request array doesn't have item, toggle it
        $requestExerciseIds = array_map(function ($exercise) {
            return $exercise['id'];
        }, $request->exercises);

        array_map(function ($exercise) use ($requestExerciseIds, $program) {
            $id = $exercise['id'];
            if (!in_array($id, $requestExerciseIds)) {
                $program->exercises()->toggle($id);
            }
        }, $program->exercises->toArray());

        return Redirect::route('programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program): Response
    {
        $program->delete();
        $programs = Program::with(['exercises'])->get();

        return Inertia::render('Private/Program/Programs', [
            'programs' => $programs
        ]);
    }
}
