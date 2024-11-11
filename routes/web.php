<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KidsController;
use Illuminate\Support\Facades\Route;

Route::get('/kidss', function () {
    return view('kids.index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(KidsController::class)->group(function () {
    Route::get('/kids', 'index')->name('kids.index');
    Route::post('/kids', 'profile')->name('kids.profile');
})->name('kids');
