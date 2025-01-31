<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;
use App\Livewire\Reports\Main as Reports;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/wallet-status/{id}/{status}', [DashboardController::class, 'walletStatusUpdate'])->name('wallet-status');
Route::get('/dashboard/user-status/{id}/{status}', [DashboardController::class, 'userStatusUpdate'])->name('user-status');

Route::get('/wallets', function () {
    return view('wallets');
})->name('wallets');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/reports', function () {
    return view('livewire.reports.main');
})->name('reports');

Route::get('/reports', Reports::class)->middleware(['auth', 'verified'])->name('reports');

// Route::get('/chat', function () {
//     return view('chat');
// })->middleware(['auth', 'verified'])->name('chat');

// Livewire routes
Route::get('/chat/{key}', Main::class)->middleware(['auth', 'verified'])->name('chat');
Route::get('/chat', Main::class)->middleware(['auth', 'verified'])->name('chat');
Route::get('/users', CreateChat::class)->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/' . 'auth.php';

// WARN: Should exclude below file from production environment
require __DIR__ . '/' . 'dev.php';
