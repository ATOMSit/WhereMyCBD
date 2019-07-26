<?php

namespace App\Http\Middleware;

use Closure;

class NotPlatform
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
        $host = $request->getHttpHost();
        if ($host === 'admin.atomsit.com' || $host === 'atomsit.com') {
            return abort(404);
        } else {
            return $next($request);
        }
    }
}
