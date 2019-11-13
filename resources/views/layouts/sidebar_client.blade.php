<?php $url = url()->current(); ?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
           
            <li class="nav-item start <?php if(strpos($url, 'dashboard') !== false) echo 'active';?>">
                <a href="{{ url('client/dashboard') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
           
            <li class="nav-item start <?php if(strpos($url, 'client/document_mngt') !== false) echo 'active';?>">
                <a href="{{ url('client/document_mngt') }}" class="nav-link ">
                    <i class="fa fa-file-excel-o"></i>
                    <span class="title">Document Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client/search') !== false) echo 'active';?>">
                <a href="{{ url('client/search') }}" class="nav-link ">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <span class="title">Search Files & Folders</span>
                    <span class="selected"></span>
                </a>
            </li>
	
		 <li class="nav-item start <?php if(strpos($url, 'client/split') !== false) echo 'active';?>">
                <a href="{{ url('client/split') }}" class="nav-link ">
                    <i class="fa fa-file"></i>
                    <span class="title">Split Files</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client/merge') !== false) echo 'active';?>">
                <a href="{{ url('client/merge') }}" class="nav-link ">
                    <i class="fa fa-file"></i>
                    <span class="title">Merge Files</span>
                    <span class="selected"></span>
                </a>
            </li>

            <?php
            $sub_client_user_id = session('client_user_id');
            $activity_views = DB::table('client_assign_role_permision AS earp')
            ->join('client_role_permision As erp','earp.client_role_id','=','erp.client_role_id')
            ->where('erp.status','=','approved')
            ->where('erp.permision','=','activity_views')
            ->where('earp.sub_client_id','=',$sub_client_user_id)
            ->get();
            if(isset($activity_views[0]) && !empty($activity_views[0])){ ?>
                <li class="nav-item start <?php if(strpos($url, 'client/activity_views') !== false) echo 'active';?>">
                    <a href="{{ url('client/activity_views') }}" class="nav-link ">
                        <i class="fa fa-file"></i>
                        <span class="title">Activity Views</span>
                        <span class="selected"></span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
