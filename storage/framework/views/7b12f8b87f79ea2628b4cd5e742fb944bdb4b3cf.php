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
            <span class="active">Permission View</span>
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
                        <span class="caption-subject bold uppercase">Permission View</span>
                    </div>
                   
                </div>
                <div class="portlet-body">                    
                    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables">
                        <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th> Permission </th>
                                <th class="col-md-2"> For Sub Client </th>
                                <th class="col-md-2"> For Employee </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($permissions)): ?>
                        <?php $i = 1 ?>
                          <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <tr class="odd gradeX">
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($value->value); ?></td>
                                <td class="text-center">
                                    <?php if($value->is_for_client==1): ?>
                                       <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
                                    <?php else: ?>
                                       <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"><i class="fa fa-check-circle  text-success" aria-hidden="true"></i></td>
                            </tr>
                            <?php $i++ ?>
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