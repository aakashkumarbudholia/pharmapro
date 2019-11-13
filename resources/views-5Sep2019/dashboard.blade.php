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
            <span class="active">Dashboard</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <?php 
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $keys = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
    ?>
    <div class="btn-group" style="float: right;margin-bottom: 20px;">
        <a href="{{ url('interview') }}/<?php echo $keys ?>" class="btn sbold green"> Add New
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables" >
        <thead>
            <tr>
                <td>Interviewer Name</td>
                <td>Interviewee Name</td>
                <td>Interview With</td>
                <td>Occupation</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($interviewdata)){
                    foreach ($interviewdata as $key => $value) {
            ?>
                        <tr class="odd gradeX">
                            <td><?php echo $value->name.' '.$value->lname; ?></td>
                            <td><?php echo $value->name_wee.' '.$value->surname_wee; ?></td>
                            <td><?php echo $value->interview_with; ?></td>
                            <td><?php echo $value->occupation; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->phone; ?></td>
                            <td>
                                <?php $url = 'interview/'.$value->iid; ?>
                                <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                <?php $url = 'delete_interview/'.$value->iid; ?>
                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
            <?php            
                    }
            } ?>
            
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            @include('layouts.flash-message')
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
