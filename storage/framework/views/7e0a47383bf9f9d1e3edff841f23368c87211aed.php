<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



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
$lead_paragraph = "";
$note_lead_paragraph = "";
$final_text = "";
$note_final_text = "";
$facebook_page = "";
$twitter_page = "";
$linkedin_page = "";
$instagram_page = "";
$other_social_media_page = "";

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

if(!empty($interviewee_data->facebook_page))
{
$facebook_page = $interviewee_data->facebook_page;
}

if(!empty($interviewee_data->twitter_page))
{
$twitter_page = $interviewee_data->twitter_page;
}

if(!empty($interviewee_data->linkedin_page))
{
$linkedin_page = $interviewee_data->linkedin_page;
}

if(!empty($interviewee_data->instagram_page))
{
$instagram_page = $interviewee_data->instagram_page;
}

if(!empty($interviewee_data->other_social_media_page))
{
$other_social_media_page = $interviewee_data->other_social_media_page;
}

$question1 = '';
$question2 = '';
$note1 = '';
$note2 = '';

$anwser1 = '';
$notes_precious1 = '';
$anwser_precious1 = '';
$interviewer_validate1 = '';
$interviewee_validate1 = '';

$anwser2 = '';
$notes_precious2 = '';
$anwser_precious2 = '';
$interviewer_validate2 = '';
$interviewee_validate2 = '';
$interview_article = '';
$subtitle = '';
$interview_website = '';

if(isset($question_data[0]->anwser) && !empty($question_data[0]->anwser)){
  $anwser1 = $question_data[0]->anwser;
}

if(isset($question_data[0]->notes_precious) && !empty($question_data[0]->notes_precious)){
  $notes_precious1 = $question_data[0]->notes_precious;
}

if(isset($question_data[0]->anwser_precious) && !empty($question_data[0]->anwser_precious)){
  $anwser_precious1 = $question_data[0]->anwser_precious;
}

if(isset($question_data[0]->interviewer_validate) && !empty($question_data[0]->interviewer_validate)){
  $interviewer_validate1 = $question_data[0]->interviewer_validate;
}

if(isset($question_data[0]->interviewee_validate) && !empty($question_data[0]->interviewee_validate)){
  $interviewee_validate1 = $question_data[0]->interviewee_validate;
}

if(isset($question_data[1]->anwser) && !empty($question_data[1]->anwser)){
  $anwser2 = $question_data[1]->anwser;
}

if(isset($question_data[1]->notes_precious) && !empty($question_data[1]->notes_precious)){
  $notes_precious2 = $question_data[1]->notes_precious;
}

if(isset($question_data[1]->anwser_precious) && !empty($question_data[1]->anwser_precious)){
  $anwser_precious2 = $question_data[1]->anwser_precious;
}

if(isset($question_data[1]->interviewer_validate) && !empty($question_data[1]->interviewer_validate)){
  $interviewer_validate2 = $question_data[1]->interviewer_validate;
}

if(isset($question_data[1]->interviewee_validate) && !empty($question_data[1]->interviewee_validate)){
  $interviewee_validate2 = $question_data[1]->interviewee_validate;
}


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

if(isset($question_data[0]->lead_paragraph) && !empty($question_data[0]->lead_paragraph)){
  $lead_paragraph = $question_data[0]->lead_paragraph;
}

if(isset($question_data[0]->note_lead_paragraph) && !empty($question_data[0]->note_lead_paragraph)){
  $note_lead_paragraph = $question_data[0]->note_lead_paragraph;
}

if(isset($question_data[0]->final_text) && !empty($question_data[0]->final_text)){
  $final_text = $question_data[0]->final_text;
}

if(isset($question_data[0]->note_final_text) && !empty($question_data[0]->note_final_text)){
  $note_final_text = $question_data[0]->note_final_text;
}

if(isset($question_data[0]->interview_article) && !empty($question_data[0]->interview_article)){
  $interview_article = $question_data[0]->interview_article;
}

if(isset($question_data[0]->subtitle) && !empty($question_data[0]->subtitle)){
  $subtitle = $question_data[0]->subtitle;
}

if(isset($question_data[0]->interview_website) && !empty($question_data[0]->interview_website)){
  $interview_website = $question_data[0]->interview_website;
}

if($login_type == 'interviewee'){
  $url = 'interviewee/'.$interviewid ;
}else{
  $url = 'interview/'.$interviewid ;
}
?>

<form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep1" id="frmmultistep1"  method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<!--Banner-->
<section class="banner sm" style="background:#f5fffa">
<div class="container">
<div class="row">
<div class="col-12">
<!-- <h1 contenteditable="true">Interview with Michael Jordan</h1> -->
<h1 contenteditable="false">Interview with 
<input type="text" name="interview_with" id="interview_with" value="<?php echo $interview_with; ?>" autocomplete="off" class="<?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" >
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
              //$login_type_cls = 'disabled';
              $login_type_cls = '';
          }else{
              $login_type_cls = '';
          }
   ?>
