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
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            @include('layouts.flash-message')
        </div>
    </div>
    <div class="btn-group" style="float: right;margin-bottom: 20px;">
        <a href="{{ url('admin/services/add') }}" class="btn sbold green"> Add New
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables" >
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Title</td>
                                <td>Contant</td>
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
                                            <td><?php echo html_entity_decode($value->description); ?></td>
                                            <td>
                                                <?php $url = 'admin/services/edit/'.$value->id; ?>
                                                <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                                <?php $url = 'admin/services/delete/'.$value->id; ?>
                                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                    <i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                            <?php        
                                        $i++;    
                                    }
                            } ?>
                            
                        </tbody>
                    </table>

    
</div>
@endsection

@push('scripts')

@endpush
