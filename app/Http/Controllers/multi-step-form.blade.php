@include('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<link href="{{ asset('assets/jquery.datetimepicker.css') }}" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<link href="{{ asset('assets/multi-step-form-style.css') }}" rel="stylesheet" />
 <style type="text/css">
.offer-section .inner-center .custom-control-label.gold-yellow-color {
  background: #FFC000;
}
.offer-section .inner-center .custom-control .custom-control-label:after {
    background: url(../../public/assets/images/radio1-new.png) center center no-repeat;

}
.offer-section .inner-center ul li.custom-yellow-icon:after {
    background: url(../../public/assets/images/list-icon-new1.png) center center no-repeat;
}  
</style>
<style type="text/css">
.offer-section .inner-center .custom-control-label.gold-green-color {
  background: #009c07;
}
.offer-section .inner-center .custom-control .custom-control-label:after {
    background: url(../../public/assets/images/radio1-new.png) center center no-repeat;

}
.offer-section .inner-center ul li.custom-green-icon:after {
    background: url(../../public/assets/images/list-icon-green.png) center center no-repeat;
}  
</style>

<style>
.link_text,
.link_text:hover {
  color: green;
}

.detSection2 p {
  text-align: justify !important;
  padding-bottom: 0px !important;
}

.serviceWrapper .contentHead:after {
  background-color: #CCC !important;
}

.contentHead:after {
  width: 100% !important;
}

.contentHead {
  padding-bottom: 16px !important;
  margin-bottom: 20px;
}

.spcls {
  float: left;
  font-size: 16px;
}

.spcls1 {
  float: left;
  font-size: 16px;
  margin-left: 3%;
  color: #469c0b;
}

.spcls5 {
  float: left;
  font-size: 16px;
  margin-left: 3%;
}

.spcls4 {
  float: right;
  font-size: 16px;
}

.spcls2 {
  float: left;
  font-size: 16px;
  margin-left: 3%;
}

.spcls3 {
  float: left;
  font-size: 16px;
  margin-left: 3%;
}

.cls_urgent {
  font-size: 12px;
}
.contentBodyC{
  color: #000000;
}
.contentHead{
  color: #000000;
}
.mystate .select2-container {
    width: 100% !important;
}

#cantons1 .select2-container {
    width: 100% !important;
}

#department .select2-container {
    width: 100% !important;
}

@media(max-width: 575px) {
  .contentHead {
    padding-bottom: 80px !important;
  }

  .spcls1 {
    float: left;
    font-size: 16px;
  }

  .spcls2 {
    margin-left: 0px;
  }

  .cls_urgent {
    font-size: 9px;
  }
}
</style>

<?php error_reporting(0); ?>


<?php
//echo "hello";
//die();
/*
echo "<pre>";
print_r($jobdata);
echo "<pre>";
die();
*/
if (empty(session('lang'))) {
    App::setLocale('fr');
    session(['lang' => 'fr']);
}
$login_user_id = session('user_id');
$login_type = session('login_type');
$serviceid = "";
$address   = "";
$address_paid   = "";
$city      = "";
$state     = "";
$country   = "";
$pincode   = "";
$title        = "Pharmacien (H/F)";
$desc         = "";
$company      = "";
$company_logo = "";
$company_desc = "";
$email        = "";
$phone        = "";
$note         = "";
$link         = "";
$fb           = "";
$tweet        = "";
$insta        = "";
$linkd        = "";
$http         = "";
$logo           = "";
$s2_logo        = "";
$que_note_count = 0;
$tcontrat       = "CDI";
$travail        = "Temps plein";
$job_desc_type        = "";
$entreprise  = "";
$entreprise1 = "";
$jobid       = "";
$utype = "";
$show_phone="";/*Date:-21/04/2022*/
$show_email="";
$show_linkd="";
$show_date="";
$sameConfirm="";
$sameConfirmNew="";
$address_paid2="";
$link2="";
$email2="";
$phone2="";
$http2 = "";
if (!empty($jobdata->user_type)) {
   $utype = $jobdata->user_type;
} else {
   $utype = 'free';
}
$offerdate = "";
if (!empty($jobdata->offerdate)) {
   $offerdate = $jobdata->offerdate;
}
if (!empty($login_user_id) && $login_type == 'frontuser') {
   $login_user_info = DB::table('users')->where('id', '=', $login_user_id)->first();
   $company = isset($login_user_info->pharmacie) ? $login_user_info->pharmacie : '';
   $address = isset($login_user_info->adresse) ? $login_user_info->adresse : '';
   $address_paid = isset($login_user_info->address_paid) ? $login_user_info->address_paid : '';
   $pincode = isset($login_user_info->postal) ? $login_user_info->postal : '';
   $city    = isset($login_user_info->villa) ? $login_user_info->villa : '';
   $state   = isset($login_user_info->departement) ? $login_user_info->departement : '';
   $email   = isset($login_user_info->email) ? $login_user_info->email : '';
}
if (!empty($jobdata->job_desc_type)) {
   $job_desc_type = $jobdata->job_desc_type;
} else {
   $job_desc_type = "";
}
if (!empty($jobdata->entreprise1)) {
   $entreprise1 = $jobdata->entreprise1;
} else {
   $entreprise1 = $userdata->entreprise;
}
if (!empty($jobdata->job_id)) {
   $jobid = $jobdata->job_id;
} else {
   $jobid = "";
}
if (!empty($jobdata->entreprise)) {
   $entreprise = $jobdata->entreprise;
}
if (!empty($jobdata->travail)) {
   $travail = $jobdata->travail;
}
if (!empty($jobdata->tcontrat)) {
   $tcontrat = $jobdata->tcontrat;
}
if (!empty($jobdata->service)) {
   $serviceid = $jobdata->service;
}
if (!empty($jobdata->job_title)) {
   $title = $jobdata->job_title;
}
if (!empty($jobdata->job_desc)) {
   $desc = $jobdata->job_desc;
}
if (!empty($jobdata->urgent)) {
   $urgent = $jobdata->urgent;
} else {
   $urgent = '';
}
if (!empty($jobdata->company)) {
   $company = $jobdata->company;
} else {
   $company = $userdata->pharmacie;
}
if (!empty($jobdata->company_logo)) {
   $company_logo = $jobdata->company_logo;
}
if (!empty($jobdata->company_desc)) {
   $company_desc = $jobdata->company_desc;
}
if (!empty($jobdata->email)) {
   $email = $jobdata->email;
} else {
   $email = $userdata->email;
}
if (!empty($jobdata->phone)) {
   $phone = $jobdata->phone;
} else {
   $phone = $userdata->phone;
}

/*Date:-21/04/2022*/
if (!empty($jobdata->show_phone)) {
   $show_phone = $jobdata->show_phone;
}
if (!empty($jobdata->show_email)) {
   $show_email = $jobdata->show_email;
}
if(!empty($jobdata->show_linkd)){
  $show_linkd=$jobdata->show_linkd;
}
if(!empty($jobdata->show_date)){
  $show_date=$jobdata->show_date;
}
if (!empty($jobdata->note)) {
   $note = $jobdata->note;
}
if (!empty($jobdata->link)) {
   $link = $jobdata->link;
}
if (!empty($jobdata->fb)) {
   $fb = $jobdata->tweet;
}
if (!empty($jobdata->linkd)) {
   $linkd = $jobdata->linkd;
} else {
    //$linkd = $userdata->linkd;
  //$linkd = (!empty($userdata->linkd));
  if((!empty($userdata->linkd)))
  {
    //$linkd = "";
    $linkd = $userdata->linkd;
  }
}

if($linkd != ''){
  if (strpos($linkd, "http") !== false) {
      $result = parse_url($linkd);
      $http =  $result['scheme']."://";
      $linkd =  str_replace($http,"",$linkd);
  } else {
    $http  = 'https://';
  }
}
if (!empty($jobdata->tweet)) {
   $tweet = $jobdata->tweet;
}
if (!empty($jobdata->insta)) {
   $insta = $jobdata->insta;
}

if (!empty($jobdata->address)) {
   $address = $jobdata->address;
} else {
   $address = $userdata->adresse;
}

if (!empty($jobdata->address_paid)) {
   $address_paid = $jobdata->address_paid;
} else {
   $address_paid = $userdata->adresse;
}


if (!empty($jobdata->city)) {
   $city = $jobdata->city;
} else {
   $city = $userdata->villa;
}
if (!empty($jobdata->country)) {
   $country = $jobdata->country;
}
if (!empty($jobdata->state)) {
   $state = $jobdata->state;
} else {
   $state = $userdata->state;
}
if (!empty($jobdata->pincode)) {
   $pincode = $jobdata->pincode;
} else {
   $pincode = $userdata->postal;
}
if (!empty($interviewdata->name)) {
   $name = $interviewdata->name;
}
if (!empty($interviewdata->lname)) {
   $lname = $interviewdata->lname;
}
if ($login_type == 'interviewee') {
   $url = 'interviewee/' . $interviewid;
} else {
   $url = 'interview/' . $interviewid;
}
/*****************monita*******************/
if (!empty($jobdata->company_department)) {
  $company_department = $jobdata->company_department;
} 
else {
  $company_department = $state;
  // $userdata->company_detail;
}
if (!empty($jobdata->company_state)) {
  $company_state = $jobdata->company_state;
} 
else {
  $company_state = $state;
  // $userdata->company_detail;
}

