<?php $url = url()->current();?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
           
            <li class="nav-item start <?php if(strpos($url, 'dashboard') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee/dashboard')); ?>" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <li class="nav-item start <?php if(strpos($url, 'employee/document_mngt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee/document_mngt')); ?>" class="nav-link ">
                    <i class="fa fa-file-excel-o"></i>
                    <span class="title">Document Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee/search') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee/search')); ?>" class="nav-link ">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <span class="title">Search Files & Folders</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee/split') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee/split')); ?>" class="nav-link ">
                    <i class="fa fa-file"></i>
                    <span class="title">Split Files</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee/merge') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee/merge')); ?>" class="nav-link ">
                    <i class="fa fa-file"></i>
                    <span class="title">Merge Files</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php
            $emp_id = session('emp_user_id');

            $activity_views = DB::table('emp_assign_role_permision AS earp')
            ->join('emp_role_permision As erp','earp.emp_role_id','=','erp.emp_role_id')
            ->where('erp.status','=','approved')
            ->where('erp.permision','=','activity_views')
            ->where('earp.emp_id','=',$emp_id)
            ->get();

            if(isset($activity_views[0]) && !empty($activity_views[0])){ ?>
                <li class="nav-item start <?php if(strpos($url, 'employee/activity_views') !== false) echo 'active';?>">
                    <a href="<?php echo e(url('employee/activity_views')); ?>" class="nav-link ">
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