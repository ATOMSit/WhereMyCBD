<?php

namespace App\Http\Middleware;

use Closure;

class GenerateSidebarMenu
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
        \Menu::make('sidebar_menu', function ($menu) {
            $menu->add('INFORMATIONS PERSONNELLES', ['icon' => 'fa fa-user', 'id' => "user-1", 'route' => ['admin.customers.edit']]);
            $menu->add('SITES INTERNET', ['icon' => 'fa fa-sitemap', 'id' => "website-1"]);
            $menu->add('Créer un nouveau site', ['route' => ['admin.website.create'], 'parent' => 'website-1']);
        });
        return $next($request);
    }
}
