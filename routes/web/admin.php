<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\TemplateController;

Route::view('/', 'admin.index')->name('index');

Route::prefix('user')
    ->as('user.')
    ->controller(UserController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
    });

Route::prefix('field')
    ->as('field.')
    ->controller(FieldController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
    });

Route::prefix('document-type')
    ->as('document_type.')
    ->controller(DocumentTypeController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
    });

Route::prefix('template')
    ->as('template.')
    ->controller(TemplateController::class)
    ->group(function() {
        Route::get('/', 'index')->name('index');
    });
