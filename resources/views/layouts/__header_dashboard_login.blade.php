<!doctype html>
<?php  $url = url()->current();

date_default_timezone_set('Europe/Paris');

$segment1 =  Request::segment(1);

$tag = "";
$desc = "";
$title = "";

$last = DB::table('seo_tags')->select('*')->where('page_name',$segment1)->orderBy('id', 'desc')->first();
if(isset($last))
{
$tag = $last->tag;
$title = $last->title;
$desc = $last->desc;
}else{

$last1 = DB::table('job_post')->select('*')->where('job_id',$segment1)->orderBy('id', 'desc')->first();
  if(isset($last1))
  {
    if($last1->job_title == "Pharmacien (H/F)")
    {
      // $last1->job_title = "Pharmapro.fr";
    }

  $title = $last1->job_title.' - '.$last1->city.' - '.$segment1.' - Pharmapro.fr';
  // $title = "pharmapro.fr";
  } else{
  $title = "pharmapro.fr";
  }

}



$lang = session('lang');
App::setLocale($lang);

?>

<html>
<head>
  <title><?php echo $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/layouts/layout4/front/images1/favicon-16x16.png') }}" />
</head>
<link href="{{asset('assets/dashbaord_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/dashbaord_assets/css/style.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&display=swap" rel="stylesheet" type="text/css">

<body>
<!-- Header part start -->
<header id="header" class="header d-flex align-items-center">
 <div class="container">
   <div class="row header-main">
     <div class="col-lg-6">
      <?php $user_type = session('login_type');
          if($user_type == 'admin'){
            $url = 'dashboard_admin';
          }else{
            $url = '/';
          }
          ?>
      <a href="{{ url($url) }}" class="logo d-flex align-items-center"><img src="{{asset('assets/dashbaord_assets/images/logo.png')}}" alt=""></a>
     </div>
     <?php $user_type = session('login_type');
          if($user_type == 'admin'){
            $url = 'dashboard_admin';
          }else{
            $url = '/';
          }
          ?>
     <div class="col-lg-6">
      <div class="row header-right">
       <!-- <div class="col-lg-3 header-social-icon">
         <a target="_blanck" href="https://www.facebook.com/groups/pharmapro.fr" class="fa fa-facebook">facebook</a>
         <a target="_blanck" href="https://www.instagram.com/pharmapro_france/" class="fa fa-instagram">Instagram</a>
       </div> -->
      <div class="col-lg-3 user-login">
        <div class="navbar-collapse">
          <?php
           
$userdata = DB::table('users')->select('*')->where('email',session('user_name'))->first();
/*Add Team HUb After loging menu Date:-5/05/2022*/
$teamhub=DB::table('pharmapro_teammember')->select('*')->where('email',session('user_name'))->first();
?>
    <!-- Add Company name -->

    <?php 

    $nname = "";

    if(isset($userdata->company_detail)) { 
      $nname = $userdata->company_detail;
      }

      if($nname != ""){ ?>
          <strong class="company-id"><a href="javascript:void(0);"><?php echo $userdata->pharmacie?></a></strong>
          <?php } else { ?> 
          <strong class="company-id"><a href="javascript:void(0);"><?php echo $nname ; ?></a></strong>
           <?php } ?>

           <?php
      $login_type=session('login_type');
      if($login_type == 'pharmapro_teamhub'){
        $user_id=session('user_id');
        $user_data=DB::table('users')->where('id',$user_id)->first();
    ?>

      <?php if($user_data->company_detail == "") { ?>
        <strong class="company-id"><a href="javascript:void(0);"><?php echo $user_data->pharmacie ?></a></strong>
        <?php } else { ?>
        <strong class="company-id"><a href="javascript:void(0);"><?php echo $user_data->company_detail ?></a></strong>
        <?php } } ?>
        <?php if(isset($userdata->first_name)) { ?>
          <span class="user-icon"><a href="javascript:void(0);"><?php echo $userdata->first_name.' '.$userdata->last_name ?>
            <i class="fa fa-caret-down"><img src="{{asset('assets/dashbaord_assets/images/caret-down.png')}}" alt=""></i></a>
          </span> 
          <?php }  ?> 
<?php
      $login_type=session('login_type');
      if($login_type == 'pharmapro_teamhub'){
         if(isset($teamhub->first_name)){
          ?>
          <span class="user-icon"><a href="javascript:void(0);"><?php echo $teamhub->first_name.' '.$teamhub->last_name ?>
            <i class="fa fa-caret-down"><img src="{{asset('assets/dashbaord_assets/images/caret-down.png')}}" alt=""></i></a>
          </span> 

          <div class="user-login-dropdown">
           <ul>
            <li><a href="{{ url('dashboard') }}">Tableau de bord</a></li>
            <?php 
                  $day = date("d");
                  $month = date("m");
                  $year = date("y");
                  $last = DB::table('job_post')->select('id')->orderBy('id', 'desc')->first();
                  $last_id = (isset($last->id) ? $last->id + 1 : 1);
                  $job_id = 'pef'.$day.$month.$year.'a'.$last_id;
                ?>
            <li><a href="{{ url('interview') }}/<?php echo $job_id ?>">Nouvelle offre d'emploi</a></li>
            <li><a href="{{ url('Teamhubuser_profile') }}">Mon compte</a></li>
            <li><a href="#">Mon entreprise (adresses)</a></li>
            <li><a href="#">Gestion utilisateurs </a></li>
            <li><a href="#">Historique des achats</a></li>
            <li><a href="{{ url('logout') }}">Se déconnecter</a></li>   
           </ul>         
          </div>
           <?php
         }
      }
    ?>
    <div class="user-login-dropdown">
           <ul>
            <li><a href="{{ url('dashboard') }}">Tableau de bord</a></li>
            <?php 
            $day = date("d");
            $month = date("m");
            $year = date("y");
            $last = DB::table('job_post')->select('id')->orderBy('id', 'desc')->first();
            $last_id = (isset($last->id) ? $last->id + 1 : 1);
            $job_id = 'pef'.$day.$month.$year.'a'.$last_id;
                ?>
            <li><a href="{{ url('interview') }}/<?php echo $job_id ?>">Nouvelle offre d'emploi</a></li>
            <li><a href="{{ url('profile') }}">Mon compte</a></li>
            <?php $editurl = "profile_entreprise/".session('user_id'); ?>
            <li><a href="{{ url($editurl) }}">Mon entreprise (adresses)</a></li>
            <li><a href="{{ url('pharmpro_teamhub') }}">Gestion utilisateurs </a></li>
            <li><a href="{{ url('purchase_history') }}">Historique des achats</a></li>
            <li><a href="{{ url('logout') }}">Se déconnecter</a></li>   
           </ul>         
          </div>
        </div>
      </div>
      </div>  
     </div>
   </div>
 </div>
</header>
<!-- Header part end -->