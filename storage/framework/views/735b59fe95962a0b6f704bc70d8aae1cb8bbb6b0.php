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
            <span class="active">Assign Folder/Files to Subclient</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Assign Folder / Files to Client</span>
                    </div>
                   
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="<?php echo e(url('assign_folders_to_client/add')); ?>" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Client Name </th>
                                <th> Folder Name </th>          
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($assign_folders_to_client): ?>
                          <?php $__currentLoopData = $assign_folders_to_client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                
                                <td>
                                    <?php echo e($value->client_name); ?>

                                </td>
                                <td>
                                    <?php echo e($value->folder_name); ?>

                                </td>                                
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo e(url( 'assign_folders_to_client/edit/'.$value->client_id )); ?>">
                                                    <i class="icon-pencil"></i> Edit </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(url( 'assign_folders_to_client/delete/'.$value->client_id )); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?">
                                                    <i class="icon-trash"></i> Delete </a>
                                            </li>
                                            <!-- 
                                            <li class="divider"> </li>
                                            <li>

                                            <?php if($value->status=='approved'): ?>

                                                <a href="<?php echo e(url( 'assign_folders_to_client/delete/'.$value->client_id )); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?">
                                                    <i class="icon-trash"></i> Delete </a>

                                            <?php elseif($value->status=='archived'): ?>
                                                <a href="<?php echo e(url('assign_folders_to_client/restore/'.$value->id)); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to restore ?">
                                                    <i class="icon-trash"></i> Retore </a>
                                            <?php endif; ?>        
                                            </li> -->
                                            <!-- <li class="divider"> </li>
                                            <li>
                                                <?php
                                                    if($value->status == 'approved'){
                                                        $icon = '<i class="fa fa-lock"></i>';
                                                        $status =  'blocked';
                                                    }else{
                                                        $icon = '<i class="fa fa-unlock"></i>';
                                                        $status = 'approved';
                                                    }
                                                ?>
                                                <a href="<?php echo e(url('assign_folders_to_client/change_status/'.$value->id.'/'.$status)); ?>">
                                                    <?php echo $icon.' '.ucfirst($status); ?> </a>
                                            </li> -->
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>    
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/pages/scripts/table-datatables-managed.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/pages/scripts/ui-confirmations.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>