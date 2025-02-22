<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
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

Route::group(['auth', 'verified', 'middleware' => 'role:dev|super-admin|admin|accountant|worker'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/wallet/{id}/{status}', [DashboardController::class, 'walletStatusUpdate'])->name('wallet-status');
    Route::get('/dashboard/user/{id}/{status}', [DashboardController::class, 'userStatusUpdate'])->name('user-status');

    Route::get('/chat', ChatIndex::class)->name('chat');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::group(['auth', 'verified', 'middleware' => 'role:dev|super-admin|admin|accountant'], function () {

    Route::view('/reports', 'livewire.reports.main')->name('reports');
    Route::get('/reports', Reports::class)->name('reports');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
});

Route::group(['auth', 'middleware' => 'role:dev|super-admin|admin'], function () {

    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

// WARN: Should exclude below file from production environment
require __DIR__ . '/' . 'dev.php';

require __DIR__ . '/' . 'auth.php';
