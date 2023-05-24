@extends('layouts.admin_master_new')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <?php 
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $keys = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
    ?>
    <!-- <div class="btn-group" style="float: right;margin-bottom: 20px;">
        <a href="{{ url('interview') }}/<?php echo $keys ?>" class="btn sbold green"> Add New
            <i class="fa fa-plus"></i>
        </a>
    </div> -->

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
                                <span style="padding-left: 5px;" class="active">Dashboard</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" onkeyup="search_data(this.value, 'result')">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered" id="news_disp" width="100%" cellspacing="0">
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
                                    
                                    <tbody id="dashboard_ajax">
                                        <?php if(!empty($job_post)){
                                                foreach ($job_post as $key => $value) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ isset($value->created_at) ? $value->created_at : '' }}
                                            </td>
                                            <td style="max-width: 200px !important;">
                                                {{ isset($value->job_id) ? $value->job_id : '' }}  
                            
                                                    <br>
                                                    <span style="color:#009c08">
                                                    <?php 
                                                    if($value->user_type == 'paid')
                                                    {
                                                        echo "Premium";
                                                    }  ?>
                                                    </span><br>
                            
                                            </td>
                                            <td>
                                                <?php
                        
                                                if(isset($value->user_id) && !empty($value->user_id)){
                                                    $user_info = DB::table('users')
                                                        ->where('id','=',$value->user_id)
                                                        ->first();

                                                    echo isset($user_info->first_name) ? $user_info->first_name : ' Published via form';

                                                    echo isset($user_info->last_name) ? ' '.$user_info->last_name : ' Published via form';
                                                }
                                                ?>
                                            </td>
                                            <td>{{ isset($value->job_title) ? $value->job_title : '' }}</td>
                                            <!-- <td>{{ isset($value->title) ? $value->title : '' }}</td> -->
                                            
                                            <td>{{ isset($value->company) ? $value->company : '' }}</td>

<?php 
$status = "";
//$off = '{{ asset('.'/assets/images/off.jpeg'.') }}';
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
//$status = '<img class="img-fluid" src="{{ asset('.'/assets/images/on.jpeg'.') }}" style="width:45px;"  />';
$status = '<img class="img-fluid" src="'.$on_image.'" style="width:45px;"  />';
//$status = "{{ asset('/assets/images/on.jpeg') }}";
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
                            $url_reactive = 'admin/publication-formulaire-offre-emploi/edit_reactive/'.$value->id;
?>

                        <a href="{{ url($url) }}" title="Edit"><i class="fas fa-edit" style="color: #009c08;"></i></a>

                        <?php $url = 'admin/job/status/'.$value->id.'/'.$value->status; ?>

                        <a href="{{ url($url) }}"  title="Update Job Status" data-toggle="confirmation" data-original-title="Are you sure you want to change status ?" aria-describedby="confirmation783017">| <i class="fas fa-solid fa-pen-nib" style="color: #009c08;"></i> |</a>

                         <?php if ($value->is_deleted == true) {?>

                                    <?php $url = 'admin/job/reactive/' . $value->id;
                     ?>
                                 <!--   <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to reactive ?" aria-describedby="confirmation783017"  class="reactivet_btn">
                                       {{ __('message.reactive') }}</a> -->


        <a href="{{ url($url_reactive) }}" class="reactivet_btn" title="Reactivate">
            <i class="fas fa-toggle-off" style="color: #009c08;"></i></a>


                                    <?php }else{?>

                        <?php $url = 'admin/job/delete/'.$value->id; ?>

                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017" title="Delete Job"><i class='fas fa-trash-alt' style="color: #009c08;"></i>
                         </a>
<?php } ?>

                      <?php $url = 'admin/job/deleteadmin/'.$value->id; ?>

                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017" title="Delete def. Job">| <i class="fa fa-trash" aria-hidden="true" style="color: #009c08;"></i> </a>



                                                <?php $url = 'admin/job/view/'.$value->id; ?>
                                                <a href="{{ url($url) }}" title="View Details">| <i class="fa fa-eye" aria-hidden="true" style="color: #009c08;"></i> |</a>

                                                <?php $url = 'admin/view-applied-job/'.$value->iid; ?>
                                                <a href="{{ url($url) }}" title="View Applied job">
                                                <i class="fas fa-solid fa-binoculars" style="color: #009c08;"></i> </a>
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

<input type="hidden" id="start" value="0">
<input type="hidden" id="rowperpage" value="{{ $rowperpage }}">
<input type="hidden" id="totalrecords" value="{{ $allcount }}">
                <!-- /.container-fluid -->
</div>
<script>
        function search_data(search_value) 
        { 
            //alert(search_value);
            $.ajax({
                url:"{{url('dashboard_search_ajax')}}",
                method: 'GET',
                data: {search_value:search_value},
            }).done(function(response){
                //alert(response);
                $('#dashboard_ajax').html(response); // put the returning html in the 'results' div
            });
        }

        checkWindowSize();

        // Check if the page has enough content or not. If not then fetch records
        function checkWindowSize(){
            if($(window).height() >= $(document).height()){
                  // Fetch records
                  fetchData();
            }
        }

        // Fetch records
        function fetchData(){
             var search_data = Number($('#search_data').val());
             var start = Number($('#start').val());
             var allcount = Number($('#totalrecords').val());
             var rowperpage = Number($('#rowperpage').val());
             start = start + rowperpage;
            if(search_data != 1)
            {
                 if(start <= allcount)
                 {
                      $('#start').val(start);

                      $.ajax({
                           url:"{{url('dashboard_ajax')}}",
                           type: 'get',
                           data: {start:start,rowperpage: rowperpage},
                           success: function(response){

                                // Add
                                $("#dashboard_ajax").append(response);

                                // Check if the page has enough content or not. If not then fetch records
                                checkWindowSize();
                           }
                      });
                 }
            }
        }

        $(document).on('touchmove', onScroll); // for mobile
       
        function onScroll(){

             if($(window).scrollTop() > $(document).height() - $(window).height()-100) {

                   fetchData(); 
             }
        }

        $(window).scroll(function(){

             var position = $(window).scrollTop();
             var bottom = $(document).height() - $(window).height();

             if( position == bottom ){
                   fetchData(); 
             }

        });

        </script>
@endsection

@push('scripts')

@endpush
