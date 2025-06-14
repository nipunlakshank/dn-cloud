<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FcmTokenController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
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

Route::get('inactive-notice', function () {
    return View('auth.inactive-notice');
})->name('notice.inactive');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'active'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/wallet/status', [DashboardController::class, 'walletStatusUpdate'])->name('wallet-status');
    Route::post('/dashboard/user/status', [DashboardController::class, 'userStatusUpdate'])->name('user-status');

    Route::get('/chat', ChatIndex::class)->name('chat');

    // TODO: enable this route when the reports page is ready
    // Route::view('/reports', 'livewire.reports.main')->name('reports');

    Route::get('/reports', Reports::class)->name('reports');

    Route::delete('chat-user', [GroupController::class, 'removeUser'])->name('chat-user.remove');

    Route::resource('/fcm-tokens', FcmTokenController::class)->only(['store', 'destroy']);
});

if (app()->isLocal()) {
    require __DIR__ . '/' . 'dev.php';
}

require __DIR__ . '/' . 'auth.php';
