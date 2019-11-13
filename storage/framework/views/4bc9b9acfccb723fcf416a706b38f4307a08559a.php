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
           <span class="active">Merge Files</span>
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

                                    <!-- <div class="form-group upload_folder_div" id="" style="display: none;">
                                        <label class="control-label col-md-3">Folder Name*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="upload_folder_id" id="upload_folder_id">
                                            
                                            </select>
                                        </div>    
                                    </div>

                                    <div class="form-group upload_folder_div" id="" style="display: none;">
                                        <label class="control-label col-md-3">Sub Folder Name*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="upload_subfolder_id" id="upload_subfolder_id">
                                            
                                            </select>
                                        </div>    
                                    </div> -->

                                    <div class="form-group move_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">Files to merge*</label>
                                        <div class="col-md-4" id="move_files_from">
                                            
                                        </div>
                                        <div class="col-md-4" id="move_files_to">
                                            
                                        </div> 

                                        

                                    </div>
                                    <div class="form-group move_files" id="" style="display: none;">
                                        <div class="col-md-3">
                                            <input type="button" name="arrange_pdf" class="btn green pull-right" value="Arrange PDF" id="arrange_pdf"> 
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group arrange_pdf_div" style="display: none;">
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group upload_folder_div" id="" style="display: none;">
                                        <label class="control-label col-md-3">Files to merge</label>
                                        <div class="col-md-9" id="files_to_merge">
                                            &nbsp;
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
            window.location = "<?php echo e(url('employee/merge')); ?>"
        }
    
    $('#arrange_pdf').on('click',function(){
        var html = '';
        $('.merge_files').each(function(){    
            if(this.checked){
                var id = $(this).attr('data-folder_id');
                var name = $(this).attr('data-folder_name');
                html += '<div class="checkbox_data"><input type="text" name="arrange_data[]" size="2" class="arrange_pdf_text_box" data-folder_id_text="'+id+'">&nbsp;&nbsp;<input type="checkbox" name="checkboxValues" class="merge_files" data-folder_id="'+id+'" data-folder_name="'+name+'" checked disabled>'+name+'</div>';
                $('.arrange_pdf_div').html(html);
                $('.arrange_pdf_div').show();
            }
        });
        var text_box = "<div><input type='text' name='pdf_name' id='pdf_name' placeholder='Enter PDF Name'></div>";
        $('.arrange_pdf_div').append(text_box);
    });
    $(document).ready(function () {

        function hide_error(){
            $("div#display_errors .error").html("");
            $("div#display_errors .success").html("");
            $("div#display_errors").hide();
        }

        

        var last_trigger_select;
        function get_files_to_merge(folder_id){

            var client_id = $("select#client_id").val();

            if(folder_id>0){

                $.ajax({
                    url: '<?php echo url('/employee/get_files_to_merge'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                        'folder_id': folder_id,                        
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data!=""){
                            $("div#files_to_merge").html(data);
                        }else{
                            $("div#files_to_merge").html("No file found to merge");
                        }
                    }

                });

            }

        }
        $('#client_id').change(function(){
            var client_id = $('#client_id').val();
            var action = 'move_files';

        $("div.move_files").show();

                $.ajax({
                    url: '<?php echo url('/marge/get_list_move_files_from'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'move_files',
                        'client_id': client_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".move_files #move_files_from").html(data);
                    }
                });

                $.ajax({
                    url: '<?php echo url('/marge/get_list_move_files_to'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'move_files',
                        'client_id': client_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".move_files #move_files_to").html(data);
                    }
                });

        });
        // $(document).on( "change",'select#client_id',function() {

        //     var client_id = $("select#client_id").val();

        //     if( client_id>0 ){

        //         $("div.upload_folder_div").show();
                
        //         $.ajax({
        //             url: '<?php echo url('/employee/get_folder_names'); ?>',
        //             type: "POST",
        //             data: {
        //                 "_token": "<?php echo e(csrf_token()); ?>",
        //                 'client_id': client_id,
        //                 'parent_id': 0,                        
        //             },
        //             beforeSend: function() {
        //                 $("button#submit_button").attr('disabled',true);
        //             },
        //             complete: function() {
        //                 $("button#submit_button").attr('disabled',false);
        //             },
        //             success: function(data) {
        //                 if(data.sts==1){
        //                     $("select#upload_folder_id").html(data.data);
        //                 }else{
        //                     $("div#display_errors .error").html(data.msg);
        //                     $("div#display_errors").show();
        //                 }              
        //             }

        //         });

        //     }

        // });

        // $(document).on( "change",'select#upload_subfolder_id',function() { 

        //     hide_error();
        //     var client_id = $("select#client_id").val();
        //     var upload_subfolder_id = $("select#upload_subfolder_id").val();

        //     if( client_id>0 && upload_subfolder_id>0 ){
        //         get_files_to_merge(upload_subfolder_id);
        //     }    

        //     last_trigger_select = 'upload_subfolder_id';

        // });

        // $(document).on( "change",'select#upload_folder_id',function() { 

        //     var client_id = $("select#client_id").val();
        //     hide_error();

        //     var upload_folder_id = $("select#upload_folder_id").val();

        //     last_trigger_select = 'upload_folder_id';

        //     if( client_id>0 && upload_folder_id>0 ){

        //         get_files_to_merge(upload_folder_id);

        //         $.ajax({
        //             url: '<?php echo url('/employee/get_folder_names'); ?>',
        //             type: "POST",
        //             data: {
        //                 "_token": "<?php echo e(csrf_token()); ?>",
        //                 'client_id': client_id,
        //                 'parent_id': upload_folder_id,                        
        //             },
        //             beforeSend: function() {
        //                 $("button#submit_button").attr('disabled',true);
        //             },
        //             complete: function() {
        //                 $("button#submit_button").attr('disabled',false);
        //             },
        //             success: function(data) {
        //                 if(data.sts==1){
        //                     $("select#upload_subfolder_id").html(data.data);
        //                 }else{
        //                     $("div#display_errors .error").html(data.msg);
        //                     $("div#display_errors").show();
        //                 }              
        //             }

        //         });

        //     }
        // });


        $(document).on( "click",'button#submit_button',function() {

            var client_id = $("select#client_id").val();

            var checkboxValues = [];  
            var checkboxValuesTo;  
            var checkbox_data = [];


            $('.checkbox_data .arrange_pdf_text_box').each(function(){   
                checkbox_data.push($(this).val()); 
                checkboxValues.push($(this).attr('data-folder_id_text'));
            });

            $('.move_to_folder').each(function(){    
                if(this.checked){
                    checkboxValuesTo = $(this).attr('data-folder_id');
                }
            });

            var pdf_name = $('#pdf_name').val();
            
            if(client_id>0){

                $.ajax({
                    url: '<?php echo url('/employee/merge_files'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'client_id': client_id,
                        'checkboxValues': checkboxValues,
                        'checkbox_data': checkbox_data,
                        'checkboxValuesTo': checkboxValuesTo,
                        'pdf_name': pdf_name,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data.sts==1){
                            //$("select#"+last_trigger_select).trigger('change');
                            $("div#display_errors .success").html(data.msg);
                            $("div#display_errors").show();
                            $('#client_id').change();
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