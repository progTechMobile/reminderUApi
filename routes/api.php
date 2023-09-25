<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\RemindersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user',[UserController::class, 'index']);
Route::post('user',[UserController::class, 'store']);
Route::put('user/{$id}',[UserController::class, 'update']);
Route::delete('user/{$id}',[UserController::class, 'destroy']);

Route::get('Teacher',[TeacherController::class, 'index']);
Route::post('Teacher',[TeacherController::class, 'store']);
Route::put('Teacher/{$id}',[TeacherController::class, 'update']);
Route::delete('Teacher/{$id}',[TeacherController::class, 'destroy']);

Route::get('Subjects',[SubjectsController::class, 'index']);
Route::post('Subjects',[SubjectsController::class, 'store']);
Route::put('Subjects/{$id}',[SubjectsController::class, 'update']);
Route::delete('Subjects/{$id}',[SubjectsController::class, 'destroy']);

Route::get('Scores',[ScoresController::class, 'index']);
Route::post('Scores',[ScoresController::class, 'store']);
Route::put('Scores/{$id}',[ScoresController::class, 'update']);
Route::delete('Scores/{$id}',[ScoresController::class, 'destroy']);

Route::get('Schedules',[SchedulesController::class, 'index']);
Route::post('Schedules',[SchedulesController::class, 'store']);
Route::put('Schedules/{$id}',[SchedulesController::class, 'update']);
Route::delete('Schedules/{$id}',[SchedulesController::class, 'destroy']);

Route::get('Reminders',[RemindersController::class, 'index']);
Route::post('Reminders',[RemindersController::class, 'store']);
Route::put('Reminders/{$id}',[RemindersController::class, 'update']);
Route::delete('Reminders/{$id}',[RemindersController::class, 'destroy']);




