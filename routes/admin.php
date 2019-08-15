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


Route::group(['middleware' => ['customer', 'auth:customer']], function () {
    Route::get('websites/store', 'WebsiteController@store');


    Route::prefix('invoices')->as('invoices')->group(function () {
        Route::get('index', 'InvoiceController@index')
            ->name('index');
        Route::get('download', 'InvoiceController@download')
            ->name('download');
    });
    Route::prefix('customers')->as('customers.')->middleware('customer_menu')->group(function () {
        Route::get('my-profile', 'CustomerController@edit')
            ->name('edit');
        Route::put('update/{id}', 'CustomerController@update')
            ->name('update');
    });

    Route::get('test', function () {
        $customer = \App\Customer::query()->findOrFail(1);
        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number" => '4242 4242 4242 4242',
                    "exp_month" => '12',
                    "exp_year" => '2020',
                    "cvc" => '123',
                    "name" => $customer->last_name
                )));


            // Set proration date to this moment:
            $proration_date = time();

            $subscription = \Stripe\Subscription::retrieve('sub_FcHNQ9U77dCQbL');

            $items = [
                [
                    'id' => 'si_FcHNJ2V9jxmo7f',
                    'quantity' => 3, # Switch to new plan
                ],
            ];

            \Stripe\SubscriptionItem::update(
                'si_FcHNJ2V9jxmo7f',
                [


                    'quantity' => 5,

                ]
            );

            $invoice = \Stripe\Invoice::upcoming([
                'customer' => 'cus_FcH9oo08bgybOV',
                'subscription' => 'sub_FcHNQ9U77dCQbL',
                'subscription_items' => $items,
                'subscription_proration_date' => $proration_date,
            ]);

            $cost = 0;
            $current_prorations = [];
            foreach ($invoice->lines->data as $line) {
                if ($line->period->start == $proration_date) {
                    array_push($current_prorations, $line);
                    $cost += $line->amount;
                }
            }

            return $current_prorations;


        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    });

    Route::get('websites/create', 'WebsiteController@create')
        ->name('website.create');
    Route::post('websites/store', 'WebsiteController@store')
        ->name('website.store');

    Route::prefix('{website}')->middleware(['customer', 'auth:customer', 'can:view,website'])->group(function () {
        Route::get('/', 'WebsiteController@show')
            ->name('dashboard');
        Route::get('websites/settings', function () {
            return view('application.welcome');
        })
            ->name('website.edit');
        Route::put('websites/update', 'WebsiteController@update')
            ->name('website.update');


        Route::prefix('invoices')->as('invoice.')->group(function () {
            Route::get('download/{invoice}', 'InvoiceController@show')
                ->name('download');
        });
    });
});
