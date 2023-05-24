@extends('layouts.admin_master_new')
@section('content')
<?php

    $about_us_id = isset($about_us->id) ? $about_us->id : '';
    $title = isset($about_us->id) ? $about_us->title : '';
    $description = isset($about_us->id) ? $about_us->description : '';
    $titlefr = isset($about_us->id) ? $about_us->titlefr : '';
    $descriptionfr = isset($about_us->id) ? $about_us->descfr : ''; 

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
                                <a href="{{ url('admin/services') }}">About Us</a>
                            </li>                            
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-gift" style="margin-right: 5px;"></i>About Us
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->                            
                            <form action="{{ url('admin/about/update') }}" class="form-horizontal form-bordered" name="frmAboutUs" id="frmAboutUs" method="POST">
                            @csrf
                                <input type="hidden" name="about_us_id" id="$about_us_id" value="{{ $about_us_id }}">
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">About Us Title for EN *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title for EN" class="form-control" value="{{ $title }}">                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label col-md-3">About Us Contant  for EN*</label>
                                        <div class="col-md-9">                      
                                            <textarea name="description" id="description" placeholder="Description for EN" class="form-control" rows="4" required="">{{ $description }}</textarea>
                                        </div>
                                </div>


                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">About Us Title for FR *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="titlefr" id="titlefr" placeholder="Enter Title for FR" class="form-control" value="{{ $titlefr }}">                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label col-md-3">About Us Contant for FR *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="descriptionfr" id="descriptionfr" placeholder="Description for FR" class="form-control" rows="4" required="">{{ $descriptionfr }}</textarea>
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
            $('#frmAboutUs').validate({
                rules: {
                    title: {required: true},
                },
                
            });
        });


    </script>

@endpush
