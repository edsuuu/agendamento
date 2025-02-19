<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthProvidersController;
use App\Http\Middleware\CheckIfUserHasBusiness;
use App\Http\Middleware\CheckIfUserNotHasBusiness;

Route::view('/', 'scheduling.home-page')->name('home');

Route::prefix('auth')->group(function () {
    Route::view('/login', 'scheduling.auth.login')->name('login')->middleware('guest');
    Route::view('/register', 'scheduling.auth.register')->name('register')->middleware('guest');

	Route::middleware('web')->get('/google', [AuthProvidersController::class, 'googleAuth'])->name('google');
	Route::middleware('web')->get('/google/callback', [AuthProvidersController::class, 'googleCallback']);

    Route::view('/forgot-password', 'scheduling.auth.forgot-password')->name('forgot-password')->middleware('guest');
    Route::view('/reset-password/{token}', 'scheduling.auth.reset-password')->name('password.reset')->middleware('guest');
});


Route::middleware(['auth', CheckIfUserHasBusiness::class])->get('/complete-profile', function () {
    return view('scheduling.auth.complete-profile');
})->name('complete-profile');

Route::middleware(['auth', CheckIfUserNotHasBusiness::class])->group(function () {
    Route::view('/dashboard', 'scheduling.dashboard.dashboard')->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::view('scheduling', 'scheduling.scheduling')->name('scheduling');
    Route::view('products', 'scheduling.catalog.products')->name('products');
    Route::view('procedures', 'scheduling.catalog.procedures')->name('procedures');
    Route::view('profile', 'scheduling.profile.profile')->name('profile');
});
