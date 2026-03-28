<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CompetitionController;
use App\Http\Controllers\admin\CompetitionTopicCategoryController;
use App\Http\Controllers\admin\CompetitionTypeController;
use App\Http\Controllers\admin\StudentController as AdminStudentController;
use App\Http\Controllers\admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\LoginStudentController;
use App\Http\Controllers\Auth\RegisStudentController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\teacher\AuthController as TeacherAuthController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Auth routes
    Route::middleware('guest:teacher')->group(function () {
        Route::get('login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [TeacherAuthController::class, 'login']);
    });

    // Protected routes
    Route::middleware('auth:teacher')->group(function () {
        Route::post('logout', [TeacherAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');

        // Students management
        Route::get('students', [TeacherController::class, 'students'])->name('students');
        Route::get('students/{id}', [TeacherController::class, 'studentDetail'])->name('students.detail');

        // Competitions
        Route::get('competitions', [TeacherController::class, 'competitions'])->name('competitions');
        Route::get('competitions/{id}', [TeacherController::class, 'competitionDetail'])->name('competitions.detail');
    });
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::resource('competition-type', CompetitionTypeController::class);
        Route::resource('competition', CompetitionController::class);
        Route::resource('topic-category', CompetitionTopicCategoryController::class);
        Route::resource('teacher', AdminTeacherController::class);
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('student', AdminStudentController::class);
    });
});

Route::get('/home', function () {
    return view('landing.index');
})->name('dashboard-user');

// STUDENT ROUTE
Route::get('/student/register', action: [RegisStudentController::class, 'index'])->name('register-student');
Route::get('/student/login', action: [LoginStudentController::class, 'index'])->name('login-page');
Route::post('/student/register/store', action: [RegisStudentController::class, 'store'])->name('store-register-student');
Route::post('/student/login/check', action: [LoginStudentController::class, 'login'])->name('login-student');
