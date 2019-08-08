<?php

namespace App\Providers;

use App\Customer;
use App\Hostname;
use App\Policies\CustomerPolicy;
use App\Policies\HostnamePolicy;
use App\Policies\UserPolicy;
use App\Policies\WebsitePolicy;
use App\User;
use App\Website;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Customer::class => CustomerPolicy::class,
        Website::class => WebsitePolicy::class,
        Hostname::class => HostnamePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
