<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.index')->name('index');

//Route::prefix('profile')
//    ->as('profile.')
//    ->controller(ProfileController::class)
//    ->group(function() {
//        Route::get('/', 'index')->name('index');
//        Route::patch('/{user}', 'update')->name('update');
//    });
