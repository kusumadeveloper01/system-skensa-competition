<?php

use App\Http\Controllers\admin\CompetitionTypeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\teacher\AuthController as TeacherAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('landing-page');
});

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
    Route::resource('competition-type', CompetitionTypeController::class);
});

