<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\site\SiteController;
use App\Http\Middleware\CheckIfUserHasBusiness;
use App\Http\Middleware\CheckRoleUser;
use Illuminate\Support\Facades\Route;

Route::view('/', 'ejnex.site.index')->name('home');

Route::prefix('auth')->group(function () {
	Route::view('/login', 'ejnex.auth.login')->name('login');
	Route::view('/register', 'ejnex.auth.register')->name('register');

	Route::middleware('web')->get('/google', [AuthController::class, 'googleAuth'])->name('google');
	Route::middleware('web')->get('/google/callback', [AuthController::class, 'googleCallback']);

	Route::post('/register-business', [AuthController::class, 'registerBusiness'])->name('business.register');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/delete-user', [AuthController::class, 'deleteUserInCompletedDataUserByGoogle'])->name('user.deleteUser');
});

Route::prefix('business')->middleware(['auth', CheckRoleUser::class . ':costumer'])->group(function () {
	Route::view('/dashboard', 'ejnex.business.dashboard')->name('business.dashboard');
    Route::view('/complete-profile-google', 'ejnex.business.complete-profile')->name('business.complete-profile.google')->middleware([CheckIfUserHasBusiness::class]);
    Route::view('/complete-profile', 'ejnex.business.complete-business')->name('business.profile-complete');
});

Route::prefix('client')->middleware(['auth', CheckRoleUser::class . ':user'])->group(function () {
	Route::view('/dashboard', 'ejnex.client.dashboard')->name('client.dashboard');
});
