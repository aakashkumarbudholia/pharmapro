<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Content Area-->
<style>
.table-responsive {height:280px;}
.new-interview{
	background: #00bf6f;
    border-color: #00bf6f;
    color: #fff;
    border: 1px solid #00bf6f;
    padding: 10px 18px 12px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 14px
}
.new-interview-a{
	float: right;margin-bottom: 20px;text-decoration: none !important;
}
</style>
<?php
$login_type = session('login_type');
if($login_type == 'interviewee'){
	$link = 'interviewee';
}else{
	$link = 'interview';
}
?>
<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2 style="text-align: center;">Dashboard – Manage your interviews</h2>

</div>
	<div class="row">
		<div class="col-12">
			<?php if(!empty(session('user_name')) && session('login_type') != 'interviewee'){ 
		 		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$keys = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
		 	?>
			      <a class="new-interview-a" href="<?php echo e(url('interview')); ?>/<?php echo $keys ?>"><span class="new-interview">New interview</span></a>
			<?php  } ?>
		</div>
	</div>

	<div class="row">
 
	<div class="col-12">

		<div class="item cleardiv">
		 	
			     
			<table class="table table-striped table-bordered" id="example">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <!-- <th scope="col">Interview Key</th> -->
			      <th scope="col">Interviewer</th>
			      <th scope="col">Interviewee</th>
			      <th scope="col">Creation interview</th>
			      <th scope="col">Deadline</th>
			      <th scope="col">Validated</th>
			      <th scope="col">Action</th>
			      
			    </tr>
			  </thead>
			  <tbody>

			    <?php if(!empty($interviewdata)){
			    		$i = 1;
                        foreach ($interviewdata as $key => $value) {
                ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i;?></td>
                                <!-- <td><?php echo $value->key; ?></td> -->
                                <td><?php echo $value->name.' '.$value->lname; ?></td>
                                <td><?php echo $value->name_wee.' '.$value->surname_wee; ?></td>
                                <td><?php echo date('m/d/Y',strtotime($value->created_date)); ?></td>
                                <td><?php echo $value->deadline; ?></td>
                                <td>
                                	<?php
                                		$login_type = session('login_type');
                                		$validate = array();
                                		if($login_type == 'frontuser'){
                                			$validate = DB::table('questions_3')
												            ->select('*')
												            ->where('iid',$value->key)
												            ->where('interviewer_validate','yes')
												            ->get();
										}elseif($login_type == 'interviewee'){
											$validate = DB::table('questions_3')
												            ->select('*')
												            ->where('iid',$value->key)
												            ->where('interviewee_validate','yes')
												            ->get();
										}else{
											$validate = DB::table('questions_3')
												            ->select('*')
												            ->where('iid',$value->key)
												            ->orWhere('interviewee_validate','yes')
												            ->orWhere('interviewee_validate','yes')
												            ->get();
										}
										if(count($validate) > 0){
											echo '<span style="color:#00bf6f">V</span>';
										}
                                	?>
                                </td>
                                <td>
                                	<?php $url = $link.'/'.$value->key; ?>
                                    <a href="<?php echo e(url($url)); ?>"><i class="icon-pencil"></i>Edit</a>
                                    <?php if($login_type != 'interviewee'){ ?>
                                    <?php $url = 'delete_interview/'.$value->key; ?>
                                    <a href="<?php echo e(url($url)); ?>" onclick="return confirm('Are you sure you want to delete ?')" >
                                        <i class="icon-trash"></i> | Delete</a>
                                    <?php } ?>
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
</div>
</div>
</section>

<!-- /Content Area-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mistic100-Bootstrap-Confirmation/2.4.4/bootstrap-confirmation.js" type="text/javascript"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ns-popover/0.6.8/nsPopover.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mistic100-Bootstrap-Confirmation/2.4.4/bootstrap-confirmation.min.js" type="text/javascript"></script> -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
    $('.delete').click(function(){
    	setTimeout(function(){ 
    		alert("Hello"); 
    		$('.confirmation').css('opacity','1','!important');
    	}, 1000);
    });
} );
</script>