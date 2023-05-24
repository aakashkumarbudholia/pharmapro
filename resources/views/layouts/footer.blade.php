<?php  $url = url()->current();
$lang = session('lang');

$lang = session('lang');
App::setLocale($lang);

if(empty($lang))
{
App::setLocale('en');
} else {
App::setLocale($lang);
}

?>
<style>
.nav-link {padding-left:1px !important;padding-right:14px !important;}


</style>

<footer>
    <div class="container">
      <!-- <p class="copyright">@  <?php echo date('Y') ?>, Pharmapro<span>Website Designed & Developed by: <a href="https://www.ncodetechnologies.com" target="_blank">NCode Technologies, Inc.</a></span></p> -->
      <div class="row mt-md-2">
        <div class="col-9 col-md-5">
          <img src="{{ asset('assets/layouts/layout4/front/images1/logo-pharmajob-transp_new.png') }}" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-12 col-md-7">
          <div class="row mt-md-3 mt-lg-4">
              <div class="col-md-4">
                <hr class="d-block d-md-none">
                <strong>Employeur/Pharmacie</strong>
                <nav class="nav flex-column">
                  <a class="d-block text-dark" href="{{ url('prix') }}">Prix</a>
		<a class="d-block text-dark" href="{{ url('formulaire') }}">Formulaire offre emploi</a>
                  <a class="d-block text-dark" href="{{ url('questions-frequentes-employeur') }}">Questions fréquentes</a>
                  <!-- <a class="d-block text-dark" href="#">PharmaproRH</a> -->
                </nav>
              </div>
              <div class="col-md-4">
                  <hr class="d-block d-md-none">
                  <strong>Candidat/e</strong>
                  <nav class="nav flex-column">        
                    <a class="d-block text-dark" href="{{ url('faq-candidat') }}">Questions fréquentes</a>
                    <a class="d-block text-dark" href="https://www.pharmapro.ch/fr" target="_blank">Emplois en Suisse</a>
		<a class="d-block text-dark" href="https://aw7f660.aweberpages.com/p/200a5ec1-a51e-429a-869d-6a6205c2092d" target="_blank">Inscription newsletter</a>
                  </nav>
              </div>
              <div class="col-md-4">
                <hr class="d-block d-md-none">
                <strong>Entreprise</strong>
                <nav class="nav flex-column">
		
                  <a class="d-block text-dark" href="{{ url('qui-sommes-nous') }}">Qui sommes-nous&nbsp;?</a>
                  <a class="d-block text-dark" href="{{ url('impressum') }}">Impressum</a>
                  <a class="d-block text-dark" href="{{ url('contact') }}">Contact</a>
                </nav>
              </div>
          </div>
        </div>
      </div>
      <div class="row mt-md-4">
          <div class="col-md-9 col-lg-10 d-md-flex align-items-md-center">
              <div>
                  <hr class="d-block d-md-none">
                  <ul class="nav justify-content-left legal">
                      <li class="nav-item"><a class="text-dark" href="{{ url('cg') }}">Conditions générales</a></li>
                      <li class="nav-item"><a class="text-dark" href="{{ url('politique-de-confidentialite') }}">Politique de confidentialité</a></li>
                    <!--  <li class="nav-item"><a class="text-dark" href="{{ url('confirmation-inscription-nl') }}">Confirmation inscription nl</a></li> -->
                  </ul>
              </div>
          </div>
          <div class="col-md-3 col-lg-2 d-md-flex align-items-md-center justify-content-end">
              <div>
                  <hr class="d-block d-md-none">

                 <nav class="navbar justify-content-left" style="margin-left: -45px;margin-top: -4px;">
                    <?php if($lang == 'en') { ?>
                    <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" style="margin-top: -7px;margin-right: -2px;" href="{{ url('local/en') }}" id="lang-droapdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</a>
                        <div class="dropdown-menu border-0 shadow m-0 p-0" style="min-width: auto;">
                          <a class="dropdown-item" href="{{ url('local/fr') }}">FR</a>
                        </div>
                      </li> -->
                      <?php } else { ?>
                     <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3"  style="margin-top: -7px;margin-right: -16px;" href="{{ url('local/fr') }}" id="lang-droapdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FR</a>
                        <div class="dropdown-menu border-0 shadow m-0 p-0" style="min-width: auto;">
                          <a class="dropdown-item" href="{{ url('local/en') }}">EN</a>
                        </div>
                      </li> -->
                      <?php } ?>
		                  <li class="nav-item"><a class="nav-link text-dark h3" target="_blanck" href="https://www.instagram.com/pharmapro_france/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                      <li class="nav-item"><a class="nav-link text-dark h3" target="_blanck" href="https://www.facebook.com/groups/pharmapro.fr"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                  </nav> 
              </div>
          </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

<!-- Bootstrap v4.2.1 -->


<script src="{{ asset('assets/layouts/layout4-pub/front/js/jquery-3.3.1.min.js') }}"></script>
<!-- Supported file for Bootstrap dropdowns -->
<script src="{{ asset('assets/layouts/layout4-pub/front/js/popper.min.js') }}"></script>


<!-- Responsive Tab -->
<script src="{{ asset('assets/layouts/layout4-pub/front/js/easy-responsive-tabs.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('assets/layouts/layout4-pub/front/js/custom-file-input.js') }}"></script>
<!-- Bootstrap Datepicker -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- Custom JS -->
<script src="{{ asset('assets/layouts/layout4-pub/front/js/custom.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script src="{{ asset('assets/layouts/layout4/front/js/bootstrap.js') }}"></script>


<script src="{{ asset('assets/layouts/layout4/front/js/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js/custom.js') }}"></script>


<!-- Bootstrap v4.2.1 -->
<script src="{{ asset('assets/layouts/layout4-pub/front/js/bootstrap.min.js') }}"></script>

<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#logo").change(function() {
  readURL(this);
});

</script>

  <script type="text/javascript">
    jQuery(".cell-link").each(function(){
      if(!jQuery(this).hasClass("undercontrol")){
        jQuery(this).addClass("undercontrol");
        jQuery(this).click(function(){
          document.location.href = jQuery(this).parent().data('href');
        });
      }
    });


    $(".news-slider").owlCarousel({
      items: 3,
      slideBy: 1,
      nav: true,
      loop:false,
      autoplay:false,
      autoplayTimeout:9000,
      autoplaySpeed:9000,
      margin:0,
      dots: false,
    });

  </script>
<style type="text/css">
    footer {
    text-align: left;
    color: #333;
    padding: 10px 0;
        background: #ddd;
}
footer .legal .nav-item:not(:last-child)::after {
    content: "|";
    margin: 0 1rem;
}
  </style>

<script async src="https://assets.aweber-static.com/aweberjs/aweber.js"></script><script>var AWeber = window.AWeber || [];AWeber.push(function() {AWeber.WebPush.init('BKoTW-2XTAX_HxIV8SGLj0_O86Ijy2fValDgKn146YOCTA9O1-HPAS939zY9OpmI51UXtYkGy78VNtcAjE1qFmU','d8de2271-359d-417e-9b1b-566a1746055e','ef1c5482-3846-459e-9fa8-35c3ec9714ba');});</script>

<div class="AW-Form-650184925"></div>
<script type="text/javascript">(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//forms.aweber.com/form/25/650184925.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "aweber-wjs-svaq8rsbq"));
</script>


</body>
</html>
