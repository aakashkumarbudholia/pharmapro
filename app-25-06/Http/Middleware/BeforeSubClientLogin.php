<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class BeforeSubClientLogin
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
        if(empty(session('sub_client_user_name'))){
            return Redirect::to('/sub_client')->with('error','Before login you can\'t access any page');
        }
        return $next($request);
    }
}
