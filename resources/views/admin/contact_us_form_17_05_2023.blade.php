@extends('layouts.admin_master')
@section('content')
<?php

    $contact_us_id = isset($contact_us->id) ? $contact_us->id : '';
    $title = isset($contact_us->id) ? $contact_us->title : '';
    $description = isset($contact_us->id) ? $contact_us->description : '';
$titlefr = isset($contact_us->id) ? $contact_us->titlefr : '';
    $descriptionfr = isset($contact_us->id) ? $contact_us->descfr : '';
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/contact') }}">Contact Us</a>
            
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
                                <i class="fa fa-gift"></i>Contact Us </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/contact/update') }}" class="form-horizontal form-bordered" name="frmContactUs" id="frmContactUs" method="POST">
                            @csrf
                                <input type="hidden" name="contact_us_id" id="$contact_us_id" value="{{ $contact_us_id }}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Contact Us Title for EN *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title for EN" class="form-control" value="{{ $title }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3">Contact Us Contant for EN *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" rows="4" required="">{{ $description }}</textarea>
                                        </div>
                                    </div>

				<div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Contact Us Title for FR *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="titlefr" id="titlefr" placeholder="Enter Title for FR" class="form-control" value="{{ $titlefr }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3">Contact Us Contant for FR*</label>
                                        <div class="col-md-9">                      
                                            <textarea name="descriptionfr" id="descriptionfr" class="form-control" rows="4" required="">{{ $descriptionfr }}</textarea>
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
