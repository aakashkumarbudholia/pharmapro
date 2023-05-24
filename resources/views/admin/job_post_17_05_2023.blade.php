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
            <span class="active">Jobs</span>
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
				<td>Job Post Date</td>
				<td>Job ID</td>
                                <td>Employer Name</td>
                                <td>Job title</td>
                                <!-- <td>Service</td> -->
                                <td>Company</td>
				 <td>Paid Status</td>
                 <td>Status</td>
				
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($job_post)){
                                    foreach ($job_post as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
					 <td>{{ $value->created_at }}</td>
					<td style="max-width: 200px !important;">{{ isset($value->job_id) ? $value->job_id : '' }}</td>
                                            <td>
                                                <?php
						$i=0;
                                                if(isset($value->user_id) && !empty($value->user_id)){
                                                    $user_info = DB::table('users')
                                                        ->where('id','=',$value->user_id)
                                                        ->get()
							->toArray();
						     $i = count($user_info);
							
					                            echo isset($user_info[0]->first_name) ? $user_info[0]->first_name : '';
					                            echo isset($user_info[0]->last_name) ? ' '.$user_info[0]->last_name : '';
						

								
							

                                                }
						
					if($i == 0)
					{
					echo "Published via form";
					}

                                                ?>
                                            </td>
                                            <td>{{ isset($value->job_title) ? $value->job_title : '' }}</td>
                                            <!-- <td>{{ isset($value->title) ? $value->title : '' }}</td> -->
                                            
                                            <td>{{ isset($value->company) ? $value->company : '' }}</td>

<?php 

$status = "";

if ($value->is_deleted == 1)
{
$status = "Inactive";
} elseif ($value->status == 1)
{
$status = "Active";
} else {
$status = "Blocked";
}

$paid_status = "";
if ($value->user_type == 'paid') 
{
    if ($value->paid_status == 1)
    {
        $paid_status = "Paid";
    } 
    else 
    {
        $paid_status = "Unpaid";
    }
}
else
{
    $paid_status = "Free";
}


?>


					    <td><?php echo $paid_status ; ?></td>
                        <td><?php echo $status ; ?></td>
					   
                                            <td>

						 <?php $url = 'admin/publication-formulaire-offre-emploi/edit/'.$value->id;
						$url_reactive = 'admin/publication-formulaire-offre-emploi/edit_reactive/'.$value->id; ?>

						<a href="{{ url($url) }}" >Edit |</a>

						<?php $url = 'admin/job/statuspost/'.$value->id.'/'.$value->status; ?>

						<a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to change status ?" aria-describedby="confirmation783017">Update Job Status |</a>

						   <?php if ($value->is_deleted == true) {?>  
                                    <?php $url = 'admin/job/reactivepost/' . $value->id;?>  

                                   <!-- <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to reactive ?" aria-describedby="confirmation783017"  class="reactivet_btn">    
                                       {{ __('message.reactive') }}</a> -->

				<a href="{{ url($url_reactive) }}" class="reactivet_btn">{{ __('message.reactive') }}</a>



                                    <?php }else{?>  
                         <?php $url = 'admin/job/deletepost/'.$value->id; ?>    
                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">Delete Job </a>  
<?php } ?>

				<?php $url = 'admin/job/deletepostadmin/'.$value->id; ?>    
                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">| Delete def. Job </a>


                                                <?php $url = 'admin/job/view/'.$value->id; ?>
                                                <a href="{{ url($url) }}">| View Details |</a>

                                                <?php $url = 'admin/view-applied-job/'.$value->iid; ?>
                                                <a href="{{ url($url) }}">View Applied job </a>
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
