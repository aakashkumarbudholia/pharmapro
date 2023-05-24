<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;

class DashboardController extends Controller
{
	function __construct()
	{
		date_default_timezone_set('Europe/Paris');
	}

    public function index()
    { 	
    	/* $job_post = DB::table('job_post')
            ->leftjoin('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price')
            // ->orderBy('job_post.id', 'desc')
	    ->orderBy('job_post.id','desc')
            // ->limit(10)
            ->get();  */

    $my_job_post = DB::table('job_post')
            ->select('job_post.*')
        ->orderBy('job_post.id','desc')
        //->limit(10)
        ->get();

    $start = 0;
    $rowperpage = 10;
	$job_post = DB::table('job_post')
            ->select('job_post.*')
	    ->orderBy('job_post.id','desc')
        ->offset($start)->limit($rowperpage)->get();

    $allcount = count($my_job_post);
	//echo $allcount; die();
        return view('dashboard_new',compact('job_post','allcount','start','rowperpage'));
    }

    public function dashboard_ajax(Request $request)
    {
        $rowperpage = $request->rowperpage;
        $start      = $request->start;
//return $start;
        $job_post = DB::table('job_post')
            ->select('job_post.*')
        ->orderBy('job_post.id','desc')
        //->limit(50)
            ->offset($start)->limit($rowperpage)->get();

    $my_job_post = DB::table('job_post')
            ->select('job_post.*')
        ->orderBy('job_post.id','desc')
        //->limit(10)
        ->get();

        $allcount = count($my_job_post);
        //return $allcount;

         return view('dashboard_ajax',compact('job_post','allcount','start','rowperpage'));
        
    }

    public function dashboard_search_ajax(Request $request) 
    {
        $search = $request->search_value;

        $my_job_post = DB::table('job_post')
            ->select('job_post.*')
        ->orderBy('job_post.id','desc')
        ->get();

        $start = 0;
        $rowperpage = 10;
        $search_data = 1;

        $allcount = count($my_job_post);

        if ($search==NULL) 
        {
            $job_post = DB::table('job_post')
                        ->select('job_post.*')
                        ->orderBy('job_post.id','desc')
                        ->offset($start)
                        ->limit($rowperpage)
                        ->get();
        } 
        else 
        {
            $job_post = DB::table('job_post')
                        ->select('job_post.*')
                        ->where('job_id','LIKE', '%'.$search.'%')
                        ->orwhere('job_title','LIKE', '%'.$search.'%')
                        ->orwhere('company','LIKE', '%'.$search.'%')
                        ->orderBy('job_post.id','desc')
                        //->offset($start)
                        //->limit($rowperpage)
                        ->get();
                        //echo count($job_post);

            if (count($job_post) == 0) 
            {
                $user_info = DB::table('users')
                             ->where('first_name','LIKE', '%'.$search.'%')
                             ->orwhere('last_name','LIKE', '%'.$search.'%')
                             ->get();

                if (count($user_info) != 0) 
                {
                    return view('dashboard_user_search_ajax',compact('user_info','allcount','start','rowperpage','search_data'));
                }


            }
        }

        return view('dashboard_search_ajax',compact('job_post','allcount','start','rowperpage','search_data'));
    }

    public function logout()
  	{
	    Session::flush();               
      	return Redirect::to('/admin');
	}
}
