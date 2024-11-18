<?php

use App\Http\Controllers\Dev\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dev', [HomeController::class, 'index'])->name('noauth.dashboard');
