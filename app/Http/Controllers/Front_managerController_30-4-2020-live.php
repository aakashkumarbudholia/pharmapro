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
use App\Jobads;
use App\ApplyModel;
use App\Local;
use File;
use Illuminate\Routing\UrlGenerator;
use App;

class Front_managerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

   public function index()
    {
     
      $delete_prev_35day = DB::table('job_post')
                      ->where('created_at','<',date_sub(NOW(),date_interval_create_from_date_string("35 days")))
                      ->delete();
      
	    $service = DB::table('services')
            ->select('*')
            ->get();

	if(empty(session('lang')))
		{
			App::setLocale('fr');
			session(['lang'=>'fr']);
		}
      
      $job_post = DB::table('job_post')
            ->leftjoin('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price')
            ->limit(10)
            ->where('job_post.status','=',1)
            ->orderBy('job_post.id', 'desc')
            ->get();

      return view('front/indexmain',compact('service','job_post'));
    }

	public function local($id)
	{

	 $service = DB::table('services')
            ->select('*')
            ->get();

	 $job_post = DB::table('job_post')
            ->join('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price')
            ->limit(5)
            ->orderBy('job_post.id', 'desc')
            ->get();


	App::setLocale($id);

	session(['lang'=>$id]);
	      
	return Redirect::to('/'.$id);

	}




  public function login()
  {
    return view('front/login');
  }

  public function save_register(Request $request)
 	{



	$recaptcha = $request->input('g-recaptcha-response');
	if(empty($recaptcha))
	{

	return Redirect::to('/creer-profil-employeur')->with('error', 'Invalid Captcha');

	} else {

	$google_url="https://www.google.com/recaptcha/api/siteverify";
	$secret='6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
	$ip=$_SERVER['REMOTE_ADDR'];
	// $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

	}	


	  //$username = $request->input('username');
	  //$password = md5($request->input('password'));
  	$password = $request->input('password');
  	$password1 = $request->input('password1');
  	$email = $request->input('email');
  	$fname = $request->input('fname');
        $lname = $request->input('lname');
  	$login_type = $request->input('login_type');

	$pharmacie = $request->input('pharmacie');
	$adresse = $request->input('adresse');
	$postal = $request->input('postal');
	$villa = $request->input('villa');
	$departement = $request->input('departement');

  	if($password != $password1)
  	{
  		return Redirect::to('/creer-profil-employeur')->with('error', 'Password and re-enter password should be same.');
  	}
    if($login_type == 'interviwer'){
  	    $check = DB::table('users')
                 ->select('email')
                 ->where('email',$email)
                 ->first();
    }else{
        $check = DB::table('user_interviewee')
                 ->select('email')
                 ->where('email',$email)
                 ->first();
    }

    if(!empty($check->email)){
      return Redirect::to('/creer-profil-employeur')->with('error', 'Email Already Exist.');
    }


		$data = array(
                  'password' => $password,
                  'email'=> $email,
            	  'first_name' => $fname,
                  'last_name' => $lname,
		  'created_at' => date("Y-m-d H:i:s"),
		  'status' => 'approved',
		'pharmacie'=> $pharmacie,
		'adresse'=> $adresse,
		'postal'=> $postal,
		'villa'=> $villa,
		'departement'=> $departement,
		);

    //UserRegistration::UpdateOrCreate($data);

    if($login_type == 'interviwer'){
        DB::table('users')->insert($data);
    }else{
        DB::table('user_interviewee')->insert($data);
    }
    
		return Redirect::to('/creer-profil-employeur')->with('success','Registration Completed.');
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

	$jobdata = DB::table('job_post')
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

        $current_date = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
                            ->where('deadline','<',$current_date)
                            ->where('deadline','!=','None')
                            ->update(array('deadline' => 'None'));

	$lang = session('lang');

	   $service = DB::table('services')
            ->select('*')
	    ->where('lang','=',$lang)
            ->get();
                            
       return view('front/multi-step-form',compact('jobdata','interviewid','interviewdata','interviewee_data','question_data','service'));
    }





  public function interview1(Request $request)
    {


      $current_date = date("m/d/Y");
      $interviewer_1 = DB::table('interviewer_1')
                          ->where('deadline','<',$current_date)
                          ->where('deadline','!=','None')
                          ->update(array('deadline' => 'None'));
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
      /*if($step == 'step_1') {
        	
		$user_id = session('user_id');
		$interviewid = $request->input('interviewid');
		$service = $request->input('service');

		$data = array(
                          'service' => $service,
                          'iid' => $interviewid,                    			
                          'user_id' => $user_id
                    );        	

        	$check = DB::table('job_post')
                                         ->select('iid')
                                         ->where('iid',$interviewid)
                                         ->first();

          if(!empty($check->iid)){
  		        $update_detail = DB::table('job_post')
                              ->where('iid', $check->iid)
                              ->update($data);
          		return Redirect::to($url.$interviewid)->with('success',__('message.savedata'))->with('step','2');
          } 
          Jobads::UpdateOrCreate($data);
       		return Redirect::to($url.$interviewid)->with('success',__('message.savedata'))->with('step','2');
      }*/

      if($step == 'step_2'){
          $s2_iid = $request->input('s2_interviewid');
          $job_title = $request->input('title');
          $job_desc = $request->input('desc');
          $company = $request->input('company');
          $email = $request->input('email');
          $phone = $request->input('phone');
          // $note = $request->input('note');
          //$link = $request->input('link');
         // $fb = $request->input('fb');
         // $tweet = $request->input('tweet');
         // $insta = $request->input('insta');
          $linkd = $request->input('linkd');


          $address = $request->input('address');
          $city = $request->input('city');
	  $state = $request->input('state');
          $country = $request->input('country');
          $pincode = $request->input('pincode');
        //  $company_desc = $request->input('company_desc');
          
          $old_company_logo = $request->input('old_company_logo');
          if ($request->hasFile('company_logo')) {
            /*$old_logo_path = public_path('/logo'). "/".  $company_logo;
            if(!empty($company_logo))
            {
              if (File::exists($old_logo_path)) {
                //unlink($old_logo_path);
              }
            }*/
            $image = $request->file('company_logo');
            $logo_name = $image->getClientOriginalName();
            $destinationPath = public_path('/logo');
            $imagePath = $destinationPath. "/".  $logo_name;
            $image->move($destinationPath, $logo_name);
          }else{
            $logo_name = $old_company_logo;
          }

         $check = DB::table('job_post')
                                         ->select('iid','id')
                                         ->where('iid',$s2_iid)
                                         ->first();
          $job_id_tmp = isset($check->id) ? $check->id : '';
          
         /* $day = date("d");
          $month = date("m");
          $year = date("y");

          $job_id = 'pef'.$day.$month.$year.'a'.$job_id_tmp;
	*/

	// code to get dynamic job id start

	
			$current_date = date("Y-m-d");			
			$jobs = DB::table('job_post')
			->where('created_at', 'like', '%'.$current_date.'%')
			->get();

			$cnt = count($jobs);
			$day = date("d");
			$month = date("m");
			$year = date("y");

			if($cnt >= 9)
			{
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a'.$cnt1;
			} else {
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a0'.$cnt1;
			}

		// code to get dynamic job id end





          $interviewid = $request->input('interviewid');
          if($user_type == 'admin'){
              
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
          $s2_data = array(
                          'job_title' => $job_title,
                          'job_desc' => $job_desc,
                          //'company' => $company,
                          //'company_logo' => $logo_name,
                        //  'company_desc' => $company_desc,
                          //'email'=> $email,
                          //'phone' => $phone,
                         // 'note' => $note,
			  //'link' => $link,
                         // 'fb' => $fb,
                         // 'tweet' => $tweet,
                          /*'linkd'=> $linkd,*/
                         // 'insta' => $insta,
                         // 'job_id' => $job_id,
                          'iid' => $interviewid,
                          'user_id' => $user_id,

                          
                    );
          
          if(!empty($check->iid)){
              $update_detail = DB::table('job_post')
                              ->where('iid', $check->iid)
                              ->update($s2_data);
              return Redirect::to($url.$s2_iid)->with('success', __('message.savedata') )->with('step','1');
          }else{
            
            //$last_inserted_id = Jobads::last();
            //$job_id = 'pef'.$day.$month.$year.'a'.$inserted_data->id;

		// code to get dynamic job id start

	
			$current_date = date("Y-m-d");			
			$jobs = DB::table('job_post')
			->where('created_at', 'like', '%'.$current_date.'%')
			->get();

			$cnt = count($jobs);
			$day = date("d");
			$month = date("m");
			$year = date("y");

			if($cnt >= 9)
			{
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a'.$cnt1;
			} else {
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a0'.$cnt1;
			}

		// code to get dynamic job id end

	    $inserted_data = Jobads::UpdateOrCreate($s2_data);

            $update_detail = DB::table('job_post')
                              ->where('id',$inserted_data->id)
                              ->update(array('job_id' => $job_id));
            
            return Redirect::to($url.$s2_iid)->with('success', __('message.savedata') )->with('step','2');
          }
        
      }

      if($step == 'step_3') {
      	 $s3_iid = $request->input('s3_interviewid');
         $s3_ques = $request->input('s3_que');
        
	  $address = $request->input('address');
          $city = $request->input('city');
	  $state = $request->input('state');
          $country = $request->input('country');
          $pincode = $request->input('pincode');
          $company = $request->input('company');
          $email = $request->input('email');
          $phone = $request->input('phone');
          $linkd = $request->input('linkd');

         
          $s3_data = array(
                          'address' => $address,
                          'city' => $city,
                          'state' => $state,
                          'country'=> $country,
                          'pincode' => $pincode,                          
                          'company' => $company,    
                          'email'=> $email,
                          'phone' => $phone,
                          'linkd'=> $linkd,                      
                    );

          $check = DB::table('job_post')
                                         ->select('*')
                                         ->where('iid',$s3_iid)
                                         ->first();
          if(!empty($check->iid)){
              $update_detail = DB::table('job_post')
                              ->where('iid', $check->iid)
                              ->update($s3_data);
                              
              if($check->address != ''){
                return Redirect::to($url.$s3_iid)->with('success', __('message.savedata') )->with('step','2');
              }else{
                return Redirect::to($url.$s3_iid)->with('success', __('message.savedata') )->with('step','3');       
              }
         

	       }
      }

      if($step == 'step_4') {
      	 $s4_iid = $request->input('s4_interviewid');
         /*$s4_answers = $request->input('s4_ans');
         $fill_interviewer = $request->input('fill_interviewer');

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
         				'fill_interviewer' => $fill_interviewer,
         			);

         		$update_detail = DB::table('questions_3')
                              ->where('id', $id)
                              ->update($s4_data);
         }*/
         $s4_data = array('status' => 1);
         $update_detail = DB::table('job_post')
                              ->where('iid', $s4_iid)
                              ->update($s4_data);
        if($login_type == 'admin'){
            $redirect_url = 'dashboard_admin';  
         }else{
            $redirect_url = 'dashboard';  
         }
         return Redirect::to($redirect_url)->with('success', __('message.savedata') )->with('step','1');
      } 

      if($step == 'step_5') {  
      	 $s5_iid = $request->input('s5_interviewid');
        /* $s5_finals = $request->input('s5_final');
         
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
         	
         }  */
        return Redirect::to($url.$s5_iid)->with('success', __('message.savedata') )->with('step','1');
      }


      if($step == 'step_6') {
         $s6_iid = $request->input('s6_interviewid');
         $s6_finals = $request->input('s6_final');
         
         foreach ($s6_finals as $key => $s6_final) {
          $question = null;
          $notes = null;
          $anwser = null;
          $notes_precious = null;
          $anwser_precious = null;
          $interviewer_validate = null;
          $interviewee_validate = null;
          $id = '';
          foreach ($s6_final as $key => $value) {
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
            if($key == 'interviewer_validate'){
              $interviewer_validate = $value;
            }
            if($key == 'interviewee_validate'){
              $interviewee_validate = $value;
            }
            if($key == 'id'){
              $id = $value;
            }
            
          }
        $s6_data = array(
            'question' => $question,
            'notes' => $notes,
            'anwser' => $anwser,
            'notes_precious' => $notes_precious,
            'anwser_precious' => $anwser_precious,
            'interviewer_validate' => $interviewer_validate,
            'interviewee_validate' => $interviewee_validate,
          );
        $update_detail = DB::table('questions_3')
                          ->where('id', $id)
                          ->update($s6_data);
          
         }
         $login_type = session('login_type');
          $interviewer_email_data = DB::table('interviewer_1')
                          ->where('iid', $s6_iid)
                          ->select('email')
                          ->first();

          $interviewee_email_data = DB::table('interviewee_2')
                          ->where('iid', $s6_iid)
                          ->select('email_wee')
                          ->first();

          $interviewer_email = '';
          $interviewee_email = '';
          if(isset($interviewer_email_data->email)){
            $interviewer_email = $interviewer_email_data->email;
          }

          if(isset($interviewee_email_data->email_wee)){
            $interviewee_email = $interviewee_email_data->email_wee;
          }
                         
          $from = 'xavier.gruffat@pharmanetis.com';

          $to = $interviewer_email.','.$interviewee_email;
          $subject = "Interview validated";
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: '.$from."\r\n".
              'Reply-To: '.$from."\r\n" .
              'X-Mailer: PHP/' . phpversion();
              
          $message = '<html><body>';
          $message .= "<p>This interview has been validated.</p>";
          $message .= '</body></html>';
          
          $mail = mail($to,$subject,$message,$headers);

         if($login_type == 'admin'){
            return Redirect::to('dashboard_admin')->with('success', __('message.savedata') );  
         }else{
            return Redirect::to('dashboard')->with('success', __('message.savedata') );  
         }
        
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
        $from = 'xavier.gruffat@pharmanetis.com';

        $to = $pop_email;
        $subject = "Invite for interview";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
        $message = '<html><body>';
        $message .= "Interview Link : ";
        $message .= "<a href='https://www.publinetis.com/interviewee/".$pop_interviewid."'>Click Here</a>";
        $message .= "<br> Note : ".$pop_note;
        $message .= '</body></html>';
        

        $mail = mail($to,$subject,$message,$headers);
        if($mail){
          echo 'Mail Send successfully.';
        }else{
          echo 'Mail can\'t send.';
        }
      }
    }




public function interviewform()
{

/*

$current_date = date("Y-m-d");
$jobs = DB::table('job_post')
                ->where('created_at', 'like', '%'.$current_date.'%')
                ->get();

$cnt = count($jobs);
$day = date("d");
$month = date("m");
$year = date("y");

if($cnt >= 9)
{
$cnt1 = $cnt + 1;
$job_id = 'pef'.$day.$month.$year.'a'.$cnt1;
} else {
$cnt1 = $cnt + 1;
$job_id = 'pef'.$day.$month.$year.'a0'.$cnt1;
}

*/


$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$id = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);


        if(empty(session('login_type'))){
            session(['login_type'=>'interviewee']);
            session(['interviewee_id'=>$id]);
        }
      	$interviewdata = DB::table('interviewer_1')
		                 ->select('*')
		                 ->where('iid',$id)
		                 ->first();

	$jobdata = DB::table('job_post')
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

        $current_date = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
                            ->where('deadline','<',$current_date)
                            ->where('deadline','!=','None')
                            ->update(array('deadline' => 'None'));

	$lang = session('lang');

	   $service = DB::table('services')
            ->select('*')
	    ->where('lang','=',$lang)
            ->get();
                            
       return view('front/multi_interview_frm',compact('jobdata','interviewid','interviewdata','interviewee_data','question_data','service'));
    }







  public function interviewform1(Request $request)
    {

$recaptcha = $request->input('g-recaptcha-response');
if(empty($recaptcha))
{

return Redirect::to('publication-formulaire-offre-emploi')->with('error', "Invalid Captcha" )->with('step','2');

} else {

$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
$ip=$_SERVER['REMOTE_ADDR'];
// $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

}	



      $current_date = date("m/d/Y");
      $interviewer_1 = DB::table('interviewer_1')
                          ->where('deadline','<',$current_date)
                          ->where('deadline','!=','None')
                          ->update(array('deadline' => 'None'));
      

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
        $url = 'publication-formulaire-offre-emploi/';
      }else{
        $url = 'publication-formulaire-offre-emploi/';
      }
     

      if($step == 'step_2'){
          $s2_iid = $request->input('s2_interviewid');
          $job_title = $request->input('title');
          $job_desc = $request->input('desc');
         
	  $address = $request->input('address');
          $city = $request->input('city');
	  $state = $request->input('state');
          $country = $request->input('country');
          $pincode = $request->input('pincode');
          $company = $request->input('company');
          $email = $request->input('email');
          $phone = $request->input('phone');
          $linkd = $request->input('linkd');

         
          $old_company_logo = $request->input('old_company_logo');
          if ($request->hasFile('company_logo')) {
          
            $image = $request->file('company_logo');
            $logo_name = $image->getClientOriginalName();
            $destinationPath = public_path('/logo');
            $imagePath = $destinationPath. "/".  $logo_name;
            $image->move($destinationPath, $logo_name);
          }else{
            $logo_name = $old_company_logo;
          }

         $check = DB::table('job_post')
                                         ->select('iid','id')
                                         ->where('iid',$s2_iid)
                                         ->first();
          $job_id_tmp = isset($check->id) ? $check->id : '';
          
         /* $day = date("d");
          $month = date("m");
          $year = date("y");

          $job_id = 'pef'.$day.$month.$year.'a'.$job_id_tmp;  */
	
		// code to get dynamic job id start

	
			$current_date = date("Y-m-d");
			$jobs = DB::table('job_post')
					->where('created_at', 'like', '%'.$current_date.'%')
					->get();

			$cnt = count($jobs);
			$day = date("d");
			$month = date("m");
			$year = date("y");

			if($cnt >= 9)
			{
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a'.$cnt1;
			} else {
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a0'.$cnt1;
			}

		// code to get dynamic job id end


          $interviewid = $request->input('interviewid');
          if($user_type == 'admin'){
              
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
          $s2_data = array(
                          'job_title' => $job_title,
                          'job_desc' => $job_desc,
                         // 'job_id' => $job_id,
                          'iid' => $interviewid,
                          'user_id' => $user_id,
			  'address' => $address,
                          'city' => $city,
                          'state' => $state,
                          'country'=> $country,
                          'pincode' => $pincode,                          
                          'company' => $company,    
                          'email'=> $email,
                          'phone' => $phone,
                          'linkd'=> $linkd,  

                          
                    );
          
          if(!empty($check->iid)){ 
              $update_detail = DB::table('job_post')
                              ->where('iid', $check->iid)
                              ->update($s2_data);
              return Redirect::to($url)->with('success', 'Formulaire envoyé' )->with('step','1');
          }else{

           	// code to get dynamic job id start

	
			$current_date = date("Y-m-d");			
			$jobs = DB::table('job_post')
			->where('created_at', 'like', '%'.$current_date.'%')
			->get();

			$cnt = count($jobs);
			$day = date("d");
			$month = date("m");
			$year = date("y");

			if($cnt >= 9)
			{
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a'.$cnt1;
			} else {
			$cnt1 = $cnt + 1;
			$job_id = 'pef'.$day.$month.$year.'a0'.$cnt1;
			}

		// code to get dynamic job id end

	    $inserted_data = Jobads::UpdateOrCreate($s2_data);        
           // $job_id = 'pef'.$day.$month.$year.'a'.$inserted_data->id;

            $update_detail = DB::table('job_post')
                              ->where('id',$inserted_data->id)
                              ->update(array('job_id' => $job_id));

		// send email code start

			$from = $email;

			$subject = "Re : New Job Post Added";
                       	$to = "xavier.gruffat@gmail.com";
			// $to = "ncode14@gmail.com,aakash@ncodetechnologies.com";

                        $message = '<html><body>';

			$message .= '<table border=1>';
			 			
			$message .= '<tr><td>Profession</td><td>'.$job_title.'</td></tr>';
			$message .= '<tr><td>Description</td><td>'.$job_desc.'</td></tr>';
			$message .= '<tr><td>Entreprise</td><td>'.$company.'</td></tr>';
			$message .= '<tr><td>Adresse</td><td>'.$address.'</td></tr>';
			$message .= '<tr><td>Code postal</td><td>'.$pincode.'</td></tr>';
			$message .= '<tr><td>Ville</td><td>'.$city.'</td></tr>';
			$message .= '<tr><td>Département</td><td>'.$state.'</td></tr>';
			$message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
			$message .= '<tr><td>Tél</td><td>'.$phone.'</td></tr>';
			$message .= '<tr><td>Site internet ou page</td><td>'.$linkd.'</td></tr>';

			$message .= '</table>';

			$message .= '<br /><br />';

			$message .= "Job Link : ";
			$message .= "<a href='https://pharmaemploi.fr/".$job_id."'>Click Here</a>";
			$message .= '</body></html>'; 

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       			$headers .= "From:".$from."\r\n"; 
                        
                        $mail = @mail($to,$subject,$message,$headers);



		// send email code end
            
            return Redirect::to($url)->with('success', 'Formulaire envoyé' )->with('step','2');
          }
        
      }

    
      
    }



    public function remove_question($iid,$id = null)
    {
        if(!empty($id) && !empty($iid)){
            $delete_data = array(
                                    'id' => $id,
                                    'iid' => $iid
                                );
            $results = DB::table('questions_3')->where($delete_data)->delete();
            if($results){
              return Redirect::to('interview/'.$iid)->with('success','Question Deleted.')->with('step','3');
            }else{
              return Redirect::to('interview/'.$iid)->with('success','Some error.')->with('step','3');
            }
        }else{
          return Redirect::to('interview/'.$iid)->with('success','No data.')->with('step','3');
        }
    }
    public function service()
    {
      $lang = session('lang');

     $service = DB::table('services')
            ->select('*')
      ->where('lang','=',$lang)
            ->get();

	 /*$service = DB::table('services')
            ->select('*')
            ->get();*/

        return view('front/service',compact('service'));
    }
    public function about()
    {

        $about_us = AboutUs::first();

        return view('front/about',compact('about_us'));
    }
    /*public function contact()
    {

        $contact_us = ContactUs::first();

        return view('front/contact',compact('contact_us'));
    }*/

  public function dashboard()
  {
  	  $service = DB::table('services')
              ->select('*')
              ->get();
      $current_date = date("m/d/Y");
      $interviewer_1 = DB::table('interviewer_1')
                  ->where('deadline','<',$current_date)
                  ->where('deadline','!=','None')
                  ->update(array('deadline' => 'None'));
      $login_type = session('login_type');
      if($login_type == 'interviewee'){
          $user_id = session('user_id');
          $interviewdata = DB::table('apply_job')
               ->where('user_id',$user_id)
               ->get();
          return view('front/dashboard_interviewee',compact('service','interviewdata'));
      }else{
          /*$user_id = session('user_id');
          $interviewdata = DB::table('interviewer_1 AS i1')
               ->leftjoin('interviewee_2 AS i2','i2.iid','=','i1.iid')
               ->leftjoin('users AS u','i1.user_id','=','u.id')
               ->select('i1.*','i2.*','i1.iid AS key','i1.created_at AS created_date')
               ->where('i1.user_id',$user_id)
               ->get(); */ 
          $user_id = session('user_id');
          $interviewdata = DB::table('job_post')
               ->where('user_id',$user_id)
               ->orderBy('created_at','desc')
               ->get();

          return view('front/dashboard',compact('service','interviewdata'));
      }
      

      
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
      $occupation = $request->input('occupation');
      $phone = $request->input('phone');
      $website = $request->input('site');

      $old_logo = $request->input('old_logo');
      $request->hasFile('logo');
      if ($request->hasFile('logo')) {
        $old_logo_path = public_path('/logo'). "/".  $old_logo;
        if(!empty($old_logo))
        {
          if (File::exists($old_logo_path)) {
            //unlink($old_logo_path);
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
          
      if($login_type == 'interviewee'){
          $user_id = session('user_name');

          DB::table('user_interviewee')
                ->where('id', $id)
                ->update(['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => $password,'occupation' => $occupation,'phone' => $phone,'website' => $website,'profile_pic' => $logo_name]);
          session(['user_name'=>$email]);
      }else{
          $user_id = session('user_id');
          
          DB::table('users')
                ->where('id', $id)
                ->update(['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => $password,'occupation' => $occupation,'phone' => $phone,'website' => $website,'profile_pic' => $logo_name]);

          session(['user_name'=>$email]);
      }

      return Redirect::to('/profile')->with('success', __('message.savedata') )->with('step','5');
  }

  public function delete($id)
  {
      $delete = array(
                  'iid' => $id
        );
      DB::table('job_post')->where('iid', '=', $id)->delete();
      /*DB::table('interviewee_2')->where('iid', '=', $id)->delete();
      DB::table('questions_3')->where('iid', '=', $id)->delete();*/

      $service = DB::table('services')
            ->select('*')
            ->get();
      $user_name = session('user_name');
      /*$interviewdata = DB::table('interviewer_1 AS i1')
               ->leftjoin('interviewee_2 AS i2','i2.iid','=','i1.iid')
               ->select('i1.*','i2.*','i1.iid AS key')
               ->where('i1.email',$user_name)
               ->get();*/

           
      return Redirect::to('dashboard')->with('success','Job Post delete successfully.');
  }

  public function register()
    {
        return view('front/register');
    }

  public function check_login(Request $request)
  {

	
$recaptcha = $request->input('g-recaptcha-response');
if(empty($recaptcha))
{

return Redirect::to('/login')->with('error','Invalid Captcha');

} else {

$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
$ip=$_SERVER['REMOTE_ADDR'];
// $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

}	




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

		if(empty(session('lang')))
		{
			App::setLocale('en');
			session(['lang'=>'en']);
		}

                return Redirect::to('/dashboard');
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

		if(empty(session('lang')))
		{
			App::setLocale('en');
			session(['lang'=>'en']);
		}
	      



                return Redirect::to('/dashboard');
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

  public function name_auto_fill(){
    $searchTerm = $_GET['term'];
    $users = DB::table('users')
                ->where('first_name', 'like', '%'.$searchTerm.'%')
                ->get();

    $users_data = array(); 
    if(count($users) > 0){ 
        foreach ($users as $key => $value) {
            $data['id'] = $value->id; 
            $data['value'] = $value->first_name; 
            array_push($users_data, $data); 
        } 
    } 
     
    // Return results as json encoded array 
    echo json_encode($users_data); 
  }  

  public function get_auto_comp_values(Request $request)
  {
      $user_id = $request->input('user_id');
      $users = DB::table('users')
                ->where('id', '=', $user_id)
                ->first();

      echo json_encode($users);
  }

  public function name_auto_fill_interviewee(){
    $searchTerm = $_GET['term'];
    $users = DB::table('user_interviewee')
                ->where('first_name', 'like', '%'.$searchTerm.'%')
                ->get();

    $users_data = array(); 
    if(count($users) > 0){ 
        foreach ($users as $key => $value) {
            $data['id'] = $value->id; 
            $data['value'] = $value->first_name; 
            array_push($users_data, $data); 
        } 
    } 
     
    // Return results as json encoded array 
    echo json_encode($users_data); 
  }  

  public function get_auto_comp_values_interviewee(Request $request)
  {
      $user_id = $request->input('user_id');
      $users = DB::table('user_interviewee')
                ->where('id', '=', $user_id)
                ->first();

      echo json_encode($users);
  }

  public function job_detail($id)
  {
    if(!empty($id)){
      /*$jobdata = DB::table('job_post')
                     ->select('*')
                     ->where('id',$id)
                     ->first();*/
      $jobdata = DB::table('job_post')
            ->leftjoin('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price')
            ->where('job_post.job_id', $id)
            ->first();

	// echo "<pre>";print_r($jobdata);exit;

      return view('front/job_detail',compact('id','jobdata'));
    }
  }

  public function apply_job($id)
  {
    $login_type = session('login_type');
    $profile_data = array();
    if($login_type == 'interviewee'){
        $user_id = session('user_id');
        $profile_data = DB::table('user_interviewee')
             ->select('*')
             ->where('id',$user_id)
             ->first();
    }
    return view('front/apply_job',compact('id','profile_data'));
  }

  public function apply(Request $request)
  {

    if($request->file('resume')){
      $insert = new ApplyModel();
      $uniqueFileName = uniqid() . $request->file('resume')->getClientOriginalName();

       $request->file('resume')->move(
            base_path() . '/public/resume', $uniqueFileName
        ); 
       $insert->resume = $uniqueFileName;
       $insert->user_id = session('user_id');
       $insert->job_post_iid = $request->input('iid');
       $insert->save();
       return redirect()->back()->with('success', 'Job apply successfully.');  
    }else{
      return redirect()->back()->with('error', 'Please upload resume.');  
    }
  }

  public function applied_job($iid)
  {
    if(!empty($iid)){
      $apply_job = DB::table('apply_job')
                    ->join('user_interviewee','user_interviewee.id','=','apply_job.user_id')
                    ->select('apply_job.*','user_interviewee.first_name','user_interviewee.last_name','user_interviewee.email')
                    ->where('apply_job.job_post_iid',$iid)
                    ->get();  
      return view('front/applied_job',compact('apply_job'));
    }
  }

  public function all_job()
  {

    $job_post = DB::table('job_post')
            /*->leftjoin('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price') */
            ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();


    return view('front/all_job',compact('job_post','jbc'));
  }

  public function prix()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','prix')
            ->first();
    return view('front/prix',compact('service'));
  }

  public function faq_employeur()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','faq_employeur')
            ->first();
    return view('front/faq_employeur',compact('service'));
  }

  public function faq_candidat()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','faq_candidat')
            ->first();
    return view('front/faq_candidat',compact('service'));
  }

  public function qui_sommes_nous()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','qui_sommes_nous')
            ->first();
    return view('front/qui_sommes_nous',compact('service'));
  }

  public function impressum()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','impressum')
            ->first();
    return view('front/impressum',compact('service'));
  }

  public function contact()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','contact')
            ->first();
    return view('front/contact_us',compact('service'));
  }

  public function protection_des_donnees()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','protection_des_donnees')
            ->first();
    return view('front/protection_des_donnees',compact('service'));
  }

  public function cg()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','cg')
            ->first();
    return view('front/cg',compact('service'));
  }

  public function cg_dutilisation()
  {
    if(empty(session('lang')))
    {
      App::setLocale('en');
      session(['lang'=>'en']);
    }else{
      App::setLocale('fr');
      session(['lang'=>'fr']);
    }
    $lang = session('lang');

     $service = DB::table('page_cg')
            ->select('*')
      ->where('lang','=',$lang)
      ->where('page_type','=','cg_dutilisation')
            ->first();
    return view('front/cg_dutilisation',compact('service'));
  }
  
  public function job_filter(Request $request)
  {

      $profession_val = $request->input('profession_val');
      $profession_val1 = $request->input('profession_val1');
      $profession_val2 = $request->input('profession_val2');



      $job_post = [];
      if(!empty($profession_val) && $profession_val != 1111){
          $job_post = DB::table('job_post')
            ->where('job_title','=',$profession_val)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val1)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val2)
	    ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();

      }else if(!empty($profession_val1) && $profession_val1 != 1111){ 
          $job_post = DB::table('job_post')
            ->where('job_title','=',$profession_val)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val1)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val2)
	    ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();

      }else if(!empty($profession_val2) && $profession_val2 != 1111){
          $job_post = DB::table('job_post')
            ->where('job_title','=',$profession_val)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val1)
	    ->where('status','=',1)
	    ->orWhere('job_title','=',$profession_val2)
	    ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();

      }else{
        $job_post = DB::table('job_post')
	    ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();
      }

      echo $html = view('front/filter_job',compact('job_post'));
  }



	

