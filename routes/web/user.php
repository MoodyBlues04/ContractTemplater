<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DocumentsController;
use App\Http\Controllers\User\ContractsController;
use App\Http\Controllers\User\TariffController;
use App\Http\Controllers\User\BillingController;

/**
 * TODO documents screening
 * TODO payments
 */

Route::prefix('profile')
    ->as('profile.')
    ->controller(ProfileController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::patch('/{user}', 'update')->name('update');
});

Route::resource('document', DocumentsController::class)->only(['index', 'update', 'store']);
Route::post('/document/load', DocumentsController::class . '@loadDocument')
    ->name('document.load');

Route::prefix('contract')
    ->as('contract.')
    ->controller(ContractsController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{contract}/edit', 'edit')->name('edit');
        Route::get('/{contract}/upload', 'upload')->name('upload'); // TODO post
        Route::get('/{contract}', 'show')->name('show');
        Route::patch('/{contract}', 'update')->name('update');
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
        Route::post('/bill/{tariffId}', 'bill')->name('bill');
});
