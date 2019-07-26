<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function get(User $user, int $id);

    public function all(User $user);

    public function store(UserRequest $request);

    public function update(User $user, UserRequest $request);

    public function delete(User $user, int $id);
}