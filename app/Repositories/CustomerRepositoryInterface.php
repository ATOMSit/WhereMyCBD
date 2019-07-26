<?php

namespace App\Repositories;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;

interface CustomerRepositoryInterface
{
    public function store(CustomerRequest $request);
}