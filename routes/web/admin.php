<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\TemplateController;

Route::view('/', 'admin.index')->name('index');

Route::resource('document_type', DocumentTypeController::class);
Route::resource('template', TemplateController::class)->only(['index']);
Route::resource('user', UserController::class)->only(['index']);
Route::resource('field', FieldController::class)->only(['index']);
