<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateEmployer
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * AuthenticateEmployer constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()){
            if ($request->ajax()){
                return response('Unauthorized. ', 401);
            }else {
                return redirect()->route('auth.employer.login');
            }
        }
        return $next($request);
    }
}
