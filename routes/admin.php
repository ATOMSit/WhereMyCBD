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


Route::group(['middleware' => ['auth:customer']], function () {
    Route::get('paypal/express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
    Route::get('paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
    Route::post('paypal/notify', 'PaypalController@notify');

    Route::get('websites/create', 'WebsiteController@create')
        ->name('website.create');
    Route::post('websites/store', 'WebsiteController@store')
        ->name('website.store');

    Route::prefix('{website}')->middleware(['customer', 'auth:customer', 'can:view,website'])->group(function () {
        Route::get('/', 'WebsiteController@show')
            ->name('dashboard');
        Route::get('websites/settings', 'WebsiteController@edit')
            ->name('website.edit');
        Route::put('websites/update', 'WebsiteController@update')
            ->name('website.update');
        Route::prefix('customers')->as('customer.')->middleware('customer_menu')->group(function () {
            Route::get('my-profile', 'CustomerController@edit')
                ->name('edit');
            Route::put('update/{id}', 'CustomerController@update')
                ->name('update');
        });
    });
});
