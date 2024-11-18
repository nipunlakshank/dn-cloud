<?php

use App\Http\Controllers\Dev\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/dev/login', [LoginController::class, 'index'])->name('dev.login');
