<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Banner-->
<section class="banner sm" style="background:#f5fffa">
<div class="container">
<div class="row">
<div class="col-12">
<h1 contenteditable="true">Interview with Michael Jordan</h1>
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
<div class="resp-tabs-container">
<div>
<form class="feildForm" action="infoForm">
<div class="detSection">
<h3>Information about the interviewer </h3>
<div class="intHead">Who is asking the questions?</div>
<div class="form-group">
<label class="fName">Name</label>
<input type="text" class="form-control form-control-lg" placeholder="Enter your name (e.g. John)">
</div>
<div class="form-group">
<label class="fName">Surname</label>
<input type="text" class="form-control form-control-lg" placeholder="Enter your surname (e.g. Smith)">
</div>
<div class="form-group">
<label class="fName">Occupation</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter your occupation (e.g. journalist)">
</div>
<div class="form-group">
<label class="fName">E-mail</label>
    <input type="email" class="form-control form-control-lg" placeholder="Enter your Email">
</div>
<div class="form-group">
<label class="fName">Tel.</label>
    <input type="tel" class="form-control form-control-lg" placeholder="Enter your Telephone no.">
</div>
<div class="form-group">
<label class="fName">Personal site or page</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter your site or page (e.g. LinkedIn page, Twitter account)">
</div>
<div class="form-group">
<label class="fName">Picture</label>
<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
<label for="file-1"><span>Upload</span></label>
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
<input type="text" class="form-control form-control-lg" placeholder="Enter your media or company (e.g. CNN)">
</div>
<div class="form-group">
<label class="fName">URL of media outlet (e.g. www.cnn.com)</label>
<input type="text" class="form-control form-control-lg" placeholder="Enter the URL (e.g. cnn.com)">
</div>
<div class="form-group">
<label class="fName">Country of the company </label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter Country of the company ">
</div>
<div class="form-group">
<label class="fName">Monthly traffic of the site in thousands (e.g. 800 K)</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter traffic of the site (e.g. 800 K)">
</div>
<div class="form-group">
<label class="fName">Proof of traffic (e.g. link to Similarweb.com)</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter URL with proof of traffic (e.g. https://www.similarweb.com/website/cnn.com)">
</div>
<div class="form-group">
<label class="fName">Language of the site </label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter Language of the site ">
</div>
<div class="form-group">
<label class="fName">Main countries or areas of the site</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter Main countries or areas of the site">
</div>
<div class="form-group">
<label class="fName">Language of the interview</label>
    <input type="text" class="form-control form-control-lg" placeholder="Enter Language of the interview ">
</div>
<div class="form-group">
<label class="fName">Interview will be translate?</label>
<div class="form-inline">
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
  <label class="custom-control-label" for="customRadio1">Yes</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">No</label>
</div>
</div>
</div>
<div class="form-group">
<label class="fName">If yes, in which language? </label>
<select class="lang-select">
  <option selected>Select Language</option>
  <option value="1">French</option>
  <option value="2">Spanish</option>
  <option value="3">German</option>
  <option value="4">Portuguese</option>
  <option value="5">Italian</option>
</select>
</div>


</div>
<div class="detSection">
<h3>Notes</h3>
<div class="form-group">
<label class="fName">Resources (URL) to help the interviewee like press release or study</label>
    <input type="text" class="form-control form-control-lg mb-2" placeholder="Enter URL (e.g. link to press release)">
    <input type="text" class="form-control form-control-lg mb-2" placeholder="Enter URL (e.g. link to study with DOI)">
    <button type="button" class="btn btn-add">+</button>
</div>
<div class="form-group">
<label class="fName">Notes from the interviewer to the interviewees (who answer questions)</label>
<textarea type="text" class="form-control form-control-lg" placeholder="Enter notes from interviewer to interviewee to help in the interview (e.g. reference to a study)"></textarea>
</div>
<div class="form-group">
<label class="fName">References of the interviewers (e.g. past interviews, news)</label>
    <input type="text" class="form-control form-control-lg mb-2" placeholder="Enter URL (e.g. https://www.creapharma.com/news/new-link-gut-bacteria-obesity.htm)">
    <input type="text" class="form-control form-control-lg mb-2" placeholder="Enter URL (https://www.creapharma.com/gut-microbiome-may-affect-some-anti-diabetes-drugs-interview/)">
    <button type="button" class="btn btn-add">+</button>
</div>
</div>
<div class="detSection">
<h3>Deadline</h3>
<div class="form-group">
<label>Select a date for the deadline</label>
        <div class="col-xs-5 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control  form-control-lg " name="date" />
                <span class="input-group-append add-on"><span class="icon-calendar"></span></span>
            </div>
        </div>
    </div>
<div class="form-group text-right">
<button type="button" class="btn btn-prev">< </button>
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


<!-- /Form Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
