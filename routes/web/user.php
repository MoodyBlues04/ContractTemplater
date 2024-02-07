<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;

Route::controller(ProfileController::class)
    ->prefix('profile')
    ->as('profile.')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::patch('/{user}', 'update')->name('update');
});
