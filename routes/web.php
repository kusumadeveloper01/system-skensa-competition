<?php

use App\Http\Controllers\admin\CompetitionTypeController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('landing-page');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('competition-type', CompetitionTypeController::class);
});
