<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthAdmin
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
        if(session()->get('isAdmin') != '1'){
            return redirect('/home');
        }
        return $next($request);
    }
}
