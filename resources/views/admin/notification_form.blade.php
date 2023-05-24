@extends('layouts.admin_master_new')
@section('content')
<?php
if ($action == 'Add') {
    $service_id  = '';
    $title       = '';
    $status      = '';
    $description = '';
    $days        = "";
    $code        = "";
} else {

    $days        = isset($service[0]->days) ? $service[0]->days : '';
    $service_id  = isset($service[0]->id) ? $service[0]->id : '';
    $status      = isset($service[0]->status) ? $service[0]->status : '';
    $title       = isset($service[0]->id) ? $service[0]->title : '';
    $description = isset($service[0]->id) ? $service[0]->description : '';
    $code        = isset($service[0]->code) ? $service[0]->code : '';
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
                                <a href="{{ url('admin/cg') }}">Notification Page /</a>
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
                                <i class="fa fa-gift" style="margin-right: 5px;"></i>{{ $action }}
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                            <?php
                            if ($action == "Add") {
                                $url = 'admin/notification/insert';
                            } else {
                                $url = 'admin/notification/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmServices" id="frmServices" method="POST">
                            @csrf
                                <input type="hidden" name="service_id" id="$service_id" value="{{ $service_id }}">


                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Title *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" value="{{ $title }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                @if($action =='edit')

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Code *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="code" id="code" placeholder="Enter Code" class="form-control" value="{{ $code }}">

                                        </div>
                                    </div>
                                </div>

                                @endif

                                <div class="form-group row">
                                        <label class="control-label col-md-3">Contant *</label>
                                        <div class="col-md-9">
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" rows="4" required="">{{ $description }}</textarea>
                                        </div>
                                    </div>

                 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Days (send alert)</label>
                                        <div class="col-md-9">
                                            <select name="days" id="days" class="form-control">
                        <option value="D0" <?php if ($days == "D0") {echo "selected";}?>>D0</option>
                        <option value="D14"  <?php if ($days == "D14") {echo "selected";}?>>D14</option>
                        <option value="D35"  <?php if ($days == "D35") {echo "selected";}?>>D35</option>
             <option value="T0"  <?php if ($days == "T0") {echo "selected";}?>>T0</option>
            <option value="P0"  <?php if ($days == "P0") {echo "selected";}?>>P0</option>
            <option value="R0"  <?php if ($days == "R0") {echo "selected";}?>>R0</option>
                        </select>
                                        </div>
                                    </div>
                                </div>


            <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Status</label>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control">
                        <option value="1" <?php if ($status == 1) {echo "selected";}?>>Active</option>
                        <option value="0"  <?php if ($status == 0) {echo "selected";}?>>Block</option>
                        </select>
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
        $(document).ready(function() {
            $('#frmServices').validate({
                rules: {
                    title: {
                        required: true
                    },
                    lang: {
                        required: true
                    },
                    code: {
                        required: {
                            depends: function(element) {
                               return ($('#code').length > 0) ? true : false;
                            }
                        }
                    }
                },

            });
        });

    </script>

@endpush
