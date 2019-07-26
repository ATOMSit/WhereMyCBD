<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        config()->set('auth.defaults.guard', 'customer');
        $host = $request->getHttpHost();
        if ($host === 'admin.atomsit.com') {
            return $next($request);
        } else {
            return redirect('https://atomsit.com');
        }
    }
}
