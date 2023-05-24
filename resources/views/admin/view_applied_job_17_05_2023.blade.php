@extends('layouts.admin_master')
@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Hello, {{ session('user_name') }}</h1>
        </div>        
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('dashboard_admin') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">View Applied job</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            @include('layouts.flash-message')
        </div>
    </div>
    <!-- <div class="btn-group" style="float: right;margin-bottom: 20px;">
        <a href="{{ url('admin/interviewee/add') }}" class="btn sbold green"> Add New
            <i class="fa fa-plus"></i>
        </a>
    </div> -->

    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables" >
                        <thead>
                            <tr>
                                <td>Candidate name</td>
                                <td>Candidate email</td>
                                <td>Resume</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($apply_job)){
                                    foreach ($apply_job as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo isset($value->first_name) ? $value->first_name : ''; ?>
                                                <?php echo isset($value->last_name) ? ' '.$value->last_name : ''; ?>
                                            </td>
                                            <td>
                                    <?php echo isset($value->email) ? $value->email : ''; ?>
                                </td>
                                <td>
                                    <?php
                                    $href = '#';
                                    if(isset($value->resume) && !empty($value->resume)){ 
                                        $href = asset('resume/'.$value->resume);
                                    } ?>
                                    <a href="{{ $href }}">{{ __('message.view') }}</a>
                                </td>
                                        </tr>
                            <?php        
                                    }
                            } ?>
                            
                        </tbody>
                    </table>

    
</div>
@endsection

@push('scripts')

@endpush
