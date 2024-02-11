<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DocumentsController;
use App\Http\Controllers\User\ContractsController;
use App\Http\Controllers\User\TariffController;
use App\Http\Controllers\User\BillingController;

Route::prefix('profile')
    ->as('profile.')
    ->controller(ProfileController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::patch('/{user}', 'update')->name('update');
});

Route::resource('document', DocumentsController::class)->only(['index', 'update', 'store']);

Route::prefix('contract')
    ->as('contract.')
    ->controller(ContractsController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/fill-template', 'fillTemplate')->name('fill_template');
});
Route::prefix('tariff')
    ->as('tariff.')
    ->controller(TariffController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
});
Route::prefix('billing')
    ->as('billing.')
    ->controller(BillingController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
});
