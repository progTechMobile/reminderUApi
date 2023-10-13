<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RemindersController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('user', [UserController::class, 'index']);
    Route::post('user', [UserController::class, 'store']);
    Route::put('user/{$id}', [UserController::class, 'update']);
    Route::delete('user/{$id}', [UserController::class, 'destroy']);

    Route::get('Teacher', [TeacherController::class, 'index']);
    Route::post('Teacher', [TeacherController::class, 'store']);
    Route::put('Teacher/{$id}', [TeacherController::class, 'update']);
    Route::delete('Teacher/{$id}', [TeacherController::class, 'destroy']);

    Route::get('Subjects', [SubjectsController::class, 'index']);
    Route::post('Subjects', [SubjectsController::class, 'store']);
    Route::put('Subjects/{$id}', [SubjectsController::class, 'update']);
    Route::delete('Subjects/{$id}', [SubjectsController::class, 'destroy']);

    Route::get('Scores', [ScoresController::class, 'index']);
    Route::post('Scores', [ScoresController::class, 'store']);
    Route::put('Scores/{$id}', [ScoresController::class, 'update']);
    Route::delete('Scores/{$id}', [ScoresController::class, 'destroy']);

    Route::get('Schedules', [SchedulesController::class, 'index']);
    Route::post('Schedules', [SchedulesController::class, 'store']);
    Route::put('Schedules/{$id}', [SchedulesController::class, 'update']);
    Route::delete('Schedules/{$id}', [SchedulesController::class, 'destroy']);

    Route::get('Reminders', [RemindersController::class, 'index']);
    Route::post('Reminders', [RemindersController::class, 'store']);
    Route::put('Reminders/{$id}', [RemindersController::class, 'update']);
    Route::delete('Reminders/{$id}', [RemindersController::class, 'destroy']);
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/usuario', [UsersController::class, 'index'])->name('usuario');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
