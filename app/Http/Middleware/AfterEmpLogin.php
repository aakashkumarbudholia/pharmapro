<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class AfterEmpLogin
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
        if(!empty(session('emp_user_name'))){
            //return Redirect::to('employee/dashboard');
        }
        return $next($request);
    }
}
