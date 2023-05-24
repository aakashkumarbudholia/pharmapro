@include('layouts.header')

<link href="{{ asset('assets/jquery.datetimepicker.css') }}" rel="stylesheet" />


<link href="{{ asset('assets/style-arch.css') }}" rel="stylesheet" />


<?php
if (empty(session('lang'))) {
    App::setLocale('fr');
    session(['lang' => 'fr']);
}
$login_user_id = session('user_id');

$login_type = session('login_type');

$serviceid = "";
$address   = "";
$city      = "";
$state     = "";
$country   = "";
$pincode   = "";

$title        = "";
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
$tcontrat       = "";
$travail        = "";

$job_desc_type        = "";

$entreprise  = "";
$entreprise1 = "";


if (!empty($jobdata->job_desc_type)) {
   $job_desc_type = $jobdata->job_desc_type;
} else {
   $job_desc_type = "";
}



$utype = "";

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
    $pincode = isset($login_user_info->postal) ? $login_user_info->postal : '';
    $city    = isset($login_user_info->villa) ? $login_user_info->villa : '';
    $state   = isset($login_user_info->departement) ? $login_user_info->departement : '';
    $email   = isset($login_user_info->email) ? $login_user_info->email : '';
}

if (!empty($jobdata->entreprise1)) {
    $entreprise1 = $jobdata->entreprise1;
} else {
    $entreprise1 = $userdata->entreprise;
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
    $linkd = $userdata->linkd;
}
if($linkd != ''){
  if (strpos($linkd, "http") !== false){
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


$utype = "paid";

?>

<form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep1" id="frmmultistep1"  method="POST" enctype="multipart/form-data">
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
<ul class="resp-tabs-list">


<li id="li-step-1" class="<?php if ($login_type == 'interviewee') {?> resp-tab-active<?php }?>">
  <img src="{{ asset('assets/announsment.png') }}"><span class="cust-icon"></span><span>{{ __('message.job_ads') }}</span>
</li>

<li id="li-step-2">
  <img src="{{ asset('assets/pin_location-128.png') }}"><span class="cust-icon"></span><span style="width: 160px;margin-left: 10px;">{{ __('message.location') }}</span>
</li>
<li id="li-step-3">
  <img src="{{ asset('assets/eyes.png') }}"><span class="cust-icon"></span><span>{{ __('message.overview') }}</span>
</li>


</ul>

<div class="resp-tabs-container">




<div id="step-1" class="step"  >
  <?php if (Session::get('step') == '1') {?>
    @include('layouts.flash-message')
  <?php }?>


<div>

<!-- 
<ul style="padding-bottom:15px;font-size:18px;">
<li><b>Votre offre d'emploi gratuite ou Premium ?</b> </li>
<li><input type="radio" id="paid" name="paid" value="free" <?php if ($utype == 'free') {echo "checked";}?>> Offre d’emploi gratuite (pas possible de choisir la fonction URGENTE)</li>
<li><input type="radio" id="paid" name="paid" value="paid" <?php if ($utype == 'paid') {echo "checked";}?>> Offre d’emploi Premium – 49 euros TTC</li>
</ul>

<ul style="padding-bottom:15px;font-size:16px;">

<li><b>Premium :</b> </li>
<li>- Votre offre marquée URGENT (en rouge) si désiré dans les listes et sur la page d'accueil pendant 14 jours</li>
<li>- Suggestion de votre offre (URGENT ou non) toujours dans un cadre jaune en bas à gauche d'autres offres d'emploi (premières qui apparaissent)</li>
<li>- Création d'une infographie de votre offre d'emploi avec diffusion sur notre page Facebook, groupe Facebook et compte Instagram</li>

</ul> -->

<div class="offer-section">
  <h3 style="padding:10px; margin-bottom:80px;">Choisissez votre type d'offre d'emploi</h3>
  <div class="inner-center">
      <div class="lpart two-part">
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="paid" name="paid" value="free"  <?php if ($utype == 'free') {echo "checked";}?>> 
          <label class="custom-control-label" for="paid">Gratuit</label>
        </div>
        <p>Votre offre d’emploi gratuite inclut :</p>
        <ul>
          <li>Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
          <li>Programmation pour apparaître dans  <br />« Google for Jobs »</li>
        </ul>
      </div>
      <div class="rpart two-part">
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="paid1" name="paid" value="paid"  <?php if ($utype == 'paid') {echo "checked";}?>> 
          <label class="custom-control-label" for="paid1">Premium - €49 (TTC)</label>
        </div>
        <p>Pour renforcer sa visibilité, votre offre d’emploi Premium inclut :</p>
        <ul class="border-bottom">
          <li>Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
          <li>Programmation pour apparaître dans  <br />« Google for Jobs »</li>
        </ul>
        <ul>
          <li>Apparition en <strong>tête de liste</strong> en vert et en gras pendant 7 jours</li>
          <li>Possibilité de rajouter le texte <strong>URGENT</strong> en rouge sur votre offre et dans les listes pendant 14 jours</li>
          <li>Envoi dans notre <strong>newsletter</strong></li>
          <li>Suggestion de votre offre en bas d’offres similaires de votre région</li>
          <li>Création de votre offre d’emploi sous forme d’infographie <strong>Instagram</strong> et diffusion sur nos réseaux sociaux </li>
        </ul>
      </div>
      <div class="center">
        <p><strong>Conditions pour agences (ex. de placement, interim) :</strong><br/>Une agence peut publier au maximum une offre d'emploi gratuite par jour, si l'agence aimerait publier plus d'offres par 24h elle doit prendre des offres Premium (dans ce cas la création manuelle d'infographie et sa diffusion sur les réseaux sociaux de Pharmapro.fr ne s'applique pas).</p>
      </div>

  </div>
</div>

</div>

  <form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep2" id="frmmultistep2"  method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" id="interviewid" name="interviewid" value="{{ $interviewid }}">
    <input type="hidden" id="s2_interviewid" name="s2_interviewid" value="{{ $interviewid }}">

    <input type="hidden" id="descoptionvalue" name="descoptionvalue" value="{{ $job_desc_type }}"> 
    <input type="hidden" id="oldpdf" name="oldpdf" value="{{ $desc }}"> 

    <div class="detSection">
      <h3 style="padding-top: 6px;">{{ __('message.information_about_the_job_ads') }}
<span><img src="{{ asset('assets/announsment.png') }}" style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>
    <!--  <div class="intHead">Who is the interviewee?</div>  -->


<div class="form-group">
        <label class="fName">Secteur entreprise/organisation *</label>

        <select class="form-control form-control-lg" required name="entreprise">

              <option value="Pharmacie d’officine" <?php if ($entreprise == 'Pharmacie d’officine') {?> selected <?php }?> >Pharmacie d’officine</option>
        <option value="Hôpital Clinique" <?php if ($entreprise == 'Hôpital Clinique') {?> selected <?php }?> >Hôpital / Clinique</option>
    <option value="Répartiteur" <?php if ($entreprise == 'Répartiteur') {?> selected <?php }?> >Répartiteur</option>
              <option value="Industrie pharmaceutique" <?php if ($entreprise == 'Industrie pharmaceutique') {?> selected <?php }?> >Industrie pharmaceutique</option>
        <option value="Paraparfumerie Parfumerie" <?php if ($entreprise == 'Paraparfumerie Parfumerie') {?> selected <?php }?> >Paraparfumerie / Parfumerie</option>
   <option value="Université Recherche" <?php if ($entreprise == 'Université Recherche') {?> selected <?php }?> >Université / Recherche</option>
   <option value="Organisation Association Institution ONG" <?php if ($entreprise == 'Organisation Association Institution ONG') {?> selected <?php }?> >Organisation / Association / Institution / ONG</option>
   <option value="Autre" <?php if ($entreprise == 'Autre') {?> selected <?php }?> >Autre</option>

          ?>
        </select>
      </div>

      <div class="form-group">
        <label class="fName">{{ __('message.job_title') }} *</label>
        <?php
$profession = DB::table('profession')->get();
?>
        <select class="form-control form-control-lg" required name="title">
          <!-- <option value="">{{ __('message.job_title') }}</option> -->
          <?php
if (!empty($profession)) {
    foreach ($profession as $key => $value) {
        ?>
              <option value="{{ $value->title }}" <?php if ($value->title == $title) {?> selected <?php }?> >{{ $value->title }}</option>
          <?php
}
}
?>
        </select>
        <!-- <input type="text" class="form-control form-control-lg name-auto-fill-interviewee" id="title" name="title" value="{{ $title }}" placeholder="{{ __('message.enter_name') }}" required="">   -->
      </div>


  <div class="form-group">
        <label class="fName">Type de contrat *</label>

        <select class="form-control form-control-lg" required name="tcontrat">

              <option value="CDI" <?php if ($tcontrat == 'CDI') {?> selected <?php }?> >CDI</option>
        <option value="CDD" <?php if ($tcontrat == 'CDD') {?> selected <?php }?> >CDD</option>
    <!-- <option value="CDI ou CDD" <?php if ($tcontrat == 'CDI ou CDD') {?> selected <?php }?> >CDI ou CDD</option> -->
              <option value="Stage" <?php if ($tcontrat == 'Stage') {?> selected <?php }?> >Stage</option>
        <option value="Apprentissage" <?php if ($tcontrat == 'Apprentissage') {?> selected <?php }?> >Apprentissage</option>

          ?>
        </select>
      </div>


  <div class="form-group">
        <label class="fName">Temps de travail *</label>

        <select class="form-control form-control-lg" required name="travail">

              <option value="Temps plein" <?php if ($travail == 'Temps plein') {?> selected <?php }?> >Temps plein</option>
        <option value="Temps partiel" <?php if ($travail == 'Temps partiel') {?> selected <?php }?> >Temps partiel</option>
    <option value="Autre - Indéfini" <?php if ($travail == 'Autre - Indéfini') {?> selected <?php }?> >Autre - Indéfini</option>


        </select>
      </div>




  <div class="form-group" id="hideoffer" <?php if ($offerdate == 'non précisée') {echo "style=display:none;";}?>>
        <label class="fName">Date d'entrée en fonction *</label>
         <input type="text" id="offer_contract_startDate" name="offer"  value="{{ $offerdate }}"  class="form-control" />
        <ul></ul>
      </div>



    <div class="form-group">
         <input type="checkbox" id="showoffer" name="showoffer" <?php if ($offerdate == 'non précisée') {echo "checked";}?>> Ne pas publier la date d'entrée en fonction
        <ul></ul>
      </div>



      <div class="form-group" <?php if ($utype == 'free') {?>   style="display:none;" <?php }?> id="showurgent">
        <label class="fName">Offre d’emploi urgente ? *</label>

        <select class="form-control form-control-lg" name="urgent">
           <option value="Non" <?php if ($urgent == 'Non') {?> selected <?php }?> >Non</option>
        <option value="Oui" <?php if ($urgent == 'Oui') {?> selected <?php }?> >Oui</option>

        </select>
      </div>


<div class="form-group">
        <label class="fName">Possibilité de logement ? *</label>

        <select class="form-control form-control-lg" name="hosted">
           <option value="Non" <?php if ($urgent == 'Non') {?> selected <?php }?> >Non</option>
        <option value="Oui" <?php if ($urgent == 'Oui') {?> selected <?php }?> >Oui</option>

          ?>
        </select>
      </div>


      <div class="form-group">
        <label class="fName">{{ __('message.job_description') }} *</label>
        <textarea type="text" class="form-control form-control-lg" id="desc" name="desc" placeholder="{{ __('message.enter_desc') }}">{{ $desc }}</textarea>
      </div>


      <input type="hidden" name="old_company_logo" id="old_company_logo" value="{{ $company_logo }}">



    </div>

    <div>
      <button type="submit" value="step_2" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">{{ __('message.save') }}</button>
    </div>
  </form>
  <div class="form-group text-right">

  </div>
  <div class="form-group text-left">
  *{{ __('message.mandatory_fields') }}
</div>
</div>


<div class="step <?php if ($login_type == 'interviewee') {?>disabled-step<?php }?>" id="step-2" >
  <?php if (Session::get('step') == '2') {?>
    @include('layouts.flash-message')
  <?php }?>
<form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep3" id="frmmultistep3"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s3_interviewid" name="s3_interviewid" value="{{ $interviewid }}">
    <div class="detSection">
      <h3 style="padding-top: 6px;">Informations sur l’entreprise / organisation qui publie l’offre d’emploi<span><img src="{{ asset('assets/pin_location-128.png') }}" style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>

  <div class="form-group">
        <label class="fName">Secteur entreprise/organisation *</label>

        <select class="form-control form-control-lg" required name="entreprise1">

              <option value="Pharmacie d’officine" <?php if ($entreprise1 == 'Pharmacie d’officine') {?> selected <?php }?> >Pharmacie d’officine</option>

     <option value="Agence (intérim, recrutement, chasseur de tête)" <?php if ($entreprise1 == 'Agence (intérim, recrutement, chasseur de tête)') {?> selected <?php }?> >Agence (intérim, recrutement, chasseur de tête)</option>
               <option value="Hôpital Clinique" <?php if ($entreprise1 == 'Hôpital Clinique') {?> selected <?php }?> >Hôpital / Clinique</option>
        <option value="Répartiteur" <?php if ($entreprise1 == 'Répartiteur') {?> selected <?php }?> >Répartiteur</option>
    <option value="Industrie pharmaceutique" <?php if ($entreprise1 == 'Industrie pharmaceutique') {?> selected <?php }?> >Industrie pharmaceutique</option>
   <option value="Paraparfumerie Parfumerie" <?php if ($entreprise1 == 'Paraparfumerie Parfumerie') {?> selected <?php }?> >Paraparfumerie / Parfumerie</option>
   <option value="Université Recherche" <?php if ($entreprise1 == 'Université Recherche') {?> selected <?php }?> >Université / Recherche</option>
   <option value="Organisation Association Institution ONG" <?php if ($entreprise1 == 'Organisation Association Institution ONG') {?> selected <?php }?> >Organisation / Association / Institution / ONG</option>
  <option value="Autre" <?php if ($entreprise1 == 'Autre') {?> selected <?php }?> >Autre</option>

          ?>
        </select>
      </div>


      <div class="form-group">
          <label class="fName">Nom de l'entreprise ou organisation *</label>
          <input type="text" class="form-control form-control-lg" id="company" name="company" value="{{ $company }}" placeholder="{{ __('message.enter_comp') }}" required="">
      </div>

  <div class="form-group">
        <label class="fName">{{ __('message.address') }} *</label>
    <input type="text" class="form-control form-control-lg" id="address" name="address" placeholder="Ex. 1, Rue de la Gare" value="{{ $address }}">

      </div>
<div class="form-group">
          <label class="fName">{{ __('message.pincode') }}</label>
          <input type="tel" class="form-control form-control-lg" id="pincode" name="pincode" value="{{ $pincode }}" placeholder="Ex. 75001" >
      </div>
      <div class="form-group">
        <label class="fName">{{ __('message.city') }} *</label>
   <input type="text" class="form-control form-control-lg name-auto-fill-interviewee" id="city" name="city" value="{{ $city }}" placeholder="{{ __('message.enter_city') }}" required="">

      </div>

      <div class="form-group">
          <label class="fName">{{ __('message.state') }} *</label>
          <input type="text" class="form-control form-control-lg" id="state" name="state" value="{{ $state }}" placeholder="{{ __('message.enter_state') }}" onkeyup="hello(this.value);" required="">
    <div id="filter_result">
    </div>
      </div>

      <div class="form-group">
        <label class="fName">E-mail de contact * (e-mail apparaissant sur votre offre d'emploi)  *</label>
          <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $email }}" placeholder="Entrez votre e-mail" required="">
      </div>

      <div class="form-group">
          <label class="fName">Tél. * (no de tél. apparaissant sur votre offre d'emploi)</label>
          <input type="tel" class="form-control form-control-lg" id="phone" name="phone" value="{{ $phone }}" placeholder="Entrez votre téléphone" required="">
      </div>

   <div class="form-group">
        <label class="fName">Site internet ou page (ex. Facebook, LinkedIn) de la pharmacie</label>
  <div class="row">
        <div class="col-sm-3 nopadding">

        <select name="http" id="http" class="form-control form-control-lg">
         <option value="https://" <?php if ($http == 'https://') {?> selected <?php }?>>https://</option>
          <option value="http://" <?php if ($http == 'http://') {?> selected <?php }?>>http://</option>
          
        </select>
      </div>
      <div class="col-sm-9 nopadding">
        <input type="text" class="form-control form-control-lg" id="linkd" name="linkd" value="{{ $linkd }}" placeholder="Votre site Internet ou page Facebook" >
      </div>
      </div>
  </div>

    </div>



    <div>
      <button type="submit" value="step_3" name="btn_step" id="btn_step" class="btn btn-green pop_submit" style="width:21% !important;float: left;">{{ __('message.save') }}</button>
    </div>

</form>
<div class="form-group text-right">

  </div>
</div>


<div class="step" id="step-3">

    <?php if (Session::get('step') == '3') {?>
    @include('layouts.flash-message')
  <?php }?>

  <form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep4" id="frmmultistep4"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s4_interviewid" name="s4_interviewid" value="{{ $interviewid }}">

  <div class="detSection">

     <h3 style="padding-top: 6px;">{{ __('message.job_ads_preview') }}<span><img src="{{ asset('assets/eyes.png') }}" style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>



        <div class="form-group">
    <label class="disabled-lable"> {{ __('message.job_description') }} </label>
    <textarea type="text" class="disabled"  name="desc" style="height:70px !important;"><?php echo strip_tags($desc); ?> </textarea>
        </div>


    <div class="form-group" <?php if ($utype == 'free') {?>style="display:none;" <?php }?> id="showprice">
    <b>Prix total : 49 euros</b>
        </div>



    <div class="form-group">

    En cliquant sur Accepter et publier mon offre, vous acceptez les <a href="https://www.pharmapro.fr/cg" target="blank" style="color:#469c0b;"><u>Conditions d’utilisation</u></a> et la <a href="https://www.pharmapro.fr/politique-de-confidentialite" target="blank" style="color:#469c0b;"><u>Politique de confidentialité</u></a> de Pharmapro.fr.

        </div>





  </div>




  <div class="form-group text-right">

    <button type="submit" value="step_4" name="btn_step" id="btn_step" class="btn btn-green pop_submit" style="width:21% !important;float: right;">{{ __('message.publiser') }}</button>
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

<div class="footer" <?php if ($utype == 'free' || $utype == "") {?>style="display:none;" <?php }?> id="showpricebarpaid">
<p style="font-size:20px;padding-top: 20px;padding-bottom: 10px;">49 euros TTC <br /><br /><span style="font-size:16px;">La facture vous parviendra par la poste ou vous pourrez payer par PayPal<span></p>



</div>

<div class="footer1"  <?php if ($utype == 'paid' || $utype == "") {?>style="display:none;" <?php }?>  id="showpricebarfree">
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
            <input type="text" name="pop_name" value="" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Name" required id="pop_name" >
            <input type="text" name="pop_email" value="" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Email" id="pop_email" required>
            <input type="text" name="pop_note" value="" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Note" id="pop_note" required>
            <button type="button" value="send_email" name="btn_step" id="send_email" class="btn btn-green" style="width:21% !important;padding: 1px !important;">Send</button>
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
<style type="text/css">
  .disabled{
    pointer-events: none;
    /*opacity: 0.5;*/
    border:none !important;
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

  .disabled-step{
    pointer-events: none;
    border:none !important;
    resize: none;
  }
  .disabled-chk{
    pointer-events: none;
    opacity: 0.5;
  }
  .disabled-div{
    display: none;
  }
  #interview_with{
    border: none;
    color: #2771b8;
    font-size: 37px;
    font-weight: 600;
    /*margin-bottom: 8px;*/
    /*width: 450px;*/
    background: transparent;
        margin-top: -5px;
  }
  .feildForm textarea.disabled{padding: 0px 0px 0px;
        vertical-align: top;
        resize:none;}

</style>

<script type="text/javascript">

function hello(id)
{

if(id != "")
{

  if(!id.match(/^\d+/))
        {
  alert("Only number is allowed");
  document.getElementById("state").value = "";
  }

  $('#filter_result').show();

  var profession_val = id;

   $.ajax({
        url: '{!! url("/job_filter_process") !!}',
        data: {
      'profession_val': profession_val, _token:"{{csrf_token()}}"
        },
        type: "POST",
        success: function(data) {
    $('#filter_result').html(data);
        }
      });

}


}

function getval(valu)
{
$('#filter_result').hide();
$('#state').val(valu);
}


</script>


<script src="{{ asset('assets/jquery.datetimepicker.full.min.js') }}"></script>


<script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <!-- <script>
        CKEDITOR.replace( 'desc' );
    </script> -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.6/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea#desc'});</script>
<script type="text/javascript">
  $('#link-step-1').click(function(e){
      $('#li-step-2').addClass('resp-tab-active');
      $('#li-step-2').click();
      $(window).scrollTop(0);
  });
<?php
if ($login_type == 'interviewee') {?>
  $('#link-step-2').click(function(e){
      $('#li-step-3').addClass('resp-tab-active');
      $('#li-step-3').click();
      $(window).scrollTop(0);
  });
<?php } else {?>
  $('#link-step-2').click(function(e){
      $('#li-step-3').addClass('resp-tab-active');
      $('#li-step-3').click();
      $(window).scrollTop(0);
  });
<?php }?>

  $('#link-step-3').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });

  $('#link-step-4').click(function(e){
      $('#li-step-5').addClass('resp-tab-active');
      $('#li-step-5').click();
      $(window).scrollTop(0);
  });
