<!doctype html>
<?php $url = url()->current();

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
}

?>



<html lang="eng">
<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="language" content="fr">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

<meta name="keywords" content="{{$title}}">
<meta name="description" content="{{$desc}}">


  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/layouts/layout4/front/images1/favicon.png') }}" />


<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/bootstrap.css') }}" type="text/css">  
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/owl.carousel.min.css') }}" type="text/css">  
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/owl.theme.default.css') }}" type="text/css">  
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/all.css') }}" type="text/css">  
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/style.css') }}" type="text/css">  
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4-pub/front/css1/query.css') }}" type="text/css">  

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-272962-32"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-272962-32');
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170469851-1"></script>

<script src="https://www.googleoptimize.com/optimize.js?id=OPT-PBX72S7"></script> 
<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-170469851-1');
</script>

</head>
<body>
  <header class="sticky-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark  p-0">
        <div class="right-nav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{ url('login') }}"><i class="icon-locked-padlock d-block d-md-none"></i><span class="d-none d-md-inline-block">Login</span></a>
              <div class="dropdown-menu border-0 shadow m-0 p-3 dropdownLogin" aria-labelledby="dropdownLogin">
                <form class="form-inline" method="post" name="LoginFormTop" action="#">
                  <div class="mt-1 form-group">
                    <input class="loginEmail form-control input-sm" type="text" name="LoginEmail" placeholder="E-mail">
                  </div>
                  <div class="mt-1 form-group">
                    <input class="loginPassword form-control input-sm" type="password" name="LoginPassword" placeholder="Mot de passe">
                  </div>
                  <div class="mt-1 w-100">
                    <small><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Forgot your password</a></small>
                    <button type="submit" class="btn btn-primary input-sm float-right">Login</button>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item signup">
           
		<a class="nav-link px-3" href="{{ url('creer-profil-employeur') }}"><i class="fas fa-user"></i>&nbsp;Signup</a>
            </li>
          </ul>
        </div>
        <div class="left-nav">
        <a class="navbar-brand" href="{ url($url) }}">
          <img src="{{ asset('assets/layouts/layout4-pub/front/images1/logo.png') }}" class="mx-auto img-fluid">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarsExample07">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/solution') }}">Solution</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('pricing') }}">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/support') }}">Support</a>
            </li>
          </ul>
        </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- Header-End -->


