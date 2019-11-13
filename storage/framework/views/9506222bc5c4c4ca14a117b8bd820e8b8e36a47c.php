<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('client/dashboard')); ?>">Client</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
           
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
                                        <label class="control-label col-md-3">Action*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="select_action" id="select_action">
                                            <option value="">Select Action</option>

                                            <?php if($show_client_roles): ?>

                                            <?php $__currentLoopData = $show_client_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"><?php echo e($permission); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>

                                            </select>
                                        </div>    
                                    </div>

                                    <div class="form-group upload_folder_div" id="" style="display: none;">
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
                                    </div>

                                    <div class="form-group upload_folder_div" id="" style="display: none;">
                                        <label class="control-label col-md-3">Upload File*</label>
                                        <div class="col-md-9">
                                            <input type="file" name="up_upload_file" id="up_upload_file">
                                        </div>    
                                    </div>

                                    
                                    <div class="form-group delete_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">Delete Files*</label>
                                        <div class="col-md-9" id="files_structure">
                                            
                                        </div>    
                                    </div>

                                    

                                    <div class="form-group rename_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">Rename Files*</label>
                                        <div class="col-md-9" id="editable_file">
                                            
                                        </div>    
                                    </div>


                                    <div class="form-group download_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">Download Files*</label>
                                        <div class="col-md-9" id="download_files">
                                            
                                        </div>    
                                    </div>

                                    <div class="form-group view_read_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">View Read Files*</label>
                                        <div class="col-md-9" id="view_read_files">
                                            
                                        </div>    
                                    </div>

                                    <div class="form-group move_files" id="" style="display: none;">
                                        <label class="control-label col-md-3">Move Files*</label>
                                        <div class="col-md-4" id="move_files_from">
                                            
                                        </div>
                                        <div class="col-md-4" id="move_files_to">
                                            
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


