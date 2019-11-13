<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class BeforeClientLogin
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
        if( empty(session('activity_id')) ){
            return Redirect::to('/client')->with('error','Before login you can\'t access any page');
        }
        return $next($request);
    }
}
