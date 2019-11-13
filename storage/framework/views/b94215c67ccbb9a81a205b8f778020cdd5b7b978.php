<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Content Area-->
<style>
.table-responsive {height:280px;}
</style>

<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Manage Interviews</h2>

</div>

 
	<div class="row">
 
	<div class="col-12">

		<div class="item cleardiv">
		 <div class="table-responsive">
			     
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Interview Key</th>
			      <th scope="col">Interviewer</th>
			      <th scope="col">Interviewee</th>
			      <th scope="col">Deanline</th>
			      
			    </tr>
			  </thead>
			  <tbody>

			    <tr>
			      <td>1</td>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			      <td>12-5-2019</td>
			    </tr>
			   
			  </tbody>
			</table>
					
			</div>	      
		</div>
 

	</div>


	</div>
	
	


</div>
</div>
</div>
</section>

<!-- /Content Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
