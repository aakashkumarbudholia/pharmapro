@extends('layouts.admin_master')
@section('content')
<?php
if($action=='Add'){
    $id = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $username = '';
    $password = '';
	$pharmacie = '';
	$adresse = '';
	$postal = '';
	$villa = '';
	$departement = '';
$code = '';

}else{
    $id = isset($interviewer_data[0]->id) ? $interviewer_data[0]->id : '';
    $first_name = isset($interviewer_data[0]->first_name) ? $interviewer_data[0]->first_name : '';
    $last_name = isset($interviewer_data[0]->last_name) ? $interviewer_data[0]->last_name : '';
    $email = isset($interviewer_data[0]->email) ? $interviewer_data[0]->email : '';
    $username = isset($interviewer_data[0]->username) ? $interviewer_data[0]->username : '';
    $password = isset($interviewer_data[0]->password) ? $interviewer_data[0]->password : '';

	$pharmacie = isset($interviewer_data[0]->pharmacie) ? $interviewer_data[0]->pharmacie : '';
	$adresse = isset($interviewer_data[0]->adresse) ? $interviewer_data[0]->adresse : '';
	$postal = isset($interviewer_data[0]->postal) ? $interviewer_data[0]->postal : '';
	$villa = isset($interviewer_data[0]->villa) ? $interviewer_data[0]->villa : '';
	$departement = isset($interviewer_data[0]->departement) ? $interviewer_data[0]->departement : '';
    $departement = isset($interviewer_data[0]->state) ? $interviewer_data[0]->state : '';
$code = isset($interviewer_data[0]->code) ? $interviewer_data[0]->code : '';

}
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('admin/employer') }}">Employer</a>
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
                                <i class="fa fa-gift"></i>{{ $action }} Employer </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin/employer/insert';
                            }else{
                                $url = 'admin/employer/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmInterviewer" id="frmInterviewer" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="username" id="username"  class="form-control" value="{{ $username }}">
                                
                               
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

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="Enter User Name" class="form-control" value="{{ $username }}">
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password *</label>
                                        <div class="col-md-9">
                                            @php $dcd_password = base64_decode($password); @endphp
                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $dcd_password }}">
                                        </div>
                                    </div>
                                </div>

 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name of pharmacy (or company) *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-lg" placeholder="Nom pharmacie (ou entreprise)" id="pharmacie" name="pharmacie"  value="{{ $pharmacie }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-lg" placeholder="Adresse" id="adresse" name="adresse"  value="{{ $adresse }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Postal No *</label>
                                        <div class="col-md-9">
                                           <input type="text" class="form-control form-control-lg" placeholder="No postal" id="postal" name="postal"  value="{{ $postal }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City *</label>
                                        <div class="col-md-9">
                                           <input type="text" class="form-control form-control-lg" placeholder="Ville" id="villa" name="villa" value="{{ $villa }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Department No *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-lg" placeholder="No département" id="departement" name="departement"  value="{{ $departement }}" required>
</div>
                                        </div>


				 <div class="form-group">
                                        <label class="control-label col-md-3">ID (PE ID) *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-lg" placeholder="PE ID" id="code" name="code"  value="{{ $code }}" required>
</div>
                                        </div>



                                    </div>




                                </div>

				


                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="reset" class="btn default">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
                <!-- Team Hub User List -->
            <div>&nbsp;</div>
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-pane active" id="tab_5">
                         @include('layouts.flash-message')
                            <div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                         <i class="fa fa-gift"></i>Team Member User List
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column " id="teamHubUser1">
                                        <thead>
                                            <tr>  
                                                <td>First Name</td>
                                                <td>Last Name</td>
                                                <td>Email</td>
                                                <td>Password</td>
                                                <td>Role</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $Phrm_TeamHub=DB::table('pharmapro_teammember')
                                                ->select('*')
                                                ->where('interviewer_id',$id)
                                                ->get();
                                                if($Phrm_TeamHub->count())
                                                {
                                                    if(!empty($Phrm_TeamHub))
                                                    {
                                                        foreach($Phrm_TeamHub as $key => $value)
                                                        {

                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $value->first_name;?></td>
                                                <td><?php echo $value->last_name;?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->password; ?></td>
                                                <td><?php  if($value->role == 'FULL'){ echo "Admin";}else{echo "Team Member/Producer/Assistant";}?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $url='admin/TeamHubUser/edit/'.$value->id;
                                                    ?>
                                                    <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                                    <?php
                                                        $url='admin/TeamHubUser/delete/'.$value->id;
                                                    ?>
                                                    <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                   }else{ ?>
                                      <tr >
                                        <td colspan="5"><p>No Team Member found</p></td>
                                    </tr>
                                   <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
