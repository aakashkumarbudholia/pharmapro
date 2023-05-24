<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Admin_login;
use DB;
use Session;
use App\GeneralModel;
use App\Notiemail;

class Admin_loginController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    { 
         /*  $delete_prev_35day = DB::table('job_post')
        ->where('created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
        ->delete(); */

	$update_detail = DB::table('job_post')
                    ->where('created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
                    ->update(array('is_deleted' => true));

        
        $urgent_14day = DB::table('job_post')
                      ->where('created_at','<',date_sub(NOW(),date_interval_create_from_date_string("14 days")))
                      ->where('urgent','=','Oui')
                      ->select('id')
                      ->get();
      
      if(!empty($urgent_14day)){
        foreach($urgent_14day as $key => $val){
          if(!empty($val->id)){
            $update_urgent = DB::table('job_post')
                              ->where('id', $val->id)
                              ->update(array('urgent' => 'Non'));
          }
        }
      }
        return view('admin_login');
    }
    
    public function check_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');


	// noti email send start

		$Date = date('Y-m-d');

		$getdata = DB::table('noti_email')
                                ->where('status','=',0)
                                ->where('email_date','=',$Date)
                                ->get();


		foreach($getdata as  $k=>$v)
		{

			$jobs = DB::table('job_post')
		                 ->select('*')
		                 ->where('job_id',$v->job_ids)
		                 ->first();

			$users = DB::table('users')
		                 ->select('*')
		                 ->where('id',$v->user_id)
		                 ->first();

			$noti = DB::table('notification')
		                 ->select('*')
		                 ->where('days',$v->noti)
		                 ->first();

	if(isset($users)){

		if(isset($jobs->company))
		{

			 $jobtitle = str_replace(' ', '-', $jobs->company);
			 $jobtitle = str_replace('/', '-', $jobtitle);
	
			$jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');

		$jobtitle = strtolower($jobtitle);

			$urls = "https://www.pharmapro.fr/offre-emploi/".$jobs->job_id."/".$jobtitle;
			$linkurl = "<a href=$urls>$urls</a>";

			  $from = 'info@pharmapro.fr';
				 $cc = 'xavier.gruffat@gmail.com';

			  $to = $users->email;
			  $subject = $noti->title;
			  $headers  = 'MIME-Version: 1.0' . "\r\n";
			  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			  $headers .= 'From: '.$from."\r\n".
			      'Reply-To: '.$from."\r\n" .
				 'Cc: '.$cc."\r\n" .
			      'X-Mailer: PHP/' . phpversion();

		
			$message =  str_replace("title",$users->title,$noti->description);
			$message =  str_replace("surname",$users->last_name,$message);
			$message =  str_replace("url",$linkurl,$message);

			// $mail = mail($to,$subject,$message,$headers);

		}
	}


			  
			

			$data = array(
                        'status' => 1,
                    	);

			Notiemail::where('id',$v->id)->update($data);


			

		}


		// noti email send end

	

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
