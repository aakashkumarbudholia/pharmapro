@extends('layouts.admin_master')
@section('content')
<?php
 	$id = isset($Phrm_TeamHub[0]->id) ? $Phrm_TeamHub[0]->id : '';
    $first_name = isset($Phrm_TeamHub[0]->first_name) ? $Phrm_TeamHub[0]->first_name : '';
    $last_name = isset($Phrm_TeamHub[0]->last_name) ? $Phrm_TeamHub[0]->last_name : '';
    $email = isset($Phrm_TeamHub[0]->email) ? $Phrm_TeamHub[0]->email : '';
    $role=isset($Phrm_TeamHub[0]->role) ? $Phrm_TeamHub[0]->role : '';
    $password = isset($Phrm_TeamHub[0]->password) ? $Phrm_TeamHub[0]->password : '';

    $interviewer_id=isset($Phrm_TeamHub[0]->interviewer_id) ? $Phrm_TeamHub[0]->interviewer_id : '';

?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{url('admin/TeamHubUser')}}">Team Hub User</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ $action }}</span>
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
                                 <i class="fa fa-gift"></i>{{ $action }} Team Member User List </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
		                            if($action == "Add"){
		                                $url = 'admin/TeamHubUser/insert';
		                            }else{
		                                $url = 'admin/TeamHubUser/update/';
		                            }
	                        ?>

                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmInterviewer" id="frmInterviewer" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                               
                               
                               <div class="form-body">
                                   		<div class="form-group"> 
                                   			<label class="control-label col-md-3">First Name *</label>
		                                        <div class="col-md-9">
		                                           <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{ $first_name }}">
		                                        </div>
                                    	</div>
                                </div>
                                <div class="form-body">
	                                    <div class="form-group">
	                                        <label class="control-label col-md-3">Last Name *</label>
	                                        <div class="col-md-9">
	                                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{ $last_name }}">
	                                        </div>
	                                    </div>
                               	</div>

                                <div class="form-body">
	                                <div class="form-group">
	                                        <label class="control-label col-md-3">Email *</label>
	                                        <div class="col-md-9">
	                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
	                                        </div>
	                                </div>
                               	</div>
                                <div class="form-body">
	                                <div class="form-group">
	                                        <label class="control-label col-md-3">Password *</label>
	                                        <div class="col-md-9">
	                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $password }}">
	                                        </div>
	                                </div>
                                </div>
                                <div class="form-body">
	                                    <div class="form-group">
	                                         <label class="control-label col-md-3">Role *</label>
	                                         <div class="col-md-9">
		                                           <!--  <input type="radio" id="admin" name="role" value="FULL" <?php //$role="$role"; if($role == 'FULL') echo 'checked="checked" ';?>required="">
		                                            <label for="admin">Admin</label>
		                                            <span>(Has full account access, including viewing and editing billing info)</span>
		                                            <br> -->
		                                            <input type="radio" id="team_hub_member" name="role" value="LIMITED" <?php $role="$role"; if($role == 'LIMITED') echo 'checked="checked" ';?>  required="" checked>
		                               
		                                            <label for="team_hub_member">Team Member/Producer/Assistant</label>
		                                             <span>(has full account access, but cannot view or edit billing info or manage users)</span>
	                                            </div>
	                                    </div>
                               	</div>
                               	<div class="form-actions">
	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="row">
	                                                <div class="col-md-offset-3 col-md-9">
	                                                    <button type="submit" class="btn green">
	                                                        <i class="fa fa-check"></i> Submit
	                                                    </button>
	                                                     <?php
	                                                        $url='admin/employer/edit/'.$interviewer_id; 
	                                                      ?>
	                                                    <a href="{{ url($url) }}" class="btn default" >Cancel</a>

	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
                                	</div>
	                            </form>

                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







		




                              

@endsection
@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js">
</script>
    
    
    <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}">
    	
    </script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmInterviewer').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true},
                   // username: {required: true},
                    password: {required: true},
                },
                
            });
        });


    </script>

@endpush
