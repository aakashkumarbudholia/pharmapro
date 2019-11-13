@extends('layouts.admin_master')
@section('content')
<?php
if($action=='Add'){
    $id = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $password = '';
}else{
    $id = isset($interviewee_data[0]->id) ? $interviewee_data[0]->id : '';
    $first_name = isset($interviewee_data[0]->first_name) ? $interviewee_data[0]->first_name : '';
    $last_name = isset($interviewee_data[0]->last_name) ? $interviewee_data[0]->last_name : '';
    $email = isset($interviewee_data[0]->email) ? $interviewee_data[0]->email : '';
    $password = isset($interviewee_data[0]->password) ? $interviewee_data[0]->password : '';
}
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/interviewer') }}">Interviewee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ $action }}</span>
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
                                <i class="fa fa-gift"></i>{{ $action }} Interviewee </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin/interviewee/insert';
                            }else{
                                $url = 'admin/interviewee/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">First Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{ $first_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Last Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{ $last_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $password }}">
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

@endsection

@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    
    <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmInterviewee').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true},
                    password: {required: true},
                },
                
            });
        });


    </script>

@endpush
