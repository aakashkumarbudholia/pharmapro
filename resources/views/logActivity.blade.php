@extends('layouts.admin_master_new')
@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
   <!--  <div class="page-head">
        <div class="page-title">
            <h1>Hello, {{ session('user_name') }}</h1>
        </div>        
    </div> -->
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <!-- <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('dashboard_admin') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Dashboard</span>
        </li>
    </ul> -->
    <!-- END PAGE BREADCRUMB -->
    

     

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
                                <span style="padding-left: 5px;" class="active">Log Page</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <a href="{{ url('admin/notification/add') }}" class="btn sbold green"> Add Newsletter
                            <i class="fa fa-plus"></i>
                        </a>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
            <tr>
                <td>No</td>
                
                <td>Activity</td>
                <td>URL</td>
                
                <td>IP</td>
                
                <td>User Name</td>
                <td>Created Date</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $log=DB::table('log_activities')->select('*')->get();
            if(!empty($log))
            {
                $i=1;
                foreach ($log as $key => $value) {
            ?>
                <tr class="odd gradeX">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value->subject;?></td>
                    
                    <td><?php echo $value->url;?></td>
                    
                    <td><?php echo $value->ip;?></td>
                    
                    <td><?php $login_type=session('login_type');
                        $user_id=$value->user_id;
                        $interviewer_data=DB::table('users')->where('id','=',$user_id)->first();
                        if(isset($interviewer_data)){
                        echo $interviewer_data->first_name.'&nbsp'.$interviewer_data->last_name;
                        }?></td>
                    <td><?php echo $value->created_at;?></td>
                </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
