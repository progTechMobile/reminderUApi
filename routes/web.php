<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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

    Route::get('teacher', [TeacherController::class, 'index']);
    Route::post('teacher', [TeacherController::class, 'store']);
    Route::put('teacher/{$id}', [TeacherController::class, 'update']);
    Route::delete('teacher/{$id}', [TeacherController::class, 'destroy']);

    Route::get('subjects', [SubjectsController::class, 'index']);
    Route::post('subjects', [SubjectsController::class, 'store']);
    Route::put('subjects/{$id}', [SubjectsController::class, 'update']);
    Route::delete('subjects/{$id}', [SubjectsController::class, 'destroy']);

    Route::get('scores', [ScoresController::class, 'index']);
    Route::post('scores', [ScoresController::class, 'store']);
    Route::put('scores/{$id}', [ScoresController::class, 'update']);
    Route::delete('scores/{$id}', [ScoresController::class, 'destroy']);

    Route::get('schedules', [SchedulesController::class, 'index']);
    Route::post('schedules', [SchedulesController::class, 'store']);
    Route::put('schedules/{$id}', [SchedulesController::class, 'update']);
    Route::delete('schedules/{$id}', [SchedulesController::class, 'destroy']);

    Route::get('reminders', [RemindersController::class, 'index']);
    Route::post('reminders', [RemindersController::class, 'store']);
    Route::put('reminders/{$id}', [RemindersController::class, 'update']);
    Route::delete('reminders/{$id}', [RemindersController::class, 'destroy']);
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/usuario', [UsersController::class, 'index'])->name('usuario');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