<?php
if ($login_type == 'interviewee') {?>
  $('#link-step-5').click(function(e){
      $('#li-step-6').addClass('resp-tab-active');
      $('#li-step-6').click();
      $(window).scrollTop(0);
  });
<?php } else {?>
  $('#link-step-5').click(function(e){
      $('#li-step-6').addClass('resp-tab-active');
      $('#li-step-6').click();
      $(window).scrollTop(0);
  });
<?php }?>

<?php
if ($login_type == 'interviewee') {?>
  $('#link-step-6').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });
<?php } else {?>
  $('#link-step-6').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });
<?php }?>
  $('.more-field').click(function(){
    var id = incr();
    $("#sortable").append(
        '<li><div class="dotted-border"><div class="form-group"><label class="fName">Question '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que['+id+'][question]" placeholder=""></textarea></div><div class="form-group"><label class="fName">Note '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que['+id+'][notes]" placeholder="" ></textarea></div></div><hr style="border-color: #00bf6f;"></li>'
        );
  });

  var incr = (function () {
  var count = '<?php echo $que_note_count; ?>';
  if(count == 0){
    var i = 3;
  }else{
    var i = parseInt(count) + 1;
  }


    return function () {
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



<script type="text/javascript">




 $(document).ready(function () {


    $('input[type="radio"]').click(function(){

    if($(this).prop("checked") == true){

      var radioValue = $("input[name='paid']:checked"). val();

        if(radioValue == 'paid')
        {
        $('#showprice').show();
        $('#showurgent').show();
        $('#showpricebarpaid').show();
        $('#showpricebarfree').hide();
        }else{
        $('#showprice').hide();
        $('#showurgent').hide();
        $('#showpricebarpaid').hide();
        $('#showpricebarfree').show();
        }


        }


    });


    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
          // $('#hideoffer').html("");
       $('#hideoffer').hide();
        }
        else if($(this).prop("checked") == false){

      var ht = " <label class='fName'>Date d'entrée en fonction *</label><input type='text' id='offer_contract_startDate' name='offer'  value='{{ $offerdate }}' required='required' class='form-control'> <ul></ul>";
      $('#hideoffer').show();

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
                    minDate : 'now',
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
      email:"",
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

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
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

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
    }
  });

  $("#frmmultistep3").validate({
    rules: {
      //s3_que: "required",
      "s3_que[1][question]" : "required",
      /*"s3_que[1][notes]" : "required",*/
      "s3_que[2][question]" : "required",
      /*"s3_que[2][notes]" : "required",*/
      //s3_note: "required",

    },
    messages: {
      "s3_que[1][question]" : "",
      /*"s3_que[1][notes]" : "",*/
      "s3_que[2][question]" : "",
      /*"s3_que[2][notes]" : "",*/
    },

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
    }
  });

  $('#send_email').click(function(){
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
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    //$( "#sortable" ).disableSelection();
  } );

  $(function() {
    $(".name-auto-fill").autocomplete({
        source: '{!! url("name_auto_fill") !!}',
        select: function( event, ui ) {
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
                if(data.profile_pic != null){
                  $('.auto-logo').attr('src',src);
                  $('#old_logo').val(data.profile_pic);
                }
              }
          });
        }
    });

    $(".name-auto-fill-interviewee").autocomplete({
        source: '{!! url("name_auto_fill_interviewee") !!}',
        select: function( event, ui ) {
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
                if(data.profile_pic != null){
                  $('.auto-logo2').attr('src',src);
                  $('#s2_old_logo').val(data.profile_pic);
                }
              }
          });
        }
    });
  });
  $('#no_deadline').change(function(){

    if(!$('#no_deadline').is(':checked')){
      $('#deadline_div').show();
      //$('#deadlinedate').val('');
    }else{
      $('#deadline_div').hide();
    }
  });

  $('#no_deadline').change();
  var select_all_interviewer = document.getElementById("select-interviewer");
  var checkboxes_interviewer = document.getElementsByClassName("checkbox-interviewer");

  select_all_interviewer.addEventListener("change", function(e){
    for (i = 0; i < checkboxes_interviewer.length; i++) {
      checkboxes_interviewer[i].checked = select_all_interviewer.checked;
    }
  });

  for (var i = 0; i < checkboxes_interviewer.length; i++) {
    checkboxes_interviewer[i].addEventListener('change', function(e){ //".checkbox" change
      if(this.checked == false){
        select_all_interviewer.checked = false;
      }
      if(document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewer.length){
        select_all_interviewer.checked = true;
      }
    });
  }

  var select_all_interviewee = document.getElementById("select-interviewee");
  var checkboxes_interviewee = document.getElementsByClassName("checkbox-interviewee");

  select_all_interviewee.addEventListener("change", function(e){
    for (i = 0; i < checkboxes_interviewee.length; i++) {
      checkboxes_interviewee[i].checked = select_all_interviewee.checked;
    }
  });

  for (var i = 0; i < checkboxes_interviewee.length; i++) {
    checkboxes_interviewee[i].addEventListener('change', function(e){ //".checkbox" change
      if(this.checked == false){
        select_all_interviewee.checked = false;
      }
      if(document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewee.length){
        select_all_interviewee.checked = true;
      }
    });
  }

  if($('.checkbox-interviewee:checked').length == $('.checkbox-interviewee').length){
    $('#select-interviewee').attr('checked','checked');
  }
  if($('.checkbox-interviewer:checked').length == $('.checkbox-interviewer').length){
    $('#select-interviewer').attr('checked','checked');
  }


  //$('#no_deadline').click();
  </script>
