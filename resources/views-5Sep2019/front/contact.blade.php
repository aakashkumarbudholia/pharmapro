@include('layouts.header')

<!--Content Area-->

<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2 style="text-align: center;">Publinetis - Power the curious</h2>
<div class="subHead" style="text-align: center;">Industry's standard dummy text ever since</div>
</div>
	<div class="row">
		<div class="col-12 col-sm-12">
			<div class="item cleardiv" style="text-align: center;">
				<h4> {{ $contact_us->title }} </h4>
				<p> <?php echo html_entity_decode($contact_us->description);?> </p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>

<!-- /Content Area-->
@include('layouts.footer')
