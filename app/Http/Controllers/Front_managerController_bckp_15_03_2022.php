<?php
namespace App\Http\Controllers;
use App;
use App\AboutUs;
use App\ApplyModel;
use App\Front_login;
use App\Jobads;
use App\JobStats;
use App\Local;
use App\Notiemail;
use App\UserRegistration;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use SimpleXMLElement;
use ArrayToXml;
class Front_managerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Europe/Paris');
    }
    public function index()
    {
 
    $dateold = date("Y-m-d h:i:s", strtotime("-8 day")); 
    $mytoday = date("Y-m-d");
       
	$update_detail = DB::table('job_post')
                    ->where('created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
                    ->update(array('is_deleted' => true));
    // $prime_update = DB::table('job_post')->where('prime_date', '=', $mytoday)->update(array('prime_date' => $dateold));
        $urgent_14day = DB::table('job_post')
            ->where('created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("14 days")))
            ->where('urgent', '=', 'Oui')
            ->select('id')
            ->get();
        if (!empty($urgent_14day)) {
            foreach ($urgent_14day as $key => $val) {
                if (!empty($val->id)) {
                    $update_urgent = DB::table('job_post')
                        ->where('id', $val->id)
                        ->update(array('urgent' => 'Non'));
                }
            }
        }
        $service = DB::table('services')
            ->select('*')
            ->get();
        if (empty(session('lang'))) {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
	$job_post = DB::table('job_post')
            ->select('job_post.*')
            ->limit(10)
            ->where('job_post.status', '=', 1)
	    ->where('job_post.is_deleted', '=', 0)
	   // ->orderBy('job_post.user_type', 'desc')
        ->orderBy('job_post.prime_date', 'desc')
	    //->orderBy('job_post.created_at', 'desc')
            ->get();
        $job_post_count = DB::table('job_post')           
            ->select('job_post.*')
            ->where('job_post.status', '=', 1)
		->where('job_post.is_deleted', '=', 0)
            ->orderBy('job_post.id', 'desc')
            ->get(); 
         /* $job_post = DB::table('job_post')
            ->leftjoin('services', 'job_post.service', '=', 'services.id')
            ->select('job_post.*', 'services.title', 'services.price')
            ->limit(10)
            ->where('job_post.status', '=', 1)
            ->orderBy('job_post.id', 'desc')
            ->get();
        $job_post_count = DB::table('job_post')
            ->leftjoin('services', 'job_post.service', '=', 'services.id')
            ->select('job_post.*', 'services.title', 'services.price')
            ->where('job_post.status', '=', 1)
            ->orderBy('job_post.id', 'desc')
            ->get(); */
        return view('front/indexmain', compact('service', 'job_post', 'job_post_count'));
    }
   
    public function all_job_xml()
    {
         $job_post1 = DB::table('job_post')
            ->where('created_at', '>', date_sub(NOW(), date_interval_create_from_date_string("35 days")))           
            ->select('id','job_id','iid','job_title','company','created_at','state','updated_at','job_desc')
            ->orderBy('created_at', 'desc')
            ->get();
            // start xml
                                    
                        header('Content-Type: text/xml; charset=utf-8', true); //set document header content type to be XML
                       /* $rss = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom"></rss>');
                        $rss->addAttribute('version', '2.0');
                         $channel = $rss->addChild('channel'); //add channel node
                        $atom = $rss->addChild('atom:atom:link'); //add atom node
                        $atom->addAttribute('href', 'http://localhost'); //add atom node attribute
                        $atom->addAttribute('rel', 'self');
                        $atom->addAttribute('type', 'application/rss+xml');
                        $title = $rss->addChild('title','Sanwebe'); //title of the feed
                        $description = $rss->addChild('description','description line goes here'); //feed description
                        $link = $rss->addChild('link','http://www.sanwebe.com'); //feed site
                        $language = $rss->addChild('language','en-us'); //language
                        //Create RFC822 Date format to comply with RFC822
                        $date_f = date("D, d M Y H:i:s T", time());
                        $build_date = gmdate(DATE_RFC2822, strtotime($date_f)); 
                        $lastBuildDate = $rss->addChild('lastBuildDate',$date_f); //feed last build date
                        $generator = $rss->addChild('generator','PHP Simple XML'); //add generator node
                            */
                         $rss = new SimpleXMLElement('<jobs></jobs>');
                        foreach ($job_post1 as $key => $value) {
                            $jobtitle = str_replace('/', '-', $value->job_title);
                            $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
                            $link = url('/offre-emploi/'.$value->job_id.'/'.$jobtitle);
                            $dt = $value->created_at;
                            $mydt = date( "d.m.Y", strtotime( "$dt +35 day" ) );
                            $dt1 = $value->created_at;
                            $mydt1 = date( "d.m.Y", strtotime( "$dt1 +0 day" ) );
                            $dt2 = $value->updated_at;
                            $mydt2 = date( "d.m.Y", strtotime( "$dt2 +0 day" ) );
                                             
                          
                                $item = $rss->addChild('job'); 
                                $item->addAttribute('id', $value->id);
                                $title = $item->addChild('name', $value->job_title); 
                                $link = $item->addChild('link', $link); 
                                $guid = $item->addChild('region',  $value->state);                              
                                
                                $description = $item->addChild('description', '<![CDATA['. htmlentities($value->job_desc) . ']]>'); 
                                
                               // $date_rfc = gmdate(DATE_RFC2822, strtotime($value->company));
                                $pubDate = $item->addChild('pubdate', $mydt1); 
                                $updated = $item->addChild('updated', $mydt2); 
                              //  $salary = $item->addChild('salary', '0'); 
                                $company = $item->addChild('company', $value->company); 
                                 $expire = $item->addChild('expire', $mydt); 
                                $jobtype = $item->addChild('jobtype', 'full-time'); 
                          
                        }
                       
                        echo $rss->asXML(); //output XML
            // end xml
            exit;
    }
    public function local($id)
    {
        $service = DB::table('services')
            ->select('*')
            ->get();
        $job_post = DB::table('job_post')
            ->join('services', 'job_post.service', '=', 'services.id')
            ->select('job_post.*', 'services.title', 'services.price')
            ->limit(5)
            ->orderBy('job_post.id', 'desc')
            ->get();
        App::setLocale($id);
        session(['lang' => $id]);
        return Redirect::to('/' . $id);
    }
    public function forgotpassword()
    {
        return view('front/forgotpassword');
    }
    public function check_forgotpassword(Request $request)
    {
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
              return Redirect::to('forgotpassword')->with('error', "Invalid Captcha");
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
        }
        $email = $request->input('username');
        $check = DB::table('users')
            ->select('email', 'password', 'id')
            ->where('email', $email)
            ->first();
        if (!empty($check->email)) {
            $from = "xavier.gruffat@gmail.com";
            $subject = "Réactivation du mot de passe oublié (Pharmapro.fr)";
            $to      = $check->email;
            $userid = $check->id;
            $message = '<html><body>';
            $link = "https://www.pharmapro.fr/changepassword/" . $userid;
            /* $message .= '<table border=1>';
            $message .= '<tr><td>Email</td><td>'.$check->email.'</td></tr>';
            $message .= '<tr><td>Password</td><td>'.$check->password.'</td></tr>'; */
            $message .= '<table>';
            $message .= '<tr><td>Pour réactiver votre mot de passe sur Pharmapro.ch, <a href=' . $link . ' target="blank">cliquez-ici.</a></td></tr>';
            $message .= "<tr><td><br /></td></tr>";
            $message .= "<tr><td>L'équipe de Pharmapro.fr</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:" . $from . "\r\n";
            $mail = @mail($to, $subject, $message, $headers);
            return Redirect::to('/forgotpassword')->with('success', 'Un e-mail vous a été envoyé pour réactiver votre mot de passe. Vous le recevrez seulement si vous avez un compte actif sur Pharmapro.fr.');
        } else {
            return Redirect::to('/forgotpassword')->with('error', 'Email address done not exist.');
        }
    }
    public function changepassword($id)
    {
        $userid = $id;
        return view('front/changepassword', compact('userid'));
    }
    public function check_changepassword(Request $request)
    {
        $pass   = $request->input('username');
        $pass1  = $request->input('username1');
        $userid = $request->input('userid');
        /* $check = DB::table('users')
        ->select('email','password','id')
        ->where('email',$email)
        ->first();  */
        if ($pass != $pass1) {
            return Redirect::to('/changepassword/' . $userid)->with('error', 'Both fields must be with same value.');
        }
        DB::table('users')
            ->where('id', '=', $userid)
            ->update(array('password' => $pass));
        return Redirect::to('/changepassword/' . $userid)->with('success', 'Votre mot de passe a été modifié avec succès.');
    }
    public function login()
    {
        return view('front/login');
    }
    public function save_register(Request $request)
    {
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
          // return Redirect::to('/creer-profil-employeur')->with('error', 'Invalid Captcha');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
            // $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        }
        //$username = $request->input('username');
        //$password = md5($request->input('password'));
        $entreprise = $request->input('entreprise');
        $password   = $request->input('password');
        $password1  = $request->input('password1');
        $email      = $request->input('email');
        $fname      = $request->input('fname');
        $lname      = $request->input('lname');
        $login_type = $request->input('login_type');
        $pharmacie   = $request->input('pharmacie');
        $adresse     = $request->input('adresse');
        $postal      = $request->input('postal');
        $villa       = $request->input('villa');
        $departement = $request->input('departement');
        if ($password != $password1) {
            return Redirect::to('/creer-profil-employeur')->with('error', 'Password and re-enter password should be same.');
        }
        if ($login_type == 'interviwer') {
            $check = DB::table('users')
                ->select('email')
                ->where('email', $email)
                ->first();
        } else {
            $check = DB::table('user_interviewee')
                ->select('email')
                ->where('email', $email)
                ->first();
        }
        if (!empty($check->email)) {
            return Redirect::to('/creer-profil-employeur')->with('error', 'Email Already Exist.');
        }
        $data = array(
            'password'    => $password,
            'entreprise'  => $entreprise,
            'email'       => $email,
            'first_name'  => $fname,
            'last_name'   => $lname,
            'created_at'  => date("Y-m-d H:i:s"),
            'status'      => 'approved',
            'pharmacie'   => $pharmacie,
            'adresse'     => $adresse,
            'postal'      => $postal,
            'villa'       => $villa,
            'departement' => $departement,
        );
        //UserRegistration::UpdateOrCreate($data);
        if ($login_type == 'interviwer') {
            DB::table('users')->insert($data);
        } else {
            DB::table('user_interviewee')->insert($data);
        }
        return Redirect::to('/creer-profil-employeur')->with('success', 'Registration Completed.');
    }
    public function interview($id)
    {
        $user_id = session('user_id');
        $userdata = DB::table('users')
            ->select('*')
            ->where('id', $user_id)
            ->first();
        //echo "<pre>";print_r($userdata);exit;
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
	   $arch = 0;
        return view('front/multi-step-form', compact('userdata', 'jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service','arch'));
    }
    public function acheter_premium($id)
    {

        $user_id = session('user_id');
        $userdata = DB::table('users')
            ->select('*')
            ->where('id', $user_id)
            ->first();
        //echo "<pre>";print_r($userdata);exit;
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        $arch = 0;
        return view('front/multi-step-form-acheter', compact('userdata', 'jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service','arch'));
    }
    public function interview_arch($id)
    {
        $user_id = session('user_id');
        $userdata = DB::table('users')
            ->select('*')
            ->where('id', $user_id)
            ->first();
        // echo "<pre>";print_r($userdata);exit;
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
	   $arch = 1;
        return view('front/multi-step-form-arch', compact('userdata', 'jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service','arch'));
    }
 public function interview_reactive($id)
    {
        $user_id = session('user_id');
        $userdata = DB::table('users')
            ->select('*')
            ->where('id', $user_id)
            ->first();
        // echo "<pre>";print_r($userdata);exit;
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi-step-form-reactive', compact('userdata', 'jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service'));
    }
    public function interview1(Request $request)
    {
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        //echo "<pre>";
        //echo $request->input('s2_interviewid');
        $step       = $request->input('btn_step');
        $login_type = session('login_type');
        $user_type  = session('login_type');
        if ($user_type == 'admin') {
            $interviewid = $request->input('interviewid');
            $get_user_id = DB::table('interviewer_1')
                ->select('user_id')
                ->where('iid', $interviewid)
                ->first();
            if (isset($get_user_id->user_id)) {
                $user_id = $get_user_id->user_id;
            } else {
                $user_id = '';
            }
        } else {
            $user_id = session('user_id');
        }
        if ($login_type == 'interviewee') {
            $url = 'interviewee/';
        } else {
            $url = 'interview/';
        }
       
        if ($step == 'step_2') {
            $offer = "";
            if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
                $offer = "non précisée";
            } else {
                $offer = $request->input('offer');
            }
            $user_type = $request->input('paid');
            $s2_iid    = $request->input('s2_interviewid');
            $job_title = $request->input('title');
            $travail   = $request->input('travail');
            $tcontrat  = $request->input('tcontrat');
            $job_desc  = $request->input('desc');
            $urgent    = $request->input('urgent');
            $hosted    = $request->input('hosted');
            $company   = $request->input('company');
            $email     = $request->input('email');
            $phone     = $request->input('phone');
            $show_email     = $request->input('show_email');
            $show_phone     = $request->input('show_phone');
           
            $linkd = $request->input('linkd');
            if ($linkd != '') {
                $linkd = $request->input('http') . $linkd;
            }
            $entreprise  = $request->input('entreprise');
            $entreprise1 = $request->input('entreprise1');
            $address = $request->input('address');
            $city    = $request->input('city');
            $state   = $request->input('state');
            $country = $request->input('country');
            $pincode = $request->input('pincode');
            $compliment = $request->input('compliment');
            $complimenttravail = $request->input('complimenttravail');

            $offer = "";
            $s3_iid  = $request->input('s3_interviewid');
            $s3_ques = $request->input('s3_que');
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
            $entreprise1 = $request->input('entreprise1');
           
            $old_company_logo = $request->input('old_company_logo');
            $old_desc_image = $request->input('old_desc_image');
            if ($request->hasFile('company_logo')) {
                
                $image           = $request->file('company_logo');
                $logo_name       = $image->getClientOriginalName();
                $destinationPath = public_path('/logo');
                $imagePath       = $destinationPath . "/" . $logo_name;
                $image->move($destinationPath, $logo_name);
            } else {
                $logo_name = $old_company_logo;
            }
            if ($request->hasFile('desc_image')) {                
                $image           = $request->file('desc_image');
                $desc_image      = time().$image->getClientOriginalName();
                $destinationPath = public_path('/desc_image');
                $imagePath       = $destinationPath . "/" . $desc_image;
                $image->move($destinationPath, $desc_image);
            } else {
                $desc_image = $old_desc_image;
            }
            $check = DB::table('job_post')
                ->select('iid', 'id', 'user_type')
                ->where('iid', $s2_iid)
                ->first();
            $job_id_tmp = isset($check->id) ? $check->id : '';
            // code to get dynamic job id start
            $current_date = date("Y-m-d");
            $jobs         = DB::table('job_post')
                ->where('created_at', 'like', '%' . $current_date . '%')
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
            $interviewid = $request->input('interviewid');
            if ($user_type == 'admin') {
                $get_user_id = DB::table('interviewer_1')
                    ->select('user_id')
                    ->where('iid', $interviewid)
                    ->first();
                if (isset($get_user_id->user_id)) {
                    $user_id = $get_user_id->user_id;
                } else {
                    $user_id = '';
                }
            } else {
                $user_id = session('user_id');
            }	   
            $dt = date('Y-m-d');
            $mydt = date( "Y-m-d", strtotime( "$dt +7 day" ) );
            $jobtype  = $request->input('descoptionvalue');
            $old_pdf = $request->input('oldpdf');
            if ($jobtype == 1) {
                if ($request->hasFile('descfile')) {
                    $image           = $request->file('descfile');
                    $pdf_name       = $image->getClientOriginalName();
                    $destinationPath1 = public_path('/resume');
                    $imagePath       = $destinationPath1 . "/" . $pdf_name;
                    $image->move($destinationPath1, $pdf_name);
                   } else {
                    $pdf_name = $old_pdf;
                   } 
            }
            if ($jobtype == 1) {
            $job_desc    = $pdf_name;
            }
            if ($jobtype == 2) {
            $job_desc    = $request->input('desc');
            }
            if ($jobtype == 3) {
            $job_desc    = $request->input('desclink');
            }
		 $s2_data = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'user_type'   => $user_type,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
		        'prime_date' => $mydt,
                'job_desc_type' => $jobtype,
                'email'       => $email,
                'phone'       => $phone,
                'show_email'  => $show_email,
                'show_phone'  => $show_phone,
                'desc_image' => $desc_image,
                'compliment' => $compliment,
                'complimenttravail'=> $complimenttravail,
                'address'     => $address,
                'city'        => $city,
                'state'       => $state,
                'country'     => $country,
                'pincode'     => $pincode,
                'company'     => $company,
                'linkd'       => $linkd,
                'entreprise1' => $entreprise1,
            );
            $s2_data_9 = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'user_type'   => $user_type,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
                'job_desc_type' => $jobtype,
                'compliment' => $compliment,
                'desc_image' => $desc_image,
                'email'       => $email,
                'phone'       => $phone,
                'show_email'  => $show_email,
                'show_phone'  => $show_phone,
                'address'     => $address,
                'city'        => $city,
                'state'       => $state,
                'country'     => $country,
                'pincode'     => $pincode,
                'company'     => $company,
                'linkd'       => $linkd,
                'entreprise1' => $entreprise1,
                'complimenttravail'       => $complimenttravail,
		            );
             $s2_data_inst = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'user_type'   => $user_type,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
                'prime_date' => date('Y-m-d'),
                'job_desc_type' => $jobtype,
                'compliment' => $compliment,
                'desc_image' => $desc_image,
                'email'       => $email,
                'phone'       => $phone,
                'show_email'  => $show_email,
                'show_phone'  => $show_phone,
                'complimenttravail'       => $complimenttravail,
                'address'     => $address,
                'city'        => $city,
                'state'       => $state,
                'country'     => $country,
                'pincode'     => $pincode,
                'company'     => $company,
                'linkd'       => $linkd,
                'entreprise1' => $entreprise1,
            );
            // $offer = $request->input('offer');
            $s3_data = array(
                'address'     => $address,
                'city'        => $city,
                'state'       => $state,
                'country'     => $country,
                'pincode'     => $pincode,
                'company'     => $company,
                'linkd'       => $linkd,
                'entreprise1' => $entreprise1,
            );
            if (!empty($check->iid)) {
		if($user_type == "paid")
		{
			if($check->user_type == "paid")
			{
				$update_detail = DB::table('job_post')
				    ->where('iid', $check->iid)
				    ->update($s2_data_9);
			} else {
				
				$update_detail = DB::table('job_post')
				    ->where('iid', $check->iid)
				    ->update($s2_data);
			}
            $check2 = DB::table('job_post')
                    ->select('*')
                    ->where('iid', $s3_iid)
                    ->first();
                if (!empty($check2->iid)) {
                    $update_detail = DB::table('job_post')
                        ->where('iid', $check2->iid)
                        ->update($s3_data);
                }
		} else {
			$update_detail = DB::table('job_post')
		            ->where('iid', $check->iid)
		            ->update($s2_data_9);
                $check2 = DB::table('job_post')
                    ->select('*')
                    ->where('iid', $s3_iid)
                    ->first();
                if (!empty($check2->iid)) {
                    $update_detail = DB::table('job_post')
                        ->where('iid', $check2->iid)
                        ->update($s3_data);
                }
		}
	
			// Process start to send email for paid jobs for edit process
			if($check->user_type != "paid")
			{
				if($user_type == "paid")
				{
					// start code to send first email
						 $noti = DB::table('notification')
							    ->select('*')
							    ->where('days', "P0")
							    ->first();
						 $jobs = DB::table('job_post')
								->select('*')
								->where('iid', $s2_iid)
								->first();
						 $users = DB::table('users')
							->select('*')
							->where('id', $user_id)
							->first();
	
						$jobtitle = "";
						if(isset($jobs->company))
						{
						    $jobtitle = str_replace(' ', '-', $jobs->company);
						    $jobtitle = str_replace('/', '-', $jobtitle);
						}
						    $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
						    $jobtitle = strtolower($jobtitle);
						    if(isset($jobs->job_id))
						    {
						    $urls    = "https://www.pharmapro.fr/offre-emploi/" . $jobs->job_id . "/" . $jobtitle;
							} else {
							$urls    = "https://www.pharmapro.fr/";
							}
						    $linkurl = "<a href=$urls>$urls</a>";
						    $from = 'info@pharmapro.fr';
						    $cc = 'xavier.gruffat@gmail.com';
						    $to      = $users->email;
						    $subject = $noti->title;
						    $headers = 'MIME-Version: 1.0' . "\r\n";
						    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						    $headers .= 'From: ' . $from . "\r\n" .
						    'Reply-To: ' . $from . "\r\n" .
						    'Bcc: ' . $cc . "\r\n" .
						    'X-Mailer: PHP/' . phpversion();
						    $message = str_replace("title", $users->title, $noti->description);
						    $message = str_replace("surname", $users->last_name, $message);
						    $message = str_replace("url", $linkurl, $message);
						   
						    //$mail = mail($to, $subject, $message, $headers);
					// end code to send first email 
				}
	
			}

                $check2 = DB::table('job_post')
                    ->select('*')
                    ->where('iid', $s3_iid)
                    ->first();
                if (!empty($check2->iid)) {
                    $update_detail = DB::table('job_post')
                        ->where('iid', $check2->iid)
                        ->update($s3_data);
                }
			// Process end to send email for paid jobs  for edit process
                return Redirect::to($url . $s2_iid)->with('success', __('message.savedata'))->with('step', '3');
            } else {
                // code to get dynamic job id start
                $current_date = date("Y-m-d");
                $jobs         = DB::table('job_post')
                    ->where('created_at', 'like', '%' . $current_date . '%')
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
        		if($user_type == "paid")
        		{
                	$inserted_data = Jobads::UpdateOrCreate($s2_data);
		        } else {
			        $inserted_data = Jobads::UpdateOrCreate($s2_data_inst);
	            }
                $update_detail = DB::table('job_post')
                    ->where('id', $inserted_data->id)
                    ->update(array('job_id' => $job_id));
			// Process start to send email for paid jobs for new process
                    $check2 = DB::table('job_post')
                    ->select('*')
                    ->where('iid', $s3_iid)
                    ->first();
                if (!empty($check2->iid)) {
                    $update_detail = DB::table('job_post')
                        ->where('iid', $check2->iid)
                        ->update($s3_data);
                }
				if($user_type == "paid")
				{
					// start code to send first email
						 $noti = DB::table('notification')
							    ->select('*')
							    ->where('days', "P0")
							    ->first();
						 $jobs = DB::table('job_post')
								->select('*')
								->where('iid', $s2_iid)
								->first();
						 $users = DB::table('users')
							->select('*')
							->where('id', $user_id)
							->first();
	
						$jobtitle = "";
						if(isset($jobs->company))
						{
						    $jobtitle = str_replace(' ', '-', $jobs->company);
						    $jobtitle = str_replace('/', '-', $jobtitle);
						}
						    $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
						    $jobtitle = strtolower($jobtitle);
						    if(isset($jobs->job_id))
						    {
						    $urls    = "https://www.pharmapro.fr/offre-emploi/" . $jobs->job_id . "/" . $jobtitle;
							} else {
							$urls    = "https://www.pharmapro.fr/";
							}
						    $linkurl = "<a href=$urls>$urls</a>";
						    $from = 'info@pharmapro.fr';
						    $cc = 'xavier.gruffat@gmail.com';
						    $to      = $users->email;
						    $subject = $noti->title;
						    $headers = 'MIME-Version: 1.0' . "\r\n";
						    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						    $headers .= 'From: ' . $from . "\r\n" .
						    'Reply-To: ' . $from . "\r\n" .
						    'Bcc: ' . $cc . "\r\n" .
						    'X-Mailer: PHP/' . phpversion();
						    $message = str_replace("title", $users->title, $noti->description);
						    $message = str_replace("surname", $users->last_name, $message);
						    $message = str_replace("url", $linkurl, $message);
						   
						    $mail = mail($to, $subject, $message, $headers);
					// end code to send first email 
				}
			// Process end to send email for paid jobs  for new process
                return Redirect::to($url . $s2_iid)->with('success', __('message.savedata'))->with('step', '3');
            }
        }
        if ($step == 'step_3') {
            /* if(!empty($request->input('showoffer')) && $request->input('showoffer') == 'on')
            {
            $offer = "non précisée";
            } else {
            $offer = $request->input('offer');
            } */
            $check2 = DB::table('job_post')
                    ->select('*')
                    ->where('iid', $s3_iid)
                    ->first();
            if (!empty($check2->iid)) {
                $update_detail = DB::table('job_post')
                    ->where('iid', $check2->iid)
                    ->update($s3_data);
            }
        }
        if ($step == 'step_4') {
           $s4_iid = $request->input('s4_interviewid'); 
	 $getjobs = DB::table('job_post')
                ->select('*')
                ->where('iid', $s4_iid)
                ->first();
           
	// send email code start
		if(isset($getjobs->iid))
		{
			$ucode = "";
$fname = "";
$lname = "";
$umail = "";
$ucode = "";
			$getuserlist = DB::table('users')
		        ->select('*')
		        ->where('id', $getjobs->user_id)
		        ->first();
			if(isset($getuserlist->code))
			{
				$ucode = $getuserlist->code;
				$fname = $getuserlist->first_name;
				$lname = $getuserlist->last_name;
				$umail = $getuserlist->email;
			}
		
		
			$from = $getjobs->email;
		        $subject = "Nouvelle offre d'emploi via formulaire (Pharmapro.fr)";
		        $to      = "xavier.gruffat@gmail.com";
			// $to      = "ncode14@gmail.com,aakash@ncodetechnologies.com";
		        $message = '<html><body>';
		        $message .= '<table border=1>';
		        $message .= '<tr><td>Entreprise/organisation</td><td>' . $getjobs->entreprise . '</td></tr>';
		        $message .= '<tr><td>Profession</td><td>' . $getjobs->job_title . '</td></tr>';
		        $message .= '<tr><td>Type de contrat</td><td>' . $getjobs->tcontrat . '</td></tr>';
		        $message .= '<tr><td>Temps de travail</td><td>' . $getjobs->travail . '</td></tr>';
		        $message .= '<tr><td>Description</td><td>' . $getjobs->job_desc . '</td></tr>';
		        $message .= '<tr><td>Entreprise/organisation</td><td>' . $getjobs->entreprise1 . '</td></tr>';
		        $message .= '<tr><td>Entreprise</td><td>' . $getjobs->company . '</td></tr>';
		        $message .= '<tr><td>Adresse</td><td>' . $getjobs->address . '</td></tr>';
		        $message .= '<tr><td>Code postal</td><td>' . $getjobs->pincode . '</td></tr>';
		        $message .= '<tr><td>Ville</td><td>' . $getjobs->city . '</td></tr>';
		        $message .= '<tr><td>Département</td><td>' . $getjobs->state . '</td></tr>';
		        $message .= '<tr><td>Email</td><td>' . $getjobs->email . '</td></tr>';
		        $message .= '<tr><td>Tél</td><td>' . $getjobs->phone . '</td></tr>';
		        $message .= '<tr><td>Site internet ou page</td><td>' . $getjobs->linkd . '</td></tr>';			
			 $message .= '<tr><td>Customer ID</td><td>' . $ucode . '</td></tr>';
			 $message .= '<tr><td>Customer Name</td><td>' . $fname . ' ' . $lname . '</td></tr>';
			 $message .= '<tr><td>Customer email</td><td>' . $umail . '</td></tr>';
			 $message .= '<tr><td>User Type</td><td>' . $getjobs->user_type . '</td></tr>';
		        $message .= '</table>';
		        $message .= '<br /><br />';
		     //   $message .= "Job Link : ";
		     //   $message .= "<a href='https://pharmapro.fr/" . $job_id . "'>Click Here</a>";
		        $message .= '</body></html>';
		        $headers = "MIME-Version: 1.0" . "\r\n";
		        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		        $headers .= "From:" . $from . "\r\n";
		        $mail = @mail($to, $subject, $message, $headers);
		}
	// send email code end
            if ($login_type == 'admin') {
                $redirect_url = 'dashboard_admin';
            } else {
                $redirect_url = 'dashboard';
            }
            return Redirect::to($redirect_url)->with('success', __('message.savedata'))->with('step', '1');
        }
        if ($step == 'step_5') {
            $s5_iid = $request->input('s5_interviewid');
            
            return Redirect::to($url . $s5_iid)->with('success', __('message.savedata'))->with('step', '1');
        }
        if ($step == 'step_6') {
            $s6_iid    = $request->input('s6_interviewid');
            $s6_finals = $request->input('s6_final');
            foreach ($s6_finals as $key => $s6_final) {
                $question             = null;
                $notes                = null;
                $anwser               = null;
                $notes_precious       = null;
                $anwser_precious      = null;
                $interviewer_validate = null;
                $interviewee_validate = null;
                $id                   = '';
                foreach ($s6_final as $key => $value) {
                    if ($key == 'question') {
                        $question = $value;
                    }
                    if ($key == 'notes') {
                        $notes = $value;
                    }
                    if ($key == 'anwser') {
                        $anwser = $value;
                    }
                    if ($key == 'notes_precious') {
                        $notes_precious = $value;
                    }
                    if ($key == 'anwser_precious') {
                        $anwser_precious = $value;
                    }
                    if ($key == 'interviewer_validate') {
                        $interviewer_validate = $value;
                    }
                    if ($key == 'interviewee_validate') {
                        $interviewee_validate = $value;
                    }
                    if ($key == 'id') {
                        $id = $value;
                    }
                }
                $s6_data = array(
                    'question'             => $question,
                    'notes'                => $notes,
                    'anwser'               => $anwser,
                    'notes_precious'       => $notes_precious,
                    'anwser_precious'      => $anwser_precious,
                    'interviewer_validate' => $interviewer_validate,
                    'interviewee_validate' => $interviewee_validate,
                );
                $update_detail = DB::table('questions_3')
                    ->where('id', $id)
                    ->update($s6_data);
            }
            $login_type             = session('login_type');
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
            if (isset($interviewer_email_data->email)) {
                $interviewer_email = $interviewer_email_data->email;
            }
            if (isset($interviewee_email_data->email_wee)) {
                $interviewee_email = $interviewee_email_data->email_wee;
            }
            $from = 'xavier.gruffat@pharmanetis.com';
            $to      = $interviewer_email . ',' . $interviewee_email;
            $subject = "Interview validated";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = '<html><body>';
            $message .= "<p>This interview has been validated.</p>";
            $message .= '</body></html>';
            $mail = mail($to, $subject, $message, $headers);
            if ($login_type == 'admin') {
                return Redirect::to('dashboard_admin')->with('success', __('message.savedata'));
            } else {
                return Redirect::to('dashboard')->with('success', __('message.savedata'));
            }
        }
        if ($step == 'send_email') {
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
            $pop_name        = $request->input('pop_name');
            $pop_email       = $request->input('pop_email');
            $pop_note        = $request->input('pop_note');
            $from            = 'xavier.gruffat@gmail.com';
            $to      = $pop_email;
            $subject = "Invite for interview";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = '<html><body>';
            $message .= "Interview Link : ";
            $message .= "<a href='https://www.publinetis.com/interviewee/" . $pop_interviewid . "'>Click Here</a>";
            $message .= "<br> Note : " . $pop_note;
            $message .= '</body></html>';
            $mail = mail($to, $subject, $message, $headers);
            if ($mail) {
                echo 'Mail Send successfully.';
            } else {
                echo 'Mail can\'t send.';
            }
        }
    }
    public function interview_reactive1(Request $request)
    {
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        //echo "<pre>";
        //echo $request->input('s2_interviewid');
        $step       = $request->input('btn_step');
        $login_type = session('login_type');
        $user_type  = session('login_type');
        if ($user_type == 'admin') {
            $interviewid = $request->input('interviewid');
            $get_user_id = DB::table('interviewer_1')
                ->select('user_id')
                ->where('iid', $interviewid)
                ->first();
            if (isset($get_user_id->user_id)) {
                $user_id = $get_user_id->user_id;
            } else {
                $user_id = '';
            }
        } else {
            $user_id = session('user_id');
        }
        if ($login_type == 'interviewee') {
            $url = 'interviewee/';
        } else {
            $url = 'interview_reactive/';
        }
        
        if ($step == 'step_2') {
            $offer = "";
            if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
                $offer = "non précisée";
            } else {
                $offer = $request->input('offer');
            }
            $user_type = $request->input('paid');
            $s2_iid    = $request->input('s2_interviewid');
            $job_title = $request->input('title');
            $travail   = $request->input('travail');
            $tcontrat  = $request->input('tcontrat');
            $job_desc  = $request->input('desc');
            $urgent    = $request->input('urgent');
            $hosted    = $request->input('hosted');
            $company   = $request->input('company');
            $email     = $request->input('email');
            $phone     = $request->input('phone');
            
            $linkd = $request->input('linkd');
            if ($linkd != '') {
                $linkd = $request->input('http') . $linkd;
            }
            $entreprise  = $request->input('entreprise');
            $entreprise1 = $request->input('entreprise1');
            $address = $request->input('address');
            $city    = $request->input('city');
            $state   = $request->input('state');
            $country = $request->input('country');
            $pincode = $request->input('pincode');
            $old_company_logo = $request->input('old_company_logo');
            if ($request->hasFile('company_logo')) {
               
                $image           = $request->file('company_logo');
                $logo_name       = $image->getClientOriginalName();
                $destinationPath = public_path('/logo');
                $imagePath       = $destinationPath . "/" . $logo_name;
                $image->move($destinationPath, $logo_name);
            } else {
                $logo_name = $old_company_logo;
            }
            $check = DB::table('job_post')
                ->select('iid', 'id')
                ->where('iid', $s2_iid)
                ->first();
            $job_id_tmp = isset($check->id) ? $check->id : '';
            // code to get dynamic job id start
            $current_date = date("Y-m-d");
            $jobs         = DB::table('job_post')
                ->where('created_at', 'like', '%' . $current_date . '%')
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
            $interviewid = $request->input('interviewid');
            if ($user_type == 'admin') {
                $get_user_id = DB::table('interviewer_1')
                    ->select('user_id')
                    ->where('iid', $interviewid)
                    ->first();
                if (isset($get_user_id->user_id)) {
                    $user_id = $get_user_id->user_id;
                } else {
                    $user_id = '';
                }
            } else {
                $user_id = session('user_id');
            }
            $jobtype  = $request->input('descoptionvalue');
            $s2_data = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,                
                'user_type'   => $user_type,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
                'job_desc_type' => $jobtype,
            );
            if (!empty($check->iid)) {
                $update_detail = DB::table('job_post')
                    ->where('iid', $check->iid)
                    ->update($s2_data);
                return Redirect::to($url . $s2_iid)->with('success', __('message.savedata'))->with('step', '2');
            } else {
                // code to get dynamic job id start
                $current_date = date("Y-m-d");
                $jobs         = DB::table('job_post')
                    ->where('created_at', 'like', '%' . $current_date . '%')
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
                $inserted_data = Jobads::UpdateOrCreate($s2_data);
                $update_detail = DB::table('job_post')
                    ->where('id', $inserted_data->id)
                    ->update(array('job_id' => $job_id));
                return Redirect::to($url . $s2_iid)->with('success', __('message.savedata'))->with('step', '2');
            }
        }
        if ($step == 'step_3') {
            $offer = "";          
            $s3_iid  = $request->input('s3_interviewid');
            $s3_ques = $request->input('s3_que');
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
            $entreprise1 = $request->input('entreprise1');
            $s3_data = array(
                'address'     => $address,
                'city'        => $city,
                'state'       => $state,
                'country'     => $country,
                'pincode'     => $pincode,
                'company'     => $company,
                'email'       => $email,
                'phone'       => $phone,
                'linkd'       => $linkd,
                'entreprise1' => $entreprise1,
            );
            $check = DB::table('job_post')
                ->select('*')
                ->where('iid', $s3_iid)
                ->first();
            if (!empty($check->iid)) {
                $update_detail = DB::table('job_post')
                    ->where('iid', $check->iid)
                    ->update($s3_data);
                if ($check->address != '') {
                    return Redirect::to($url . $s3_iid)->with('success', __('message.savedata'))->with('step', '3');
                } else {
                    return Redirect::to($url . $s3_iid)->with('success', __('message.savedata'))->with('step', '3');
                }
            }
        }
        if ($step == 'step_4') {
            $s4_iid = $request->input('s4_interviewid');
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
        
        DB::table('job_post')
            ->where('iid', $s4_iid)
            ->update(array(
                'is_deleted' => false,
                'job_id'     => $job_id,
                'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
		'reactive' => 1,
            ));
	// code to get dynamic job id end
	
            
            if ($login_type == 'admin') {
                $redirect_url = 'dashboard_admin';
            } else {
                $redirect_url = 'dashboard';
            }
            return Redirect::to($redirect_url)->with('success','Job Post activated successfully.');
        }
        if ($step == 'step_5') {
            $s5_iid = $request->input('s5_interviewid');
          
            return Redirect::to($url . $s5_iid)->with('success', __('message.savedata'))->with('step', '1');
        }
        if ($step == 'step_6') {
            $s6_iid    = $request->input('s6_interviewid');
            $s6_finals = $request->input('s6_final');
            foreach ($s6_finals as $key => $s6_final) {
                $question             = null;
                $notes                = null;
                $anwser               = null;
                $notes_precious       = null;
                $anwser_precious      = null;
                $interviewer_validate = null;
                $interviewee_validate = null;
                $id                   = '';
                foreach ($s6_final as $key => $value) {
                    if ($key == 'question') {
                        $question = $value;
                    }
                    if ($key == 'notes') {
                        $notes = $value;
                    }
                    if ($key == 'anwser') {
                        $anwser = $value;
                    }
                    if ($key == 'notes_precious') {
                        $notes_precious = $value;
                    }
                    if ($key == 'anwser_precious') {
                        $anwser_precious = $value;
                    }
                    if ($key == 'interviewer_validate') {
                        $interviewer_validate = $value;
                    }
                    if ($key == 'interviewee_validate') {
                        $interviewee_validate = $value;
                    }
                    if ($key == 'id') {
                        $id = $value;
                    }
                }
                $s6_data = array(
                    'question'             => $question,
                    'notes'                => $notes,
                    'anwser'               => $anwser,
                    'notes_precious'       => $notes_precious,
                    'anwser_precious'      => $anwser_precious,
                    'interviewer_validate' => $interviewer_validate,
                    'interviewee_validate' => $interviewee_validate,
                );
                $update_detail = DB::table('questions_3')
                    ->where('id', $id)
                    ->update($s6_data);
            }
            $login_type             = session('login_type');
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
            if (isset($interviewer_email_data->email)) {
                $interviewer_email = $interviewer_email_data->email;
            }
            if (isset($interviewee_email_data->email_wee)) {
                $interviewee_email = $interviewee_email_data->email_wee;
            }
            $from = 'xavier.gruffat@pharmanetis.com';
            $to      = $interviewer_email . ',' . $interviewee_email;
            $subject = "Interview validated";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = '<html><body>';
            $message .= "<p>This interview has been reactivated.</p>";
            $message .= '</body></html>';
            $mail = mail($to, $subject, $message, $headers);
            if ($login_type == 'admin') {
                return Redirect::to('dashboard_admin')->with('success', __('message.savedata'));
            } else {
                return Redirect::to('dashboard')->with('success', __('message.savedata'));
            }
        }
        if ($step == 'send_email') {
           
            $pop_interviewid = $request->input('pop_interviewid');
            $pop_name        = $request->input('pop_name');
            $pop_email       = $request->input('pop_email');
            $pop_note        = $request->input('pop_note');
            $from            = 'xavier.gruffat@pharmanetis.com';
            $to      = $pop_email;
            $subject = "Invite for interview";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = '<html><body>';
            $message .= "Interview Link : ";
            $message .= "<a href='https://www.publinetis.com/interviewee/" . $pop_interviewid . "'>Click Here</a>";
            $message .= "<br> Note : " . $pop_note;
            $message .= '</body></html>';
           // $mail = mail($to, $subject, $message, $headers);
            if ($mail) {
                echo 'Mail Send successfully.';
            } else {
                echo 'Mail can\'t send.';
            }
        }
    }
    public function interviewform()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $id   = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi_interview_frm', compact('jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service'));
    }
    public function interviewform1(Request $request)
    {
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
            return Redirect::to('publication-formulaire-offre-emploi')->with('error', "Invalid Captcha")->with('step', '2');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
    // $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        }
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $step       = $request->input('btn_step');
        $login_type = session('login_type');
        $user_type  = session('login_type');
        if ($user_type == 'admin') {
            $interviewid = $request->input('interviewid');
            $get_user_id = DB::table('interviewer_1')
                ->select('user_id')
                ->where('iid', $interviewid)
                ->first();
            if (isset($get_user_id->user_id)) {
                $user_id = $get_user_id->user_id;
            } else {
                $user_id = '';
            }
        } else {
            $user_id = session('user_id');
        }
        if ($login_type == 'interviewee') {
            $url = 'publication-formulaire-offre-emploi/';
        } else {
            $url = 'publication-formulaire-offre-emploi/';
        }
        if ($step == 'step_2') {
            $offer = "";
            if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
                $offer = "non précisée";
            } else {
                $offer = $request->input('offer');
            }
	        $user_type = $request->input('paid');
            $s2_iid      = $request->input('s2_interviewid');
            $job_title   = $request->input('title');
            $travail     = $request->input('travail');
            $tcontrat    = $request->input('tcontrat');
            $job_desc    = $request->input('desc');
            $entreprise  = $request->input('entreprise');
            $entreprise1 = $request->input('entreprise1');
            // $offer = $request->input('offer');
            $address = $request->input('address');
            $city    = $request->input('city');
            $state   = $request->input('state');
            $country = $request->input('country');
            $pincode = $request->input('pincode');
            $company = $request->input('company');
            $email   = $request->input('email');
            $phone   = $request->input('phone');
            $linkd   = $request->input('linkd');
            $urgent  = $request->input('urgent');
            $hosted  = $request->input('hosted');
            $old_company_logo = $request->input('old_company_logo');
            if ($request->hasFile('company_logo')) {
                $image           = $request->file('company_logo');
                $logo_name       = $image->getClientOriginalName();
                $destinationPath = public_path('/logo');
                $imagePath       = $destinationPath . "/" . $logo_name;
                $image->move($destinationPath, $logo_name);
            } else {
                $logo_name = $old_company_logo;
            }
            $check = DB::table('job_post')
                ->select('iid', 'id')
                ->where('iid', $s2_iid)
                ->first();
            $job_id_tmp = isset($check->id) ? $check->id : '';
            // code to get dynamic job id start
            $current_date = date("Y-m-d");
            $jobs         = DB::table('job_post')
                ->where('created_at', 'like', '%' . $current_date . '%')
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
            $interviewid = $request->input('interviewid');
            if ($user_type == 'admin') {
                $get_user_id = DB::table('interviewer_1')
                    ->select('user_id')
                    ->where('iid', $interviewid)
                    ->first();
                if (isset($get_user_id->user_id)) {
                    $user_id = $get_user_id->user_id;
                } else {
                    $user_id = '';
                }
            } else {
                $user_id = session('user_id');
            }
        $dt = date('Y-m-d');
        $mydt = date( "Y-m-d", strtotime( "$dt +7 day" ) );
            $s2_data = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
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
        		'prime_date' => $mydt,
            );
		$s2_data_9 = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
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
            $s2_data_inst = array(
                'job_title'   => $job_title,
                'job_desc'    => $job_desc,
                'urgent'      => $urgent,
                'hosted'      => $hosted,
                'travail'     => $travail,
                'tcontrat'    => $tcontrat,
                'entreprise'  => $entreprise,
                'entreprise1' => $entreprise1,
                'offerdate'   => $offer,
                'iid'         => $interviewid,
                'user_id'     => $user_id,
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
                'prime_date' => date('Y-m-d'),
            );
            if (!empty($check->iid)) {
               
			if($user_type == "paid")
			{
				if($check->user_type == "paid")
				{
					$update_detail = DB::table('job_post')
					    ->where('iid', $check->iid)
					    ->update($s2_data_9);
				} else {
				
					$update_detail = DB::table('job_post')
					    ->where('iid', $check->iid)
					    ->update($s2_data);
				}
			} else {
				$update_detail = DB::table('job_post')
				    ->where('iid', $check->iid)
				    ->update($s2_data_9);
			}
                return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '1');
            } else {
                // code to get dynamic job id start
                $current_date = date("Y-m-d");
                $jobs         = DB::table('job_post')
                    ->where('created_at', 'like', '%' . $current_date . '%')
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
                // $inserted_data = Jobads::UpdateOrCreate($s2_data);
		if($user_type == "paid")
		{
                	 $inserted_data = Jobads::UpdateOrCreate($s2_data);
		} else {
			         $inserted_data = Jobads::UpdateOrCreate($s2_data_inst);
		}
                $update_detail = DB::table('job_post')
                    ->where('id', $inserted_data->id)
                    ->update(array('job_id' => $job_id));
			$fname = "";
			$lname = "";
			$umail = "";
			$ucode = "";
			$getuserlist = DB::table('users')
		        ->select('*')
		        ->where('id', $user_id)
		        ->first();
			if(isset($getuserlist->code))
			{
				$ucode = $getuserlist->code;
				$fname = $getuserlist->first_name;
				$lname = $getuserlist->last_name;
				$umail = $getuserlist->email;
			}
                // send email code start
                $from = $email;
                $subject = "Nouvelle offre d'emploi via formulaire (Pharmapro.fr)";
                $to      = "xavier.gruffat@gmail.com";
                $message = '<html><body>';
                $message .= '<table border=1>';
                $message .= '<tr><td>Entreprise/organisation</td><td>' . $entreprise . '</td></tr>';
                $message .= '<tr><td>Profession</td><td>' . $job_title . '</td></tr>';
                $message .= '<tr><td>Type de contrat</td><td>' . $tcontrat . '</td></tr>';
                $message .= '<tr><td>Temps de travail</td><td>' . $travail . '</td></tr>';
                $message .= '<tr><td>Description</td><td>' . $job_desc . '</td></tr>';
                $message .= '<tr><td>Entreprise/organisation</td><td>' . $entreprise1 . '</td></tr>';
                $message .= '<tr><td>Entreprise</td><td>' . $company . '</td></tr>';
                $message .= '<tr><td>Adresse</td><td>' . $address . '</td></tr>';
                $message .= '<tr><td>Code postal</td><td>' . $pincode . '</td></tr>';
                $message .= '<tr><td>Ville</td><td>' . $city . '</td></tr>';
                $message .= '<tr><td>Département</td><td>' . $state . '</td></tr>';
                $message .= '<tr><td>Email</td><td>' . $email . '</td></tr>';
                $message .= '<tr><td>Tél</td><td>' . $phone . '</td></tr>';
                $message .= '<tr><td>Site internet ou page</td><td>' . $linkd . '</td></tr>';
		$message .= '<tr><td>Customer ID</td><td>' . $ucode . '</td></tr>';
		$message .= '<tr><td>Customer Name</td><td>' . $fname . ' ' . $lname . '</td></tr>';
		$message .= '<tr><td>Customer email</td><td>' . $umail . '</td></tr>';
		$message .= '<tr><td>User Type</td><td>' . $user_type . '</td></tr>';
                $message .= '</table>';
                $message .= '<br /><br />';
                $message .= "Job Link : ";
                $message .= "<a href='https://pharmapro.fr/" . $job_id . "'>Click Here</a>";
                $message .= '</body></html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From:" . $from . "\r\n";
                $mail = @mail($to, $subject, $message, $headers);
                // send email code end
                return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '2');
            }
        }
    }
    public function interviewformpaid()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $id   = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
        if (empty(session('login_type'))) {
            session(['login_type' => 'interviewee']);
            session(['interviewee_id' => $id]);
        }
        $interviewdata = DB::table('interviewer_1')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $jobdata = DB::table('job_post')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $interviewee_data = DB::table('interviewee_2')
            ->select('*')
            ->where('iid', $id)
            ->first();
        $question_data = DB::table('questions_3')
            ->select('*')
            ->where('iid', $id)
            ->get();
        $interviewid = $id;
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/multi_interview_frm_paid', compact('jobdata', 'interviewid', 'interviewdata', 'interviewee_data', 'question_data', 'service'));
    }
    public function interviewformpaid1(Request $request)
    {
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
          // return Redirect::to('publication-formulaire-offre-emploi')->with('error', "Invalid Captcha")->with('step', '2');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
        } 
        $current_date  = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $step       = $request->input('btn_step');
        $login_type = session('login_type');
        $user_type  = session('login_type');
        if ($user_type == 'admin') {
            $interviewid = $request->input('interviewid');
            $get_user_id = DB::table('interviewer_1')
                ->select('user_id')
                ->where('iid', $interviewid)
                ->first();
            if (isset($get_user_id->user_id)) {
                $user_id = $get_user_id->user_id;
            } else {
                $user_id = '';
            }
        } else {
            $user_id = session('user_id');
        }
        if ($login_type == 'interviewee') {
            $url = 'formulaire/';
        } else {
            $url = 'formulaire/';
        }

        if ($request->hasFile('desc_image')) {                
            $image           = $request->file('desc_image');
            $desc_image      = time().$image->getClientOriginalName();
            $destinationPath = public_path('/desc_image');
            $imagePath       = $destinationPath . "/" . $desc_image;
            $image->move($destinationPath, $desc_image);
        } else {
            $desc_image = '';
        }
        if ($step == 'step_2') {
            $offer = "";
            if (!empty($request->input('showoffer')) && $request->input('showoffer') == 'on') {
                $offer = "non précisée";
            } else {
                $offer = $request->input('offer');
            }
            $s2_iid      = $request->input('s2_interviewid');
            $job_title   = $request->input('title');
            $travail     = $request->input('travail');
            $tcontrat    = $request->input('tcontrat');
            // $job_desc    = $request->input('desc');
            $entreprise  = $request->input('entreprise');
            $entreprise1 = $request->input('entreprise1');
            $user_type   = $request->input('paid');
            $address = $request->input('address');
            $city    = $request->input('city');
            $state   = $request->input('state');
            $country = $request->input('country');
            $pincode = $request->input('pincode');
            $company = $request->input('company');
            $email   = $request->input('email');
            $phone   = $request->input('phone');
            $show_email = $request->input('show_email');
            $show_phone = $request->input('show_phone');
            $linkd   = $request->input('linkd');
            $urgent  = $request->input('urgent');
            $hosted  = $request->input('hosted');
            $jobtype  = $request->input('descoptionvalue');
            $compliment = $request->input('compliment');
            $complimenttravail = $request->input('complimenttravail');
            $linkd = 'https://'.$linkd;
            
             if ($jobtype == 1) {
                $image           = $request->file('descfile');
                $pdf_name       = $image->getClientOriginalName();
                $destinationPath1 = public_path('/resume');
                $imagePath       = $destinationPath1 . "/" . $pdf_name;
                $image->move($destinationPath1, $pdf_name);
            }

            if ($jobtype == 1) {
            $job_desc    = $pdf_name;
            }
            if ($jobtype == 2) {
            $job_desc    = $request->input('desc');
            }
            if ($jobtype == 3) {
            $job_desc    = $request->input('desclink');
            }
            $old_company_logo = $request->input('old_company_logo');
            if ($request->hasFile('company_logo')) {
                $image           = $request->file('company_logo');
                $logo_name       = $image->getClientOriginalName();
                $destinationPath = public_path('/logo');
                $imagePath       = $destinationPath . "/" . $logo_name;
                $image->move($destinationPath, $logo_name);
            } else {
                $logo_name = $old_company_logo;
            }
             $old_company_logo = $request->input('old_company_logo');
            if ($request->hasFile('company_logo')) {
                $image           = $request->file('company_logo');
                $logo_name       = $image->getClientOriginalName();
                $destinationPath = public_path('/logo');
                $imagePath       = $destinationPath . "/" . $logo_name;
                $image->move($destinationPath, $logo_name);
            } 
            $check = DB::table('job_post')
                ->select('iid', 'id')
                ->where('iid', $s2_iid)
                ->first();
            $job_id_tmp = isset($check->id) ? $check->id : '';
            // code to get dynamic job id start
            $current_date = date("Y-m-d");
            $jobs         = DB::table('job_post')
                ->where('created_at', 'like', '%' . $current_date . '%')
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
            $interviewid = $request->input('interviewid');
            if ($user_type == 'admin') {
                $get_user_id = DB::table('interviewer_1')
                    ->select('user_id')
                    ->where('iid', $interviewid)
                    ->first();
                if (isset($get_user_id->user_id)) {
                    $user_id = $get_user_id->user_id;
                } else {
                    $user_id = '';
                }
            } else {
                $user_id = session('user_id');
            }
            if (!empty($check->iid)) {
                $update_detail = DB::table('job_post')
                    ->where('iid', $check->iid)
                    ->update($s2_data);
                return Redirect::to($url)->with('success', 'Formulaire envoyé')->with('step', '1');
            } else {
                // start code to save data in user table
                $title         = $request->input('user_title');
                $fname         = $request->input('fname');
                $lname         = $request->input('lname');
                $reg_email     = $request->input('reg_email');
                $reg_password  = $request->input('reg_password');
                $reg_password1 = $request->input('password1');
                $check = DB::table('users')
                    ->select('email')
                    ->where('email', $reg_email)
                    ->first();
                if (!empty($check->email)) {
                    return Redirect::to('/formulaire')->with('exist_error', "Vous ne pouvez pas publier votre offre d'emploi via ce formulaire, car vous avez déjà un identifiant sur Pharmapro.fr. Cliquez-ici pour vous connecter");
                }
                if ($reg_password != $reg_password1) {
                    return Redirect::to('/formulaire')->with('error', 'Password and re-enter password should be same.');
                }
                $datauser = array(
                    'title'       => $title,
                    'password'    => $reg_password,
                    'entreprise'  => $entreprise1,
                    'email'       => $reg_email,
                    'first_name'  => $fname,
                    'last_name'   => $lname,
                    'created_at'  => date("Y-m-d H:i:s"),
                    'status'      => 'approved',
                    'pharmacie'   => $company,
                    'adresse'     => $address,
                    'postal'      => $pincode,
                    'villa'       => $city,
                    'state'       => $state,
                    'phone'       => $phone,
                    'linkd'       => $linkd,
                    'departement' => 0,
                );
                // $inserted_user_data = DB::table('users')->insert($datauser);
                $inserted_user_data = UserRegistration::UpdateOrCreate($datauser);
                $userid             = $inserted_user_data->id;
                $s2_data = array(
                    'job_title'   => $job_title,
                    'job_desc'    => $job_desc,
                    'urgent'      => $urgent,
                    'hosted'      => $hosted,
                    'travail'     => $travail,
                    'tcontrat'    => $tcontrat,
                    'entreprise'  => $entreprise,
                    'entreprise1' => $entreprise1,
                    'offerdate'   => $offer,
                    'iid'         => $interviewid,
                    // 'user_id' => $user_id,
                    'user_id'     => $userid,
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
                    'linkd'       => $linkd,
                    'user_type'   => $user_type,
                    'prime_date' => date('Y-m-d'),                    
                    'job_desc_type' => $jobtype,
                    'desc_image' => $desc_image,
                    'compliment' => $compliment,
                    'complimenttravail'=> $complimenttravail,
                );
                // end code to save data in user table
                // code to get dynamic job id start
                $current_date = date("Y-m-d");
                $jobs         = DB::table('job_post')
                    ->where('created_at', 'like', '%' . $current_date . '%')
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
                $inserted_data = Jobads::UpdateOrCreate($s2_data);
                // $job_id = 'pef'.$day.$month.$year.'a'.$inserted_data->id;
                $update_detail = DB::table('job_post')
                    ->where('id', $inserted_data->id)
                    ->update(array('job_id' => $job_id));
                // send email code start
                $from = $email;
                $subject = "Nouvelle offre d'emploi via formulaire (Pharmapro.fr)";
                $to      = "xavier.gruffat@gmail.com";
                // $to = "ncode14@gmail.com,aakash@ncodetechnologies.com";
                $message = '<html><body>';
                $message .= '<table border=1>';
                $message .= '<tr><td>Entreprise/organisation</td><td>' . $entreprise . '</td></tr>';
                $message .= '<tr><td>Profession</td><td>' . $job_title . '</td></tr>';
                $message .= '<tr><td>Type de contrat</td><td>' . $tcontrat . '</td></tr>';
                $message .= '<tr><td>Temps de travail</td><td>' . $travail . '</td></tr>';
                $message .= '<tr><td>Description</td><td>' . $job_desc . '</td></tr>';
                $message .= '<tr><td>Entreprise/organisation</td><td>' . $entreprise1 . '</td></tr>';
                $message .= '<tr><td>Entreprise</td><td>' . $company . '</td></tr>';
                $message .= '<tr><td>Adresse</td><td>' . $address . '</td></tr>';
                $message .= '<tr><td>Code postal</td><td>' . $pincode . '</td></tr>';
                $message .= '<tr><td>Ville</td><td>' . $city . '</td></tr>';
                $message .= '<tr><td>Département</td><td>' . $state . '</td></tr>';
                $message .= '<tr><td>Email</td><td>' . $email . '</td></tr>';
                $message .= '<tr><td>Tél</td><td>' . $phone . '</td></tr>';
                $message .= '<tr><td>Site internet ou page</td><td>' . $linkd . '</td></tr>';
                $message .= '<tr><td>User type</td><td>' . $user_type . '</td></tr>';
                $message .= '</table>';
                $message .= '<br /><br />';
                $message .= "Job Link : ";
                $message .= "<a href='https://pharmapro.fr/" . $job_id . "'>Click Here</a>";
                $message .= '</body></html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From:" . $from . "\r\n";
                $mail = @mail($to, $subject, $message, $headers);
                // send email code end
               // if (isset($reg_email) && !empty($reg_email) && $user_type == 'admin') {
		 if (isset($reg_email) && !empty($reg_email)) {
                    session(['login_type' => 'frontuser']);
                    session(['user_id' => $userid]);
                    session(['user_name' => $reg_email]);
                    session(['activity_id' => $userid]);
                    session(['activity_type' => 0]);
                    if (empty(session('lang'))) {
                        App::setLocale('en');
                        session(['lang' => 'en']);
                    }
                }
                if ($user_type == 'admin') {
                    return Redirect::to('/dashboard');
                } else {
                    return Redirect::to('/dashboard');
                }
                // return Redirect::to($url)->with('success', 'Formulaire envoyé' )->with('step','2');
            }
        }
    }
    public function remove_question($iid, $id = null)
    {
        if (!empty($id) && !empty($iid)) {
            $delete_data = array(
                'id'  => $id,
                'iid' => $iid,
            );
            $results = DB::table('questions_3')->where($delete_data)->delete();
            if ($results) {
                return Redirect::to('interview/' . $iid)->with('success', 'Question Deleted.')->with('step', '3');
            } else {
                return Redirect::to('interview/' . $iid)->with('success', 'Some error.')->with('step', '3');
            }
        } else {
            return Redirect::to('interview/' . $iid)->with('success', 'No data.')->with('step', '3');
        }
    }
    public function pdfdelete($iid)
    {
        
            DB::table('job_post')
                    ->where('iid', '=', $iid)
                    ->update(array('job_desc' => ''));
          
            return Redirect::to('interview/' . $iid)->with('success', 'PDF Successfully Deleted.')->with('step', '1');
           
    }
    public function descImgDelete($iid)
    {
        
            DB::table('job_post')
                    ->where('iid', '=', $iid)
                    ->update(array('desc_image' => ''));
          
            return Redirect::to('interview/' . $iid)->with('success', 'Image Successfully Deleted.')->with('step', '1');
           
    }
    public function service()
    {
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        /*$service = DB::table('services')
        ->select('*')
        ->get();*/
        return view('front/service', compact('service'));
    }
    public function about()
    {
        $about_us = AboutUs::first();
        return view('front/about', compact('about_us'));
    }
    /*public function contact()
    {
    $contact_us = ContactUs::first();
    return view('front/contact',compact('contact_us'));
    }*/
    public function dashboard()
    {
        $update_detail = DB::table('job_post')
                    ->where('created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
                    ->update(array('is_deleted' => true));
        $service = DB::table('services')
            ->select('*')
            ->get();
        $current_date = date("m/d/Y");
        $interviewer_1 = DB::table('interviewer_1')
            ->where('deadline', '<', $current_date)
            ->where('deadline', '!=', 'None')
            ->update(array('deadline' => 'None'));
        $login_type = session('login_type');
        if ($login_type == 'interviewee') {
            $user_id       = session('user_id');
            $interviewdata = DB::table('apply_job')
                ->where('user_id', $user_id)
                ->get();
            return view('front/dashboard_interviewee', compact('service', 'interviewdata'));
        } else {
            $user_id       = session('user_id');
            $interviewdata = DB::table('job_post')
                ->where('user_id', $user_id)
		// ->orderBy('user_type', 'desc')
                 ->orderBy('prime_date', 'desc')
		      // ->orderBy('created_at', 'desc')
                ->get();
            // echo "<pre>";print_r($interviewdata);exit;
            return view('front/dashboard', compact('service', 'interviewdata'));
        }
    }
    public function profile()
    {
        $login_type = session('login_type');
        if ($login_type == 'interviewee') {
            $user_id      = session('user_id');
            $profile_data = DB::table('user_interviewee')
                ->select('*')
                ->where('id', $user_id)
                ->first();
        } else {
            $user_id      = session('user_id');
            $profile_data = DB::table('users')
                ->select('*')
                ->where('id', $user_id)
                ->first();
        }
        return view('front/profile', compact('profile_data'));
    }
    public function update_profile(Request $request)
    {
        $login_type = session('login_type');
        $id         = $request->input('id');
        $title      = $request->input('title');
        $first_name = $request->input('first_name');
        $last_name  = $request->input('last_name');
        $email = $request->input('email');
        $password   = $request->input('password');
        $occupation = $request->input('occupation');
        $phone      = $request->input('phone');
        $website    = $request->input('site');
        $old_logo = $request->input('old_logo');
        $request->hasFile('logo');
        if ($request->hasFile('logo')) {
            $old_logo_path = public_path('/logo') . "/" . $old_logo;
            if (!empty($old_logo)) {
                if (File::exists($old_logo_path)) {
                    //unlink($old_logo_path);
                }
            }
            $image           = $request->file('logo');
            $logo_name       = $image->getClientOriginalName();
            $destinationPath = public_path('/logo');
            $imagePath       = $destinationPath . "/" . $logo_name;
            $image->move($destinationPath, $logo_name);
        } else {
            $logo_name = $old_logo;
        }
        if ($login_type == 'interviewee') {
            $user_id = session('user_name');
            DB::table('user_interviewee')
                ->where('id', $id)
                ->update(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => $password, 'occupation' => $occupation, 'phone' => $phone, 'website' => $website, 'profile_pic' => $logo_name]);
            session(['user_name' => $email]);
        } else {
            $user_id = session('user_id');
            DB::table('users')
                ->where('id', $id)
                ->update(['title' => $title, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => $password, 'occupation' => $occupation, 'phone' => $phone, 'website' => $website, 'profile_pic' => $logo_name]);
            session(['user_name' => $email]);
        }
        return Redirect::to('/profile')->with('success', __('message.savedata'))->with('step', '5');
    }
    public function profile_entreprise($id)
    {
        $action  = 'edit';
        $jobdata = DB::table('users')
            ->select('*')
            ->where('id', $id)
            ->first();
        // echo "<pre>";print_r($jobdata);exit;
        $interviewid = $jobdata->id;
        $id          = $jobdata->id;
        $lang = session('lang');
        $service = DB::table('services')
            ->select('*')
            ->where('lang', '=', $lang)
            ->get();
        return view('front/profile_entreprise', compact('jobdata', 'interviewid', 'service', 'id'));
    }
    public function update_profile_entreprise(Request $request)
    {
        $entreprise1 = $request->input('entreprise1');
        $address = $request->input('address');
        $city    = $request->input('city');
        $state   = $request->input('state');
        $pincode = $request->input('pincode');
        $company = $request->input('company');
       // $email = $request->input('email');
        $phone   = $request->input('phone');
        $linkd   = $request->input('linkd');
        if ($linkd != '') {
            $linkd = $request->input('http') . $linkd;
        }
        $uid = $request->input('s2_userid');
        $id  = $request->input('jobid');
        $s2_data = array(
            'entreprise' => $entreprise1,
            'adresse'    => $address,
            'villa'      => $city,
            'state'      => $state,
            'postal'     => $pincode,
            'pharmacie'  => $company,
          //  'email'      => $email,
            'phone'      => $phone,
            'linkd'      => $linkd,
        );
        $update_detail = DB::table('users')
            ->where('id', $uid)
            ->update($s2_data);
        return Redirect::to('/profile_entreprise/' . $uid)->with('success', __('message.savedata'));
    }
    public function delete($id)
    {
	$todaydate = date('Y-m-d');
        $delete = array(
            'iid' => $id,
        );
       
       DB::table('job_post')
            ->where('iid', $id)
            ->update(array('is_deleted' => true, 'del_date' => $todaydate));
        $service = DB::table('services')
            ->select('*')
            ->get(); 
        $user_name = session('user_name');
	$user_id = session('user_id');
	// start code to send first email
	 $noti = DB::table('notification')
                    ->select('*')
                    ->where('days', "T0")
                    ->first();
	 $jobs = DB::table('job_post')
		        ->select('*')
		        ->where('iid', $id)
		        ->first();
	 $users = DB::table('users')
                ->select('*')
                ->where('id', $user_id)
                ->first();
	
	$jobtitle = "";
	if(isset($jobs->company))
	{
            $jobtitle = str_replace(' ', '-', $jobs->company);
            $jobtitle = str_replace('/', '-', $jobtitle);
	}
            $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
            $jobtitle = strtolower($jobtitle);
             if(isset($jobs->job_id))
						    {
						    $urls    = "https://www.pharmapro.fr/offre-emploi/" . $jobs->job_id . "/" . $jobtitle;
							} else {
							$urls    = "https://www.pharmapro.fr/";
							}
            $linkurl = "<a href=$urls>$urls</a>";
            $from = 'info@pharmapro.fr';
            $cc = 'xavier.gruffat@gmail.com';
            $to      = $users->email;
            $subject = $noti->title;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'Bcc: ' . $cc . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = str_replace("title", $users->title, $noti->description);
            $message = str_replace("surname", $users->last_name, $message);
            $message = str_replace("url", $linkurl, $message);
           
	    $mail = mail($to, $subject, $message, $headers);
	// end code to send first email
        return Redirect::to('dashboard')->with('success', "Offre d'emploi effacée avec succès, vous pourrez la réactiver à tout moment.");
    }
    public function reactive($id)
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
        // dd($job_id);
        // code to get dynamic job id end
        DB::table('job_post')
            ->where('iid', $id)
            ->update(array(
                'is_deleted' => false,
                'job_id'     => $job_id,
                'updated_at' => date('Y-m-d H:i:s'),
            ));
        return Redirect::to('dashboard')->with('success', 'Job Post activated successfully.');
    }
    public function register()
    {
        return view('front/register');
    }
    public function check_login(Request $request)
    {
        $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
       	// return Redirect::to('/login')->with('error', 'Invalid Captcha');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
        }
        // noti email send start
        $Date = date('Y-m-d');
        $getdata = DB::table('noti_email')
            ->where('status', '=', 0)
            ->where('email_date', '=', $Date)
            ->get();
        foreach ($getdata as $k => $v) {
            $jobs = DB::table('job_post')
                ->select('*')
                ->where('job_id', $v->job_ids)
                ->first();
            $users = DB::table('users')
                ->select('*')
                ->where('id', $v->user_id)
                ->first();
            $noti = DB::table('notification')
                ->select('*')
                ->where('days', $v->noti)
                ->first();
            $data = array(
                'status' => 1,
            );
            Notiemail::where('id', $v->id)->update($data);
	$jobtitle = "";
	if(isset($jobs->company))
	{
            $jobtitle = str_replace(' ', '-', $jobs->company);
            $jobtitle = str_replace('/', '-', $jobtitle);
	}
            $jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
            $jobtitle = strtolower($jobtitle);
             if(isset($jobs->job_id))
						    {
						    $urls    = "https://www.pharmapro.fr/offre-emploi/" . $jobs->job_id . "/" . $jobtitle;
							} else {
							$urls    = "https://www.pharmapro.fr/";
							}
							
            $linkurl = "<a href=$urls>$urls</a>";
            $from = 'info@pharmapro.fr';
            $cc = 'xavier.gruffat@gmail.com';
            $to      = $users->email;
            $subject = $noti->title;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'Bcc: ' . $cc . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = str_replace("title", $users->title, $noti->description);
            $message = str_replace("surname", $users->last_name, $message);
            $message = str_replace("url", $linkurl, $message);
            $mail = @mail($to, $subject, $message, $headers);
        }
        // noti email send end
        $username   = $request->input('username');
        $password   = $request->input('password');
        $login_type = $request->input('login_type');
        if ($login_type == 'interviwer') {
            $Front_login = new Front_login();
            $check = DB::table('users')
                ->where('email', $username)
                ->where('password', $password)
                ->first();
            if (isset($check->email) && !empty($check->email)) {
                session(['login_type' => 'frontuser']);
                session(['user_id' => $check->id]);
                session(['user_name' => $check->email]);
                session(['activity_id' => $check->id]);
                session(['activity_type' => 0]);
                if (empty(session('lang'))) {
                    App::setLocale('en');
                    session(['lang' => 'en']);
                }
                return Redirect::to('/dashboard');
            } else {
                return Redirect::to('/login')->with('error', 'Invalid Username or Password');
            }
        } else {
            $check = DB::table('user_interviewee')
                ->where('email', $username)
                ->where('password', $password)
                ->first();
            if (isset($check->email) && !empty($check->email)) {
                session(['login_type' => 'interviewee']);
                session(['user_id' => $check->id]);
                session(['user_name' => $check->email]);
                session(['activity_id' => $check->id]);
                session(['activity_type' => 0]);
                if (empty(session('lang'))) {
                    App::setLocale('en');
                    session(['lang' => 'en']);
                }
                return Redirect::to('/dashboard');
            } else {
                return Redirect::to('/login')->with('error', 'Invalid Username or Password');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
    public function quickRandom($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
    public function name_auto_fill()
    {
        $searchTerm = $_GET['term'];
        $users      = DB::table('users')
            ->where('first_name', 'like', '%' . $searchTerm . '%')
            ->get();
        $users_data = array();
        if (count($users) > 0) {
            foreach ($users as $key => $value) {
                $data['id']    = $value->id;
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
        $users   = DB::table('users')
            ->where('id', '=', $user_id)
            ->first();
        echo json_encode($users);
    }
    public function name_auto_fill_interviewee()
    {
        $searchTerm = $_GET['term'];
        $users      = DB::table('user_interviewee')
            ->where('first_name', 'like', '%' . $searchTerm . '%')
            ->get();
        $users_data = array();
        if (count($users) > 0) {
            foreach ($users as $key => $value) {
                $data['id']    = $value->id;
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
        $users   = DB::table('user_interviewee')
            ->where('id', '=', $user_id)
            ->first();
        echo json_encode($users);
    }
    public function job_detail($id)
    {
        if (!empty($id)) {
            /*$jobdata = DB::table('job_post')
            ->select('*')
            ->where('id',$id)
            ->first();*/
            $job_post = array();
            $jobdata  = array();
            $jobdata = DB::table('job_post')
                ->leftjoin('services', 'job_post.service', '=', 'services.id')
                ->select('job_post.*', 'services.title', 'services.price')
                ->where('job_post.job_id', $id)
                ->first();
            if (isset($jobdata->state)) {
                $job_post = DB::table('filter_department')
                    ->where('department', 'like', '%' . $jobdata->state . '%')
                    ->get();
            }
// echo "<pre>";print_r($job_post);exit;
            $job_count1     = 0;
            $relatedjobdata = array();
            if (isset($job_post[0]->department)) {
                $job_count1 = DB::table('job_post')
                    ->whereIn('state', explode(',', $job_post[0]->department))
                    ->where('status', '=', 1)
                    ->count();
                $relatedjobdata = DB::table('job_post')
                    ->select('job_post.*')
                    ->where('job_post.job_title', $jobdata->job_title)
                    ->whereIn('job_post.state', explode(',', $job_post[0]->department))
                    ->where('job_post.status', 1)
                    ->where('job_post.job_id', '<>', $id)
                     ->where('job_post.created_at', '<', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
                    ->orderBy('job_post.urgent', 'DESC')
                    ->get();
            }
            if (isset($jobdata->state)) {
                return view('front/job_detail', compact('id', 'jobdata', 'relatedjobdata'));
            } else {
                return view('errors/404');
            }
        }
    }
 public function userstats(Request $request)
    {
         $visitcount = array();
         $id = $request->input('id');
         $visitcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->groupby('visit_date')
                     ->orderby('visit_date','asc')
                     ->get();
         $rs = array();
        foreach ($visitcount as $key => $value) {
             $vcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->where('visit_date','=',$value->visit_date)
                     ->count();
             $visitcount[$key]->visit = $vcount;
             $rs[] = $vcount;
             $dt[] = $value->visit_date;
        }
         return response()->json(['dates' => $dt, 'cnt' => $rs], 200);
    }
    public function checkstatesbetween(Request $request)
    {
         $id = $request->input('jid');
         $start = $request->input('startdate');
         $end = $request->input('enddate');
     
         $visitcount = array();
         if($start == "")
         {
         $visitcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->orderby('visit_date','asc')
                     ->groupby('visit_date')
                     ->get();
         } else {
            $visitcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->whereBetween('visit_date', array($start, $end))
                     ->orderby('visit_date','asc')
                     ->groupby('visit_date')
                     ->get();
         }
        $rs = array();
        $dt = array();
        foreach ($visitcount as $key => $value) {
             $vcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->where('visit_date','=',$value->visit_date)
                     ->count();
             $visitcount[$key]->visit = $vcount;
             $rs[] = $vcount;
             $dt[] = $value->visit_date;
        }
        return response()->json(['dates' => $dt, 'cnt' => $rs], 200);
    }
    public function showstats($id)
    {
         $visitcount = array();
         $visitcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->groupby('visit_date')
                     ->orderby('visit_date','asc')
                     ->get();
        $rs = array();
        $dt = array();
        foreach ($visitcount as $key => $value) {
             $vcount = DB::table('job_stats')
                     ->where('job_id','=',$id)
                     ->where('visit_date','=',$value->visit_date)
                     ->count();
             $visitcount[$key]->visit = $vcount;
             $rs[] = $vcount;
             $dt[] = $value->visit_date;
        }
          //  echo "<pre>";print_r($dt);exit;
        return view('front/job_stats', compact('id','visitcount','rs','dt'));
    }
    public function job_detail_process($id, $titleid)
    {
        $titleid = strtr(utf8_decode($titleid), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');
        if (!empty($id)) {
            $job_post = array();
            $jobdata  = array();
            $jobdata = DB::table('job_post')
                ->leftjoin('services', 'job_post.service', '=', 'services.id')
                ->select('job_post.*', 'services.title', 'services.price')
                ->where('job_post.job_id', $id)
		 ->where('job_post.is_deleted', '=',0)
                ->first();
                 $visitcount = DB::table('job_stats')
                    ->where('job_id','=',$id)
                    ->where('ip_address','=',$_SERVER['REMOTE_ADDR'])
                    ->count();
                    if($visitcount == 0)
                    {
                        $insert  = new JobStats();           
                        $insert->job_id       = $id;            
                        $insert->job_title = $titleid;
                        $insert->user_id   = session('user_id');
                        $insert->ip_address  = $_SERVER['REMOTE_ADDR'];
                        $insert->visit_date = date('Y-m-d');
                        $insert->save();
                    }
            if (isset($jobdata->state)) {
                $job_post = DB::table('filter_department')
                    ->where('department', 'like', '%' . $jobdata->state . '%')
                    ->get();
            }
//echo "<pre>";print_r($job_post);exit;
            $job_count1     = 0;
            $relatedjobdata = array();
            if (isset($job_post[0]->department)) {
                $job_count1 = DB::table('job_post')
                    ->whereIn('state', explode(',', $job_post[0]->department))
                    ->where('status', '=', 1)
                    ->count();
                $relatedjobdata = DB::table('job_post')
                    ->select('job_post.*')
                    ->where('job_post.job_title', $jobdata->job_title)
                    ->whereIn('job_post.state', explode(',', $job_post[0]->department))
                    ->where('job_post.status', 1)
		           ->where('job_post.created_at', '>', date_sub(NOW(), date_interval_create_from_date_string("35 days")))
                    ->where('job_post.job_id', '<>', $id)
                    ->orderBy('job_post.user_type', 'DESC')
                    ->get();
            }
            if (isset($jobdata->state)) {
                return view('front/job_detail', compact('id', 'jobdata', 'relatedjobdata'));
            } else {
                return view('errors/404');
            }
            // return view('front/job_detail',compact('id','jobdata','relatedjobdata'));
        }
    }
    public function apply_job($id)
    {
        $login_type   = session('login_type');
        $profile_data = array();
        if ($login_type == 'interviewee') {
            $user_id      = session('user_id');
            $profile_data = DB::table('user_interviewee')
                ->select('*')
                ->where('id', $user_id)
                ->first();
        }
        return view('front/apply_job', compact('id', 'profile_data'));
    }
    public function apply(Request $request)
    {
        if ($request->file('resume')) {
            $insert         = new ApplyModel();
            $uniqueFileName = uniqid() . $request->file('resume')->getClientOriginalName();
            $request->file('resume')->move(
                base_path() . '/public/resume', $uniqueFileName
            );
            $insert->resume       = $uniqueFileName;
            $insert->user_id      = session('user_id');
            $insert->job_post_iid = $request->input('iid');
            $insert->save();
            return redirect()->back()->with('success', 'Job apply successfully.');
        } else {
            return redirect()->back()->with('error', 'Please upload resume.');
        }
    }
    public function applied_job($iid)
    {
        if (!empty($iid)) {
            $apply_job = DB::table('apply_job')
                ->join('user_interviewee', 'user_interviewee.id', '=', 'apply_job.user_id')
                ->select('apply_job.*', 'user_interviewee.first_name', 'user_interviewee.last_name', 'user_interviewee.email')
                ->where('apply_job.job_post_iid', $iid)
                ->get();
            return view('front/applied_job', compact('apply_job'));
        }
    }
    public function all_job()
    {
        $job_post = DB::table('job_post')
            ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
		// ->orderBy('user_type', 'desc')
		 ->orderBy('prime_date', 'desc')
		//->orderBy('created_at', 'desc')
		->get();
        $jbc = '';
        return view('front/all_job', compact('job_post', 'jbc'));
    }
    public function prix()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'prix')
            ->first();
        return view('front/prix', compact('service'));
    }
    public function faq_employeur()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'faq_employeur')
            ->first();
        return view('front/faq_employeur', compact('service'));
    }
    public function faq_candidat()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'faq_candidat')
            ->first();
        return view('front/faq_candidat', compact('service'));
    }
    public function qui_sommes_nous()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'qui_sommes_nous')
            ->first();
        return view('front/qui_sommes_nous', compact('service'));
    }
    public function impressum()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'impressum')
            ->first();
        return view('front/impressum', compact('service'));
    }
    public function contact()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'contact')
            ->first();
        return view('front/contact_us', compact('service'));
    }
    public function protection_des_donnees()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'protection_des_donnees')
            ->first();
        return view('front/protection_des_donnees', compact('service'));
    }
    public function cg()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'cg')
            ->first();
        return view('front/cg', compact('service'));
    }
    public function cg_dutilisation()
    {
        if (empty(session('lang'))) {
            App::setLocale('en');
            session(['lang' => 'en']);
        } else {
            App::setLocale('fr');
            session(['lang' => 'fr']);
        }
        $lang = session('lang');
        $service = DB::table('page_cg')
            ->select('*')
            ->where('lang', '=', $lang)
            ->where('page_type', '=', 'cg_dutilisation')
            ->first();
        return view('front/cg_dutilisation', compact('service'));
    }
    public function show_cont_filter(Request $request)
    {
        $s          = $request->input('s');
        $s1         = $request->input('s1');
        $s2         = $request->input('s2');
        $s3         = $request->input('s3');
        $p1         = $request->input('p1');
        $cod_fil_id = $request->input('cod_fil_id');
        $cond       = [];
        if ($cod_fil_id == 1) {
            $cond = array('tcontrat' => 'CDI');
        }
        if ($cod_fil_id == 2) {
            $cond = array('tcontrat' => 'CDD');
        }
        if ($cod_fil_id == 3) {
            $cond = array('tcontrat' => 'Stage');
        }
        if ($cod_fil_id == 4) {
            $cond = array('tcontrat' => 'Apprentissage');
        }
        if ($cod_fil_id == 5) {
            $cond = array('travail' => 'Temps plein');
        }
        if ($cod_fil_id == 6) {
            $cond = array('travail' => 'Temps partiel');
        }
        if ($cod_fil_id == 7) {
            $cond = array('travail' => 'Autre - Indéfini');
        }
        if ($cod_fil_id == 8) {
            $cond = array('tcontrat' => 'CDI ou CDD');
        }
        if ($cod_fil_id == 9) {
            $cond = array('entreprise' => 'Pharmacie d’officine');
        }
        if ($cod_fil_id == 10) {
            $cond = array('entreprise' => 'Hôpital Clinique');
        }
        if ($cod_fil_id == 11) {
            $cond = array('entreprise' => 'Répartiteur');
        }
        if ($cod_fil_id == 12) {
            $cond = array('entreprise' => 'Industrie pharmaceutique');
        }
        if ($cod_fil_id == 13) {
            $cond = array('entreprise' => 'Paraparfumerie Parfumerie');
        }
        if ($cod_fil_id == 14) {
            $cond = array('entreprise' => 'Université Recherche');
        }
        if ($cod_fil_id == 15) {
            $cond = array('entreprise' => 'Organisation Association Institution ONG');
        }
        if ($cod_fil_id == 16) {
            $cond = array('entreprise' => 'Autre');
        }
        if ($cod_fil_id == 17) {
            $cond = array('urgent' => 'Non');
        }
        if ($cod_fil_id == 18) {
            $cond = array('urgent' => 'Oui');
        }
        $prof_data = '';
        if (!empty($s)) {
            $prof_data .= $s . ",";
        }
        if (!empty($s1)) {
            $prof_data .= $s1 . ",";
        }
        if (!empty($s2)) {
            $prof_data .= $s2 . ",";
        }
        if (!empty($s3)) {
            $prof_data .= $s3 . ",";
        }
        if (!empty($prof_data)) {
            $prof_data = rtrim($prof_data, ",");
        }
        $ss = $s . ',' . $s1 . ',' . $s2 . ',' . $s3;
        if ($s == 1111 && $s1 == 1111 && $s2 == 1111 && $s3 == 1111) {
            $ss1 = 11;
        } else {
            $ss1 = trim($ss, ",");
        }
        $job_post = [];
        if (!empty($prof_data) && !empty($p1)) {
            $reg = DB::table('filter_department')
                ->where('region', '=', $p1)
                ->get();
            $newval = "";
            if (isset($reg[0]->department)) {
                $newval   = $reg[0]->department;
                $job_post = DB::table('job_post')
                    ->Where($cond)
                    ->whereIn('state', explode(',', $newval))
                    ->whereIn('job_title', explode(',', $ss1))
                    ->where('status', '=', 1)
		    ->where('is_deleted', '=', 0)
                    ->orderBy('id', 'desc')
                    ->get();
            }
            /*$job_post = DB::table('job_post')
            ->Where($cond)
            ->Where('state','=',$p1)
            ->whereIn('job_title',explode(',', $ss1))
            ->Where('status','=',1)
            ->orderBy('id', 'desc')
            ->get();*/
            //echo 123;exit;
        } elseif (!empty($prof_data) && empty($p1)) {
            $job_post = DB::table('job_post')
                ->Where($cond)
                ->whereIn('job_title', explode(',', $ss1))
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
        } elseif (empty($prof_data) && !empty($p1)) {
            $reg = DB::table('filter_department')
                ->where('region', '=', $p1)
                ->get();
            $newval = "";
            if (isset($reg[0]->department)) {
                $newval   = $reg[0]->department;
                $job_post = DB::table('job_post')
                    ->Where($cond)
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        } else {
            $job_post = DB::table('job_post')
                ->Where($cond)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
        }
        echo $html = view('front/filter_job', compact('job_post'));
    }
    public function job_filter(Request $request)
    {
        $profession_val  = $request->input('profession_val');
        $profession_val1 = $request->input('profession_val1');
        $profession_val2 = $request->input('profession_val2');
        $profession_val3 = $request->input('profession_val3');
        $job_post = [];
        if (!empty($profession_val) && $profession_val != 1111) {
            $job_post = DB::table('job_post')
                ->where('job_title', '=', $profession_val)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val1)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val2)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val3)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
               // ->orderBy('id', 'desc')
		 ->orderBy('prime_date', 'desc')
                ->get();
        } else if (!empty($profession_val1) && $profession_val1 != 1111) {
            $job_post = DB::table('job_post')
                ->where('job_title', '=', $profession_val)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val1)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val2)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val3)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
               // ->orderBy('id', 'desc')
		 ->orderBy('prime_date', 'desc')
                ->get();
        } else if (!empty($profession_val2) && $profession_val2 != 1111) {
            $job_post = DB::table('job_post')
                ->where('job_title', '=', $profession_val)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val1)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val2)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val3)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
              //  ->orderBy('id', 'desc')
		 ->orderBy('prime_date', 'desc')
                ->get();
               
        } else if (!empty($profession_val3) && $profession_val3 != 1111) {
            $job_post = DB::table('job_post')
                ->where('job_title', '=', $profession_val)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val1)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val2)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->orWhere('job_title', '=', $profession_val3)
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
               // ->orderBy('id', 'desc')
		 ->orderBy('prime_date', 'desc')
                ->get();
        } else {
            $job_post = DB::table('job_post')
                ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                // ->orderBy('id', 'desc')
		 ->orderBy('prime_date', 'desc')
                ->get();
        }
