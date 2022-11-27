<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:runner')->name('home');
Route::get('/coachhome', [App\Http\Controllers\CoachHomeController::class, 'index'])->middleware('role:coach')->name('coachhome');

Route::post('/forms', [App\Http\Controllers\FormController::class, 'store']);

Route::get('/trainings', [App\Http\Controllers\TrainingController::class, 'show']);

