<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
    Route::view('/', 'ejnex.auth.index')->name('auth');

    Route::middleware('web')->get('/google', [AuthController::class, 'googleAuth'])->name('google');
    Route::middleware('web')->get('/google/callback', [AuthController::class, 'googleCallback']);

    Route::post('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/register-business', [AuthController::class, 'registerBusiness'])->name('business.register');
    Route::post('/register-user', [AuthController::class, 'registerUser'])->name('user.register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('business')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'ejnex.business.dashboard')->name('business.dashboard');
    Route::view('/complete-profile-google', 'ejnex.business.complete-profile')->name('business.complete-profile.google');

})->middleware('auth');

Route::prefix('client')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'ejnex.client.dashboard')->name('client.dashboard');
});
