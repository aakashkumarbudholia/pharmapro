<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $emp_role_id = '';
    $permision = array();
}else{
    $id = $editdata->id;
    $emp_role_id = $editdata->emp_role_id;
    $permision_data = DB::table('emp_role_permision')->select('permision')->where('emp_role_id',$emp_role_id)->get();
    $permision = array();
    foreach ($permision_data as $key => $pd) {
        $permision[] = $pd->permision;
    }
    
    //$permision = $editdata->permision;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('employee_role_permision')); ?>">Employee Role Permision</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Employee Role Permision </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'employee_role_permision/insert';
                            }else{
                                $url = 'employee_role_permision/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeRolePermisionManagement" id="frmEmployeeRolePermisionManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">

                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Employee Role*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="emp_role_id" id="emp_role_id">
                                                <option value="">Select Employee Role</option>
                                                <?php $__currentLoopData = $emp_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                    <option value="<?php echo e($value->id); ?>" <?php if($value->id == $emp_role_id){ ?> selected <?php } ?> ><?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Employee Role Permision*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="permision[]" id="permision" multiple>
                                                <option value="">Select Employee Role Permision</option>

                                                <option value="create_folder" <?php if (in_array("create_folder", $permision)){ ?> selected <?php } ?> >Create Folder</option>

                                                <option value="upload_files" <?php if (in_array("upload_files", $permision)){ ?> selected <?php } ?>>Upload Files</option>

                                                <option value="delete_folders" <?php if (in_array("delete_folders", $permision)){ ?> selected <?php } ?>>Delete Folders</option>

                                                <option value="delete_files" <?php if (in_array("delete_files", $permision)){ ?> selected <?php } ?>>Delete Files</option>

                                                <option value="rename_folders" <?php if (in_array("rename_folders", $permision)){ ?> selected <?php } ?>>Rename Folders</option>

                                                <option value="rename_files" <?php if (in_array("rename_files", $permision)){ ?> selected <?php } ?>>Rename Files</option>

                                                <option value="archive_folders" <?php if (in_array("archive_folders", $permision)){ ?> selected <?php } ?>>Archive Folders</option>

                                                <option value="archive_files" <?php if (in_array("archive_files", $permision)){ ?> selected <?php } ?>>Archive Files</option>

                                                <option value="move_folders" <?php if (in_array("move_folders", $permision)){ ?> selected <?php } ?>>Move Folders</option>

                                                <option value="move_files" <?php if (in_array("move_files", $permision)){ ?> selected <?php } ?>>Move Files</option>

                                                <option value="download_files" <?php if (in_array("download_files", $permision)){ ?> selected <?php } ?>>Download Files</option>

                                                <option value="view_read_files" <?php if (in_array("view_read_files", $permision)){ ?> selected <?php } ?>>View/read Files</option>

                                            </select>
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
            $('#frmEmployeeRolePermisionManagement').validate({
                rules: {
                    emp_role_id: {required: true},
                    permision: {required: true},
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