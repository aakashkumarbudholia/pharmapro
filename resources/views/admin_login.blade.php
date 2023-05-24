<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Pharmapro Admin Portal</title>
  <link href="{{asset('assets/dashbaord_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('assets/dashbaord_assets/css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
<style type="text/css">
 body {
   background: #fafafb; 
 }
 .logo {
   text-align: center; 
   padding-bottom : 10px;
 }
 .copyright-text {
   padding-top: 15px; 
 } 
 .mb-3.include-fild {
  margin-bottom: 30px !important;
}
.btn.btn-outline-dark {
  border: solid 2px #009c08;
  background: #009c08;
  color: #fff;
  font-weight: 500;
}
.btn.btn-outline-dark:hover {
  background: #fff; 
  color: #009c08;
}
</style>
  <body>
    <div class="d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">

             <div class="logo">
                    <a href="#">
                        <img src="{{ asset('assets/layouts/layout4/front/images1/logo.png') }}" alt=""  /> </a>
                 
                </div>

            <div class="card bg-white">
              <div class="card-body p-4" style="box-shadow: 0 0 16px 0 rgba(0,191,111,.21);">

               


                  <form class="login-form" name="FrmAdminLogin" id="FrmAdminLogin" action="{{ url('check_login') }}" method="post">
                    @csrf
                

                  <h2 class="fw-bold mb-2" style="font-size: 28px;">Sign In</h2>
                  <p class="include-text" style="margin-bottom: 20px;">@include('layouts.flash-message')</p>
                  <div class="mb-3 include-fild">
                    <label for="email" class="form-label ">Username</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username" required>
                  </div>
                  <div class="mb-3 include-fild">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password" required>
                  </div>

                   <?php
                    $f = rand(1,10);
                    $l = rand(1,10);

                    $captcha =  $f ." + ". $l;
                    $captcha_sum = $f + $l;
                  ?>

                   <div class="mb-3 include-fild">
                    <label for="password" class="form-label ">{{ $captcha }}</label>
                    <input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" placeholder="Captcha">
                    <input type="hidden" name="captcha_sum" id="captcha_sum" value="{{ $captcha_sum }}">
                  </div>


                  <!-- <p class="small"><a class="text-primary" href="forget-password.html">Forgot password?</a></p> -->
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit">Login</button>
                  </div>
                </form>


              

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class="copyright-text">
                  <p class="mb-0  text-center"><?php echo date('Y'); ?> © Pharmapro.fr</p>
                </div> 

  </body>

   <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>

 <script>
            $(document).ready(function()
            {
                $('.close').click(function()
                {
                    $('.alert ').hide('');
                });
            })
        </script>

</html>