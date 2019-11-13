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
use App\UserInterviewee;
use App\Questions;
use App\ContactUs;
use App\AboutUs;
use File;
use Illuminate\Routing\UrlGenerator;

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

	//$username = $request->input('username');
	// $password = md5($request->input('password'));
	$password = $request->input('password');
	$password1 = $request->input('password1');
	$email = $request->input('email');
	$fname = $request->input('fname');
	$lname = $request->input('lname');

	if($password != $password1)
	{
		 return Redirect::to('/register')->with('error', 'Password and re-enter password should be same.');
	}

	$check = DB::table('users')
                                 ->select('email')
                                 ->where('email',$email)
                                 ->first();

        if(!empty($check->username)){
            return Redirect::to('/register')->with('error', 'Email Already Exist.');
        }

		$data = array(
                        
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
        if(empty(session('login_type'))){
            session(['login_type'=>'interviewee']);
            session(['interviewee_id'=>$id]);
        }
      	$interviewdata = DB::table('interviewer_1')
		                 ->select('*')
		                 ->where('iid',$id)
		                 ->first();

	  	  $interviewee_data = DB::table('interviewee_2')
                     ->select('*')
                     ->where('iid',$id)
                     ->first();
      	
      	$question_data = DB::table('questions_3')
                     ->select('*')
                     ->where('iid',$id)
                     ->get();

      	$interviewid = $id;


       return view('front/multi-step-form',compact('interviewid','interviewdata','interviewee_data','question_data'));
    }


  public function interview1(Request $request)
    {

      //echo "<pre>";
      //echo $request->input('s2_interviewid');
      $step = $request->input('btn_step');
      $login_type = session('login_type');
      $user_type = session('login_type');
      if($user_type == 'admin'){
          $interviewid = $request->input('interviewid');
          $get_user_id = DB::table('interviewer_1')
                     ->select('user_id')
                     ->where('iid',$interviewid)
                     ->first();
          if(isset($get_user_id->user_id)){
            $user_id = $get_user_id->user_id;
          }else{
            $user_id = '';
          }
      }else{
        $user_id = session('user_id');  
      }

      if($login_type == 'interviewee'){
        $url = 'interviewee/';
      }else{
        $url = 'interview/';
      }
      if($step == 'step_1') {
        	$resources = $request->input('resources');
        	$reference = $request->input('reference');
        	$translation = $request->input('customRadio');
          $interview_with = $request->input('interview_with');
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
        	$deadlinedate = $request->input('deadlinedate');
        	$interviewid = $request->input('interviewid');
        	$old_logo = $request->input('old_logo');
         	if ($request->hasFile('logo')) {
         		$old_logo_path = public_path('/logo'). "/".  $old_logo;
        		if(!empty($old_logo))
        		{
     	    		if (File::exists($old_logo_path)) {
         				unlink($old_logo_path);
     			    }
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
                          'interview_with' => $interview_with,
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
                    			'interview_references' => $reference,
                    			'resources' => $resources,
                    			'image' => $logo_name,
                          'user_id' => $user_id
                    );


        	$check = DB::table('interviewer_1')
                                         ->select('iid')
                                         ->where('iid',$interviewid)
                                         ->first();

          if(!empty($check->iid)){
  		        $update_detail = DB::table('interviewer_1')
                              ->where('iid', $check->iid)
                              ->update($data);
          		return Redirect::to($url.$interviewid)->with('success','Data Saved.')->with('step','1');
          } 
          UserInterview::UpdateOrCreate($data); 
       		return Redirect::to($url.$interviewid)->with('success','Data Saved.')->with('step','1');
      }

      if($step == 'step_2'){
          $s2_iid = $request->input('s2_interviewid');
          $s2_fname = $request->input('s2_fname');
          $s2_surname = $request->input('s2_surname');
          $s2_occupation = $request->input('s2_occupation');
          $s2_email = $request->input('s2_email');
          $s2_phone = $request->input('s2_phone');
          $s2_notes = $request->input('s2_notes');
          $s2_link_congress = $request->input('s2_link_congress');
          $s2_link_download = $request->input('s2_link_download');

          $s2_old_logo = $request->input('s2_old_logo');
          if ($request->hasFile('s2_logo')) {
            $s2_old_logo_path = public_path('/logo'). "/".  $s2_old_logo;
            if(!empty($s2_old_logo))
            {
              if (File::exists($s2_old_logo_path)) {
                unlink($s2_old_logo_path);
              }
            }
            $image = $request->file('s2_logo');
            $s2_logo_name = $image->getClientOriginalName();
            $destinationPath = public_path('/logo');
            $imagePath = $destinationPath. "/".  $s2_logo_name;
            $image->move($destinationPath, $s2_logo_name);
          }else{
            $s2_logo_name = $s2_old_logo;
          }

          $s2_data = array(
                          'name_wee' => $s2_fname,
                          'surname_wee' => $s2_surname,
                          'occupation_wee' => $s2_occupation,
                          'email_wee'=> $s2_email,
                          'phone_wee' => $s2_phone,
                          'notes_wee' => $s2_notes,
                          'link_congress' => $s2_link_congress,
                          'link_image' => $s2_link_download,
                          'iid' => $s2_iid,
                          'image_wee' => $s2_logo_name,
                    );
          $check = DB::table('interviewee_2')
                                         ->select('iid')
                                         ->where('iid',$s2_iid)
                                         ->first();
          if(!empty($check->iid)){
              $update_detail = DB::table('interviewee_2')
                              ->where('iid', $check->iid)
                              ->update($s2_data);
              return Redirect::to($url.$s2_iid)->with('success','Data Saved.')->with('step','2');
          }
          UserInterviewee::UpdateOrCreate($s2_data); 
          return Redirect::to($url.$s2_iid)->with('success','Data Saved.')->with('step','2');
      }

      if($step == 'step_3') {
      	 $s3_iid = $request->input('s3_interviewid');
         $s3_ques = $request->input('s3_que');

         $delete_detail = DB::table('questions_3')
                              ->where('iid', $s3_iid)
                              ->delete();

         foreach ($s3_ques as $key => $s3_que) {
         	$question = '';
         	$notes = '';
         	foreach ($s3_que as $key => $value) {
         		if($key == 'question'){
         			$question = $value;
         		}
         		if($key == 'notes'){
         			$notes = $value;
         		}
         		
         	}
         	if($question != '' && $notes != ''){
         		$s3_data = array(
         				'iid' => $s3_iid,
         				'question' => $question,
         				'notes' => $notes,
         			);
         	}
         	if($question == '' && $notes != ''){
         		$s3_data = array(
         				'iid' => $s3_iid,
         				'notes' => $notes,
         			);
         	}
         	if($question != '' && $notes == ''){
         		$s3_data = array(
         				'iid' => $s3_iid,
         				'question' => $question,
         			);
         	}
         	Questions::UpdateOrCreate($s3_data); 
         }
         return Redirect::to($url.$s3_iid)->with('success','Data Saved.')->with('step','3');
      }

      if($step == 'step_4') {
      	 $s4_iid = $request->input('s4_interviewid');
         $s4_answers = $request->input('s4_ans');

         foreach ($s4_answers as $key => $s4_ans) {
         	$question = null;
         	$notes = null;
         	$anwser = null;
         	$id = '';
         	foreach ($s4_ans as $key => $value) {
         		if($key == 'question'){
         			$question = $value;
         		}
         		if($key == 'notes'){
         			$notes = $value;
         		}
         		if($key == 'anwser'){
         			$anwser = $value;
         		}
         		if($key == 'id'){
         			$id = $value;
         		}
         		
         	}
         		$s4_data = array(
         				'question' => $question,
         				'notes' => $notes,
         				'anwser' => $anwser,
         			);
         		$update_detail = DB::table('questions_3')
                              ->where('id', $id)
                              ->update($s4_data);
         }
         return Redirect::to($url.$s4_iid)->with('success','Data Saved.')->with('step','4');
      } 

      if($step == 'step_5') {
      	 $s5_iid = $request->input('s5_interviewid');
         $s5_finals = $request->input('s5_final');
         
         foreach ($s5_finals as $key => $s5_final) {
          $question = null;
          $notes = null;
         	$anwser = null;
         	$notes_precious = null;
         	$anwser_precious = null;
         	$id = '';
         	foreach ($s5_final as $key => $value) {
            if($key == 'question'){
              $question = $value;
            }
            if($key == 'notes'){
              $notes = $value;
            }
         		if($key == 'anwser'){
         			$anwser = $value;
         		}
         		if($key == 'notes_precious'){
         			$notes_precious = $value;
         		}
         		if($key == 'anwser_precious'){
         			$anwser_precious = $value;
         		}
         		if($key == 'id'){
         			$id = $value;
         		}
         		
         	}
     		$s5_data = array(
            'question' => $question,
            'notes' => $notes,
     				'anwser' => $anwser,
     				'notes_precious' => $notes_precious,
     				'anwser_precious' => $anwser_precious,
     			);
     		$update_detail = DB::table('questions_3')
                          ->where('id', $id)
                          ->update($s5_data);
         	
         }
        return Redirect::to($url.$s5_iid)->with('success','Data Saved.')->with('step','5');
      }
      if($step == 'send_email') {
        /*$s3_iid = $request->input('s3_interviewid');
         $s3_ques = $request->input('s3_que');

         $delete_detail = DB::table('questions_3')
                              ->where('iid', $s3_iid)
                              ->delete();

         foreach ($s3_ques as $key => $s3_que) {
          $question = '';
          $notes = '';
          foreach ($s3_que as $key => $value) {
            if($key == 'question'){
              $question = $value;
            }
            if($key == 'notes'){
              $notes = $value;
            }
            
          }
          if($question != '' && $notes != ''){
            $s3_data = array(
                'iid' => $s3_iid,
                'question' => $question,
                'notes' => $notes,
              );
          }
          if($question == '' && $notes != ''){
            $s3_data = array(
                'iid' => $s3_iid,
                'notes' => $notes,
              );
          }
          if($question != '' && $notes == ''){
            $s3_data = array(
                'iid' => $s3_iid,
                'question' => $question,
              );
          }
          Questions::UpdateOrCreate($s3_data); 
         }*/

        $pop_interviewid = $request->input('pop_interviewid');
        $pop_name = $request->input('pop_name');
        $pop_email = $request->input('pop_email');
        $pop_note = $request->input('pop_note');

        $to = $pop_email;
        $subject = "Invite for interview";
        $txt = url('/').'/interviewee/'.$pop_interviewid."<br>".$pop_note;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: webmaster@example.com";

        $mail = mail($to,$subject,$txt,$headers);
        if($mail){
          echo 'Mail Send successfully.';
        }else{
          echo 'Mail can\'t send.';
        }
      }
    }

    public function service()
    {

	 $service = DB::table('services')
            ->select('*')
            ->get();

        return view('front/service',compact('service'));
    }
    public function about()
    {

        $about_us = AboutUs::first();

        return view('front/about',compact('about_us'));
    }
    public function contact()
    {

        $contact_us = ContactUs::first();

        return view('front/contact',compact('contact_us'));
    }

  public function dashboard()
  {
  	  $service = DB::table('services')
              ->select('*')
              ->get();
      $login_type = session('login_type');
      if($login_type == 'interviewee'){
          $user_id = session('user_name');
          $interviewdata = DB::table('interviewer_1 AS i1')
               ->join('interviewee_2 AS i2','i2.iid','=','i1.iid')
               ->join('users AS u','i1.user_id','=','u.id')
               ->select('i1.*','i2.*','i1.iid AS key','i1.created_at AS created_date')
               ->where('i2.email_wee',$user_id)
               ->get();
      }else{
          $user_id = session('user_id');
          $interviewdata = DB::table('interviewer_1 AS i1')
               ->leftjoin('interviewee_2 AS i2','i2.iid','=','i1.iid')
               ->leftjoin('users AS u','i1.user_id','=','u.id')
               ->select('i1.*','i2.*','i1.iid AS key','i1.created_at AS created_date')
               ->where('i1.user_id',$user_id)
               ->get();  
      }
      

      return view('front/dashboard',compact('service','interviewdata'));
  }

  public function profile()
  {
      $login_type = session('login_type');
      if($login_type == 'interviewee'){
          $user_id = session('user_id');
          $profile_data = DB::table('user_interviewee')
               ->select('*')
               ->where('id',$user_id)
               ->first();
      }else{
          $user_id = session('user_id');
          $profile_data = DB::table('users')
               ->select('*')
               ->where('id',$user_id)
               ->first();
      }

      return view('front/profile',compact('profile_data'));
  }

  public function update_profile(Request $request)
  {
      $login_type = session('login_type');
      $id = $request->input('id');
      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $email = $request->input('email');
      $password = $request->input('password');

      if($login_type == 'interviewee'){
          $user_id = session('user_name');
          DB::table('user_interviewee')
                ->where('id', $id)
                ->update(['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => $password]);
          session(['user_name'=>$email]);
      }else{
          $user_id = session('user_id');
          DB::table('users')
                ->where('id', $id)
                ->update(['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => $password]);

          session(['user_name'=>$email]);
      }

      return Redirect::to('/')->with('success','Data Saved.')->with('step','5');
  }

  public function delete($id)
  {
      $delete = array(
                  'iid' => $id
        );
      DB::table('interviewer_1')->where('iid', '=', $id)->delete();
      DB::table('interviewee_2')->where('iid', '=', $id)->delete();
      DB::table('questions_3')->where('iid', '=', $id)->delete();

      $service = DB::table('services')
            ->select('*')
            ->get();
      $user_name = session('user_name');
      $interviewdata = DB::table('interviewer_1 AS i1')
               ->leftjoin('interviewee_2 AS i2','i2.iid','=','i1.iid')
               ->select('i1.*','i2.*','i1.iid AS key')
               ->where('i1.email',$user_name)
               ->get();

           
      return Redirect::to('dashboard')->with('success','Interview delete successfully.');
  }
  public function register()
    {
        return view('front/register');
    }

  public function check_login(Request $request)
  {

        $username = $request->input('username');
        $password = $request->input('password');
	      $login_type = $request->input('login_type');
	      
        if($login_type == 'interviwer'){ 
            $Front_login = new Front_login();
              
            $check = DB::table('users')
                                ->where('email',$username)
                                ->where('password',$password)
                                ->first();

            if(isset($check->email) && !empty($check->email)){

                session(['login_type'=>'frontuser']);
                session(['user_id'=>$check->id]);
                session(['user_name'=>$check->email]);
                session(['activity_id'=>$check->id]);
                session(['activity_type'=>0]); 

                return Redirect::to('/');
            }else{ 
                return Redirect::to('/login')->with('error','Invalid Username or Password');
            }
        }else{
            $check = DB::table('user_interviewee')
                                ->where('email',$username)
                                ->where('password',$password)
                                ->first();

            if(isset($check->email) && !empty($check->email)){

                session(['login_type'=>'interviewee']);
                session(['user_id'=>$check->id]);
                session(['user_name'=>$check->email]);
                session(['activity_id'=>$check->id]);
                session(['activity_type'=>0]); 

                return Redirect::to('/');
            }else{ 
                return Redirect::to('/login')->with('error','Invalid Username or Password');
            }
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
