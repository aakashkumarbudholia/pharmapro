<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $username = '';
    $email = '';
    $password = '';
}else{
    $id = $editdata->id;
    $username = $editdata->user_name;
    $email = $editdata->email;
    $password = $editdata->password;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('admin_mgt')); ?>">Admin Management</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Admin </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin_mgt/insert';
                            }else{
                                $url = 'admin_mgt/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="User Name" class="form-control" value="<?php echo e($username); ?>">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="<?php echo e($email); ?>">
                                        </div>
                                    </div>

                                  
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password *</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" value="<?php echo e($password); ?>">

                                            <input type="hidden" name="old_pass" value="<?php echo e($password); ?>">
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmEmployeeManagement').validate({
                rules: {
                    username: {required: true},
                    email: {required: true,email:true},
                    password: {required: true,minlength:6},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>