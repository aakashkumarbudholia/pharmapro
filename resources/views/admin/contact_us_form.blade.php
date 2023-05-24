@extends('layouts.admin_master_new')
@section('content')
<?php

    $contact_us_id = isset($contact_us->id) ? $contact_us->id : '';
    $title = isset($contact_us->id) ? $contact_us->title : '';
    $description = isset($contact_us->id) ? $contact_us->description : '';
$titlefr = isset($contact_us->id) ? $contact_us->titlefr : '';
    $descriptionfr = isset($contact_us->id) ? $contact_us->descfr : '';
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
                                <a href="{{ url('admin/contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-gift" style="margin-right: 5px;"></i>Contact Us
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/contact/update') }}" class="form-horizontal form-bordered" name="frmContactUs" id="frmContactUs" method="POST">
                            @csrf
                                <input type="hidden" name="contact_us_id" id="$contact_us_id" value="{{ $contact_us_id }}">
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Us Title for EN *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title for EN" class="form-control" value="{{ $title }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Us Contant for EN *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" rows="4" required="">{{ $description }}</textarea>
                                        </div>
                                    </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Us Title for FR *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="titlefr" id="titlefr" placeholder="Enter Title for FR" class="form-control" value="{{ $titlefr }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Us Contant for FR*</label>
                                        <div class="col-md-9">                      
                                            <textarea name="descriptionfr" id="descriptionfr" class="form-control" rows="4" required="">{{ $descriptionfr }}</textarea>
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
	   CKEDITOR.replace( 'descriptionfr' );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmContactUs').validate({
                rules: {
                    title: {required: true},
                },
                
            });
        });


    </script>

@endpush
