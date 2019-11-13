<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $client_role_id = '';
    $permision = array();
}else{
    $id = $editdata->id;
    $client_role_id = $editdata->client_role_id;
    $permision_data = DB::table('client_role_permision')->select('permision')->where('client_role_id',$client_role_id)->get();
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
            <a href="<?php echo e(url('client_role_permision')); ?>">Sub Client Role Permission</a>
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
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Sub Client Role Permission </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'client_role_permision/insert';
                            }else{
                                $url = 'client_role_permision/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmClientRolePermisionManagement" id="frmClientRolePermisionManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">

                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sub Client Role*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="client_role_id" id="client_role_id">
                                                <option value="">Select Sub Client Role</option>
                                                <?php $__currentLoopData = $client_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                    <option value="<?php echo e($value->id); ?>" <?php if($value->id == $client_role_id){ ?> selected <?php } ?> ><?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="control-label col-md-3">Client Role Permission*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="permision[]" id="permision" multiple>
                                                <option value="">Select Client Role Permission</option>

                                                <?php if(!empty($document_management)): ?>

                                                    <?php $__currentLoopData = $document_management; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <option value="<?php echo e($key); ?>" <?php if (in_array($key,$permision)){ ?> selected <?php } ?> ><?php echo e($value); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>

                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sub Client Role Permission*</label>
                                        <div class="col-md-9">

                                            <label for="permision[]" class="error" style="display: none;">This field is required.</label><br>

                                                <?php if(!empty($document_management)): ?>

                                                    <?php $__currentLoopData = $document_management; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    
                                                    <input type="checkbox" name="permision[]" id="permision" value="<?php echo e($key); ?>" <?php if (in_array($key,$permision)){ ?> checked <?php } ?>><?php echo e($value); ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>

                                            
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmClientRolePermisionManagement').validate({
                rules: {
                    client_role_id: {required: true},
                    'permision[]': {required: true},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>