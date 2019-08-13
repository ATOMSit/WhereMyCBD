<?php

namespace App;

use Laravel\Cashier\Subscription as InitialModel;

class Subscription extends InitialModel
{
    /**
     * The subscription class already includes the $dates variable, so we are reusing it and adding our custom columns
     */
    protected $dates = [
        'trial_ends_at', 'ends_at',
        'created_at', 'updated_at',
        'current_period_start', 'current_period_end',
    ];

    /**
     * Set the subscription table otherwise it will point to another table
     */
    protected $table = 'subscriptions';
}
