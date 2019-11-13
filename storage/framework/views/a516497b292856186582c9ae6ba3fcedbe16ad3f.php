<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $employee_id = '';
    $client_id = '';
    $status = '';
    $id = '';
}else{
    $employee_id = $employee_id;
    $client_id = $client_id;
    $status = '';
    $id = '';
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('assign_folders_to_employee')); ?>">Assign Folder / Files to Employee</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Assign Folder / Files to Employee</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'assign_folders_to_employee/insert';
                            }else{
                                $url = 'assign_folders_to_employee/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                               
                                <input type="hidden" name="txt_employee_id" id="
                                txt_employee_id" value="<?php echo e($employee_id); ?>">

                                <input type="hidden" name="txt_client_id" id="txt_client_id" value="<?php echo e($client_id); ?>">
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Employee Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="employee_id" id="employee_id" <?php if($action=='Edit'): ?> disabled <?php endif; ?> >
                                            <option value="">Select Employee Name</option>
                                            <?php $__currentLoopData = $employee_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $employee_id){ ?> selected<?php } ?> ><?php echo e($value->first_name.' '.$value->last_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id" <?php if($action=='Edit'): ?> disabled <?php endif; ?>>                                   <option value="">Select Folder Type</option>
                                            <?php $__currentLoopData = $client_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_id){ ?> selected <?php } ?> ><?php echo e($value->client_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Folder & Files*</label>
                                    <div class="col-md-9" id="folder_structure">              
                                        &nbsp;
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

            $('#frmEmployeeAssignRolePermision').validate({
                rules: {
                    client_id: {required: true},
                    folder_type_id: {required: true},
                    folder_name: {required: true},
                },
                highlight: function (element) {
                    $(element).closest('.form-control').removeClass('success').addClass('error');
                },
                success: function (element) {
                    element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.form-control').removeClass('error').addClass('success');
                }
            });


            $(document).on( "click",'select#client_id',function() { 
                get_checkbox_structure();
            });

            function get_checkbox_structure(){
                $.ajax({
                    url: '<?php echo url('/assign_folders_to_employee/get_folder_structure'); ?>'+'/'+$("select#client_id").val()+'/'+$("select#employee_id").val(),
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': $("select#client_id").val(),
                        'employee_id': $("select#employee_id").val(),
                    },
                    type: "GET",
                    success: function(data) {                   
                        $("#folder_structure").html(data);
                    }

                });
            }

            

            $(document).on( "change",'.chk_folder',function() {
                $(this).siblings('ul')
                       .find("input[type='checkbox']")
                       .prop('checked', this.checked);
            });
                
            <?php if($action=='Edit'): ?>
                get_checkbox_structure();
            <?php endif; ?> 


            

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>