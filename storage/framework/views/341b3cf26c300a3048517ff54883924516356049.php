<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--Login Form Area-->
<section class="loginArea">
<div class="container">
<div class="row">
<div class="col-12 text-left margintop"><h1>Create a FREE account</h1></div>
</div>
<div class="row no-gutters">
<div class="col-12 col-lg-6">

<?php $url = "register"; ?>
<div class="loginForm text-left">
<form action="<?php echo e(url($url)); ?>" class="feildForm login-form"  name="FrmAdminLogin" id="FrmAdminLogin"  method="POST">
 <?php echo csrf_field(); ?>
<div class="detSection">
<?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group">
<label class="fName">Username</label>
<input type="text" class="form-control form-control-lg" placeholder="Your username" id="username" name="username" required>
</div>
<div class="form-group">
<label class="fName">Password</label>
    <input type="password" class="form-control form-control-lg" placeholder="Your passowrd" id="password" name="password" required>
</div>
<div class="form-group">
<label class="fName">Email address</label>
    <input type="email" class="form-control form-control-lg" placeholder="Email address" id="email" name="email" required>
</div>
<div class="row">
<div class="col-12 col-md-6">
<div class="form-group">
<label class="fName">First Name</label>
    <input type="tel" class="form-control form-control-lg" placeholder="First Name" id="fname" name="fname" required>
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
<label class="fName">Last Name</label>
    <input type="tel" class="form-control form-control-lg" placeholder="Last Name" id="lname" name="lname" required>
</div>
</div>


</div>

<input type="submit" value="Create account" class="btn btn-green">
</div>




</form>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="h-100 loginFromBut" style="background:url(<?php echo e(asset('assets/layouts/layout4/front/images/registerBack.png')); ?>) no-repeat center bottom; background-size:cover;">
<p>Already have an account?</p>
<a href="<?php echo e(url('/login')); ?>"class="btn btn-rnd btn-green">Log In »</a>
</div>
</div>
</div>
</div>
</section>

<!-- /Login Form Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
