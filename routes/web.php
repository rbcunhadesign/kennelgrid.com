<?php

use App\Http\Controllers\App\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
