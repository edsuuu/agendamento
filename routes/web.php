<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/segments-types/{segment_id}', [AuthController::class, 'getAllSegmentsTypeByIdTheSegment'])->name('get.segmentTypes');

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth');
    Route::post('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/register-business', [AuthController::class, 'registerBusiness'])->name('business.register');
    Route::post('/register-user', [AuthController::class, 'registerUser'])->name('user.register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('business')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'business.dashboard')->name('business.dashboard');
})->middleware('auth');

Route::prefix('client')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'client.dashboard')->name('client.dashboard');
});
