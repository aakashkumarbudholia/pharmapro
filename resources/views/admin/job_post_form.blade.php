@extends('layouts.admin_master_new')
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
<style type="text/css">
    .form-control
    {
        height: auto !important;
        min-height : calc(1.5em + .75rem + 2px);

    }
</style>
    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-4">
                        @include('layouts.flash-message')
                    </p>
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Hello, {{ session('user_name') }}</h1> -->
                    <p class="mb-4">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="{{ url('admin/interviewer') }}">Job Details /</a>
                            </li>
                            <li>
                                <span style="padding-left: 5px;"  class="active">View</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-user" style="margin-right: 5px;"></i>View Job Details
                            </h6>
                        </div>
                            
                            <div class="card-body">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal form-bordered" name="frmInterviewee" id="frmInterviewee" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Employer Name </label>
                                        <div class="col-md-9">
                                            
                                            <span class="form-control"><?php
                                                if(isset($interviewee_data[0]->user_id) && !empty($interviewee_data[0]->user_id)){
                                                    $user_info = DB::table('users')
                                                        ->where('id','=',$interviewee_data[0]->user_id)
                                                        ->first();

                                                    echo isset($user_info->first_name) ? $user_info->first_name : '';

                                                    echo isset($user_info->last_name) ? ' '.$user_info->last_name : '';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Job Title </label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $job_title }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Service</label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $service }}</span>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Job Description</label>
                                        <div class="col-md-9">
                                            <span class="form-control"><?php echo html_entity_decode($job_desc); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Company Logo</label>
                                        <div class="col-md-9">
                                            <img id="blah" src="<?php echo asset('logo/'.$company_logo);?>" class="img-responsive auto-logo" alt="" style="width:200px;height:200px;margin-top: 10px;"> 
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Company</label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $company }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Company Description</label>
                                        <div class="col-md-9">
                                           <span class="form-control"> {{ $company_desc }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Tel</label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $phone }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Note </label>
                                        <div class="col-md-9">
                                            {{ $note }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Link of Job Reference </label>
                                        <div class="col-md-9">
                                            {{ $link }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Facebook page </label>
                                        <div class="col-md-9">
                                            {{ $fb }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Twitter page </label>
                                        <div class="col-md-9">
                                            {{ $tweet }}
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">LinkedIn page </label>
                                        <div class="col-md-9">
                                           <span class="form-control"> {{ $linkd }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Insta page </label>
                                        <div class="col-md-9">
                                            {{ $insta }}
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Address </label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $address }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">City </label>
                                        <div class="col-md-9">
                                          <span class="form-control">  {{ $city }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">State </label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $state }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Country </label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $country }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Pincode </label>
                                        <div class="col-md-9">
                                            <span class="form-control">{{ $pincode }}</span>
                                        </div>
                                    </div>
                                </div>



                                
                            </form>
                                <!-- END FORM-->
                            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
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
