@extends('layouts.master')
@section('content')
<?php
  $upload_files = isset($editdata[0]->email_body) ? $editdata[0]->email_body : '';
  $delete_folders = isset($editdata[1]->email_body) ? $editdata[1]->email_body : '';
  $delete_files = isset($editdata[2]->email_body) ? $editdata[2]->email_body : '';
  $rename_folders = isset($editdata[3]->email_body) ? $editdata[3]->email_body : '';
  $rename_files = isset($editdata[4]->email_body) ? $editdata[4]->email_body : '';
  $move_folders = isset($editdata[5]->email_body) ? $editdata[5]->email_body : '';
  $move_files = isset($editdata[6]->email_body) ? $editdata[6]->email_body : '';
  $signature = isset($editdata[7]->email_body) ? $editdata[7]->email_body : '';
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('dashboard') }}">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Email Templates</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_5">
                    @include('layouts.flash-message')
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Email Templates</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="{{ url('email_templates/update') }}" class="form-horizontal form-bordered" name="frmEmployeeManagement" id="frmEmployeeManagement" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-body">
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Upload Files</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="upload_files" id="upload_files" rows="6">{{ $upload_files }} </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Delete Folders</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="delete_folders" id="delete_folders" rows="6">{{ $delete_folders }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Delete Files</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="delete_files" id="delete_files" rows="6">{{ $delete_files }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Rename Folders</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="rename_folders" id="rename_folders" rows="6">{{ $rename_folders }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Rename Files</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="rename_files" id="rename_files" rows="6">{{ $rename_files }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Move Folders</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="move_folders" id="move_folders" rows="6">{{ $move_folders }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Move Files</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="move_files" id="move_files" rows="6">{{ $move_files }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Signature</label>
                                        <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="signature" id="signature" rows="6">{{ $signature }}</textarea>
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
                                                    <button type="reset" class="btn default" onClick="window.location.reload()">Clear</button>
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

@endsection

@push('scripts')
<script src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmEmployeeManagement').validate({
                rules: {
                    upload_files: {required: true},
                    delete_folders: {required: true},
                    delete_files: {required: true},
                    rename_folders: {required: true},
                    rename_files: {required: true},
                    move_folders: {required: true},
                    move_files: {required: true},
                },
                
            });
        });
    </script>
@endpush
