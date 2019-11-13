<!--footer-->
<footer>
<div class="container">
<div class="row">
<div class="col-12">
<div class="copyright">@ <?php echo date('Y') ?>, Publinetis</div>
<div class="design">Website Designed & Developed by: <a href="http://www.ncodetechnologies.com/" target="_blank">NCode Technologies, Inc.</a></div>
</div>
</div>
</div>
</footer>

<!-- /footer-->


<!-- Jquery Liberary Files (jQuery v3.3.1) -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/jquery-3.3.1.min.js')); ?>"></script>
<!-- Supported file for Bootstrap dropdowns -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/popper.min.js')); ?>"></script>
<!-- Bootstrap v4.2.1 -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/bootstrap.min.js')); ?>"></script>
<!-- Responsive Tab -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/easy-responsive-tabs.js')); ?>"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="<?php echo e(asset('assets/layouts/layout4/front/js/owl.carousel.min.js')); ?>"></script>
<!-- Custom Input File -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/custom-file-input.js')); ?>"></script>
<!-- Bootstrap Datepicker -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo e(asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/select2/js/select2.full.min.js')); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- Custom JS -->
<script src="<?php echo e(asset('assets/layouts/layout4/front/js/custom.js')); ?>"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
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


</body>
</html>
