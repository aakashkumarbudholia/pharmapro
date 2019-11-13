<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('employee/dashboard')); ?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
           <span class="active">Split Files</span>
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
                                
                            </div>
                        </div>
                        <div class="portlet-body form">
                           
                            <form action="" class="form-horizontal form-bordered" name="DocumentManagement" id="DocumentManagement" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                                
                                <div class="form-body">
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Client Name*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="client_id" id="client_id">
                                            <option value="">Select Client Name</option>

                                            <?php if($client_login): ?>

                                            <?php $__currentLoopData = $client_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cl->id); ?>"><?php echo e($cl->client_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                            </select>
                                        </div>    
                                    </div>

                                    <div class="form-group folder_structure" id="" style="display: none;">
                                        <label class="control-label col-md-3">Folder Structure</label>
                                        <div class="col-md-9" id="folder_structure">
                                            
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

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Total Number of PDF*</label>
                                        <div class="col-md-9">
                                            <input type="" name="pdf_no" class="form-control" id="pdf_no">
                                            
                                        </div>    
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
<script type="text/javascript">
    function reload_func() {
            window.location = "<?php echo e(url('employee/split')); ?>"
        }
    $(document).ready(function () {

        $(document).on( "change",'select#client_id',function() {

            var client_id = $("select#client_id").val();

            if( client_id>0 ){

                $("div.folder_structure").show();
                $.ajax({
                    url: '<?php echo url('/employee/get_list_split_files'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".folder_structure #folder_structure").html(data);
                    }

                });

            }

        });    


        $(document).on( "click",'button#submit_button',function() {

            var split_file_id = $('.split_files:checked').attr('data-folder_id');
            var client_id = $("select#client_id").val();
            var pdf_no = $("#pdf_no").val();

            if( split_file_id>0 && client_id>0){

                $.ajax({
                    url: '<?php echo url('/employee/split_files'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                        'split_file_id': split_file_id,
                        'pdf_no': pdf_no,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data.sts==1){
                            $("select#client_id").trigger('change');
				$("div#display_errors .success").html(data.msg);
                            $("div#display_errors").show();
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }  
                    }

                });

            }    

        });


    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>