<div class="modal fade bs-modal-lg" id="view_read_doc" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">View/Read Files</h4>
        </div>
        <div class="modal-body">
            <embed id="view_doc_model" src="" width="100%" height="400px;">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        function hide_error(){
            $("div#display_errors .error").html("");
            $("div#display_errors .success").html("");
            $("div#display_errors").hide();
        }
   
        $(document).on( "change",'select#select_action',function() { 
            var action = $(this).val();
            hide_error();

            if(action=='upload_files'){
                $("div.upload_folder_div").show();

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_folder_names'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'upload_files',
                        'parent_id': 0,                        
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data.sts==1){
                            $("select#upload_folder_id").html(data.data);
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }              
                    }

                });

            }else{
                $("div.upload_folder_div").hide();
            }
            
            if(action=='delete_files'){
                $("div.delete_files").show();

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_list_delete_files'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'delete_files',
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".delete_files #files_structure").html(data);             
                    }

                });



            }else{
                $("div.delete_files").hide();
            }

            
            if(action=='rename_files'){
                $("div.rename_files").show();

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_list_rename_file'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'rename_files',
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".rename_files #editable_file").html(data);
                    }
                });

            }else{
                $("div.rename_files").hide();
            }

            
            if(action=='download_files'){
                $("div.download_files").show();

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_list_download_file'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'download_files',
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".download_files #download_files").html(data);
                    }
                });

            }else{
                $("div.download_files").hide();
            }

            if(action=='view_read_files'){
                $("div.view_read_files").show();

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_list_view_read_files'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'view_read_files',
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() { 
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        $(".view_read_files #view_read_files").html(data);
                    }
                });

            }else{
                $("div.view_read_files").hide();
            }

            
            if(action=='move_files'){
                $("div.move_files").show();


                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_list_move_files_from'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'move_files',
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
                    url: '<?php echo url('/cl_document_mngt/get_list_move_files_to'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'move_files',
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

            }else{
                $("div.move_files").hide();
            }


        });

        $(document).on( "change",'select#upload_folder_id',function() { 
            var action = $("select#select_action").val();
            
            hide_error();

            var upload_folder_id = $("select#upload_folder_id").val();

            if( action=='upload_files' && upload_folder_id>0 ){

                $.ajax({
                    url: '<?php echo url('/cl_document_mngt/get_folder_names'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'upload_files',                        
                        'parent_id': upload_folder_id,                        
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        if(data.sts==1){
                            $("select#upload_subfolder_id").html(data.data);
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }              
                    }

                });

            }
        });

        $(document).on( "click",'button#submit_button',function() {

            var action = $("select#select_action").val();            

            hide_error();

            var error = "";
            if(action==""){
                error = "Select Action";                    
            }

            if(error!=""){
                $("div#display_errors .error").html(error);
                $("div#display_errors").show();
                return;            
            }    


            if( action=='upload_files'){
                
                var upload_folder_id = $("select#upload_folder_id").val();
                var upload_subfolder_id = $("select#upload_subfolder_id").val();var error = "";

                var formData = new FormData($("form#DocumentManagement")[0]);
                formData.append('action', action);
                formData.append('upload_folder_id', upload_folder_id);
                formData.append('upload_subfolder_id', upload_subfolder_id);

                if(upload_folder_id==""){
                    error = "Select Folder Name";
                }else if($("#up_upload_file").val()==""){
                    error = "Select File to Upload";                    
                }

                if(error==""){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        }
                    });

                    $.ajax({
                        
                        url: '<?php echo url('/cl_document_mngt/upload_files'); ?>',
                        type: "POST",
                        data: formData,
                        contentType: false,
                        cache : false,
                        processData : false,
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                            if(data.sts==1){
                                $("div#display_errors .success").html(data.msg);
                                $("div#display_errors").show();
                            }else{
                                $("div#display_errors .error").html(data.msg);
                                $("div#display_errors").show();
                            }              
                        }

                    });

                }else{
                    $("div#display_errors .error").html(error);
                    $("div#display_errors").show();
                }  


            }else if( action=='move_files'){
                
                var from_file_id = $('.move_from_file:checked').attr('data-folder_id');
                var to_folder_id = $('.move_to_folder:checked').attr('data-folder_id');

                if(from_file_id==""){
                    error = "Select from folder";
                }else if(to_folder_id==""){
                    error = "Select to folder";
                }

                
                if(error==""){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        }
                    });

                    $.ajax({
                        
                        url: '<?php echo url('/cl_document_mngt/move_files'); ?>',
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'action':'move_files',
                            from_file_id:from_file_id,
                            to_folder_id:to_folder_id
                        },                        
                        beforeSend: function() {
                            $("button#submit_button").attr('disabled',true);
                        },
                        complete: function() {
                            $("button#submit_button").attr('disabled',false);
                        },
                        success: function(data) {
                            if(data.sts==1){
                                $("div#display_errors .success").html(data.msg);
                                $("div#display_errors").show();
                                $("select#select_action").trigger('change');
                            }else{
                                $("div#display_errors .error").html(data.msg);
                                $("div#display_errors").show();
                            }              
                        }

                    });

                }else{
                    $("div#display_errors .error").html(error);
                    $("div#display_errors").show();
                }   


            }   

        });


        $(document).on( "click",'.btn_delete_file',function() {

            var action = $("select#select_action").val();
            var file_id = $(this).attr('data-file_id');
            var current = $(this);
            
            if(file_id>0){

                $.ajax({

                    url: '<?php echo url('/cl_document_mngt/delete_current_file'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'delete_files',
                        'file_id': file_id,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        hide_error();
                        if(data.sts==1){
                            $("div#display_errors .success").html(data.msg);
                            $("div#display_errors").show();
                            current.parent().fadeOut('slow');
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                        }              
                    }
                });
            }
        });

        $(document).on( "click",'.edit_folder_name',function() {
            $(this).removeClass('text-success');
            $(this).removeClass('text-danger');
        });

        $(document).on( "click",'.edit_file_name',function() {
            $(this).removeClass('text-success');
            $(this).removeClass('text-danger');
        });
        
        $(document).on( "blur",'.edit_file_name',function() {

            var action = $("select#select_action").val();
            var file_id = $(this).attr('data-file_id');
            var level = $(this).attr('data-level');
            var file_name = $(this).text();
            var current = $(this);
            
            if(file_id>0&&file_name!=""){

                $.ajax({

                    url: '<?php echo url('/cl_document_mngt/rename_file'); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        'action': 'rename_files',
                        'file_id': file_id,                        
                        'file_name': file_name,
                    },
                    beforeSend: function() {
                        $("button#submit_button").attr('disabled',true);
                    },
                    complete: function() {
                        $("button#submit_button").attr('disabled',false);
                    },
                    success: function(data) {
                        hide_error();
                        if(data.sts==1){
                            $("div#display_errors .success").html(data.msg);
                            $("div#display_errors").show();
                            current.html('<i class="fa fa-file icon-state-info icon-lg"></i> '+data.folder_name);
                            current.addClass('text-success');
                        }else{
                            $("div#display_errors .error").html(data.msg);
                            $("div#display_errors").show();
                            current.addClass('text-danger');
                        }              
                    }
                });
            }
        });


        $(document).on( "click",'.open_doc_model',function() {

            $("#view_doc_model").attr('src',$(this).attr('data-url')+"#toolbar=0&navpanes=0&scrollbar=0");
            $("#view_read_doc").modal('show');


        });    


        $(document).on('click','.icon_move_folder',function(){

        });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>