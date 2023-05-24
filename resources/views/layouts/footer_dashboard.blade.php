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
<!-- Footer section start -->

 <section class="footer">
   <div class="container">
     <div class="row footer-content">
       <div class="col-lg-5">
         <a href="#" class="footer-logo"><img src="{{asset('assets/dashbaord_assets/images/footer-logo.png') }}" alt=""></a> 
       </div> 
       <div class="col-lg-3">
         <div class="footer-links">
          <h2>Employeur/Pharmacie</h2>
            <ul>
               <li><a href="{{ url('prix') }}">Prix</a></li>
               <li><a href="{{ url('formulaire') }}">Formulaire offre emploi</a></li>
               <li><a href="{{ url('questions-frequentes-employeur') }}">Questions fréquentes</a></li>
            </ul>
         </div> 
       </div>
       <div class="col-lg-3">
         <div class="footer-links">
          <h2>Candidat/e</h2>
            <ul>
               <li><a href="{{ url('faq-candidat') }}">Questions fréquentes</a></li>
               <li><a href="https://www.pharmapro.ch/fr">Emplois en Suisse</a></li>
               <li><a href="https://aw7f660.aweberpages.com/p/200a5ec1-a51e-429a-869d-6a6205c2092d" target="_blank">Inscription newsletter</a></li>
            </ul>
         </div>          
       </div>   
       <div class="col-lg-2">
         <div class="footer-links">
          <h2>Entreprise</h2>
            <ul>
               <li><a href="{{ url('qui-sommes-nous') }}">Qui sommes-nous ?</a></li>
               <li><a href="{{ url('impressum') }}">Impressum</a></li>
               <li><a href="{{ url('contact') }}">Contact</a></li>
            </ul>
         </div>          
       </div>   
     </div>
      <div class="row copyright-box">
        <div class="col-lg-12 copyright-text">
          <span><a style="text-decoration: none;color: #333333;" href="{{ url('cg') }}">Conditions générales</a></span>
          <span class="copy-span"><a style="text-decoration: none;color: #333333;" href="{{ url('politique-de-confidentialite') }}">Politique de confidentialité</a></span>
        </div>
        <div class="col-lg-3 footer-social-icon">
         <a target="_blanck" href="https://www.facebook.com/groups/pharmapro.fr" class="fa fa-facebook">facebook</a>
         <a target="_blanck" href="https://www.instagram.com/pharmapro_france/" class="fa fa-instagram">Instagram</a>
       </div>
      </div>
   </div>    
 </section>
<!-- Footer section end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
  $(".user-icon").click(function(){
    $(".user-login-dropdown").toggle();
  });
});
</script>
</body>
</html>