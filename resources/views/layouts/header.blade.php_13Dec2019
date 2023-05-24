<!doctype html>
<?php $url = url()->current();?>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Publinetis</title>
<!-- Meta for Responsive View port -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
      
	<!-- Google fonts -->

	<!-- Icon font (Fpntell0) -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/fontello.css') }}" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- Bootstrap v4.2.1 -->
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/bootstrap.min.css') }}" type="text/css">  
	<!-- Responsive Tab -->
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/easy-responsive-tabs.css') }}" type="text/css">

	<!-- Owl Carousel v2.3.4 -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/owl.carousel.min.css') }}" type="text/css"> 
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/owl.theme.default.min.css') }}" type="text/css"> 

	<!-- Custom Comman css file -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/style.css') }}" type="text/css"> 
	<!-- Responsive css file -->  
	<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/query.css') }}" type="text/css"> 

	<!-- Bootstrap Datepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

  <!-- <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" /> -->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php 
$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$keys = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
?>

<body>

<!--Header-->
<header class="stick">
<div class="container">
<div class="row">
<div class="col-12 col-md-4">
<div class="logo">
<?php $user_type = session('login_type');
if($user_type == 'admin'){
  $url = 'dashboard_admin';
}else{
  $url = '/';
}
?>
<a href="{{ url($url) }}"><img src="{{ asset('logo/Logo1.png') }}" style="width:266px !important;height:70px !important;"></a></div>
</div>
<div class="col-12 col-md-8">
<nav class="navbar navbar-expand justify-content-center justify-content-md-end">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link  <?php if(strpos($url, 'solution') !== false) echo 'active';?>" href="{{ url('/solution') }}"><i class="icon-multiple-users-silhouette d-block d-md-none"></i><span class="d-none d-md-inline-block">Solution</span></a>
    </li>
    <?php if(!empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link <?php if(strpos($url, 'dashboard') !== false) echo 'active';?>" href="{{ url('dashboard') }}"><i class="icon-shopping-list d-block d-md-none"></i><span class="d-none d-md-inline-block">Dashboard</span></a>
    </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link <?php if(strpos($url, 'support') !== false) echo 'active';?>" href="{{ url('support') }}"><i class="icon-shopping-list d-block d-md-none"></i><span class="d-none d-md-inline-block">Support</span></a>
    </li>
<?php if(!empty(session('user_name')) && session('login_type') != 'interviewee'){ ?>
    <li class="nav-item">
      <a class="nav-link  <?php if(strpos($url, 'interview') !== false) echo 'active';?>" href="{{ url('interview') }}/<?php echo $keys ?>"><i class="icon-manager d-block d-md-none"></i><span class="d-none d-md-inline-block">New interview</span></a>
    </li>
<?php  } ?>
<?php if(!empty(session('user_name')) && session('login_type') != 'admin'){ ?>
    <li class="nav-item">
      <a class="nav-link  <?php if(strpos($url, 'profile') !== false) echo 'active';?>" href="{{ url('profile') }}"><i class="icon-manager d-block d-md-none"></i><span class="d-none d-md-inline-block">My Profile</span></a>
    </li>
<?php  } ?>
<?php if(empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link  <?php if(strpos($url, 'login') !== false) echo 'active';?>" href="{{ url('login') }}"><i class="icon-locked-padlock d-block d-md-none"></i><span class="d-none d-md-inline-block">Login</span></a>
    </li>
<?php  } else { ?>
 <li class="nav-item">
      <a class="nav-link" href="{{ url('logout') }}"><i class="icon-locked-padlock d-block d-md-none"></i><span class="d-none d-md-inline-block">Logout</span></a>
    </li>
<?php  } ?>
<?php if(empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('register') }}"><i class="icon-signup d-block d-md-none"></i><span class="d-none d-md-inline-block">Signup</span></a>
    </li>
<?php  } ?>
  </ul>
</nav>
</div></div>
</div>
</header>
<!-- /Header-->


