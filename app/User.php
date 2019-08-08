<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UsesTenantConnection, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'description', 'birthdate', 'email', 'password', 'url_facebook', 'url_instagram', 'url_twitter', 'url_linkedin', 'url_website'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'description' => 'string',
        'birthdate' => 'date',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'url_facebook' => 'string',
        'url_instagram' => 'string',
        'url_twitter' => 'string',
        'url_linkedin' => 'string',
        'url_website' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
