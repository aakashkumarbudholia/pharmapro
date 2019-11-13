@include('layouts.header')

<?php

$name = "";
$lname = "";
$occupation = "";
$email = "";
$phone = "";
$media_outlet = "";
$comp_country = "";
$mediaurl = "";
$website = "";
$traffic_of_site = "";
$lang_of_site = "";
$lang_of_interview = "";
$translate_lang = "";
$notes = "";
$deadline = "";
$country = "";
$area_of_site = "";
$translate = "";
$resources = "";
$references = "";
$logo = "";

if(!empty($interviewdata->name))
{
$name = $interviewdata->name ;
}

if(!empty($interviewdata->lname))
{
$lname = $interviewdata->lname ;
}

if(!empty($interviewdata->occupation))
{
$occupation = $interviewdata->occupation ;
}

if(!empty($interviewdata->email))
{
$email = $interviewdata->email ;
}

if(!empty($interviewdata->phone))
{
$phone = $interviewdata->phone ;
}

if(!empty($interviewdata->country))
{
$country = $interviewdata->country ;
}

if(!empty($interviewdata->media_outlet))
{
$media_outlet = $interviewdata->media_outlet ;
}

if(!empty($interviewdata->comp_country))
{
$comp_country = $interviewdata->comp_country ;
}

if(!empty($interviewdata->mediaurl))
{
$mediaurl = $interviewdata->mediaurl ;
}

if(!empty($interviewdata->website))
{
$website = $interviewdata->website ;
}

if(!empty($interviewdata->traffic_of_site))
{
$traffic_of_site = $interviewdata->traffic_of_site ;
}

if(!empty($interviewdata->lang_of_site))
{
$lang_of_site = $interviewdata->lang_of_site ;
}

if(!empty($interviewdata->lang_of_interview))
{
$lang_of_interview = $interviewdata->lang_of_interview ;
}

if(!empty($interviewdata->translate_lang))
{
$translate_lang = $interviewdata->translate_lang ;
}

if(!empty($interviewdata->notes))
{
$notes = $interviewdata->notes ;
}

if(!empty($interviewdata->deadline))
{
$deadline = $interviewdata->deadline ;
}

if(!empty($interviewdata->area_of_site))
{
$area_of_site = $interviewdata->area_of_site ;
}


if(!empty($interviewdata->translate))
{
$translate = $interviewdata->translate;
}

if(!empty($interviewdata->resources))
{
$resources = $interviewdata->resources;
}

if(!empty($interviewdata->references))
{
$references = $interviewdata->references;
}

if(!empty($interviewdata->image))
{
$logo = $interviewdata->image;
}





?>

<!--Banner-->
<section class="banner sm" style="background:#f5fffa">
<div class="container">
<div class="row">
<div class="col-12">
<!-- <h1 contenteditable="true">Interview with Michael Jordan</h1> -->
<h1 contenteditable="false">Interview with Michael Jordan</h1>
<!--<p>We get answers for 20 million questions daily. Get the feedback you need with a global leader in survey software.</p>-->
<!-- <a class="btn btn-rnd btn-green">New interview</a> -->
</div>
</div>
</div>
</section>
<!-- /Banner-->
<!--Form Area-->
<section class="multiFormArea">
<div class="container">
<div class="row">
<div class="col-12">
	<div class="multiForm">
    <div id="multiFormTab">
<ul class="resp-tabs-list">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>

<?php

$url = 'interview/'.$interviewid ;

?>


<div class="resp-tabs-container">
<div>
<form class="feildForm" action="{{ url($url) }}" name="frmmultistep1" id="frmmultistep1"  method="POST" enctype="multipart/form-data">
@csrf
@include('layouts.flash-message')

<input type="hidden" id="interviewid" name="interviewid" value="{{ $interviewid }}"> 
<input type="hidden" name="old_logo" id="old_logo" value="{{ $logo }}">

<div class="detSection">
<h3>Information about the interviewer </h3>
<div class="intHead">Who is asking the questions?</div>
<div class="form-group">
<label class="fName">Name</label>
<input type="text" class="form-control form-control-lg"  id="fname" name="fname" value="{{ $name }}" placeholder="Enter your name (e.g. John)" required>  
</div>
<div class="form-group">
<label class="fName">Surname</label>
<input type="text" class="form-control form-control-lg"  id="lname" name="lname"  value="{{ $lname }}" placeholder="Enter your surname (e.g. Smith)" required>
</div>
<div class="form-group">
<label class="fName">Occupation</label>
    <input type="text" class="form-control form-control-lg"  id="occupation" name="occupation"  value="{{ $occupation }}" placeholder="Enter your occupation (e.g. journalist)" required>
</div>
<div class="form-group">
<label class="fName">E-mail</label>
    <input type="email" class="form-control form-control-lg"  id="email" name="email"  value="{{ $email }}" placeholder="Enter your Email" required>
</div>
<div class="form-group">
<label class="fName">Tel.</label>
    <input type="tel" class="form-control form-control-lg"  id="phone" name="phone"  value="{{ $phone }}" placeholder="Enter your Telephone no." required>
</div>
<div class="form-group">
<label class="fName">Personal site or page</label>
    <input type="text" class="form-control form-control-lg"  id="site" name="site"  value="{{ $website }}" placeholder="Enter your site or page (e.g. LinkedIn page, Twitter account)">
</div>
<div class="form-group">
<label class="fName">Picture</label>
<input type="file" name="logo" id="logo" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"   />
<label for="logo"><span>Upload</span></label>
<img src="../logo/{{ $logo }}" class="img-responsive" alt="" style="width:100px;height:100px;">
</div>
<div class="form-group">

<!--<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
</div>-->

  </div>
