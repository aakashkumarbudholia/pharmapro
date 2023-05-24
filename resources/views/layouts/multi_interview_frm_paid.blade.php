@include('layouts.header')
<script src='https://www.google.com/recaptcha/api.js?hl=fr'></script>
<link href="{{ asset('assets/jquery.datetimepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/style2.css') }}" rel="stylesheet" />
<?php
$login_type = session('login_type');
$serviceid = "";
$address = "";
$city = "";
$state = "";
$country = "";
$pincode = "";
$title = "Pharmacien (H/F)";
$desc = "";
$company = "";
$company_logo = "";
$company_desc = "";
$email = ""; 
$phone = "";
$note = "";
$link = "";
$fb = "";
$tweet = "";
$insta = "";
$linkd = "";
$logo = "";
$s2_logo = "";
$que_note_count = 0;
$tcontrat = "CDI";
$travail = "Temps plein";
$job_desc_type        = "";
$offerdate = "";
$utype = "";
if(!empty($jobdata->user_type))
{
$utype = $jobdata->user_type ;
}
if(!empty($jobdata->offerdate))
{
$offerdate = $jobdata->offerdate ;
}
$entreprise = "";
$entreprise1 = "";
if (!empty($jobdata->job_desc_type)) {
   $job_desc_type = $jobdata->job_desc_type;
} else {
   $job_desc_type = "";
}
if(!empty($jobdata->entreprise1))
{
$entreprise1 = $jobdata->entreprise1 ;
}
if(!empty($jobdata->entreprise))
{
$entreprise = $jobdata->entreprise ;
}
if(!empty($jobdata->travail))
{
$travail = $jobdata->travail ;
}
if(!empty($jobdata->tcontrat))
{
$tcontrat = $jobdata->tcontrat ;
}
if(!empty($jobdata->service))
{
$serviceid = $jobdata->service ;
}
if(!empty($jobdata->job_title))
{
$title = $jobdata->job_title ;
}
if(!empty($jobdata->job_desc))
{
$desc = $jobdata->job_desc;
}
if(!empty($jobdata->urgent))
{
$urgent = $jobdata->urgent;
}else{
  $urgent = '';
}
if(!empty($jobdata->company))
{
$company = $jobdata->company;
}
if(!empty($jobdata->company_logo))
{
$company_logo = $jobdata->company_logo;
}
if(!empty($jobdata->company_desc))
{
$company_desc = $jobdata->company_desc;
}
if(!empty($jobdata->email))
{
$email = $jobdata->email;
}
if(!empty($jobdata->phone))
{
$phone = $jobdata->phone;
}
if(!empty($jobdata->note))
{
$note = $jobdata->note;
}
if(!empty($jobdata->link))
{
$link = $jobdata->link;
}
if(!empty($jobdata->fb))
{
$fb = $jobdata->tweet;
}
if(!empty($jobdata->linkd))
{
$linkd = $jobdata->linkd;
}
if(!empty($jobdata->tweet))
{
$tweet = $jobdata->tweet;
}
if(!empty($jobdata->insta))
{
$insta = $jobdata->insta;
}
if(!empty($jobdata->address))
{
$address = $jobdata->address;
}
if(!empty($jobdata->city))
{
$city = $jobdata->city;
}
if(!empty($jobdata->country))
{
$country = $jobdata->country;
}
if(!empty($jobdata->state))
{
$state = $jobdata->state;
}
if(!empty($jobdata->pincode))
{
$pincode = $jobdata->pincode;
}
if(!empty($interviewdata->name))
{
$name = $interviewdata->name ;
}
if(!empty($interviewdata->lname))
{
$lname = $interviewdata->lname ;
}
  $url = 'formulaire/' ;
?>
@if ($message = Session::get('exist_error'))
<div id="exist_error" class="modal fade bd-example-modal-sm" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
    padding: 5px 10px;
">
        <button type="button" class="close" data-dismiss="modal" onclick="gotologin();">&times;</button>
      </div>
      <div class="modal-body">
        <strong>{{ $message }}</strong>
      </div>
    </div>
  </div>
