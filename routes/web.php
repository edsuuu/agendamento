<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthProvidersController;
use App\Http\Middleware\CheckIfUserHasBusiness;
use App\Http\Middleware\CheckIfUserNotHasBusiness;

Route::view('/', 'scheduling.home-page')->name('home');

Route::get('cliente/{slug}', function ($slug) {
    return view('scheduling.business.page-business', ['business_slug' => $slug]);
})->name('page-business');


Route::prefix('auth')->group(function () {
    Route::view('login', 'scheduling.auth.login')->name('login')->middleware('guest');
    Route::view('cadastro', 'scheduling.auth.register')->name('register')->middleware('guest');

	Route::middleware('web')->get('google', [AuthProvidersController::class, 'googleAuth'])->name('google');
	Route::middleware('web')->get('google/callback', [AuthProvidersController::class, 'googleCallback']);

    Route::view('esqueci-senha', 'scheduling.auth.forgot-password')->name('forgot-password')->middleware('guest');
    Route::view('resetar-senha/{token}', 'scheduling.auth.reset-password')->name('password.reset')->middleware('guest');
});

Route::middleware(['auth', CheckIfUserHasBusiness::class])->get('/completar-perfil', function () {
    return view('scheduling.auth.complete-profile');
})->name('complete-profile');

Route::middleware(['auth', CheckIfUserNotHasBusiness::class])->group(function () {
    Route::view('dashboard', 'scheduling.dashboard.dashboard')->name('dashboard');
    Route::view('agendamentos', 'scheduling.business.scheduling')->name('scheduling');
    Route::view('produtos', 'scheduling.catalog.products')->name('products');
    Route::view('procedimentos', 'scheduling.catalog.procedures')->name('procedures');
    Route::view('perfil', 'scheduling.profile.profile')->name('profile');
    Route::view('meu-link', 'scheduling.business.business')->name('link-business');
});
