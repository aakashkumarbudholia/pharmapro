<!--Sidebar -->
<?php 
$segment1 =  Request::segment(1); 
$segment2 =  Request::segment(2); 
$segment3 =  Request::segment(3); 
$my_segment = $segment1.'/'.$segment2;
?>
<style type="text/css">

@media screen and (max-width: 1368px) {
    .sidebar .nav-item .nav-link span.side_logo img
    {
        width: 100%;
    }
}
</style>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php /*
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:void(0)" onClick="window.location.reload()">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">                    
                    <!-- <img src="{{ asset('assets/layouts/layout4/front/images1/logo-pharmajob-transp_new.png') }}" alt="" style="width: 199px;margin: 7px 0px 0px !important;" /> -->

                    <img src="http://10.16.16.5:8080/pharmapro/assets/dashbaord_assets/images/logo.png" alt="" style="width: 199px;margin: 7px 0px 0px !important;" />
                </div>
            </a>
            */?>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onClick="window.location.reload()">
                    <!-- <span class="side_logo_text">PHARMAPRO.FR</span> -->
                    <span class="side_logo">
                        <img src="{{ asset('/assets/dashbaord_assets/images/logo.png') }}" alt="PHARMAPRO.FR" />
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($segment1 == 'dashboard_admin') { ?> active <?php } ?>">
                <a class="nav-link" href="{{ url('dashboard_admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/employer') { ?> active <?php } ?>">
                <a href="{{ url('admin/employer') }}" class="nav-link ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Employer</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/interviewee') { ?> active <?php } ?>">
               <a href="{{ url('admin/interviewee') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Candidate</span> 
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/all-job') { ?> active <?php } ?>">
               <a href="{{ url('admin/all-job') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Jobs</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/services') { ?> active <?php } ?>">
               <a href="{{ url('admin/services') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Services</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/about') { ?> active <?php } ?>">
               <a href="{{ url('admin/about') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">About Us</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/contact') { ?> active <?php } ?>">
               <a href="{{ url('admin/contact') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Contact Us</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/cg') { ?> active <?php } ?>">
               <a href="{{ url('admin/cg') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Footer Page</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/profession') { ?> active <?php } ?>">
               <a href="{{ url('admin/profession') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Profession</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/stag') { ?> active <?php } ?>">
               <a href="{{ url('admin/stag') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">SEO TAGS</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment.'/'.$segment3 == 'admin/lang/en') { ?> active <?php } ?>">
               <a href="{{ url('admin/lang/en') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Translate EN</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment.'/'.$segment3 == 'admin/lang/fr') { ?> active <?php } ?>">
               <a href="{{ url('admin/lang/fr') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Translate FR</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/notification') { ?> active <?php } ?>">
               <a href="{{ url('admin/notification') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Notifications</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if($my_segment == 'admin/Log') { ?> active <?php } ?>">
               <a href="{{ url('Log') }}" class="nav-link ">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="title">Log</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar