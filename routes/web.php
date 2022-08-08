<?php

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

Route::redirect('/','/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::post('/process',[\App\Http\Controllers\ProcessController::class,'store'])->name('process.store');
    Route::post('/risk',[\App\Http\Controllers\RiskController::class,'store'])->name('risk.store');
    Route::delete('/risk/{risk}',[\App\Http\Controllers\RiskController::class,'destroy'])->name('risk.destroy');

    Route::get('/schedule',[\App\Http\Controllers\ScheduleController::class,'index'])->name('schedule.index');

    Route::get('/contingency',[\App\Http\Controllers\ContingencyController::class,'index'])->name('contingency.index');
    Route::post('/contingency',[\App\Http\Controllers\ContingencyController::class,'store'])->name('contingency.store');

});