public function job_filter_regions(Request $request)
  {

      $profession_val = $request->input('profession_val');

      

      $job_post = [];
      if(!empty($profession_val)){

	$reg = DB::table('filter_department')
            ->where('region','=',$profession_val)
            ->get();


	 $newval = $reg[0]->department;

          $job_post = DB::table('job_post')
            // ->where('state','like',$newval)
	    ->whereIn('state',explode(',', $newval))
	    ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();
      }else{
        $job_post = DB::table('job_post')
            ->orderBy('id', 'desc')
            ->get();
      }

      echo $html = view('front/filter_job',compact('job_post'));
  }


	public function job_filter_department(Request $request)
	  {

	     $profession_val = $request->input('profession_val');

	      $job_post = [];
	      if(!empty($profession_val)){
		  $job_post = DB::table('department')
		    ->where('no', 'like', ''.$profession_val.'%')
		    ->get();
	      }

	      echo $html = view('front/filter_job_depart',compact('job_post'));
	  }


public function getcontact(Request $request)
  {

      $name = $request->input('username');
      $email = $request->input('email');
      $message1 = $request->input('message');

			$from = $email;

			$subject = "Re : Contact US";
                        $to = "xavier.gruffat@gmail.com";

                        $message = '<html><body>';

			$message .= '<table border=1>';
			 			
			$message .= '<tr><td>Name</td><td>'.$name.'</td></tr>';
			$message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
			$message .= '<tr><td>Message</td><td>'.$message1.'</td></tr>';

			$message .= '</table>';
			
			$message .= '</body></html>'; 

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       			$headers .= "From:".$from."\r\n"; 
                        
                        $mail = @mail($to,$subject,$message,$headers);

            
            return Redirect::to('/contact')->with('success','Thank you for contacting to us.');




  }




}
