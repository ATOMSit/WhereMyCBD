<?php

namespace App\Repositories;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function store(CustomerRequest $request)
    {
        $customer = new Customer([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'description' => $request->get('description'),
            'birthdate' => Carbon::parse($request->get('birthdate')),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'url_facebook' => $request->get('url_facebook'),
            'url_instagram' => $request->get('url_instagram'),
            'url_twitter' => $request->get('url_twitter'),
            'url_linkedin' => $request->get('url_linkedin'),
            'url_website' => $request->get('url_website')
        ]);
        $customer->save();
        return $customer;
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'description' => $request->get('description'),
            'birthdate' => Carbon::parse($request->get('birthdate')),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'url_facebook' => $request->get('url_facebook'),
            'url_instagram' => $request->get('url_instagram'),
            'url_twitter' => $request->get('url_twitter'),
            'url_linkedin' => $request->get('url_linkedin'),
            'url_website' => $request->get('url_website')
        ]);
        $customer->save();
        return $customer;
    }
}