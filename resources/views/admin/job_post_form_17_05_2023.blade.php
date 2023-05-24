@extends('layouts.admin_master')
@section('content')
<?php
if($action=='Add'){
    $id = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $password = '';
}else{
    $id = isset($interviewee_data[0]->id) ? $interviewee_data[0]->id : '';
    $service = isset($interviewee_data[0]->title) ? $interviewee_data[0]->title : '';
    $job_title = isset($interviewee_data[0]->job_title) ? $interviewee_data[0]->job_title : '';
    $job_desc = isset($interviewee_data[0]->email) ? html_entity_decode($interviewee_data[0]->job_desc) : '';
    $company = isset($interviewee_data[0]->company) ? $interviewee_data[0]->company : '';
    $company_logo = isset($interviewee_data[0]->company_logo) ? $interviewee_data[0]->company_logo : '';

    $company_desc = isset($interviewee_data[0]->company_desc) ? $interviewee_data[0]->company_desc : '';

    $email = isset($interviewee_data[0]->email) ? $interviewee_data[0]->email : '';
    $phone = isset($interviewee_data[0]->phone) ? $interviewee_data[0]->phone : '';
    $note = isset($interviewee_data[0]->note) ? $interviewee_data[0]->note : '';
    $link = isset($interviewee_data[0]->link) ? $interviewee_data[0]->link : '';
    $fb = isset($interviewee_data[0]->fb) ? $interviewee_data[0]->fb : '';
    $tweet = isset($interviewee_data[0]->tweet) ? $interviewee_data[0]->tweet : '';
    $linkd = isset($interviewee_data[0]->linkd) ? $interviewee_data[0]->linkd : '';
    $insta = isset($interviewee_data[0]->insta) ? $interviewee_data[0]->insta : '';
    $address = isset($interviewee_data[0]->address) ? $interviewee_data[0]->address : '';
    $city = isset($interviewee_data[0]->city) ? $interviewee_data[0]->city : '';
    $state = isset($interviewee_data[0]->state) ? $interviewee_data[0]->state : '';
    $country = isset($interviewee_data[0]->country) ? $interviewee_data[0]->country : '';
    $pincode = isset($interviewee_data[0]->pincode) ? $interviewee_data[0]->pincode : '';
}
?>


<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/interviewer') }}">Job Details</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">View</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_5">
                    @include('layouts.flash-message')
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>View Job Details</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            
                            <form action="" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Employer Name </div>
                                        <div class="col-md-9">
                                            
                                                <?php
                                                if(isset($interviewee_data[0]->user_id) && !empty($interviewee_data[0]->user_id)){
                                                    $user_info = DB::table('users')
                                                        ->where('id','=',$interviewee_data[0]->user_id)
                                                        ->first();

                                                    echo isset($user_info->first_name) ? $user_info->first_name : '';

                                                    echo isset($user_info->last_name) ? ' '.$user_info->last_name : '';
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Job Title </div>
                                        <div class="col-md-9">
                                            {{ $job_title }}
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Service</div>
                                        <div class="col-md-9">
                                            {{ $service }}
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Job Description</div>
                                        <div class="col-md-9">
                                            <?php echo html_entity_decode($job_desc); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Company Logo</div>
                                        <div class="col-md-9">
                                            <img id="blah" src="<?php echo asset('logo/'.$company_logo);?>" class="img-responsive auto-logo" alt="" style="width:200px;height:200px;margin-top: 10px;"> 
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Company</div>
                                        <div class="col-md-9">
                                            {{ $company }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Company Description</div>
                                        <div class="col-md-9">
                                            {{ $company_desc }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Email</div>
                                        <div class="col-md-9">
                                            {{ $email }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Tel</div>
                                        <div class="col-md-9">
                                            {{ $phone }}
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Note </div>
                                        <div class="col-md-9">
                                            {{ $note }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Link of Job Reference </div>
                                        <div class="col-md-9">
                                            {{ $link }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Facebook page </div>
                                        <div class="col-md-9">
                                            {{ $fb }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Twitter page </div>
                                        <div class="col-md-9">
                                            {{ $tweet }}
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">LinkedIn page </div>
                                        <div class="col-md-9">
                                            {{ $linkd }}
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Insta page </div>
                                        <div class="col-md-9">
                                            {{ $insta }}
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Address </div>
                                        <div class="col-md-9">
                                            {{ $address }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">City </div>
                                        <div class="col-md-9">
                                            {{ $city }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">State </div>
                                        <div class="col-md-9">
                                            {{ $state }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Country </div>
                                        <div class="col-md-9">
                                            {{ $country }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">Pincode </div>
                                        <div class="col-md-9">
                                            {{ $pincode }}
                                        </div>
                                    </div>
                                </div>



                                
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    
    <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmInterviewee').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true},
                    password: {required: true},
                },
                
            });
        });


    </script>

@endpush
