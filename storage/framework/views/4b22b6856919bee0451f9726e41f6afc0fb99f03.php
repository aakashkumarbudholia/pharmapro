<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('document_view')); ?>">Document View</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">List</span>
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
                        <span class="caption-subject bold uppercase"> Folder File List of
                        <?php if(isset($client_name)){ echo $client_name->client_name;} ?>
                        
                        <?php if(isset($emp_name)){ echo $emp_name->first_name.' '.$emp_name->last_name;} ?> 
                            
                        </span>
                    </div>
                   
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th> Folder File List </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($folder_file_list as $key => $value) { ?>
                            <tr class="odd gradeX">
                                
                                <td>
                                    <?php echo $value->folder_name; ?>
                                </td>
                                
                            </tr>
                          <?php } ?>
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