if (!empty($jobdata->company_address_paid)) {
  //$user_type = "paid";
  $address_paid2=$jobdata->company_address_paid;
} 
elseif($jobdata->company_address_paid=="France")
{
 // $user_type = "free";
   $address_paid2="France";
}
else 
{
  $address_paid2=$jobdata->address_paid;
}
//$sameConfirmNew
if (!empty($jobdata->checked_detail)) 
{
  $sameConfirm=$jobdata->checked_detail;
  //die();
}
if(!empty($jobdata->company_entreprise))
{
$entreprise2 = $jobdata->company_entreprise ;
}
else
{
  $entreprise2=$jobdata->entreprise ; 
}
if (!empty($jobdata->checked_detail)) 
{
  $sameConfirm=$jobdata->checked_detail;
  //die();
}
if (!empty($jobdata->new_checked_detail)) 
{
   $sameConfirmNew=$jobdata->new_checked_detail;
  //die();
}
if (!empty($jobdata->company_detail)) {
  $company_detail = $jobdata->company_detail;
} else {
  $company_detail = "";
  // $userdata->company_detail;
}
if (!empty($jobdata->company_address)) {
  $company_address = $jobdata->company_address;
} else {
  $company_address = "";
 // $userdata->company_address;
}
if (!empty($jobdata->company_city)) {
  $company_city = $jobdata->company_city;
} else {
  $company_city = $jobdata->city;
  //$userdata->company_city;
}
if(!empty($jobdata->company_email))
{
  $email2 = $jobdata->company_email ;
}
else
{
  $email2 = $jobdata->email ;
}
if(!empty($jobdata->company_phone))
{
  $phone2 = $jobdata->company_phone ;
}
else
{
  $phone2 = $jobdata->phone ;
}
if(!empty($jobdata->company_link))
{
  $link2 = $jobdata->company_link;
}
else
{
  $link2=$jobdata->linkd;
}
if ($link2 != '') {
  $result = parse_url($link2);
  $http2   = $result['scheme'] . "://";
  $link2  = str_replace($http, "", $link2);
}
if (!empty($jobdata->company_pincode)) {
  $company_pincode = $jobdata->company_pincode;
} else {
  $company_pincode = "";
  //$userdata->company_pincode;
}
if (!empty($jobdata->company_city)) {
  $company_city = $jobdata->company_city;
} else {
  $company_city = "";
  //$userdata->company_city;
}
/***************************************** */
/********monita(30-11)(third-part)********/
if (!empty($jobdata->new_company_detail)) {
  $new_company_detail = $jobdata->new_company_detail;
} else {
  $new_company_detail = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_address_paid)) {
  $new_company_address_paid = $jobdata->new_company_address_paid;
} else {
  $new_company_address_paid = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_address)) {
  $new_company_address = $jobdata->new_company_address;
} else {
  $new_company_address = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_pincode)) {
  $new_company_pincode = $jobdata->new_company_pincode;
} else {
  $new_company_pincode = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_city)) {
  $new_company_city = $jobdata->new_company_city;
} else {
  $new_company_city = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_department)) {
  $new_company_department = $jobdata->new_company_department;
} else {
  $new_company_department = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_department)) {
  $new_company_department = $jobdata->new_company_department;
} else {
  $new_company_department = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_complement)) {
  $new_complement = $jobdata->new_complement;
} else {
  $new_complement = "";
  //$userdata->company_department;
}
if (!empty($jobdata->new_company_state)) {
  $new_company_state = $jobdata->new_company_state;
} else {
  $new_company_state = "";
  //$userdata->company_department;
}
/************************************** */
?>
<form class="feildForm" runat="server" action="{{ url($url) }}" name="frmmultistep1" id="frmmultistep1" method="POST"
  enctype="multipart/form-data">
  @csrf
  <!--Form Area-->
  <section class="multiFormArea" style="padding-top: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="multiForm">
            <div id="multiFormTab">
              <?php
                if ($login_type == 'interviewee') {
                   //$login_type_cls = 'disabled';
                   $login_type_cls = '';
                } else {
                   $login_type_cls = '';
                }
                ?>
                <div class="" id="topFixedDiv">
                  <ul class="resp-tabs-list">
                    <li id="li-step-1" class="<?php if ($login_type == 'interviewee') {?> resp-tab-active<?php }?>">
                      <img src="{{ asset('assets/announsment.png') }}"><span
                        class="cust-icon"></span><span>{{ __('message.job_ads') }}</span>
                    </li>
                    <li id="li-step-3">
                      <img src="{{ asset('assets/eyes.png') }}"><span class="cust-icon"></span><span
                        style="width: max-content;">Aperçu & Réseaux sociaux (seulement Premium)</span>
                    </li>
                  </ul>
                  
                </div>
              <div class="resp-tabs-container">
                <div id="step-1" class="step">
                  <?php if (Session::get('step') == '1') {?>
                  @include('layouts.flash-message')
                  <?php }?>
                  <div>
                    <div class="offer-section">
                      <h3 style="padding:10px; margin-bottom:80px;">Choisissez votre type d'offre d'emploi</h3>
                      <div class="inner-center">
                        <div class="lpart two-part">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="paid" name="paid" value="free"
                              <?php if ($utype == 'free') {echo "checked";}?>  onclick="hello12('freeme')">
                            <label class="custom-control-label" for="paid">Gratuit</label>
                          </div>
                          <p>Votre offre d’emploi gratuite inclut :</p>
                          <ul>
                            <li class="free_job_icon">Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
                            <li class="free_job_icon">Programmation pour apparaître dans <br />« Google for Jobs »</li>
                          </ul>
                        </div>
                        <div class="rpart two-part">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="paid1" name="paid" value="paid"
                              <?php if($utype == 'paid') {echo "checked";}?> onclick="hello12('paidme')">
                            <label class="custom-control-label gold-yellow-color" for="paid1">Premium - €49 (TTC)</label>
                          </div>
                          <p>Pour renforcer sa visibilité, votre offre d’emploi Premium inclut :</p>
                          <ul class="border-bottom">
                            <li class="paid_job_icon">Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
                            <li class="paid_job_icon">Programmation pour apparaître dans <br />« Google for Jobs »</li>
                          </ul>
                          <ul>
                            <li class="paid_job_icon">Apparition en <strong>tête de liste</strong> en vert et en gras pendant 7 jours</li>
                            <li class="paid_job_icon">Possibilité de rajouter le texte <strong>URGENT</strong> en rouge sur votre offre et
                              dans les listes pendant 14 jours</li>
                            <li class="paid_job_icon">Envoi dans notre <strong>newsletter</strong></li>
                            <li class="paid_job_icon">Suggestion de votre offre en bas d’offres similaires de votre région</li>
                            <li class="paid_job_icon">Création de votre offre d’emploi sous forme d’infographie <strong>Instagram</strong> et
                              diffusion sur nos réseaux sociaux </li>
                              <li class="paid_job_icon">Publication possible de l'offre en Suisse ou Belgique</li>
                          </ul>
                        </div>
                        <div class="center">
                          <p><strong>Conditions pour agences (ex. de placement, interim) :</strong><br />Une agence peut
                            publier au maximum une offre d'emploi gratuite par jour, si l'agence aimerait publier plus
                            d'offres par 24h elle doit prendre des offres Premium (dans ce cas la création manuelle
                            d'infographie et sa diffusion sur les réseaux sociaux de Pharmapro.fr ne s'applique pas).
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="feildForm" runat="server" action="{{ url($url) }}" name="frmmultistep2"
                    id="frmmultistep2" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="interviewid" name="interviewid" value="{{ $interviewid }}">
                    <input type="hidden" id="s2_interviewid" name="s2_interviewid" value="{{ $interviewid }}">
                    <input type="hidden" id="descoptionvalue" name="descoptionvalue" value="{{ $job_desc_type }}">
                    <input type="hidden" id="oldpdf" name="oldpdf" value="{{ $desc }}">

                      <h3 style="padding-top: 6px;">{{ __('message.information_about_the_job_ads') }}
                        <span><img src="{{ asset('assets/announsment.png') }}"
                            style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span>
                      </h3>
                      <!--  <div class="intHead">Who is the interviewee?</div>  -->

                      <div class="form-group">
                        <div class="custom-tab">
                          <p>Comment souhaitez-vous publier votre offre d'emploi ?</p>
                          <div class="eq-part">
                            <div class="pdf eq">
                              <a href="javascript:void(0);" id="onloadactive" onclick="showoption(2)"
                                class="descoption textoption  <?php if($job_desc_type == 2 || $job_desc_type == "") { echo "active"; } ?> ">
                                <img class="img-fluid"
                                  src="{{ asset('assets/layouts/layout4-pub/front/images/writing.png') }}" /><span
                                  class="big">Publier avec texte (et champs automatiques)</span></a>
                            </div>
                            <div class="pdf eq">
                              <a href="javascript:void(0);" onclick="showoption(1)"
                                class="descoption pdfoption <?php if($job_desc_type == 1 ) { echo "active"; } ?> ">
                                <img class="img-fluid"
                                  src="{{ asset('assets/layouts/layout4-pub/front/images/pdf.png') }}" /><span
                                  class="big">Publier avec un PDF</span></a>
                            </div>
                            <div class="pdf eq">
                              <a href="javascript:void(0);" onclick="showoption(3)"
                                class="descoption linkoption  <?php if($job_desc_type == 3 ) { echo "active"; } ?> ">
                                <img class="img-fluid"
                                  src="{{ asset('assets/layouts/layout4-pub/front/images/world.png') }}" /><span
                                  class="big">Lien direct<br /><span class="small">Publier avec un lien externe
                                    :</span></span></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php  $desc1 = ""; $desc2 = ""; $desc3 = "";
                         if($job_desc_type == 1 ) 
                         {
                           $desc1 = $desc;
                         }  
                         if($job_desc_type == 3 ) 
                         {
                           $desc2 = $desc;
                         }  
                         if($job_desc_type == 2 ) 
                         {
                           $desc3 = $desc;
                         }  
                      ?>
                      <div class="form-group" id="pdf" <?php if($job_desc_type != 1) { ?> style="display:none;"
                        <?php } ?>>
                        <label class="fName">Publier un fichier PDF</label>

                        <label for="descfile"
                          style="cursor: pointer;font-size: 19px;font-weight: bold; padding-top: 14px;">Choisir un PDF :
                        </label>

                        <label for="descfile_fm"
                          style="cursor: pointer;font-size: 19px;font-weight: bold; padding-top: 14px;">
                          <?php  if($desc1 != '' ) { ?>({{ $desc1 }}) <?php } ?>
                        </label>

                        <label for="file_name" style="cursor: pointer;font-size: 19px;font-weight: bold; padding-top: 14px;">                                
                        </label>
                        
                        <!-- <label for="descfile"
                          style="cursor: pointer;font-size: 19px;font-weight: bold; padding-top: 14px;">Choisir un PDF
                          <?php //if($desc1 != '' ) { ?>({{ $desc1 }}) <?php // } ?></label> -->
                        <input type="file" id="descfile" name="descfile" style="visibility:hidden;" value="{{ $desc1 }}"
                          placeholder="{{ $desc1 }}">

                        <?php if($job_desc_type == 1 && $desc1 != '' ){ ?>
                          <span><a href="<?php echo env('APP_URL').'resume/'.$desc1 ?>" target="_blank">Voir</a></span>
                          <span> | <a href="<?php echo env('APP_URL').'pdfdelete/'.$interviewid ?>">Effacer</a></span>
                        <?php } ?>
                        
                      </div>
                      <div class="form-group" id="link" <?php if($job_desc_type != 3) { ?> style="display:none;"
                        <?php } ?>>
                        <label class="fName">Publier avec un lien</label>
                        <input type="text" class="form-control form-control-lg" id="desclink" name="desclink"
                          value="{{ $desc2 }}" placeholder="Ex. http://websiteurl.com">
                      </div>
                        <?php 
                          if (isset($jobdata)) {
                            $jobdataImg = $jobdata->desc_image;
                          } else {
                            $jobdataImg = '';
                          }
                        ?>
                      <input type="hidden" name="old_desc_image" id="old_desc_image" value="{{ $jobdataImg }}">
                      <input type="hidden" name="old_company_logo" id="old_company_logo" value="{{ $company_logo }}">



                      <section class="<?php if($job_desc_type == 2 || $job_desc_type == "") { echo "parentDiv"; } ?> " id="parentDiv">


                    <div class="detSection <?php if($job_desc_type == 2 || $job_desc_type == "") { echo "secWidth"; } ?> ">
                      <div class="form-group">

                        <h3 style="padding-top: 6px;">Informations sur l’entreprise / organisation où se trouve l’offre d’emploi</h3>

                        <label class="fName">Secteur entreprise/organisation de l’offre d’emploi *</label>
                        <select class="form-control form-control-lg" onchange="entrepriseChange('val');" id="entreprise" required name="entreprise">
                          <option value="Pharmacie d’officine" <?php if ($entreprise == 'Pharmacie d’officine') {?>
                            selected <?php }?>>Pharmacie d’officine</option>
                          <option value="Hôpital Clinique" <?php if ($entreprise == 'Hôpital Clinique') {?> selected
                            <?php }?>>Hôpital / Clinique</option>
                          <option value="Répartiteur" <?php if ($entreprise == 'Répartiteur') {?> selected <?php }?>>
                            Répartiteur</option>
                          <option value="Industrie pharmaceutique"
                            <?php if ($entreprise == 'Industrie pharmaceutique') {?> selected <?php }?>>Industrie
                            pharmaceutique</option>
                          <option value="Paraparfumerie Parfumerie"
                            <?php if ($entreprise == 'Paraparfumerie Parfumerie') {?> selected <?php }?>>Paraparfumerie
                            / Parfumerie</option>
                          <option value="Université Recherche" <?php if ($entreprise == 'Université Recherche') {?>
                            selected <?php }?>>Université / Recherche</option>
                          <option value="Organisation Association Institution ONG"
                            <?php if ($entreprise == 'Organisation Association Institution ONG') {?> selected <?php }?>>
                            Organisation / Association / Institution / ONG</option>
                          <option value="Autre" <?php if ($entreprise == 'Autre') {?> selected <?php }?>>Autre</option>
                          ?>
                        </select>
                      </div>
                      <!--------------------------------Monita(29-11)------------------------------------------------------------------->
                      <div class="form-group">
                          <label class="fName">Nom de l'entreprise ou organisation *</label>
                          <input type="text" class="form-control form-control-lg" id="company" name="company" onkeyup="steptwoChange('key');" value="{{ $company }}" placeholder="{{ __('message.enter_comp') }}" required="">
                        </div>
                        <div class="form-group" style="display: none;">
                          <label class="fName">Secteur entreprise/organisation *</label>
                          <select class="form-control form-control-lg" required name="entreprise1">
                            <option value="Pharmacie d’officine" <?php if ($entreprise1 == 'Pharmacie d’officine') {?>
                              selected <?php }?>>Pharmacie d’officine</option>
                            <option value="Agence (intérim, recrutement, chasseur de tête)"
                              <?php if ($entreprise1 == 'Agence (intérim, recrutement, chasseur de tête)') {?> selected
                              <?php }?>>Agence (intérim, recrutement, chasseur de tête)</option>
                            <option value="Hôpital Clinique" <?php if ($entreprise1 == 'Hôpital Clinique') {?> selected
                              <?php }?>>Hôpital / Clinique</option>
                            <option value="Répartiteur" <?php if ($entreprise1 == 'Répartiteur') {?> selected <?php }?>>
                              Répartiteur</option>
                            <option value="Industrie pharmaceutique"
                              <?php if ($entreprise1 == 'Industrie pharmaceutique') {?> selected <?php }?>>Industrie
                              pharmaceutique</option>
                            <option value="Paraparfumerie Parfumerie"
                              <?php if ($entreprise1 == 'Paraparfumerie Parfumerie') {?> selected <?php }?>>Paraparfumerie
                              / Parfumerie</option>
                            <option value="Université Recherche" <?php if ($entreprise1 == 'Université Recherche') {?>
                              selected <?php }?>>Université / Recherche</option>
                            <option value="Organisation Association Institution ONG"
                              <?php if ($entreprise1 == 'Organisation Association Institution ONG') {?> selected
                              <?php }?>>Organisation / Association / Institution / ONG</option>
                            <option value="Autre" <?php if ($entreprise1 == 'Autre') {?> selected <?php }?>>Autre</option>
                            ?>
                          </select>
                       </div>
                       
                       <!------------------------------end-update----------------------------->
                      <div class="form-group">
                        <label class="fName">{{ __('message.job_title') }} *</label>
                        
                        <?php 
                        $profession = DB::table('profession')
                        ->orderBy('display_order')->get(); ?>

                        <select onchange="entrepriseChange('val');" class="form-control form-control-lg" required name="title" id="title">
                          <!-- <option value="">{{ __('message.job_title') }}</option> -->
                          <?php if (!empty($profession)) {
                                 foreach ($profession as $key => $value) {
                          ?>
                          <option value="{{ $value->title }}" <?php if ($value->title == $title) {?> selected <?php }?>>
                            {{ $value->title }}</option>
                            <?php }
                              }
                            ?>
                        </select>
                        <!-- <input type="text" class="form-control form-control-lg name-auto-fill-interviewee" id="title" name="title" value="{{ $title }}" placeholder="{{ __('message.enter_name') }}" required="">   -->
                      </div>
                      <div class="form-group">
                        <label class="fName">Type de contrat *</label>
                        <select class="form-control form-control-lg" required name="tcontrat" id="tcontrat" onchange="entrepriseChange('val');">
                          <option value="CDI" <?php if ($tcontrat == 'CDI') {?> selected <?php }?>>CDI</option>
                          <option value="CDD" <?php if ($tcontrat == 'CDD') {?> selected <?php }?>>CDD</option>
                          <?php if ($tcontrat == 'CDI ou CDD') {?> selected <?php }?> >CDI ou CDD</option> -->
                          <option value="Stage" <?php if ($tcontrat == 'Stage') {?> selected <?php }?>>Stage</option>
                          <option value="Apprentissage" <?php if ($tcontrat == 'Apprentissage') {?> selected <?php }?>>
                            Apprentissage</option>
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="fName">Complément à la profession (texte, ex. pour seconder la titulaire) :</label>
                        <?php 
                          if (isset($jobdata)) {
                            $jobdataCompliment = $jobdata->compliment;
                          } else {
                            $jobdataCompliment = '';
                          }
                        ?>
                        <input type="text" onkeyup="entrepriseChange('key');" name="compliment" id="compliment" placeholder="Complément à la profession" value="{{ $jobdataCompliment }}" class="form-control form-control-lg">
                      </div>
                      <div class="form-group">
                        <label class="fName">Temps de travail *</label>
                        <select class="form-control form-control-lg" required name="travail" id="travail" onchange="entrepriseChange('val');">
                          <option value="Temps plein" <?php if ($travail == 'Temps plein') {?> selected <?php }?>>Temps
                            plein</option>
                          <option value="Temps partiel" <?php if ($travail == 'Temps partiel') {?> selected <?php }?>>
                            Temps partiel</option>
                          <option value="Autre - Indéfini" <?php if ($travail == 'Autre - Indéfini') {?> selected
                            <?php }?>>Autre - Indéfini</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="fName">Complément au texte temps de travail (ex. Un samedi sur deux)</label>
                        <?php 
                          if (isset($jobdata)) {
                            $complimenttravail = $jobdata->complimenttravail;
                          } else {
                            $complimenttravail = '';
                          }
                        ?>
                        <input type="text" onkeyup="entrepriseChange('key');" name="complimenttravail" id="complimenttravail" placeholder="Complément à la profession" value="{{ $complimenttravail }}" class="form-control form-control-lg">
                      </div>
                    <div class="form-group"  id="hideoffer" <?php if ($offerdate == 'non précisée') {echo "style=display:none;";}?>>
                        <label class="fName" >Date d'entrée en fonction *</label>
                        <input type="text" onkeyup="entrepriseChange('val');" value="{{ $offerdate }}" name="offerdate" id="offerdate" class="form-control">
                      </div>
                         <div class="form-group">
                          <input type="checkbox" id="show_date" onchange="entrepriseChange('key');" name="show_date" value="show_date" 
                         @if(isset($jobdata))
                            @if ($jobdata->show_date == 'show_date' )
                             
                             checked
                           @endif @endif 
                               <?php if($offerdate == 'non précisée'){ echo "checked"; }?>
                               >
                            Ne pas publier la date d'entrée
                      </div>
                      <div class="form-group" <?php if ($utype == 'free') {?> style="display:none;" <?php }?>
                        id="showurgent">
                        <label class="fName">Offre d’emploi urgente ? *</label>
                        <select class="form-control form-control-lg" id="urgent" name="urgent" onchange="entrepriseChange('key');">
                          <option value="Non" <?php if ($urgent == 'Non') {?> selected <?php }?>>Non</option>
                          <option value="Oui" <?php if ($urgent == 'Oui') {?> selected <?php }?>>Oui</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="fName"> Possibilité de logement ? * </label>
                        <select class="form-control form-control-lg" id="hosted" name="hosted" onchange="entrepriseChange('key');">
                          <option value="Non" <?php if ($urgent == 'Non') {?> selected <?php }?>>Non</option>
                          <option value="Oui" <?php if ($urgent == 'Oui') {?> selected <?php }?>>Oui</option>
                          ?>
                        </select>
                      </div>

                      <div class="form-group" id="text" <?php if($job_desc_type != 2 || $job_desc_type != "") { ?> style="display:none;"
                        <?php } ?>>
                        <label class="fName">Description de l'offre (champ facultatif) {{-- {{ __('message.job_description') }} --}} <br /><span
                            style="font-weight:normal;">N'oubliez pas de mentionner vos coordonnées de contact (ex.
                            e-mail, tél.)</span></label>
                        <textarea type="text" class="form-control form-control-lg" id="desc" name="desc" onkeyup="entrepriseChange('val');" 
                          placeholder="{{ __('message.enter_desc') }}">{{ $desc }}</textarea>
                        <label class="fName" style="margin-top:15px">Publier une image en bas de l'offre d'emploi</label>
                          <label for="desc_image">Choisir une image
                            <?php if($jobdataImg != '' ) { ?>({{ $jobdataImg }}) <?php } ?></label>
                        <div>
                          <label class="custom-file-upload">Choisir l'image
                          <input type="file" onchange="readURL(this);" id="desc_image" hidden name="desc_image" value="{{ $jobdataImg }}" ></label>
                          @if($jobdataImg != "")
                            <span  class="alignRight"><a href="{{ url('desc-img-delete/'.$interviewid) }}">Effacer</a></span>
                          @else                          
                            <span  class="alignRight" onclick="removeImg('val');"><a href="javascript:void(0)">Effacer</a></span>
                          @endif
                            
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="fName"> E-mail de contact pour candidat (peut être différente de l’e-mail du compte sur Pharmapro.fr) : </label>
                        <input type="email" onkeyup="entrepriseChange('key');" value="{{ $email }}" name="email" id="email" class="form-control form-control-lg" required />
                      </div>
                      <div class="form-group">
                        <input type="checkbox" id="show_email" onchange="entrepriseChange('key');" name="show_email" value="show_email" 
                        @if(isset($jobdata))
                          @if ($jobdata->show_email == 'show_email') checked @endif @endif>
                          Cacher l'e-mail de contact de l'offre
                      </div>
                      <div class="form-group">
                        <label class="fName"> Téléphone de contact * : </label>
                        <input type="text" onkeyup="entrepriseChange('key');" value="{{ $phone }}" name="phone" id="phone" class="form-control form-control-lg"  required="">
                      </div>
                      <div class="form-group">
                        <input type="checkbox" id="show_phone" onchange="entrepriseChange('key');" name="show_phone" value="show_phone" 
                        @if(isset($jobdata))
                          @if ($jobdata->show_phone == 'show_phone') checked @endif @endif>
                          Cacher le no de téléphone de l'offre
                      </div>
                      <!-------------------------------Monita(29-11)-------------------------------------------------------------------->
                      
                       
                        
                       <!-------------------------------end-update---------------------------->

                        
                        <div id="free_div" @if($utype == 'free') style = "display:block; " @else style="display:none;" @endif>
                        <div class="form-group">
                          <label class="fName">{{ __('message.address') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="address" name="address" onkeyup="entrepriseChange('val')"
                            placeholder="Ex. 1 Rue de la Gare" value="{{ $address }}">
                            @if($errors->has('address'))
                          <span style="color: red;">{{ $errors->first('address') }}</span>
                            
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.pincode') }} *</label>
                          <input type="tel" class="form-control form-control-lg" id="pincode" name="pincode"
                            value="{{ $pincode }}" placeholder="Ex. 75001">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.city') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="city" name="city" onkeyup="entrepriseChange('val')"
                            value="{{ $city }}" placeholder="{{ __('message.enter_city') }}" >
                        </div>
                        <!-- <div class="form-group">
                          <label class="fName">{{ __('message.state') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="state" name="state"
                            value="{{ $state }}" placeholder="{{ __('message.enter_state') }}"
                            onkeyup="hello(this.value);" >
                          <div id="filter_result">
                          </div>
                        </div> -->

                        <div class="form-group mystate">
                          <label class="fName">{{ __('message.state') }} *</label>

                          <select class="form-control form-control-lg" id="state"  name="state" 
                                  onkeyup="hello(this.value);" > 
                              <option></option>
                            <?php

                              if($state == "01")
                              {
                              echo "<option value='01' selected='selected' >01</option>";
                              }
                              else
                              {
                                echo "<option value='01' >01</option>";
                              }

                              if($state == "02")
                              {
                              echo "<option value='02' selected='selected' >02</option>";
                              }
                              else
                              {
                                echo "<option value='02' >02</option>";
                              }

                              if($state == "03")
                              {
                              echo "<option value='03' selected='selected' >03</option>";
                              }
                              else
                              {
                                echo "<option value='03' >03</option>";
                              }

                              if($state == "04")
                              {
                              echo "<option value='04' selected='selected' >04</option>";
                              }
                              else
                              {
                                echo "<option value='04' >04</option>";
                              }

                              if($state == "05")
                              {
                              echo "<option value='05' selected='selected' >05</option>";
                              }
                              else
                              {
                                echo "<option value='05' >05</option>";
                              }

                              if($state == "06")
                              {
                              echo "<option value='06' selected='selected' >06</option>";
                              }
                              else
                              {
                                echo "<option value='06' >06</option>";
                              }

                              if($state == "07")
                              {
                              echo "<option value='07' selected='selected' >07</option>";
                              }
                              else
                              {
                                echo "<option value='07' >07</option>";
                              }

                              if($state == "08")
                              {
                              echo "<option value='08' selected='selected' >08</option>";
                              }
                              else
                              {
                                echo "<option value='08' >08</option>";
                              }

                              if($state == "09")
                              {
                              echo "<option value='09' selected='selected' >09</option>";
                              }
                              else
                              {
                                echo "<option value='09' >09</option>";
                              }

                              if($state == "10")
                              {
                              echo "<option value='10' selected='selected' >10</option>";
                              }
                              else
                              {
                                echo "<option value='10' >10</option>";
                              }

                                                            if($state == "11")
                              {
                              echo "<option value='11' selected='selected' >11</option>";
                              }
                              else
                              {
                                echo "<option value='11' >11</option>";
                              }

                              if($state == "12")
                              {
                              echo "<option value='12' selected='selected' >12</option>";
                              }
                              else
                              {
                                echo "<option value='12' >12</option>";
                              }

                              if($state == "13")
                              {
                              echo "<option value='13' selected='selected' >13</option>";
                              }
                              else
                              {
                                echo "<option value='13' >13</option>";
                              }

                              if($state == "14")
                              {
                              echo "<option value='14' selected='selected' >14</option>";
                              }
                              else
                              {
                                echo "<option value='14' >14</option>";
                              }

                              if($state == "15")
                              {
                              echo "<option value='15' selected='selected' >15</option>";
                              }
                              else
                              {
                                echo "<option value='15' >15</option>";
                              }

                              if($state == "16")
                              {
                              echo "<option value='16' selected='selected' >16</option>";
                              }
                              else
                              {
                                echo "<option value='16' >16</option>";
                              }

                              if($state == "17")
                              {
                              echo "<option value='17' selected='selected' >17</option>";
                              }
                              else
                              {
                                echo "<option value='17' >17</option>";
                              }

                              if($state == "18")
                              {
                              echo "<option value='18' selected='selected' >18</option>";
                              }
                              else
                              {
                                echo "<option value='18' >18</option>";
                              }

                              if($state == "19")
                              {
                              echo "<option value='19' selected='selected' >19</option>";
                              }
                              else
                              {
                                echo "<option value='19' >19</option>";
                              }

                              /*if($state == "20")
                              {
                              echo "<option value='20' selected='selected' >20</option>";
                              }
                              else
                              {
                                echo "<option value='20' >20</option>";
                              }*/

                              if($state == "2A")
                              {
                              echo "<option value='2A' selected='selected' >2A</option>";
                              }
                              else
                              {
                                echo "<option value='2A' >2A</option>";
                              }

                              if($state == "2B")
                              {
                              echo "<option value='2B' selected='selected' >2B</option>";
                              }
                              else
                              {
                                echo "<option value='2B' >2B</option>";
                              }

                              if($state == "21")
                              {
                              echo "<option value='21' selected='selected' >21</option>";
                              }
                              else
                              {
                                echo "<option value='21' >21</option>";
                              }

                              if($state == "22")
                              {
                              echo "<option value='22' selected='selected' >22</option>";
                              }
                              else
                              {
                                echo "<option value='22' >22</option>";
                              }

                              if($state == "23")
                              {
                              echo "<option value='23' selected='selected' >23</option>";
                              }
                              else
                              {
                                echo "<option value='23' >23</option>";
                              }

                              if($state == "24")
                              {
                              echo "<option value='24' selected='selected' >24</option>";
                              }
                              else
                              {
                                echo "<option value='24' >24</option>";
                              }

                              if($state == "25")
                              {
                              echo "<option value='25' selected='selected' >25</option>";
                              }
                              else
                              {
                                echo "<option value='25' >25</option>";
                              }

                              if($state == "26")
                              {
                              echo "<option value='26' selected='selected' >26</option>";
                              }
                              else
                              {
                                echo "<option value='26' >26</option>";
                              }

                              if($state == "27")
                              {
                              echo "<option value='27' selected='selected' >27</option>";
                              }
                              else
                              {
                                echo "<option value='27' >27</option>";
                              }

                              if($state == "28")
                              {
                              echo "<option value='28' selected='selected' >28</option>";
                              }
                              else
                              {
                                echo "<option value='28' >28</option>";
                              }

                              if($state == "29")
                              {
                              echo "<option value='29' selected='selected' >29</option>";
                              }
                              else
                              {
                                echo "<option value='29' >29</option>";
                              }

                              if($state == "30")
                              {
                              echo "<option value='30' selected='selected' >30</option>";
                              }
                              else
                              {
                                echo "<option value='30' >30</option>";
                              }

                              if($state == "31")
                              {
                              echo "<option value='31' selected='selected' >31</option>";
                              }
                              else
                              {
                                echo "<option value='31' >31</option>";
                              }

                              if($state == "32")
                              {
                              echo "<option value='32' selected='selected' >32</option>";
                              }
                              else
                              {
                                echo "<option value='32' >32</option>";
                              }

                              if($state == "33")
                              {
                              echo "<option value='33' selected='selected' >33</option>";
                              }
                              else
                              {
                                echo "<option value='33' >33</option>";
                              }

                              if($state == "34")
                              {
                              echo "<option value='34' selected='selected' >34</option>";
                              }
                              else
                              {
                                echo "<option value='34' >34</option>";
                              }

                              if($state == "35")
                              {
                              echo "<option value='35' selected='selected' >35</option>";
                              }
                              else
                              {
                                echo "<option value='35' >35</option>";
                              }

                              if($state == "36")
                              {
                              echo "<option value='36' selected='selected' >36</option>";
                              }
                              else
                              {
                                echo "<option value='36' >36</option>";
                              }

                              if($state == "37")
                              {
                              echo "<option value='37' selected='selected' >37</option>";
                              }
                              else
                              {
                                echo "<option value='37' >37</option>";
                              }

                              if($state == "38")
                              {
                              echo "<option value='38' selected='selected' >38</option>";
                              }
                              else
                              {
                                echo "<option value='38' >38</option>";
                              }

                              if($state == "39")
                              {
                              echo "<option value='39' selected='selected' >39</option>";
                              }
                              else
                              {
                                echo "<option value='39' >39</option>";
                              }

                              if($state == "40")
                              {
                              echo "<option value='40' selected='selected' >40</option>";
                              }
                              else
                              {
                                echo "<option value='40' >40</option>";
                              }

                                                            if($state == "41")
                              {
                              echo "<option value='41' selected='selected' >41</option>";
                              }
                              else
                              {
                                echo "<option value='41' >41</option>";
                              }

                              if($state == "42")
                              {
                              echo "<option value='42' selected='selected' >42</option>";
                              }
                              else
                              {
                                echo "<option value='42' >42</option>";
                              }

                              if($state == "43")
                              {
                              echo "<option value='43' selected='selected' >43</option>";
                              }
                              else
                              {
                                echo "<option value='43' >43</option>";
                              }

                              if($state == "44")
                              {
                              echo "<option value='44' selected='selected' >44</option>";
                              }
                              else
                              {
                                echo "<option value='44' >44</option>";
                              }

                              if($state == "45")
                              {
                              echo "<option value='45' selected='selected' >45</option>";
                              }
                              else
                              {
                                echo "<option value='45' >45</option>";
                              }

                              if($state == "46")
                              {
                              echo "<option value='46' selected='selected' >46</option>";
                              }
                              else
                              {
                                echo "<option value='46' >46</option>";
                              }

                              if($state == "47")
                              {
                              echo "<option value='47' selected='selected' >47</option>";
                              }
                              else
                              {
                                echo "<option value='47' >47</option>";
                              }

                              if($state == "48")
                              {
                              echo "<option value='48' selected='selected' >48</option>";
                              }
                              else
                              {
                                echo "<option value='48' >48</option>";
                              }

                              if($state == "49")
                              {
                              echo "<option value='49' selected='selected' >49</option>";
                              }
                              else
                              {
                                echo "<option value='49' >49</option>";
                              }

                              if($state == "50")
                              {
                              echo "<option value='50' selected='selected' >50</option>";
                              }
                              else
                              {
                                echo "<option value='50' >50</option>";
                              }

                                                            if($state == "51")
                              {
                              echo "<option value='51' selected='selected' >51</option>";
                              }
                              else
                              {
                                echo "<option value='51' >51</option>";
                              }

                              if($state == "52")
                              {
                              echo "<option value='52' selected='selected' >52</option>";
                              }
                              else
                              {
                                echo "<option value='52' >52</option>";
                              }

                              if($state == "53")
                              {
                              echo "<option value='53' selected='selected' >53</option>";
                              }
                              else
                              {
                                echo "<option value='53' >53</option>";
                              }

                              if($state == "54")
                              {
                              echo "<option value='54' selected='selected' >54</option>";
                              }
                              else
                              {
                                echo "<option value='54' >54</option>";
                              }

                              if($state == "55")
                              {
                              echo "<option value='55' selected='selected' >55</option>";
                              }
                              else
                              {
                                echo "<option value='55' >55</option>";
                              }

                              if($state == "56")
                              {
                              echo "<option value='56' selected='selected' >56</option>";
                              }
                              else
                              {
                                echo "<option value='56' >56</option>";
                              }

                              if($state == "57")
                              {
                              echo "<option value='57' selected='selected' >57</option>";
                              }
                              else
                              {
                                echo "<option value='57' >57</option>";
                              }

                              if($state == "58")
                              {
                              echo "<option value='58' selected='selected' >58</option>";
                              }
                              else
                              {
                                echo "<option value='58' >58</option>";
                              }

                              if($state == "59")
                              {
                              echo "<option value='59' selected='selected' >59</option>";
                              }
                              else
                              {
                                echo "<option value='59' >59</option>";
                              }

                              if($state == "60")
                              {
                              echo "<option value='60' selected='selected' >60</option>";
                              }
                              else
                              {
                                echo "<option value='60' >60</option>";
                              }

                                                            if($state == "61")
                              {
                              echo "<option value='61' selected='selected' >61</option>";
                              }
                              else
                              {
                                echo "<option value='61' >61</option>";
                              }

                              if($state == "62")
                              {
                              echo "<option value='62' selected='selected' >62</option>";
                              }
                              else
                              {
                                echo "<option value='62' >62</option>";
                              }

                              if($state == "63")
                              {
                              echo "<option value='63' selected='selected' >63</option>";
                              }
                              else
                              {
                                echo "<option value='63' >63</option>";
                              }

                              if($state == "64")
                              {
                              echo "<option value='64' selected='selected' >64</option>";
                              }
                              else
                              {
                                echo "<option value='64' >64</option>";
                              }

                              if($state == "65")
                              {
                              echo "<option value='65' selected='selected' >65</option>";
                              }
                              else
                              {
                                echo "<option value='65' >65</option>";
                              }

                              if($state == "66")
                              {
                              echo "<option value='66' selected='selected' >66</option>";
                              }
                              else
                              {
                                echo "<option value='66' >66</option>";
                              }

                              if($state == "67")
                              {
                              echo "<option value='67' selected='selected' >67</option>";
                              }
                              else
                              {
                                echo "<option value='67' >67</option>";
                              }

                              if($state == "68")
                              {
                              echo "<option value='68' selected='selected' >68</option>";
                              }
                              else
                              {
                                echo "<option value='68' >68</option>";
                              }

                              if($state == "69")
                              {
                              echo "<option value='69' selected='selected' >69</option>";
                              }
                              else
                              {
                                echo "<option value='69' >69</option>";
                              }

                              if($state == "70")
                              {
                              echo "<option value='70' selected='selected' >70</option>";
                              }
                              else
                              {
                                echo "<option value='70' >70</option>";
                              }

                                                            if($state == "71")
                              {
                              echo "<option value='71' selected='selected' >71</option>";
                              }
                              else
                              {
                                echo "<option value='71' >71</option>";
                              }

                              if($state == "72")
                              {
                              echo "<option value='72' selected='selected' >72</option>";
                              }
                              else
                              {
                                echo "<option value='72' >72</option>";
                              }

                              if($state == "73")
                              {
                              echo "<option value='73' selected='selected' >73</option>";
                              }
                              else
                              {
                                echo "<option value='73' >73</option>";
                              }

                              if($state == "74")
                              {
                              echo "<option value='74' selected='selected' >74</option>";
                              }
                              else
                              {
                                echo "<option value='74' >74</option>";
                              }

                              if($state == "75")
                              {
                              echo "<option value='75' selected='selected' >75</option>";
                              }
                              else
                              {
                                echo "<option value='75' >75</option>";
                              }

                              if($state == "76")
                              {
                              echo "<option value='76' selected='selected' >76</option>";
                              }
                              else
                              {
                                echo "<option value='76' >76</option>";
                              }

                              if($state == "77")
                              {
                              echo "<option value='77' selected='selected' >77</option>";
                              }
                              else
                              {
                                echo "<option value='77' >77</option>";
                              }

                              if($state == "78")
                              {
                              echo "<option value='78' selected='selected' >78</option>";
                              }
                              else
                              {
                                echo "<option value='78' >78</option>";
                              }

                              if($state == "79")
                              {
                              echo "<option value='79' selected='selected' >79</option>";
                              }
                              else
                              {
                                echo "<option value='79' >79</option>";
                              }

                              if($state == "80")
                              {
                              echo "<option value='80' selected='selected' >80</option>";
                              }
                              else
                              {
                                echo "<option value='80' >80</option>";
                              }

                                                            if($state == "81")
                              {
                              echo "<option value='81' selected='selected' >81</option>";
                              }
                              else
                              {
                                echo "<option value='81' >81</option>";
                              }

                              if($state == "82")
                              {
                              echo "<option value='82' selected='selected' >82</option>";
                              }
                              else
                              {
                                echo "<option value='82' >82</option>";
                              }

                              if($state == "83")
                              {
                              echo "<option value='83' selected='selected' >83</option>";
                              }
                              else
                              {
                                echo "<option value='83' >83</option>";
                              }

                              if($state == "84")
                              {
                              echo "<option value='84' selected='selected' >84</option>";
                              }
                              else
                              {
                                echo "<option value='84' >84</option>";
                              }

                              if($state == "85")
                              {
                              echo "<option value='85' selected='selected' >85</option>";
                              }
                              else
                              {
                                echo "<option value='85' >85</option>";
                              }

                              if($state == "86")
                              {
                              echo "<option value='86' selected='selected' >86</option>";
                              }
                              else
                              {
                                echo "<option value='86' >86</option>";
                              }

                              if($state == "87")
                              {
                              echo "<option value='87' selected='selected' >87</option>";
                              }
                              else
                              {
                                echo "<option value='87' >87</option>";
                              }

                              if($state == "88")
                              {
                              echo "<option value='88' selected='selected' >88</option>";
                              }
                              else
                              {
                                echo "<option value='88' >88</option>";
                              }

                              if($state == "89")
                              {
                              echo "<option value='89' selected='selected' >89</option>";
                              }
                              else
                              {
                                echo "<option value='89' >89</option>";
                              }

                              if($state == "90")
                              {
                              echo "<option value='90' selected='selected' >90</option>";
                              }
                              else
                              {
                                echo "<option value='90' >90</option>";
                              }

                              if($state == "91")
                              {
                              echo "<option value='91' selected='selected' >91</option>";
                              }
                              else
                              {
                                echo "<option value='91' >91</option>";
                              }

                              if($state == "92")
                              {
                              echo "<option value='92' selected='selected' >92</option>";
                              }
                              else
                              {
                                echo "<option value='92' >92</option>";
                              }

                              if($state == "93")
                              {
                              echo "<option value='93' selected='selected' >93</option>";
                              }
                              else
                              {
                                echo "<option value='93' >93</option>";
                              }

                              if($state == "94")
                              {
                              echo "<option value='94' selected='selected' >94</option>";
                              }
                              else
                              {
                                echo "<option value='94' >94</option>";
                              }

                              if($state == "95")
                              {
                              echo "<option value='95' selected='selected' >95</option>";
                              }
                              else
                              {
                                echo "<option value='95' >95</option>";
                              }

                              if($state == "98")
                              {
                              echo "<option value='98' selected='selected' >98</option>";
                              }
                              else
                              {
                                echo "<option value='98' >98</option>";
                              }

                                                            if($state == "971")
                              {
                              echo "<option value='971' selected='selected' >971</option>";
                              }
                              else
                              {
                                echo "<option value='971' >971</option>";
                              }

                              if($state == "972")
                              {
                              echo "<option value='972' selected='selected' >972</option>";
                              }
                              else
                              {
                                echo "<option value='972' >972</option>";
                              }

                              if($state == "973")
                              {
                              echo "<option value='973' selected='selected' >973</option>";
                              }
                              else
                              {
                                echo "<option value='973' >973</option>";
                              }

                              if($state == "974")
                              {
                              echo "<option value='974' selected='selected' >974</option>";
                              }
                              else
                              {
                                echo "<option value='974' >974</option>";
                              }

                              if($state == "975")
                              {
                              echo "<option value='975' selected='selected' >975</option>";
                              }
                              else
                              {
                                echo "<option value='975' >975</option>";
                              }

                              if($state == "976")
                              {
                              echo "<option value='976' selected='selected' >976</option>";
                              }
                              else
                              {
                                echo "<option value='976' >976</option>";
                              }

                              if($state == "977")
                              {
                              echo "<option value='977' selected='selected' >977</option>";
                              }
                              else
                              {
                                echo "<option value='977' >977</option>";
                              }

                              if($state == "978")
                              {
                              echo "<option value='978' selected='selected' >978</option>";
                              }
                              else
                              {
                                echo "<option value='978' >978</option>";
                              }

                              if($state == "984")
                              {
                              echo "<option value='984' selected='selected' >984</option>";
                              }
                              else
                              {
                                echo "<option value='984' >984</option>";
                              }

                              if($state == "986")
                              {
                              echo "<option value='986' selected='selected' >986</option>";
                              }
                              else
                              {
                                echo "<option value='986' >986</option>";
                              }

                              if($state == "987")
                              {
                              echo "<option value='987' selected='selected' >987</option>";
                              }
                              else
                              {
                                echo "<option value='987' >987</option>";
                              }

                               if($state == "988")
                              {
                              echo "<option value='988' selected='selected' >988</option>";
                              }
                              else
                              {
                                echo "<option value='988' >988</option>";
                              }

                              if($state == "989")
                              {
                              echo "<option value='989' selected='selected' >989</option>";
                              }
                              else
                              {
                                echo "<option value='989' >989</option>";
                              }

                            ?> 
                          </select>
                          @if($errors->has('state'))
                          <span style="color: red;">{{ $errors->first('state') }}</span>
                            
                          @endif
                          <div id="filter_result"></div>
                        </div>
                      </div>
                     
                      <div id="paid_div" @if ($utype == "paid") style="display:block;" @else style="display:none;" @endif>
                        <div class="form-group">

                          <p style="margin-bottom: -15px;padding-bottom: 0px;line-height: 1;">
                            <font vertical-align: inherit;>Pays *</font></p><br>
                          <input type="radio" name="address1" value="France" id="france1" {{$address_paid=='France'? "checked" : ""}}>
                          <span style="margin: 10px 10px;">France (et Monaco)</span>  
                          <input type="radio" name="address1" value="Belgium" id="Belgium1" {{$address_paid=='Belgium'? "checked" : ""}}>
                          <span style="margin: 10px 10px;">Belgique</span>
                          <input type="radio" name="address1" value="Switzerland" id="Switzerland1" {{$address_paid=='Switzerland'? "checked" : ""}} >
                          <span style="margin: 10px 10px;">Suisse</span>
                           @if($errors->has('state1'))
                            <span style="color: red;margin: 10px 10px;">{{ $errors->first('state1') }}</span>
                         @endif
                          
                          <label class="fName" style="padding-top: 10px;">{{ __('message.address') }} *</label>
                           <input @if ($address_paid =="Switzerland") style="display: none;" @else style="display:block;" @endif type="text" class="form-control form-control-lg address_span" id="bel_address" name="bel_address" onkeyup="entrepriseChange('val')" placeholder="Ex. 1 Rue de la Gare" 
                           value="@if($address){{ $address }} @else {{ $address_paid }} @endif" style="margin-bottom: 15px;">
                            
                        
                        
                         <input @if ($address_paid =="Switzerland") style="display: block;" @else style="display:none;" @endif type="text" class="form-control form-control-lg address_span" id="swiss_address" name="swiss_address" onkeyup="entrepriseChange('val')" placeholder="Ex.  Rue de la Gare 1" 
                         value="@if($address){{ $address }} @else {{ $address_paid }} @endif" style="margin-bottom: 15px;" > @if($errors->has('bel_address'))
                            <span style="color: red;">{{ $errors->first('bel_address') }}</span>
                         @endif
                         @if($errors->has('swiss_address'))
                            <span style="color: red;">{{ $errors->first('swiss_address') }}</span>
                         @endif

                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.pincode') }} *</label>
                          <input type="tel" class="form-control form-control-lg" id="pincode" name="pincode1"
                            value="{{ $pincode }}" placeholder="Ex. 1001">
                        </div>
                        <div class="form-group" id="bel_city">
                          <label class="fName">{{ __('message.city') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="city" name="bel_city" onkeyup="entrepriseChange('val')"
                            value="{{ $city }}" placeholder="{{ __('message.enter_city') }}">
                        </div>

                        <div class="form-group" id="swiss_city" style="display: none;">
                          <label class="fName">{{ __('message.city') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="city" name="swiss_city" onkeyup="entrepriseChange('val')"
                            value="{{ $city }}" placeholder="Ex. Lausanne">
                        </div>

                        <!-- <div class="form-group">
                          <label class="fName">{{ __('message.state') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="state" name="state"
                            value="{{ $state }}" placeholder="{{ __('message.enter_state') }}"
                            onkeyup="hello(this.value);" >
                          <div id="filter_result">
                          </div>
                        </div> -->

                        <div class="form-group" id="cantons1" @if ($address_paid =="Switzerland") style="display: block;" @else style="display:none;" @endif

                         >
                          <label class="fName">Cantons *</label>

                          <select class="form-control form-control-lg" id="state1"  name="state1" 
                                  onkeyup="hello(this.value);" > 
                              <option></option>

                              <?php
                              if($state == "AG")
                              {
                              echo "<option value='AG' selected='selected' >AG</option>";
                              }
                              else
                              {
                                echo "<option value='AG' >AG</option>";
                              }

                              if($state == "AI")
                              {
                              echo "<option value='AI' selected='selected' >AI</option>";
                              }
                              else
                              {
                                echo "<option value='AI' >AI</option>";
                              }
                              if($state == "AR")
                              {
                              echo "<option value='AR' selected='selected' >AR</option>";
                              }
                              else
                              {
                                echo "<option value='AR' >AR</option>";
                              }
                              if($state == "BE")
                              {
                              echo "<option value='BE' selected='selected' >BE</option>";
                              }
                              else
                              {
                                echo "<option value='BE' >BE</option>";
                              }
                              if($state == "BL")
                              {
                              echo "<option value='BL' selected='selected' >BL</option>";
                              }
                              else
                              {
                                echo "<option value='BL' >BL</option>";
                              }
                              if($state == "BS")
                              {
                              echo "<option value='BS' selected='selected' >BS</option>";
                              }
                              else
                              {
                                echo "<option value='BS' >BS</option>";
                              }
                              if($state == "CH")
                              {
                              echo "<option value='CH' selected='selected' >CH</option>";
                              }
                              else
                              {
                                echo "<option value='CH' >CH</option>";
                              }
                              if($state == "FR")
                              {
                              echo "<option value='FR' selected='selected' >FR</option>";
                              }
                              else
                              {
                                echo "<option value='FR' >FR</option>";
                              }
                              if($state == "GE")
                              {
                              echo "<option value='GE' selected='selected' >GE</option>";
                              }
                              else
                              {
                                echo "<option value='GE' >GE</option>";
                              }
                              if($state == "GL")
                              {
                              echo "<option value='GL' selected='selected' >GL</option>";
                              }
                              else
                              {
                                echo "<option value='GL' >GL</option>";
                              }
                              if($state == "GR")
                              {
                              echo "<option value='GR' selected='selected' >GR</option>";
                              }
                              else
                              {
                                echo "<option value='GR' >GR</option>";
                              }
                              if($state == "JU")
                              {
                              echo "<option value='JU' selected='selected' >JU</option>";
                              }
                              else
                              {
                                echo "<option value='JU' >JU</option>";
                              }
                              if($state == "LU")
                              {
                              echo "<option value='LU' selected='selected' >LU</option>";
                              }
                              else
                              {
                                echo "<option value='LU' >LU</option>";
                              }
                              if($state == "NE")
                              {
                              echo "<option value='NE' selected='selected' >NE</option>";
                              }
                              else
                              {
                                echo "<option value='NE' >NE</option>";
                              }
                              if($state == "NW")
                              {
                              echo "<option value='NW' selected='selected' >NW</option>";
                              }
                              else
                              {
                                echo "<option value='NW' >NW</option>";
                              }
                              if($state == "OW")
                              {
                              echo "<option value='OW' selected='selected' >OW</option>";
                              }
                              else
                              {
                                echo "<option value='OW' >OW</option>";
                              }
                              if($state == "SG")
                              {
                              echo "<option value='SG' selected='selected' >SG</option>";
                              }
                              else
                              {
                                echo "<option value='SG' >SG</option>";
                              }
                              if($state == "SH")
                              {
                              echo "<option value='SH' selected='selected' >SH</option>";
                              }
                              else
                              {
                                echo "<option value='SH' >SH</option>";
                              }
                              if($state == "SO")
                              {
                              echo "<option value='SO' selected='selected' >SO</option>";
                              }
                              else
                              {
                                echo "<option value='SO' >SO</option>";
                              }
                              if($state == "SZ")
                              {
                              echo "<option value='SZ' selected='selected' >SZ</option>";
                              }
                              else
                              {
                                echo "<option value='SZ' >SZ</option>";
                              }
                              if($state == "TG")
                              {
                              echo "<option value='TG' selected='selected' >TG</option>";
                              }
                              else
                              {
                                echo "<option value='TG' >TG</option>";
                              }

                              if($state == "TI")
                              {
                              echo "<option value='TI' selected='selected' >TI</option>";
                              }
                              else
                              {
                                echo "<option value='TI' >TI</option>";
                              }
                              if($state == "UR")
                              {
                              echo "<option value='UR' selected='selected' >UR</option>";
                              }
                              else
                              {
                                echo "<option value='UR' >UR</option>";
                              }
                              if($state == "VD")
                              {
                              echo "<option value='VD' selected='selected' >VD</option>";
                              }
                              else
                              {
                                echo "<option value='VD' >VD</option>";
                              }

                              if($state == "VS")
                              {
                              echo "<option value='VS' selected='selected' >VS</option>";
                              }
                              else
                              {
                                echo "<option value='VS' >VS</option>";
                              }
                              if($state == "ZG")
                              {
                              echo "<option value='ZG' selected='selected' >ZG</option>";
                              }
                              else
                              {
                                echo "<option value='ZG' >ZG</option>";
                              }
                              if($state == "ZH")
                              {
                              echo "<option value='ZH' selected='selected' >ZH</option>";
                              }
                              else
                              {
                                echo "<option value='ZH' >ZH</option>";
                              }


                              ?>
                          </select>
                          <div id="filter_result"></div>
                        </div>



                        <div class="form-group" id="department" @if ($address_paid =="Switzerland" || $address_paid =="Belgium") style="display: none;" @else style="display:block;" @endif >
                          <label class="fName">{{ __('message.state') }} *</label>

                          <select class="form-control form-control-lg" id="state3"  name="state3" 
                                  onkeyup="hello(this.value);" > 
                              <option></option>
                            <?php

                              if($state == "01")
                              {
                              echo "<option value='01' selected='selected' >01</option>";
                              }
                              else
                              {
                                echo "<option value='01' >01</option>";
                              }

                              if($state == "02")
                              {
                              echo "<option value='02' selected='selected' >02</option>";
                              }
                              else
                              {
                                echo "<option value='02' >02</option>";
                              }

                              if($state == "03")
                              {
                              echo "<option value='03' selected='selected' >03</option>";
                              }
                              else
                              {
                                echo "<option value='03' >03</option>";
                              }

                              if($state == "04")
                              {
                              echo "<option value='04' selected='selected' >04</option>";
                              }
                              else
                              {
                                echo "<option value='04' >04</option>";
                              }

                              if($state == "05")
                              {
                              echo "<option value='05' selected='selected' >05</option>";
                              }
                              else
                              {
                                echo "<option value='05' >05</option>";
                              }

                              if($state == "06")
                              {
                              echo "<option value='06' selected='selected' >06</option>";
                              }
                              else
                              {
                                echo "<option value='06' >06</option>";
                              }

                              if($state == "07")
                              {
                              echo "<option value='07' selected='selected' >07</option>";
                              }
                              else
                              {
                                echo "<option value='07' >07</option>";
                              }

                              if($state == "08")
                              {
                              echo "<option value='08' selected='selected' >08</option>";
                              }
                              else
                              {
                                echo "<option value='08' >08</option>";
                              }

                              if($state == "09")
                              {
                              echo "<option value='09' selected='selected' >09</option>";
                              }
                              else
                              {
                                echo "<option value='09' >09</option>";
                              }

                              if($state == "10")
                              {
                              echo "<option value='10' selected='selected' >10</option>";
                              }
                              else
                              {
                                echo "<option value='10' >10</option>";
                              }

                                                            if($state == "11")
                              {
                              echo "<option value='11' selected='selected' >11</option>";
                              }
                              else
                              {
                                echo "<option value='11' >11</option>";
                              }

                              if($state == "12")
                              {
                              echo "<option value='12' selected='selected' >12</option>";
                              }
                              else
                              {
                                echo "<option value='12' >12</option>";
                              }

                              if($state == "13")
                              {
                              echo "<option value='13' selected='selected' >13</option>";
                              }
                              else
                              {
                                echo "<option value='13' >13</option>";
                              }

                              if($state == "14")
                              {
                              echo "<option value='14' selected='selected' >14</option>";
                              }
                              else
                              {
                                echo "<option value='14' >14</option>";
                              }

                              if($state == "15")
                              {
                              echo "<option value='15' selected='selected' >15</option>";
                              }
                              else
                              {
                                echo "<option value='15' >15</option>";
                              }

                              if($state == "16")
                              {
                              echo "<option value='16' selected='selected' >16</option>";
                              }
                              else
                              {
                                echo "<option value='16' >16</option>";
                              }

                              if($state == "17")
                              {
                              echo "<option value='17' selected='selected' >17</option>";
                              }
                              else
                              {
                                echo "<option value='17' >17</option>";
                              }

                              if($state == "18")
                              {
                              echo "<option value='18' selected='selected' >18</option>";
                              }
                              else
                              {
                                echo "<option value='18' >18</option>";
                              }

                              if($state == "19")
                              {
                              echo "<option value='19' selected='selected' >19</option>";
                              }
                              else
                              {
                                echo "<option value='19' >19</option>";
                              }

                              /*if($state == "20")
                              {
                              echo "<option value='20' selected='selected' >20</option>";
                              }
                              else
                              {
                                echo "<option value='20' >20</option>";
                              }*/

                              if($state == "2A")
                              {
                              echo "<option value='2A' selected='selected' >2A</option>";
                              }
                              else
                              {
                                echo "<option value='2A' >2A</option>";
                              }

                              if($state == "2B")
                              {
                              echo "<option value='2B' selected='selected' >2B</option>";
                              }
                              else
                              {
                                echo "<option value='2B' >2B</option>";
                              }

                              if($state == "21")
                              {
                              echo "<option value='21' selected='selected' >21</option>";
                              }
                              else
                              {
                                echo "<option value='21' >21</option>";
                              }

                              if($state == "22")
                              {
                              echo "<option value='22' selected='selected' >22</option>";
                              }
                              else
                              {
                                echo "<option value='22' >22</option>";
                              }

                              if($state == "23")
                              {
                              echo "<option value='23' selected='selected' >23</option>";
                              }
                              else
                              {
                                echo "<option value='23' >23</option>";
                              }

                              if($state == "24")
                              {
                              echo "<option value='24' selected='selected' >24</option>";
                              }
                              else
                              {
                                echo "<option value='24' >24</option>";
                              }

                              if($state == "25")
                              {
                              echo "<option value='25' selected='selected' >25</option>";
                              }
                              else
                              {
                                echo "<option value='25' >25</option>";
                              }

                              if($state == "26")
                              {
                              echo "<option value='26' selected='selected' >26</option>";
                              }
                              else
                              {
                                echo "<option value='26' >26</option>";
                              }

                              if($state == "27")
                              {
                              echo "<option value='27' selected='selected' >27</option>";
                              }
                              else
                              {
                                echo "<option value='27' >27</option>";
                              }

                              if($state == "28")
                              {
                              echo "<option value='28' selected='selected' >28</option>";
                              }
                              else
                              {
                                echo "<option value='28' >28</option>";
                              }

                              if($state == "29")
                              {
                              echo "<option value='29' selected='selected' >29</option>";
                              }
                              else
                              {
                                echo "<option value='29' >29</option>";
                              }

                              if($state == "30")
                              {
                              echo "<option value='30' selected='selected' >30</option>";
                              }
                              else
                              {
                                echo "<option value='30' >30</option>";
                              }

                              if($state == "31")
                              {
                              echo "<option value='31' selected='selected' >31</option>";
                              }
                              else
                              {
                                echo "<option value='31' >31</option>";
                              }

                              if($state == "32")
                              {
                              echo "<option value='32' selected='selected' >32</option>";
                              }
                              else
                              {
                                echo "<option value='32' >32</option>";
                              }

                              if($state == "33")
                              {
                              echo "<option value='33' selected='selected' >33</option>";
                              }
                              else
                              {
                                echo "<option value='33' >33</option>";
                              }

                              if($state == "34")
                              {
                              echo "<option value='34' selected='selected' >34</option>";
                              }
                              else
                              {
                                echo "<option value='34' >34</option>";
                              }

                              if($state == "35")
                              {
                              echo "<option value='35' selected='selected' >35</option>";
                              }
                              else
                              {
                                echo "<option value='35' >35</option>";
                              }

                              if($state == "36")
                              {
                              echo "<option value='36' selected='selected' >36</option>";
                              }
                              else
                              {
                                echo "<option value='36' >36</option>";
                              }

                              if($state == "37")
                              {
                              echo "<option value='37' selected='selected' >37</option>";
                              }
                              else
                              {
                                echo "<option value='37' >37</option>";
                              }

                              if($state == "38")
                              {
                              echo "<option value='38' selected='selected' >38</option>";
                              }
                              else
                              {
                                echo "<option value='38' >38</option>";
                              }

                              if($state == "39")
                              {
                              echo "<option value='39' selected='selected' >39</option>";
                              }
                              else
                              {
                                echo "<option value='39' >39</option>";
                              }

                              if($state == "40")
                              {
                              echo "<option value='40' selected='selected' >40</option>";
                              }
                              else
                              {
                                echo "<option value='40' >40</option>";
                              }

                                                            if($state == "41")
                              {
                              echo "<option value='41' selected='selected' >41</option>";
                              }
                              else
                              {
                                echo "<option value='41' >41</option>";
                              }

                              if($state == "42")
                              {
                              echo "<option value='42' selected='selected' >42</option>";
                              }
                              else
                              {
                                echo "<option value='42' >42</option>";
                              }

                              if($state == "43")
                              {
                              echo "<option value='43' selected='selected' >43</option>";
                              }
                              else
                              {
                                echo "<option value='43' >43</option>";
                              }

                              if($state == "44")
                              {
                              echo "<option value='44' selected='selected' >44</option>";
                              }
                              else
                              {
                                echo "<option value='44' >44</option>";
                              }

                              if($state == "45")
                              {
                              echo "<option value='45' selected='selected' >45</option>";
                              }
                              else
                              {
                                echo "<option value='45' >45</option>";
                              }

                              if($state == "46")
                              {
                              echo "<option value='46' selected='selected' >46</option>";
                              }
                              else
                              {
                                echo "<option value='46' >46</option>";
                              }

                              if($state == "47")
                              {
                              echo "<option value='47' selected='selected' >47</option>";
                              }
                              else
                              {
                                echo "<option value='47' >47</option>";
                              }

                              if($state == "48")
                              {
                              echo "<option value='48' selected='selected' >48</option>";
                              }
                              else
                              {
                                echo "<option value='48' >48</option>";
                              }

                              if($state == "49")
                              {
                              echo "<option value='49' selected='selected' >49</option>";
                              }
                              else
                              {
                                echo "<option value='49' >49</option>";
                              }

                              if($state == "50")
                              {
                              echo "<option value='50' selected='selected' >50</option>";
                              }
                              else
                              {
                                echo "<option value='50' >50</option>";
                              }

                                                            if($state == "51")
                              {
                              echo "<option value='51' selected='selected' >51</option>";
                              }
                              else
                              {
                                echo "<option value='51' >51</option>";
                              }

                              if($state == "52")
                              {
                              echo "<option value='52' selected='selected' >52</option>";
                              }
                              else
                              {
                                echo "<option value='52' >52</option>";
                              }

                              if($state == "53")
                              {
                              echo "<option value='53' selected='selected' >53</option>";
                              }
                              else
                              {
                                echo "<option value='53' >53</option>";
                              }

                              if($state == "54")
                              {
                              echo "<option value='54' selected='selected' >54</option>";
                              }
                              else
                              {
                                echo "<option value='54' >54</option>";
                              }

                              if($state == "55")
                              {
                              echo "<option value='55' selected='selected' >55</option>";
                              }
                              else
                              {
                                echo "<option value='55' >55</option>";
                              }

                              if($state == "56")
                              {
                              echo "<option value='56' selected='selected' >56</option>";
                              }
                              else
                              {
                                echo "<option value='56' >56</option>";
                              }

                              if($state == "57")
                              {
                              echo "<option value='57' selected='selected' >57</option>";
                              }
                              else
                              {
                                echo "<option value='57' >57</option>";
                              }

                              if($state == "58")
                              {
                              echo "<option value='58' selected='selected' >58</option>";
                              }
                              else
                              {
                                echo "<option value='58' >58</option>";
                              }

                              if($state == "59")
                              {
                              echo "<option value='59' selected='selected' >59</option>";
                              }
                              else
                              {
                                echo "<option value='59' >59</option>";
                              }

                              if($state == "60")
                              {
                              echo "<option value='60' selected='selected' >60</option>";
                              }
                              else
                              {
                                echo "<option value='60' >60</option>";
                              }

                                                            if($state == "61")
                              {
                              echo "<option value='61' selected='selected' >61</option>";
                              }
                              else
                              {
                                echo "<option value='61' >61</option>";
                              }

                              if($state == "62")
                              {
                              echo "<option value='62' selected='selected' >62</option>";
                              }
                              else
                              {
                                echo "<option value='62' >62</option>";
                              }

                              if($state == "63")
                              {
                              echo "<option value='63' selected='selected' >63</option>";
                              }
                              else
                              {
                                echo "<option value='63' >63</option>";
                              }

                              if($state == "64")
                              {
                              echo "<option value='64' selected='selected' >64</option>";
                              }
                              else
                              {
                                echo "<option value='64' >64</option>";
                              }

                              if($state == "65")
                              {
                              echo "<option value='65' selected='selected' >65</option>";
                              }
                              else
                              {
                                echo "<option value='65' >65</option>";
                              }

                              if($state == "66")
                              {
                              echo "<option value='66' selected='selected' >66</option>";
                              }
                              else
                              {
                                echo "<option value='66' >66</option>";
                              }

                              if($state == "67")
                              {
                              echo "<option value='67' selected='selected' >67</option>";
                              }
                              else
                              {
                                echo "<option value='67' >67</option>";
                              }

                              if($state == "68")
                              {
                              echo "<option value='68' selected='selected' >68</option>";
                              }
                              else
                              {
                                echo "<option value='68' >68</option>";
                              }

                              if($state == "69")
                              {
                              echo "<option value='69' selected='selected' >69</option>";
                              }
                              else
                              {
                                echo "<option value='69' >69</option>";
                              }

                              if($state == "70")
                              {
                              echo "<option value='70' selected='selected' >70</option>";
                              }
                              else
                              {
                                echo "<option value='70' >70</option>";
                              }

                                                            if($state == "71")
                              {
                              echo "<option value='71' selected='selected' >71</option>";
                              }
                              else
                              {
                                echo "<option value='71' >71</option>";
                              }

                              if($state == "72")
                              {
                              echo "<option value='72' selected='selected' >72</option>";
                              }
                              else
                              {
                                echo "<option value='72' >72</option>";
                              }

                              if($state == "73")
                              {
                              echo "<option value='73' selected='selected' >73</option>";
                              }
                              else
                              {
                                echo "<option value='73' >73</option>";
                              }

                              if($state == "74")
                              {
                              echo "<option value='74' selected='selected' >74</option>";
                              }
                              else
                              {
                                echo "<option value='74' >74</option>";
                              }

                              if($state == "75")
                              {
                              echo "<option value='75' selected='selected' >75</option>";
                              }
                              else
                              {
                                echo "<option value='75' >75</option>";
                              }

                              if($state == "76")
                              {
                              echo "<option value='76' selected='selected' >76</option>";
                              }
                              else
                              {
                                echo "<option value='76' >76</option>";
                              }

                              if($state == "77")
                              {
                              echo "<option value='77' selected='selected' >77</option>";
                              }
                              else
                              {
                                echo "<option value='77' >77</option>";
                              }

                              if($state == "78")
                              {
                              echo "<option value='78' selected='selected' >78</option>";
                              }
                              else
                              {
                                echo "<option value='78' >78</option>";
                              }

                              if($state == "79")
                              {
                              echo "<option value='79' selected='selected' >79</option>";
                              }
                              else
                              {
                                echo "<option value='79' >79</option>";
                              }

                              if($state == "80")
                              {
                              echo "<option value='80' selected='selected' >80</option>";
                              }
                              else
                              {
                                echo "<option value='80' >80</option>";
                              }

                                                            if($state == "81")
                              {
                              echo "<option value='81' selected='selected' >81</option>";
                              }
                              else
                              {
                                echo "<option value='81' >81</option>";
                              }

                              if($state == "82")
                              {
                              echo "<option value='82' selected='selected' >82</option>";
                              }
                              else
                              {
                                echo "<option value='82' >82</option>";
                              }

                              if($state == "83")
                              {
                              echo "<option value='83' selected='selected' >83</option>";
                              }
                              else
                              {
                                echo "<option value='83' >83</option>";
                              }

                              if($state == "84")
                              {
                              echo "<option value='84' selected='selected' >84</option>";
                              }
                              else
                              {
                                echo "<option value='84' >84</option>";
                              }

                              if($state == "85")
                              {
                              echo "<option value='85' selected='selected' >85</option>";
                              }
                              else
                              {
                                echo "<option value='85' >85</option>";
                              }

                              if($state == "86")
                              {
                              echo "<option value='86' selected='selected' >86</option>";
                              }
                              else
                              {
                                echo "<option value='86' >86</option>";
                              }

                              if($state == "87")
                              {
                              echo "<option value='87' selected='selected' >87</option>";
                              }
                              else
                              {
                                echo "<option value='87' >87</option>";
                              }

                              if($state == "88")
                              {
                              echo "<option value='88' selected='selected' >88</option>";
                              }
                              else
                              {
                                echo "<option value='88' >88</option>";
                              }

                              if($state == "89")
                              {
                              echo "<option value='89' selected='selected' >89</option>";
                              }
                              else
                              {
                                echo "<option value='89' >89</option>";
                              }

                              if($state == "90")
                              {
                              echo "<option value='90' selected='selected' >90</option>";
                              }
                              else
                              {
                                echo "<option value='90' >90</option>";
                              }

                              if($state == "91")
                              {
                              echo "<option value='91' selected='selected' >91</option>";
                              }
                              else
                              {
                                echo "<option value='91' >91</option>";
                              }

                              if($state == "92")
                              {
                              echo "<option value='92' selected='selected' >92</option>";
                              }
                              else
                              {
                                echo "<option value='92' >92</option>";
                              }

                              if($state == "93")
                              {
                              echo "<option value='93' selected='selected' >93</option>";
                              }
                              else
                              {
                                echo "<option value='93' >93</option>";
                              }

                              if($state == "94")
                              {
                              echo "<option value='94' selected='selected' >94</option>";
                              }
                              else
                              {
                                echo "<option value='94' >94</option>";
                              }

                              if($state == "95")
                              {
                              echo "<option value='95' selected='selected' >95</option>";
                              }
                              else
                              {
                                echo "<option value='95' >95</option>";
                              }

                              if($state == "98")
                              {
                              echo "<option value='98' selected='selected' >98</option>";
                              }
                              else
                              {
                                echo "<option value='98' >98</option>";
                              }

                                                            if($state == "971")
                              {
                              echo "<option value='971' selected='selected' >971</option>";
                              }
                              else
                              {
                                echo "<option value='971' >971</option>";
                              }

                              if($state == "972")
                              {
                              echo "<option value='972' selected='selected' >972</option>";
                              }
                              else
                              {
                                echo "<option value='972' >972</option>";
                              }

                              if($state == "973")
                              {
                              echo "<option value='973' selected='selected' >973</option>";
                              }
                              else
                              {
                                echo "<option value='973' >973</option>";
                              }

                              if($state == "974")
                              {
                              echo "<option value='974' selected='selected' >974</option>";
                              }
                              else
                              {
                                echo "<option value='974' >974</option>";
                              }

                              if($state == "975")
                              {
                              echo "<option value='975' selected='selected' >975</option>";
                              }
                              else
                              {
                                echo "<option value='975' >975</option>";
                              }

                              if($state == "976")
                              {
                              echo "<option value='976' selected='selected' >976</option>";
                              }
                              else
                              {
                                echo "<option value='976' >976</option>";
                              }

                              if($state == "977")
                              {
                              echo "<option value='977' selected='selected' >977</option>";
                              }
                              else
                              {
                                echo "<option value='977' >977</option>";
                              }

                              if($state == "978")
                              {
                              echo "<option value='978' selected='selected' >978</option>";
                              }
                              else
                              {
                                echo "<option value='978' >978</option>";
                              }

                              if($state == "984")
                              {
                              echo "<option value='984' selected='selected' >984</option>";
                              }
                              else
                              {
                                echo "<option value='984' >984</option>";
                              }

                              if($state == "986")
                              {
                              echo "<option value='986' selected='selected' >986</option>";
                              }
                              else
                              {
                                echo "<option value='986' >986</option>";
                              }

                              if($state == "987")
                              {
                              echo "<option value='987' selected='selected' >987</option>";
                              }
                              else
                              {
                                echo "<option value='987' >987</option>";
                              }

                               if($state == "988")
                              {
                              echo "<option value='988' selected='selected' >988</option>";
                              }
                              else
                              {
                                echo "<option value='988' >988</option>";
                              }

                              if($state == "989")
                              {
                              echo "<option value='989' selected='selected' >989</option>";
                              }
                              else
                              {
                                echo "<option value='989' >989</option>";
                              }

                            ?> 
                          </select>
                          @if($errors->has('state3'))
                            <span style="color: red;">{{ $errors->first('state3') }}</span>
                         @endif
                          <div id="filter_result"></div>
                        </div>



                      </div>
                      <div class="form-group">
                          <label class="fName">Site internet ou page (ex. www.google.fr ou google.fr) de la pharmacie</label>
                          <div class="row">
                            <div class="col-sm-4">
                              <select name="http" id="http" class="form-control form-control-lg">
                                <option value="https://" <?php if ($http == 'https://') {?> selected <?php }?>>https://
                                </option>
                                <option value="http://" <?php if ($http == 'http://') {?> selected <?php }?>>http://
                                </option>
                              </select>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-lg" id="linkd" name="linkd" value="{{ $linkd }}" placeholder="Votre site Internet ou page Facebook">
                            </div>
                          </div>
                        </div>
                        <!-------------------update_monita(3-11)--------------------->
                        
                        <div class="form-group">
                        <h3 style="padding-top: 6px;">Information sur l’entreprise / organisation qui publie l’offre d’emploi</h3>
                          <input type="hidden" id="valConform" name="valConform" value="<?php echo $sameConfirm;?>">
                          <input type="checkbox" id="sameConfirm" name="sameConfirm" onclick="myFunction(this)" <?php if($sameConfirm == ''||$sameConfirm=='no'){ ?> <?php } else{?> checked="checked" <?php } ?>>
                          <strong style="color:#000;">Adresse identifque à l'offre d'emploi</strong> &nbsp;&nbsp;
                           <input type="checkbox" id="diffVal" name="diffVal"<?php if($sameConfirm == ''||$sameConfirm=='no'){ ?> checked="checked" <?php } else{?>  <?php } ?>> 
                                  <b style="color:#000;">Adresse différente de l'offre d'emploi</b>
                        </div>
                      <div id="disableDiv">
                                    <div class="form-group">
                                          <label class="fName">Secteur entreprise/organisation de l'offre d'emploi * </label>
                    
                                          <select class="form-control form-control-lg" required name="entreprise2" id="entreprise2">
                                          
                                                  <option value="Pharmacie d’officine" <?php if($entreprise2 == 'Pharmacie d’officine'){ ?> selected <?php } ?> >Pharmacie d’officine</option>
                                          
                                                  <option value="Agence (intérim, recrutement, chasseur de tête)" <?php if($entreprise2 == 'Agence (intérim, recrutement, chasseur de tête)'){ ?> selected <?php } ?> >Agence (intérim, recrutement, chasseur de tête)</option>
                                                  <option value="Hôpital Clinique" <?php if($entreprise2 == 'Hôpital Clinique'){ ?> selected <?php } ?> >Hôpital / Clinique</option>
                                                  <option value="Répartiteur" <?php if($entreprise2 == 'Répartiteur'){ ?> selected <?php } ?> >Répartiteur</option>
                                                  <option value="Industrie pharmaceutique" <?php if($entreprise2 == 'Industrie pharmaceutique'){ ?> selected <?php } ?> >Industrie pharmaceutique</option>
                                                  <option value="Paraparfumerie Parfumerie" <?php if($entreprise2 == 'Paraparfumerie Parfumerie'){ ?> selected <?php } ?> >Paraparfumerie / Parfumerie</option>
                                                  <option value="Université Recherche" <?php if($entreprise2 == 'Université Recherche'){ ?> selected <?php } ?> >Université / Recherche</option>
                                                  <option value="Organisation Association Institution ONG" <?php if($entreprise2 == 'Organisation Association Institution ONG'){ ?> selected <?php } ?> >Organisation / Association / Institution / ONG</option>
                                                  <option value="Autre" <?php if($entreprise2 == 'Autre'){ ?> selected <?php } ?> >Autre</option>
                                          
                                            ?>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                      <label class="fName">Nom de l'entreprise ou organisation *</label>
                                      <input type="text" class="form-control form-control-lg" id="sameCompany" name="sameCompany" placeholder="Ex. Grande Pharmacie" value="{{ $company_detail }}" required="">
                                    </div>
                                    <div class="form-group">
                                                              <!---for country drop down --->
                                        <label class="fName">Pays *</label>
                                        <?php //echo $address_paid2; ?>
                                        <select class="form-control form-control-lg" id="sameCountry"  name="sameCountry"  required="required">
                                              @foreach ($con as $conList)
                                               <option value="{{$conList->name}}" @if($conList->name==$address_paid2) selected="selected" @endif> {{$conList->dname}}</option>
                                             @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                      <label class="fName">Adresse *</label>
                                      <input type="text" class="form-control form-control-lg" id="sameAddress" name="sameAddress" placeholder="Ex. 1 Rue de la Gare" value="{{ $company_address }}" required="">
                                      <!--<textarea id="sameAddress" class="form-control form-control-lg" name="sameAddress">{{ $company_address }}</textarea>-->
                                    </div>
                                    <div class="form-group">
                                      <label class="fName">Code postal *</label>
                                      <input type="text" class="form-control form-control-lg" id="samePincode" name="samePincode" value="{{ $company_pincode }}"  placeholder="Ex. 75001">
                                    </div>
                                    <div class="form-group">
                                      <label class="fName">Ville *</label>
                                      <input type="text" class="form-control form-control-lg" id="sameCity" name="sameCity" value="{{ $company_city }}"  placeholder="Ex. Comptabilité">
                                    </div>
                                    <div class="form-group" id="con_department"  @if ($address_paid2 =="France") style="display: block;" @else style="display:none;" @endif>
                                      <label class="fName">Département (ex. 01) *</label>
                                      <select class="form-control form-control-lg" id="sameDepartment" name="sameDepartment" onkeyup="hello(this.value);" required="required">
                                            <?php

                                              if($company_department == "01")
                                              {
                                              echo "<option value='01' selected='selected' >01</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='01' >01</option>";
                                              }

                                              if($company_department == "02")
                                              {
                                              echo "<option value='02' selected='selected' >02</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='02' >02</option>";
                                              }

                                              if($company_department == "03")
                                              {
                                              echo "<option value='03' selected='selected' >03</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='03' >03</option>";
                                              }

                                              if($company_department == "04")
                                              {
                                              echo "<option value='04' selected='selected' >04</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='04' >04</option>";
                                              }

                                              if($company_department == "05")
                                              {
                                              echo "<option value='05' selected='selected' >05</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='05' >05</option>";
                                              }

                                              if($company_department == "06")
                                              {
                                              echo "<option value='06' selected='selected' >06</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='06' >06</option>";
                                              }

                                              if($company_department == "07")
                                              {
                                              echo "<option value='07' selected='selected' >07</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='07' >07</option>";
                                              }

                                              if($company_department == "08")
                                              {
                                              echo "<option value='08' selected='selected' >08</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='08' >08</option>";
                                              }

                                              if($company_department == "09")
                                              {
                                              echo "<option value='09' selected='selected' >09</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='09' >09</option>";
                                              }

                                              if($company_department == "10")
                                              {
                                              echo "<option value='10' selected='selected' >10</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='10' >10</option>";
                                              }

                                                                            if($company_department == "11")
                                              {
                                              echo "<option value='11' selected='selected' >11</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='11' >11</option>";
                                              }

                                              if($company_department == "12")
                                              {
                                              echo "<option value='12' selected='selected' >12</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='12' >12</option>";
                                              }

                                              if($company_department == "13")
                                              {
                                              echo "<option value='13' selected='selected' >13</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='13' >13</option>";
                                              }

                                              if($company_department == "14")
                                              {
                                              echo "<option value='14' selected='selected' >14</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='14' >14</option>";
                                              }

                                              if($company_department == "15")
                                              {
                                              echo "<option value='15' selected='selected' >15</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='15' >15</option>";
                                              }

                                              if($company_department == "16")
                                              {
                                              echo "<option value='16' selected='selected' >16</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='16' >16</option>";
                                              }

                                              if($company_department == "17")
                                              {
                                              echo "<option value='17' selected='selected' >17</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='17' >17</option>";
                                              }

                                              if($company_department == "18")
                                              {
                                              echo "<option value='18' selected='selected' >18</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='18' >18</option>";
                                              }

                                              if($company_department == "19")
                                              {
                                              echo "<option value='19' selected='selected' >19</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='19' >19</option>";
                                              }

                                              /*if($company_department == "20")
                                              {
                                              echo "<option value='20' selected='selected' >20</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='20' >20</option>";
                                              }*/

                                              if($company_department == "2A")
                                              {
                                              echo "<option value='2A' selected='selected' >2A</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='2A' >2A</option>";
                                              }

                                              if($company_department == "2B")
                                              {
                                              echo "<option value='2B' selected='selected' >2B</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='2B' >2B</option>";
                                              }

                                              if($company_department == "21")
                                              {
                                              echo "<option value='21' selected='selected' >21</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='21' >21</option>";
                                              }

                                              if($company_department == "22")
                                              {
                                              echo "<option value='22' selected='selected' >22</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='22' >22</option>";
                                              }

                                              if($company_department == "23")
                                              {
                                              echo "<option value='23' selected='selected' >23</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='23' >23</option>";
                                              }

                                              if($company_department == "24")
                                              {
                                              echo "<option value='24' selected='selected' >24</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='24' >24</option>";
                                              }

                                              if($company_department == "25")
                                              {
                                              echo "<option value='25' selected='selected' >25</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='25' >25</option>";
                                              }

                                              if($company_department == "26")
                                              {
                                              echo "<option value='26' selected='selected' >26</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='26' >26</option>";
                                              }

                                              if($company_department == "27")
                                              {
                                              echo "<option value='27' selected='selected' >27</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='27' >27</option>";
                                              }

                                              if($company_department == "28")
                                              {
                                              echo "<option value='28' selected='selected' >28</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='28' >28</option>";
                                              }

                                              if($company_department == "29")
                                              {
                                              echo "<option value='29' selected='selected' >29</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='29' >29</option>";
                                              }

                                              if($company_department == "30")
                                              {
                                              echo "<option value='30' selected='selected' >30</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='30' >30</option>";
                                              }

                                              if($company_department == "31")
                                              {
                                              echo "<option value='31' selected='selected' >31</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='31' >31</option>";
                                              }

                                              if($company_department == "32")
                                              {
                                              echo "<option value='32' selected='selected' >32</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='32' >32</option>";
                                              }

                                              if($company_department == "33")
                                              {
                                              echo "<option value='33' selected='selected' >33</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='33' >33</option>";
                                              }

                                              if($company_department == "34")
                                              {
                                              echo "<option value='34' selected='selected' >34</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='34' >34</option>";
                                              }

                                              if($company_department == "35")
                                              {
                                              echo "<option value='35' selected='selected' >35</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='35' >35</option>";
                                              }

                                              if($company_department == "36")
                                              {
                                              echo "<option value='36' selected='selected' >36</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='36' >36</option>";
                                              }

                                              if($company_department == "37")
                                              {
                                              echo "<option value='37' selected='selected' >37</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='37' >37</option>";
                                              }

                                              if($company_department == "38")
                                              {
                                              echo "<option value='38' selected='selected' >38</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='38' >38</option>";
                                              }

                                              if($company_department == "39")
                                              {
                                              echo "<option value='39' selected='selected' >39</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='39' >39</option>";
                                              }

                                              if($company_department == "40")
                                              {
                                              echo "<option value='40' selected='selected' >40</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='40' >40</option>";
                                              }

                                                                            if($company_department == "41")
                                              {
                                              echo "<option value='41' selected='selected' >41</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='41' >41</option>";
                                              }

                                              if($company_department == "42")
                                              {
                                              echo "<option value='42' selected='selected' >42</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='42' >42</option>";
                                              }

                                              if($company_department == "43")
                                              {
                                              echo "<option value='43' selected='selected' >43</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='43' >43</option>";
                                              }

                                              if($company_department == "44")
                                              {
                                              echo "<option value='44' selected='selected' >44</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='44' >44</option>";
                                              }

                                              if($company_department == "45")
                                              {
                                              echo "<option value='45' selected='selected' >45</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='45' >45</option>";
                                              }

                                              if($company_department == "46")
                                              {
                                              echo "<option value='46' selected='selected' >46</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='46' >46</option>";
                                              }

                                              if($company_department == "47")
                                              {
                                              echo "<option value='47' selected='selected' >47</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='47' >47</option>";
                                              }

                                              if($company_department == "48")
                                              {
                                              echo "<option value='48' selected='selected' >48</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='48' >48</option>";
                                              }

                                              if($company_department == "49")
                                              {
                                              echo "<option value='49' selected='selected' >49</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='49' >49</option>";
                                              }

                                              if($company_department == "50")
                                              {
                                              echo "<option value='50' selected='selected' >50</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='50' >50</option>";
                                              }

                                                                            if($company_department == "51")
                                              {
                                              echo "<option value='51' selected='selected' >51</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='51' >51</option>";
                                              }

                                              if($company_department == "52")
                                              {
                                              echo "<option value='52' selected='selected' >52</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='52' >52</option>";
                                              }

                                              if($company_department == "53")
                                              {
                                              echo "<option value='53' selected='selected' >53</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='53' >53</option>";
                                              }

                                              if($company_department == "54")
                                              {
                                              echo "<option value='54' selected='selected' >54</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='54' >54</option>";
                                              }

                                              if($company_department == "55")
                                              {
                                              echo "<option value='55' selected='selected' >55</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='55' >55</option>";
                                              }

                                              if($company_department == "56")
                                              {
                                              echo "<option value='56' selected='selected' >56</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='56' >56</option>";
                                              }

                                              if($company_department == "57")
                                              {
                                              echo "<option value='57' selected='selected' >57</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='57' >57</option>";
                                              }

                                              if($company_department == "58")
                                              {
                                              echo "<option value='58' selected='selected' >58</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='58' >58</option>";
                                              }

                                              if($company_department == "59")
                                              {
                                              echo "<option value='59' selected='selected' >59</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='59' >59</option>";
                                              }

                                              if($company_department == "60")
                                              {
                                              echo "<option value='60' selected='selected' >60</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='60' >60</option>";
                                              }

                                                                            if($company_department == "61")
                                              {
                                              echo "<option value='61' selected='selected' >61</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='61' >61</option>";
                                              }

                                              if($company_department == "62")
                                              {
                                              echo "<option value='62' selected='selected' >62</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='62' >62</option>";
                                              }

                                              if($company_department == "63")
                                              {
                                              echo "<option value='63' selected='selected' >63</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='63' >63</option>";
                                              }

                                              if($company_department == "64")
                                              {
                                              echo "<option value='64' selected='selected' >64</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='64' >64</option>";
                                              }

                                              if($company_department == "65")
                                              {
                                              echo "<option value='65' selected='selected' >65</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='65' >65</option>";
                                              }

                                              if($company_department == "66")
                                              {
                                              echo "<option value='66' selected='selected' >66</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='66' >66</option>";
                                              }

                                              if($company_department == "67")
                                              {
                                              echo "<option value='67' selected='selected' >67</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='67' >67</option>";
                                              }

                                              if($company_department == "68")
                                              {
                                              echo "<option value='68' selected='selected' >68</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='68' >68</option>";
                                              }

                                              if($company_department == "69")
                                              {
                                              echo "<option value='69' selected='selected' >69</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='69' >69</option>";
                                              }

                                              if($company_department == "70")
                                              {
                                              echo "<option value='70' selected='selected' >70</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='70' >70</option>";
                                              }

                                                                            if($company_department == "71")
                                              {
                                              echo "<option value='71' selected='selected' >71</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='71' >71</option>";
                                              }

                                              if($company_department == "72")
                                              {
                                              echo "<option value='72' selected='selected' >72</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='72' >72</option>";
                                              }

                                              if($company_department == "73")
                                              {
                                              echo "<option value='73' selected='selected' >73</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='73' >73</option>";
                                              }

                                              if($company_department == "74")
                                              {
                                              echo "<option value='74' selected='selected' >74</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='74' >74</option>";
                                              }

                                              if($company_department == "75")
                                              {
                                              echo "<option value='75' selected='selected' >75</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='75' >75</option>";
                                              }

                                              if($company_department == "76")
                                              {
                                              echo "<option value='76' selected='selected' >76</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='76' >76</option>";
                                              }

                                              if($company_department == "77")
                                              {
                                              echo "<option value='77' selected='selected' >77</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='77' >77</option>";
                                              }

                                              if($company_department == "78")
                                              {
                                              echo "<option value='78' selected='selected' >78</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='78' >78</option>";
                                              }

                                              if($company_department == "79")
                                              {
                                              echo "<option value='79' selected='selected' >79</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='79' >79</option>";
                                              }

                                              if($company_department == "80")
                                              {
                                              echo "<option value='80' selected='selected' >80</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='80' >80</option>";
                                              }

                                                                            if($company_department == "81")
                                              {
                                              echo "<option value='81' selected='selected' >81</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='81' >81</option>";
                                              }

                                              if($company_department == "82")
                                              {
                                              echo "<option value='82' selected='selected' >82</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='82' >82</option>";
                                              }

                                              if($company_department == "83")
                                              {
                                              echo "<option value='83' selected='selected' >83</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='83' >83</option>";
                                              }

                                              if($company_department == "84")
                                              {
                                              echo "<option value='84' selected='selected' >84</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='84' >84</option>";
                                              }

                                              if($company_department == "85")
                                              {
                                              echo "<option value='85' selected='selected' >85</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='85' >85</option>";
                                              }

                                              if($company_department == "86")
                                              {
                                              echo "<option value='86' selected='selected' >86</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='86' >86</option>";
                                              }

                                              if($company_department == "87")
                                              {
                                              echo "<option value='87' selected='selected' >87</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='87' >87</option>";
                                              }

                                              if($company_department == "88")
                                              {
                                              echo "<option value='88' selected='selected' >88</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='88' >88</option>";
                                              }

                                              if($company_department == "89")
                                              {
                                              echo "<option value='89' selected='selected' >89</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='89' >89</option>";
                                              }

                                              if($company_department == "90")
                                              {
                                              echo "<option value='90' selected='selected' >90</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='90' >90</option>";
                                              }

                                              if($company_department == "91")
                                              {
                                              echo "<option value='91' selected='selected' >91</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='91' >91</option>";
                                              }

                                              if($company_department == "92")
                                              {
                                              echo "<option value='92' selected='selected' >92</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='92' >92</option>";
                                              }

                                              if($company_department == "93")
                                              {
                                              echo "<option value='93' selected='selected' >93</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='93' >93</option>";
                                              }

                                              if($company_department == "94")
                                              {
                                              echo "<option value='94' selected='selected' >94</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='94' >94</option>";
                                              }

                                              if($company_department == "95")
                                              {
                                              echo "<option value='95' selected='selected' >95</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='95' >95</option>";
                                              }

                                              if($company_department == "98")
                                              {
                                              echo "<option value='98' selected='selected' >98</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='98' >98</option>";
                                              }

                                                                            if($company_department == "971")
                                              {
                                              echo "<option value='971' selected='selected' >971</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='971' >971</option>";
                                              }

                                              if($company_department == "972")
                                              {
                                              echo "<option value='972' selected='selected' >972</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='972' >972</option>";
                                              }

                                              if($company_department == "973")
                                              {
                                              echo "<option value='973' selected='selected' >973</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='973' >973</option>";
                                              }

                                              if($company_department == "974")
                                              {
                                              echo "<option value='974' selected='selected' >974</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='974' >974</option>";
                                              }

                                              if($company_department == "975")
                                              {
                                              echo "<option value='975' selected='selected' >975</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='975' >975</option>";
                                              }

                                              if($company_department == "976")
                                              {
                                              echo "<option value='976' selected='selected' >976</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='976' >976</option>";
                                              }

                                              if($company_department == "977")
                                              {
                                              echo "<option value='977' selected='selected' >977</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='977' >977</option>";
                                              }

                                              if($company_department == "978")
                                              {
                                              echo "<option value='978' selected='selected' >978</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='978' >978</option>";
                                              }

                                              if($company_department == "984")
                                              {
                                              echo "<option value='984' selected='selected' >984</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='984' >984</option>";
                                              }

                                              if($company_department == "986")
                                              {
                                              echo "<option value='986' selected='selected' >986</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='986' >986</option>";
                                              }

                                              if($company_department == "987")
                                              {
                                              echo "<option value='987' selected='selected' >987</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='987' >987</option>";
                                              }

                                              if($company_department == "989")
                                              {
                                              echo "<option value='989' selected='selected' >989</option>";
                                              }
                                              else
                                              {
                                                echo "<option value='989' >989</option>";
                                              }

                                              ?>
                                      </select>
                                    </div>
                                    <div class="form-group" id="con_cantons" @if ($address_paid2 =="Switzerland") style="display: block;" @else style="display:none;" @endif>
                                       <label class="fName">Cantons *</label>
                                       <select class="form-control form-control-lg" id="companyState"  name="companyState" > 
                                                <option></option>
                                                  <?php
                                                  if($company_state  == "AG")
                                                  {
                                                  echo "<option value='AG' selected='selected' >AG</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='AG' >AG</option>";
                                                  }

                                                  if($company_state == "AI")
                                                  {
                                                  echo "<option value='AI' selected='selected' >AI</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='AI' >AI</option>";
                                                  }
                                                  if($company_state == "AR")
                                                  {
                                                  echo "<option value='AR' selected='selected' >AR</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='AR' >AR</option>";
                                                  }
                                                  if($company_state == "BE")
                                                  {
                                                  echo "<option value='BE' selected='selected' >BE</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='BE' >BE</option>";
                                                  }
                                                  if($company_state == "BL")
                                                  {
                                                  echo "<option value='BL' selected='selected' >BL</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='BL' >BL</option>";
                                                  }
                                                  if($company_state == "BS")
                                                  {
                                                  echo "<option value='BS' selected='selected' >BS</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='BS' >BS</option>";
                                                  }
                                                  if($company_state == "CH")
                                                  {
                                                  echo "<option value='CH' selected='selected' >CH</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='CH' >CH</option>";
                                                  }
                                                  if($company_state == "FR")
                                                  {
                                                  echo "<option value='FR' selected='selected' >FR</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='FR' >FR</option>";
                                                  }
                                                  if($company_state == "GE")
                                                  {
                                                  echo "<option value='GE' selected='selected' >GE</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='GE' >GE</option>";
                                                  }
                                                  if($company_state == "GL")
                                                  {
                                                  echo "<option value='GL' selected='selected' >GL</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='GL' >GL</option>";
                                                  }
                                                  if($company_state == "GR")
                                                  {
                                                  echo "<option value='GR' selected='selected' >GR</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='GR' >GR</option>";
                                                  }
                                                  if($company_state == "JU")
                                                  {
                                                  echo "<option value='JU' selected='selected' >JU</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='JU' >JU</option>";
                                                  }
                                                  if($company_state == "LU")
                                                  {
                                                  echo "<option value='LU' selected='selected' >LU</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='LU' >LU</option>";
                                                  }
                                                  if($company_state == "NE")
                                                  {
                                                  echo "<option value='NE' selected='selected' >NE</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='NE' >NE</option>";
                                                  }
                                                  if($company_state == "NW")
                                                  {
                                                  echo "<option value='NW' selected='selected' >NW</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='NW' >NW</option>";
                                                  }
                                                  if($company_state == "OW")
                                                  {
                                                  echo "<option value='OW' selected='selected' >OW</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='OW' >OW</option>";
                                                  }
                                                  if($company_state == "SG")
                                                  {
                                                  echo "<option value='SG' selected='selected' >SG</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='SG' >SG</option>";
                                                  }
                                                  if($company_state == "SH")
                                                  {
                                                  echo "<option value='SH' selected='selected' >SH</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='SH' >SH</option>";
                                                  }
                                                  if($company_state == "SO")
                                                  {
                                                  echo "<option value='SO' selected='selected' >SO</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='SO' >SO</option>";
                                                  }
                                                  if($company_state == "SZ")
                                                  {
                                                  echo "<option value='SZ' selected='selected' >SZ</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='SZ' >SZ</option>";
                                                  }
                                                  if($company_state == "TG")
                                                  {
                                                  echo "<option value='TG' selected='selected' >TG</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='TG' >TG</option>";
                                                  }

                                                  if($company_state == "TI")
                                                  {
                                                  echo "<option value='TI' selected='selected' >TI</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='TI' >TI</option>";
                                                  }
                                                  if($company_state == "UR")
                                                  {
                                                  echo "<option value='UR' selected='selected' >UR</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='UR' >UR</option>";
                                                  }
                                                  if($company_state == "VD")
                                                  {
                                                  echo "<option value='VD' selected='selected' >VD</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='VD' >VD</option>";
                                                  }

                                                  if($company_state == "VS")
                                                  {
                                                  echo "<option value='VS' selected='selected' >VS</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='VS' >VS</option>";
                                                  }
                                                  if($company_state == "ZG")
                                                  {
                                                  echo "<option value='ZG' selected='selected' >ZG</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='ZG' >ZG</option>";
                                                  }
                                                  if($company_state == "ZH")
                                                  {
                                                  echo "<option value='ZH' selected='selected' >ZH</option>";
                                                  }
                                                  else
                                                  {
                                                    echo "<option value='ZH' >ZH</option>";
                                                  }


                                                  ?>
                                          </select>
                                        <div id="filter_result"></div>
                                   </div>
                                   <div class="form-group">
                                    <label class="fName">E-mail entreprise/organisation  </label>
                                    <input type="email" class="form-control form-control-lg" id="sameEmail" name="sameEmail" value="{{ $email2 }}" placeholder="Entrez votre e-mail">
                                </div> 
                                <div class="form-group">
                                    <label class="fName">Téléphone entreprise/organisation</label>
                                    <input type="tel" class="form-control form-control-lg" id="samePhone" name="samePhone" value="{{ $phone2 }}" placeholder="Entrez votre téléphone" required="">
                                </div>
                                <div class="form-group">
                                    <label class="fName">Site internet ou page (ex. Facebook, LinkedIn) de l'entreprise/organisation</label>
                                    <div class="row">
                                        <div class="col-sm-3 nopadding">
                                            <select name="http2" id="http" class="form-control form-control-lg">
                                                <option value="https://" <?php if ($http2 == 'https://') {?> selected <?php }?>>https://</option>
                                                <option value="http://" <?php if ($http2 == 'http://') {?> selected <?php }?>>http://</option>
                                            </select>
                                        </div>
                                
                                        <div class="col-sm-9 nopadding">
                                            <input type="text" class="form-control form-control-lg" id="linkd2" name="linkd2" value="{{ $link2 }}" placeholder="Votre site Internet ou page Facebook" >
                                        </div> 
                                    </div>
                                </div> 

                      </div>  
                      <!------------------------------------------>
                      <!---------------------third Part----------------------->
                      <div class="paid_function_div" style="display:none">
                          <div class="form-group">
                                <h3 style="padding-top: 6px;">Adresse de facturation</h3>
                                <input type="checkbox" id="sameConfirmNew" name="sameConfirmNew" <?php if($sameConfirmNew == ''||$sameConfirmNew=='no'){ ?>  <?php } else{?> checked="checked" <?php } ?>>
                                <strong style="color:#000;">Adresse identifque à l'offre d'emploi</strong> &nbsp;&nbsp;
                                <input type="checkbox" id="diffValNew" name="diffValNew" <?php if($sameConfirmNew == ''||$sameConfirmNew=='no'){ echo "checked='checked'";} else{ } ?>> 
                                  <b style="color:#000;">Adresse différente de l'offre d'emploi</b>
                          </div>
                          <div id="disableDivNew">
                              <div class="form-group">
                                      
                                      <label class="fName">Nom de l'entreprise ou organisation*</label>
                                      <input type="text" class="form-control form-control-lg" id="newSameCompany" name="newSameCompany" placeholder="Ex. Grande Pharmacie" value="{{ $new_company_detail }}" >                      
                              </div>
                              <div class="form-group">
                                                            <!---for country drop down --->
                                    <label class="fName">Pays *</label>
                                    <?php //echo $address_paid2; ?>
                                    <select class="form-control form-control-lg" id="newCountry"  name="newCountry"  >
                                    @foreach ($con as $conList)
                                          <option value="{{$conList->name}}"@if($conList->name==$new_company_address_paid) selected="selected" @endif> {{$conList->dname}}</option>
                                      @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label class="fName">Adresse *</label>
                                    <input type="text" class="form-control form-control-lg" id="newSameAddress" name="newSameAddress" placeholder="Ex. Grande Pharmacie" value="{{$new_company_address}}" >
                              </div>
                              <div class="form-group">
                                    <label class="fName">Code postal *</label>
                                    <input type="text" class="form-control form-control-lg" id="newSamePincode" name="newSamePincode" placeholder="Ex. 75001" value="{{$new_company_pincode}}" >
                              </div>
                              <div class="form-group">
                                    <label class="fName">Ville *</label>
                                    <input type="text" class="form-control form-control-lg" id="newSameCity" name="newSameCity" placeholder="Ex. Lausanne" value="{{$new_company_city}}">
                              </div>  
                              <div class="form-group" id="new_department_div" @if ($new_company_address_paid =="France" ||$new_company_address_paid=="") style="display: block;" @else style="display:none;" @endif>
                                  <label class="fName">Département (ex. 01) *</label> 
                                  
                                  <select class="form-control form-control-lg" id="newSameDepartment" name="newSameDepartment" onkeyup="hello(this.value);" tabindex="-1">
                                      <option data-select2-id="4"></option>
                                      <?php

                                        if($new_company_department == "01")
                                        {
                                        echo "<option value='01' selected='selected' >01</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='01' >01</option>";
                                        }

                                        if($new_company_department == "02")
                                        {
                                        echo "<option value='02' selected='selected' >02</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='02' >02</option>";
                                        }

                                        if($new_company_department == "03")
                                        {
                                        echo "<option value='03' selected='selected' >03</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='03' >03</option>";
                                        }

                                        if($new_company_department == "04")
                                        {
                                        echo "<option value='04' selected='selected' >04</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='04' >04</option>";
                                        }

                                        if($new_company_department == "05")
                                        {
                                        echo "<option value='05' selected='selected' >05</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='05' >05</option>";
                                        }

                                        if($new_company_department == "06")
                                        {
                                        echo "<option value='06' selected='selected' >06</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='06' >06</option>";
                                        }

                                        if($new_company_department == "07")
                                        {
                                        echo "<option value='07' selected='selected' >07</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='07' >07</option>";
                                        }

                                        if($new_company_department == "08")
                                        {
                                        echo "<option value='08' selected='selected' >08</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='08' >08</option>";
                                        }

                                        if($new_company_department == "09")
                                        {
                                        echo "<option value='09' selected='selected' >09</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='09' >09</option>";
                                        }

                                        if($new_company_department == "10")
                                        {
                                        echo "<option value='10' selected='selected' >10</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='10' >10</option>";
                                        }

                                                                      if($new_company_department == "11")
                                        {
                                        echo "<option value='11' selected='selected' >11</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='11' >11</option>";
                                        }

                                        if($new_company_department == "12")
                                        {
                                        echo "<option value='12' selected='selected' >12</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='12' >12</option>";
                                        }

                                        if($new_company_department == "13")
                                        {
                                        echo "<option value='13' selected='selected' >13</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='13' >13</option>";
                                        }

                                        if($new_company_department == "14")
                                        {
                                        echo "<option value='14' selected='selected' >14</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='14' >14</option>";
                                        }

                                        if($new_company_department == "15")
                                        {
                                        echo "<option value='15' selected='selected' >15</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='15' >15</option>";
                                        }

                                        if($new_company_department == "16")
                                        {
                                        echo "<option value='16' selected='selected' >16</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='16' >16</option>";
                                        }

                                        if($new_company_department == "17")
                                        {
                                        echo "<option value='17' selected='selected' >17</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='17' >17</option>";
                                        }

                                        if($new_company_department == "18")
                                        {
                                        echo "<option value='18' selected='selected' >18</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='18' >18</option>";
                                        }

                                        if($new_company_department == "19")
                                        {
                                        echo "<option value='19' selected='selected' >19</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='19' >19</option>";
                                        }

                                        /*if($new_company_department == "20")
                                        {
                                        echo "<option value='20' selected='selected' >20</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='20' >20</option>";
                                        }*/

                                        if($new_company_department == "2A")
                                        {
                                        echo "<option value='2A' selected='selected' >2A</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='2A' >2A</option>";
                                        }

                                        if($new_company_department == "2B")
                                        {
                                        echo "<option value='2B' selected='selected' >2B</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='2B' >2B</option>";
                                        }

                                        if($new_company_department == "21")
                                        {
                                        echo "<option value='21' selected='selected' >21</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='21' >21</option>";
                                        }

                                        if($new_company_department == "22")
                                        {
                                        echo "<option value='22' selected='selected' >22</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='22' >22</option>";
                                        }

                                        if($new_company_department == "23")
                                        {
                                        echo "<option value='23' selected='selected' >23</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='23' >23</option>";
                                        }

                                        if($new_company_department == "24")
                                        {
                                        echo "<option value='24' selected='selected' >24</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='24' >24</option>";
                                        }

                                        if($new_company_department == "25")
                                        {
                                        echo "<option value='25' selected='selected' >25</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='25' >25</option>";
                                        }

                                        if($new_company_department == "26")
                                        {
                                        echo "<option value='26' selected='selected' >26</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='26' >26</option>";
                                        }

                                        if($new_company_department == "27")
                                        {
                                        echo "<option value='27' selected='selected' >27</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='27' >27</option>";
                                        }

                                        if($new_company_department == "28")
                                        {
                                        echo "<option value='28' selected='selected' >28</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='28' >28</option>";
                                        }

                                        if($new_company_department == "29")
                                        {
                                        echo "<option value='29' selected='selected' >29</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='29' >29</option>";
                                        }

                                        if($new_company_department == "30")
                                        {
                                        echo "<option value='30' selected='selected' >30</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='30' >30</option>";
                                        }

                                        if($new_company_department == "31")
                                        {
                                        echo "<option value='31' selected='selected' >31</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='31' >31</option>";
                                        }

                                        if($new_company_department == "32")
                                        {
                                        echo "<option value='32' selected='selected' >32</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='32' >32</option>";
                                        }

                                        if($new_company_department == "33")
                                        {
                                        echo "<option value='33' selected='selected' >33</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='33' >33</option>";
                                        }

                                        if($new_company_department == "34")
                                        {
                                        echo "<option value='34' selected='selected' >34</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='34' >34</option>";
                                        }

                                        if($new_company_department == "35")
                                        {
                                        echo "<option value='35' selected='selected' >35</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='35' >35</option>";
                                        }

                                        if($new_company_department == "36")
                                        {
                                        echo "<option value='36' selected='selected' >36</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='36' >36</option>";
                                        }

                                        if($new_company_department == "37")
                                        {
                                        echo "<option value='37' selected='selected' >37</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='37' >37</option>";
                                        }

                                        if($new_company_department == "38")
                                        {
                                        echo "<option value='38' selected='selected' >38</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='38' >38</option>";
                                        }

                                        if($new_company_department == "39")
                                        {
                                        echo "<option value='39' selected='selected' >39</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='39' >39</option>";
                                        }

                                        if($new_company_department == "40")
                                        {
                                        echo "<option value='40' selected='selected' >40</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='40' >40</option>";
                                        }

                                        if($new_company_department == "41")
                                        {
                                        echo "<option value='41' selected='selected' >41</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='41' >41</option>";
                                        }

                                        if($new_company_department == "42")
                                        {
                                        echo "<option value='42' selected='selected' >42</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='42' >42</option>";
                                        }

                                        if($new_company_department == "43")
                                        {
                                        echo "<option value='43' selected='selected' >43</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='43' >43</option>";
                                        }

                                        if($new_company_department == "44")
                                        {
                                        echo "<option value='44' selected='selected' >44</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='44' >44</option>";
                                        }

                                        if($new_company_department == "45")
                                        {
                                        echo "<option value='45' selected='selected' >45</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='45' >45</option>";
                                        }

                                        if($new_company_department == "46")
                                        {
                                        echo "<option value='46' selected='selected' >46</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='46' >46</option>";
                                        }

                                        if($new_company_department == "47")
                                        {
                                        echo "<option value='47' selected='selected' >47</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='47' >47</option>";
                                        }

                                        if($new_company_department == "48")
                                        {
                                        echo "<option value='48' selected='selected' >48</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='48' >48</option>";
                                        }

                                        if($new_company_department == "49")
                                        {
                                        echo "<option value='49' selected='selected' >49</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='49' >49</option>";
                                        }

                                        if($new_company_department == "50")
                                        {
                                        echo "<option value='50' selected='selected' >50</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='50' >50</option>";
                                        }

                                        if($new_company_department == "51")
                                        {
                                        echo "<option value='51' selected='selected' >51</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='51' >51</option>";
                                        }

                                        if($new_company_department == "52")
                                        {
                                        echo "<option value='52' selected='selected' >52</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='52' >52</option>";
                                        }

                                        if($new_company_department == "53")
                                        {
                                        echo "<option value='53' selected='selected' >53</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='53' >53</option>";
                                        }

                                        if($new_company_department == "54")
                                        {
                                        echo "<option value='54' selected='selected' >54</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='54' >54</option>";
                                        }

                                        if($new_company_department == "55")
                                        {
                                        echo "<option value='55' selected='selected' >55</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='55' >55</option>";
                                        }

                                        if($new_company_department == "56")
                                        {
                                        echo "<option value='56' selected='selected' >56</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='56' >56</option>";
                                        }

                                        if($new_company_department == "57")
                                        {
                                        echo "<option value='57' selected='selected' >57</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='57' >57</option>";
                                        }

                                        if($new_company_department == "58")
                                        {
                                        echo "<option value='58' selected='selected' >58</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='58' >58</option>";
                                        }

                                        if($new_company_department == "59")
                                        {
                                        echo "<option value='59' selected='selected' >59</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='59' >59</option>";
                                        }

                                        if($new_company_department == "60")
                                        {
                                        echo "<option value='60' selected='selected' >60</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='60' >60</option>";
                                        }

                                        if($new_company_department == "61")
                                        {
                                        echo "<option value='61' selected='selected' >61</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='61' >61</option>";
                                        }

                                        if($new_company_department == "62")
                                        {
                                        echo "<option value='62' selected='selected' >62</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='62' >62</option>";
                                        }

                                        if($new_company_department == "63")
                                        {
                                        echo "<option value='63' selected='selected' >63</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='63' >63</option>";
                                        }

                                        if($new_company_department == "64")
                                        {
                                        echo "<option value='64' selected='selected' >64</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='64' >64</option>";
                                        }

                                        if($new_company_department == "65")
                                        {
                                        echo "<option value='65' selected='selected' >65</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='65' >65</option>";
                                        }

                                        if($new_company_department == "66")
                                        {
                                        echo "<option value='66' selected='selected' >66</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='66' >66</option>";
                                        }

                                        if($new_company_department == "67")
                                        {
                                        echo "<option value='67' selected='selected' >67</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='67' >67</option>";
                                        }

                                        if($new_company_department == "68")
                                        {
                                        echo "<option value='68' selected='selected' >68</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='68' >68</option>";
                                        }

                                        if($new_company_department == "69")
                                        {
                                        echo "<option value='69' selected='selected' >69</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='69' >69</option>";
                                        }

                                        if($new_company_department == "70")
                                        {
                                        echo "<option value='70' selected='selected' >70</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='70' >70</option>";
                                        }

                                        if($new_company_department == "71")
                                        {
                                        echo "<option value='71' selected='selected' >71</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='71' >71</option>";
                                        }

                                        if($new_company_department == "72")
                                        {
                                        echo "<option value='72' selected='selected' >72</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='72' >72</option>";
                                        }

                                        if($new_company_department == "73")
                                        {
                                        echo "<option value='73' selected='selected' >73</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='73' >73</option>";
                                        }

                                        if($new_company_department == "74")
                                        {
                                        echo "<option value='74' selected='selected' >74</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='74' >74</option>";
                                        }

                                        if($new_company_department == "75")
                                        {
                                        echo "<option value='75' selected='selected' >75</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='75' >75</option>";
                                        }

                                        if($new_company_department == "76")
                                        {
                                        echo "<option value='76' selected='selected' >76</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='76' >76</option>";
                                        }

                                        if($new_company_department == "77")
                                        {
                                        echo "<option value='77' selected='selected' >77</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='77' >77</option>";
                                        }

                                        if($new_company_department == "78")
                                        {
                                        echo "<option value='78' selected='selected' >78</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='78' >78</option>";
                                        }

                                        if($new_company_department == "79")
                                        {
                                        echo "<option value='79' selected='selected' >79</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='79' >79</option>";
                                        }

                                        if($new_company_department == "80")
                                        {
                                        echo "<option value='80' selected='selected' >80</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='80' >80</option>";
                                        }

                                        if($new_company_department == "81")
                                        {
                                        echo "<option value='81' selected='selected' >81</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='81' >81</option>";
                                        }

                                        if($new_company_department == "82")
                                        {
                                        echo "<option value='82' selected='selected' >82</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='82' >82</option>";
                                        }

                                        if($new_company_department == "83")
                                        {
                                        echo "<option value='83' selected='selected' >83</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='83' >83</option>";
                                        }

                                        if($new_company_department == "84")
                                        {
                                        echo "<option value='84' selected='selected' >84</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='84' >84</option>";
                                        }

                                        if($new_company_department == "85")
                                        {
                                        echo "<option value='85' selected='selected' >85</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='85' >85</option>";
                                        }

                                        if($new_company_department == "86")
                                        {
                                        echo "<option value='86' selected='selected' >86</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='86' >86</option>";
                                        }

                                        if($new_company_department == "87")
                                        {
                                        echo "<option value='87' selected='selected' >87</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='87' >87</option>";
                                        }

                                        if($new_company_department == "88")
                                        {
                                        echo "<option value='88' selected='selected' >88</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='88' >88</option>";
                                        }

                                        if($new_company_department == "89")
                                        {
                                        echo "<option value='89' selected='selected' >89</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='89' >89</option>";
                                        }

                                        if($new_company_department == "90")
                                        {
                                        echo "<option value='90' selected='selected' >90</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='90' >90</option>";
                                        }

                                        if($new_company_department == "91")
                                        {
                                        echo "<option value='91' selected='selected' >91</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='91' >91</option>";
                                        }

                                        if($new_company_department == "92")
                                        {
                                        echo "<option value='92' selected='selected' >92</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='92' >92</option>";
                                        }

                                        if($new_company_department == "93")
                                        {
                                        echo "<option value='93' selected='selected' >93</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='93' >93</option>";
                                        }

                                        if($new_company_department == "94")
                                        {
                                        echo "<option value='94' selected='selected' >94</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='94' >94</option>";
                                        }

                                        if($new_company_department == "95")
                                        {
                                        echo "<option value='95' selected='selected' >95</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='95' >95</option>";
                                        }

                                        if($new_company_department == "98")
                                        {
                                        echo "<option value='98' selected='selected' >98</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='98' >98</option>";
                                        }

                                                                      if($new_company_department == "971")
                                        {
                                        echo "<option value='971' selected='selected' >971</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='971' >971</option>";
                                        }

                                        if($new_company_department == "972")
                                        {
                                        echo "<option value='972' selected='selected' >972</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='972' >972</option>";
                                        }

                                        if($new_company_department == "973")
                                        {
                                        echo "<option value='973' selected='selected' >973</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='973' >973</option>";
                                        }

                                        if($new_company_department == "974")
                                        {
                                        echo "<option value='974' selected='selected' >974</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='974' >974</option>";
                                        }

                                        if($new_company_department == "975")
                                        {
                                        echo "<option value='975' selected='selected' >975</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='975' >975</option>";
                                        }

                                        if($new_company_department == "976")
                                        {
                                        echo "<option value='976' selected='selected' >976</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='976' >976</option>";
                                        }

                                        if($new_company_department == "977")
                                        {
                                        echo "<option value='977' selected='selected' >977</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='977' >977</option>";
                                        }

                                        if($new_company_department == "978")
                                        {
                                        echo "<option value='978' selected='selected' >978</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='978' >978</option>";
                                        }

                                        if($new_company_department == "984")
                                        {
                                        echo "<option value='984' selected='selected' >984</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='984' >984</option>";
                                        }

                                        if($new_company_department == "986")
                                        {
                                        echo "<option value='986' selected='selected' >986</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='986' >986</option>";
                                        }

                                        if($new_company_department == "987")
                                        {
                                        echo "<option value='987' selected='selected' >987</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='987' >987</option>";
                                        }

                                        if($new_company_department == "988")
                                        {
                                        echo "<option value='988' selected='selected' >988</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='988' >988</option>";
                                        }

                                        if($new_company_department == "989")
                                        {
                                        echo "<option value='989' selected='selected' >989</option>";
                                        }
                                        else
                                        {
                                          echo "<option value='989' >989</option>";
                                        }

                                      ?>
                                  </select>  
                                
                              </div>
                              <div class="form-group" id="new_cantons" @if ($new_company_address_paid =="Switzerland") style="display: block;" @else style="display:none;" @endif>
                                  <label class="fName">Cantons *</label>
                                  <select class="form-control form-control-lg" id="newState" name="newState" onkeyup="hello(this.value);">
                                    <option data-select2-id="2"></option>
                                    <?php
                                      if($new_company_state  == "AG")
                                      {
                                      echo "<option value='AG' selected='selected' >AG</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='AG' >AG</option>";
                                      }
                                      
                                      if($new_company_state == "AI")
                                      {
                                      echo "<option value='AI' selected='selected' >AI</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='AI' >AI</option>";
                                      }
                                      if($new_company_state == "AR")
                                      {
                                      echo "<option value='AR' selected='selected' >AR</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='AR' >AR</option>";
                                      }
                                      if($new_company_state == "BE")
                                      {
                                      echo "<option value='BE' selected='selected' >BE</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='BE' >BE</option>";
                                      }
                                      if($new_company_state == "BL")
                                      {
                                      echo "<option value='BL' selected='selected' >BL</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='BL' >BL</option>";
                                      }
                                      if($new_company_state == "BS")
                                      {
                                      echo "<option value='BS' selected='selected' >BS</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='BS' >BS</option>";
                                      }
                                      if($new_company_state == "CH")
                                      {
                                      echo "<option value='CH' selected='selected' >CH</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='CH' >CH</option>";
                                      }
                                      if($new_company_state == "FR")
                                      {
                                      echo "<option value='FR' selected='selected' >FR</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='FR' >FR</option>";
                                      }
                                      if($new_company_state == "GE")
                                      {
                                      echo "<option value='GE' selected='selected' >GE</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='GE' >GE</option>";
                                      }
                                      if($new_company_state == "GL")
                                      {
                                      echo "<option value='GL' selected='selected' >GL</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='GL' >GL</option>";
                                      }
                                      if($new_company_state == "GR")
                                      {
                                      echo "<option value='GR' selected='selected' >GR</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='GR' >GR</option>";
                                      }
                                      if($new_company_state == "JU")
                                      {
                                      echo "<option value='JU' selected='selected' >JU</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='JU' >JU</option>";
                                      }
                                      if($new_company_state == "LU")
                                      {
                                      echo "<option value='LU' selected='selected' >LU</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='LU' >LU</option>";
                                      }
                                      if($new_company_state == "NE")
                                      {
                                      echo "<option value='NE' selected='selected' >NE</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='NE' >NE</option>";
                                      }
                                      if($new_company_state == "NW")
                                      {
                                      echo "<option value='NW' selected='selected' >NW</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='NW' >NW</option>";
                                      }
                                      if($new_company_state == "OW")
                                      {
                                      echo "<option value='OW' selected='selected' >OW</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='OW' >OW</option>";
                                      }
                                      if($new_company_state == "SG")
                                      {
                                      echo "<option value='SG' selected='selected' >SG</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='SG' >SG</option>";
                                      }
                                      if($new_company_state == "SH")
                                      {
                                      echo "<option value='SH' selected='selected' >SH</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='SH' >SH</option>";
                                      }
                                      if($new_company_state == "SO")
                                      {
                                      echo "<option value='SO' selected='selected' >SO</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='SO' >SO</option>";
                                      }
                                      if($new_company_state == "SZ")
                                      {
                                      echo "<option value='SZ' selected='selected' >SZ</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='SZ' >SZ</option>";
                                      }
                                      if($new_company_state == "TG")
                                      {
                                      echo "<option value='TG' selected='selected' >TG</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='TG' >TG</option>";
                                      }
                                      
                                      if($new_company_state == "TI")
                                      {
                                      echo "<option value='TI' selected='selected' >TI</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='TI' >TI</option>";
                                      }
                                      if($new_company_state == "UR")
                                      {
                                      echo "<option value='UR' selected='selected' >UR</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='UR' >UR</option>";
                                      }
                                      if($new_company_state == "VD")
                                      {
                                      echo "<option value='VD' selected='selected' >VD</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='VD' >VD</option>";
                                      }
                                      
                                      if($new_company_state == "VS")
                                      {
                                      echo "<option value='VS' selected='selected' >VS</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='VS' >VS</option>";
                                      }
                                      if($new_company_state == "ZG")
                                      {
                                      echo "<option value='ZG' selected='selected' >ZG</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='ZG' >ZG</option>";
                                      }
                                      if($new_company_state == "ZH")
                                      {
                                      echo "<option value='ZH' selected='selected' >ZH</option>";
                                      }
                                      else
                                      {
                                        echo "<option value='ZH' >ZH</option>";
                                      }
                                      
                                      
                                    ?>
                                  </select>
                                  
                                  <div id="filter_result"></div>
                              </div> 
                              <div class="form-group">
                                    <label class="fName">Complément (ex. nom, département) *</label>
                                    <input type="text" class="form-control form-control-lg" id="newComplement" name="newComplement" value="{{$new_complement}}"  placeholder="Ex. comptabilité">
                              </div>
                          </div>
                       </div>   
                        <!---------------------------end-third----------------->
                        
                        <div class="form-group">
                          <input type="checkbox" onchange="entrepriseChange('val')" id="show_linkd" name="show_linkd" value="show_linkd" 
                          @if(isset($jobdata))
                            @if ($jobdata->show_linkd == 'show_linkd') checked @endif @endif>
                            Cacher le site internet ou autre url
                        </div>
                      </div>
                    <div class="detSection jobdataSec <?php if($job_desc_type == 2 || $job_desc_type == "") { echo "secWidth";} ?> " <?php if($job_desc_type != 2 || $job_desc_type != "") { ?> style="display: none;" <?php }?>>
                      <div class="jobDescription"> Votre offre d'emploi</div>
                      <div class="cityClass"> {{ $city }} @if(!empty($state)) ({{ $state }}) @endif</div>
                      <div class="companyClass">@if(!empty($company)) La {{ $company }} recherche un/e @endif</div>
                      <div class="titleClass">{{ $title }} {{ ' ' }} {{ $tcontrat }}</div>
                      <div class="complimentClass">{{$jobdataCompliment}}</div>
                      <div class="travailClass">@if(!empty($travail))Temps de travail : {{$travail}} @endif</div>
                      <div class="complimenttravailClass">{{$complimenttravail}}</div>
                      <div class="descClass">{!! $desc3 !!}</div>
                      <!--    <div class="offer_contract_startDateClass">@if(!empty($offerdate))Date d’entrée en fonction : {{ $offerdate }} @endif</div> -->
                    <div class="dateClass">@if(!empty($offerdate) && $show_date != 'show_date') Date d’entrée en fonction : {{ $offerdate }} @endif</div>
                      <!-- <div class="emailClass">@if(!empty($email)) E-mail de contact : {{ $email }} @endif</div>
                      <div class="phoneClass">@if(!empty($phone)) Téléphone de contact : {{ $phone }} @endif</div> -->

                      <div class="emailClass">@if(!empty($email) && $show_email != 'show_email') E-mail de contact : {{ $email }} @endif</div>

                      <div class="phoneClass">@if(!empty($phone) && $show_phone != 'show_phone') Téléphone de contact : {{ $phone }} @endif</div>

                        @if(!empty($jobdataImg))
                          <img src="{{ asset('desc_image/'.$jobdataImg) }}" id="selectedImage">
                        @else
                          <img src="#" style="display:none" class="selectedImage">
                        @endif

                    </div>
                    </section>
                    <div>
                      <button type="submit" value="step_2" name="btn_step" id="btn_step" class="btn btn-green"
                        style="width:22% !important;">SAUVEGARDER</button>
                    </div>
                  </form>
                  <div class="form-group text-right">
                  </div>
                  <div class="form-group text-left">
                    *{{ __('message.mandatory_fields') }}
                  </div>
                </div>
                <div class="step" id="step-3">
                  <?php if (Session::get('step') == '3') {?>
                  @include('layouts.flash-message')
                  <?php }?>
                  <form class="feildForm" runat="server" action="{{ url($url) }}" name="frmmultistep4"
                    id="frmmultistep4" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="s4_interviewid" name="s4_interviewid" value="{{ $interviewid }}">
                    <div class="detSection2">
                      <h3 style="padding-top: 6px;">{{ __('message.job_ads_preview') }}<span><img
                            src="{{ asset('assets/eyes.png') }}"
                            style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>
                      <div class="contentHead" itemscope itemtype="http://schema.org/JobPosting">

                        <?php
                        if (isset($jobdata)) {
                          $p = substr($jobdata->created_at,'0','10');
                          $d = explode("-",$p);
                          $offerPublished = $d[2].'.'.$d[1].'.'.$d[0];

                          $p1 = substr($jobdata->offerdate,'0','10');
                          $d1 = explode("-",$p1);

                          $dt = $jobdata->created_at;
                          $mydt = date( "Y-m-d", strtotime( "$dt +35 day" ) );
                          $ds = explode("-",$mydt);
                          if($jobdata->offerdate != "" && $jobdata->offerdate != "non précisée")  { $offerdateJob =  $jobdata->offerdate; } else { $offerdateJob =  "non précisée" ; }
                          if($jobdata->entreprise1 == "Agence (intérim, recrutement, chasseur de tête)") { $jobViaAgency = "Via agence";}else{
                            $jobViaAgency = "";
                          }
                          $jobid = $jobdata->job_id ;
                          $hosted = $jobdata->hosted;
                          
                        } else {
                          $offerPublished = date('Y-m-d');
                          $mydt = "non précisée" ;
                          $offerdateJob = "non précisée" ;
                          $jobViaAgency = "";
                          $jobid = "non précisée" ;
                          $hosted = "Non";
                        }
                        ?>
                        <h1 class="d-none" itemprop="title"><?php echo $title; ?></h1>
                        <div class="d-none" itemprop="datePosted">{{$offerPublished}}</div>
                        <div class="d-none" itemprop="validThrough"><?php echo $mydt; ?></div>
                        <div class="d-none" itemprop="hiringOrganization" itemscope itemtype="http://schema.org/Organization">
                          <span itemprop="name"><?php echo $company; ?></span>
                        </div>
                        <?php if($job_desc_type == 1) { ?>
                        <div class="d-none" itemprop="description"><iframe src="<?php echo 'https://www.pharmapro.fr/resume/'.$desc; ?>"
                            name="page"></iframe></div>
                        <?php } ?>
                        <?php if($job_desc_type == 2 || $job_desc_type == "") { ?>
                        <div class="d-none descClass" itemprop="description">{!! $desc3 !!}</div>
                        <?php } ?>
                        <?php if($job_desc_type == 3) { ?>
                        <div class="d-none" itemprop="description"><iframe src="<?php echo $desc; ?>" name="page"></iframe>
                        </div>
                        <?php } ?>
                        <div class="d-none GoogleMapAddress " itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                          <div class="responsableTitle" itemprop="name"><?php echo  $company; ?></div>
                          <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <div itemprop="streetAddress"><?php echo $address ?></div>
                            <div><span itemprop="postalCode"><?php echo $pincode ?></span> <span
                                itemprop="addressLocality"><?php echo $city ?></span></div>
                            <div itemprop="telephone"><?php echo $phone ?></div>
                            <div><a href="" target="_blank"></a></div>
                          </div>
                        </div>
                        <span class="spcls"><img src="{{ asset('public/assets/calendar.png') }}"
                            style="float: left;margin: 2px 5px 0px 0px;"> <span style="float:left;margin-right: 5px;">Offre publiée :
                            {{ $offerPublished }}</span>
                          <?php if(isset($urgent) && $urgent == 'Oui'){ ?>
                          <font style="border: 1px solid red;color: red;padding: 6px;vertical-align:top;" class="cls_urgent">URGENT
                          </font>
                          <?php } ?>
                        </span>
                        <span class="spcls5"> <!-- Entrée en fonction : {{ $offerdateJob }} -->
                           <?php
                          if(isset($jobdata)){
                            if($jobdata->show_date == "show_date" && !empty($offerdate))
                            {?>
                              Entrée en fonction : non précisée 
                            <?php } }?>
                            <?php if(isset($jobdata)){if($jobdata->show_date != "show_date" && !empty($offerdate)){?>
                              Entrée en fonction : {{$offerdate}}
                            <?php } } ?> 
                            <?php if(isset($jobdata)){ if(empty($offerdate)){
                              ?>
                                 Entrée en fonction : non précisée 
                              <?php }} ?>
                        </span>
                        <span class="spcls2"><img src="{{ asset('assets/images/document.png') }}"
                            style="float: left;margin: 2px 5px 0px 0px;">{{ $tcontrat }} </span>
                        <span class="spcls3"><img src="{{ asset('public/assets/hourglass.png') }}"
                            style="float: left;margin: 2px 5px 0px 0px;"><?php echo $travail ?> </span>
                        <?php if($entreprise1 == "Agence (intérim, recrutement, chasseur de tête)") { ?>
                        <span class="spcls1"><?php echo "Via agence" ?></span><?php } ?><span class="spcls4"> N° offre : {{ $jobid }}</span>
                      </div>
                      <div class="contentBodyC" aria-labelledby="tab_item-0"
                        style="display:block; padding-top: 10px !important; padding-bottom: 20px !important;">
                        <div>
                          <div class="form-group">
                            <?php
                            if(isset($company_logo) && !empty($company_logo)){
                            ?>
                            <img id="blah" src="{{ asset('logo/'.$company_logo) }}" class="img-responsive auto-logo" alt=""
                              style="width:280px;margin-top: 10px;">
                            <?php } ?>
                          </div>
                          <div class="form-group">
                            <?php if($job_desc_type == 1) { ?>
                            <p style="padding-bottom:0px;"><iframe
                                src="<?php echo 'https://www.pharmapro.fr/resume/'.$jobdata->job_desc; ?>" width="100%"
                                height="650px;" name="page"></iframe></p>
                            <?php } ?>
                            <?php if($job_desc_type == 2 || $job_desc_type == "") { ?>
                            <p><strong class="cityClass">{{ $city }} 
                              @if($state != null)
                            ({{ $state }}) @endif- 
                            @if($address_paid == 'Switzerland') Suisse @elseif($address_paid == 'Belgium') Belgique @else 
                            {{$address}} @endif</strong></p>
                            <div class="companyClass">@if(!empty($company)) La {{ $company }} recherche un/e @endif</div>
                            <div class="titleClass">{{ $title }} {{ ' ' }} {{ $tcontrat }} @if($title == '' || $tcontrat == '') Pharmacien (H/F) CDI @endif</div>
                            <div class="complimentClass">{{$jobdataCompliment}}</div>
                            <div class="travailClass">Temps de travail : @if(!empty($travail)){{$travail}} @else Temps plein @endif</div>
                              <div class="complimenttravailClass">{{$complimenttravail}}</div>
                            <p style="padding-bottom:0px;"> <div class="descClass">{!! $desc3 !!}</div></p>
                            @if(isset($jobdata))
                            @if($jobdata->show_email != 'show_email')
                              <p class="emailClass">@if(!empty($email)) E-mail de contact : {{ $email }} @endif</p>
                            @endif
                            @else
                              <p class="emailClass">@if(!empty($email)) E-mail de contact : {{ $email }} @endif</p>
                            @endif
                            @if(isset($jobdata))
                            @if($jobdata->show_phone != 'show_phone')
                              <p class="phoneClass">@if(!empty($phone)) Téléphone de contact : {{ $phone }} @endif</p>
                            @endif
                            @else
                              <p class="phoneClass">@if(!empty($phone)) Téléphone de contact : {{ $phone }} @endif</p>
                            @endif
                              @if(!empty($jobdataImg))
                              <p>
                                <img src="{{ asset('desc_image/'.$jobdataImg) }}" class="selectedImage" id="selectedImage">
                              </p>
                              @else
                              <p>
                                <img src="#" style="display:none" class="selectedImage">
                              </p>
                              @endif
                            <?php } ?>
                            <?php if($job_desc_type == 3) { ?>
                            <p style="padding-bottom:0px;"><iframe src="<?php echo $jobdata->job_desc; ?>" width="100%"
                                height="650px;" name="page"></iframe></p>
                            <?php } ?>
                            <p style="border-top: 1px solid #ccc; margin-top: 20px"></p>
                            <p>
                              <div style="width:40%;float:left;">
                                <span class="companyClass">{{ $company }} </span> pharmacie<br />
                                <span class="companyClass">{{ $address }}  </span><br />
                                <span class="pincodeClass">{{ $pincode }}  </span> {{ ' ' }}
                                <span class="cityClass2">{{ $city }} </span><br />
                                <!-- <?php //if($linkd != "" ) { echo "<a class='link_text' href='javascript:void(0);' onclick=showme('".$http.$linkd."')>".$linkd."</a>" ; } ?> -->
                               @if(isset($jobdata))
                                  @if($jobdata->show_linkd != 'show_linkd')
                                    <p class="linkdClass">
                                      <?php
                                         if($linkd != "" ) { echo "<a class='link_text'
                                         href='javascript:void(0);' onclick=showme('".$http.$linkd."')>".$linkd."</a> " ; } 
                                         ?>
                                    </p>
                                  @endif
                                @else
                                   <p class="linkdClass">
                                      <?php
                                         if($linkd != "" ) { echo "<a class='link_text'
                                         href='javascript:void(0);' onclick=showme('".$http.$linkd."')>".$linkd."</a> " ; } 
                                      ?>
                                    </p>
                              @endif
                              </div>
                              <div>
                                Possibilité de logement : <br /> {{ $hosted}}
                              </div>
                            </p>
                          </div>
                        </div>
                        <div class="form-group text-left">
                          <?php
                          $login_type = session('login_type');
                            if($login_type == 'interviewee'){
                              $url = isset($jobdata->iid) ? 'apply-job/'.$jobdata->iid : '';
                            }else{
                              $url = 'login';
                            }
                          ?>
                        </div>
                      </div>

                      <div class="form-group" <?php if ($utype == 'free') {?>style="display:none;" <?php }?>
                        id="showprice">
                        <b>Prix total : 49 euros</b>
                      </div>
                      <?php if ($utype == 'paid') {?>
                      <div class="form-group">
                        <label class="disabled-lable"> Offre d'emploi pour réseaux sociaux (ex. Instagram, Facebook)
                        </label>
                      </div>
                      <div class="form-group" style="margin-left: 25%;padding-top:20px;padding-bottom:50px;">
                        <div class="job-offer-overview-box" id="pdf" style="padding-top:20px;padding-left:20px;">
                          <div class=""
                            style="width:350px; background:#49bd49; color:#fff; text-align: center; padding-top:20px;  padding-bottom:20px; border-radius:30px;">
                            <h2 style="font-weight:700; font-size:25px; margin-bottom:15px;"><img
                                src="{{ asset('assets/placeholder22.png') }}"
                                style="width:35px; padding-top:0; padding-right:4px; display:inline; vertical-align:middle;">{{ $city }}
                              ({{ $state }})</h2>
                            <p style="padding:0; font-weight:bold; font-size:18px; line-height:24px; text-align:center !important;">{{ $company }}</p>
                            <h2
                              style="font-weight:700; font-size:30px; margin-bottom:15px;background: #009c08;padding:10px;">
                              {{ $title }}</h2>
                            <p style="padding:0; font-weight:bold; font-size:18px; text-align:center !important;" class="offer">Découvrez cette
                              offre<br />({{ $jobid }})<br />sur www.pharmapro.fr</p>
                          </div>
                        </div>
                        <div>
                          <a href="javascript:void(0);" onclick="printDiv('pdf','{{ $jobid }}')"
                            style="float: right;background: #009c08; padding: 5px;     font-size: 16px;   border-radius: 4px; color: #fff; ; margin-top: 3px;width: 227px;  height: 40px; text-align: center;">Sauvegarder
                            cette image</a>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="form-group text-right">
                      <button type="submit" value="step_4" name="btn_step" id="btn_step"
                        class="btn btn-green pop_submit" style="width:21% !important;float: right;">PUBLIER</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section>
    <div class="footer" <?php if ($utype == 'free' || $utype == "") {?>style="display:none;" <?php }?>
      id="showpricebarpaid">
      <p style="font-size:20px;padding-top: 20px;padding-bottom: 10px;">49 euros TTC <br /><br /><span
          style="font-size:16px;">Au choix la facture vous parviendra par la poste, e-mail ou vous pourrez payer par
          PayPal<span></p>
    </div>
    <div class="footer1" <?php if ($utype == 'paid' || $utype == "") {?>style="display:none;" <?php }?>
      id="showpricebarfree">
      <p style="font-size:20px;padding-top: 20px;">Gratuit</p>
    </div>
  </section>
  <!-- star model -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Interviewee Info.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          @csrf -->
          <input type="hidden" id="pop_interviewid" name="pop_interviewid" value="{{ $interviewid }}">
          <input type="text" name="pop_name" value="" class="form-control form-control-lg"
            style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Name" required id="pop_name">
          <input type="text" name="pop_email" value="" class="form-control form-control-lg"
            style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Email" id="pop_email"
            required>
          <input type="text" name="pop_note" value="" class="form-control form-control-lg"
            style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Note" id="pop_note" required>
          <button type="button" value="send_email" name="btn_step" id="send_email" class="btn btn-green"
            style="width:21% !important;padding: 1px !important;">Send</button>
          <!--  </form> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end model -->
  @push('scripts')
  @endpush
  <!-- /Form Area-->
  @include('layouts.footer')
  <script type="text/javascript">
setIcon();
$(document).ready(function() {
   setIcon();
   $('#paid').click(function(){
      setIcon();
   });
     $('#paid1').click(function(){
      setIcon();
   });
});

function hello12(paid)
{

  if(paid == 'freeme')
  {
      $('#paid_div').hide();
     $('#free_div').show();
  }

  if(paid == 'paidme')
  {
    $('#free_div').hide();
     $('#paid_div').show();
  }


}

function setIcon(){
  var radiofreejobValue = $("input[name='paid']:checked").val();
      if (radiofreejobValue == 'paid') {
          $('.paid_job_icon').addClass('custom-green-icon');
          $('.paid_job_icon').removeClass('custom-yellow-icon');

           $('.free_job_icon').addClass('custom-gray-icon');
           $('.free_job_icon').removeClass('custom-green-icon');
      } else {

         $('.paid_job_icon').addClass('custom-yellow-icon');
          $('.paid_job_icon').removeClass('custom-green-icon');

           $('.free_job_icon').addClass('custom-green-icon');
           $('.free_job_icon').removeClass('custom-gray-icon');
      }
}
</script>
<script>
function myFunction(cb)
   {
       var radio_add=$("input[type='radio'][name='address1']:checked").val();
       var radio_val=$("input[type='radio'][name='paid']:checked").val();
       var sameCname=$('#company').val();
       var sameEnterprise=$('#entreprise').find(":selected").val();
       var sameCaddress=$('#address').val();
       var sameCpincode=$('#pincode').val();
       var sameCcity=$('#city').val();
       var sameCstate=$('#state1').val();
       var sameCdepartment=$('#state').val();
       var sameCnamePaid=$('#company').val();
       var sameCaddressBel=$('#bel_address').val();
       var sameCaddressSw=$('#swiss_address').val();
       var sameCpincodeBel=$("input[name='pincode1']").val();
       var sameCcityBel=$("input[name='bel_city']").val();
       var sameCcitySw=$("input[name='swiss_city']").val();
       var sameEmail=$("input[name='email']").val();
       var samePhone=$("input[name='phone']").val();
       var sameLink=$("input[name='linkd']").val();
       var sameHttp=$("#http").find(":selected").val();
     //  $('#diffVal').attr('checked', 'false');
      // $('#disableDiv').css("display", "none");
      //document.getElementById("disableDiv").checked = false;
       if(cb.checked==false)
      {
          $('#disableDiv').css("display", "block");
          $('#diffVal').prop('checked', true);
       // $('#disableDiv').find('input,textarea,select').attr('readonly',false);
        //$('#disableDiv').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
      }
      else
      {
          $('#disableDiv').css("display", "none");
          $('#diffVal').prop('checked', false);
        //$('#disableDiv').find('input,textarea,select').attr('readonly',true);
       // $('#disableDiv').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
        if(radio_val=='free')
          { 
            //alert("hello");
            //(sameEnterprise);
            $('#sameCountry').val('France');
            $('#entreprise2').val(sameEnterprise);
            $('#sameCompany').val(sameCname);
            $('#sameEmail').val(sameEmail);
            $('#samePhone').val(samePhone);
            $('#linkd2').val(sameLink);
            $('#http2').val(sameHttp);
            $('#sameAddress').val(sameCaddress);
            $('#samePincode').val(sameCpincode);
            $('#sameCity').val(sameCcity);
            $('#sameDepartment').val(sameCdepartment); 
            $('#con_department').css({display: "block"});
            $('#con_cantons').css({display: "none"});
          }
          else
          {
              //alert(sameEnterprise);
                $('#entreprise2').val(sameEnterprise);
                $('#sameEmail').val(sameEmail);
                $('#samePhone').val(samePhone);
                $('#linkd2').val(sameLink);
                $('#http2').val(sameHttp);
                if(radio_add=='Belgium')
                {
                  $('#sameCountry').val('Belgium');
                  $('#sameCompany').val(sameCnamePaid);
                  $('#sameAddress').val(sameCaddressBel);
                  $('#samePincode').val(sameCpincodeBel);
                  $('#sameCity').val(sameCcityBel);
                  $('#sameDepartment').val("");
                  $('#companyState').val("");
                  $('#con_department').css({display: "none"});
                  $('#con_cantons').css({display: "none"});

                }
                else if(radio_add=='Switzerland')
                {
                    $('#sameCountry').val('Switzerland');
                    $('#sameCompany').val(sameCnamePaid);
                    $('#sameAddress').val(sameCaddressSw);
                    $('#samePincode').val(sameCpincodeBel);
                    $('#sameCity').val(sameCcitySw);
                   // $('#companyState').val(sameCcitySw);
                    $('#sameDepartment').val("");
                    $('#companyState').val(sameCstate);
                    $('#con_department').css({display: "none"});
                    $('#con_cantons').css({display: "block"});
                }
              else
              {
                  $('#entreprise2').val(sameEnterprise);
                  $('#sameCompany').val(sameCname);
                  $('#sameAddress').val(sameCaddressBel);
                  $('#samePincode').val(sameCpincodeBel);
                  $('#sameCity').val(sameCcityBel);
                  $('#sameDepartment').val("");
                  $('#companyState').val("");
              }
          }
      } 
         
   }
</script>
<script>
  $( document ).ready(function() {
    //alert("hello");
    $('#diffVal').change(function(){
      //alert("hello");
      $('#sameConfirm').prop('checked', false);
      $('#disableDiv').css("display", "block");
    });
  });
</script>
<script>
   $( document ).ready(function() {
      $('#diffValNew').click(function() {
        $('#sameConfirmNew').prop('checked', false);
        $('#disableDivNew').css("display", "block");
      });
   });
  </script>
<style type="text/css">
  .disabled {
    pointer-events: none;
    /*opacity: 0.5;*/
    border: none !important;
    resize: none;
    width: 100%;
  }

  .disabled-lable {
    color: #293541;
    font-size: 16px;
    line-height: 20px;
    font-weight: bold;
    position: relative;
    display: block;
    cursor: pointer;
  }

  .disabled-step {
    pointer-events: none;
    border: none !important;
    resize: none;
  }

  .disabled-chk {
    pointer-events: none;
    opacity: 0.5;
  }

  .disabled-div {
    display: none;
  }

  #interview_with {
    border: none;
    color: #2771b8;
    font-size: 37px;
    font-weight: 600;
    /*margin-bottom: 8px;*/
    /*width: 450px;*/
    background: transparent;
    margin-top: -5px;
  }

  .feildForm textarea.disabled {
    padding: 0px 0px 0px;
    vertical-align: top;
    resize: none;
  }
</style>
  <script type="text/javascript">
    function entrepriseChange(val){
      $('.titleClass').html($('#title').val() + ' ' + $('#tcontrat').val());
      $('.travailClass').html('Temps de travail : '+ $('#travail').val());
      if ($('#title').val() == '') {
        $('.titleClass').html('Pharmacien (H/F) CDI');
      }
      if ($('#tcontrat').val() == '') {
        $('.titleClass').html('Pharmacien (H/F) CDI');
      }
      $('.complimentClass').html($('#compliment').val());
      $('.descClass').html(tinyMCE.activeEditor.getContent());
      $('.complimenttravailClass').html($('#complimenttravail').val());
      $('.travailClass').html('Temps de travail : '+ $('#travail').val());
      if ($('#travail').val() == '') {
        $('.travailClass').html('Temps de travail : Temps plein');
      }
      if ($('#offerdate').val() != '' && !$('#show_date').is(':checked')) {
        $('.dateClass').html('Date d’entrée en fonction : ' + $('#offerdate').val());
      }else{
        $('.dateClass').html('');
      }
      
      if ($('#email').val() != '' && !$('#show_email').is(':checked')) {
        $('.emailClass').html('E-mail de contact : '+$('#email').val());
      } else {
        $('.emailClass').html('');
      }
      if ($('#phone').val() != '' && !$('#show_phone').is(':checked')) {
        $('.phoneClass').html('Téléphone de contact : '+$('#phone').val());
      } else {
        $('.phoneClass').html('');
      }
      if($('#linkd').val() != '' && !$('#show_linkd').is(':checked')){
        $('.linkdClass').html(''+$('#linkd').val());
      }else{
        $('.linkdClass');
      }

    }

    $("#offer_contract_startDate").change(function(e){
        $('.offer_contract_startDateClass').html('Date d’entrée en fonction : ' + $('#offer_contract_startDate').val());
    });
    function steptwoChange(argument) {
      $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
      $('.cityClass2').html($('#city').val());
      $('.companyClass').html('La '+ $('#company').val() + ' recherche un/e');
    }
    function removeImg(argument) {
      $('.selectedImage').hide();
    }
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.selectedImage').attr('src', e.target.result);
            $('.selectedImage').show();
        }
        reader.readAsDataURL(input.files[0]);
      }
      $('.descClass').html(tinyMCE.activeEditor.getContent());
    }
    $('#paid1').click(function() {
      $('#showprice').show();
      $('#showurgent').show();
      $('#showpricebarpaid').show();
      $('#showpricebarfree').hide();
    });
    $('#paid').click(function() {
      $('#showprice').hide();
      $('#showurgent').hide();
      $('#showpricebarpaid').hide();
      $('#showpricebarfree').show();
    });
    $('#showoffer').click(function() {
      //console.log('clicked');
      if ($(this).prop("checked") == true) {
        // $('#hideoffer').html("");
        $('#hideoffer').hide();
        $('.offer_contract_startDateClass').html("");
      } else if ($(this).prop("checked") == false) {
        $('#hideoffer').show();
        if ($('#offer_contract_startDate').val() != '') {
          $('.offer_contract_startDateClass').html('Date d’entrée en fonction : ' + $('#offer_contract_startDate').val());
        }
      }
    });
  function hello(id) {
    if (id != "") {
      if (!id.match(/^\d+/)) {
        alert("Only number is allowed");
        document.getElementById("state").value = "";
      }
      $('#filter_result').show();
      var profession_val = id;
      $.ajax({
        url: '{!! url("/job_filter_process") !!}',
        data: {
          'profession_val': profession_val,
          _token: "{{csrf_token()}}"
        },
        type: "POST",
        success: function(data) {
          $('#filter_result').html(data);
        }
      });

    }
    $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
    $('.descClass').html(tinyMCE.activeEditor.getContent());
  }

  function getval(valu) {
    $('#filter_result').hide();
    $('#state').val(valu);
    $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
  }
  </script>
  <script src="{{ asset('assets/jquery.datetimepicker.full.min.js') }}"></script>
  <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <!-- <script>
        CKEDITOR.replace( 'desc' );
    </script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.6/tinymce.min.js"></script>
  <script>
    $(window).scroll(function() {    
        var scrollTop = $(window).scrollTop();
        if (scrollTop >= 100) {
          $("#topFixedDiv").addClass("topFixedDiv");
        } else {
          $("#topFixedDiv").removeClass("topFixedDiv");
        }
    }); 
  function showoption(val) {
    if (val == 1) {
      $('.descoption').removeClass('active');
      $('.pdfoption').addClass('active');
      $('#link').hide();
      $('#text').hide();
      $('#pdf').show();
      $('#descoptionvalue').val(val);
      $('.detSection').removeClass('secWidth');
      $('#parentDiv').removeClass('parentDiv');
      $('.jobdataSec').hide();
    }
    if (val == 2) {
      $('.descoption').removeClass('active');
      $('.textoption').addClass('active');
      $('#link').hide();
      $('#text').show();
      $('#pdf').hide();
      $('#descoptionvalue').val(val);
      $('.detSection').addClass('secWidth');
      $('#parentDiv').addClass('parentDiv');
      $('.jobdataSec').show();
    }
    if (val == 3) {
      $('.descoption').removeClass('active');
      $('.linkoption').addClass('active');
      $('#link').show();
      $('#text').hide();
      $('#pdf').hide();
      $('#descoptionvalue').val(val);
      $('.detSection').removeClass('secWidth');
      $('#parentDiv').removeClass('parentDiv');
      $('.jobdataSec').hide();
    }
  }
  </script>
  <script>
  /*
  tinymce.init({
    selector: 'textarea#desc',
    setup: function (editor) {
        editor.on('keyup', function (e) {
            $('.descClass').html(editor.getContent());
            //custom logic  
        });
    }
  });
*/

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: 'textarea#desc',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 300,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });
  </script>
  <script type="text/javascript">
  $('#link-step-1').click(function(e) {
    $('#li-step-2').addClass('resp-tab-active');
    $('#li-step-2').click();
    $(window).scrollTop(0);
  });
  <?php
if ($login_type == 'interviewee') {?>
  $('#link-step-2').click(function(e) {
    $('#li-step-3').addClass('resp-tab-active');
    $('#li-step-3').click();
    $(window).scrollTop(0);
  });
  <?php } else {?>
  $('#link-step-2').click(function(e) {
    $('#li-step-3').addClass('resp-tab-active');
    $('#li-step-3').click();
    $(window).scrollTop(0);
  });
  <?php }?>
  $('#link-step-3').click(function(e) {
    $('#li-step-1').addClass('resp-tab-active');
    $('#li-step-1').click();
    $(window).scrollTop(0);
  });
  $('#link-step-4').click(function(e) {
    $('#li-step-5').addClass('resp-tab-active');
    $('#li-step-5').click();
    $(window).scrollTop(0);
  });
  <?php
if ($login_type == 'interviewee') {?>
  $('#link-step-5').click(function(e) {
    $('#li-step-6').addClass('resp-tab-active');
    $('#li-step-6').click();
    $(window).scrollTop(0);
  });
  <?php } else {?>
  $('#link-step-5').click(function(e) {
    $('#li-step-6').addClass('resp-tab-active');
    $('#li-step-6').click();
    $(window).scrollTop(0);
  });
  <?php }?>
  <?php
if ($login_type == 'interviewee') {?>
  $('#link-step-6').click(function(e) {
    $('#li-step-1').addClass('resp-tab-active');
    $('#li-step-1').click();
    $(window).scrollTop(0);
  });
  <?php } else {?>
  $('#link-step-6').click(function(e) {
    $('#li-step-1').addClass('resp-tab-active');
    $('#li-step-1').click();
    $(window).scrollTop(0);
  });
  <?php }?>
  $('.more-field').click(function() {
    var id = incr();
    $("#sortable").append(
      '<li><div class="dotted-border"><div class="form-group"><label class="fName">Question ' + id +
      '</label><textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[' + id +
      '][question]" placeholder=""></textarea></div><div class="form-group"><label class="fName">Note ' + id +
      '</label><textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[' + id +
      '][notes]" placeholder="" ></textarea></div></div><hr style="border-color: #00bf6f;"></li>'
    );
  });
  var incr = (function() {
    var count = '<?php echo $que_note_count; ?>';
    if (count == 0) {
      var i = 3;
    } else {
      var i = parseInt(count) + 1;
    }
    return function() {
      return i++;
    }
  })();
  </script>
  <script type="text/javascript">
  $('li').removeClass('resp-tab-active');
  </script>
  <?php
if ($login_type == 'interviewee') {
   if (!empty(Session::get('step'))) {
      $step = Session::get('step');
   } else {
      $step = '2';
   }
   ?>
  <script type="text/javascript">
  $('#li-step-<?php echo $step; ?>').addClass('resp-tab-active');
  $('#li-step-<?php echo $step; ?>').click();
  </script>
  <?php
} else {
   if (!empty(Session::get('step'))) {
      $step = Session::get('step');
   } else {
      $step = '1';
   }
   ?>
  <?php if ($step == 2) {?>
  <script type="text/javascript">
  $('#li-step-<?php echo $step; ?>').addClass('resp-tab-active');
  $("#step-1").hide();
  $("#step-2").addClass('resp-tab-content-active');
  $('#li-step-<?php echo $step; ?>').click();
  </script>
  <?php } else if ($step == 3) {?>
  <script type="text/javascript">
  $('#li-step-<?php echo $step; ?>').addClass('resp-tab-active');
  $("#step-1").hide();
  $("#step-2").hide();
  $("#step-3").addClass('resp-tab-content-active');
  $('#li-step-<?php echo $step; ?>').click();
  </script>
  <?php } else {?>
  <script type="text/javascript">
  $('#li-step-<?php echo $step; ?>').addClass('resp-tab-active');
  $('#li-step-<?php echo $step; ?>').click();
  </script>
  <?php }?>
  <?php }?>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script type="text/javascript" src="http://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  <script type="text/javascript">
  function printDiv(divId, title) {
    html2canvas(document.querySelector("#" + divId), {
      width: 380,
      height: 380,
      y: $('#pdf').offset().top,
      useCORS: true,
      backgroundColor: 'transparent'
    }).then(canvas => {
      // document.body.appendChild(canvas);
      let downloadLink = document.createElement('a');
      downloadLink.setAttribute('download', title + '.png');
      let dataURL = canvas.toDataURL('image/png');
      let url = dataURL.replace(/^data:image\/png/, 'data:application/octet-stream');
      downloadLink.setAttribute('href', url);
      downloadLink.click();
    });
  }
  $(document).ready(function() {

   // $('#onloadactive').click();
   var jobType2 = '<?php echo $job_desc_type; ?>';       
    if(jobType2 == 2 || jobType2 == ""){      
      $('#onloadactive').click();
    }
    
    $('.titleClass').html($('#title').val() + ' ' + $('#tcontrat').val());
    $('.travailClass').html('Temps de travail : '+ $('#travail').val());
    $('input[type="radio"]').click(function() {
      if ($(this).prop("checked") == true) {
        var radioValue = $("input[name='paid']:checked").val();
        if (radioValue == 'paid') {
          $('#showprice').show();
          $('#showurgent').show();
          $('#showpricebarpaid').show();
          $('#showpricebarfree').hide();
        } else {
          $('#showprice').hide();
          $('#showurgent').hide();
          $('#showpricebarpaid').hide();
          $('#showpricebarfree').show();
        }
      }
    });
    $.datetimepicker.setLocale('fr');
    $('#offer_contract_startDate').datetimepicker({
      i18n: {
        fr: {
          months: [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
          ],
          dayOfWeek: ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"]
        }
      },
      format: 'd.m.Y',
      timepicker: false,
      scrollInput: false,
      minDate: 'now',
      dayOfWeekStart: 1
    });
  });
  $('#datePicker').datepicker({
    format: 'mm/dd/yyyy'
  });
  $("#frmmultistep1").validate({
    rules: {
      fname: "required",
      lname: "required",
      //occupation: "required",
      email: {
        required: true,
        email: true
      },
      deadlinedate: "required",
    },
    messages: {
      fname: "",
      lname: "",
      occupation: "",
      email: "",
      phone: "",
      logo: "",
      mediaoutlet: "",
      mediaurl: "",
      compcountry: "",
      monthtraffic: "",
      sitelang: "",
      country: "",
      interlang: "",
      lang: "",
      resources: "",
      notes: "",
      reference: "",
      deadlinedate: "",
      site: "",
      traffic: "",
    },
    highlight: function(element) {
      $(element).closest('.form-control').removeClass('success').addClass('error');
      $("label.error").hide();
    },
    success: function(element) {
      element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass(
        'error').addClass('success');
    }
  });
  $("#frmmultistep2").validate({
    rules: {
      s2_fname: "required",
      s2_surname: "required",
      s2_occupation: "required",
      s2_email: {
        required: true,
        email: true
      },
    },
    messages: {
      s2_fname: "",
      s2_surname: "",
      s2_occupation: "",
      s2_email: "",
    },
    highlight: function(element) {
      $(element).closest('.form-control').removeClass('success').addClass('error');
      $("label.error").hide();
    },
    success: function(element) {
      element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass(
        'error').addClass('success');
    }
  });
  $("#frmmultistep3").validate({
    rules: {
      //s3_que: "required",
      "s3_que[1][question]": "required",
      /*"s3_que[1][notes]" : "required",*/
      "s3_que[2][question]": "required",
      /*"s3_que[2][notes]" : "required",*/
      //s3_note: "required",
    },
    messages: {
      "s3_que[1][question]": "",
      /*"s3_que[1][notes]" : "",*/
      "s3_que[2][question]": "",
      /*"s3_que[2][notes]" : "",*/
    },
    highlight: function(element) {
      $(element).closest('.form-control').removeClass('success').addClass('error');
      $("label.error").hide();
    },
    success: function(element) {
      element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass(
        'error').addClass('success');
    }
  });
  $('#send_email').click(function() {
    var pop_name = $('#pop_name').val();
    var pop_email = $('#pop_email').val();
    var pop_note = $('#pop_note').val();
    var pop_interviewid = $('#pop_interviewid').val();
    //$('.pop_submit').click();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}",
      }
    });
    $.ajax({
      url: '{!! url($url) !!}',
      data: {
        /*"_token": "{{ csrf_token() }}",*/
        'pop_email': pop_email,
        'pop_name': pop_name,
        'pop_note': pop_note,
        'pop_interviewid': pop_interviewid,
        'btn_step': 'send_email',
      },
      type: "POST",
      success: function(data) {
        $('.pop_submit').click();
      }
    });
  });
  </script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <script>
  $(function() {
    $("#sortable").sortable();
    //$( "#sortable" ).disableSelection();
  });
  $(function() {
    $(".name-auto-fill").autocomplete({
      source: '{!! url("name_auto_fill") !!}',
      select: function(event, ui) {
        event.preventDefault();
        var user_id = ui.item.id;
        $.ajax({
          url: '{!! url("get_auto_comp_values") !!}',
          data: {
            "_token": "{{ csrf_token() }}",
            'user_id': user_id,
          },
          type: "POST",
          dataType: 'json',
          success: function(data) {
            $('#fname').val(data.first_name);
            $('#lname').val(data.last_name);
            $('#email').val(data.email);
            $('#occupation').val(data.occupation);
            $('#phone').val(data.phone);
            $('#site').val(data.website);
            var src = '{!! url("logo") !!}' + "/" + data.profile_pic;
            if (data.profile_pic != null) {
              $('.auto-logo').attr('src', src);
              $('#old_logo').val(data.profile_pic);
            }
          }
        });
      }
    });
    $(".name-auto-fill-interviewee").autocomplete({
      source: '{!! url("name_auto_fill_interviewee") !!}',
      select: function(event, ui) {
        event.preventDefault();
        var user_id = ui.item.id;
        $.ajax({
          url: '{!! url("get_auto_comp_values_interviewee") !!}',
          data: {
            "_token": "{{ csrf_token() }}",
            'user_id': user_id,
          },
          type: "POST",
          dataType: 'json',
          success: function(data) {
            $('#s2_fname').val(data.first_name);
            $('#s2_surname').val(data.last_name);
            $('#s2_email').val(data.email);
            $('#s2_occupation').val(data.occupation);
            $('#s2_phone').val(data.phone);
            //$('#site').val(data.website);
            var src = '{!! url("logo") !!}' + "/" + data.profile_pic;
            if (data.profile_pic != null) {
              $('.auto-logo2').attr('src', src);
              $('#s2_old_logo').val(data.profile_pic);
            }
          }
        });
      }
    });
  });
  $('#no_deadline').change(function() {
    if (!$('#no_deadline').is(':checked')) {
      $('#deadline_div').show();
      //$('#deadlinedate').val('');
    } else {
      $('#deadline_div').hide();
    }
  });
  $('#no_deadline').change();
  var select_all_interviewer = document.getElementById("select-interviewer");
  var checkboxes_interviewer = document.getElementsByClassName("checkbox-interviewer");
  select_all_interviewer.addEventListener("change", function(e) {
    for (i = 0; i < checkboxes_interviewer.length; i++) {
      checkboxes_interviewer[i].checked = select_all_interviewer.checked;
    }
  });
  for (var i = 0; i < checkboxes_interviewer.length; i++) {
    checkboxes_interviewer[i].addEventListener('change', function(e) { //".checkbox" change
      if (this.checked == false) {
        select_all_interviewer.checked = false;
      }
      if (document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewer.length) {
        select_all_interviewer.checked = true;
      }
    });
  }
  var select_all_interviewee = document.getElementById("select-interviewee");
  var checkboxes_interviewee = document.getElementsByClassName("checkbox-interviewee");
  select_all_interviewee.addEventListener("change", function(e) {
    for (i = 0; i < checkboxes_interviewee.length; i++) {
      checkboxes_interviewee[i].checked = select_all_interviewee.checked;
    }
  });
  for (var i = 0; i < checkboxes_interviewee.length; i++) {
    checkboxes_interviewee[i].addEventListener('change', function(e) { //".checkbox" change
      if (this.checked == false) {
        select_all_interviewee.checked = false;
      }
      if (document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewee.length) {
        select_all_interviewee.checked = true;
      }
    });
  }
  if ($('.checkbox-interviewee:checked').length == $('.checkbox-interviewee').length) {
    $('#select-interviewee').attr('checked', 'checked');
  }
  if ($('.checkbox-interviewer:checked').length == $('.checkbox-interviewer').length) {
    $('#select-interviewer').attr('checked', 'checked');
  }
  //$('#no_deadline').click();
  </script>
  <style type="text/css">
  label.error {
    display: none;
  }

  .error {
    border-color: red !important;
  }

  .input-group-append .icon-calendar {
    font-size: 15px !important;
  }

  .cust-icon {
    left: -20px;
  }

  .dotted-border {
    border: 3px dotted black;
    margin-bottom: 10px;
    padding: 10px;
    cursor: pointer;
  }

  /*#sortable{
    cursor: pointer;
  }*/
  .ui-sortable-handle {
    cursor: pointer;
  }

  .form-group {
    cursor: pointer;
  }

  .fName {
    cursor: pointer;
  }
  </style>

<script type="text/javascript">
$(document).ready(function () {
    $("#state1").select2({
      placeholder: "Ex. GE",
      allowClear: true,

      language: {
        noResults: function (params) {
          return "Aucun résultat trouvé";
        }
      }
    });    
});
</script>

  <script type="text/javascript">
$(document).ready(function () {

     $("#state").select2({
      placeholder: "Ex. 01",
      allowClear: true,
      language: {
        noResults: function (params) {
          return "Aucun résultat trouvé";
        }
      },
      dropdownPosition: 'below'
     });
    
    $(document).on('focus', '.select2', function() {
      $(this).siblings('select').select2('open');
  });

});
</script>

<script type="text/javascript">
$(document).ready(function () {
    $("#state3").select2({
      placeholder: "Ex. 01",
      allowClear: true,

      language: {
        noResults: function (params) {
          return "Aucun résultat trouvé";
        }
      }
    });    
});
</script>

<style type="text/css">
  span.select2-selection.select2-selection--single {
    height: 45px;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 46px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
   
    top: 9px;
    
}
</style>

<script type="text/javascript">
    $('#descfile').change(function() {
      var filename = $('#descfile').val();
      //var filename1= '<?php echo $desc1; ?>';
      if (filename.substring(3,11) == 'fakepath') {
          filename = filename.substring(12);
      } // For Remove fakepath
        $("label[for='file_name'] ").html(filename);
     /* $("label[for='file_default']").text('Selected File: ');*/
      if(filename == '') {
          $("label[for='descfile_fm'] ").show();

      }else{
        $("label[for='descfile_fm'] ").hide();
      }
  });
  </script>

<script>
$(document).ready(function(){
  $("#Belgium").click(function(){
    $("#cantons").hide();
   
  });
  $("#Switzerland").click(function(){
    $("#cantons").show();
    
  });

  $("#paid1").click(function(){
    $("#free_div").hide();
    $("#paid_div").show();
  });
});
</script>
<!-------------------monita(30-11)(third-part)----------------->
<script>
  $(document).ready(function () 
   {
     var checkVal=$("input[name='paid']:checked").val();
     if(checkVal=="free")
       {
       // paid_function_div
        $('.paid_function_div').css({display: "none"});
       }
       else
       {
        $('.paid_function_div').css({display: "block"});
       }
  $("input:radio[name='paid']").click(function(){
       //alert( $(this).val());
       var radVal=$(this).val();
       if(radVal=="free")
       {
       // paid_function_div
        $('.paid_function_div').css({display: "none"});
       }
       else
       {
        $('.paid_function_div').css({display: "block"});
       }
    });
   });
</script>  
<script>
   $(document).ready(function () 
   {
     var checked_val=$("#sameConfirm").prop("checked");
     var checked_new=$("#sameConfirmNew").prop("checked");
     if(checked_val==true)
  {
    $('#disableDiv').css({display: "none"});
  //$('#disableDiv').find('input,textarea,select').attr('readonly',true);
  //$('#disableDiv').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
  }
 else
 {
     $('#disableDiv').css({display: "block"});
   // $('#disableDiv').find('input,textarea,select').attr('readonly',false);
   // $('#disableDiv').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
 }
 if(checked_new==true)
 {
    $('#disableDivNew').css({display: "none"});
  //$('#disableDivNew').find('input,textarea,select').attr('readonly',true);
 // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
 }
 else
 {
     $('#disableDivNew').css({display: "block"});
   // $('#disableDivNew').find('input,textarea,select').attr('readonly',false);
   // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
   
 } 
    $("#newCountry").change(function(){
        if ($(this).val() == 'Switzerland') 
        {
              //alert('hello');
              $('#new_department_div').css({display: "none"});
              $('#new_cantons').css({display: "block"});
        } 
        else if($(this).val() == 'France')
        {
          $('#new_department_div').css({display: "block"});
          $('#new_cantons').css({display: "none"});
        }
        else
        {
          //alert('hi');
          $('#new_department_div').css({display: "none"});
          $('#new_cantons').css({display: "none"});
         // $("input[name='state']").val() = ''
           
        }
      });
      $('#sameCountry').on('change', function() {
        if ($(this).val() == 'Switzerland') 
        {
              //alert('hello');
              $('#con_department').css({display: "none"});
              $('#con_cantons').css({display: "block"});
        } 
        else if($(this).val() == 'France')
        {
          $('#con_department').css({display: "block"});
          $('#con_cantons').css({display: "none"});
        }
        else
        {
          //alert('hi');
          $('#con_department').css({display: "none"});
           $('#cantons1').css({display: "none"});
        }
      });
      $('#sameConfirmNew').change(function() {
    //alert("hello");
          var sameCentreprise=$('#entreprise1').find(":selected").val();
          var sameCname=$('#company').val();
          var radio_add=$("input[type='radio'][name='address2']:checked").val();
          var sameCaddress=$('#address').val();
          var sameCpincode=$('#pincode').val();
          var sameCcity=$('#city').val();
          var sameCdepartment=$('#state').find(":selected").val();
          var sameCstate=$('#state1').find(":selected").val();
         // var radio_add=$("input[type='radio'][name='address2']:checked").val(); 
         var radio_add=$("input[type='radio'][name='address1']:checked").val();
         var radio_val=$("input[type='radio'][name='paid']:checked").val();
          var sameCemail=$('#email').val();
          var sameCphone=$('#phone').val();
          var sameLinked=$('#linkd').val();
          var sameCaddressBel=$('#bel_address').val();
          var sameCaddressSw=$('#swiss_address').val();
          var sameCpincodeBel=$("input[name='pincode1']").val();
          var sameCcityBel=$("input[name='bel_city']").val();
          var sameCcitySw=$("input[name='swiss_city']").val();
          if($(this).is(':checked'))
          {
            $('#newSameCompany').val(sameCname);
            $('#newSameAddress').val(sameCaddress);
            $('#newSamePincode').val(sameCpincode);
            $('#newSameCity').val(sameCcity);
            if(radio_val=='free')
            {
              $('#new_department_div').css({display: "block"});
              $('#new_cantons').css({display: "none"});
              $('#newState').val("");
              $('#newSameDepartment').val(sameCdepartment);
              $("#newCountry").val("France");
            }
            else
            {
                if(radio_add=='Belgium')
                {
                  $('#new_department_div').css({display: "none"});
                  $('#new_cantons').css({display: "none"}); 
                  $('#newState').val("");
                  $('#newSameDepartment').val("");
                  $('#newSameAddress').val(sameCaddressBel);
                  $('#newSamePincode').val(sameCpincodeBel);
                  $('#newSameCity').val(sameCcityBel);
                  $("#newCountry").val(radio_add);
                }
                else if(radio_add=='Switzerland')
                {
                   //sameCcity=$('.swiss_city').val();
                  $('#new_department_div').css({display: "none"});
                  $('#new_cantons').css({display: "block"});
                 // alert(sameCstate);
                  $('#newState').val(sameCstate);
                  $('#sameDepartment').val("");
                  $("#newCountry").val(radio_add);
                  $('#newSameAddress').val(sameCaddressSw);
                  $('#newSamePincode').val(sameCpincodeBel);
                  $('#newSameCity').val(sameCcitySw);
                  $('#sameDepartment').val("");
                }
                else
                {
                  $('#new_department_div').css({display: "block"});
                  $('#new_cantons').css({display: "none"});
                  $('#newState').val("");
                  $('#sameDepartment').val("");
                  $('#newSameDepartment').val(sameCdepartment);
                  $("#newCountry").val("France");
                  $('#newSameAddress').val(sameCaddress);
                  $('#newSamePincode').val(sameCpincode);
                  $('#newSameCity').val(sameCcity);
                }
            }
            /*
            if(radio_add=='Switzerland')
            {
               // $('#entreprise2 option[value="'+sameCentreprise+'"]').attr("selected", "selected");
                $('#new_department_div').css({display: "none"});
                $('#new_cantons').css({display: "block"});
                $('#newState').val(sameCstate);
                $('#sameDepartment').val("");
            }
            else if(radio_add=='France')
            {
              $('#new_department_div').css({display: "block"});
              $('#new_cantons').css({display: "none"});
              $('#newState').val("");
              $('#newSameDepartment').val(sameCdepartment);
            }
            else
            {
              $('#new_department_div').css({display: "none"});
              $('#new_cantons').css({display: "none"}); 
              $('#newState').val("");
              $('#newSameDepartment').val("");
            }
            */
           // $('#disableDivNew').find('input,textarea,select').attr('readonly',true);
           // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
              $('#diffValNew').prop('checked', false);
              $('#disableDivNew').css("display", "none");
          }
          else
          {
            $('#diffValNew').prop('checked', true);
            $('#disableDivNew').css("display", "block");
            $('#input').prop('checked',false);
           // $('#disableDivNew').find('input,textarea,select').attr('readonly',false);
           // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
          }
      });
  }); 
  
</script>
<script>
  $(document).ready(function(){
    $('#diffValNew').click(function() {
      $('#sameConfirmNew').prop('checked', false);
      $('#disableDivNew').css("display", "block");
  });
  }); 
</script>
<!---------------------monita-update----------------------->
<script>
$(document).ready(function(){
  $("#Belgium1").click(function(){
    $("#cantons1").hide();
   $("#department").hide();
   $("#bel_city").show();
    $("#bel_address").show();
      $("#swiss_address").hide();
      $("#swiss_city").hide();
   
  });
  $("#france1").click(function(){
    $("#cantons1").hide();
    $("#department").show();
    $("#bel_city").show();
    $("#bel_address").show();
      $("#swiss_address").hide();
      $("#swiss_city").hide();
  });
  $("#Switzerland1").click(function(){
    $("#cantons1").show();
  $("#department").hide();
   $("#swiss_city").show();
   $("#bel_city").hide();
    $("#swiss_address").show();
   $("#bel_address").hide();
    
  });

  $("#paid1").click(function(){
    $("#free_div").hide();
    $("#paid_div").show();
  });
});
</script>
