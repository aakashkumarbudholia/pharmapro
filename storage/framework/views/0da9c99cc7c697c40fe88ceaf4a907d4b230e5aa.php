<?php $url = url()->current();?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

           

            <li class="nav-item start <?php if(strpos($url, 'dashboard') !== false) echo 'active';?>">
                <a href="<?php echo e(url('dashboard')); ?>" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'document_type') !== false) echo 'active';?>">
                <a href="<?php echo e(url('document_type')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Document Type</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_role') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_role')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Role Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee_role') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee_role')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Employee Role Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee_role_permision') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee_role_permision')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Employee Role Permision Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee_assign_role_permision') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee_assign_role_permision')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Employee Assign Role Permision Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_assign_role_permision') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_assign_role_permision')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Assign Role/Permission To Client</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_role_permision') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_role_permision')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Role Permision Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'employee_mgt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('employee_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Employee Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_type') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_type')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Type</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'service_type') !== false) echo 'active';?>">
                <a href="<?php echo e(url('service_type')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Service Type</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_mgt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'sub_client_mgt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('sub_client_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Sub client Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client_folder_mgt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client_folder_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Folder Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'assign_folders_to_employee') !== false) echo 'active';?>">
                <a href="<?php echo e(url('assign_folders_to_employee')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Assign Folder/Files to Employee</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'assign_folders_to_client') !== false) echo 'active';?>">
                <a href="<?php echo e(url('assign_folders_to_client')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Assign Folder/Files to Client</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'activity_views') !== false) echo 'active';?>">
                <a href="<?php echo e(url('activity_views')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Activity Views</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'archive_mngt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('archive_mngt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Archive Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'statistics_mngt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('statistics_mngt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Statistics management</span>
                    <span class="selected"></span>
                </a>
            </li>

        </ul>
    </div>
</div>