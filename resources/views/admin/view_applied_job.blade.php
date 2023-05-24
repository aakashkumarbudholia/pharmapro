@extends('layouts.admin_master_new')
@section('content')
<div class="page-content">
    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-4">
                        @include('layouts.flash-message')
                    </p>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Hello, {{ session('user_name') }}</h1>
                    <p class="mb-4">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="{{ url('dashboard_admin') }}">Home /</a>
                            </li>
                            <li>
                                <span style="padding-left: 5px;" class="active">View Applied job</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <a href="{{ url('admin/interviewee/add') }}"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                            <tr>
                                <td>Candidate name</td>
                                <td>Candidate email</td>
                                <td>Resume</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($apply_job)){
                                    foreach ($apply_job as $key => $value) {
                            ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo isset($value->first_name) ? $value->first_name : ''; ?>
                                                <?php echo isset($value->last_name) ? ' '.$value->last_name : ''; ?>
                                            </td>
                                            <td>
                                    <?php echo isset($value->email) ? $value->email : ''; ?>
                                </td>
                                <td>
                                    <?php
                                    $href = '#';
                                    if(isset($value->resume) && !empty($value->resume)){ 
                                        $href = asset('resume/'.$value->resume);
                                    } ?>
                                    <a href="{{ $href }}">{{ __('message.view') }}</a>
                                </td>
                                        </tr>
                            <?php        
                                    }
                            } ?>
                            
                        </tbody>
                    </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
</div>
@endsection

@push('scripts')

@endpush
