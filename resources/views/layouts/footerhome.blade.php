
 <footer>
    <div class="container">
      <p class="copyright">@  <?php echo date('Y') ?>, Pharmapro<span>Website Designed & Developed by: <a href="https://www.ncodetechnologies.com" target="_blank">NCode Technologies, Inc.</a></span></p>
    </div>
  </footer>
  <!-- Footer End -->


<script type="text/javascript">(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//forms.aweber.com/form/29/536070429.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "aweber-wjs-p2yv6kiu8"));
</script>

<script src="{{ asset('assets/layouts/layout4/front/js1/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js1/bootstrap.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js1/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js1/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/layouts/layout4/front/js1/custom.js') }}"></script>


  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
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
      items: 1,
      slideBy: 1,
      nav: true,
      loop:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplaySpeed:1000,
      margin:0,
      dots: false,
    });
  </script>


</body>
</html>
