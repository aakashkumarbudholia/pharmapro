<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\AdminInterviewee;
use App\Jobads;

class JobPostController extends Controller
{
    public function index()
    {
        $job_post = DB::table('job_post')
           // ->leftjoin('services','job_post.service','=','services.id')
           ->select('job_post.*')
           // ->where('job_post.status','=',1)
            ->orderBy('job_post.id', 'desc')
            ->get();

        return view('admin.job_post',compact('job_post'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.interviewee_form',compact('action'));	
    }

    public function insert(Request $request)
    {
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'password'=> $password,
                    );

		AdminInterviewee::UpdateOrCreate($data);
		return Redirect::to('admin/interviewee')->with('success','Interviewee added.');
    }


public function edit($id)
    {

    	$action = 'edit';
    	$jobdata = DB::table('job_post')
		                 ->select('*')
		                 ->where('id',$id)
		                 ->first();



	$interviewid = $jobdata->iid;
	$id = $jobdata->id;

	$lang = session('lang');

	   $service = DB::table('services')
            ->select('*')
	    ->where('lang','=',$lang)
            ->get();

    	 return view('front/multi_interview_frm_edit',compact('jobdata','interviewid','service','id'));


	
    }

    public function update_jobs(Request $request)
    {

	$id = $request->input('jobid');
	$url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;

	$recaptcha = $request->input('g-recaptcha-response');
	if(empty($recaptcha))
	{

	 return Redirect::to($url)->with('error', "Invalid Captcha" )->with('step','2');

	} else {

	$google_url="https://www.google.com/recaptcha/api/siteverify";
	$secret='6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
	$ip=$_SERVER['REMOTE_ADDR'];
	// $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

	}

	$offer = "";	

   	if(!empty($request->input('showoffer')) && $request->input('showoffer') == 'on')	
	{		
	$offer = "non précisée";	
	} else {
	$offer = $request->input('offer');
	}
		
	 
         $job_title = $request->input('title');
	 $entreprise = $request->input('entreprise');
	 $entreprise1 = $request->input('entreprise1');
	 
          $job_desc = $request->input('desc');
	$travail = $request->input('travail');
	$tcontrat = $request->input('tcontrat');
         
	  $address = $request->input('address');
          $city = $request->input('city');
	  $state = $request->input('state');
          $country = $request->input('country');
          $pincode = $request->input('pincode');
          $company = $request->input('company');
          $email = $request->input('email');
          $phone = $request->input('phone');
          $linkd = $request->input('linkd');
          $urgent = $request->input('urgent');
	$hosted = $request->input('hosted');

	$s2_data = array(
                          'job_title' => $job_title,
                          'job_desc' => $job_desc,
			 'entreprise' => $entreprise,
			'entreprise1' => $entreprise1,
			'offerdate' => $offer,
                          'urgent' => $urgent,
			 'hosted' => $hosted,
			'travail' => $travail,
			'tcontrat' => $tcontrat,
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

	   //  $url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;

	      $update_detail = DB::table('job_post')
                              ->where('id', $id)
                              ->update($s2_data);
              return Redirect::to($url)->with('success', 'Formulaire envoyé' )->with('step','2');


    }




public function edit_paid($id)
    {

    	$action = 'edit';
    	$jobdata = DB::table('job_post')
		                 ->select('*')
		                 ->where('id',$id)
		                 ->first();



	$interviewid = $jobdata->iid;
	$id = $jobdata->id;

	$lang = session('lang');

	   $service = DB::table('services')
            ->select('*')
	    ->where('lang','=',$lang)
            ->get();

    	 return view('front/multi_interview_frm_edit_paid',compact('jobdata','interviewid','service','id'));


	
    }

    public function update_jobs_paid(Request $request)
    {

	$id = $request->input('jobid');
	$url = 'admin/formulaire/edit/'.$id;

	$recaptcha = $request->input('g-recaptcha-response');
	if(empty($recaptcha))
	{

	 return Redirect::to($url)->with('error', "Invalid Captcha" )->with('step','2');

	} else {

	$google_url="https://www.google.com/recaptcha/api/siteverify";
	$secret='6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
	$ip=$_SERVER['REMOTE_ADDR'];
	// $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

	}

	$offer = "";	

   	if(!empty($request->input('showoffer')) && $request->input('showoffer') == 'on')	
	{		
	$offer = "non précisée";	
	} else {
	$offer = $request->input('offer');
	}
		
	 
         $job_title = $request->input('title');
	 $entreprise = $request->input('entreprise');
	 $entreprise1 = $request->input('entreprise1');
	 
          $job_desc = $request->input('desc');
	$travail = $request->input('travail');
	$tcontrat = $request->input('tcontrat');

	 $user_type = $request->input('paid');
         
	  $address = $request->input('address');
          $city = $request->input('city');
	  $state = $request->input('state');
          $country = $request->input('country');
          $pincode = $request->input('pincode');
          $company = $request->input('company');
          $email = $request->input('email');
          $phone = $request->input('phone');
          $linkd = $request->input('linkd');
          $urgent = $request->input('urgent');
	$hosted = $request->input('hosted');

	$s2_data = array(
                          'job_title' => $job_title,
                          'job_desc' => $job_desc,
			 'entreprise' => $entreprise,
			'entreprise1' => $entreprise1,
			'offerdate' => $offer,
                          'urgent' => $urgent,
			 'hosted' => $hosted,
			'travail' => $travail,
			'tcontrat' => $tcontrat,
			  'address' => $address,
                          'city' => $city,
                          'state' => $state,
                          'country'=> $country,
                          'pincode' => $pincode,                          
                          'company' => $company,    
                          'email'=> $email,
                          'phone' => $phone,
                          'linkd'=> $linkd,  
			  'user_type'=> $user_type,

                          
                    );

	   //  $url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;

	      $update_detail = DB::table('job_post')
                              ->where('id', $id)
                              ->update($s2_data);
              return Redirect::to($url)->with('success', 'Formulaire envoyé' )->with('step','2');


    }



    public function view($id)
    {
    	$action = 'edit';
    	$interviewee_data = DB::table('job_post')
            ->join('services','job_post.service','=','services.id')
            ->select('job_post.*','services.title','services.price')
            ->orderBy('job_post.id', 'desc')
            ->where('job_post.id','=',$id)
            ->get();
    	return view('admin.job_post_form',compact('action','interviewee_data'));	
    }

    public function applied_job($iid)
    {
        if(!empty($iid)){
          $apply_job = DB::table('apply_job')
                        ->join('user_interviewee','user_interviewee.id','=','apply_job.user_id')
                        ->select('apply_job.*','user_interviewee.first_name','user_interviewee.last_name','user_interviewee.email')
                        ->where('apply_job.job_post_iid',$iid)
                        ->get();  
          return view('admin.view_applied_job',compact('apply_job'));
        }
    }
    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'password'=> $password,
                    );

		AdminInterviewee::where('id',$id)->update($data);
		return Redirect::to('admin/interviewee')->with('success','Interviewee updated.');
    }
    public function delete($id)
    {   
        AdminInterviewee::where('id', $id)->delete();
        return Redirect::to('admin/interviewee')->with('success','Interviewee deleted.');
    }

public function delete_jobs($id)
    {   
        Jobads::where('id', $id)->delete();
        return Redirect::to('dashboard_admin')->with('success','Job Ads deleted.');
    }


public function delete_jobs_posted($id)
    {   
        Jobads::where('id', $id)->delete();
        return Redirect::to('admin/all-job')->with('success','Job Ads deleted.');
    }


public function status_jobs($id,$iid)
    {   
       

	if($iid == 1)	
	{

		$data = array(
                        'status' => 0,
                    );

		Jobads::where('id',$id)->update($data);
	

	} else {
		
		$data = array(
                        'status' => 1,
                    );

		Jobads::where('id',$id)->update($data);


	}


        return Redirect::to('dashboard_admin')->with('success','Status updated.');
    }


public function status_jobs_posted($id,$iid)
    {   
       

	if($iid == 1)	
	{

		$data = array(
                        'status' => 0,
                    );

		Jobads::where('id',$id)->update($data);
	

	} else {
		
		$data = array(
                        'status' => 1,
                    );

		Jobads::where('id',$id)->update($data);


	}


        return Redirect::to('admin/all-job')->with('success','Status updated.');
    }



}
