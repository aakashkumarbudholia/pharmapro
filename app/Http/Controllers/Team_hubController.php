<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\PharmaproTeamHub;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class Team_hubController extends Controller
{
	public function __construct()
    {
        date_default_timezone_set('Europe/Paris');
    }
    public function index()
    {
        $massage="";
        $user=New PharmaproTeamHub;
        if(session("ADD_POST_DATA") != "")
        {
          $user=session("ADD_POST_DATA");
        }
        session(['ADD_POST_DATA'=>'']);
        if(session("ADD_TEAM_MEMBER_MESSAGE") != "")
        {
           $massage=session("ADD_TEAM_MEMBER_MESSAGE");        
        }
        session(['ADD_TEAM_MEMBER_MESSAGE' => '']);
        return view('front/pharmapro_teamhub',compact('massage','user'));
    }
    public function insert(Request $request)
    {
        /*Insert Team Hub User Data*/
        $user_id=session('user_id');
        $id=$request->input('id');
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $role=$request->input('role');
        /*check email*/
        $is_email_alredy_exises=false;
        $massage='';
        $check = DB::table('users')
          ->where('email', $email)
          ->first();  
        if(isset($check->email) && !empty($check->email)){
          $is_email_alredy_exises=true;
        }
        $check = DB::table('pharmapro_teammember')
          ->where('email', $email)
          ->first();  
        if(isset($check->email) && !empty($check->email)){
           $is_email_alredy_exises=true;
        }
        if($is_email_alredy_exises==false){
            $data=array(
            'interviewer_id'=>$user_id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'role'=>$role
            );
            PharmaproTeamHub::insert($data);
            
         /*   session(['EDIT_TEAM_MEMBER_MESSAGE_SUCCESS' => 'Team Member Successfully Added.Verify email has been sent to the specified Team Member email address.']);*/
            session(['EDIT_TEAM_MEMBER_MESSAGE_SUCCESS' => "Membre de l'équipe ajouté avec succès. Vérifiez que l'e-mail a été envoyé à l'adresse e-mail du membre d'équipe spécifié. ATTENTION, regardez (ou informez le membre) bien dans le dossier spam. "]);
        /*Add Email Functionality*/
            
            /*Tem Hub User Data*/
            $New_user=DB::table('pharmapro_teammember')
                    ->where('interviewer_id',$user_id)
                    ->where('email',$email)
                    ->where('first_name',$first_name)
                    ->where('last_name',$last_name)
                    ->first();
            $New_user_id=$New_user->id;
            $Set_new_email=$New_user->email;
            $team_hub_firstName=$New_user->first_name;
            $team_hub_lastName=$New_user->last_name;
            /*End Team Hub User Data*/
            /*User(interviewer) Data*/
            $user_id=session('user_id');
            $Interviewer_Date=DB::table('users')
                ->where('id',$user_id)
                ->first();
            $Set_new_user_fname=$Interviewer_Date->first_name;
            $Set_new_user_lname=$Interviewer_Date->last_name;
            $Static_email='vali@ncodetechnologies.com';

            /*End User(interviewer) Data*/
            $logo_img="https://www.pharmapro.fr/assets/layouts/layout4/front/images1/logo-pharmajob-transp_new.png"; 
            $from='info@pharmapro.fr';
            $subject="Pharmapro.fr vous invite à créer un compte";
            $to=$Set_new_email;
            /*$email_to = implode(',', $to);*/
                $message = '<html><body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 200%; -webkit-text-size-adjust: 200%;">';
                $message .= '<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>';
                $message .= '<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">';
                $message .='<tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

                            <!-- START CENTERED WHITE CONTAINER -->             
                            <div class="logo" style="width: 560px;">
                                <img style="margin: auto; padding: 15px;" src="'.$logo_img.'">
                            </div>                                  
                            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

                              <!-- START MAIN CONTENT AREA -->
                              <tr>

                                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">

                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                    <tr>
                                        
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                       Vous avez été invité à rejoindre un compte du site Pharmapro.fr</p>
                                         <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                         '.$Set_new_user_fname.' '.$Set_new_user_lname.'
                                          vous invite à rejoindre Pharmapro.fr.</p>
                                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                            Commencez par créer votre profil Pharmapro.fr en choisissant un mot de passe. Si vous êtes déjà utilisateur de Pharmapro.fr, il vous sera demandé de vous connecter pour accéder à ce compte.
                                        </p>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #009c08;" valign="top" align="center" bgcolor="#009c08"> 

                                                        <a href="https://www.pharmapro.fr/setPassword/'.$New_user_id.'" style="border: solid 1px #009c08; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #009c08; border-color: #009c08; color: #ffffff;">Rejoindre Pharmapro.fr</a> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        
                                      
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>

                            <!-- END MAIN CONTENT AREA -->
                            </table>
                            <!-- END CENTERED WHITE CONTAINER -->

                            

                          </div>
                        </td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                      </tr>';
                $message .= '</table>';
               
                $message .= '</body></html>';
                
               //dd($message);
              //  $headers = "MIME-Version: 1.0" . "\r\n";
              //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              //  $headers .= "From:" . $from . "\r\n";              
              //  $mail = @mail($to, $subject, $message, $headers);

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


            
           /* $logo_img="https://www.pharmapro.fr/assets/layouts/layout4/front/images1/logo-pharmajob-transp_new.png"; 
            Mail::send([],[],function($message) use($New_user_id,$Set_new_user_fname,$Set_new_user_lname,$logo_img,$Set_new_email){
            $message->to($Set_new_email)
            //->subject('Votre invitation à rejoindre un Pharmapro.fr  Compte!')
            ->subject('Pharmapro.fr vous invite à créer un compte')
            ->setBody('
            <html>
                <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 200%; -webkit-text-size-adjust: 200%;">

                    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
                      <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

                            <!-- START CENTERED WHITE CONTAINER -->             
                            <div class="logo" style="width: 560px;">
                                <img style="margin: auto; padding: 15px;" src="'.$logo_img.'">
                            </div>                                  
                            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

                              <!-- START MAIN CONTENT AREA -->
                              <tr>

                                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">

                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                    <tr>
                                        
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                       Vous avez été invité à rejoindre un compte du site Pharmapro.fr</p>
                                         <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                         '.$Set_new_user_fname.' '.$Set_new_user_lname.'
                                          vous invite à rejoindre Pharmapro.fr.</p>
                                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                            Commencez par créer votre profil Pharmapro.fr en choisissant un mot de passe. Si vous êtes déjà utilisateur de Pharmapro.fr, il vous sera demandé de vous connecter pour accéder à ce compte.
                                        </p>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #009c08;" valign="top" align="center" bgcolor="#009c08"> 

                                                        <a href="https://www.pharmapro.fr/setPassword/'.$New_user_id.'" style="border: solid 1px #009c08; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #009c08; border-color: #009c08; color: #ffffff;">Rejoindre le compte</a> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        
                                      
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>

                            <!-- END MAIN CONTENT AREA -->
                            </table>
                            <!-- END CENTERED WHITE CONTAINER -->

                            

                          </div>
                        </td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                      </tr>
                    </body>
                </html>', 'text/html');
                $message->from('info@pharmapro.fr','pharmapro');
            });*/
        /*End Email Functionality


        /*Add Conformation Email from Addmin*/
        $from='info@pharmapro.fr';
        $subject="Nouveau membre du hub déquipe ajouté";
        //$to='xavier.gruffat@gmail.com','vali@ncodetechnologies.com';
        $to="xavier.gruffat@gmail.com";
           
        $message='<html><body>';
        $message .=' <p>'.$Set_new_user_fname.'&nbsp;'.$Set_new_user_lname.' a été ajouté un nouveau membre du hub déquipe, les détails du nouveau membre du hub déquipe ont été ajoutés comme ci-dessous.</p>';
        $message .='<table border=1>';
        $message .='<tr><td>Prénom</td><td>'.$team_hub_firstName.'</td></tr>';
        $message .='<tr><td>Durer Nom</td><td>'.$team_hub_lastName.'</td></tr>';
        $message .=' <tr><td>Adresse e-mail</td><td>'.$Set_new_email.'</td></tr>';
        $message .='</table>';
        $message .='</body></html>';
     //   $headers = "MIME-Version: 1.0" . "\r\n";
     //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
     //   $headers .= "From:" . $from . "\r\n";
    // $mail = @mail($to, $subject, $message, $headers);

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


             /*Mail::send([],[],function($message) use($Set_new_user_fname,$Set_new_user_lname,$team_hub_firstName,$team_hub_lastName,$Set_new_email){
               //$message->to('xavier.gruffat@gmail.com')
              $message->to('ncode14@gmail.com')
                ->subject('Nouveau membre du hub déquipe ajouté')
                ->setBody('
                <html>
                    <body>
                        <p>'.$Set_new_user_fname.'&nbsp;'.$Set_new_user_lname.' a été ajouté un nouveau membre du hub déquipe, les détails du nouveau membre du hub déquipe ont été ajoutés comme ci-dessous.</p>
                        <table border=1>
                            <tr><td>Prénom</td><td>'.$team_hub_firstName.'</td>
                            </tr>
                            <tr>
                                <td>Durer Nom</td><td>'.$team_hub_lastName.'</td>
                            </tr>
                            <tr>
                                <td>Adresse e-mail</td><td>'.$Set_new_email.'</td>
                            </tr>
                        </table>
                    </body>
                </html>
           ', 'text/html');
                $message->from('info@pharmapro.fr','pharmapro');
            });*/
            /*End Conformation Email*/

            return Redirect::to('pharmpro_teamhub');
        }else{
            //$massage="l'email existe déjà.";
            $massage="L’e-mail existe déjà dans le système (Pharmapro.fr).";
            $user=New PharmaproTeamHub;
            $user->first_name=$request->input('first_name');
            $user->last_name=$request->input('last_name');
            $user->email=$request->input('email');
            $user->role=$request->input('role');
            session(['ADD_POST_DATA'=> $user]);
            $returnurl="pharmpro_teamhub";
            $finalRetrunURL = "$returnurl" ;
            session(['ADD_TEAM_MEMBER_MESSAGE' => $massage]);
            return Redirect::to($finalRetrunURL);
        }
        
    }
    public function CheckEmailAddress(Request $request)
    {
        $email = $request->input('email');
        $isExists = DB::table('pharmapro_teammember')->where('email',$email)->first();
        if($isExists){
            return response()->json(true);
            //echo "email alredy exists";  
        }else{
            return response()->json(false);
        }
            
    }
    public function edit(Request $request,$id)
    {
        $update = PharmaproTeamHub::find($id);

        $id=$request->input('id');
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $role=$request->input('role');
        $is_email_alredy_exises=false;
        $massage="";
        $check = DB::table('users')
            ->where('email',$email)
            ->first();
        if(isset($check->email) && !empty($check->email)){
            $is_email_alredy_exises=true;
        } 
        $query = DB::table('pharmapro_teammember');
        $query->where('email',$email);
        $query->where('id','!=',$id);
        $check  = $query->first();
        if(isset($check->email) && !empty($check->email)){
            $is_email_alredy_exises=true;
            $massage="$id";
        }
        if($is_email_alredy_exises == false){
           /* $update->first_name=Input::get('first_name');
            $update->last_name=Input::get('last_name');
            $update->email=Input::get('email');*/
            $update->role=Input::get('role');

            $update->save();
            session(['EDIT_TEAM_MEMBER_MESSAGE_SUCCESS' => 'Les détails des membres de léquipe ont été mis à jour avec succès.']);
            return Redirect::to('pharmpro_teamhub');
                        
        }else{
            $massage="l'email existe déjà.";
            $user=New PharmaproTeamHub;
            $user->first_name=$request->input('first_name');
            $user->last_name=$request->input('last_name');
            $user->email=$request->input('email');
            $user->role=$request->input('role');
            $returnurl="pharmpro_teamhub/edit/";
            $retunId = "$id";
            $finalRetrunURL = "$returnurl" . "$retunId";
            session(['EDIT_TEAM_MEMBER_MESSAGE' => $massage]);
            return Redirect::to($finalRetrunURL);
        }
       

  
    }
    public function delete($id)
    {
        $data=PharmaproTeamHub::find($id);
        $data->delete();
        return Redirect::to('pharmpro_teamhub')->with('success','User delete');
    }
    public function setpassword($id)
    {
        
        $Phr_Teamhub_Data=DB::table('pharmapro_teammember')
            ->where('id',$id)
            ->first();
            session(['login_type'=> null]); // For Team Member User 
            session(['team_member_id'=> null]);//Show id when team member login 
            session(['user_id'=> null]);
            session(['first_name'=>null]);
            session(['last_name'=>null]);
            session(['user_name'=>null]);
            session(['activity_id'=>null]);
            session(['activity_type'=>0]);
            session(['team_member_access'=>null]);
        if($Phr_Teamhub_Data == null){
            return Redirect::to('login');
        }
        if($Phr_Teamhub_Data->password != null && $Phr_Teamhub_Data->password != '')
        {
            return Redirect::to('AlredyActiveted');
        }
        return view('front/teamhub_setpassword',compact('Phr_Teamhub_Data'));
    }
    public function sendPassword(Request $request,$id)
    {
        $id=$request->input('id');
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $password=$request->input('password');
        $data=array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>$password,
        );
        PharmaproTeamHub::where('id',$id)->update($data);
        return Redirect::to('ThankYou');
    }
    public function thankyou()
    {
        return view('front/Thank_you');
    }
    public function alredyactiveted()
    {
        return view('front/alredyactiveted');
    }
}
