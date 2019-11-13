<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Content Area-->
<?php 
$id = isset($profile_data->id) ? $profile_data->id : '';
$first_name = isset($profile_data->first_name) ? $profile_data->first_name : '';
$last_name = isset($profile_data->last_name) ? $profile_data->last_name : '';
$email = isset($profile_data->email) ? $profile_data->email : '';
$password = isset($profile_data->password) ? $profile_data->password : '';
$occupation = isset($profile_data->occupation) ? $profile_data->occupation : '';
$phone = isset($profile_data->phone) ? $profile_data->phone : '';
$website = isset($profile_data->website) ? $profile_data->website : '';
$logo = isset($profile_data->profile_pic) ? $profile_data->profile_pic : '';
?>
<section class="loginArea">
<div class="container">
<div class="row">
<div class="col-12 text-left margintop"><h1>My Profile</h1></div>
</div>
<div class="row no-gutters">
<div class="col-12 col-lg-12">

<div class="loginForm text-left">
<form action="<?php echo e(url('update_profile')); ?>" class="feildForm login-form"  name="FrmAdminLogin" id="FrmAdminLogin"  method="POST" enctype="multipart/form-data">
 <?php echo csrf_field(); ?>

<input type="hidden" name="id" value="<?php echo e($id); ?>">
<div class="form-group">
<label class="fName">First Name</label>
<input type="text" class="form-control form-control-lg" placeholder="First Name" id="first_name" name="first_name" required="" value="<?php echo e($first_name); ?>">
</div>

<div class="form-group">
<label class="fName">Last Name</label>
<input type="text" class="form-control form-control-lg" placeholder="Last Name" id="last_name" name="last_name" required="" value="<?php echo e($last_name); ?>">
</div>

<div class="form-group">
<label class="fName">Email</label>
<input type="text" class="form-control form-control-lg" placeholder="Your email" id="email" name="email" required="" value="<?php echo e($email); ?>">
</div>

<div class="form-group">
<label class="fName">Password</label>
    <input type="text" class="form-control form-control-lg" placeholder="Your passowrd" id="password" name="password" required="" value="<?php echo e($password); ?>">
</div>

<div class="form-group">
<?php
$login_type = session('login_type');
      if($login_type == 'interviewee'){
      	$txt = 'interviewee';
      }else{
      	$txt = 'interviewer';
      }
?>
<h3>Other information about <?php echo $txt?>:</h3>
<?php if($login_type != 'interviewee'){ ?>
<label class="fName">Personal site or page</label>
    <input type="text" class="form-control form-control-lg"  id="site" name="site"  value="<?php echo e($website); ?>" placeholder="Enter your site or page (e.g. LinkedIn page, Twitter account)" >
</div>
<?php } ?>
<div class="form-group">
<label class="fName">Occupation</label>
    <input type="text" class="form-control form-control-lg"  id="occupation" name="occupation"  value="<?php echo e($occupation); ?>" placeholder="Enter your occupation (e.g. journalist)" >
</div>

<div class="form-group">
<label class="fName">Tel.</label>
    <input type="tel" class="form-control form-control-lg"  id="phone" name="phone"  value="<?php echo e($phone); ?>" placeholder="Enter your Telephone no." >
</div>

<div class="form-group">
<label class="fName">Picture</label>
<input type='file' name="logo" id="logo"  />
<?php if(!empty($logo)){ ?>
<?php $src = 'logo/'.$logo;?>
<img id="blah" src="<?php echo e(url($src)); ?>" class="img-responsive" alt="" style="width:200px;height:200px;margin-top: 10px;"> 
<?php } ?>
</div>
<input type="hidden" name="old_logo" id="old_logo" value="<?php echo e($logo); ?>">
<input type="submit" value="Update Profile" class="btn btn-green">
</div>

</form>
</div>
</div>
</div>
</section>

	

<!-- /Content Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
