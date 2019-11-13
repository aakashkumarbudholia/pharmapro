<?php $__env->startSection('content'); ?>
<?php

// echo "<pre>";print_r($adm_modules);exit;

$marray = array();

foreach($adm_modules as $k2=>$v2)
{

$marray[] = $v2->mid;

}

/* 
if (in_array("Client_typeController1", $marray))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }

*/

if($action=='Add'){
    $id = '';
    $username = '';
    
}else{
   
    $id = '';
    $username = '';
    
}

?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('admin_mgt')); ?>">Admin Access Permission Management</a>
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
                                <i class="fa fa-gift"></i>Manage Admin Access permission </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin_mgt/insertpermission';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $ids ?>">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="User Name" class="form-control" value="<?php echo $name ?>" readonly>
                                        </div>
                                    </div>


			 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Modules</label>
                                        <div class="col-md-9">
                                            
<input type="checkbox" name="chk[]" id="chk[]" value="Admin_mgtController" <?php if (in_array("Admin_mgtController", $marray)) { echo "checked"; } ?>>Admin Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="PermissionManagement" <?php if (in_array("PermissionManagement", $marray)) { echo "checked"; } ?>>Permission Management 

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_folder_mgtController" <?php if (in_array("Client_folder_mgtController", $marray)) { echo "checked"; } ?>>Client Folder Management <br />

<h3>Client Management</h3>

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_typeController" <?php if (in_array("Client_typeController", $marray)) { echo "checked"; } ?>>Client Type

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Service_typeController" <?php if (in_array("Service_typeController", $marray)) { echo "checked"; } ?>>Service Type

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_mgtController" <?php if (in_array("Client_mgtController", $marray)) { echo "checked"; } ?>>Client Management  <br />

<h3>Sub Client Management</h3>

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_roleController" <?php if (in_array("Client_roleController", $marray)) { echo "checked"; } ?>>Sub Client Role Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_role_permisionController" <?php if (in_array("Client_role_permisionController", $marray)) { echo "checked"; } ?>>Sub Client Role Permission Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Sub_client_mgtController" <?php if (in_array("Sub_client_mgtController", $marray)) { echo "checked"; } ?>>Sub client Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Client_assign_role_permisionController" <?php if (in_array("Client_assign_role_permisionController", $marray)) { echo "checked"; } ?>>Assign Role/Permission To Sub Client

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Assign_folders_to_clientController" <?php if (in_array("Assign_folders_to_clientController", $marray)) { echo "checked"; } ?>>Assign Folder/Files to Sub Client <br />

<h3>Employee Management</h3>

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Emp_roleController" <?php if (in_array("Emp_roleController", $marray)) { echo "checked"; } ?>>Employee Role Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Emp_role_permisionController"  <?php if (in_array("Emp_role_permisionController", $marray)) { echo "checked"; } ?>>Employee Role Permission Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Emp_mgtController" <?php if (in_array("Emp_mgtController", $marray)) { echo "checked"; } ?>>Employee Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Emp_assign_role_permisionController" <?php if (in_array("Emp_assign_role_permisionController", $marray)) { echo "checked"; } ?>>Employee Assign Role Permission Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Assign_folders_to_empController" <?php if (in_array("Assign_folders_to_empController", $marray)) { echo "checked"; } ?>>Assign Folder/Files to Employee <br />

<h3>View Management</h3>

<br /><input type="checkbox" name="chk[]" id="chk[]" value="Document_viewController" <?php if (in_array("Document_viewController", $marray)) { echo "checked"; } ?>>Document Views

<br /><input type="checkbox" name="chk[]" id="chk[]" value="ActivityViews" <?php if (in_array("ActivityViews", $marray)) { echo "checked"; } ?>>Activity Views

<br /><input type="checkbox" name="chk[]" id="chk[]" value="ArchiveManagement" <?php if (in_array("ArchiveManagement", $marray)) { echo "checked"; } ?>>Archive Management

<br /><input type="checkbox" name="chk[]" id="chk[]" value="StatisticsManagement" <?php if (in_array("StatisticsManagement", $marray)) { echo "checked"; } ?>>Statistics Management

<h3>Other Management</h3>

<br /><input type="checkbox" name="chk[]" id="chk[]" value="full_backup" <?php if (in_array("full_backup", $marray)) { echo "checked"; } ?>>Backup

<br /><input type="checkbox" name="chk[]" id="chk[]" value="system_config" <?php if (in_array("system_config", $marray)) { echo "checked"; } ?>>System Config

<br /><input type="checkbox" name="chk[]" id="chk[]" value="email_template" <?php if (in_array("email_template", $marray)) { echo "checked"; } ?>>Email Template  <br />



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
                    
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>