<?php

namespace App\Policies;

use App\Customer;
use App\Website;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the customer can view any websites.
     *
     * @param \App\Customer $customer
     * @return mixed
     */
    public function viewAny(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the customer can view the website.
     *
     * @param \App\Customer $customer
     * @param \App\Website $website
     * @return mixed
     */
    public function view(Customer $customer, Website $website)
    {
        if ($customer->id === $website->customer_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the customer can create websites.
     *
     * @param \App\Customer $customer
     * @return mixed
     */
    public function create(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the customer can update the website.
     *
     * @param \App\Customer $customer
     * @param \App\Website $website
     * @return mixed
     */
    public function update(Customer $customer, Website $website)
    {
        if ($website->owner()->exists()) {
            if ($website->owner->is($customer)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Determine whether the customer can delete the website.
     *
     * @param \App\Customer $customer
     * @param \App\Website $website
     * @return mixed
     */
    public function delete(Customer $customer, Website $website)
    {
        if ($website->owner()->exists()) {
            if ($website->owner->is($customer)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Determine whether the customer can restore the website.
     *
     * @param \App\Customer $customer
     * @param \App\Website $website
     * @return mixed
     */
    public function restore(Customer $customer, Website $website)
    {
        if ($website->owner()->exists()) {
            if ($website->owner->is($customer)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Determine whether the customer can permanently delete the website.
     *
     * @param \App\Customer $customer
     * @param \App\Website $website
     * @return mixed
     */
    public function forceDelete(Customer $customer, Website $website)
    {
        if ($website->owner()->exists()) {
            if ($website->owner->is($customer)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
