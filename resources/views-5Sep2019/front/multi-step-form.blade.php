@include('layouts.header')



<?php
$login_type = session('login_type');

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
$interview_with = "";

//step 2
$s2_iid = "";
$s2_fname = "";
$s2_surname = "";
$s2_occupation = "";
$s2_email = "";
$s2_phone = "";
$s2_notes = "";
$s2_link_congress = "";
$s2_link_download = "";
$s2_logo = "";

if(!empty($interviewdata->name))
{
$name = $interviewdata->name ;
}

if(!empty($interviewdata->lname))
{
$lname = $interviewdata->lname ;
}

/*if(!empty($interviewdata->interview_with))
{
$interview_with = ucwords($interviewdata->interview_with);
}else{
  $interview_with = ucwords($name." ".$lname) ;
}*/
$interview_with = '';
if(!empty($interviewee_data->name_wee))
{
$interview_with = ucwords($interviewee_data->name_wee." ");
}
if(!empty($interviewee_data->surname_wee)){
  $interview_with .= ucwords($interviewee_data->surname_wee) ;
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

if(!empty($interviewdata->interview_references))
{
$references = $interviewdata->interview_references;
}

if(!empty($interviewdata->image))
{
$logo = $interviewdata->image;
}

if(!empty($interviewee_data->name_wee))
{
$s2_fname = $interviewee_data->name_wee;
}

if(!empty($interviewee_data->surname_wee))
{
$s2_surname = $interviewee_data->surname_wee;
}

if(!empty($interviewee_data->occupation_wee))
{
$s2_occupation = $interviewee_data->occupation_wee;
}

if(!empty($interviewee_data->email_wee))
{
$s2_email = $interviewee_data->email_wee;
}

if(!empty($interviewee_data->phone_wee))
{
$s2_phone = $interviewee_data->phone_wee;
}

if(!empty($interviewee_data->notes_wee))
{
$s2_notes = $interviewee_data->notes_wee;
}

if(!empty($interviewee_data->link_congress))
{
$s2_link_congress = $interviewee_data->link_congress;
}

if(!empty($interviewee_data->link_image))
{
$s2_link_download = $interviewee_data->link_image;
}

if(!empty($interviewee_data->image_wee))
{
$s2_logo = $interviewee_data->image_wee;
}

$question1 = '';
$question2 = '';
$note1 = '';
$note2 = '';
$que_note_count = count($question_data);
if(isset($question_data[0]->question) && !empty($question_data[0]->question)){
  $question1 = $question_data[0]->question;
}

if(isset($question_data[1]->question) && !empty($question_data[1]->question)){
  $question2 = $question_data[1]->question;
}

if(isset($question_data[0]->notes) && !empty($question_data[0]->notes)){
  $note1 = $question_data[0]->notes;
}

if(isset($question_data[1]->notes) && !empty($question_data[1]->notes)){
  $note2 = $question_data[1]->notes;
}

if($login_type == 'interviewee'){
  $url = 'interviewee/'.$interviewid ;
}else{
  $url = 'interview/'.$interviewid ;
}
?>

<form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep1" id="frmmultistep1"  method="POST" enctype="multipart/form-data">
@csrf
<!--Banner-->
<section class="banner sm" style="background:#f5fffa">
<div class="container">
<div class="row">
<div class="col-12">
<!-- <h1 contenteditable="true">Interview with Michael Jordan</h1> -->
<h1 contenteditable="false">Interview with 
<input type="text" name="interview_with" id="interview_with" value="<?php echo $interview_with; ?>" autocomplete="off" >
</h1>
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
    <?php 
          if($login_type == 'interviewee'){
              $login_type_cls = 'disabled';
          }else{
              $login_type_cls = '';
          }
   ?>
<ul class="resp-tabs-list">
<li class="<?php echo $login_type_cls; ?>" id="li-step-1">1<span>Interviewer</span></li>
<li class="<?php if($login_type == 'interviewee'){ ?> resp-tab-active<?php } ?>" id="li-step-2">2<span>Interviewee</span></li>
<li class="<?php echo $login_type_cls; ?>" id="li-step-3">3<span>Questions</span></li>
<li id="li-step-4">4<span>Answers</span></li>
<li id="li-step-5">5<span>Review</span></li>
</ul>


<?php



?>


<div class="resp-tabs-container">
<div id="step-1" class="step">

<?php if(Session::get('step') == '1'){ ?>
    @include('layouts.flash-message')
  <?php } ?>

<input type="hidden" id="interviewid" name="interviewid" value="{{ $interviewid }}"> 
<input type="hidden" name="old_logo" id="old_logo" value="{{ $logo }}">

<div class="detSection">
<h3>Information about the interviewer </h3>
<div class="intHead">Who is asking the questions?</div>
<div class="form-group">
<label class="fName">Name*</label>
<input type="text" class="form-control form-control-lg"  id="fname" name="fname" value="{{ $name }}" placeholder="Enter your name (e.g. John)"  >  
</div>
<div class="form-group">
<label class="fName">Surname*</label>
<input type="text" class="form-control form-control-lg"  id="lname" name="lname"  value="{{ $lname }}" placeholder="Enter your surname (e.g. Smith)" >
</div>
<div class="form-group">
<label class="fName">Occupation</label>
    <input type="text" class="form-control form-control-lg"  id="occupation" name="occupation"  value="{{ $occupation }}" placeholder="Enter your occupation (e.g. journalist)" >
</div>
<div class="form-group">
<label class="fName">Email*</label>
    <input type="email" class="form-control form-control-lg"  id="email" name="email"  value="{{ $email }}" placeholder="Enter your Email" >
</div>
<div class="form-group">
<label class="fName">Tel.</label>
    <input type="tel" class="form-control form-control-lg"  id="phone" name="phone"  value="{{ $phone }}" placeholder="Enter your Telephone no." >
</div>
<div class="form-group">
<label class="fName">Personal site or page</label>
    <input type="text" class="form-control form-control-lg"  id="site" name="site"  value="{{ $website }}" placeholder="Enter your site or page (e.g. LinkedIn page, Twitter account)" >
</div>
<div class="form-group">
<label class="fName">Picture</label>
<input type='file' name="logo" id="logo"  />
<img id="blah" src="../logo/{{ $logo }}" class="img-responsive" alt="" style="width:200px;height:200px;margin-top: 10px;"> 

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
<input type="text" class="form-control form-control-lg"  id="mediaoutlet" name="mediaoutlet"  value="{{ $media_outlet }}" placeholder="Enter your media or company (e.g. CNN)"  >
</div>
<div class="form-group">
<label class="fName">URL of media outlet (e.g. www.cnn.com)</label>
<input type="text" class="form-control form-control-lg"  id="mediaurl" name="mediaurl"  value="{{ $mediaurl }}" placeholder="Enter the URL (e.g. cnn.com)"  >
</div>
<div class="form-group">
<label class="fName">Country of the company </label>
    <input type="text" class="form-control form-control-lg"  id="compcountry" name="compcountry"  value="{{ $comp_country }}" placeholder="Enter Country of the company"  >
</div>
<div class="form-group">
<label class="fName">Monthly traffic of the site in thousands (e.g. 800 K)</label>
    <input type="text" class="form-control form-control-lg" id="monthtraffic" name="monthtraffic"   value="{{ $traffic_of_site }}" placeholder="Enter traffic of the site (e.g. 800 K)"  >
</div>
<div class="form-group">
<label class="fName">Proof of traffic (e.g. link to Similarweb.com)</label>
    <input type="text" class="form-control form-control-lg"  id="traffic" name="traffic"  value="{{ $area_of_site }}" placeholder="Enter URL with proof of traffic (e.g. https://www.similarweb.com/website/cnn.com)"  >
</div>
<div class="form-group">
<label class="fName">Language of the site </label>
    <input type="text" class="form-control form-control-lg"  id="sitelang" name="sitelang"  value="{{ $lang_of_site }}" placeholder="Enter Language of the site "  >
</div>
<div class="form-group">
<label class="fName">Main countries or areas of the site</label>
    <input type="text" class="form-control form-control-lg"  id="country" name="country"  value="{{ $country }}" placeholder="Enter Main countries or areas of the site"  >
</div>
<div class="form-group">
<label class="fName">Language of the interview</label>
    <input type="text" class="form-control form-control-lg"  id="interlang" name="interlang"  value="{{ $lang_of_interview }}" placeholder="Enter Language of the interview "  >
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
<select class="form-control lang-select" id="lang" name="lang" >
  <option value="">Select Language</option>
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
    <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources"  value="{{ $resources }}"  placeholder="Enter URL (e.g. link to press release)" >
   <!-- <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources[]" placeholder="Enter URL (e.g. link to study with DOI)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
<div class="form-group">
<label class="fName">Notes from the interviewer to the interviewees (who answer questions)</label>
<textarea type="text" class="form-control form-control-lg"  id="notes" name="notes"  placeholder="Enter notes from interviewer to interviewee to help in the interview (e.g. reference to a study)">{{ $notes }}</textarea>
</div>
<div class="form-group">
<label class="fName">References of the interviewers (e.g. past interviews, news)</label>
    <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference" value="{{ $references }}" placeholder="Enter URL (e.g. https://www.creapharma.com/news/new-link-gut-bacteria-obesity.htm)" >
    <!-- <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference[]" placeholder="Enter URL (https://www.creapharma.com/gut-microbiome-may-affect-some-anti-diabetes-drugs-interview/)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
</div>
<div class="detSection">
<h3>Deadline</h3>
<div class="form-group">
<label class="fName">Select a date for the deadline*</label>
        <div class="col-xs-5 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control  form-control-lg " name="deadlinedate" id="deadlinedate"  value="{{ $deadline }}"   />
                <span class="input-group-append add-on"><span class="icon-calendar"></span></span>
            </div>
        </div>
    </div>

<div>
<button type="submit" value="step_1" class="btn btn-green" name="btn_step" id="btn_step" style="width:21% !important;">Save</button>
</div>


<div class="form-group text-right">
<!-- <button type="button" onClick="hello();" class="btn btn-prev">< </button> -->
<button type="button" class="btn btn-nxt" id="link-step-1">></button>

</div>

<div class="form-group text-left">
  *Mandatory fields
</div>

</div>
 


</div>
</form>
<?php if(!empty($name)){ ?>
<div id="step-2" style="display: none;" class="step">
  <?php if(Session::get('step') == '2'){ ?>
    @include('layouts.flash-message')
  <?php } ?>
  <form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep2" id="frmmultistep2"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s2_interviewid" name="s2_interviewid" value="{{ $interviewid }}"> 

    <input type="hidden" name="s2_old_logo" id="s2_old_logo" value="{{ $s2_logo }}">
    <div class="detSection">
      <h3>Information about the interviewee</h3>
      <div class="intHead">Who is the interviewee?</div>

      <div class="form-group">
        <label class="fName">Name *</label>
        <input type="text" class="form-control form-control-lg" id="s2_fname" name="s2_fname" value="{{ $s2_fname }}" placeholder="Enter your name (e.g. John)" required="">  
      </div>

      <div class="form-group">
        <label class="fName">Surname *</label>
        <input type="text" class="form-control form-control-lg" id="s2_surname" name="s2_surname" value="{{ $s2_surname }}" placeholder="Enter your Surname (e.g. John)" required="">  
      </div>

      <div class="form-group">
          <label class="fName">Occupation *</label>
          <input type="text" class="form-control form-control-lg" id="s2_occupation" name="s2_occupation" value="{{ $s2_occupation }}" placeholder="Enter your occupation (e.g. journalist)" required="">
      </div>

      <div class="form-group">
        <label class="fName">Email *</label>
          <input type="email" class="form-control form-control-lg" id="s2_email" name="s2_email" value="{{ $s2_email }}" placeholder="Enter your Email" required="">
      </div>

      <div class="form-group">
          <label class="fName">Tel.</label>
          <input type="tel" class="form-control form-control-lg" id="s2_phone" name="s2_phone" value="{{ $s2_phone }}" placeholder="Enter your Telephone no." >
      </div>

      <div class="form-group">
        <label class="fName">Picture</label>
        <input type="file" name="s2_logo" id="s2_logo">
        <?php
          if(!empty($s2_logo)){
        ?>
            <img id="blah" src="../logo/{{ $s2_logo }}" class="img-responsive" alt="" style="width:200px;height:200px;margin-top: 10px;">
        <?php } ?>

      </div>

      <div class="form-group">
        <label class="fName">Note</label>
        <textarea type="text" class="form-control form-control-lg" id="s2_notes" name="s2_notes" placeholder="Head scientist by Novartis">{{ $s2_notes }}</textarea>
      </div>

      <div class="form-group">
          <label class="fName">Link to a congress</label>
          <input type="tel" class="form-control form-control-lg" id="s2_link_congress" name="s2_link_congress" value="{{ $s2_link_congress }}" placeholder="e.g. about lice" >
      </div>

      <div class="form-group">
        <label class="fName">Link to pictures to download</label>
        <input type="tel" class="form-control form-control-lg" id="s2_link_download" name="s2_link_download" value="{{ $s2_link_download }}" placeholder="e.g. links on Flickr or url" >
      </div>
    </div>

    <div>
      <button type="submit" value="step_2" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">Save</button> 
    </div>
  </form>
  <div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-2">></button>
  </div>
  <div class="form-group text-left">
  *Mandatory fields
</div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if(!empty($s2_fname)){ ?>
<div class="step" id="step-3" >
  <?php if(Session::get('step') == '3'){ ?>
    @include('layouts.flash-message')
  <?php } ?>
<form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep3" id="frmmultistep3"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s3_interviewid" name="s3_interviewid" value="{{ $interviewid }}"> 
    <div class="detSection">
      <h3>Questions</h3>
      <div class="form-group">
          <label class="fName">Question 1</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[1][question]" placeholder="">{{ $question1 }}</textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note 1</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[1][notes]" placeholder="" >{{ $note1 }}</textarea>
      </div>
      <hr style="border-color: #00bf6f;">
      <div class="form-group">
          <label class="fName">Question 2</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[2][question]" placeholder="">{{ $question2 }}</textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note 2</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[2][notes]" placeholder="">{{ $note2 }}</textarea>
          
      </div>
      <hr style="border-color: #00bf6f;">
      <?php
        if($que_note_count >= 2){
          $i = 0;
          foreach ($question_data as $key => $value) {
            $i++;
            if($i < 3){
              continue;
            }
      ?>
            <div class="form-group">
              <label class="fName">Question <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[<?php echo $i;?>][question]" placeholder=""><?php if(isset($value->question)){ echo $value->question; } ?></textarea>
          </div>
          <div class="form-group">
              <label class="fName">Note <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[<?php echo $i;?>][notes]" placeholder="" ><?php if(isset($value->notes)){ echo $value->notes; } ?></textarea>
              
          </div>  
          <hr style="border-color: #00bf6f;">
      <?php      
          }
      ?>
      <?php
        }
      ?>
      <div id="show_more_fields">
        
      </div>
      <button type="button" class="btn btn-add more-field" id="more_field">+</button>
      <!-- <div class="form-group">
          <label class="fName">Email</label>
          <input type="text" id="send_email" name="send_email" value="{{ $s2_email }}" class="form-control form-control-lg valid" >
          
      </div>  -->
    </div>

    <div>
      <button type="submit" value="step_3" name="btn_step" id="btn_step" class="btn btn-green pop_submit" style="width:21% !important;float: left;">Save</button> 
    </div>
    <div>
       <button type="button" value="step_3" name="btn_step" id="btn_step" class="btn btn-green" style="margin-left: 10px;float: left" data-toggle="modal" data-target="#myModal">Save and send a link of this interview to the interviewee</button> 
      
      <!-- <button type="submit" value="send_email" name="btn_step" id="btn_step" class="btn btn-green" style="margin-left: 10px;float: left;">Save and send a link of this interview to the interviewee</button>  -->

      
    </div>

</form>
<div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-3">></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if($que_note_count > 0){ ?>
<div class="step" id="step-4">
  <?php if(Session::get('step') == '4'){ ?>
    @include('layouts.flash-message')
  <?php } ?>
  <form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep4" id="frmmultistep4"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s4_interviewid" name="s4_interviewid" value="{{ $interviewid }}"> 
    <div class="detSection">
      <h3>Answers</h3>
      <?php
        if($que_note_count > 0){
          $i = 0;
          foreach ($question_data as $key => $value) {
            $i++;
      ?>
            <div class="form-group">
              <label class="fName">Question <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s4_que" name="s4_ans[<?php echo $i;?>][question]" placeholder="" <?php if($login_type != 'admin'){ ?> style="font-weight: bolder;" <?php } ?>  ><?php if(isset($value->question)){ echo $value->question; } ?></textarea>
            </div>
            <div class="form-group">
                <label class="fName">Note <?php echo $i;?></label>
                <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s4_note" name="s4_ans[<?php echo $i;?>][notes]" placeholder="" ><?php if(isset($value->notes)){ echo $value->notes; } ?></textarea>
            </div>  
            <div class="form-group">
              <label class="fName">Answer <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type == 'frontuser'){ ?> disabled <?php } ?>" id="s4_ans" name="s4_ans[<?php echo $i;?>][anwser]" placeholder="" ><?php if(isset($value->anwser)){ echo $value->anwser; } ?></textarea>
              <input type="hidden" name="s4_ans[<?php echo $i;?>][id]" value="<?php echo $value->id;?>">
            </div>
            <hr style="border-color: #00bf6f;">
      <?php      
          }
      ?>

    </div>
    <div>
      <button type="submit" value="step_4" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">Save</button> 
    </div>
    <?php
        }else{
      ?>
        <h4>No Questions</h4>
      <?php } ?>
  </form>
  <div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-4">></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if($que_note_count > 0){ ?>
<div class="step" id="step-5">
  <?php if(Session::get('step') == '5'){ ?>
    @include('layouts.flash-message')
  <?php } ?>
  
  <form class="feildForm" runat="server"  action="{{ url($url) }}" name="frmmultistep5" id="frmmultistep5"  method="POST" enctype="multipart/form-data">
  @csrf
    <input type="hidden" id="s5_interviewid" name="s5_interviewid" value="{{ $interviewid }}"> 
    <div class="detSection">
      <h3>Review</h3>
      <?php
        if($que_note_count > 0){
          $i = 0;
          foreach ($question_data as $key => $value) {
            $i++;
      ?>
            <div class="form-group">
              <label class="fName">Question <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s5_que" name="s5_final[<?php echo $i;?>][question]" placeholder=""  ><?php if(isset($value->question)){ echo $value->question; } ?></textarea>
            </div>
            <div class="form-group">
                <label class="fName">Note <?php echo $i;?></label>
                <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s5_note" name="s5_final[<?php echo $i;?>][notes]" placeholder=""  ><?php if(isset($value->notes)){ echo $value->notes; } ?></textarea>
            </div>  
            <div class="form-group">
              <label class="fName">Answer <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s5_ans" name="s5_final[<?php echo $i;?>][anwser]" placeholder="" ><?php if(isset($value->anwser)){ echo $value->anwser; } ?></textarea>
            </div>
            <div class="form-group">
              <label class="fName">Final note, question, precision <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" id="s5_notes_pre" name="s5_final[<?php echo $i;?>][notes_precious]" placeholder="" ><?php if(isset($value->notes_precious)){ echo $value->notes_precious; } ?></textarea>
            </div>
            <div class="form-group">
              <label class="fName">Answer to final note, question, precision <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg " id="s5_ans_pre" name="s5_final[<?php echo $i;?>][anwser_precious]" placeholder=""><?php if(isset($value->anwser_precious)){ echo $value->anwser_precious; } ?></textarea>
            </div>
            <input type="hidden" name="s5_final[<?php echo $i;?>][id]" value="<?php echo $value->id;?>">
            <hr style="border-color: #00bf6f;">
      <?php      
          }
      ?>

    </div>
    <div>
      <button type="submit" value="step_5" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">Save</button> 
    </div>
    <?php
        }else{
      ?>
        <h4>No Data</h4>
      <?php } ?>
  </form>
  <div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-5">></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>
</div>
</div>
    </div>
</div>
</div>
</div>
</section>

<!-- star model -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Interviewee Info.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- <form class="feildForm" runat="server"  action="{{ url($url) }}" name="Frmsend_email" id="Frmsend_email"  method="POST" enctype="multipart/form-data">
          @csrf -->
            <input type="hidden" id="pop_interviewid" name="pop_interviewid" value="{{ $interviewid }}">
            <input type="text" name="pop_name" value="<?php echo $s2_fname; ?>" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Name" required id="pop_name" >
            <input type="text" name="pop_email" value="<?php echo $s2_email; ?>" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Email" id="pop_email" required>
            <input type="text" name="pop_note" value="" class = "form-control form-control-lg" style="border: 1px solid #878f98 !important;margin-bottom: 10px;" placeholder="Note" id="pop_note" required>
            <button type="button" value="send_email" name="btn_step" id="send_email" class="btn btn-green" style="width:21% !important;padding: 1px !important;">Send</button>
         <!--  </form> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end model -->
@push('scripts')


@endpush

<!-- /Form Area-->
@include('layouts.footer')
<style type="text/css">
  .disabled{
    pointer-events: none;
    /*opacity: 0.5;*/
    border:none !important;
    resize: none;
  }
  .disabled-div{
    display: none;
  }
  #interview_with{
    border: none;
    color: #2771b8;
    font-size: 37px;
    font-weight: 600;
    /*margin-bottom: 8px;*/
    /*width: 450px;*/
    background: transparent;
        margin-top: -5px;
  }
  .feildForm textarea.disabled{padding: 0px 0px 0px;
        vertical-align: top;
        resize:none;}
 
</style>
<script type="text/javascript">
  $('#link-step-1').click(function(e){
      $('#li-step-2').addClass('resp-tab-active');
      $('#li-step-2').click();
      $(window).scrollTop(0);
  });
<?php
if($login_type == 'interviewee'){ ?>
  $('#link-step-2').click(function(e){
      $('#li-step-4').addClass('resp-tab-active');
      $('#li-step-4').click();
      $(window).scrollTop(0);
  });
<?php }else{ ?>
  $('#link-step-2').click(function(e){
      $('#li-step-3').addClass('resp-tab-active');
      $('#li-step-3').click();
      $(window).scrollTop(0);
  });
<?php } ?>

  $('#link-step-3').click(function(e){
      $('#li-step-4').addClass('resp-tab-active');
      $('#li-step-4').click();
      $(window).scrollTop(0);
  });

  $('#link-step-4').click(function(e){
      $('#li-step-5').addClass('resp-tab-active');
      $('#li-step-5').click();
      $(window).scrollTop(0);
  });
<?php 
if($login_type == 'interviewee'){ ?>
  $('#link-step-5').click(function(e){
      $('#li-step-2').addClass('resp-tab-active');
      $('#li-step-2').click();
      $(window).scrollTop(0);
  });
<?php }else{ ?>
  $('#link-step-5').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });
<?php } ?>
  $('.more-field').click(function(){
    var id = incr();
    $("#show_more_fields").append(
        '<div class="form-group"><label class="fName">Question '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que['+id+'][question]" placeholder=""></textarea></div><div class="form-group"><label class="fName">Note '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que['+id+'][notes]" placeholder="" ></textarea></div><hr style="border-color: #00bf6f;">'
        );
  });

  var incr = (function () {
  var count = '<?php echo $que_note_count; ?>'; 
  if(count == 0){
    var i = 3;  
  }else{
    var i = parseInt(count) + 1;
  }
  

    return function () {
        return i++;
    }
})();
</script>
<script type="text/javascript">
  $('li').removeClass('resp-tab-active');
</script>
<?php
if($login_type == 'interviewee'){
  if(!empty(Session::get('step'))){
    $step = Session::get('step');    
  }else{
    $step = '2';
  }
?>
<script type="text/javascript">
  $('#li-step-<?php echo $step;?>').addClass('resp-tab-active');
  $('#li-step-<?php echo $step;?>').click();
</script>
<?php  
}else{
  if(!empty(Session::get('step'))){
    $step = Session::get('step');    
  }else{
    $step = '1';
  }
?>
<script type="text/javascript">
  $('#li-step-<?php echo $step;?>').addClass('resp-tab-active');
  $('#li-step-<?php echo $step;?>').click();

</script>


<?php } ?>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



<script type="text/javascript">
   $("#frmmultistep1").validate({
    rules: {
      fname: "required",
      lname: "required",
      //occupation: "required",
      email: {
        required: true,
        email: true
      },
      /*phone: {
        required: true,
        minlength:10,
        maxlength:15
      },*/
      /*logo: {
              required: {
                  depends: function(element) {
                      <?php if(!file_exists(public_path('/logo'). "/".  $logo) || $logo != ''){  ?>
                          return true;
                      <?php  } else {  ?>
                          return false;
                      <?php }  ?>
                  }
              }
          },*/
      /*mediaoutlet: "required",
      mediaurl: "required",
      compcountry: "required",
      monthtraffic: "required",
      sitelang: "required",
      country: "required",
      interlang: "required",
      lang: "required",
      resources: "required",
      notes: "required",
      reference: "required",*/
      deadlinedate: "required",
      /*site: "required",
      traffic: "required",*/
    },
    messages: {
      fname: "",
      lname: "",
      occupation: "",
      email:"",
      phone: "",
      logo: "",
      mediaoutlet: "",
      mediaurl: "",
      compcountry: "",
      monthtraffic: "",
      sitelang: "",
      country: "",
      interlang: "",
      lang: "",
      resources: "",
      notes: "",
      reference: "",
      deadlinedate: "",
      site: "",
      traffic: "",
    },

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
    }
  });

   $("#frmmultistep2").validate({
    rules: {
      s2_fname: "required",
      s2_surname: "required",
      s2_occupation: "required",
      s2_email: {
        required: true,
        email: true
      },
      /*s2_phone: {
        required: true,
        minlength:10,
        maxlength:15
      },*/
      /*s2_logo: {
              required: {
                  depends: function(element) {
                      <?php if(!file_exists(public_path('/logo'). "/".  $s2_logo) || $s2_logo != ''){  ?>
                          return true;
                      <?php  } else {  ?>
                          return false;
                      <?php }  ?>
                  }
              }
          },*/
      /*s2_notes: "required",
      s2_link_congress: "required",
      s2_link_download: "required",*/
      
    },
    messages: {
      s2_fname: "",
      s2_surname: "",
      s2_occupation: "",
      s2_email: "",
      /*s2_phone: "",
      s2_logo: "",
      s2_notes: "",
      s2_link_congress: "",
      s2_link_download: "",*/
    },

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
    }
  });

  $("#frmmultistep3").validate({
    rules: {
      //s3_que: "required",
      "s3_que[1][question]" : "required",
      "s3_que[1][notes]" : "required",
      "s3_que[2][question]" : "required",
      "s3_que[2][notes]" : "required",
      //s3_note: "required",
      
    },
    messages: {
      "s3_que[1][question]" : "",
      "s3_que[1][notes]" : "",
      "s3_que[2][question]" : "",
      "s3_que[2][notes]" : "",
    },

    highlight: function (element) {
        $(element).closest('.form-control').removeClass('success').addClass('error');
        $("label.error").hide();
    },
    success: function (element) {
        element.html('<i class="icon-ok-sign"></i>').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
    }
  });
  
  $('#send_email').click(function(){
      var pop_name = $('#pop_name').val();
      var pop_email = $('#pop_email').val();
      var pop_note = $('#pop_note').val();
      var pop_interviewid = $('#pop_interviewid').val();
      //$('.pop_submit').click();
      $.ajax({
        url: '{!! url($url) !!}',
        data: {
            "_token": "{{ csrf_token() }}",
            'pop_email': pop_email,
            'pop_name': pop_name,
            'pop_note': pop_note,
            'pop_interviewid': pop_interviewid,
            'btn_step': 'send_email',
        },
        type: "POST",
        success: function(data) {                   
            $('.pop_submit').click();
        }
    });
  });

</script>
<!-- <script src="{{ asset('assets/layouts/layout4/front/js/autosize.min.js') }}"></script> -->
  <script>
  /*$( window ).load(function() {
    alert('dsfds');
    autosize(document.querySelectorAll('textarea'));
  });*/
  /*
  $('.resp-tab-item').click(function() {
    alert('a');
  });​  */
  
  </script>
<style type="text/css">
  label.error{
    display: none;
  }
  .error{
    border-color: red !important;
  }
  .input-group-append .icon-calendar{
    font-size: 15px !important;
  }
</style>