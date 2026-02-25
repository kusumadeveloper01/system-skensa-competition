<?php

use App\Http\Controllers\admin\CompetitionController;
use App\Http\Controllers\admin\CompetitionTypeController;
use App\Http\Controllers\Auth\LoginStudentController;
use App\Http\Controllers\Auth\RegisStudentController;
use App\Http\Controllers\CompetitionTopicCategoryController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('landing-page');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('competition-type', CompetitionTypeController::class);
    Route::resource('competition', CompetitionController::class);
    Route::resource('topic-category', CompetitionTopicCategoryController::class);
});

Route::get('/home', function () {
    return view('landing.index');
})->name('dashboard-user');

// STUDENT ROUTE
Route::get('/student/register', action: [RegisStudentController::class, 'index'])->name('register-student');
Route::get('/student/login', action: [LoginStudentController::class, 'index'])->name('login-page');
Route::post('/student/register/store', action: [RegisStudentController::class, 'store'])->name('store-register-student');
Route::post('/student/login/check', action: [LoginStudentController::class, 'login'])->name('login-student');
