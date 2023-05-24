@extends('layouts.admin_master')
@section('content')
<?php

    $id = isset($profile_data->id) ? $profile_data->id : '';
    $email = isset($profile_data->email) ? $profile_data->email : '';
    $username = isset($profile_data->username) ? $profile_data->username : '';
    $password = isset($profile_data->password) ? $profile_data->password : '';
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/profile') }}">My Profile</a>
            
        </li>
        <!-- <li>
            <span class="active"></span>
        </li> -->
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
                                <i class="fa fa-gift"></i>My Profile </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/profile/update') }}" class="form-horizontal form-bordered" name="frmAboutUs" id="frmAboutUs" method="POST">
                            @csrf
                                <input type="hidden" name="id" id="$id" value="{{ $id }}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Username *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" value="{{ $username }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">password *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $password }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
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
