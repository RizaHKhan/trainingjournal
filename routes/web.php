<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');

    Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises');

    Route::post('/workout/{program}', [WorkoutController::class, 'show'])->name('workout');
});


require __DIR__ . '/auth.php';
