@extends('layouts.admin_master_new')
@section('content')
<?php
if($action=='Add'){
    $service_id = '';
    $title = '';
   $display_order='';
}else{
    $service_id = isset($service[0]->id) ? $service[0]->id : '';
    $title = isset($service[0]->id) ? $service[0]->title : '';
   $display_order=isset($service[0]->id) ? $service[0]->display_order : ''; 
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
                                <a href="{{ url('admin/profession') }}">Profession /</a>
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
                                <i class="fa fa-gift" style="margin-right: 5px;"></i>{{ $action }} Profession
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin/profession/insert';
                            }else{
                                $url = 'admin/profession/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmServices" id="frmServices" method="POST">
                            @csrf
                                <input type="hidden" name="service_id" id="$service_id" value="{{ $service_id }}">
                                

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Profession Title *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Profession" class="form-control" value="{{ $title }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">
                                            Display Order *
                                        </label>
                                        <div class="col-md-9">
                                             <input type="text" name="display_order" id="display_order" placeholder="Enter Display Order" class="form-control" value="{{ $display_order }}" required="">
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
            $('#frmServices').validate({
                rules: {
                    title: {required: true},
                },
                
            });
        });


    </script>

@endpush
