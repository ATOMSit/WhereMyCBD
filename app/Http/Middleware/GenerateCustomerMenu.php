<?php

namespace App\Http\Middleware;

use Closure;

class GenerateCustomerMenu
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('customer_menu', function ($menu) {
            $menu->add('INFORMATIONS PERSONNELLES', ['icon' => 'fa fa-user', 'id' => "user-1", 'route' => ['admin.customers.edit']]);
        });
        return $next($request);
    }
}
