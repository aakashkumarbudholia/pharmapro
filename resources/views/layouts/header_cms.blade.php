<!doctype html>
<?php  $url = url()->current();

date_default_timezone_set('Europe/Paris');

$segment1 =  Request::segment(1);
$segment2 =  Request::segment(1);

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

$last1 = DB::table('job_post')->select('*')->where('job_id',$segment2)->orderBy('id', 'desc')->first();
	if(isset($last1))
	{
		if($last1->job_title == "Pharmacien (H/F)")
		{
			// $last1->job_title = "Pharmapro.fr";
		}

	$title = $last1->job_title.' - '.$last1->city.' - '.$segment2.' - Pharmapro.fr';
	// $title = "pharmapro.fr";
	} else{
	$title = "pharmapro.fr";
	}

}



$lang = session('lang');
App::setLocale($lang);

?>

<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<!-- Meta for Responsive View port -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta content="" name="author" />

<meta name="keywords" content="{{$title}}">
<meta name="description" content="{{$desc}}">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/layouts/layout4/front/images1/favicon-16x16.png') }}" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
      
	<!-- Google fonts -->
<style type="text/css">
  li.nav-item.login {
    margin-left: 18px;
}
</style>
	<!-- Icon font (Fpntell0) -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/fontello.css') }}" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- Bootstrap v4.2.1 -->


	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/bootstrap.min.css') }}" type="text/css">  

	<!-- <link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css1/bootstrap.css') }}" type="text/css"> -->
	<!-- Responsive Tab -->
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/easy-responsive-tabs.css') }}" type="text/css">

	<!-- Owl Carousel v2.3.4 -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/owl.carousel.min.css') }}" type="text/css"> 
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/owl.theme.default.min.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/all.css') }}" type="text/css"> 
	

	<!-- Bootstrap Datepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

  <!-- <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" /> -->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Custom Comman css file -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/style.css') }}" type="text/css"> 
	<!-- Responsive css file -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css/query.css') }}" type="text/css"> 

<!-- Hotjar Tracking Code for www.pharmaemploi.fr -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1707796,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-272962-32"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-272962-32');
</script>

<script src="https://www.googleoptimize.com/optimize.js?id=OPT-PBX72S7"></script> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170469851-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-170469851-1');
</script>

