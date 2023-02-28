<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function() {
    return redirect(route('dashboard'));
});

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])
        ->name('dashboard');

    //STAFF MANAGEMENT ROUTES
    Route::prefix('/staff')->group(function () {

        Route::get('/', [RegisteredUserController::class, 'index'])
            ->name('staff.all');

        Route::get('/view/{id}', [RegisteredUserController::class, 'show'])
            ->name('staff.view');

        Route::delete('/delete/{id}', [RegisteredUserController::class, 'delete'])
            ->name('staff.delete');

        Route::patch('/update/{id}', [RegisteredUserController::class, 'update'])
            ->name('staff.update');
    });

    //STUDENT MANAGEMENT ROUTES
    Route::prefix('/students')->group(function () {

        Route::get('/', [StudentController::class, 'index'])
            ->name('students.all');

        Route::get('/view/{id}', [StudentController::class, 'show'])
            ->name('students.view');

        Route::delete('/delete/{id}', [StudentController::class, 'destroy'])
            ->name('students.delete');

    });

    //COURSE MANAGEMENT ROUTES
    Route::prefix('/courses')->group(function () {

        Route::get('/', [CourseController::class, 'index'])
            ->name('course.all');

        Route::get('/add', [CourseController::class, 'create'])
            ->name('course.add');
        
        Route::post('/add', [CourseController::class, 'store'])
            ->name('course.save');

        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])
            ->name('course.delete');
    });

    //EXAM MANAGEMENT ROUTES
    Route::prefix('/exams')->group(function () {

        Route::get('/', [ExaminationController::class, 'index'])
            ->name('exam.all');

        Route::get('/add', [ExaminationController::class, 'create'])
            ->name('exam.add');
        
        Route::post('/add', [ExaminationController::class, 'store'])
            ->name('exam.save');

        Route::delete('/delete/{id}', [ExaminationController::class, 'destroy'])
            ->name('exam.delete');
    });

    //ATTENDANCE MANAGEMENT ROUTES
    Route::prefix('/attendance')->group(function() {

        Route::get('/{studentId?}', [AttendanceController::class, 'index'])
            ->name('attendance.all');

        Route::match(['get', 'post'], '/user/profile', [AttendanceController::class, 'authenticate'])
            ->name('attendance.authenticate');
        
        Route::post('/mark/{id}', [AttendanceController::class, 'mark'])
            ->name('attendance.mark');
    });

});

//PUBLIC ROUTES

Route::prefix('/students')->group(function () {

    Route::get('/new', [StudentController::class, 'create'])
        ->name('students.add');

    Route::get('/new/courses', [StudentController::class, 'courses'])
        ->name('students.add.course');

    Route::post('/new', [StudentController::class, 'store'])
        ->name('students.store');

    Route::post('/new/{id}', [StudentController::class, 'storeCourse'])
        ->name('students.store.course');
        
});

require __DIR__.'/auth.php';
