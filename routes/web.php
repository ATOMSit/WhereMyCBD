<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {

    Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'CustomerAuth\LoginController@login');
    Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'CustomerAuth\RegisterController@register');

    Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});


Route::post('websites/store', 'WebsiteController@store')
    ->name('website.store');
Route::get('websites/create', 'WebsiteController@create')
    ->name('website.create');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
