@include('layouts.header')

<!--Content Area-->
<style>
.table-responsive {height:280px;}
</style>

<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2 style="text-align: center;">Dashboard</h2>

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
			      <th scope="col">Date creation interview</th>
			      <th scope="col">Deadline</th>
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
                                	<?php $url = 'interview/'.$value->key; ?>
                                    <a href="{{ url($url) }}"><i class="icon-pencil"></i>Edit | </a>
                                    <?php $url = 'delete_interview/'.$value->key; ?>
                                    <a href="{{ url($url) }}" onclick="return confirm('Are you sure you want to delete ?')" >
                                        <i class="icon-trash"></i>Delete</a>
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