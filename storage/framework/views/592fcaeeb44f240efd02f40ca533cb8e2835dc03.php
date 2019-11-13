<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $user_name = '';
    $email = '';
    $backup_in_days = '';
    $archive_delete = '';
    $inactivity_time_out = '';
    $upload_file_size_limit = '';
    $logo = '';
}else{
    $id = $editdata->id;
    $user_name = $editdata->user_name;
    $email = $editdata->email;
    $backup_in_days = $editdata->backup_in_days;
    $archive_delete = $editdata->archive_delete;
    $inactivity_time_out = $editdata->inactivity_time_out;
    $upload_file_size_limit = $editdata->upload_file_size_limit;
    $logo = $editdata->logo;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">System Config</span>
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
                                <i class="fa fa-gift"></i>System Config</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="<?php echo e(url('system_config/update')); ?>" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="user_name" id="user_name" placeholder="Enter User Name" class="form-control" value="<?php echo e($user_name); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">System Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter System Email" class="form-control" value="<?php echo e($email); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Backup In Days *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="backup_in_days" id="backup_in_days" placeholder="Enter Backup In Days" class="form-control" value="<?php echo e($backup_in_days); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Archive Delete In Days *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="archive_delete" id="archive_delete" placeholder="Enter Archive Delete In Days" class="form-control" value="<?php echo e($archive_delete); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Inactivity Time Out In Minutes *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="inactivity_time_out" id="inactivity_time_out" placeholder="Enter Inactivity Time Out" class="form-control" value="<?php echo e($inactivity_time_out); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Upload File Size Limit In MB*</label>
                                        <div class="col-md-9">
                                            <input type="text" name="upload_file_size_limit" id="upload_file_size_limit" placeholder="Enter Upload File Size Limit" class="form-control" value="<?php echo e($upload_file_size_limit); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Logo*</label>
                                        <div class="col-md-9">
                                            <input type="file" name="logo" id="logo" style="float: left;">
                                            <input type="hidden" name="old_logo" id="old_logo" value="<?php echo e($logo); ?>">
                                            <div class="profile-userpic">
                                                <img src="logo/<?php echo e($logo); ?>" class="img-responsive" alt="">
                                            </div>
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
            $('#frmEmployeeManagement').validate({
                rules: {
                    user_name: {required: true},
                    email: {required: true,email:true},
                    backup_in_days: {required: true,number:true},
                    archive_delete: {required: true,number:true},
                    inactivity_time_out: {required: true,number:true},
                    upload_file_size_limit: {required: true,number:true},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>