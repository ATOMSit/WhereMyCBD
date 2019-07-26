<?php

namespace App\Mutators;

use Illuminate\Support\Facades\Hash;

trait UserMutator
{
    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getPasswordAttribute($value)
    {
        return (bool)false;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (string)bcrypt($value);
    }
}