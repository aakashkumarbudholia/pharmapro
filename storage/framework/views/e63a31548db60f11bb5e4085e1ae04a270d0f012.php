<?php $__env->startSection('content'); ?>


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
            <span class="active">Document View</span>
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
                                <i class="fa fa-gift"></i>Document View</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="<?php echo e(url('document_view/list')); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
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

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="reset"  class="btn default">Clear</button>
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
                    client_id: {required: true},
                    select_list: {required: true},
                    emp_id: {required: true},
                    c_id: {required: true},
                },
                
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