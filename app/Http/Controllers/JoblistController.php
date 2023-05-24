<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;


class JoblistController extends Controller
{
    
     public function index(){
        /*return view('front/job_list');*/
        /*$get_data=DB::table('job_post')->select('*')->get();*/
         $get_data=DB::table('job_post')
                ->select('job_post.*')
                ->where('job_post.status', '=', 1)
                ->where('job_post.is_deleted', '=', 0)
                ->orderBy('job_post.id', 'desc')
                ->get();
         return view('front/job_list',compact('get_data'));
    }
    public function index1(){
        /*return view('front/job_list');*/
        	/*$get_data=DB::table('job_post')->select('*')->get();*/
            /*Date:-20/07/2022
            Devlop by: Vali Goraniya*/
            $get_data=DB::table('job_post')
                ->select('job_post.*')
                ->where('job_post.status', '=', 1)
                ->where('job_post.is_deleted', '=', 0)
                ->orderBy('job_post.id', 'desc')
                ->get();

         return view('front/job_list1',compact('get_data'));
    }
}
