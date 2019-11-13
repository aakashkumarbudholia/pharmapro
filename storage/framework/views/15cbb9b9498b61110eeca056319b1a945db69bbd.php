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
                            
                            $url = 'activity_views';
                            
                            ?>
                            <form class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select Type*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="select_type" id="select_type">
                                            <option value="">Select Type</option>

                                            <option value="2" <?php if(request()->select_type=='2'): ?>selected <?php endif; ?>>Sub Client</option>
                                            <option value="1" <?php if(request()->select_type=='1'): ?>selected <?php endif; ?>>Employee</option>        

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="div_client_id" style="display: none;">
                                    <label class="control-label col-md-3">Sub Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id">
                                            <option value="">Select Sub Client Name</option>
                                            <?php $__currentLoopData = $client_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_id){ ?> selected<?php } ?> ><?php echo e($value->user_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="div_employee_id" style="display: none;">
                                    <label class="control-label col-md-3">Employee Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <option value="">Select Employee Name</option>
                                            <?php $__currentLoopData = $emp_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $employee_id){ ?> selected<?php } ?> ><?php echo e($value->first_name.' '.$value->last_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
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

                                <div class="form-group search_result" id="" style="display: none;">
                                    <label class="control-label col-md-3">Search Results</label>
                                    <div class="col-md-9" id="search_result">
                                        
                                    </div>    
                                </div>

                                <div class="form-group" id="display_errors" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9 col-md-offset-3 error text-danger">
                                                
                                            </div>
                                            <div class="col-md-9 col-md-offset-3 success text-success">
                                                
                                            </div>
                                        </div>
                                    </div>


                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="button" class="btn green" id="submit_button">
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
<script src="<?php echo e(asset('assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/table-datatables-managed.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/ui-confirmations.min.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        function reload_func() {
            location.reload();
        }

        function hide_error(){
            $("div#display_errors .error").html("");
            $("div#display_errors .success").html("");
            $("div#display_errors").hide();
        }
        
        $(document).ready(function () {

            $('#frmEmployeeAssignRolePermision').validate({
                rules: {
                    select_type: {required: true},                    
                },
                
            });

            $(document).on( "change",'select#select_type',function() { 
                var select_type = $('select#select_type').val();
                hide_error();
                if(select_type==2){
                    $("div#div_client_id").show();
                    $("div#div_employee_id").hide();
                }else if(select_type==1){
                    $("div#div_client_id").hide();
                    $("div#div_employee_id").show();
                }else{
                    $("div#div_client_id").hide();
                    $("div#div_employee_id").hide();
                }

            });

            $(document).on("click",'#employee_id',function(){
                emp_id = $('#employee_id').val();

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

            $(document).on( "click",'button#submit_button',function() {
                hide_error();
                var select_type = $("select#select_type").val();
                var client_id = $("select#client_id").val();
                var employee_id = $("select#employee_id").val();
                var c_id = $("select#c_id").val();
                
                $("div.search_result").show();

                if( select_type=='1' && employee_id>0 ){

                    $.ajax({
                        url: '<?php echo url('/statistics_mngt/get_statistics_for_emp'); ?>',
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'select_type': select_type,
                            'employee_id': employee_id,                        
                            'c_id': c_id,                        
                        },
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                             $(".search_result #search_result").html(data);            
                        }

                    });

                }else if( select_type=='2' && client_id>0 ){

                    $.ajax({
                        url: '<?php echo url('/statistics_mngt/get_statistics_for_client'); ?>',
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'select_type': select_type,
                            'client_id': client_id, 
                            'c_id': c_id,                          
                        },
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                            $(".search_result #search_result").html('');
                             $(".search_result #search_result").html(data);            
                        }

                    });

                }else{
                    $("div#display_errors .error").html("Select Required Fields");
                    $("div#display_errors").show();
                }

            });    

            $(document).on( "change",'.chk_folder',function() {
                $(this).siblings('ul')
                       .find("input[type='checkbox']")
                       .prop('checked', this.checked);
            });
            
            $('select#select_type').trigger('change');

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>