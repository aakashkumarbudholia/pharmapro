@extends('layouts.admin_master')
@section('content')
<?php
if($action=='Add'){
    $service_id = '';
    $title = '';
    $page_name = '';
    $tag = '';
    $description = '';
}else{
    $service_id = isset($service[0]->id) ? $service[0]->id : '';
    $title = isset($service[0]->id) ? $service[0]->title : '';
    $tag = isset($service[0]->id) ? $service[0]->tag : '';
    $description = isset($service[0]->id) ? $service[0]->desc : '';
    $page_name =  isset($service[0]->id) ? $service[0]->page_name : '';
}
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/stag') }}">SEO TAG</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ $action }}</span>
        </li>
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
                                <i class="fa fa-gift"></i>{{ $action }} Services </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin/stag/insert';
                            }else{
                                $url = 'admin/stag/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmServices" id="frmServices" method="POST">
                            @csrf
                                <input type="hidden" name="service_id" id="$service_id" value="{{ $service_id }}">
                                
				<div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Page Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="page_name" id="title" placeholder="Enter page" class="form-control" value="{{ $page_name }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>



				<div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Title *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" value="{{ $title }}">
                                            <!-- <span class="help-block"> This is inline help </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tag *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="tag" id="tag" placeholder="Enter tag" class="form-control" value="{{ $tag }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3">Description *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" rows="4" required="">{{ $description }}</textarea>
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
            $('#frmServices').validate({
                rules: {
                    title: {required: true},
                },
                
            });
        });


    </script>

@endpush
