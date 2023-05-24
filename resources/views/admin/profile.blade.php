@extends('layouts.admin_master_new')
@section('content')
<?php

    $id = isset($profile_data->id) ? $profile_data->id : '';
    $email = isset($profile_data->email) ? $profile_data->email : '';
    $username = isset($profile_data->username) ? $profile_data->username : '';
    $password = isset($profile_data->password) ? $profile_data->password : '';
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
                                <a href="{{ url('admin/profile') }}">My Profile</a>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-user" style="margin-right: 5px;"></i>My Profile
                            </h6>
                        </div>
                        <div class="card-body">
                            
                                <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/profile/update') }}" class="form-horizontal form-bordered" name="frmAboutUs" id="frmAboutUs" method="POST">
                            @csrf
                                <input type="hidden" name="id" id="$id" value="{{ $id }}">
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Username *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" value="{{ $username }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">password *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $password }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
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
    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmAboutUs').validate({
                rules: {
                    email: {required: true},
                    username: {required: true},
                    password: {required: true},
                },
            });
        });
    </script>

@endpush
