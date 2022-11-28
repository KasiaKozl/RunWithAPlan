<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//otro ejemplo
//Route::get('/user/{id}', function ($id) {
  //  return new UserResource(User::findOrFail($id));
//});

Route::resource('roles', RoleController::class); 
Route::resource('quotes', QuoteController::class); 
Route::resource('plannings', PlanningController::class);
Route::resource('forms', FormController::class); 
Route::resource('users', UserController::class);  
//Route::resource('trainings', TrainingController::class);  

