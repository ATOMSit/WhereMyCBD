<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

use App\Http\Requests\UserRequest;

Route::get('', function () {
    $validate = new UserRequest();
    return $array = $validate->messages();
});
Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
Route::post('customer/login', 'CustomerAuth\LoginController@login');
Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'CustomerAuth\RegisterController@store')
    ->name('register_store');

Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');

Route::prefix('{website}')->middleware(['customer', 'auth:customer', 'can:view,website'])->group(function () {
    Route::get('/', 'UserController@index')
        ->name('dashboard');
});