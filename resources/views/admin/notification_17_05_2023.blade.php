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
            <span class="active">Notification Page</span>
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
        <a href="{{ url('admin/notification/add') }}" class="btn sbold green"> Add Newsletter
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="datatables" >
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
                                                <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                                 <?php $url = 'admin/notification/delete/'.$value->id; ?>
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
