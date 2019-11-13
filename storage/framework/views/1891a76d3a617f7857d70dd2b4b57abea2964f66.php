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
            <span class="active">Assign Folder/Files to Employee</span>
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
                        <span class="caption-subject bold uppercase"> Assign Folder / Files to Employee</span>
                    </div>
                   
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="<?php echo e(url('assign_folders_to_employee/add')); ?>" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables">
                        <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th> Employee name </th>
                                <th> Client Name </th>
                                <th> Folder Name </th>          
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        <?php if($assign_folder_to_emp): ?>
                          <?php $__currentLoopData = $assign_folder_to_emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo e($i); ?>

                                    <?php $i++ ?>
                                </td>
                                
                                <td>
                                    <?php echo e($value->el_first_name." ".$value->el_last_name); ?>

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
                                                <a href="<?php echo e(url('assign_folders_to_employee/edit/'.$value->client_id.'/'.$value->employee_id)); ?>">
                                                    <i class="icon-pencil"></i> Edit </a>
                                            </li>
                                            <li class="divider"> </li>
                                            
                                            <li>
                                            <a href="<?php echo e(url('assign_folders_to_employee/delete/'.$value->employee_id.'/'.$value->client_id)); ?>" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?">
                                            <i class="icon-trash"></i> Delete </a>  
                                                  
                                            </li>
                                            
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


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>