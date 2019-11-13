<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $user_name = '';
    $phone = '';
}else{
    $id = $editdata->id;
    $first_name = $editdata->first_name;
    $last_name = $editdata->last_name;
    $email = $editdata->email;
    $user_name = $editdata->user_name;
    $phone = $editdata->phone;
}
?>

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
                            if($action == "Add"){
                                $url = 'employee/insert';
                            }else{
                                $url = 'employee/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">First Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="<?php echo e($first_name); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Last Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="<?php echo e($last_name); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="<?php echo e($email); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="user_name" id="user_name" placeholder="Enter User Name" class="form-control" value="<?php echo e($user_name); ?>">
                                        </div>
                                    </div>
                                    
                                    <?php if($action=='Add'): ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password *</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" value="">
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone Number *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" class="form-control" value="<?php echo e($phone); ?>">
                                        </div>
                                    </div>
                                    
                                </div>
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
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true},
                    user_name: {required: true},
                    password: {required: true,minlength:6},
                    phone: {required: true,number:true,minlength:10,maxlength:15},
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