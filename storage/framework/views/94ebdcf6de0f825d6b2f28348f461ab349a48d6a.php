<?php $url = url()->current();?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
           
            <li class="nav-item start <?php if(strpos($url, 'dashboard') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client/dashboard')); ?>" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
           
            <li class="nav-item start <?php if(strpos($url, 'client/document_mngt') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client/document_mngt')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Document Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start <?php if(strpos($url, 'client/search') !== false) echo 'active';?>">
                <a href="<?php echo e(url('client/search')); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Search Files & Folders</span>
                    <span class="selected"></span>
                </a>
            </li>
            
        </ul>
    </div>
</div>