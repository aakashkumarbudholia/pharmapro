<?php $url = url()->current(); ?>
<?php  $s = session('activity_id'); 

$adm_modules = array();
$adm_modules = DB::table('admin_module_permission')
			 ->select('mid')
			 ->where('uid',$s)
			->get();

$marray = array();

foreach($adm_modules as $k2=>$v2)
{

$marray[] = $v2->mid;

}

?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php if($controller == 'DashboardController'){ echo 'active'; }?>">
                <a href="<?php echo e(url('dashboard')); ?>" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>


<?php if (in_array("Admin_mgtController", $marray) || session('activity_id') == 1)  { ?>


		<li class="nav-item start <?php if($controller == 'Admin_mgtController'){ echo 'active'; }?>">
                <a href="<?php echo e(url('admin_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Admin Management</span>
                    <span class="selected"></span>
                </a>
            </li>
<?php } ?>
<?php if (in_array("PermissionManagement", $marray) || session('activity_id') == 1)  { ?>

            <li class="nav-item start <?php if($controller == 'PermissionManagement'){ echo 'active'; }?>">
                <a href="<?php echo e(url('permission_mngt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Permission Management</span>
                    <span class="selected"></span>
                </a>
            </li>
<?php } ?>  	       
<?php if (in_array("Client_folder_mgtController", $marray) || session('activity_id') == 1)  { ?>
            <li class="nav-item start <?php if($controller == 'Client_folder_mgtController'){ echo 'active'; }?>">
                <a href="<?php echo e(url('client_folder_mgt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Client Folder Management</span>
                    <span class="selected"></span>
                </a>
            </li>
<?php } ?>  


<?php if (in_array("Client_mgtController", $marray) || in_array("Client_typeController", $marray) || in_array("Service_typeController", $marray) || session('activity_id') == 1)  { ?>

            <li class="nav-item start <?php if($controller == 'Client_mgtController' || $controller == 'Client_typeController' || $controller == 'Service_typeController' ){ echo 'active'; }?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Client</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">

<?php if (in_array("Client_typeController", $marray) || session('activity_id') == 1)  { ?>
		   <li class="nav-item start <?php if($controller == 'Client_typeController'){ echo 'active'; }?> ">
                        <a href="<?php echo e(url('client_type')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Client Type</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("Service_typeController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Service_typeController'){ echo 'active'; }?> ">
                        <a href="<?php echo e(url('service_type')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Service Type</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("Client_mgtController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Client_mgtController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('client_mgt')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Client Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  

                </ul>
            </li>

<?php } ?> 

<?php if (in_array("Client_assign_role_permisionController", $marray) || in_array("Assign_folders_to_clientController", $marray) || in_array("Sub_client_mgtController", $marray) || in_array("Client_roleController", $marray) || in_array("Client_role_permisionController", $marray) || session('activity_id') == 1)  { ?> 

            <li class="nav-item start <?php if($controller == 'Client_assign_role_permisionController' || $controller == 'Assign_folders_to_clientController' || $controller == 'Sub_client_mgtController' || $controller == 'Client_roleController' || $controller == 'Client_role_permisionController'){ echo 'active'; }?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Sub Client</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">

<?php if (in_array("Client_roleController", $marray) || session('activity_id') == 1)  { ?>
                     <li class="nav-item start <?php if($controller == 'Client_roleController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('client_role')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Sub Client Role Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

<?php } ?>                   
<?php if (in_array("Client_role_permisionController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Client_role_permisionController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('client_role_permision')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Sub Client Role Permission Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

<?php } ?>  
<?php if (in_array("Sub_client_mgtController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Sub_client_mgtController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('sub_client_mgt')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Sub client Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

<?php } ?>  
<?php if (in_array("Client_assign_role_permisionController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Client_assign_role_permisionController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('client_assign_role_permision')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Assign Role/Permission To Sub Client</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("Assign_folders_to_clientController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Assign_folders_to_clientController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('assign_folders_to_client')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Assign Folder/Files to Sub Client</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>
                    

                </ul>
            </li>
<?php } ?> 

<?php if (in_array("Emp_mgtController", $marray) || in_array("Emp_assign_role_permisionController", $marray) || in_array("Assign_folders_to_empController", $marray) || in_array("Emp_roleController", $marray) || in_array("Emp_role_permisionController", $marray) || session('activity_id') == 1)  { ?>

            <li class="nav-item start <?php if($controller == 'Emp_mgtController' || $controller == 'Emp_assign_role_permisionController' || $controller == 'Assign_folders_to_empController' || $controller == 'Emp_roleController' || $controller == 'Emp_role_permisionController'){ echo 'active'; }?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Employee</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">

<?php if (in_array("Emp_roleController", $marray) || session('activity_id') == 1)  { ?>
			     <li class="nav-item start <?php if($controller == 'Emp_roleController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('employee_role')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Employee Role Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("Emp_role_permisionController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Emp_role_permisionController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('employee_role_permision')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Employee Role Permission Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

<?php } ?>  
<?php if (in_array("Emp_mgtController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Emp_mgtController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('employee_mgt')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Employee Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

<?php } ?>  
<?php if (in_array("Emp_assign_role_permisionController", $marray) || session('activity_id') == 1)  { ?>
                  <li class="nav-item start <?php if($controller == 'Emp_assign_role_permisionController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('employee_assign_role_permision')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Employee Assign Role Permission Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("Assign_folders_to_empController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Assign_folders_to_empController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('assign_folders_to_employee')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Assign Folder/Files to Employee</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>

                </ul>
            </li>
<?php } ?> 

<?php if (in_array("Document_viewController", $marray) || in_array("ActivityViews", $marray) || in_array("ArchiveManagement", $marray) || in_array("StatisticsManagement", $marray) || session('activity_id') == 1)  { ?>

            <li class="nav-item start <?php if($controller == 'Document_viewController' || $controller == 'ActivityViews' || $controller == 'ArchiveManagement' || $controller == 'StatisticsManagement'){ echo 'active'; }?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="title">Views</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">

<?php if (in_array("Document_viewController", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'Document_viewController'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('document_view')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Document Views</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("ActivityViews", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'ActivityViews'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('activity_views')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Activity Views</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("ArchiveManagement", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'ArchiveManagement'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('archive_mngt')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Archive Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?>  
<?php if (in_array("StatisticsManagement", $marray) || session('activity_id') == 1)  { ?>
                    <li class="nav-item start <?php if($controller == 'StatisticsManagement'){ echo 'active'; }?>">
                        <a href="<?php echo e(url('statistics_mngt')); ?>" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Statistics management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
<?php } ?> 

                </ul>
            </li>
          
<?php } ?> 

        </ul>
    </div>
</div>
