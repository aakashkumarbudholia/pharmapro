<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $client_role = '';
    $client_role_id = '';
}else{
    $client_role = $editdata->name;
    $client_role_id = $editdata->id;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('client_role')); ?>">Sub Client Role</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Sub Client Role </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'client_role/insert';
                            }else{
                                $url = 'client_role/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmClientRole" id="frmClientRole" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="client_role_id" id="client_role_id" value="<?php echo e($client_role_id); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sub Client Role *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="client_role" id="client_role" placeholder="Enter Sub Client Role" class="form-control" value="<?php echo e($client_role); ?>">
                                            <!-- <span class="help-block"> This is inline help </span> -->
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmClientRole').validate({
                rules: {
                    client_role: {required: true},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>