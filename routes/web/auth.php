<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifyController;

Route::controller(AuthController::class)->as('auth.')->group(function() {
    Route::get('/register', 'registerPage')->name('register_page');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginPage')->name('login_page');
    Route::post('/login', 'login')->name('login');
    Route::get('/home', 'home')->name('home'); // ?
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'email', 'as' => 'verify_email.'], function() {
    Route::get('/verify', EmailVerifyController::class . '@notice')->name('notice');
    Route::get('/verify/{id}/{hash}', EmailVerifyController::class . '@verify')->name('verify');
    Route::post('/resend', EmailVerifyController::class . '@resend')->name('resend');
});
