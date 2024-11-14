<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::view('auth', 'auth')->name('auth');
