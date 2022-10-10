<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
    Route::get('/programs/{program}', [ProgramController::class, 'edit'])->name('editProgram');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('updateProgram');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('deleteProgram');

    Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises');

    Route::get('/workout/{program}', [WorkoutController::class, 'show'])->name('workout');
    Route::post('/workout', [WorkoutController::class, 'store'])->name('createWorkout');
    Route::put('/workout/{workout}', [WorkoutController::class, 'update'])->name('updateWorkout');
});


require __DIR__ . '/auth.php';