</div>
@endif
<form class="feildForm" runat="server" action="{{ url($url) }}" name="frmmultistep1" id="frmmultistep1" method="POST"
  enctype="multipart/form-data">
  @csrf
  <section class="multiFormArea" style="padding-top: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="multiForm">
            <div id="multiFormTab">
              <ul class="resp-tabs-list" style="display: none;">
                <li>
                </li>
                <li>
                </li>
                <li>
                </li>
              </ul>
              <div class="resp-tabs-container" style="margin-top: 5px !important;">
                <div>
                  <?php if(Session::get('step') == '2'){ ?>
                  @include('layouts.flash-message')
                  <?php } ?>
                  <div>
                    <div class="offer-section">
                      <h3 style="padding:10px; margin-bottom:40px;">Choisissez votre type d'offre d'emploi</h3>
                      <h4 style="padding:10px; margin-bottom:40px;"><span
                          style="color:red;font-weight: bold;">!</span><b> Si vous avez déjà un compte employeur,</b> <a
                          href="https://www.pharmapro.fr/login" style="color:#469c0b;font-weight: bold;">cliquez ici
                          pour vous connecter</a></h4>
                      <div class="inner-center">
                        <div class="lpart two-part">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="paid" name="paid" value="free" checked>
                            <label class="custom-control-label" for="paid">Gratuit</label>
                          </div>
                          <p>Votre offre d’emploi gratuite inclut les fonctions suivantes :</p>
                          <ul>
                            <li>Publication sur Pharmapro.fr pendant <strong>35 jours</strong></li>
                            <li>Programmation pour apparaître dans <br />« Google for Jobs »</li>
                          </ul>
                        </div>
                        <div class="rpart two-part">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="paid1" name="paid" value="paid">
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
                    <input type="hidden" id="descoptionvalue" name="descoptionvalue" value="1">
                        <h3 style="padding-top: 6px;">{{ __('message.information_about_the_job_ads') }}
                          <span><img src="{{ asset('assets/announsment.png') }}"
                              style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span>
                        </h3>
                        <div class="form-group">
                          <div class="custom-tab">
                            <p>Comment souhaitez-vous publier votre offre d'emploi ?</p>
                            <div class="eq-part">
                              <div class="pdf eq">
                                <a href="javascript:void(0);" onclick="showoption(2)" class="descoption textoption active" id="onloadactive">
                                  <img class="img-fluid"
                                    src="{{ asset('assets/layouts/layout4-pub/front/images/writing.png') }}" /><span
                                    class="big">Publier avec texte (et champs automatiques)</span></a>
                              </div>
                              <div class="pdf eq">
                                <a href="javascript:void(0);" onclick="showoption(1)" class="descoption pdfoption">
                                  <img class="img-fluid"
                                    src="{{ asset('assets/layouts/layout4-pub/front/images/pdf.png') }}" /><span
                                    class="big">Publier avec un PDF</span></a>
                              </div>
                              <div class="pdf eq">
                                <a href="javascript:void(0);" onclick="showoption(3)" class="descoption linkoption ">
                                  <img class="img-fluid"
                                    src="{{ asset('assets/layouts/layout4-pub/front/images/world.png') }}" /><span
                                    class="big">Lien direct<br /><span class="small">Publier avec un lien externe
                                      :</span></span></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group" id="pdf">
                          <label class="fName">Publier un fichier PDF</label>
                          <input type="file" id="descfile" name="descfile" value="">
                        </div>
                        <div class="form-group" id="link" style="display:none;">
                          <label class="fName">Publier avec un lien</label>
                          <input type="text" class="form-control form-control-lg" id="desclink" name="desclink" value=""
                            placeholder="Ex. http://websiteurl.com">
                        </div>

                    <section id="parentDiv">
                      <div class="detSection">
                        <div class="form-group">
                          <label class="fName">Secteur entreprise/organisation *</label>
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" id="entreprise" required name="entreprise">
                            <option value="Pharmacie d’officine" <?php if($entreprise == 'Pharmacie d’officine'){ ?>
                              selected <?php } ?>>Pharmacie d’officine</option>
                            <option value="Hôpital Clinique" <?php if($entreprise == 'Hôpital Clinique'){ ?> selected
                              <?php } ?>>Hôpital / Clinique</option>
                            <option value="Répartiteur" <?php if($entreprise == 'Répartiteur'){ ?> selected <?php } ?>>
                              Répartiteur</option>
                            <option value="Industrie pharmaceutique"
                              <?php if($entreprise == 'Industrie pharmaceutique'){ ?> selected <?php } ?>>Industrie
                              pharmaceutique</option>
                            <option value="Paraparfumerie Parfumerie"
                              <?php if($entreprise == 'Paraparfumerie Parfumerie'){ ?> selected <?php } ?>>Paraparfumerie
                              / Parfumerie</option>
                            <option value="Université Recherche" <?php if($entreprise == 'Université Recherche'){ ?>
                              selected <?php } ?>>Université / Recherche</option>
                            <option value="Organisation Association Institution ONG"
                              <?php if($entreprise == 'Organisation Association Institution ONG'){ ?> selected <?php } ?>>
                              Organisation / Association / Institution / ONG</option>
                            <option value="Autre" <?php if($entreprise == 'Autre'){ ?> selected <?php } ?>>Autre</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.job_title') }} *</label>
                          <?php
                            $profession = DB::table('profession')->get();
                            ?>
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" id="title" required name="title">
                            <?php
                            if(!empty($profession)){
                              foreach ($profession as $key => $value) {
                            ?>
                            <option value="{{ $value->title }}" <?php if($value->title == $title){ ?> selected <?php } ?>>
                              {{ $value->title }}</option>
                            <?php
                                }
                              }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="fName">Type de contrat *</label>
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" required name="tcontrat" id="tcontrat">
                            <option value="CDI" <?php if($tcontrat == 'CDI'){ ?> selected <?php } ?>>CDI</option>
                            <option value="CDD" <?php if($tcontrat == 'CDD'){ ?> selected <?php } ?>>CDD</option>
                            <!-- <option value="CDI ou CDD" <?php if($tcontrat == 'CDI ou CDD'){ ?> selected <?php } ?> >CDI ou CDD</option> -->
                            <option value="Stage" <?php if($tcontrat == 'Stage'){ ?> selected <?php } ?>>Stage</option>
                            <option value="Apprentissage" <?php if($tcontrat == 'Apprentissage'){ ?> selected <?php } ?>>
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
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" required id="travail" name="travail">
                            <option value="Temps plein" <?php if($travail == 'Temps plein'){ ?> selected <?php } ?>>Temps
                              plein</option>
                            <option value="Temps partiel" <?php if($travail == 'Temps partiel'){ ?> selected <?php } ?>>
                              Temps partiel</option>
                            <option value="Autre - Indéfini" <?php if($travail == 'Autre - Indéfini'){ ?> selected
                              <?php } ?>>Autre - Indéfini</option>
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
                          <?php if($offerdate == 'non précisée') { echo "style=display:none;"; } ?>>
                          <label class="fName">Date d'entrée en fonction *</label>
                          <input type="text" id="offer_contract_startDate" onkeyup="entrepriseChange('val')" name="offer" value="{{ $offerdate }}"
                            class="form-control" />
                          <ul></ul>
                        </div>
                        <div class="form-group">
                          <input type="checkbox" id="showoffer" name="showoffer"
                            <?php if($offerdate == 'non précisée') { echo "checked"; } ?>> Ne pas publier la date d'entrée
                          en fonction
                          <ul></ul>
                        </div>
                        <div class="form-group" style="display:none;" id="showurgent">
                          <label class="fName">Offre d’emploi urgente ?</label>
                          <select class="form-control form-control-lg" name="urgent">
                            <option value="Non" <?php if($urgent == 'Non'){ ?> selected <?php } ?>>Non</option>
                            <option value="Oui" <?php if($urgent == 'Oui'){ ?> selected <?php } ?>>Oui</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="fName">Possibilité de logement ? *</label>
                          <select class="form-control form-control-lg" name="hosted">
                            <option value="Non" <?php if($urgent == 'Non'){ ?> selected <?php } ?>>Non</option>
                            <option value="Oui" <?php if($urgent == 'Oui'){ ?> selected <?php } ?>>Oui</option>
                          </select>
                        </div>

                        <div class="form-group" id="text" style="display:none;">
                          <label class="fName">Description de l'offre (champ facultatif)<br /><span
                            style="font-weight:normal;">N'oubliez pas de mentionner vos coordonnées de contact (ex.
                            e-mail, tél.)</span></label>
                          <textarea type="text" onchange="entrepriseChange('val')" class="form-control form-control-lg" id="desc" name="desc"
                            placeholder="{{ __('message.enter_desc') }}"></textarea>
                            <label class="fName" style="margin-top:15px">Publier une image en bas de l'offre d'emploi</label>
                        
                          <label for="desc_image">Choisir une image</label>
                          <div>
                            <label class="custom-file-upload">Choisir l'image
                            <input type="file" onchange="readURL(this);" id="desc_image" hidden name="desc_image" value="" ></label>
                              
                          </div>
                        </div>
                        <h3 style="padding-top: 6px;">Informations sur l’entreprise / organisation qui publie l’offre
                          d’emploi<span><img src="{{ asset('assets/pin_location-128.png') }}"
                              style="width:35px;float:right;padding-top: 3px;padding-right: 4px;"></span></h3>
                        <div class="form-group">
                          <label class="fName">Secteur entreprise/organisation *</label>
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" required id="entreprise1" name="entreprise1">
                            <option value="Pharmacie d’officine" <?php if($entreprise1 == 'Pharmacie d’officine'){ ?>
                              selected <?php } ?>>Pharmacie d’officine</option>
                            <option value="Agence (intérim, recrutement, chasseur de tête)"
                              <?php if($entreprise1 == 'Agence (intérim, recrutement, chasseur de tête)'){ ?> selected
                              <?php } ?>>Agence (intérim, recrutement, chasseur de tête)</option>
                            <option value="Hôpital Clinique" <?php if($entreprise1 == 'Hôpital Clinique'){ ?> selected
                              <?php } ?>>Hôpital / Clinique</option>
                            <option value="Répartiteur" <?php if($entreprise1 == 'Répartiteur'){ ?> selected <?php } ?>>
                              Répartiteur</option>
                            <option value="Industrie pharmaceutique"
                              <?php if($entreprise1 == 'Industrie pharmaceutique'){ ?> selected <?php } ?>>Industrie
                              pharmaceutique</option>
                            <option value="Paraparfumerie Parfumerie"
                              <?php if($entreprise1 == 'Paraparfumerie Parfumerie'){ ?> selected <?php } ?>>Paraparfumerie
                              / Parfumerie</option>
                            <option value="Université Recherche" <?php if($entreprise1 == 'Université Recherche'){ ?>
                              selected <?php } ?>>Université / Recherche</option>
                            <option value="Organisation Association Institution ONG"
                              <?php if($entreprise1 == 'Organisation Association Institution ONG'){ ?> selected
                              <?php } ?>>Organisation / Association / Institution / ONG</option>
                            <option value="Autre" <?php if($entreprise1 == 'Autre'){ ?> selected <?php } ?>>Autre</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="fName">Nom de l'entreprise ou organisation *</label>
                          <input type="text" class="form-control form-control-lg" id="company" name="company" onkeyup="entrepriseChange('val')"
                            value="{{ $company }}" placeholder="Ex. Grande Pharmacie" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.address') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="address" name="address" onkeyup="entrepriseChange('val')"
                            placeholder="Ex. 1 Rue de la Gare" value="{{ $address }}">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.pincode') }}</label>
                          <input type="tel" class="form-control form-control-lg" id="pincode" name="pincode"
                            value="{{ $pincode }}" placeholder="Ex. 75001">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.city') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="city" name="city" onkeyup="entrepriseChange('val')"
                            value="{{ $city }}" placeholder="{{ __('message.enter_city') }}" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">{{ __('message.state') }} *</label>
                          <input type="text" class="form-control form-control-lg" id="state" name="state"
                            value="{{ $state }}" placeholder="{{ __('message.enter_state') }}"
                            onkeyup="hello(this.value);" required="">
                          <div id="filter_result">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="fName">E-mail de contact * (e-mail apparaissant sur votre offre d'emploi, peut
                            être différent de l'e-mail identifiant) *</label>
                          <input type="email" onkeyup="entrepriseChange('val')" class="form-control form-control-lg" id="email" name="email"
                            value="{{ $email }}" placeholder="Entrez votre e-mail" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">Tél. (no de tél. apparaissant sur votre offre d'emploi)</label>
                          <input type="tel" onkeyup="entrepriseChange('val')" class="form-control form-control-lg" id="phone" name="phone"
                            value="{{ $phone }}" placeholder="Entrez votre téléphone" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">Site internet ou page (ex. Facebook, LinkedIn) de la pharmacie</label>
                          <input type="text" id="linkd" onkeyup="entrepriseChange('val')" class="form-control form-control-lg" id="linkd" name="linkd"
                            value="{{ $linkd }}" placeholder="Votre site Internet ou page Facebook">
                        </div>
                        <h3 style="padding-top: 6px;">Nouveaux identifiants</h3>
                        <div class="form-group">
                          <label class="fName">Titre *</label>
                          <select class="form-control form-control-lg" onchange="entrepriseChange('val')" required name="user_title">
                            <option value="" selected="selected">Choix du titre</option>
                            <option value="M.">M.</option>
                            <option value="Mme">Mme</option>
                            <option value="Mme la Dresse">Mme la Dresse</option>
                            <option value="M. le Dr.">M. le Dr.</option>
                            <option value="Prof.">Prof.</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="fName">Prénom</label>
                          <input type="text" id="fname" class="form-control form-control-lg" placeholder="Ex. Jean" id="fname"
                            name="fname" required>
                        </div>
                        <div class="form-group">
                          <label class="fName">Nom</label>
                          <input type="text" id="lname" onkeyup="entrepriseChange('val')" class="form-control form-control-lg" placeholder="Ex. BLANC" id="lname"
                            name="lname" required>
                        </div>
                        <div class="form-group">
                          <label class="fName">Adresse e-mail *</label>
                          <input type="email" id="email" onkeyup="entrepriseChange('val')" class="form-control form-control-lg" id="reg_email" name="reg_email"
                            value="" placeholder="Votre e-mail" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">Votre mot de passe *</label>
                          <input type="password" class="form-control form-control-lg" id="reg_password"
                            name="reg_password" placeholder="Votre mot de passe" value="" required="">
                        </div>
                        <div class="form-group">
                          <label class="fName">Entrez à nouveau votre mot de passe *</label>
                          <input type="password" class="form-control form-control-lg"
                            placeholder="Entrez à nouveau votre mot de passe" id="password1" name="password1" required>
                        </div>
                        <div class="form-group">
                          <div class="g-recaptcha" data-sitekey="6LfXuKUZAAAAAFbk_whD9VeLtPiZUxKET-K-eN4y"></div>
                        </div>
                        <input type="hidden" name="old_company_logo" id="old_company_logo" value="{{ $company_logo }}">
                      </div>

                      <div class="detSection jobdataSec" style="display:none">
                        <div class="jobDescription"> Votre offre d'emploi</div>

                        <div class="cityClass"> </div>
                        <div class="companyClass"></div>
                        <div class="titleClass">{{ $title }} {{ ' ' }} {{ $tcontrat }} @if($title == '' || $tcontrat == '') Pharmacien (H/F) CDI @endif</div>
                        <div class="complimentClass"></div>
                        <div class="travailClass">Temps de travail : @if(!empty($travail)){{$travail}} @else Temps plein @endif</div>
                        <div class="complimenttravailClass"></div>
                        <div class="descClass"></div>
                        <div class="offer_contract_startDateClass"></div>
                        <div class="emailClass"></div>
                        <div class="phoneClass"></div>
                        <img src="" class="selectedImage" style="display: none;">
                      </div>
                    </section>
                    <div class="clearfix"></div>
                    <div class="form-group" style="display:none;" id="showprice">
                      <b>Prix total : 49 euros</b>
                    </div>
                    <div class="form-group">
                      En cliquant sur Accepter et publier mon offre, vous acceptez les <a
                        href="https://www.pharmapro.fr/cg" target="blank" style="color:#469c0b;"><u>Conditions
                          d’utilisation</u></a> et la <a href="https://www.pharmapro.fr/politique-de-confidentialite"
                        target="blank" style="color:#469c0b;"><u>Politique de confidentialité</u></a> de Pharmapro.fr.
                    </div>
                    <div>
                      <button type="submit" value="step_2" name="btn_step" id="btn_step" class="btn btn-green"
                        style="font-size: 20px;">Accepter et publier mon offre</button>
                    </div>
                    <div class="form-group text-right">
                    </div>
                    <div class="form-group text-left">
                      <br /> <b> Remarque :</b> l'équipe de Pharmapro.fr validera votre offre d'emploi en quelques
                      heures (jours ouvrables). <br /> <br /> <br />
                      *{{ __('message.mandatory_fields') }}
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
    <div class="footer" style="display:none;" id="showpricebarpaid">
      <p style="font-size:20px;padding-top: 20px;padding-bottom: 10px;">49 euros TTC <br /><br /><span
          style="font-size:16px;">Au choix la facture vous parviendra par la poste, e-mail ou vous pourrez payer par
          PayPal<span></p>
    </div>
    <div class="footer1" id="showpricebarfree">
      <p style="font-size:20px;padding-top: 20px;">Gratuit</p>
    </div>
  </section>
</form>
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
        <!-- <form class="feildForm" runat="server"  action="{{ url($url) }}" name="Frmsend_email" id="Frmsend_email"  method="POST" enctype="multipart/form-data">
          @csrf -->
        <input type="hidden" id="pop_interviewid" name="pop_interviewid" value="{{ $interviewid }}">
        <input type="text" name="pop_name" value="" class="form-control form-control-lg"
          style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Name" required id="pop_name">
        <input type="text" name="pop_email" value="" class="form-control form-control-lg"
          style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Email" id="pop_email" required>
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
    function entrepriseChange(val){
      $('.titleClass').html($('#title').val() + ' ' + $('#tcontrat').val());
      $('.complimentClass').html($('#compliment').val());
      $('.descClass').html(tinyMCE.activeEditor.getContent());
      $('.complimenttravailClass').html($('#complimenttravail').val());
      if ($('#travail').val() != '') {
        $('.travailClass').html('Temps de travail : '+ $('#travail').val());
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
      if ($('#city').val() != "") {
        $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
      }
      if ($('#company').val() != "") {
        $('.companyClass').html('La '+ $('#company').val() + ' recherche un/e');
      }
      console.log(tinyMCE.activeEditor.getContent());
    }

    $("#offer_contract_startDate").change(function(e){
        $('.offer_contract_startDateClass').html('Date d’entrée en fonction : ' + $('#offer_contract_startDate').val());
    });
    function steptwoChange(argument) {
      $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
      $('.companyClass').html('La '+ $('#company').val() + ' recherche un/e');
    }
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.selectedImage').attr('src', e.target.result);
            $('.selectedImage').show();
            if (e.target.result == "") {
              $('.selectedImage').hide();
            }
        }
        reader.readAsDataURL(input.files[0]);
        $('.descClass').html(tinyMCE.activeEditor.getContent());
      }
      $('.descClass').html(tinyMCE.activeEditor.getContent());
    }
