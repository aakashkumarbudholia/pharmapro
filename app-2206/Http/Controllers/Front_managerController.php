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

class Front_managerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        return view('front/index');
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
		return Redirect::to('/register')->with('success','Registration Completed.');;

	}


    public function interview()
    {
        return view('front/multi-step-form');
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
