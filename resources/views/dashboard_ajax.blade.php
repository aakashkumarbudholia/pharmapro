                        
                            <?php if(!empty($job_post)){
                                    foreach ($job_post as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">

                    <td>{{ isset($value->created_at) ? $value->created_at : '' }}</td>
                        <td style="max-width: 200px !important;">
                            {{ isset($value->job_id) ? $value->job_id : '' }}  
                            
                            <br><span style="color:#009c08"><?php 
                                        if($value->user_type == 'paid'){
                                            echo "Premium";
                                        }
                                    ?>
                                </span>                                        
                            </br>
                            
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
                            
                        