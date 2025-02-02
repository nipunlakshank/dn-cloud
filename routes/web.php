<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Index as ChatIndex;
use App\Livewire\Reports\Main as Reports;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/wallet/{id}/{status}', [DashboardController::class, 'walletStatusUpdate'])->name('wallet-status');
    Route::get('/dashboard/user/{id}/{status}', [DashboardController::class, 'userStatusUpdate'])->name('user-status');

    Route::get('/chat/{chat}', ChatIndex::class)->name('chat');
    Route::get('/chat', ChatIndex::class)->name('chat');

    Route::view('/reports', 'livewire.reports.main')->name('reports');

    Route::get('/users', CreateChat::class)->name('users');
    Route::get('/reports', Reports::class)->name('reports');
});

require __DIR__ . '/' . 'auth.php';

// WARN: Should exclude below file from production environment
require __DIR__ . '/' . 'dev.php';
