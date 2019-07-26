<?php

namespace App\Mutators;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

trait CustomerMutator
{
    function mbUcfirst($str, $encode = 'UTF-8')
    {

        $start = mb_strtoupper(mb_substr($str, 0, 1, $encode), $encode);
        $end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encode), $encode), $encode);

        $str = $start . $end;
        return $str;
    }

    /**
     * Get the customer ID.
     *
     * @param $value
     * @return int
     */
    public function getIdAttribute($value)
    {
        return (int)$value;
    }

    /**
     * Set the customer ID.
     *
     * @param $value
     */
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = (int)$value;
    }

    /**
     * Get the customer first name.
     *
     * @param $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the customer first name.
     *
     * @param $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = preg_replace('!\s+!', ' ', $this->mbUcfirst($value));
    }

    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = preg_replace('!\s+!', ' ', mb_strtoupper($value));
    }


    public function getDescriptionAttribute($value)
    {
        return (string)$value;
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = preg_replace('!\s+!', ' ', $value);
    }


    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getPasswordAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (string)Hash::make($value);
    }
}