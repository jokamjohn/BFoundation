<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectEmployerIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirect employer to dashboard, if they try to access certain when they are authenticated. i.e login
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/employer/dashboard');
        }
        return $next($request);
    }
}
