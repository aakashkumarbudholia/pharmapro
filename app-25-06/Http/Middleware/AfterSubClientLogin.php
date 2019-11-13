<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class AfterSubClientLogin
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
        if(!empty(session('sub_client_user_name'))){
            return Redirect::to('sub_client/dashboard');
        }
        return $next($request);
    }
}
