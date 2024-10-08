<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('ehs-register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('ehs-register', [RegisteredUserController::class, 'store']);

    Route::get('ehs-login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('ehs-login', [AuthenticatedSessionController::class, 'store']);

    Route::get('ehs-forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('ehs-forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('ehs-reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('ehs-reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('ehs-verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('ehs-verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('ehs-email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('ehs-confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('ehs-password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('ehs-logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
