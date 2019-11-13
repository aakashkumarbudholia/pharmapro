@include('layouts.home')
<!--Content Area-->
<section class="contentWrapper">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Publinetis - Power the curious</h2>
<div class="subHead">Industry's standard dummy text ever since</div>
</div>
<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h5>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including</h5>
</div>
</div>
</div>
</section>
<section class="serviceWrapper" style="background:url(images/serviceBack.jpg) no-repeat center top; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contentHead">
<h2>Publinetis - Power the curious</h2>
<div class="subHead">Industry's standard dummy text ever since</div>
</div>

<div class="owl-carousel owl-theme"  id="serviceCounter">

@foreach ($service as $value) 
<div class="item">
              <div class="shadow-effect">
                <i class="icon-request"></i>
                <h4> {{ $value->title }} </h4>
                <p> <?php echo html_entity_decode($value->description); ?> </p>
				<a class="rMore" href="{{ url('pricing') }}">Read more <i class="icon-fdas"></i></a>
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
