<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--Content Area-->
<section class="contentWrapper">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Publinetis - Power the curious</h2>
<div class="subHead">Industry's standard dummy text ever since</div>
</div>
<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h5>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including</h5>
</div>
</div>
</div>
</section>
<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Publinetis - Power the curious</h2>
<div class="subHead">Industry's standard dummy text ever since</div>
</div>

<div class="owl-carousel owl-theme"  id="serviceCounter">

<?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<div class="item">
              <div class="shadow-effect">
                <i class="icon-request"></i>
                <h4> <?php echo e($value->title); ?> </h4>
                <p> <?php echo html_entity_decode($value->description); ?> </p>
				<a class="rMore" href="<?php echo e(url('pricing')); ?>">Read more <i class="icon-fdas"></i></a>
              </div>
              
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

</div>

</div>
</div>
</div>
</section>

<!-- /Content Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
