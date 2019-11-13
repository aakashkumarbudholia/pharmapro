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
            <a href="<?php echo e(url('activity_views')); ?>"> Client </a>
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
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select Type*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="select_type" id="select_type">
                                            <option value="">Select Type</option>

                                            <option value="2" <?php if(request()->select_type=='2'): ?>selected <?php endif; ?>>Client</option>
                                            <option value="1" <?php if(request()->select_type=='1'): ?>selected <?php endif; ?>>Employee</option>        

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="div_client_id" style="display: none;">
                                    <label class="control-label col-md-3">Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id">
                                            <option value="">Select Client Name</option>
                                            <?php $__currentLoopData = $client_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_id){ ?> selected<?php } ?> ><?php echo e($value->client_name); ?></option>
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
                                    <label class="control-label col-md-3">Select Date*</label>
                                    <div class="col-md-4">
                                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                            <input type="text" class="form-control" name="from" value="<?php echo e(request()->from); ?>">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" name="to" value="<?php echo e(request()->to); ?>"> </div>
                                        <!-- /input-group -->
                                        <span class="help-block"> Select date range </span>
                                    </div>
                                </div>

                                <?php if($activity): ?>
                                <div class="form-group">
                                   
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                         <thead>
                                          <tr>
                                            <th>Sr. No</th>
                                            <th>
                                            <?php if(request()->select_type==2): ?>
                                                Client Name
                                            <?php elseif(request()->select_type==1): ?>
                                                Employee Name
                                            <?php endif; ?>
                                            </th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        <?php if(count($activity)!=0): ?>
                                        <?php $i=1 ?>
                                        <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td>
                                                
                                                <?php if(request()->select_type==2): ?>
                                                    <?php echo e($ac->client_name); ?>

                                                
                                                <?php elseif(request()->select_type==1): ?>
                                                <?php echo e($ac->first_name.' '.$ac->last_name); ?>

                                                <?php endif; ?>

                                                </td>
                                                <td>
                                                <?php echo e($document_management[$ac->action]); ?>

                                                </td>   
                                                <td><?php echo e($ac->folder_name); ?></td>
                                                <td>
                                                    <?php if($ac->upload_type==0): ?>
                                                        folder
                                                    <?php else: ?>
                                                        file
                                                    <?php endif; ?>

                                                </td>
                                                
                                                <td><?php echo e($ac->created_at); ?></td>
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
<script src="<?php echo e(asset('assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/table-datatables-managed.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/ui-confirmations.min.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#frmEmployeeAssignRolePermision').validate({
                rules: {
                    select_type: {required: true},                    
                },
                highlight: function (element) {
                    $(element).closest('.form-control').removeClass('success').addClass('error');
                },
                success: function (element) {
                    element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.form-control').removeClass('error').addClass('success');
                }
            });

            

            $(document).on( "change",'select#select_type',function() { 
                var select_type = $('select#select_type').val();
                
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


            
            $('select#select_type').trigger('change');

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>