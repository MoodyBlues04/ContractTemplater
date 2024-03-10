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

Route::get('/test', function () {
//    TODO vision models to DB to doc types
    $passportImgPath = storage_path('app/documents/test_passport.jpg');
    $file = file_get_contents($passportImgPath);
    $encodedFile = base64_encode($file);
    $request = \App\Modules\Api\YandexCloudApi\Request\RecognizeDocRequest::passportRequest($encodedFile);
    $api = new \App\Modules\Api\YandexCloudApi\YandexCloudApi();
    dd($api->recognizeDocument($request)->getEntities());
});

Route::group([], __DIR__ . '/web/auth.php');
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(__DIR__ . '/web/admin.php');
Route::prefix('user')
    ->as('user.')
    ->middleware(['auth', 'verified', 'user'])
    ->group(__DIR__ . '/web/user.php');

Route::post('/pay/callback', \App\Http\Controllers\User\PaymentController::class . '@callback')
    ->name('payment.callback');

Route::as('public.')->group(function () {
    Route::view('/', 'public.index')->name('index');
    Route::view('/about-us', 'public.about_us')->name('about_us');
    Route::view('/clients', 'public.clients')->name('clients');
    Route::view('/feedback', 'public.feedback')->name('feedback');
    Route::view('/contacts', 'public.contacts')->name('contacts');
});
