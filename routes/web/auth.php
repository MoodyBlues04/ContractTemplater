<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\PasswordResetController;

Route::controller(AuthController::class)->as('auth.')->group(function() {
    Route::get('/register', 'registerPage')->name('register_page');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginPage')->name('login_page');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PasswordResetController::class)->as('auth.')->group(function() {
    Route::get('/forgot-password', 'forgotPassword')->name('forgot_password');
//    TODO finish https://laravel.com/docs/10.x/passwords
//    Route::post('/forgot-password', 'recover')->name('password_recover');
//    Route::get('/verify-password-recover', 'verifyPasswordRecover')->name('verify_password_recover');
});

Route::group(['prefix' => 'email', 'as' => 'verification.'], function() {
    Route::get('/verify', EmailVerifyController::class . '@notice')->name('notice');
    Route::get('/verify/{id}/{hash}', EmailVerifyController::class . '@verify')->name('verify');
    Route::post('/resend', EmailVerifyController::class . '@resend')->name('resend');
});
