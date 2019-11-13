<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class AfterClientLogin
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
        if( !empty(session('activity_id')) ){
             return Redirect::to('client/dashboard');
        }
        return $next($request);
    }
}
