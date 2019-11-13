<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class AfterLogin
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
        if(!empty(session('user_name'))){
            return Redirect::to('/dashboard');
        }


        return $next($request);
    }
}
