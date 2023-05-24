@extends('layouts.admin_master_new')
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

    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-4">
                        @include('layouts.flash-message')
                    </p>
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Hello, {{ session('user_name') }}</h1> -->
                    <p class="mb-4">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="{{ url('admin/interviewer') }}">Candidate /</a>
                            </li>
                            <li>
                                <span style="padding-left: 5px;"  class="active">{{ $action }}</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-user" style="margin-right: 5px;"></i>{{ $action }} Interviewee
                            </h6>
                        </div>
                            
                            <div class="card-body">
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
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">First Name *</label>
                                            <div class="col-md-9">
                                                <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{ $first_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Last Name *</label>
                                            <div class="col-md-9">
                                                <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{ $last_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Email *</label>
                                            <div class="col-md-9">
                                                <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Password *</label>
                                            <div class="col-md-9">
                                                @php $dcd_password = base64_decode($password); @endphp
                                                <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $dcd_password }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                <i class="fa fa-check"></i> Submit</button> 
                                        </div>
                                        <div class="col-md-2">
                                            <button type="reset" class="btn btn-google btn-user btn-block">Clear</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
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