</div>
<div class="detSection">
<h3>Media outlet information</h3>
<div class="intHead">Where the interview will be published?</div>
<div class="form-group">
<label class="fName">Name of the media outlet or company (if blog)</label>
<input type="text" class="form-control form-control-lg"  id="mediaoutlet" name="mediaoutlet"  value="{{ $media_outlet }}" placeholder="Enter your media or company (e.g. CNN)" >
</div>
<div class="form-group">
<label class="fName">URL of media outlet (e.g. www.cnn.com)</label>
<input type="text" class="form-control form-control-lg"  id="mediaurl" name="mediaurl"  value="{{ $mediaurl }}" placeholder="Enter the URL (e.g. cnn.com)" >
</div>
<div class="form-group">
<label class="fName">Country of the company </label>
    <input type="text" class="form-control form-control-lg"  id="compcountry" name="compcountry"  value="{{ $comp_country }}" placeholder="Enter Country of the company" >
</div>
<div class="form-group">
<label class="fName">Monthly traffic of the site in thousands (e.g. 800 K)</label>
    <input type="text" class="form-control form-control-lg" id="monthtraffic" name="monthtraffic"   value="{{ $traffic_of_site }}" placeholder="Enter traffic of the site (e.g. 800 K)" >
</div>
<div class="form-group">
<label class="fName">Proof of traffic (e.g. link to Similarweb.com)</label>
    <input type="text" class="form-control form-control-lg"  id="traffic" name="traffic"  value="{{ $area_of_site }}" placeholder="Enter URL with proof of traffic (e.g. https://www.similarweb.com/website/cnn.com)" >
</div>
<div class="form-group">
<label class="fName">Language of the site </label>
    <input type="text" class="form-control form-control-lg"  id="sitelang" name="sitelang"  value="{{ $lang_of_site }}" placeholder="Enter Language of the site " >
</div>
<div class="form-group">
<label class="fName">Main countries or areas of the site</label>
    <input type="text" class="form-control form-control-lg"  id="country" name="country"  value="{{ $country }}" placeholder="Enter Main countries or areas of the site" >
</div>
<div class="form-group">
<label class="fName">Language of the interview</label>
    <input type="text" class="form-control form-control-lg"  id="interlang" name="interlang"  value="{{ $lang_of_interview }}" placeholder="Enter Language of the interview " >
</div>
<div class="form-group">
<label class="fName">Interview will be translate?</label>
<div class="form-inline">
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="customRadio" value="yes" class="custom-control-input" <?php if($translate == 'yes') echo "checked";?> checked>
  <label class="custom-control-label" for="customRadio1">Yes</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio"  value="no"  class="custom-control-input" <?php if($translate == 'no') echo "checked";?> >
  <label class="custom-control-label" for="customRadio2">No</label>
</div>
</div>
</div>
<div class="form-group">
<label class="fName">If yes, in which language? </label>
<select class="lang-select" id="lang" name="lang" >
  <option>Select Language</option>
  <option value="French" <?php if($translate_lang == 'French') echo "selected" ;?>>French</option>
  <option value="Spanish" <?php if($translate_lang == 'Spanish') echo "selected" ;?>>Spanish</option>
  <option value="German" <?php if($translate_lang == 'German') echo "selected" ;?>>German</option>
  <option value="Portuguese" <?php if($translate_lang == 'Portuguese') echo "selected" ;?>>Portuguese</option>
  <option value="Italian" <?php if($translate_lang == 'Italian') echo "selected" ;?>>Italian</option>
</select>
</div>


</div>
<div class="detSection">
<h3>Notes</h3>
<div class="form-group">
<label class="fName">Resources (URL) to help the interviewee like press release or study</label>
    <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources"  value="{{ $resources }}"  placeholder="Enter URL (e.g. link to press release)">
   <!-- <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources[]" placeholder="Enter URL (e.g. link to study with DOI)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
<div class="form-group">
<label class="fName">Notes from the interviewer to the interviewees (who answer questions)</label>
<textarea type="text" class="form-control form-control-lg"  id="notes" name="notes"  placeholder="Enter notes from interviewer to interviewee to help in the interview (e.g. reference to a study)">{{ $notes }}</textarea>
</div>
<div class="form-group">
<label class="fName">References of the interviewers (e.g. past interviews, news)</label>
    <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference" value="{{ $references }}" placeholder="Enter URL (e.g. https://www.creapharma.com/news/new-link-gut-bacteria-obesity.htm)">
    <!-- <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference[]" placeholder="Enter URL (https://www.creapharma.com/gut-microbiome-may-affect-some-anti-diabetes-drugs-interview/)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
</div>
<div class="detSection">
<h3>Deadline</h3>
<div class="form-group">
<label>Select a date for the deadline</label>
        <div class="col-xs-5 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control  form-control-lg " name="deadlinedate" id="deadlinedate"  value="{{ $deadline }}"  required />
                <span class="input-group-append add-on"><span class="icon-calendar"></span></span>
            </div>
        </div>
    </div>

<div>
<input type="submit" value="Submit" class="btn btn-green" style="width:21% !important;"> 
</div>


<div class="form-group text-right">
<!-- <button type="button" onClick="hello();" class="btn btn-prev">< </button> -->
<button type="button" class="btn btn-nxt">></button>

</div>

</div>



</form>
</div>
<div>
<p>This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
</div>
<div>
<p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
</div>
<div>
<p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
</div>
<div>
<p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
</div>
</div>
</div>
    </div>
</div>
</div>
</div>
</section>

@push('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

 <script type="text/javascript">
        $(document).ready(function () {
            $('#frmmultistep1').validate({
                rules: {
                    fname: {required: true}
                },
                
            });
        });

  </script>


@endpush

<!-- /Form Area-->
@include('layouts.footer')
