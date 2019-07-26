<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    public function get(User $user, int $id)
    {
        $user->query->findOrFail($id);
    }

    public function all(User $user)
    {
        // TODO: Implement all() method.
    }

    public function store(UserRequest $request)
    {
        try {
            $user = new User([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'description' => $request->get('description'),
                'birthdate' => $request->get('birthdate'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'url_facebook' => $request->get('url_facebook'),
                'url_instagram' => $request->get('url_instagram'),
                'url_twitter' => $request->get('url_twitter'),
                'url_linkedin' => $request->get('url_linkedin'),
                'url_website' => $request->get('url_website')
            ]);
            $user->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update(User $user, UserRequest $request)
    {
        try {
            $user->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'description' => $request->get('description'),
                'birthdate' => $request->get('birthdate'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'url_facebook' => $request->get('url_facebook'),
                'url_instagram' => $request->get('url_instagram'),
                'url_twitter' => $request->get('url_twitter'),
                'url_linkedin' => $request->get('url_linkedin'),
                'url_website' => $request->get('url_website')
            ]);
            $user->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete(User $user, int $id)
    {

    }
}