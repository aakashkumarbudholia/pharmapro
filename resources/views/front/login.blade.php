@include('layouts.header')
<!--Banner-->

<!--Login Form Area-->
<section class="loginArea">
<div class="container">
<div class="row">
<div class="col-12 text-left margintop"><h1>Login</h1></div>
</div>
<div class="row no-gutters">
<div class="col-12 col-lg-6">

<?php $url = "login"; ?>
<div class="loginForm text-left">
<form action="{{ url($url) }}" class="feildForm login-form"  name="FrmAdminLogin" id="FrmAdminLogin"  method="POST">
 @csrf
<div class="detSection">
 @include('layouts.flash-message')

<div class="form-group">
<label class="fName">Email</label>
<input type="text" class="form-control form-control-lg" placeholder="Your email" id="username" name="username" required>
</div>
<div class="form-group">
<label class="fName">Password</label>
    <input type="password" class="form-control form-control-lg" placeholder="Your passowrd" id="password" name="password" required>
</div>

<div class="form-group">
<label class="fName">Login Type</label>
    <select class="form-control form-control-lg" name="login_type" required >
    	<option value="interviwer">Interviewer</option>
    	<option value="interviwee">Interviewee</option>
    </select>
</div>


<div class="form-group">
    
<!-- 
<div class="custom-control custom-checkbox">

  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">Remember me</label>
</div>
--> 
  </div>
<input type="submit" value="Login" class="btn btn-green">
</div>




</form>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="h-100 loginFromBut" style="background:url({{ asset('assets/layouts/layout4/front/images/login-back.png') }}) no-repeat center bottom; background-size:cover;">
<!-- <p>Already have an account?</p>
<a class="btn btn-rnd btn-green">Log In »</a>  -->
</div>
</div>
</div>
</div>
</section>
<!-- /Login Form Area-->
@include('layouts.footer')
