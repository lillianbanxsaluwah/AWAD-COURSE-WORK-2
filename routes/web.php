<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Dashboard;
use App\Models\Teacher;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //student
    Route::get('/Student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::delete('/student/{id}/destroy', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::put('/student/{id}/update', [StudentController::class, 'update'])->name('student.update');

    //teacher
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teacher.update');

    //level
    Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
    Route::post('/level/store', [LevelController::class, 'store'])->name('level.store');
    Route::get('level/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::delete('/level/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
    Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');

});
