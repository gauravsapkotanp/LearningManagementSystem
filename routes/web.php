<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Teacher;
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


Route::middleware('auth')->group(function () {

    Route::middleware('student')->group(function () {

        Route::get('student/home', [FrontEndController::class, 'notice'])->name('studentHome');
    });

    Route::middleware('teacher')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Student
        Route::get('student/{status}', [StudentController::class, 'index'])->name('student.index');
        Route::post('student/delete', [StudentController::class, 'delete'])->name('student.delete');
        Route::post('student/status', [StudentController::class, 'status'])->name('student.status');

        // Notice
        Route::resource('notice', NoticeController::class);
        Route::post('notice/delete', [NoticeController::class, 'delete'])->name('notice.delete');
    });

    Route::middleware('superadmin')->group(function () {
        // Teacher 
        Route::get('teacher/{status}', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('teacher/create/{status}', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('teacher/{id}/update', [TeacherController::class, 'update'])->name('teacher.update');
        Route::post('teacher/delete', [TeacherController::class, 'delete'])->name('teacher.delete');
        Route::post('teacher/status', [TeacherController::class, 'status'])->name('teacher.status');
    });
});

require __DIR__ . '/auth.php';
