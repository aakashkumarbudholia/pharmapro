<?php $url = url()->current(); ?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start">
                <a href="{{ url('dashboard_admin') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ url('admin/interviewer') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Interviewer</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ url('admin/interviewee') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Interviewee</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ url('admin/services') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Services</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ url('admin/about') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">About Us</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start">
                <a href="{{ url('admin/contact') }}" class="nav-link ">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <span class="title">Contact Us</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
