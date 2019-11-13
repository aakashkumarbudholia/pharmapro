@include('layouts.header')

<!--Content Area-->

<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Publinetis - Power the curious</h2>
<div class="subHead">Industry's standard dummy text ever since</div>
</div>

 
	<div class="row">
@foreach ($service as $value) 
	<div class="col-12 col-sm-6">

		<div class="item cleardiv">
			      <div class="shadow-effect">
				<h4> {{ $value->title }} </h4>
				<p> {{ $value->description }} </p>
			      </div>
			      
		</div>
 

	</div>

@endforeach 
	</div>
	
	


</div>
</div>
</div>
</section>

<!-- /Content Area-->
@include('layouts.footer')
