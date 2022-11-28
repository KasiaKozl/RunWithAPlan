<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;


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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/coachhome', [App\Http\Controllers\CoachHomeController::class, 'index'])->name('coachhome');

Route::post('trainings', [App\Http\Controllers\TrainingController::class, 'store']);
Route::put('trainings/{training}', [App\Http\Controllers\TrainingController::class, 'update']);
Route::delete('trainings/{training}', [App\Http\Controllers\TrainingController::class, 'destroy']);






