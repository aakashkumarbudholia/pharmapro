<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Session;

class SessionInactivity
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
        if($request->session()->get('activity_id')>0){

            $re = DB::table('admin_login')->select('inactivity_time_out')->where('id','=',4)->first();

            $activity_id = $request->session()->get('activity_id');
            $activity_type = $request->session()->get('activity_type');


            $user_exists = DB::table('session_inactivity')
                            ->where('user_id','=',$activity_id)
                            ->where('user_type','=',$activity_type)
                            ->first();

            $data = array();
            if(!empty($user_exists)){
                $data = array('from_login'=>date("Y-m-d H:i:s"));
                DB::table('session_inactivity')
                    ->where('user_id','=',$activity_id)
                    ->where('user_type','=',$activity_type)
                    ->update($data);
            }else{
                $data = array('user_id'=>$activity_id,'user_type'=>$activity_type,'from_login'=>date("Y-m-d H:i:s"));
                DB::table('session_inactivity')
                    ->insert($data);
            }

        }

      
 
        return $next($request);
    }
}