// echo "<pre>"; print_r($job_post);exit;
        echo $html = view('front/filter_job', compact('job_post'));
    }
    public function job_filter_regions(Request $request)
    {
        $profession_val = $request->input('profession_val');
        $pval  = $request->input('pval');
        $pval1 = $request->input('pval1');
        $pval2 = $request->input('pval2');
        $pval3 = $request->input('pval3');
// cpde start
        $ss = $pval . ',' . $pval1 . ',' . $pval2 . ',' . $pval3;
        if ($pval == 1111 && $pval1 == 1111 && $pval2 == 1111 && $pval3 == 1111) {
            $ss1 = 11;
        } else {
            $ss1 = trim($ss, ",");
        }
        $job_post = array();
        if ($pval == 1111 && $pval1 == 1111 && $pval2 == 1111 && $pval3 == 1111 && $profession_val != 1111) {
            $reg = DB::table('filter_department')
                ->where('region', '=', $profession_val)
                ->get();
            $newval = "";
            if (isset($reg[0]->department)) {
                $newval   = $reg[0]->department;
                $job_post = DB::table('job_post')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->orderBy('prime_date', 'desc')
                    ->get();
            }
        } else {
            if ($profession_val == 1111) {
                if ($ss1 == 11) {
                    $job_post = DB::table('job_post')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->orderBy('prime_date', 'desc')
                        ->get();
                } else {
                    $job_post = DB::table('job_post')
                        ->where('status', '=', 1)
                        ->whereIn('job_title', explode(',', $ss1))
                        ->orderBy('prime_date', 'desc')
			->where('is_deleted', '=', 0)
                        ->get();
                }
            } else {
                $reg = DB::table('filter_department')
                    ->where('region', '=', $profession_val)
                    ->get();
                $newval = "";
                if (isset($reg[0]->department)) {
                    $newval   = $reg[0]->department;
                    $job_post = DB::table('job_post')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                         ->orderBy('prime_date', 'desc')
                        ->get();
                }
            }
        }
        echo $html = view('front/filter_job', compact('job_post'));
// code end
/*
$job_post = [];
if(!empty($pval) && $pval != 1111){
$reg = DB::table('filter_department')
->where('region','=',$profession_val)
->get();
$newval = "";
if(isset($reg[0]->department)){
$newval = $reg[0]->department;
$job_post = DB::table('job_post')
->Where('job_title','=',$pval)
->whereIn('state',explode(',', $newval))
->where('status','=',1)
->orderBy('id', 'desc')
->get();
} else {
$job_post = DB::table('job_post')
->Where('job_title','=',$pval)
->where('status','=',1)
->orderBy('id', 'desc')
->get();
}
} else if(!empty($pval1) && $pval1 != 1111){
$reg = DB::table('filter_department')
->where('region','=',$profession_val)
->get();
$newval = "";
if(isset($reg[0]->department)){
$newval = $reg[0]->department;
$job_post = DB::table('job_post')
->Where('job_title','=',$pval1)
->whereIn('state',explode(',', $newval))
->where('status','=',1)
->orderBy('id', 'desc')
->get();
} else {
$job_post = DB::table('job_post')
->Where('job_title','=',$pval1)
->where('status','=',1)
->orderBy('id', 'desc')
->get();
}
} else if(!empty($pval2) && $pval2 != 1111){
$reg = DB::table('filter_department')
->where('region','=',$profession_val)
->get();
$newval = "";
if(isset($reg[0]->department)){
$newval = $reg[0]->department;
$job_post = DB::table('job_post')
->Where('job_title','=',$pval2)
->whereIn('state',explode(',', $newval))
->where('status','=',1)
->orderBy('id', 'desc')
->get();
} else {
$job_post = DB::table('job_post')
->Where('job_title','=',$pval2)
->where('status','=',1)
->orderBy('id', 'desc')
->get();
}
} else if(!empty($profession_val) && $profession_val != 1111){
$reg = DB::table('filter_department')
->where('region','=',$profession_val)
->get();
$newval = "";
if(isset($reg[0]->department)){
$newval = $reg[0]->department;
$job_post = DB::table('job_post')
->whereIn('state',explode(',', $newval))
->where('status','=',1)
->orderBy('id', 'desc')
->get();
} else {
$job_post = DB::table('job_post')
// ->Where('job_title','=',$pval)
->where('status','=',1)
->orderBy('id', 'desc')
->get();
}
}else{
$job_post = DB::table('job_post')
->where('status','=',1)
->orderBy('id', 'desc')
->get();
}
echo $html = view('front/filter_job',compact('job_post'));
 */
    }
    public function job_filter_contrat(Request $request)
    {
        $profession_val = $request->input('profession_val');
        $pval  = $request->input('pval');
        $pval1 = $request->input('pval1');
        $pval2 = $request->input('pval2');
        $pval3 = $request->input('pval3');
// cpde start
        $ss = $pval . ',' . $pval1 . ',' . $pval2 . ',' . $pval3;
        if ($pval == 1111 && $pval1 == 1111 && $pval2 == 1111 && $pval3 == 1111) {
            $ss1 = 11;
        } else {
            $ss1 = trim($ss, ",");
        }
        $job_post = array();
        if ($pval == 1111 && $pval1 == 1111 && $pval2 == 1111 && $pval3 == 1111 && $profession_val != 1111) {
            $reg = DB::table('filter_department')
                ->where('region', '=', $profession_val)
                ->get();
            $newval = "";
            if (isset($reg[0]->department)) {
                $newval = $reg[0]->department;
                $cdi_count = DB::table('job_post')
                    ->where('tcontrat', 'CDI')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $cdd_count = DB::table('job_post')
                    ->where('tcontrat', 'CDD')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $cdi_cdd_count = DB::table('job_post')
                    ->where('tcontrat', 'CDI ou CDD')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $stage_count = DB::table('job_post')
                    ->where('tcontrat', 'Stage')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
                $apprentissage_count = DB::table('job_post')
                    ->where('tcontrat', 'Apprentissage')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
                $travail_count1 = DB::table('job_post')
                    ->where('travail', 'Temps plein')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $travail_count2 = DB::table('job_post')
                    ->where('travail', 'Temps partiel')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
                $travail_count3 = DB::table('job_post')
                    ->where('travail', 'Autre - Indéfini')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
// start 8 conditon
                $secteur_count1 = DB::table('job_post')
                    ->where('entreprise', 'Pharmacie d’officine')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count2 = DB::table('job_post')
                    ->where('entreprise', 'Hôpital Clinique')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count3 = DB::table('job_post')
                    ->where('entreprise', 'Répartiteur')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
                    ->count();
                $secteur_count4 = DB::table('job_post')
                    ->where('entreprise', 'Industrie pharmaceutique')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count5 = DB::table('job_post')
                    ->where('entreprise', 'Paraparfumerie Parfumerie')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count6 = DB::table('job_post')
                    ->where('entreprise', 'Université Recherche')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count7 = DB::table('job_post')
                    ->where('entreprise', 'Organisation Association Institution ONG')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                    ->count();
                $secteur_count8 = DB::table('job_post')
                    ->where('entreprise', 'Autre')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $non = DB::table('job_post')
                    ->where('urgent', 'Non')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
                $oui = DB::table('job_post')
                    ->where('urgent', 'Oui')
                    ->whereIn('state', explode(',', $newval))
                    ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                    ->count();
// end 8 conditon
            }
        } else {
            if ($profession_val == 1111) {
                if ($ss1 == 11) {
                    $cdi_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDD')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdi_cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI ou CDD')
                        ->where('status', '=', 1)
                        ->count();
                    $stage_count = DB::table('job_post')
                        ->where('tcontrat', 'Stage')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $apprentissage_count = DB::table('job_post')
                        ->where('tcontrat', 'Apprentissage')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count1 = DB::table('job_post')
                        ->where('travail', 'Temps plein')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count2 = DB::table('job_post')
                        ->where('travail', 'Temps partiel')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count3 = DB::table('job_post')
                        ->where('travail', 'Autre - Indéfini')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    // start 8 conditon
                    $secteur_count1 = DB::table('job_post')
                        ->where('entreprise', 'Pharmacie d’officine')
                        ->where('status', '=', 1)
                        ->count();
                    $secteur_count2 = DB::table('job_post')
                        ->where('entreprise', 'Hôpital Clinique')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count3 = DB::table('job_post')
                        ->where('entreprise', 'Répartiteur')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count4 = DB::table('job_post')
                        ->where('entreprise', 'Industrie pharmaceutique')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count5 = DB::table('job_post')
                        ->where('entreprise', 'Paraparfumerie Parfumerie')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count6 = DB::table('job_post')
                        ->where('entreprise', 'Université Recherche')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count7 = DB::table('job_post')
                        ->where('entreprise', 'Organisation Association Institution ONG')
                        ->where('status', '=', 1)
				->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count8 = DB::table('job_post')
                        ->where('entreprise', 'Autre')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $non = DB::table('job_post')
                        ->where('urgent', 'Non')
                        ->where('status', '=', 1)
				->where('is_deleted', '=', 0)
                        ->count();
                    $oui = DB::table('job_post')
                        ->where('urgent', 'Oui')
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
// end 8 conditon
                } else {
                    $cdi_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDD')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdi_cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI ou CDD')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $stage_count = DB::table('job_post')
                        ->where('tcontrat', 'Stage')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
		->where('is_deleted', '=', 0)
                        ->count();
                    $apprentissage_count = DB::table('job_post')
                        ->where('tcontrat', 'Apprentissage')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count1 = DB::table('job_post')
                        ->where('travail', 'Temps plein')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count2 = DB::table('job_post')
                        ->where('travail', 'Temps partiel')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count3 = DB::table('job_post')
                        ->where('travail', 'Autre - Indéfini')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    // start 8 conditon
                    $secteur_count1 = DB::table('job_post')
                        ->where('entreprise', 'Pharmacie d’officine')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
                        ->count();
                    $secteur_count2 = DB::table('job_post')
                        ->where('entreprise', 'Hôpital Clinique')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count3 = DB::table('job_post')
                        ->where('entreprise', 'Répartiteur')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count4 = DB::table('job_post')
                        ->where('entreprise', 'Industrie pharmaceutique')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count5 = DB::table('job_post')
                        ->where('entreprise', 'Paraparfumerie Parfumerie')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count6 = DB::table('job_post')
                        ->where('entreprise', 'Université Recherche')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count7 = DB::table('job_post')
                        ->where('entreprise', 'Organisation Association Institution ONG')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count8 = DB::table('job_post')
                        ->where('entreprise', 'Autre')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $non = DB::table('job_post')
                        ->where('urgent', 'Non')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $oui = DB::table('job_post')
                        ->where('urgent', 'Oui')
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
// end 8 conditon
                }
            } else {
                $reg = DB::table('filter_department')
                    ->where('region', '=', $profession_val)
                    ->get();
                $newval = "";
                if (isset($reg[0]->department)) {
                    $newval = $reg[0]->department;
                    $cdi_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDD')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $cdi_cdd_count = DB::table('job_post')
                        ->where('tcontrat', 'CDI ou CDD')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $stage_count = DB::table('job_post')
                        ->where('tcontrat', 'Stage')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $apprentissage_count = DB::table('job_post')
                        ->where('tcontrat', 'Apprentissage')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count1 = DB::table('job_post')
                        ->where('travail', 'Temps plein')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count2 = DB::table('job_post')
                        ->where('travail', 'Temps partiel')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $travail_count3 = DB::table('job_post')
                        ->where('travail', 'Autre - Indéfini')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    // start 8 conditon
                    $secteur_count1 = DB::table('job_post')
                        ->where('entreprise', 'Pharmacie d’officine')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count2 = DB::table('job_post')
                        ->where('entreprise', 'Hôpital Clinique')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count3 = DB::table('job_post')
                        ->where('entreprise', 'Répartiteur')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count4 = DB::table('job_post')
                        ->where('entreprise', 'Industrie pharmaceutique')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count5 = DB::table('job_post')
                        ->where('entreprise', 'Paraparfumerie Parfumerie')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count6 = DB::table('job_post')
                        ->where('entreprise', 'Université Recherche')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count7 = DB::table('job_post')
                        ->where('entreprise', 'Organisation Association Institution ONG')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $secteur_count8 = DB::table('job_post')
                        ->where('entreprise', 'Autre')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $non = DB::table('job_post')
                        ->where('urgent', 'Non')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
                    $oui = DB::table('job_post')
                        ->where('urgent', 'Oui')
                        ->whereIn('state', explode(',', $newval))
                        ->whereIn('job_title', explode(',', $ss1))
                        ->where('status', '=', 1)
			->where('is_deleted', '=', 0)
                        ->count();
// end 8 conditon
                }
            }
        }
        echo $html = view('front/filter_contact', compact('non', 'oui', 'cdi_count', 'cdd_count', 'stage_count', 'apprentissage_count', 'travail_count1', 'travail_count2', 'cdi_cdd_count', 'travail_count3', 'secteur_count1', 'secteur_count2', 'secteur_count3', 'secteur_count4', 'secteur_count5', 'secteur_count6', 'secteur_count7', 'secteur_count8'));
    }
    public function job_filter_box(Request $request)
    {
        $pval      = $request->input('profession_val');
        $pval1     = $request->input('sf1');
        $ss        = trim($pval1, ",");
        $job_post  = [];
        echo $html = view('front/filter_job_box', compact('job_post', 'pval', 'ss'));
    }
    public function job_cont_box(Request $request)
    {
        $pval      = $request->input('profession_val');
        $pval1     = $request->input('sf1');
        $ss        = trim($pval1, ",");
        $job_post  = [];
        echo $html = view('front/filter_cont_box', compact('job_post', 'pval', 'ss'));
    }
    public function job_filter_department(Request $request)
    {
        $profession_val = $request->input('profession_val');
        $job_post = [];
        if (!empty($profession_val)) {
            $job_post = DB::table('department')
                ->where('no', 'like', '' . $profession_val . '%')
                ->orderBy('id', 'desc')
                ->get();
        }
        echo $html = view('front/filter_job_depart', compact('job_post'));
    }
    public function getcontact(Request $request)
    {
	 $recaptcha = $request->input('g-recaptcha-response');
        if (empty($recaptcha)) {
       	  return Redirect::to('/contact')->with('error', 'Invalid Captcha');
        } else {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret     = '6LfXuKUZAAAAACTZRW5acFcIwNrxmyksKMxNlHB1';
            $ip         = $_SERVER['REMOTE_ADDR'];
        }
        $name     = $request->input('username');
        $email    = $request->input('email');
        $message1 = $request->input('message');
        $from = " info@pharmapro.ch";
        $subject = "Formulaire de contact de Pharmapro.fr";
        $to      = "xavier.gruffat@gmail.com";
        $message = '<html><body>';
        $message .= '<table border=1>';
        $message .= '<tr><td>Name</td><td>' . $name . '</td></tr>';
        $message .= '<tr><td>Email</td><td>' . $email . '</td></tr>';
        $message .= '<tr><td>Message</td><td>' . $message1 . '</td></tr>';
        $message .= '</table>';
        $message .= '</body></html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from . "\r\n";
        $mail = @mail($to, $subject, $message, $headers);
        return Redirect::to('/contact')->with('success', 'Merci de nous avoir contacté, nous vous répondrons dans les plus bref délais.');
    }
}