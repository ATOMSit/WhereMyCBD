<?php

namespace App\Policies;

use App\Customer;
use App\Hostname;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostnamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Customer can view any hostnames.
     *
     * @param \App\Customer $customer
     * @return mixed
     */
    public function viewAny(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the Customer can view the hostname.
     *
     * @param \App\Customer $customer
     * @param \App\Hostname $hostname
     * @return mixed
     */
    public function view(Customer $customer, Hostname $hostname)
    {
        if ($customer->id === $hostname->customer_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the Customer can create hostnames.
     *
     * @param \App\Customer $customer
     * @return mixed
     */
    public function create(Customer $customer)
    {
        return true;
    }

    /**
     * Determine whether the Customer can update the hostname.
     *
     * @param \App\Customer $customer
     * @param \App\Hostname $hostname
     * @return mixed
     */
    public function update(Customer $customer, Hostname $hostname)
    {
        if ($customer->id === $hostname->customer_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the Customer can delete the hostname.
     *
     * @param \App\Customer $customer
     * @param \App\Hostname $hostname
     * @return mixed
     */
    public function delete(Customer $customer, Hostname $hostname)
    {
        if ($customer->id === $hostname->customer_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the Customer can restore the hostname.
     *
     * @param \App\Customer $customer
     * @param \App\Hostname $hostname
     * @return mixed
     */
    public function restore(Customer $customer, Hostname $hostname)
    {
        if ($customer->id === $hostname->customer_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the Customer can permanently delete the hostname.
     *
     * @param \App\Customer $customer
     * @param \App\Hostname $hostname
     * @return mixed
     */
    public function forceDelete(Customer $customer, Hostname $hostname)
    {
        if ($customer->id === $hostname->customer_id) {
            return true;
        } else {
            return false;
        }
    }
}
