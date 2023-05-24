<?php

namespace App\Http\Controllers\admin;

use App\AdminInterviewee;
use App\Http\Controllers\Controller;
use App\Jobads;
use App\Notiemail;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

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
        return view('admin.job_post', compact('job_post'));
    }
    public function add()
    {
        $action = 'Add';
        return view('admin.interviewee_form', compact('action'));
    }
    public function insert(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name  = $request->input('last_name');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $data = array(
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
            'password'   => $password,
        );
        AdminInterviewee::UpdateOrCreate($data);
        return Redirect::to('admin/interviewee')->with('success', 'Interviewee added.');
    }
    public function edit($id)
    {
        $action  = 'edit';
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('id', $id)
            ->first();
        $interviewid = $jobdata->iid;
        $id          = $jobdata->id;
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi_interview_frm_edit', compact('jobdata', 'interviewid', 'service', 'id'));
    }
    public function edit_reactive($id)
    {
        $action  = 'edit';
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('id', $id)
            ->first();
        $interviewid = $jobdata->iid;
        $id          = $jobdata->id;
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi_interview_frm_edit_reactive', compact('jobdata', 'interviewid', 'service', 'id'));
    }
    public function update_jobs(Request $request)
    {
        $id  = $request->input('jobid');
        $url = 'admin/publication-formulaire-offre-emploi/edit/' . $id;
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
            //return Redirect::to($url)->with('error', "Invalid Captcha")->with('step', '2');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
            $ip         = $_SERVER['REMOTE_ADDR'];
            // $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        }
       /* $offer = "";
        if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
            $offer = "non précisée";
        } else {
            $offer = $request->input('offer');
        }*/
         $offerdate = "";
        if (!empty($request->input('show_date')) && $request->input('show_date') == 'on') {
            $offerdate = "non précisée";
        } else {
            $offerdate = $request->input('offerdate');
        }
        $old_desc_image = $request->input('old_desc_image');
        if ($request->hasFile('desc_image')) {                
            $image           = $request->file('desc_image');
            $desc_image      = time().$image->getClientOriginalName();
            $destinationPath = public_path('/desc_image');
            $imagePath       = $destinationPath . "/" . $desc_image;
            $image->move($destinationPath, $desc_image);
        } else {
            $desc_image = $old_desc_image;
        }
        $job_title   = $request->input('title');
        $entreprise  = $request->input('entreprise');
        $entreprise1 = $request->input('entreprise1');
        $job_desc = $request->input('desc');
        $travail  = $request->input('travail');
        $tcontrat = $request->input('tcontrat');
        $compliment = $request->input('compliment');
        $complimenttravail = $request->input('complimenttravail');
        $address = $request->input('address');
        $city    = $request->input('city');
        $state   = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');
        $company = $request->input('company');
        $email   = $request->input('email');
        $phone   = $request->input('phone');        
        $show_email     = $request->input('show_email');
        $show_phone     = $request->input('show_phone');
        $show_linkd     = $request->input('show_linkd');
        $show_date = $request->input('show_date');
        $linkd   = $request->input('linkd');
        if ($linkd != '') {
            $linkd = $request->input('http') . $linkd;
        }
        $urgent = $request->input('urgent');
        $hosted = $request->input('hosted');

       //Add new Code Date:-11/04/2022
        $jobtype  = $request->input('descoptionvalue'); //Add new lineDate:-08/04/2022   
        $old_pdf = $request->input('oldpdf'); 
        $pdf_name="";
        if ($jobtype == 1) {            
            if($request->hasFile('descfile')){
                $image           = $request->file('descfile');
                $pdf_name       = $image->getClientOriginalName();
                $destinationPath1 = public_path('/resume');
                $imagePath       = $destinationPath1 . "/" . $pdf_name;
                $image->move($destinationPath1, $pdf_name);
            }else {
                $pdf_name = $old_pdf;
            } 
        }
        if ($jobtype == 1) {
            $job_desc    = $pdf_name;
        }

        if ($jobtype == 3) {
            $job_desc    = $request->input('desclink');                
        }
        $s2_data = array(
            'job_title'   => $job_title,
            'job_desc'    => $job_desc,
            'entreprise'  => $entreprise,
            'entreprise1' => $entreprise1,
            'offerdate'   => $offerdate,
            'urgent'      => $urgent,
            'hosted'      => $hosted,
            'travail'     => $travail,
            'tcontrat'    => $tcontrat,
            'compliment'  => $compliment,
            'complimenttravail'=> $complimenttravail,
            'desc_image'  => $desc_image,
            'address'     => $address,
            'city'        => $city,
            'state'       => $state,
            'country'     => $country,
            'pincode'     => $pincode,
            'company'     => $company,
            'email'       => $email,
            'phone'       => $phone,
            'show_email'  => $show_email,
            'show_phone'  => $show_phone,
            'show_linkd'  => $show_linkd,
            'show_date'=>$show_date,
            'linkd'       => $linkd,
            'job_desc_type' => $jobtype,
        );
        //  $url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;
        $update_detail = DB::table('job_post')
            ->where('id', $id)
            ->update($s2_data);
        return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '2');
    }
    public function update_jobs_reactive(Request $request)
    {
        $id  = $request->input('jobid');
        $url = 'admin/publication-formulaire-offre-emploi/edit_reactive/' . $id;
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
            return Redirect::to($url)->with('error', "Invalid Captcha")->with('step', '2');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
            $ip         = $_SERVER['REMOTE_ADDR'];
            // $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        }
       /* $offer = "";
        if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
            $offer = "non précisée";
        } else {
            $offer = $request->input('offer');
        }*/
         $offerdate = "";
        if (!empty($request->input('show_date')) && $request->input('show_date') == 'on') {
            $offerdate = "non précisée";
        } else {
            $offerdate = $request->input('offerdate');
        }
        $job_title   = $request->input('title');
        $entreprise  = $request->input('entreprise');
        $entreprise1 = $request->input('entreprise1');
        $job_desc = $request->input('desc');
        $travail  = $request->input('travail');
        $tcontrat = $request->input('tcontrat');
        $address = $request->input('address');
        $city    = $request->input('city');
        $state   = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');
        $company = $request->input('company');
        $email   = $request->input('email');
        $phone   = $request->input('phone');
        $linkd   = $request->input('linkd');
        if ($linkd != '') {
            $linkd = $request->input('http') . $linkd;
        }
        $urgent = $request->input('urgent');
        $hosted = $request->input('hosted');
        $current_date = date("Y-m-d");
        $jobs = DB::table('job_post')
            ->where('updated_at', 'like', '%' . $current_date . '%')
            ->get();
        $cnt   = count($jobs);
        $day   = date("d");
        $month = date("m");
        $year  = date("y");
        if ($cnt >= 9) {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a' . $cnt1;
        } else {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a0' . $cnt1;
        }
        $s2_data = array(
            'job_title'   => $job_title,
            'job_desc'    => $job_desc,
            'entreprise'  => $entreprise,
            'entreprise1' => $entreprise1,
            'offerdate'   => $offerdate,
            'urgent'      => $urgent,
            'hosted'      => $hosted,
            'travail'     => $travail,
            'tcontrat'    => $tcontrat,
            'address'     => $address,
            'city'        => $city,
            'state'       => $state,
            'country'     => $country,
            'pincode'     => $pincode,
            'company'     => $company,
            'email'       => $email,
            'phone'       => $phone,
            'linkd'       => $linkd,
            'is_deleted' => false,
            'reactive' => 1,
            'job_id'     => $job_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        //  $url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;

        $update_detail = DB::table('job_post')
            ->where('id', $id)
            ->update($s2_data);
        return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '2');
    }
    public function edit_paid($id)
    {
        $action  = 'edit';
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('id', $id)
            ->first();
        $interviewid = $jobdata->iid;
        $id          = $jobdata->id;
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi_interview_frm_edit_paid', compact('jobdata', 'interviewid', 'service', 'id'));
    }
    public function update_jobs_paid(Request $request)
    {
        $id  = $request->input('jobid');
        $url = 'admin/formulaire/edit/' . $id;
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
            return Redirect::to($url)->with('error', "Invalid Captcha")->with('step', '2');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6Lf8FekUAAAAAL5F9bE8c_Y53w1_ddWnk7h4gAwh';
            $ip         = $_SERVER['REMOTE_ADDR'];
            // $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        }
        /*$offer = "";
        if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
            $offer = "non précisée";
        } else {
            $offer = $request->input('offer');
        }*/
         $offerdate = "";
        if (!empty($request->input('show_date')) && $request->input('show_date') == 'on') {
            $offerdate = "non précisée";
        } else {
            $offerdate = $request->input('offerdate');
        }
        $job_title   = $request->input('title');
        $entreprise  = $request->input('entreprise');
        $entreprise1 = $request->input('entreprise1');
        $job_desc = $request->input('desc');
        $travail  = $request->input('travail');
        $tcontrat = $request->input('tcontrat');
        $user_type = $request->input('paid');
        $address = $request->input('address');
        $city    = $request->input('city');
        $state   = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');
        $company = $request->input('company');
        $email   = $request->input('email');
        $phone   = $request->input('phone');
        $linkd   = $request->input('linkd');
        if ($linkd != '') {
            $linkd = $request->input('http') . $linkd;
        }
        $urgent = $request->input('urgent');
        $hosted = $request->input('hosted');
        $s2_data = array(
            'job_title'   => $job_title,
            'job_desc'    => $job_desc,
            'entreprise'  => $entreprise,
            'entreprise1' => $entreprise1,
            'offerdate'   => $offerdate,
            'urgent'      => $urgent,
            'hosted'      => $hosted,
            'travail'     => $travail,
            'tcontrat'    => $tcontrat,
            'address'     => $address,
            'city'        => $city,
            'state'       => $state,
            'country'     => $country,
            'pincode'     => $pincode,
            'company'     => $company,
            'email'       => $email,
            'phone'       => $phone,
            'linkd'       => $linkd,
            'user_type'   => $user_type,
        );
        //  $url = 'admin/publication-formulaire-offre-emploi/edit/'.$id;
        $update_detail = DB::table('job_post')
            ->where('id', $id)
            ->update($s2_data);
        return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '2');
    }
    public function view($id)
    {
        $action           = 'edit';
        $interviewee_data = DB::table('job_post')
            ->join('services', 'job_post.service', '=', 'services.id')
            ->select('job_post.*', 'services.title', 'services.price')
            ->orderBy('job_post.id', 'desc')
            ->where('job_post.id', '=', $id)
            ->get();
        return view('admin.job_post_form', compact('action', 'interviewee_data'));
    }
    public function applied_job($iid)
    {
        if (!empty($iid)) {
            $apply_job = DB::table('apply_job')
                ->join('user_interviewee', 'user_interviewee.id', '=', 'apply_job.user_id')
                ->select('apply_job.*', 'user_interviewee.first_name', 'user_interviewee.last_name', 'user_interviewee.email')
                ->where('apply_job.job_post_iid', $iid)
                ->get();
            return view('admin.view_applied_job', compact('apply_job'));
        }
    }
    public function update(Request $request)
    {
        $id         = $request->input('id');
        $first_name = $request->input('first_name');
        $last_name  = $request->input('last_name');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $data = array(
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
            'password'   => $password,
        );
        AdminInterviewee::where('id', $id)->update($data);
        return Redirect::to('admin/interviewee')->with('success', 'Interviewee updated.');
    }
    public function delete($id)
    {
        AdminInterviewee::where('id', $id)->delete();
        return Redirect::to('admin/interviewee')->with('success', 'Interviewee deleted.');
    }
    public function delete_jobs($id)
    {
        // Jobads::where('id', $id)->delete();
        Jobads::where('id', $id)
            ->update(array('is_deleted' => true));
        return Redirect::to('dashboard_admin')->with('success', 'Job Ads deleted.');
    }
    public function reactive_jobs($id)
    {
        // Jobads::where('id', $id)->delete();
        // code to get dynamic job id start
        $current_date = date("Y-m-d");
        $jobs         = DB::table('job_post')
            ->where('updated_at', 'like', '%' . $current_date . '%')
            ->get();
        $cnt   = count($jobs);
        $day   = date("d");
        $month = date("m");
        $year  = date("y");
        if ($cnt >= 9) {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a' . $cnt1;
        } else {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a0' . $cnt1;
        }
        // code to get dynamic job id end
        Jobads::where('id', $id)
            ->update(array(
                'is_deleted' => false, 'job_id' => $job_id,
                'updated_at'                => date('Y-m-d H:i:s')
            ));
        return Redirect::to('dashboard_admin')->with('success', 'Job Ads activated.');
    }
    public function delete_jobs_posted($id)
    {
        // Jobads::where('id', $id)->delete();
        Jobads::where('id', $id)
            ->update(array('is_deleted' => true));
        return Redirect::to('admin/all-job')->with('success', 'Job Ads deleted.');
    }
    public function reactive_jobs_posted($id)
    {
        // code to get dynamic job id start
        $current_date = date("Y-m-d");
        $jobs         = DB::table('job_post')
            ->where('updated_at', 'like', '%' . $current_date . '%')
            ->get();
        $cnt   = count($jobs);
        $day   = date("d");
        $month = date("m");
        $year  = date("y");
        if ($cnt >= 9) {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a' . $cnt1;
        } else {
            $cnt1   = $cnt + 1;
            $job_id = 'pef' . $day . $month . $year . 'a0' . $cnt1;
        }
        // code to get dynamic job id end
        // Jobads::where('id', $id)->delete();
        Jobads::where('id', $id)
            ->update(array(
                'is_deleted' => false, 'job_id' => $job_id,
                'updated_at'                => date('Y-m-d H:i:s')
            ));
        return Redirect::to('admin/all-job')->with('success', 'Job Ads activated.');
    }
    public function status_jobs($id, $iid)
    {

  $jobs = DB::table('job_post')
                ->select('*')
                ->where('id', $id)
                ->first();

        // echo $jobs->user_type;
             //   echo "<pre>";print_r($jobs); exit;

        if ($iid == 1) {
            $data = array(
                'status' => 0,
            );
            Jobads::where('id', $id)->update($data);
        } else {
            $jobs = DB::table('job_post')
                ->select('*')
                ->where('id', $id)
                ->first();
            if (isset($jobs->user_id)) {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id', $jobs->user_id)
                    ->first();
            if(isset($users)){

                if($jobs->user_type == "paid")
                    {
                     $noti = DB::table('notification')
                            ->select('*')
                            ->where('days', "P0")
                            ->first();
                    } else {

                        $noti = DB::table('notification')
                            ->select('*')
                            ->where('days', "D0")
                            ->first();
                    }

               
                $Date = date('Y-m-d');
                $d14 = date('Y-m-d', strtotime($Date . ' + 14 day'));
                $d34 = date('Y-m-d', strtotime($Date . ' + 35 day'));
                $check = DB::table('noti_email')
                    ->where('user_id', $users->id)
                    ->where('job_ids', $jobs->job_id)
                    ->get();
                if (count($check) == 0) {
                    $dataem = array(
                        'noti'       => "D14",
                        'user_id'    => $users->id,
                        'email_date' => $d14,
                        'status'     => 0,
                        'job_ids'    => $jobs->job_id,
                    );
                    Notiemail::UpdateOrCreate($dataem);
                    $dataem1 = array(
                        'noti'       => "D35",
                        'user_id'    => $users->id,
                        'email_date' => $d34,
                        'status'     => 0,
                        'job_ids'    => $jobs->job_id,
                    );
                    Notiemail::UpdateOrCreate($dataem1);
                }
                $jobtitle = str_replace(' ', '-', $jobs->company);
                $jobtitle = str_replace('/', '-', $jobtitle);
                $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
                $jobtitle = strtolower($jobtitle);
                $urls    = "https://www.pharmapro.fr/offre-emploi/" . $jobs->job_id . "/" . $jobtitle;
                $linkurl = "<a href=$urls>$urls</a>";
                $from = 'info@pharmapro.fr';
                $cc   = 'xavier.gruffat@gmail.com';
                $to      = $users->email;
                $subject = $noti->title;
                
                $message = str_replace("title", $users->title, $noti->description);
                $message = str_replace("surname", $users->last_name, $message);
                $message = str_replace("url", $linkurl, $message);

                $urlmail = "https://api.postmarkapp.com/email";
                $ch = curl_init($urlmail);
                $data = array(
                    'X-Postmark-Server-Token' => 'c5456a13-115a-417c-b208-720948c3cd7e',
                    'From' => $from,
                    'To' => $to,
                    'Bcc' => 'xavier.gruffat@pharmapro.fr',
                    'Subject' => $subject,
                    'HtmlBody' => $message,
                    'MessageStream' => 'outbound',
                );
                $payload = json_encode($data);

                $headers = [ 
                'X-Postmark-Server-Token: c5456a13-115a-417c-b208-720948c3cd7e',
                'Content-Type: application/json',
                'Accept: application/json'
                ];

                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                /* $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: ' . $from . "\r\n" .
                    'Reply-To: ' . $from . "\r\n" .
                    'Cc: ' . $cc . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                $message = str_replace("title", $users->title, $noti->description);
                $message = str_replace("surname", $users->last_name, $message);
                $message = str_replace("url", $linkurl, $message);
                $mail = mail($to, $subject, $message, $headers); */

            }
            }
            $data = array(
                'status' => 1,
            );
            Jobads::where('id', $id)->update($data);
        }
        return Redirect::to('dashboard_admin')->with('success', 'Status updated.');
    }
    public function delete_jobs_admin($id)
    {
        Jobads::where('id', $id)->delete();
        return Redirect::to('dashboard_admin')->with('success', 'Job Ads deleted.');
    }
    public function delete_jobs_posted_admin($id)
    {
        Jobads::where('id', $id)->delete();
        return Redirect::to('admin/all-job')->with('success', 'Job Ads deleted.');
    }
    public function status_jobs_posted($id, $iid)
    {
        if ($iid == 1) {
            $data = array(
                'status' => 0,
            );
            Jobads::where('id', $id)->update($data);
        } else {
            $data = array(
                'status' => 1,
            );
            Jobads::where('id', $id)->update($data);
        }
        return Redirect::to('admin/all-job')->with('success', 'Status updated.');
    }
}