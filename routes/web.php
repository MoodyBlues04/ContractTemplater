<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], __DIR__ . '/web/auth.php');
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(__DIR__ . '/web/admin.php');
Route::as('user.')
    ->middleware(['auth', 'verified'])
    ->group(__DIR__ . '/web/user.php');

Route::as('public.')->group(function () {
    Route::view('/', 'public.index')->name('index');
    Route::view('/about-us', 'public.about_us')->name('about_us');
    Route::view('/clients', 'public.clients')->name('clients');
    Route::view('/feedback', 'public.feedback')->name('feedback');
    Route::view('/contacts', 'public.contacts')->name('contacts');
});
