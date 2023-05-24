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
            <span class="active">Employer</span>
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
        <a href="{{ url('admin/employer/add') }}" class="btn sbold green"> Add New
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover table-checkable order-column datatables" >
                        <thead>
                            <tr>
				<td>ID (PE ID)</td>
                                <td>First Name</td>
                                <td>Last Name</td>
				<td>Email</td>
				<td>Company</td>
				<td>Address</td>
				<td>Postal No</td>
				<td>City</td>
				<td>Department No</td> 
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($interviewer)){
                                    foreach ($interviewer as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
					<td><?php echo $value->code; ?></td>
                                            <td><?php echo $value->first_name; ?></td>
                                            <td><?php echo $value->last_name; ?></td>
					<td><?php echo $value->email; ?></td>
					<td><?php echo $value->pharmacie; ?></td>
					<td><?php echo $value->adresse; ?></td>
					<td><?php echo $value->postal; ?></td>
					<td><?php echo $value->villa; ?></td>
					<!-- <td><?php //echo $value->departement; ?></td> -->
                    <td><?php echo $value->state; ?></td>

                                            
                                           
                                            <td>
                                                <?php $url = 'admin/employer/edit/'.$value->id; ?>
                                                <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                                <?php $url = 'admin/employer/delete/'.$value->id; ?>
                                                <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                    <i class="icon-trash"></i></a>
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
