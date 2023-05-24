@include('layouts.header')
<link href="{{ asset('assets/jquery.datetimepicker.css') }}" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<link href="{{ asset('assets/style.css') }}" rel="stylesheet" />
 
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
</style>
<?php
$login_user_id = session('user_id');
$login_type = session('login_type');
$serviceid = "";
$address   = "";
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
                              <?php if ($utype == 'free') {echo "checked";}?>>
                            <label class="custom-control-label" for="paid">Gratuit</label>
                          </div>
                          <p>Votre offre d’emploi gratuite inclut :</p>
                          <ul>
                            <li>Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
                            <li>Programmation pour apparaître dans <br />« Google for Jobs »</li>
                          </ul>
                        </div>
                        <div class="rpart two-part">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="paid1" name="paid" value="paid"
                              <?php if($utype == 'paid') {echo "checked";}?>>
                            <label class="custom-control-label" for="paid1">Premium - €49 (TTC)</label>
                          </div>
                          <p>Pour renforcer sa visibilité, votre offre d’emploi Premium inclut :</p>
                          <ul class="border-bottom">
                            <li>Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
                            <li>Programmation pour apparaître dans <br />« Google for Jobs »</li>
                          </ul>
                          <ul>
                            <li>Apparition en <strong>tête de liste</strong> en vert et en gras pendant 7 jours</li>
                            <li>Possibilité de rajouter le texte <strong>URGENT</strong> en rouge sur votre offre et
                              dans les listes pendant 14 jours</li>
                            <li>Envoi dans notre <strong>newsletter</strong></li>
                            <li>Suggestion de votre offre en bas d’offres similaires de votre région</li>
                            <li>Création de votre offre d’emploi sous forme d’infographie <strong>Instagram</strong> et
                              diffusion sur nos réseaux sociaux </li>
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
                          style="cursor: pointer;font-size: 19px;font-weight: bold; padding-top: 14px;">Choisir un PDF
                          <?php if($desc1 != '' ) { ?>({{ $desc1 }}) <?php } ?></label>
                        <input type="file" id="descfile" name="descfile" style="visibility:hidden;" value="{{ $desc1 }}"
                          placeholder="{{ $desc1 }}">
                        <span><a href="<?php echo env('APP_URL').'resume/'.$desc1 ?>" target="_blank">Voir</a></span>
                        <span> | <a href="<?php echo env('APP_URL1').'pdfdelete/'.$interviewid ?>">Effacer</a></span>
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
                        <label class="fName">Secteur entreprise/organisation *</label>
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
                      <div class="form-group">
                        <label class="fName">{{ __('message.job_title') }} *</label>
                        <?php $profession = DB::table('profession')->get(); ?>
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
                      <div class="form-group" id="hideoffer"
                        <?php if ($offerdate == 'non précisée') {echo "style=display:none;";}?>>
                        <label class="fName">Date d'entrée en fonction *</label>
                        <input type="text" onkeyup="entrepriseChange('val');" id="offer_contract_startDate" name="offer" value="{{ $offerdate }}"
                          class="form-control" />
                        <ul></ul>
                      </div>
                      <div class="form-group">
                        <input type="checkbox" id="showoffer" name="showoffer"
                          <?php if ($offerdate == 'non précisée') {echo "checked";}?>> Ne pas publier la date d'entrée
                        en fonction
                        <ul></ul>
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
                        <label class="fName">Description de l'offre (champ facultatif) {{-- {{ __('message.job_description') }} --}} *<br /><span
                            style="font-weight:normal;">N'oubliez pas de mentionner vos coordonnées de contact (ex.
                            e-mail, tél.)</span></label>
                        <textarea type="text" class="form-control form-control-lg" id="desc" name="desc" onkeyup="entrepriseChange('val');" 
                          placeholder="{{ __('message.enter_desc') }}">{{ $desc3 }}</textarea>
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
                        <label class="fName"> Téléphone de contact * : </label>
                        <input type="text" onkeyup="entrepriseChange('key');" value="{{ $phone }}" name="phone" id="phone" class="form-control form-control-lg"  required/>
                      </div>
                      <h3 style="padding-top: 6px;">Informations sur l’entreprise / organisation qui publie l’offre
                        d’emploi<span><img src="{{ asset('assets/pin_location-128.png') }}"
                            style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>

                        <div class="form-group">
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
                        <div class="form-group">
                          <label class="fName">Nom de l'entreprise ou organisation *</label>
                          <input type="text" class="form-control form-control-lg" id="company" name="company" onkeyup="steptwoChange('key');" value="{{ $company }}" placeholder="{{ __('message.enter_comp') }}" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.address') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="address" name="address"
                            placeholder="Ex. 1, Rue de la Gare" value="{{ $address }}">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.pincode') }}</label>
                          <input type="tel" class="form-control form-control-lg" id="pincode" name="pincode"
                            value="{{ $pincode }}" placeholder="Ex. 75001">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.city') }} *</label>
                          <input type="text" class="form-control form-control-lg name-auto-fill-interviewee" id="city" onkeyup="steptwoChange('key');" name="city" value="{{ $city }}" placeholder="{{ __('message.enter_city') }}" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.state') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="state" name="state" value="{{ $state }}" placeholder="{{ __('message.enter_state') }}"
                            onkeyup="hello(this.value);" required="">
                          <div id="filter_result">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="fName">Site internet ou page (ex. Facebook, LinkedIn) de la pharmacie</label>
                          <div class="row">
                            <div class="col-sm-3">
                              <select name="http" id="http" class="form-control form-control-lg">
                                <option value="https://" <?php if ($http == 'https://') {?> selected <?php }?>>https://
                                </option>
                                <option value="http://" <?php if ($http == 'http://') {?> selected <?php }?>>http://
                                </option>
                              </select>
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control form-control-lg" id="linkd" name="linkd" value="{{ $linkd }}" placeholder="Votre site Internet ou page Facebook">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="detSection jobdataSec <?php if($job_desc_type == 2 || $job_desc_type == "") { echo "secWidth";} ?> " <?php if($job_desc_type != 2 || $job_desc_type != "") { ?> style="display: none;" <?php }?>>
                      <div class="jobDescription"> Votre offre d'emploi</div>
                      <div class="cityClass"> {{ $city }} ({{ $state }})</div>
                      <div class="companyClass">@if(!empty($company)) La {{ $company }} recherche un/e @endif</div>
                      <div class="titleClass">{{ $title }} {{ ' ' }} {{ $tcontrat }}</div>
                      <div class="complimentClass">{{$jobdataCompliment}}</div>
                      <div class="travailClass">@if(!empty($travail))Temps de travail : {{$travail}} @endif</div>
                      <div class="complimenttravailClass">{{$complimenttravail}}</div>
                      <div class="descClass">{!! $desc3 !!}</div>
                      <div class="offer_contract_startDateClass">@if(!empty($offerdate))Date d’entrée en fonction : {{ $offerdate }} @endif</div>
                      <div class="emailClass">@if(!empty($email)) E-mail de contact : {{ $email }} @endif</div>
                      <div class="phoneClass">@if(!empty($phone)) Téléphone de contact : {{ $phone }} @endif</div>
                        @if(!empty($jobdataImg))
                          <img src="{{ asset('desc_image/'.$jobdataImg) }}" id="selectedImage" style="max-height:100px">
                        @else
                          <img src="#" style="display:none" class="selectedImage" style="max-height:100px">
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
                        <span class="spcls"><img src="{{ asset('assets/calendar.png') }}"
                            style="float: left;margin: 2px 5px 0px 0px;"> <span style="float:left;margin-right: 5px;">Offre publiée :
                            {{ $offerPublished }}</span>
                          <?php if(isset($urgent) && $urgent == 'Oui'){ ?>
                          <font style="border: 1px solid red;color: red;padding: 6px;vertical-align:top;" class="cls_urgent">URGENT
                          </font>
                          <?php } ?>
                        </span>
                        <span class="spcls5"> Entrée en fonction : {{ $offerdateJob }}</span>
                        <span class="spcls2"><img src="{{ asset('assets/images/document.png') }}"
                            style="float: left;margin: 2px 5px 0px 0px;">{{ $tcontrat }} </span>
                        <span class="spcls3"><img src="{{ asset('assets/hourglass.png') }}"
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
                            <p><strong class="cityClass">{{ $city }} ({{ $state }}) </strong></p>
                            <div class="companyClass">@if(!empty($company)) La {{ $company }} recherche un/e @endif</div>
                            <div class="titleClass">{{ $title }} {{ ' ' }} {{ $tcontrat }} @if($title == '' || $tcontrat == '') Pharmacien (H/F) CDI @endif</div>
                            <div class="complimentClass">{{$jobdataCompliment}}</div>
                            <div class="travailClass">Temps de travail : @if(!empty($travail)){{$travail}} @else Temps plein @endif</div>
                              <div class="complimenttravailClass">{{$complimenttravail}}</div>
                            <?php if($job_desc_type == 1) { ?>
                            <p style="padding-bottom:0px;"><iframe
                                src="<?php echo 'https://www.pharmapro.fr/resume/'.$jobdata->job_desc; ?>" width="100%"
                                height="650px;" name="page"></iframe></p>
                            <?php } ?>
                            <?php if($job_desc_type == 2 || $job_desc_type == "") { ?>
                            <p style="padding-bottom:0px;" class="descClass"> {!! $desc3 !!}</p>
                            <?php } ?>
                            <?php if($job_desc_type == 3) { ?>
                            <p style="padding-bottom:0px;"><iframe src="<?php echo $jobdata->job_desc; ?>" width="100%"
                                height="650px;" name="page"></iframe></p>
                            <?php } ?>

                              <p class="emailClass">@if(!empty($email)) E-mail de contact : {{ $email }} @endif</p>
                        <p class="phoneClass">@if(!empty($phone)) Téléphone de contact : {{ $phone }} @endif</p>
                        @if(!empty($jobdataImg))
                          <img src="{{ asset('desc_image/'.$jobdataImg) }}" id="selectedImage" style="max-height:100px">
                        @else
                          <img src="#" style="display:none" class="selectedImage" style="max-height:100px">
                        @endif
                            <p style="border-top: 1px solid #ccc; margin-top: 20px"></p>
                            <p>
                              <div style="width:40%;float:left;">
                                <span class="companyClass">{{ $company }} </span> pharmacie<br />
                                <span class="companyClass">{{ $address }}  </span><br />
                                <span class="pincodeClass">{{ $pincode }}  </span> {{ ' ' }}
                                <span class="cityClass2">{{ $city }} </span><br />
                                <?php if($linkd != "" ) { echo "<a class='link_text' href='javascript:void(0);' onclick=showme('".$http.$linkd."')>".$linkd."</a>" ; } ?>
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
      if ($('#offer_contract_startDate').val() != '') {
        $('.offer_contract_startDateClass').html('Date d’entrée en fonction : ' + $('#offer_contract_startDate').val());
      }
      if ($('#email').val() != '') {
        $('.emailClass').html('E-mail de contact : '+$('#email').val());
      }
      if ($('#phone').val() != '') {
        $('.phoneClass').html('Téléphone de contact : '+$('#phone').val());
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
  tinymce.init({
    selector: 'textarea#desc',
    setup: function (editor) {
        editor.on('keyup', function (e) {
            $('.descClass').html(editor.getContent());
            //custom logic  
        });
    }
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
    $('#onloadactive').click();
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
    $('input[type="checkbox"]').click(function() {
      if ($(this).prop("checked") == true) {
        $('#hideoffer').hide();
        $('.offer_contract_startDateClass').html("");
      } else if ($(this).prop("checked") == false) {
        $('#hideoffer').show();
        $('.offer_contract_startDateClass').html('Date d’entrée en fonction : ' + $('#offer_contract_startDate').val());
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