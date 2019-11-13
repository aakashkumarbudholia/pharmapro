<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $client_id = '';
    $folder_type_id = '';
    $folder_name = '';
    $status = '';
    $id = '';
}else{
    $client_id = $editdata->client_id;
    $folder_type_id = $editdata->folder_type_id;
    $folder_name = $editdata->folder_name;
    $status = $editdata->status;
    $id = $editdata->id;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('client_folder_mgt')); ?>">Client Folder Management</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Client Folder</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'client_folder_mgt/insert';
                            }else{
                                $url = 'client_folder_mgt/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">
                                <input type="hidden" name="parent_id" id="parent_id" value="">
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Client Folder*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id" <?php if($action=='Edit'): ?>disabled
                                        <?php endif; ?> >
                                            <option value="">Select Client Folder</option>
                                            <?php $__currentLoopData = $client_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_id){ ?> selected<?php } ?> ><?php echo e($value->folder_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Folder Type*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="folder_type_id" id="folder_type_id" <?php if($action=='Edit'): ?>disabled
                                        <?php endif; ?>>
                                            <option value="">Select Folder Type</option>
                                            <?php $__currentLoopData = $folder_type_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $folder_type_id){ ?> selected <?php } ?> ><?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group create_folder_div" id="" style="display: block;">
                                        <label class="control-label col-md-3">Sub Folder Name*</label>
                                        <div class="col-md-9" id="create_select_sub_folder">
                                            If other type then folders selection will be here.
                                        </div>    
                                </div>

                                <div class="form-group create_folder_div" id="" style="display: block;">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="checkbox" name="doc_under_other" id="doc_under_other" value="1"> Create Document Type Under Other Type
                                        </div>    
                                    </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Folder Name*</label>
                                    <div class="col-md-9">              
                                        <input type="text" name="folder_name" id="folder_name" value="<?php echo e($folder_name); ?>" placeholder="Enter Folder Name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" id="submit_button">
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
            $('#frmEmployeeAssignRolePermision').validate({
                rules: {
                    client_id: {required: true},
                    folder_type_id: {required: true},
                    folder_name: {required: true},
                },
                
            });
        });

        $(document).on( "change",'select#folder_type_id',function() { 
            var client_id = $("select#client_id").val();
            var folder_type = $("select#folder_type_id").val();

            
            //hide_error();
            create_parent_folder_id = 0;
            $('#parent_id').val(create_parent_folder_id);

            if( client_id>0 && folder_type==2 ){

                $.ajax({
                    url: '<?php echo url('/client_folder_mgt/get_other_type_folder'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data.sts==1){
                            $("div#create_select_sub_folder").html(data.data);
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }              
                    }

                });

            }else{
                $("div#create_select_sub_folder").html("If other type then folders selection will be here.")
            }
        });

        $(document).on( "change",'select.select_sub_folder',function() { 
            var client_id = $("select#client_id").val();
            var upload_folder_id = $(this).val();
            create_parent_folder_id = upload_folder_id;
            //hide_error();
            $('#parent_id').val(create_parent_folder_id);
            current = $(this);

            if( client_id>0 ){

                $.ajax({
                    url: '<?php echo url('/client_folder_mgt/get_folder_names2'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                        'parent_id': upload_folder_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        
                        if(data.sts==1){
                            current.nextAll().remove();
                            // $("div#create_select_sub_folder").append(data.data);
                            current.parent().append(data.data);
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }              
                    }

                });

            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>