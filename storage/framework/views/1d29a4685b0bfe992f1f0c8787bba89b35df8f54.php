<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $client_id = '';
    $sub_client_id = '';
    $client_role_id = '';
    $id = '';
    $rank = '';
   $getemail = '';
}else{
    $client_id = $editdata->client_id;
    $sub_client_id = $editdata->sub_client_id;
    $client_role_id = $editdata->client_role_id;
    $id = $editdata->id;
    $rank = $editdata->rank;
	 $getemail = $editdata->get_email;
}

?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('client_assign_role_permision')); ?>">Sub Client assign role permision</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Sub Client assign role permision </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'client_assign_role_permision/insert';
                            }else{
                                $url = 'client_assign_role_permision/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmEmployeeAssignRolePermision" id="frmEmployeeAssignRolePermision" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">
                                
                                

                                <div class="form-group">
                                    <label class="control-label col-md-3">Sub Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="sub_client_id" id="sub_client_id">
                                            <option value="">Select Sub Client</option>
                                            <?php $__currentLoopData = $sub_client_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $sub_client_id){ ?> selected <?php } ?> ><?php echo e($value->first_name." ".$value->last_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Client Name*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_id" id="client_id">
                                            <option value="">Select Client</option>
                                            <?php $__currentLoopData = $client_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_id){ ?> selected <?php } ?> ><?php echo e($value->client_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Client Role*</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="client_role_id" id="client_role_id">
                                            <option value="">Select Client Role</option>
                                            <?php $__currentLoopData = $client_role_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_role_id){ ?> selected <?php } ?> ><?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3">Rank *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="rank" id="rank" placeholder="Enter Client Rank" class="form-control" value="<?php echo e($rank); ?>">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>

				<div class="form-group">
                                        <label class="control-label col-md-3">Activity Email *</label>
                                        <div class="col-md-9">

						<select class="form-control" name="emailnot" id="emailnot">
                                            	<option value="0">Select Activity Email</option>
							<option value="0" <?php if($getemail == 0){ ?> selected <?php } ?> >No</option>
							<option value="1"  <?php if($getemail == 1){ ?> selected <?php } ?> >Yes</option>
                                            
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
                    sub_client_id: {required: true},
                    client_id: {required: true},
                    client_role_id: {required: true},
                    rank: {required: true},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>