<style>
.bg-primary {
    background-color: #009c08 !important;
}
a.bg-primary:hover, a.bg-primary:focus, button.bg-primary:hover, button.bg-primary:focus {
    background-color: #006905 !important;
}
.after-header .container {padding: 0px 60px;}
.after-header{background:url(https://www.pharmaemploi.fr/public/assets/images/pharmapro-smile-banner.jpg)left top no-repeat; background-size:cover;}
.after-header .btn-col .btn{border:1px solid #009c08; border-radius:0px; line-height:48px; padding:0 10px; font-size:1.375rem; color:#009c08 !important; background:transparent;}
.after-header .btn-col .btn:hover{background:#009c08; color:#fff !important;}
.after-header .btn-col{margin-bottom:.5rem !important;}

.logfont {font-size:15px !important;}


.dropdown-user {
   position: absolute;
    color: #fff;
    right: 19px;
    text-align: left;
    padding: 11px;
    padding-left: 0px;
    top: 70px;
    background: #009c08;
    border-radius: 5px;
    width: 23%;
    color: #fff !important;
 }


@media(max-width: 991px){
  .after-header .d-flex.justify-content-end{flex-flow:column;}
  .after-header .btn-col:first-child .btn{margin:0 !important;}
}
@media(max-width: 575px){
  .after-header .btn-col .btn{font-size: 15px; line-height:40px;}


.after-header .btn-col { margin-top: 48px !important;}
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-272962-32"></script>

<!-- Date:-20/04/2022 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-272962-32');
</script>


<script>

function showmenu()
{

$('#usermenu').toggle();

}

</script>

</head>

<?php 
$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$keys = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
?>

<body>


  <header class="">
    <div class="container">
      <nav class="navbar navbar-expand-lg p-0">
        <div class="right-nav">
        <div class="collapse navbar-collapse" id="MyNavigationHd">

 <?php $user_type = session('login_type');
          if($user_type == 'admin'){
            $url = 'dashboard_admin';
          }else{
            $url = '/';
          }
          ?>

			 <ul class="navbar-nav">


		<?php if(session('login_type') == "admin")  { ?>

			 <li class="nav-item">
             		 <a class="nav-link" href="{{ url('toutes-les-offres') }}" style="font-size:18px;">Offres d'emploi</a>
            	</li>

		    <li class="nav-item">
			<a class="nav-link" href="{{ url('formulaire') }}" style="font-size:18px;">Publier une offre</a>
		    </li>
         

		 <li  class="nav-item login">
		     	 <a class="nav-link" href="{{ url('login') }}">{{ __('message.logout') }}</a>
		    </li>
		
			


		<?php } ?>
		



            <?php if(empty(session('user_name'))){ ?>


		 <li class="nav-item">
             		 <a class="nav-link" href="{{ url('toutes-les-offres') }}" style="font-size:18px;">Offres d'emploi</a>
            	</li>

		  <!--   <li class="nav-item"> -->
		     	<!-- <a class="nav-link" href="{{ url('publication-formulaire-offre-emploi') }}">Publier une offre</a> -->
		<!-- 	<a class="nav-link" href="{{ url('formulaire') }}">Publier une offre</a>
		    </li> -->
         <!-- <li class="nav-item">
              <a class="nav-link" href="{{ url('publier-offre') }}">Publier une offre</a>
            </li> -->

         <li class="nav-item">
              <a class="nav-link" href="{{ url('publier-offre') }}" style="font-size:18px;">Publier une offre</a>
         </li>

         <li class="nav-item">
              <a class="nav-link" href="https://blog.pharmapro.fr/}" style="font-size:18px;">Blog</a>
            </li>

		    <li  class="nav-item login">
		     	 <a class="nav-link" id="dropdownLogin" <?php if(strpos($url, 'login') !== false) echo 'active';?> href="{{ url('login') }}">{{ __('message.login') }}</a>
		    </li>

          <?php  } else { ?>


            <li class="nav-item">

<?php
           
$userdata = DB::table('users')->select('*')->where('email',session('user_name'))->first();

?>

		<?php if(isset($userdata->first_name)) { ?>
		
			<a href="javascript:void(0);" style="text-decoration: none;" onclick="showmenu();"><?php echo $userdata->first_name.' '.$userdata->last_name ?> <i class="fa fa-caret-down" style="display: inline;text-decoration: none;"></i><i class="fa fa-caret-up" style="display: none;"></i></a>

		<?php }  ?>

			

                                <ul class="dropdown-user" id="usermenu" style="display:none;">

				
					 <li>
					      <a class="logfont nav-link" style="color:#FFF !important;" href="{{ url('dashboard') }}">{{ __('message.dashboard') }}</a>
					  </li>


					<?php 
					  $day = date("d");
					  $month = date("m");
					  $year = date("y");
					  $last = DB::table('job_post')->select('id')->orderBy('id', 'desc')->first();
					  $last_id = (isset($last->id) ? $last->id + 1 : 1);
					  $job_id = 'pef'.$day.$month.$year.'a'.$last_id;
				        ?>

				    <li>
				      <a class="logfont nav-link"  style="color:#FFF !important;" href="{{ url('interview') }}/<?php echo $job_id ?>">{{ __('message.new_interview') }}</a>
				    </li>
				    


                                     <li>
    					  <a class="logfont nav-link"  style="color:#FFF !important;" href="{{ url('profile') }}">{{ __('message.my_profile') }}</a>
   				    </li>

				<?php $editurl = "profile_entreprise/".session('user_id'); ?>
					<li>
				      <a class="logfont nav-link"  style="color:#FFF !important;" href="{{ url($editurl) }}">Mon entreprise (adresses)</a>
				    </li>

					<li>
				      <a class="logfont nav-link"  style="color:#FFF !important;" href="{{ url('logout') }}">{{ __('message.logout') }}</a>
				    </li>

                                    
                                </ul>
		


            </li>
          <?php  } ?>


        </ul>



        </div>
        </div>
        <div class="left-nav">
          
           <?php $user_type = session('login_type');
          if($user_type == 'admin'){
            $url = 'dashboard_admin';
          }else{
            $url = '/';
          }
          ?>
          <a class="navbar-brand" href="{{ url($url) }}">
          <img src="{{ asset('assets/layouts/layout4/front/images1/logo-pharmajob-transp_new.png') }}" class="mx-auto img-fluid"></a> 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MyNavigationHd">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
         
         
        </div>
      </nav>
    </div>
  </header>

  <div class="after-header py-3">
    <div class="container">
      <div class="d-flex justify-content-end">
      
      </div>
    </div>
  </div>
<!-- /Header-->


