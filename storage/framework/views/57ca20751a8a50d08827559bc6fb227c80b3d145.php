<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Hello, <?php echo e(session('client_user_name')); ?></h1>
        </div>
        
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Dashboard</span>
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($uploaded_doc); ?>"><?php echo e($uploaded_doc); ?></span>
                 </div>
                 <div class="desc"> Uploaded Documents </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 red" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($uploaded_doc_by_emp); ?>"><?php echo e($uploaded_doc_by_emp); ?></span>
                 </div>
                 <div class="desc"> Uploaded Document by Employee </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 green" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($today_mvd_doc); ?>"><?php echo e($today_mvd_doc); ?></span>
                 </div>
                 <div class="desc"> Moved Document </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($today_rnmd_doc); ?>"><?php echo e($today_rnmd_doc); ?></span>
                 </div>
                 <div class="desc"> Renamed Documents </div>
              </div>
           </a>
        </div>
    </div>
    <!-- END PAGE BREADCRUMB -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>