<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Hello, <?php echo e(session('emp_user_name')); ?></h1>
        </div>        
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('employee/dashboard')); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"><?php echo e($action); ?></span>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(url('employee/dashboard')); ?>" class="form-horizontal form-bordered" name="frmSubClientManagement" id="frmSubClientManagement" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-body">
                    <div class="form-group">
                        <div class="col-md-2">
                            <?php
                              $select = (isset($select_client_id) ? $select_client_id : ''); 
                            ?>
                            <select class="form-control" name="client_id" id="client_id" >
                                <option value="">Select Client</option>
                                <?php
                                  if(!empty($client_ids)){
                                    foreach ($client_ids as $key => $value) { ?>
                                      <option value="<?php echo $value->id;?>" <?php if($select == $value->id){ ?> selected <?php } ?>><?php echo $value->client_name;?></option>
                                <?php      
                                    }
                                  }else{ ?>
                                    <option value="">Client Not Found</option>
                                <?php
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            
                            <?php 
                                if(isset($filter)){
                                    $action = $filter;
                                }else{
                                    $action = '';
                                }
                            ?>
                            <select class="form-control" name="filter" id="filter" >
                                <option value="">Select Filter</option>
                                <option value="month" <?php if($action == 'month'){ ?> selected <?php } ?>>1 Month</option>
                                <option value="week" <?php if($action == 'week'){ ?> selected <?php } ?>>1 Week</option>
                                <option value="day" <?php if($action == 'day'){ ?> selected <?php } ?>>1 Day</option>
                                <option value="from_to" <?php if($action == 'from_to'){ ?> selected <?php } ?>>From To</option>
                            </select>
                        </div>
                        <?php
                        $to_date = (isset($get_to) ? $get_to : '');
                        $from_date = (isset($get_from) ? $get_from : '');
                        ?>
                        <div class="col-md-2 ">    
                            <input class="form-control form-control-inline input-small date-picker" size="16" name="from_date" id="from_date" type="text" value="<?php echo e($from_date); ?>" placeholder="Select From Date" >
                        </div>    

                        <div class="col-md-2">  
                            <input class="form-control form-control-inline input-small date-picker" size="16" name="to_date" id="to_date" type="text" value="<?php echo e($to_date); ?>" placeholder="Select To Date" >
                        </div>

                        <div class="col-md-2">      
                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
                        </div>
                            
                    </div>
                </div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($uploaded_doc_by_cl); ?>"><?php echo e($uploaded_doc_by_cl); ?></span>
                 </div>
                 <div class="desc"> Uploaded Documents by Client</div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 red" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($todays_upd_doc); ?>"><?php echo e($todays_upd_doc); ?></span>
                 </div>
                 <div class="desc"> Uploaded Documents </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 green" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($todays_dltd_doc); ?>"><?php echo e($todays_dltd_doc); ?></span>
                 </div>
                 <div class="desc"> Deleted Documents </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($todays_mvd_doc); ?>"><?php echo e($todays_mvd_doc); ?></span>
                 </div>
                 <div class="desc"> Moved Documents </div>
              </div>
           </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($todays_rem_doc); ?>"><?php echo e($todays_rem_doc); ?></span>
                 </div>
                 <div class="desc"> Renamed Documents </div>
              </div>
           </a>
        </div>
    </div>
    <!-- END PAGE BREADCRUMB -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>