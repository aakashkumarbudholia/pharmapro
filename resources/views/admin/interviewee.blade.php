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
                                <span style="padding-left: 5px;" class="active">Candidate</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a class="btn btn-info btn-icon-split" href="{{ url('admin/interviewee/add') }}">
                                    <span class="text"> Add New</span>
                                    <span class="icon text-white-50"> <i class="fa fa-plus"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                            <tr>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Password</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($interviewee)){
                                    foreach ($interviewee as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $value->first_name; ?></td>
                                            <td><?php echo $value->last_name; ?></td>
                                            <td><?php echo $value->email; ?></td>
                                            <td><?php echo base64_decode($value->password); ?></td>
                                            <td>
                                                <?php $url = 'admin/interviewee/edit/'.$value->id; ?>
                                                <a href="{{ url($url) }}"><i class="fas fa-edit" style="color: #009c08;"></i></a>
                                                <?php $url = 'admin/interviewee/delete/'.$value->id; ?>
                                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: #009c08;"></i></a>
                                            </td>
                                        </tr>
                            <?php        
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
