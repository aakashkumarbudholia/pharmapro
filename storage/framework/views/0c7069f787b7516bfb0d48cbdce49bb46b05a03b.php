<?php $__env->startSection('content'); ?>
<?php

    $about_us_id = isset($about_us->id) ? $about_us->id : '';
    $title = isset($about_us->id) ? $about_us->title : '';
    $description = isset($about_us->id) ? $about_us->description : '';
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('admin/services')); ?>">About Us</a>
            
        </li>
        <!-- <li>
            <span class="active"></span>
        </li> -->
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
                                <i class="fa fa-gift"></i>About Us </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="<?php echo e(url('admin/about/update')); ?>" class="form-horizontal form-bordered" name="frmAboutUs" id="frmAboutUs" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="about_us_id" id="$about_us_id" value="<?php echo e($about_us_id); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">About Us Title *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" value="<?php echo e($title); ?>">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3">About Us Contant *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" rows="4" required=""><?php echo e($description); ?></textarea>
                                        </div>
                                    </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="reset" class="btn default">Clear</button>
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
    
    
    <script src="<?php echo e(asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmAboutUs').validate({
                rules: {
                    title: {required: true},
                },
                
            });
        });


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>