<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Content Area-->

<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2 style="text-align: center;">Publinetis - Power the curious</h2>
<div class="subHead" style="text-align: center;">Industry's standard dummy text ever since</div>
</div>

 
	<div class="row">
<?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	<div class="col-12 col-sm-6">

		<div class="item cleardiv">
			      <div class="shadow-effect">
				<h4> <?php echo e($value->title); ?> </h4>
				<p> <?php echo html_entity_decode($value->description);?> </p>
			      </div>
			      
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
