<!doctype html>
<?php
$url = url()->current();

$segment1 =  Request::segment(1); 

$tag = "";
$desc = "";
$title = "";

$last = DB::table('seo_tags')->select('*')->where('page_name','home')->orderBy('id', 'desc')->first();
if(isset($last))
{
$tag = $last->tag;
$title = $last->title;
$desc = $last->desc;
}

$lang = session('lang');
App::setLocale($lang);

?>

<html lang="{{ app()->getLocale() }}">

<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="language" content="fr">
  <meta name="facebook-domain-verification" content="wpb2nxvy9567c0w54uuq6rbrsxi7aa" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="keywords" content="{{$title}}">
<meta name="description" content="{{$desc}}">


<link rel='icon' href="{{ asset('assets/layouts/layout4/front/images1/favicon-16x16.png') }}" type='image/x-icon'/ >
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/bootstrap.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/owl.carousel.min.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/foowl.theme.defaultntello.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/all.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/style.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ asset('assets/layouts/layout4/front/css/css1/query.css') }}" type="text/css"> 

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