$(document).ready(function() {
  $('#onloadactive').click();
  if ($('#exist_error').length > 0) {
    $('#exist_error').modal('show');
  }
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
      // $('#hideoffer').html("");
      $('#hideoffer').hide();
      $('.offer_contract_startDateClass').html("");
    } else if ($(this).prop("checked") == false) {
      var ht =
        " <label class='fName'>Date d'entrée en fonction *</label><input type='text' id='offer_contract_startDate' name='offer'  value='{{ $offerdate }}' required='required' class='form-control'> <ul></ul>";
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

function showoption(val) {
  if (val == 1) {
    $('.descoption').removeClass('active');
    $('.pdfoption').addClass('active');
    $('#link').hide();
    $('#text').hide();
    $('#pdf').show();
    $('#descoptionvalue').val(val);
    $('.detSection').removeClass('secWidth');
    $('.jobdataSec').hide();
    $('#parentDiv').removeClass('parentDiv');
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
}

function getval(valu) {
  $('#filter_result').hide();
  $('#state').val(valu);
  $('.cityClass').html($('#city').val() + ' ('+ $('#state').val() + ')');
}

function gotologin() {
  window.location.href = "https://www.pharmapro.fr/login";
}
</script>
<script src="{{ asset('assets/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.6/tinymce.min.js"></script>
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