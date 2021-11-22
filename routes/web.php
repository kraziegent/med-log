<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Admin\TraineeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('trainees')->group(function () {
        Route::get('', [TraineeController::class, 'index'])->name('trainees.index');
        Route::get('{trainee}', [TraineeController::class, 'show'])->name('trainees.show');
    });

    Route::prefix('modules')->group(function() {
        Route::get('', [ModuleController::class, 'index'])->name('modules.index');
        Route::get('{module}', [ModuleController::class, 'show'])->name('modules.show');
    });
});
