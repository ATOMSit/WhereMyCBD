<?php

namespace App\Repositories;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;

interface CustomerRepositoryInterface
{
    public function store(CustomerRequest $request);

    public function update(CustomerRequest $request, Customer $customer);
}