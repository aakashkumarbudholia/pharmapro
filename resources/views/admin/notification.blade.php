@extends('layouts.admin_master_new')
@section('content')
<div class="page-content">
<style type="text/css">
    .btn-info 
    {
        color: #fff;
        background-color: #e9443b;
        border-color: #e9443b;
    }
</style>    
    
    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-4">
                        @include('layouts.flash-message')
                    </p>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Hello, {{ session('user_name') }}</h1>
                    <p class="mb-4">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="{{ url('dashboard_admin') }}">Home /</a>
                            </li>
                            <li>
                                <span style="padding-left: 5px;" class="active">Notification Page</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-info btn-icon-split" href="{{ url('admin/notification/add') }}" class="btn sbold green"> 
                            <span class="text"> Add Newsletter</span>
                            <span class="icon text-white-50"> <i class="fa fa-plus"></i></span>
                        </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                            <tr>
                                <td>No</td>
                                <td>Title</td>
                 <td>Code</td>
                 <td>When send</td>
                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($services)){
                                    $i = 1;
                                    foreach ($services as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $value->title ?></td>
                    <td><?php echo $value->code ?></td>
                    <td><?php echo $value->days ?></td>


<?php $url1 = 'admin/notification/status/0/'.$value->id; 
$url2 = 'admin/notification/status/1/'.$value->id;  ?>

                    <?php if($value->status == 1) { ?>
                    
                                              <td> <a href="{{ url($url1) }}" data-toggle="confirmation" data-original-title="Are you sure you want to change the status ?" aria-describedby="confirmation783017">
                            <img class="img-fluid" src="{{ asset('assets/on.jpeg') }}" style="width:45px;"  /></a></td>
                    <?php } else { ?>
                        <td><a href="{{ url($url2) }}" data-toggle="confirmation" data-original-title="Are you sure you want to change the status ?" aria-describedby="confirmation783017"><img class="img-fluid" src="{{ asset('assets/off.jpeg') }}" style="width:45px;"  /></a></td>
                    <?php } ?>



                                            <td>
                                                <?php $url = 'admin/notification/edit/'.$value->id; ?>
                                                <a href="{{ url($url) }}"><i class="fas fa-edit" style="color: #009c08;"></i></a>
                                                 <?php $url = 'admin/notification/delete/'.$value->id; ?>
                                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: #009c08;"></i></a> 
                                            </td>
                                        </tr>
                            <?php        
                                        $i++;    
                                    }
                            } ?>
                            
                        </tbody>
                    </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

    
</div>
@endsection

@push('scripts')

@endpush
