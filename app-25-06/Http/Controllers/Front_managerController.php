<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Front_login;
use DB;
use Session;
use App\GeneralModel;
use App\UserRegistration;
use App\UserInterview;
use File;

class Front_managerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {

	 $service = DB::table('services')
            ->select('*')
            ->get();

      return view('front/index',compact('service'));
    }



  public function login()
    {
       return view('front/login');
    }

  public function save_register(Request $request)
 	{
	$username = $request->input('username');
	// $password = md5($request->input('password'));
	$password = $request->input('password');
	$email = $request->input('email');
	$fname = $request->input('fname');
	$lname = $request->input('lname');

	$check = DB::table('users')
                                 ->select('username')
                                 ->where('username',$username)
                                 ->first();

        if(!empty($check->username)){
            return Redirect::to('/register')->with('error', 'User Name Already Exist.');
        }

		$data = array(
                        'username' => $username,
                        'password' => $password,
                        'email'=> $email,
			'first_name' => $fname,
                        'last_name' => $lname,
			'ddate' => date("Y-m-d H:i:s"),
			'status' => 'approved',
			
                    );

                UserRegistration::UpdateOrCreate($data);
		return Redirect::to('/register')->with('success','Registration Completed.');

	}


    public function interview($id)
    {

      $interviewdata = DB::table('interviewer_1')
		                 ->select('*')
		                 ->where('iid',$id)
		                 ->first();

	
       $interviewid = $id;


       return view('front/multi-step-form',compact('interviewid','interviewdata'));
    }


  public function interview1(Request $request)
    {

        $mydate = explode("/",$request->input('deadlinedate'));
	if(isset($mydate[2]))
	{
		$ddate  = $mydate[2].'-'.$mydate[1].'-'.$mydate[0];
	} else {

		$ddate  = $request->input('deadlinedate');
	}


	$resources = $request->input('resources');
	$reference = $request->input('reference');
	$translation = $request->input('customRadio');
	$fname = $request->input('fname');
	$lname = $request->input('lname');
	$occupation = $request->input('occupation');
	$email = $request->input('email');
	$phone = $request->input('phone');
	$site = $request->input('site');
	$mediaoutlet = $request->input('mediaoutlet');
	$mediaurl = $request->input('mediaurl');
	$compcountry = $request->input('compcountry');
	$monthtraffic = $request->input('monthtraffic');
	$traffic = $request->input('traffic');
	$sitelang = $request->input('sitelang');
	$country = $request->input('country');
	$interlang = $request->input('interlang');
	$lang = $request->input('lang');
	$notes = $request->input('notes');
	$deadlinedate = $ddate;
	$interviewid = $request->input('interviewid');
	$old_logo = $request->input('old_logo');



    	if ($request->hasFile('logo')) {
    		$old_logo_path = public_path('/logo'). "/".  $old_logo;
    		if (File::exists($old_logo_path)) {
		        unlink($old_logo_path);
		    }
	        $image = $request->file('logo');
	        $logo_name = $image->getClientOriginalName();
	        $destinationPath = public_path('/logo');
	        $imagePath = $destinationPath. "/".  $logo_name;
	        $image->move($destinationPath, $logo_name);
	    }else{
	    	$logo_name = $old_logo;
	    }
    	

	$data = array(
                        'name' => $fname,
                        'lname' => $lname,
                        'occupation'=> $occupation,
			'phone' => $phone,
                        'email' => $email,
			'website' => $site,
                        'media_outlet' => $mediaoutlet,
                        'comp_country'=> $compcountry,
			'traffic_of_site' => $monthtraffic,
			'area_of_site' => $traffic,
                      	'mediaurl' => $mediaurl,
			'lang_of_site' => $sitelang,
                        'country' => $country,
                        'lang_of_interview'=> $interlang,
			'translate_lang' => $lang,
                        'notes' => $notes,
			'deadline' => $deadlinedate,
                        'iid' => $interviewid,
			'translate' => $translation,
			'references' => $reference,
			'resources' => $resources,
			'image' => $logo_name,
                        			
                    );


	 $check = DB::table('interviewer_1')
                                 ->select('iid')
                                 ->where('iid',$interviewid)
                                 ->first();

        if(!empty($check->iid)){
           
		$update_detail = DB::table('interviewer_1')
                            ->where('iid', $check->iid)
                            ->update($data);
		return Redirect::to('/interview/'.$interviewid)->with('success','Data Updated.');;
         } 

		

                UserInterview::UpdateOrCreate($data); 
		return Redirect::to('/interview/'.$interviewid)->with('success','Data Added.');


// customRadio
// resources
// reference
// file1



 
    }

    public function service()
    {

	 $service = DB::table('services')
            ->select('*')
            ->get();

        return view('front/service',compact('service'));
    }

 public function dashboard()
    {

	 $service = DB::table('services')
            ->select('*')
            ->get();

        return view('front/dashboard',compact('service'));
    }

  
  public function register()
    {
        return view('front/register');
    }

  public function check_login(Request $request)
    {

        $username = $request->input('username');
        // $password = md5($request->input('password'));
	$password = $request->input('password');
	
        $Front_login = new Front_login();
          
        $check = DB::table('users')
                            ->where('username',$username)
                            ->where('password',$password)
                            ->first();

        if(isset($check->username) && !empty($check->username)){
            session(['login_type'=>'frontuser']);
            session(['user_id'=>$check->id]);
            session(['user_name'=>$check->username]);
            session(['activity_id'=>$check->id]);
            session(['activity_type'=>0]); 

            return Redirect::to('/');
        }else{ 
            return Redirect::to('/login')->with('error','Invalid Username or Password');
        }

   }
	
  public function logout()
        {
	Session::flush();               
        return Redirect::to('/');
	}

   

   function quickRandom($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


}
