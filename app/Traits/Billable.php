<?php

namespace App\Traits;

use App\Subscription;
use Laravel\Cashier\Billable as InitialBillable;

trait Billable
{
    use InitialBillable;

    /**
     * Override the subscriptions() from Larave\Cashier\Billable
     * to inject CustomSubscription model
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, $this->getForeignKey())->orderBy('created_at', 'desc');
    }
}