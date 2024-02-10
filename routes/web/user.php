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
Route::prefix('document')
    ->as('document.')
    ->controller(DocumentsController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
});
Route::prefix('contracts')
    ->as('contracts.')
    ->controller(ContractsController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
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
