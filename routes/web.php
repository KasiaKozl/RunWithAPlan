<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainigController;


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


Route::post('trainings', [App\Http\Controllers\TrainingController::class, 'store']);
Route::put('trainings/{training}', [App\Http\Controllers\TrainingController::class, 'update']);
Route::delete('trainings/{training}', [App\Http\Controllers\TrainingController::class, 'destroy']);


Auth::routes();
  
Route::middleware(['auth', 'is_coach:coach'])->group(function () {
  
    Route::get('/coachhome', [HomeController::class, 'coachHome'])->name('coachhome');
});
  

Route::middleware(['auth', 'is_coach:runner'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'runnerHome'])->name('home');
});

Route::middleware(['auth', 'is_coach:guest'])->group(function () {
  
    Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
});





