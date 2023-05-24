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
                                <span style="padding-left: 5px;" class="active">Footer Page</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <a href="{{ url('admin/services/add') }}" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                            <tr>
                                <td>No</td>
                                <td>Title</td>
                                <td>Language</td>
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
                                            <td><?php echo $value->lang ?></td>
                                            <td>
                                                <?php $url = 'admin/cg/edit/'.$value->id; ?>
                                                <a href="{{ url($url) }}"><i class="fas fa-edit" style="color: #009c08;"></i></a>
                                                <!-- <?php $url = 'admin/services/delete/'.$value->id; ?>
                                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                    <i class="icon-trash"></i></a> -->
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
