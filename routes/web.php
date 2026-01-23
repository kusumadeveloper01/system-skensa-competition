<?php

use App\Http\Controllers\admin\CompetitionTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('competition-type', CompetitionTypeController::class);
});
