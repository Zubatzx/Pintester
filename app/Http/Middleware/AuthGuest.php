<?php

namespace App\Http\Middleware;

use Closure;

class AuthGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->get('userID') != "")
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
