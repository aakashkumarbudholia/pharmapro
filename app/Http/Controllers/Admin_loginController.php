<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Admin_login;
use DB;
use Session;
use App\GeneralModel;

class Admin_loginController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        return view('admin_login');
    }
    
    public function check_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
	

         $Admin_login = new Admin_login();
      
         $captcha_sum = $request->input('captcha_sum');
         $captcha = $request->input('captcha');

        if($captcha != $captcha_sum){
            return Redirect::to('/admin')->with('error','Invalid Captcha');
        }

        $check = DB::table('admin')
                            ->where('username',$username)
                            ->where('password',$password)
                            ->first();

        if(isset($check->username) && !empty($check->username)){
            session(['login_type'=>'admin']);
            session(['user_id'=>$check->id]);
            session(['user_name'=>$check->username]);

            session(['activity_id'=>$check->id]);
            session(['activity_type'=>1]); 



            return Redirect::to('/dashboard_admin');
        }else{
            return Redirect::to('/admin')->with('error','Invalid Username or Password');
        }



    }


    public function reset_password(Request $request)
    {
        $email = $request->input('email');
	$utype = $request->input('utype');

		$check = DB::table('admin_login')
		                    ->where('email',$email)
		                    ->first();
		if(isset($check->email) && !empty($check->email)){
		    $to = $check->email;
		    
		    $subject = 'Reset password';

		    $headers = "From: webmaster@example.com" . "\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
		    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		    $message = "<h2>Hey, here send reset password link below</h2><br>";
		    $message .=  "<a href=".url('/reset_password_link').">click here</a>";
		    
		    $mail = mail($to, $subject, $message, $headers);
		    if($mail){
		        return Redirect::to('/')->with('success','Reset password link send in your register email.');
		    }else{
		        return Redirect::to('/')->with('error','some error');
		    }
		}else{
		    return Redirect::to('/')->with('error','Email ID does not match');
		}



                       
    }


   function quickRandom($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


    public function reset_password_link()
    {
        return view('admin_reset_pass');
    }


    public function save_new_password(Request $request)
    {
        $password = md5($request->input('password'));
        $id = 1;
        $data = array(
                        'password' => $password,
                        'updated_at' => date('Y-m-d H:i:s')
                    );

        $update_detail = DB::table('admin_login')
                            ->where('id', $id)
                            ->update($data);

        if($update_detail){
            return Redirect::to('/')->with('success', 'Password reset successfuly.');
        }
        else{
            return Redirect::to('/reset_password_link')->with('error', 'Some Error');
        }
    }
    public function logout()
    {

        Session::flush();               
        return Redirect::to('/');
    }
}
