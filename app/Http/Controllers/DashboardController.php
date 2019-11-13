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
		date_default_timezone_set('Asia/Kolkata');
	}

    public function index()
    { 	
    	$interviewdata = DB::table('interviewer_1')
    						->leftJoin('interviewee_2', 'interviewee_2.iid', '=', 'interviewer_1.iid')
		                 	->select('*','interviewer_1.iid As iid')
		                 	->get();
        return view('dashboard',compact('interviewdata'));
    }

    public function logout()
  	{
	    Session::flush();               
      	return Redirect::to('/admin');
	}
}
