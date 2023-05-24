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
                                <span style="padding-left: 5px;" class="active">Jobs</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <a href="{{ url('admin/interviewee/add') }}" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
$off_image     = url('/').'/assets/off.jpeg';
$on_image      = url('/').'/assets/on.jpeg';
$blocked_image = url('/').'/assets/blocked.png';

if ($value->is_deleted == 1)
{
//$status = "Inactive";
$status = '<img class="img-fluid" src="'.$off_image.'" style="width:45px;"  />';
} elseif ($value->status == 1)
{
//$status = "Active";
$status = '<img class="img-fluid" src="'.$on_image.'" style="width:45px;"  />';
} else {
//$status = "Blocked";
$status = '<img class="img-fluid" src="'.$blocked_image.'" style="width:45px;"  />';
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

                        <a href="{{ url($url) }}" title="Edit"><i class="fas fa-edit" style="color: #009c08;"></i> |</a>

                        <?php $url = 'admin/job/statuspost/'.$value->id.'/'.$value->status; ?>

                        <a title="Update Job Status" href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to change status ?" aria-describedby="confirmation783017"><i class="fas fa-solid fa-pen-nib" style="color: #009c08;"></i> |</a>

                           <?php if ($value->is_deleted == true) {?>  
                                    <?php $url = 'admin/job/reactivepost/' . $value->id;?>  

                                   <!-- <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to reactive ?" aria-describedby="confirmation783017"  class="reactivet_btn">    
                                       {{ __('message.reactive') }}</a> -->

                <a href="{{ url($url_reactive) }}" class="reactivet_btn" title="Reactivate"><i class="fas fa-toggle-off" style="color: #009c08;"></i></a>



                                    <?php }else{?>  
                         <?php $url = 'admin/job/deletepost/'.$value->id; ?>    
                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017" title="Delete Job"><i class='fas fa-trash-alt' style="color: #009c08;"></i></a>  
<?php } ?>

                <?php $url = 'admin/job/deletepostadmin/'.$value->id; ?>    
                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017" title="Delete def. Job">| <i class="fa fa-trash" aria-hidden="true" style="color: #009c08;"></i> </a>


                                                <?php $url = 'admin/job/view/'.$value->id; ?>
                                                <a href="{{ url($url) }}" title="View Details">| <i class="fa fa-eye" aria-hidden="true" style="color: #009c08;"></i> |</a>

                                                <?php $url = 'admin/view-applied-job/'.$value->iid; ?>
                                                <a href="{{ url($url) }}" title="View Applied job"><i class="fas fa-solid fa-binoculars" style="color: #009c08;"></i> </a>
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
