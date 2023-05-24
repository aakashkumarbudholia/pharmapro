@extends('layouts.admin_master_new')
@section('content')

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
                                <a href="{{ url('admin/interviewer') }}">Language </a>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                <?php if($lng == 'en') { ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-gift" style="margin-right: 5px;"></i>Language for english
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/update_lang') }}" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            <input type="hidden" name="lang_id" value="en">
                            @csrf
                                
                                <?php
                                if(isset($language_en) && !empty($language_en)){
                                    foreach ($language_en as $k => $v) {
                                ?>

                                <div class="form-body">
                                    <div class="form-group row">
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
                                

                                <div class="form-group row">
                                    <label class="control-label col-md-4"></label>
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
                <?php } else{?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-user" style="margin-right: 5px;"></i>Language for france
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                            
                            <form action="{{ url('admin/update_lang') }}" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            <input type="hidden" name="lang_id" value="fr">
                            @csrf
                                
                                <?php
                                if(isset($language_fr) && !empty($language_fr)){
                                    foreach ($language_fr as $k => $v) {
                                ?>

                                <div class="form-body">
                                    <div class="form-group row">
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
                                

                                <div class="form-group row">
                                    <label class="control-label col-md-4"></label>
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
                <?php } ?>
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
