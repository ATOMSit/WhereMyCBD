<?php

namespace App;

use App\Notifications\CustomerResetPassword;
use Awobaz\Mutator\Mutable;
use Greabock\Tentacles\EloquentTentacle;
use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;

class Customer extends Authenticatable
{
    use UsesSystemConnection,EloquentTentacle ,Mutable, Notifiable, Billable;

    protected $guard = 'customer';

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
        'id' => 'integer',
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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'brithdate',
        'created_at',
        'updated_at'
    ];

    /**
     * Set the user's first name.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected $accessors = [
        'first_name' => ['capitalize', 'remove_extra_whitespace'],
        'last_name' => ['upper_case', 'remove_extra_whitespace'],
        'description' => ['remove_extra_whitespace']
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token));
    }

    /**
     * Returns the websites of this customer
     *
     * @return HasMany
     */
    public function websites(): HasMany
    {
        return $this->hasMany(Website::class);
    }
}
