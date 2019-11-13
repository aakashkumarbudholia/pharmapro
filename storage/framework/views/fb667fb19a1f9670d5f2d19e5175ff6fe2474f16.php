<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Meta for Responsive View port -->

<title>Welcome to Publinetis</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
      
	<!-- Google fonts -->

	<!-- Icon font (Fpntell0) -->  
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/fontello.css')); ?>" type="text/css"> 

	<!-- Bootstrap v4.2.1 -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/bootstrap.min.css')); ?>" type="text/css">  
	<!-- Responsive Tab -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/easy-responsive-tabs.css')); ?>" type="text/css">

	<!-- Owl Carousel v2.3.4 -->  
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/owl.carousel.min.css')); ?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/owl.theme.default.min.css')); ?>" type="text/css"> 

	<!-- Custom Comman css file -->  
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/style.css')); ?>" type="text/css"> 
	<!-- Responsive css file -->  
	<link rel="stylesheet" href="<?php echo e(asset('assets/layouts/layout4/front/css/query.css')); ?>" type="text/css"> 


</head>

<body>
<!--Header-->
<header id="myHeader">
<div class="container">
<div class="row">
<div class="col-12 col-md-4">
<div class="logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('assets/layouts/layout4/front/images/logo.png')); ?>"></a></div>
</div>
<div class="col-12 col-md-8">
<nav class="navbar navbar-expand justify-content-center justify-content-md-end">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo e(url('/')); ?>"><i class="icon-multiple-users-silhouette d-block d-md-none"></i><span class="d-none d-md-inline-block">About Us</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('service')); ?>"><i class="icon-shopping-list d-block d-md-none"></i><span class="d-none d-md-inline-block">Services</span></a>
    </li>
<?php if(!empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('interview/1')); ?>"><i class="icon-manager d-block d-md-none"></i><span class="d-none d-md-inline-block">New interview</span></a>
    </li>
<?php  } ?>
<?php if(empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('login')); ?>"><i class="icon-locked-padlock d-block d-md-none"></i><span class="d-none d-md-inline-block">Login</span></a>
    </li>
<?php  } else { ?>
 <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('logout')); ?>"><i class="icon-locked-padlock d-block d-md-none"></i><span class="d-none d-md-inline-block">Logout</span></a>
    </li>
<?php  } ?>

<?php if(empty(session('user_name'))){ ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('register')); ?>"><i class="icon-signup d-block d-md-none"></i><span class="d-none d-md-inline-block">Signup</span></a>
    </li>
<?php  } ?>

  </ul>
</nav>
</div>
</div>
</div>
</header>
<!-- /Header-->
<!--Banner-->
<section class="banner" style="background:url(<?php echo e(asset('assets/layouts/layout4/front/images/bannerBack.jpg')); ?>) no-repeat center top; background-size:cover">
<div class="container">
<div class="row">
<div class="col-12">
<h1>Get the answers you need</h1>
<p>We get answers for 20 million questions daily. Get the feedback you need with a global leader in survey software.</p>
<a class="btn btn-rnd btn-green">Sign Up Free</a>
</div>
</div>
</div>
</section>
<!-- /Banner-->
