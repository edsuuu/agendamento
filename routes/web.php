<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthProvidersController;

Route::view('/', 'scheduling.home-page')->name('home');

Route::prefix('auth')->group(function () {
    Route::view('/login', 'scheduling.auth.login')->name('login')->middleware('guest');
    Route::view('/register', 'scheduling.auth.register')->name('register')->middleware('guest');

	Route::middleware('web')->get('/google', [AuthProvidersController::class, 'googleAuth'])->name('google');
	Route::middleware('web')->get('/google/callback', [AuthProvidersController::class, 'googleCallback']);

	Route::get('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie = cookie('remember_token', '', -1);

        return redirect('/')->withCookie($cookie);
    })->name('logout');
});


Route::middleware('auth')->group(function () {
	Route::view('/dashboard', 'scheduling.dashboard.dashboard')->name('dashboard');
//    Route::view('/complete-profile-google', 'ejnex.business.complete-profile')->name('business.complete-profile.google')->middleware([CheckIfUserHasBusiness::class]);
//    Route::view('/complete-profile', 'ejnex.business.complete-business')->name('business.profile-complete');
});
