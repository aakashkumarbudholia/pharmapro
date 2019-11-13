<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
	function __construct()
	{
		date_default_timezone_set('Asia/Kolkata');
	}

    public function index()
    { echo "Welcome..";exit;
    	$today_date = date('Y-m-d');

    	$today_uploaded_document = DB::table('client_folder_mgt')
                          ->where('upload_type','=',1)
                          ->whereDate('created_at', '=', $today_date)
                          ->count();

        $today_deleted_document = DB::table('client_folder_mgt')
                          ->where('upload_type','=',1)
                          ->whereDate('deleted_at', '=', $today_date)
                          ->count();

        $today_moved_document = DB::table('client_folder_mgt')
                          ->where('upload_type','=',1)
                          ->whereDate('moved_at', '=', $today_date)
                          ->count();

        $today_renamed_document = DB::table('client_folder_mgt')
                          ->where('upload_type','=',1)
                          ->whereDate('renamed_at', '=', $today_date)
                          ->count();

        $today_moved_folder = DB::table('client_folder_mgt')
                          ->where('upload_type','=',0)
                          ->whereDate('moved_at', '=', $today_date)
                          ->count();

        $today_deleted_folder = DB::table('client_folder_mgt')
                          ->where('upload_type','=',0)
                          ->whereDate('deleted_at', '=', $today_date)
                          ->count();

        $today_renamed_folder = DB::table('client_folder_mgt')
                          ->where('upload_type','=',0)
                          ->whereDate('renamed_at', '=', $today_date)
                          ->count();
        	
        return view('dashboard',compact('today_uploaded_document','today_deleted_document','today_moved_document','today_renamed_document','today_moved_folder','today_deleted_folder','today_renamed_folder'));
    }

    public function filter(Request $request)
    {
    	$filter = $request->input('filter');
    	$get_to = '';
    	$get_from = '';

    	if($filter == 'month'){
    		$to = Date('Y-m-d', strtotime("+1 days"));
    		$from = Date('Y-m-d', strtotime("-30 days"));	
    	}elseif($filter == 'week'){	
    		$to = Date('Y-m-d', strtotime("+1 days"));
    		$from = Date('Y-m-d', strtotime("-8 days"));	
    	}elseif($filter == 'from_to'){	
    		$get_to = $request->input('to_date');
    		$get_from = $request->input('from_date');
    		$to = date('Y-m-d', strtotime($get_to . ' +1 day'));
    		$from = $get_from;
    	}else{
    		$to = '';
    		$from = '';	
    	}
    	
    	if(!empty($to) && !empty($from)){
    		  $today_uploaded_document = DB::table('client_folder_mgt')
                          ->where('upload_type','=',1)
                          ->whereBetween('created_at', [$from, $to])
                          ->count();

	        $today_deleted_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereBetween('deleted_at', [$from, $to])
	                          ->count();

	        $today_moved_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereBetween('moved_at', [$from, $to])
	                          ->count();

	        $today_renamed_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereBetween('renamed_at', [$from, $to])
	                          ->count();

	        $today_moved_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereBetween('moved_at', [$from, $to])
	                          ->count();

	        $today_deleted_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereBetween('deleted_at', [$from, $to])
	                          ->count();

	        $today_renamed_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereBetween('renamed_at', [$from, $to])
	                          ->count();
      	}else{
      		$today_date = date('Y-m-d');

	    	  $today_uploaded_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereDate('created_at', '=', $today_date)
	                          ->count();

	        $today_deleted_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereDate('deleted_at', '=', $today_date)
	                          ->count();

	        $today_moved_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereDate('moved_at', '=', $today_date)
	                          ->count();

	        $today_renamed_document = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',1)
	                          ->whereDate('renamed_at', '=', $today_date)
	                          ->count();

	        $today_moved_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereDate('moved_at', '=', $today_date)
	                          ->count();

	        $today_deleted_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereDate('deleted_at', '=', $today_date)
	                          ->count();

	        $today_renamed_folder = DB::table('client_folder_mgt')
	                          ->where('upload_type','=',0)
	                          ->whereDate('renamed_at', '=', $today_date)
	                          ->count();
      	}
    	
        	
        return view('dashboard',compact('today_uploaded_document','today_deleted_document','today_moved_document','today_renamed_document','today_moved_folder','today_deleted_folder','today_renamed_folder','filter','get_to','get_from'));

    }
    
}
