<?php $__env->startSection('content'); ?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('employee_mgt')); ?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"><?php echo e($action); ?></span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_5">
                    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Employee </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php

                                $url = 'client/search';
                            
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST">
                            <?php echo csrf_field(); ?>                                
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Enter Files or Foldername *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="search_text" id="search_text" placeholder="Enter Files or Foldername" value="<?php echo e(request()->post('search_text')); ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($path)): ?>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Search Result </label>
                                            <div class="col-md-9">
                                                <?php $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p>
                                                    <?php echo html_entity_decode($val) ?>
                                                    </p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>    
                                    </div>                              
                                <?php endif; ?>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmEmployeeManagement').validate({
                rules: {
                    search_text: {required: true},
                },
                highlight: function (element) {
                    $(element).closest('.form-control').removeClass('success').addClass('error');
                },
                success: function (element) {
                    element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.form-control').removeClass('error').addClass('success');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>