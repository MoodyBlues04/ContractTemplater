<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;

Route::controller(ProfileController::class)->group(function() {
    Route::get('/', 'index')->name('profile');
});