<ul class="resp-tabs-list">
<li class="<?php echo $login_type_cls; ?>" id="li-step-1">1<span class="cust-icon">🎤</span><span>&nbsp;&nbsp;&nbsp;Interviewer</span></li>
<!-- <li class="<?php if($login_type == 'interviewee'){ ?> resp-tab-active<?php } ?>" id="li-step-2">2<span class="cust-icon">✍️</span><span>&nbsp;&nbsp;&nbsp;Interviewee</span></li> -->
<li id="li-step-2" class="<?php if($login_type == 'interviewee'){ ?> resp-tab-active<?php } ?>">2<span class="cust-icon">✍️</span><span>&nbsp;&nbsp;&nbsp;Interviewee</span></li>
<!-- <li class="<?php echo $login_type_cls; ?>" id="li-step-3">3<span class="cust-icon">❓</span><span>Questions</span></li> -->
<li id="li-step-3">3<span class="cust-icon" style="left: -65px">❓</span><span style="width: 160px;">Questions / Interview</span></li>
<li id="li-step-4">4<span class="cust-icon">🙋</span><span>Answers</span></li>
<li id="li-step-5">5<span class="cust-icon">👁️</span><span>Review</span></li>
<li id="li-step-6">6<span class="cust-icon">✔️</span><span>Validation</span></li>
</ul>

<div class="resp-tabs-container">
<div id="step-1" class="step <?php if($login_type == 'interviewee'){ ?>disabled-step<?php } ?>">

