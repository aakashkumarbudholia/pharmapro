@extends('layouts.admin_master')
@section('content')

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/interviewer') }}">Language</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"></span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_5">
                    @include('layouts.flash-message')

	<?php if($lng == 'en') { ?>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Language for english </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/update_lang') }}" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            <input type="hidden" name="lang_id" value="en">
                            @csrf
                                
                                <?php
                                if(isset($language_en) && !empty($language_en)){
                                    foreach ($language_en as $k => $v) {
                                ?>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">{{ $v->key }} *</label>
                                        <div class="col-md-8">
                                            <input type="text" name="{{ $v->key }}" id="{{ $v->key }}" class="form-control" value="{{ $v->value }}">
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    }
                                }
                                ?>
                                

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

		<?php } else { ?>

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Language for france </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/update_lang') }}" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            <input type="hidden" name="lang_id" value="fr">
                            @csrf
                                
                                <?php
                                if(isset($language_fr) && !empty($language_fr)){
                                    foreach ($language_fr as $k => $v) {
                                ?>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">{{ $v->key }} *</label>
                                        <div class="col-md-8">
                                            <input type="text" name="{{ $v->key }}" id="{{ $v->key }}" class="form-control" value="{{ $v->value }}">
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    }
                                }
                                ?>
                                

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
		<?php } ?>
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

    <!-- <script type="text/javascript">
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


    </script> -->

@endpush
