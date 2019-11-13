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
            <a href="<?php echo e(url('archive_mngt')); ?>"> Client </a>
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
                                        <select class="form-control" name="select_type" id="select_type">
                                            <option value="">Select Type</option>

                                            <option value="2" <?php if(request()->select_type=='2'): ?>selected <?php endif; ?>>Client</option>
                                            <option value="1" <?php if(request()->select_type=='1'): ?>selected <?php endif; ?>>Employee</option>        

                                        </select>
                                    </div>
                                </div>

                                

                                <?php if($archive): ?>
                                <div class="form-group">
                                   
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                         <thead>
                                          <tr>
                                            <th>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                    <span></span>
                                                </label>
                                            </th>         
                                            <th>Folder/File Name</th>
                                            <th>Type</th>
                                            <th>Deletedby</th>
                                            <th>DeletedAt</th>
                                            <th class="col-md-2">Actions</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        <?php if(count($archive)!=0): ?>
                                        <?php $i=1 ?>
                                        <?php $__currentLoopData = $archive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
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
                                                <?php if($ac->deleted_by==1): ?>
                                                        <?php echo e($ac->first_name." ".$ac->last_name); ?>

                                                    <?php else: ?>
                                                        <?php echo e($ac->client_name); ?>

                                                    <?php endif; ?>
                                                

                                                </td>
                                                <td><?php echo e($ac->deleted_at); ?></td>
                                                <td>
                                                <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="<?php echo e(url('archive_mngt/restore/'.$ac->id)); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to restore ?">
                                                            <i class="icon-trash"></i> Restore </a>
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

            

            $(document).on( "change",'.chk_folder',function() {
                $(this).siblings('ul')
                       .find("input[type='checkbox']")
                       .prop('checked', this.checked);
            });
           


        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>