<?php if(Session::get('step') == '1'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>

<input type="hidden" id="interviewid" name="interviewid" value="<?php echo e($interviewid); ?>"> 
<input type="hidden" name="old_logo" id="old_logo" value="<?php echo e($logo); ?>">

<div class="detSection">
<h3>Information about the interviewer </h3>
<div class="intHead">Who is asking the questions?</div>
<div class="form-group">
<label class="fName">Name*</label>
<input type="text" class="form-control form-control-lg name-auto-fill"  id="fname" name="fname" value="<?php echo e($name); ?>" placeholder="Enter your name (e.g. John)"  >  
</div>
<div class="form-group">
<label class="fName">Surname*</label>
<input type="text" class="form-control form-control-lg"  id="lname" name="lname"  value="<?php echo e($lname); ?>" placeholder="Enter your surname (e.g. Smith)" >
</div>
<div class="form-group">
<label class="fName">Occupation</label>
    <input type="text" class="form-control form-control-lg"  id="occupation" name="occupation"  value="<?php echo e($occupation); ?>" placeholder="Enter your occupation (e.g. journalist)" >
</div>
<div class="form-group">
<label class="fName">Email*</label>
    <input type="email" class="form-control form-control-lg"  id="email" name="email"  value="<?php echo e($email); ?>" placeholder="Enter your Email" >
</div>
<div class="form-group">
<label class="fName">Tel.</label>
    <input type="tel" class="form-control form-control-lg"  id="phone" name="phone"  value="<?php echo e($phone); ?>" placeholder="Enter your Telephone no." >
</div>
<div class="form-group">
<label class="fName">Personal site or page</label>
    <input type="text" class="form-control form-control-lg"  id="site" name="site"  value="<?php echo e($website); ?>" placeholder="Enter your site or page (e.g. LinkedIn page, Twitter account)" >
</div>
<div class="form-group">
<label class="fName">Picture</label>
<input type='file' name="logo" id="logo"  />
<img id="blah" src="../logo/<?php echo e($logo); ?>" class="img-responsive auto-logo" alt="" style="width:200px;height:200px;margin-top: 10px;"> 

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
<input type="text" class="form-control form-control-lg"  id="mediaoutlet" name="mediaoutlet"  value="<?php echo e($media_outlet); ?>" placeholder="Enter your media or company (e.g. CNN)"  >
</div>
<div class="form-group">
<label class="fName">URL of media outlet (e.g. www.cnn.com)</label>
<input type="text" class="form-control form-control-lg"  id="mediaurl" name="mediaurl"  value="<?php echo e($mediaurl); ?>" placeholder="Enter the URL (e.g. cnn.com)"  >
</div>
<div class="form-group">
<label class="fName">Country of the company </label>
    <input type="text" class="form-control form-control-lg"  id="compcountry" name="compcountry"  value="<?php echo e($comp_country); ?>" placeholder="Enter Country of the company"  >
</div>
<div class="form-group">
<label class="fName">Monthly traffic of the site in thousands (e.g. 800 K)</label>
    <input type="text" class="form-control form-control-lg" id="monthtraffic" name="monthtraffic"   value="<?php echo e($traffic_of_site); ?>" placeholder="Enter traffic of the site (e.g. 800 K)"  >
</div>
<div class="form-group">
<label class="fName">Proof of traffic (e.g. link to Similarweb.com)</label>
    <input type="text" class="form-control form-control-lg"  id="traffic" name="traffic"  value="<?php echo e($area_of_site); ?>" placeholder="Enter URL with proof of traffic (e.g. https://www.similarweb.com/website/cnn.com)"  >
</div>
<div class="form-group">
<label class="fName">Language of the site </label>
    <input type="text" class="form-control form-control-lg"  id="sitelang" name="sitelang"  value="<?php echo e($lang_of_site); ?>" placeholder="Enter Language of the site "  >
</div>
<div class="form-group">
<label class="fName">Main countries or areas of the site</label>
    <input type="text" class="form-control form-control-lg"  id="country" name="country"  value="<?php echo e($country); ?>" placeholder="Enter Main countries or areas of the site"  >
</div>
<div class="form-group">
<label class="fName">Language of the interview</label>
    <input type="text" class="form-control form-control-lg"  id="interlang" name="interlang"  value="<?php echo e($lang_of_interview); ?>" placeholder="Enter Language of the interview "  >
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
    <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources"  value="<?php echo e($resources); ?>"  placeholder="Enter URL (e.g. link to press release)" >
   <!-- <input type="text" class="form-control form-control-lg mb-2"  id="resources" name="resources[]" placeholder="Enter URL (e.g. link to study with DOI)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
<div class="form-group">
<label class="fName">Notes from the interviewer to the interviewees (who answer questions)</label>
<textarea type="text" class="form-control form-control-lg"  id="notes" name="notes"  placeholder="Enter notes from interviewer to interviewee to help in the interview (e.g. reference to a study)"><?php echo e($notes); ?></textarea>
</div>
<div class="form-group">
<label class="fName">References of the interviewers (e.g. past interviews, news)</label>
    <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference" value="<?php echo e($references); ?>" placeholder="Enter URL (e.g. https://www.creapharma.com/news/new-link-gut-bacteria-obesity.htm)" >
    <!-- <input type="text" class="form-control form-control-lg mb-2"  id="reference" name="reference[]" placeholder="Enter URL (https://www.creapharma.com/gut-microbiome-may-affect-some-anti-diabetes-drugs-interview/)">
    <button type="button" class="btn btn-add">+</button> -->
</div>
</div>
<div class="detSection">
<h3>Deadline</h3>
    <!-- <div class="form-group">
        <label class="fName">Select a date for the deadline*</label>
        <div class="col-xs-5 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control  form-control-lg " name="deadlinedate" id="deadlinedate"  value="<?php echo e($deadline); ?>"   />
                <span class="input-group-append add-on"><span class="icon-calendar"></span></span>
            </div>
        </div>
    </div> -->
    <?php
    $current_date = date("m/d/Y");
    ?>
        

        <div class="form-group" id="deadline_div">
          <label class="fName">Select a date for the deadline*</label>
          <div class="col-xs-5 date">
              <div class="input-group input-append date" id="datePicker">
                  <input type="text" class="form-control form-control-lg " name="deadlinedate" id="deadlinedate" value="<?php echo e($deadline); ?>"   />
                  <span class="input-group-append add-on"><span class="icon-calendar"></span></span>
              </div>
          </div>
        </div>

        <div class="form-group" style="margin-left: 25px;">
          <input type="checkbox" id="no_deadline" value="1" name="no_deadline" class="custom-control-input" <?php if($deadline == 'None'){ ?> checked  <?php } ?> >
          <label class="custom-control-label" for="no_deadline">No deadline</label>
          <!-- <input type="hidden" class="form-control form-control-lg " name="deadlinedate" id="deadlinedate"  value="<?php echo e($deadline); ?>"   /> -->
        </div>

<div>
<button type="submit" value="step_1" class="btn btn-green" name="btn_step" id="btn_step" style="width:21% !important;">Save</button>
</div>
</div>

<div class="form-group text-right">
<!-- <button type="button" onClick="hello();" class="btn btn-prev">< </button> -->
<button type="button"  id="link-step-1" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>"></button>

</div>

<div class="form-group text-left">
  *Mandatory fields
</div>


 


</div>
</form>
<?php if(!empty($name)){ ?>
<div id="step-2" style="display: none;" class="step">
  <?php if(Session::get('step') == '2'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>
  <form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep2" id="frmmultistep2"  method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <input type="hidden" id="s2_interviewid" name="s2_interviewid" value="<?php echo e($interviewid); ?>"> 

    <input type="hidden" name="s2_old_logo" id="s2_old_logo" value="<?php echo e($s2_logo); ?>">
    <div class="detSection">
      <h3>Information about the interviewee</h3>
      <div class="intHead">Who is the interviewee?</div>

      <div class="form-group">
        <label class="fName">Name *</label>
        <input type="text" class="form-control form-control-lg name-auto-fill-interviewee" id="s2_fname" name="s2_fname" value="<?php echo e($s2_fname); ?>" placeholder="Enter your name (e.g. John)" required="">  
      </div>

      <div class="form-group">
        <label class="fName">Surname *</label>
        <input type="text" class="form-control form-control-lg" id="s2_surname" name="s2_surname" value="<?php echo e($s2_surname); ?>" placeholder="Enter your Surname (e.g. John)" required="">  
      </div>

      <div class="form-group">
          <label class="fName">Occupation *</label>
          <input type="text" class="form-control form-control-lg" id="s2_occupation" name="s2_occupation" value="<?php echo e($s2_occupation); ?>" placeholder="Enter your occupation (e.g. journalist)" required="">
      </div>

      <div class="form-group">
        <label class="fName">Email *</label>
          <input type="email" class="form-control form-control-lg" id="s2_email" name="s2_email" value="<?php echo e($s2_email); ?>" placeholder="Enter your Email" required="">
      </div>

      <div class="form-group">
          <label class="fName">Tel.</label>
          <input type="tel" class="form-control form-control-lg" id="s2_phone" name="s2_phone" value="<?php echo e($s2_phone); ?>" placeholder="Enter your Telephone no." >
      </div>

      <div class="form-group">
        <label class="fName">Picture</label>
        <input type="file" name="s2_logo" id="s2_logo1">
        
            <img id="blah" src="../logo/<?php echo e($s2_logo); ?>" class="img-responsive auto-logo2" alt="" style="width:200px;height:200px;margin-top: 10px;">
        

      </div>

      <div class="form-group">
        <label class="fName">Note</label>
        <textarea type="text" class="form-control form-control-lg" id="s2_notes" name="s2_notes" placeholder="Head scientist by Novartis"><?php echo e($s2_notes); ?></textarea>
      </div>

      <div class="form-group">
          <label class="fName">Link to a congress</label>
          <input type="text" class="form-control form-control-lg" id="s2_link_congress" name="s2_link_congress" value="<?php echo e($s2_link_congress); ?>" placeholder="e.g. about lice" >
      </div>

      <div class="form-group">
        <label class="fName">Link to pictures to download</label>
        <input type="text" class="form-control form-control-lg" id="s2_link_download" name="s2_link_download" value="<?php echo e($s2_link_download); ?>" placeholder="e.g. links on Flickr or url" >
      </div>

      <div class="form-group">
        <label class="fName">Facebook page</label>
        <input type="text" class="form-control form-control-lg" id="facebook_page" name="facebook_page" value="<?php echo e($facebook_page); ?>" placeholder="Facebook page" >
      </div>

      <div class="form-group">
        <label class="fName">Twitter page</label>
        <input type="text" class="form-control form-control-lg" id="twitter_page" name="twitter_page" value="<?php echo e($twitter_page); ?>" placeholder="Twitter page" >
      </div>

      <div class="form-group">
        <label class="fName">LinkedIn page</label>
        <input type="text" class="form-control form-control-lg" id="linkedin_page" name="linkedin_page" value="<?php echo e($linkedin_page); ?>" placeholder="LinkedIn page" >
      </div>

      <div class="form-group">
        <label class="fName">Instagram page</label>
        <input type="text" class="form-control form-control-lg" id="instagram_page" name="instagram_page" value="<?php echo e($instagram_page); ?>" placeholder="Instagram page" >
      </div>

      <div class="form-group">
        <label class="fName">Other social media page</label>
        <input type="text" class="form-control form-control-lg" id="other_social_media_page" name="other_social_media_page" value="<?php echo e($other_social_media_page); ?>" placeholder="Other social media page" >
      </div>
    </div>

    <div>
      <button type="submit" value="step_2" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">Save</button> 
    </div>
  </form>
  <div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-2" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>" style="max-width: none;"></button>
  </div>
  <div class="form-group text-left">
  *Mandatory fields
</div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if(!empty($s2_fname)){ ?>
<div class="step <?php if($login_type == 'interviewee'){ ?>disabled-step<?php } ?>" id="step-3" >
  <?php if(Session::get('step') == '3'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>
<form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep3" id="frmmultistep3"  method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <input type="hidden" id="s3_interviewid" name="s3_interviewid" value="<?php echo e($interviewid); ?>"> 
    <div class="detSection">
      <h3>Title interview</h3>
      <div class="form-group">
          <label class="fName">Title interview/article</label>
          <input type="text" class="form-control form-control-lg" id="interview_article" name="interview_article" placeholder="E.g. Interview with Barack Obama, the superstar politician" value="<?php echo e($interview_article); ?>">
      </div>
      <div class="form-group">
          <label class="fName">Subtitle (if any)</label>
          <input type="text" class="form-control form-control-lg" id="subtitle" name="subtitle" placeholder="E.g. Barack Obama is giving an interview to our media and…" value="<?php echo e($subtitle); ?>">
      </div>
      <div class="form-group">
          <label class="fName">URL or website where interview will be published</label>
          <input type="text" class="form-control form-control-lg" id="interview_website" name="interview_website" placeholder="E.g. https//www.cnn.com/interview-obama-superstar-politician" value="<?php echo e($interview_website); ?>">
      </div>

      <h3>Introduction</h3>
      <div class="form-group">
          <label class="fName">Lead paragraph (rider, chapeau)</label>
          <textarea type="text" class="form-control form-control-lg" id="lead_paragraph" name="lead_paragraph" placeholder=""><?php echo e($lead_paragraph); ?></textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note lead paragraph</label>
          <textarea type="text" class="form-control form-control-lg" id="note_lead_paragraph" name="note_lead_paragraph" placeholder=""><?php echo e($note_lead_paragraph); ?></textarea>
      </div>

      <h3>Questions</h3>
      <ul id="sortable">
      <li>
      <div class="dotted-border">
      <div class="form-group">
          <label class="fName">Question 1</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[1][question]" placeholder=""><?php echo e($question1); ?></textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note 1</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[1][notes]" placeholder="" ><?php echo e($note1); ?></textarea>
      </div>
      </div>

      <input type="hidden" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" name="s3_que[1][anwser]" value = "<?php if(isset($anwser1)){ echo $anwser1; } ?>">

      <input type="hidden" class="form-control form-control-lg <?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" name="s3_que[1][notes_precious]" value = "<?php if(isset($notes_precious1)){ echo $notes_precious1; } ?>">

      <input type="hidden" class="form-control form-control-lg " name="s3_que[1][anwser_precious]" value = "<?php if(isset($anwser_precious1)){ echo $anwser_precious1; } ?>">

      <input type="hidden" name="s3_que[1][interviewer_validate]" value = "<?php if(isset($interviewer_validate1)){ echo $interviewer_validate1; } ?>">

      <input type="hidden" name="s3_que[1][interviewee_validate]" value="<?php if(isset($interviewee_validate1)){ echo $interviewee_validate1; } ?>">
      <hr style="border-color: #00bf6f;">
      </li>

      <li>
      <div class="dotted-border">
      <div class="form-group">
          <label class="fName">Question 2</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[2][question]" placeholder=""><?php echo e($question2); ?></textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note 2</label>
          <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[2][notes]" placeholder=""><?php echo e($note2); ?></textarea>
      </div>
      </div>

      <input type="hidden" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" name="s3_que[2][anwser]" value = "<?php if(isset($anwser2)){ echo $anwser2; } ?>">

      <input type="hidden" class="form-control form-control-lg <?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" name="s3_que[2][notes_precious]" value = "<?php if(isset($notes_precious2)){ echo $notes_precious2; } ?>">

      <input type="hidden" class="form-control form-control-lg " name="s3_que[2][anwser_precious]" value = "<?php if(isset($anwser_precious2)){ echo $anwser_precious2; } ?>">

      <input type="hidden" name="s3_que[2][interviewer_validate]" value = "<?php if(isset($interviewer_validate2)){ echo $interviewer_validate2; } ?>">

      <input type="hidden" name="s3_que[2][interviewee_validate]" value="<?php if(isset($interviewee_validate2)){ echo $interviewee_validate2; } ?>">
      <hr style="border-color: #00bf6f;">
      </li>
      <?php
        if($que_note_count >= 2){
          $i = 0;
          foreach ($question_data as $key => $value) {
            $i++;
            if($i < 3){
              continue;
            }
      ?>
          <li>
            <div class="dotted-border">
            <div class="form-group">
              <label class="fName">Question <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que[<?php echo $i;?>][question]" placeholder=""><?php if(isset($value->question)){ echo $value->question; } ?></textarea>
            </div>
            <div class="form-group">
              <label class="fName">Note <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que[<?php echo $i;?>][notes]" placeholder="" ><?php if(isset($value->notes)){ echo $value->notes; } ?></textarea>
            </div> 
            </div> 

            <input type="hidden" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" name="s3_que[<?php echo $i;?>][anwser]" value = "<?php if(isset($value->anwser)){ echo $value->anwser; } ?>">

            <input type="hidden" class="form-control form-control-lg <?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" name="s3_que[<?php echo $i;?>][notes_precious]" value = "<?php if(isset($value->notes_precious)){ echo $value->notes_precious; } ?>">

            <input type="hidden" class="form-control form-control-lg " name="s3_que[<?php echo $i;?>][anwser_precious]" value = "<?php if(isset($value->anwser_precious)){ echo $value->anwser_precious; } ?>">

            <input type="hidden" name="s3_que[<?php echo $i;?>][interviewer_validate]" value = "<?php if(isset($value->interviewer_validate)){ echo $value->interviewer_validate; } ?>">

            <input type="hidden" name="s3_que[<?php echo $i;?>][interviewee_validate]" value="<?php if(isset($value->interviewee_validate)){ echo $value->interviewee_validate; } ?>">
            <hr style="border-color: #00bf6f;">
          </li>  
      <?php      
          }
      ?>
      <?php
        }
      ?>
      <!-- <div id="show_more_fields">
        
      </div> -->
      </ul>
      <button type="button" class="btn btn-add more-field" id="more_field">+</button>
      <!-- <div class="form-group">
          <label class="fName">Email</label>
          <input type="text" id="send_email" name="send_email" value="<?php echo e($s2_email); ?>" class="form-control form-control-lg valid" >
          
      </div>  -->
      <h3>End interview</h3>
      <div class="form-group">
          <label class="fName">Final text (e.g. date, name interviewer, references)</label>
          <textarea type="text" class="form-control form-control-lg" id="final_text" name="final_text" placeholder=""><?php echo e($final_text); ?></textarea>
      </div>
      <div class="form-group">
          <label class="fName">Note final text</label>
          <textarea type="text" class="form-control form-control-lg" id="note_final_text" name="note_final_text" placeholder=""><?php echo e($note_final_text); ?></textarea>
      </div>
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
    <button type="button" class="btn btn-nxt" id="link-step-3" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>" style="max-width: none;"></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if($que_note_count > 0){ ?>
<div class="step" id="step-4">
  <?php if(Session::get('step') == '4'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>
  <form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep4" id="frmmultistep4"  method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <input type="hidden" id="s4_interviewid" name="s4_interviewid" value="<?php echo e($interviewid); ?>"> 
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
    <button type="button" class="btn btn-nxt" id="link-step-4" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>" style="max-width: none;"></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if($que_note_count > 0){ ?>
<div class="step" id="step-5">
  <?php if(Session::get('step') == '5'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>
  
  <form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep5" id="frmmultistep5"  method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <input type="hidden" id="s5_interviewid" name="s5_interviewid" value="<?php echo e($interviewid); ?>"> 
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
    <button type="button" class="btn btn-nxt" id="link-step-5" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>" style="max-width: none;"></button>
  </div>
</div>
<?php }else{ echo "<div>No Data</div>"; }?>

<?php if($que_note_count > 0){ ?>
<div class="step" id="step-6">
  <?php if(Session::get('step') == '6'){ ?>
    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php } ?>
  
  <form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="frmmultistep6" id="frmmultistep6"  method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <input type="hidden" id="s6_interviewid" name="s6_interviewid" value="<?php echo e($interviewid); ?>"> 
    <div class="detSection">
      <h3><?php if($login_type == 'interviewee'){ ?>Validation by Interviewee<?php }else{ ?>Validation by Interviewer<?php } ?></h3>
      <?php
        if($que_note_count > 0){
          $i = 0;
          foreach ($question_data as $key => $value) {
            $i++;
      ?>
            <div class="form-group">
              <label class="fName">Question <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s6_que" name="s6_final[<?php echo $i;?>][question]" placeholder=""  ><?php if(isset($value->question)){ echo $value->question; } ?></textarea>
            </div>
            <div class="form-group">
                <!-- <label class="fName">Note <?php echo $i;?></label> -->
                <input type="hidden" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s6_note" name="s6_final[<?php echo $i;?>][notes]" placeholder=""  value ="<?php if(isset($value->notes)){ echo $value->notes; } ?>">
            </div>  
            <div class="form-group">
              <label class="fName">Answer <?php echo $i;?></label>
              <textarea type="text" class="form-control form-control-lg <?php if($login_type != 'admin'){ ?> disabled <?php } ?>" id="s6_ans" name="s6_final[<?php echo $i;?>][anwser]" placeholder="" ><?php if(isset($value->anwser)){ echo $value->anwser; } ?></textarea>
            </div>
            <div class="form-group">
              <label>Do you validate this answer?</label>
            </div>
            <div class="form-group">
              <div class="form-inline">
                <div class="custom-control">
                  <input type="checkbox" id="custom-interviewer<?php echo $i;?>" name="s6_final[<?php echo $i;?>][interviewer_validate]" value="yes" class="custom-control-input checkbox-interviewer" <?php if(isset($value->interviewer_validate) && $value->interviewer_validate == 'yes'){ echo 'checked'; } ?> >
                  <label class="custom-control-label <?php if($login_type == 'interviewee'){ ?> disabled-chk <?php } ?>" for="custom-interviewer<?php echo $i;?>">Interviewer</label>
                </div>
                <div class="custom-control">
                  <input type="checkbox" id="custom-interviewee<?php echo $i;?>" name="s6_final[<?php echo $i;?>][interviewee_validate]" value="yes" class="custom-control-input checkbox-interviewee" <?php if(isset($value->interviewee_validate) && $value->interviewee_validate == 'yes'){ echo 'checked'; } ?>>
                  <label class="custom-control-label <?php if($login_type == 'frontuser'){ ?> disabled-chk <?php } ?>" for="custom-interviewee<?php echo $i;?>" >Interviewee</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <label class="fName">Final note, question, precision <?php echo $i;?></label> -->
              <input type="hidden" class="form-control form-control-lg <?php if($login_type == 'interviewee'){ ?> disabled <?php } ?>" id="s6_notes_pre" name="s6_final[<?php echo $i;?>][notes_precious]" placeholder="" value = "<?php if(isset($value->notes_precious)){ echo $value->notes_precious; } ?>">
            </div>
            <div class="form-group">
              <!-- <label class="fName">Answer to final note, question, precision <?php echo $i;?></label> -->
              <input type="hidden" class="form-control form-control-lg " id="s6_ans_pre" name="s6_final[<?php echo $i;?>][anwser_precious]" placeholder="" value = "<?php if(isset($value->anwser_precious)){ echo $value->anwser_precious; } ?>">
            </div>
            <input type="hidden" name="s6_final[<?php echo $i;?>][id]" value="<?php echo $value->id;?>">
            <hr style="border-color: #00bf6f;">
      <?php      
          }
      ?>
          <div class="form-group">
            <label class="fName">Select all questions and answers</label>
            <div class="form-inline">
              <div class="custom-control">
                <input type="checkbox" id="select-interviewer" class="custom-control-input" >
                <label class="custom-control-label <?php if($login_type == 'interviewee'){ ?> disabled-chk <?php } ?>" for="select-interviewer">Interviewer</label>
              </div>
              <div class="custom-control">
                <input type="checkbox" id="select-interviewee" class="custom-control-input" >
                <label class="custom-control-label <?php if($login_type == 'frontuser'){ ?> disabled-chk <?php } ?>" for="select-interviewee">Interviewee</label>
              </div>
            </div>
          </div>
    </div>
    <div>
      <button type="submit" value="step_6" name="btn_step" id="btn_step" class="btn btn-green" style="width:21% !important;">Validate the interview</button> 
    </div>
    <?php
        }else{
      ?>
        <h4>No Data</h4>
      <?php } ?>
  </form>
  <div class="form-group text-right">
    <button type="button" class="btn btn-nxt" id="link-step-6" style="pointer-events: all;background: none !important;border:none !important"><img src="<?php echo e(asset('logo/right-arrow.png')); ?>" style="max-width: none;"></button>
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
          <!-- <form class="feildForm" runat="server"  action="<?php echo e(url($url)); ?>" name="Frmsend_email" id="Frmsend_email"  method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?> -->
            <input type="hidden" id="pop_interviewid" name="pop_interviewid" value="<?php echo e($interviewid); ?>">
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
<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>

<!-- /Form Area-->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">
  .disabled{
    pointer-events: none;
    /*opacity: 0.5;*/
    border:none !important;
    resize: none;
  }
  .disabled-step{
    pointer-events: none;
    border:none !important;
    resize: none;
  }
  .disabled-chk{
    pointer-events: none;
    opacity: 0.5;
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
      $('#li-step-3').addClass('resp-tab-active');
      $('#li-step-3').click();
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
      $('#li-step-6').addClass('resp-tab-active');
      $('#li-step-6').click();
      $(window).scrollTop(0);
  });
<?php }else{ ?>
  $('#link-step-5').click(function(e){
      $('#li-step-6').addClass('resp-tab-active');
      $('#li-step-6').click();
      $(window).scrollTop(0);
  });
<?php } ?>

<?php 
if($login_type == 'interviewee'){ ?>
  $('#link-step-6').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });
<?php }else{ ?>
  $('#link-step-6').click(function(e){
      $('#li-step-1').addClass('resp-tab-active');
      $('#li-step-1').click();
      $(window).scrollTop(0);
  });
<?php } ?>
  $('.more-field').click(function(){
    var id = incr();
    $("#sortable").append(
        '<li><div class="dotted-border"><div class="form-group"><label class="fName">Question '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_que" name="s3_que['+id+'][question]" placeholder=""></textarea></div><div class="form-group"><label class="fName">Note '+id+'</label><textarea type="text" class="form-control form-control-lg" id="s3_note" name="s3_que['+id+'][notes]" placeholder="" ></textarea></div></div><hr style="border-color: #00bf6f;"></li>'
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
  $('#datePicker').datepicker({
            format: 'mm/dd/yyyy'
        });
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
      /*"s3_que[1][notes]" : "required",*/
      "s3_que[2][question]" : "required",
      /*"s3_que[2][notes]" : "required",*/
      //s3_note: "required",
      
    },
    messages: {
      "s3_que[1][question]" : "",
      /*"s3_que[1][notes]" : "",*/
      "s3_que[2][question]" : "",
      /*"s3_que[2][notes]" : "",*/
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
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
          }
      });
      $.ajax({
        url: '<?php echo url($url); ?>',
        data: {
            /*"_token": "<?php echo e(csrf_token()); ?>",*/
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    //$( "#sortable" ).disableSelection();
  } );

  $(function() {
    $(".name-auto-fill").autocomplete({
        source: '<?php echo url("name_auto_fill"); ?>',
        select: function( event, ui ) {
          event.preventDefault();
          var user_id = ui.item.id;
          $.ajax({
              url: '<?php echo url("get_auto_comp_values"); ?>',
              data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  'user_id': user_id,
              },
              type: "POST",
              dataType: 'json',
              success: function(data) {   
                $('#fname').val(data.first_name);
                $('#lname').val(data.last_name);
                $('#email').val(data.email);
                $('#occupation').val(data.occupation);
                $('#phone').val(data.phone);
                $('#site').val(data.website);
                
                var src = '<?php echo url("logo"); ?>' + "/" + data.profile_pic;
                if(data.profile_pic != null){
                  $('.auto-logo').attr('src',src);
                  $('#old_logo').val(data.profile_pic);  
                }
              }
          });  
        }
    });

    $(".name-auto-fill-interviewee").autocomplete({
        source: '<?php echo url("name_auto_fill_interviewee"); ?>',
        select: function( event, ui ) {
          event.preventDefault();
          var user_id = ui.item.id;
          $.ajax({
              url: '<?php echo url("get_auto_comp_values_interviewee"); ?>',
              data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  'user_id': user_id,
              },
              type: "POST",
              dataType: 'json',
              success: function(data) {   
                $('#s2_fname').val(data.first_name);
                $('#s2_surname').val(data.last_name);
                $('#s2_email').val(data.email);
                $('#s2_occupation').val(data.occupation);
                $('#s2_phone').val(data.phone);
                //$('#site').val(data.website);
                var src = '<?php echo url("logo"); ?>' + "/" + data.profile_pic;
                if(data.profile_pic != null){
                  $('.auto-logo2').attr('src',src);
                  $('#s2_old_logo').val(data.profile_pic);  
                }
              }
          });  
        }
    });
  });
  $('#no_deadline').change(function(){
    if(!$('#no_deadline').is(':checked')){
      $('#deadline_div').show();
      //$('#deadlinedate').val('');
    }else{
      $('#deadline_div').hide();
    }
  });

  $('#no_deadline').change();
  var select_all_interviewer = document.getElementById("select-interviewer");
  var checkboxes_interviewer = document.getElementsByClassName("checkbox-interviewer");

  select_all_interviewer.addEventListener("change", function(e){
    for (i = 0; i < checkboxes_interviewer.length; i++) { 
      checkboxes_interviewer[i].checked = select_all_interviewer.checked;
    }
  });

  for (var i = 0; i < checkboxes_interviewer.length; i++) {
    checkboxes_interviewer[i].addEventListener('change', function(e){ //".checkbox" change 
      if(this.checked == false){
        select_all_interviewer.checked = false;
      }
      if(document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewer.length){
        select_all_interviewer.checked = true;
      }
    });
  }

  var select_all_interviewee = document.getElementById("select-interviewee");
  var checkboxes_interviewee = document.getElementsByClassName("checkbox-interviewee");

  select_all_interviewee.addEventListener("change", function(e){
    for (i = 0; i < checkboxes_interviewee.length; i++) { 
      checkboxes_interviewee[i].checked = select_all_interviewee.checked;
    }
  });

  for (var i = 0; i < checkboxes_interviewee.length; i++) {
    checkboxes_interviewee[i].addEventListener('change', function(e){ //".checkbox" change 
      if(this.checked == false){
        select_all_interviewee.checked = false;
      }
      if(document.querySelectorAll('.checkbox:checked').length == checkboxes_interviewee.length){
        select_all_interviewee.checked = true;
      }
    });
  }

  if($('.checkbox-interviewee:checked').length == $('.checkbox-interviewee').length){
    $('#select-interviewee').attr('checked','checked');
  }
  if($('.checkbox-interviewer:checked').length == $('.checkbox-interviewer').length){
    $('#select-interviewer').attr('checked','checked');
  }

  
  //$('#no_deadline').click();
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
  .cust-icon {
    left: -20px;
  }
  .dotted-border{
    border: 3px dotted black;
    margin-bottom: 10px;
    padding: 10px;
    cursor: pointer;
  }
  /*#sortable{
    cursor: pointer;
  }*/
  .ui-sortable-handle{
    cursor: pointer;
  }
  .form-group{
    cursor: pointer;
  }
  .fName{
    cursor: pointer;
  }
</style>