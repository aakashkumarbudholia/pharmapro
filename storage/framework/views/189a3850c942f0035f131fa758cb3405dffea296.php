<?php $__env->startSection('content'); ?>
<?php

$client_id = request()->client_id;
$employee_id = request()->employee_id;

?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('dashboard')); ?>"> Dashboard </a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            
                            $url = 'archive_mngt';
                            
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select Type*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="select_list" id="select_list" onchange="list();" >
                                            <option value="">Select Type</option>
                                            <option value="client">Sub Client</option>
                                            <option value="emp">Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="client_list" style="display: none;">
                                    <label class="control-label col-md-3">Sub Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id" >
                                            <option value="">Select Sub Client Name</option>
                                            <?php
                                            
                                                foreach ($client_name as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>"><?php echo $value->client_name; ?></option>
                                            <?php        
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="emp_list" style="display: none;">
                                    <label class="control-label col-md-3">Employee Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="emp_id" id="emp_id" >
                                            <option value="">Select Employee Name</option>
                                            <?php
                                            
                                                foreach ($emp_name as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                                            <?php        
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3">Select Client*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="c_id" id="c_id">
                                            <option value="">Select Client</option>
                                        </select>
                                    </div>
                                </div>

                                <?php if($archive): ?>
                                <div class="form-group">
                                   
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover table-checkable order-column datatables">
                                         <thead>
                                          <tr>    
                                            <th class="col-md-1">ID</th>    
                                            <th>Folder/File Name</th>
                                            <th>Type</th>
                                            <th class="col-md-2">Actions</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        <?php $j = 1 ?>
                                        <?php if(count($archive)!=0): ?>
                                        <?php $i=1 ?>
                                        <?php $__currentLoopData = $archive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td>
                                                    <?php echo e($j); ?>

                                                    <?php $j++ ?>
                                                </td>
                                                <td>
                                                <?php echo e($ac->folder_name); ?><br/>
                                                <small class="text-info"><?php echo e($ac->path); ?></small>
                                                </td>   
                                                <td>
                                                    <?php if($ac->upload_type==0): ?>
                                                        folder
                                                    <?php else: ?>
                                                        file
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td>
                                                <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="<?php echo e(url('archive_mngt/archive_current_folder/'.$ac->folder_id)); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to restore ?">
                                                            <i class="icon-trash"></i> Restore </a>
                                                    </li>    

							 <li>
                                                        <a href="<?php echo e(url('archive_mngt/delete_current_folder/'.$ac->folder_id)); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?">
                                                            <i class="icon-trash"></i> Delete </a>
                                                    </li>  
                    
                                                </ul>
                                                </div>

                                                </td>
                                              </tr>
                                              <?php $i++ ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </tbody>   
                                      </table>
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
                                                    <button type="button" onclick="reload_func()" class="btn default">Clear</button>
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
        function reload_func() {
            window.location = "<?php echo e(url('archive_mngt')); ?>"
        }

        function list(){
            var select_list = $('#select_list').val();
            if(select_list == 'client'){
                $('#client_list').show();
                $('#emp_list').hide();
            }
            if(select_list == 'emp'){
                $('#emp_list').show();
                $('#client_list').hide();
            }
        }

        $(document).ready(function () {

            $('#frmEmployeeAssignRolePermision').validate({
                rules: {
                    select_list: {required: true},                    
                    client_id: {required: true},                    
                    emp_id: {required: true},                    
                    c_id: {required: true},                    
                },
                
            });

            

            $(document).on( "change",'.chk_folder',function() {
                $(this).siblings('ul')
                       .find("input[type='checkbox']")
                       .prop('checked', this.checked);
            });
           


        });

        $(document).on("click",'#emp_id',function(){
                emp_id = $('#emp_id').val();

                 $.ajax({
                        url: '<?php echo url('/statistics_mngt/get_emp_client'); ?>',
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'emp_id': emp_id,                        
                        },
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                             $("#c_id").html(data);            
                        }

                    });

            });

        $(document).on("click",'#client_id',function(){
                sub_client_id = $('#client_id').val();

                 $.ajax({
                        url: '<?php echo url('/statistics_mngt/get_sub_client'); ?>',
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'sub_client_id': sub_client_id,                        
                        },
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                             $("#c_id").html(data);            
                        }

                    });

            });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>