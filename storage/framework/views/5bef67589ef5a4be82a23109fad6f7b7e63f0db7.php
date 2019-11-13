<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Hello, <?php echo e(session('user_name')); ?></h1>
        </div>        
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('dashboard')); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Dashboard</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-12">
            <form action="<?php echo e(url('dashboard/filter')); ?>" class="form-horizontal form-bordered" name="frmFilter" id="frmFilter" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-body">
                    <div class="form-group">
                        <div class="col-md-3">
                            <?php 
                                if(isset($filter)){
                                    $action = $filter;
                                }else{
                                    $action = '';
                                }
                            ?>
                            <select class="form-control" name="filter" id="filter" onchange="func_filter();" >
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
                        <div class="col-md-3" id="f_date" style="display: none;">    
                            
                            <input class="form-control form-control-inline input-medium date-picker" size="16" name="from_date" id="from_date" type="text" value="<?php echo e($from_date); ?>" placeholder="Select From Date" >
                        </div>    

                        <div class="col-md-3" id="t_date" style="display: none;">  
                            <input class="form-control form-control-inline input-medium date-picker" size="16" name="to_date" id="to_date" type="text" value="<?php echo e($to_date); ?>" placeholder="Select To Date" >
                        </div>

                        <div class="col-md-3">      
                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
                        </div>
                            
                    </div>
                </div>
            </div>
        </form>
     
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($today_uploaded_document); ?>"><?php echo e($today_uploaded_document); ?></span>
                 </div>
                 <div class="desc">Uploaded documents</div>
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
                    <span data-counter="counterup" data-value="<?php echo e($today_deleted_document); ?>"><?php echo e($today_deleted_document); ?></span>
                 </div>
                 <div class="desc">Deleted documents</div>
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
                    <span data-counter="counterup" data-value="<?php echo e($today_moved_document); ?>"><?php echo e($today_moved_document); ?></span>
                 </div>
                 <div class="desc"> Moved documents </div>
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
                    <span data-counter="counterup" data-value="<?php echo e($today_renamed_document); ?>"><?php echo e($today_renamed_document); ?></span>
                 </div>
                 <div class="desc">Renamed documents </div>
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
                    <span data-counter="counterup" data-value="<?php echo e($today_moved_folder); ?>"><?php echo e($today_moved_folder); ?></span>
                 </div>
                 <div class="desc"> Moved Folders </div>
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
                    <span data-counter="counterup" data-value="<?php echo e($today_deleted_folder); ?>"><?php echo e($today_deleted_folder); ?></span>
                 </div>
                 <div class="desc"> Deleted Folders </div>
              </div>
           </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
              <div class="visual">
                 <i class="fa fa-comments"></i>
              </div>
              <div class="details">
                 <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($today_renamed_folder); ?>"><?php echo e($today_renamed_folder); ?></span>
                 </div>
                 <div class="desc"> Renamed Folders </div>
              </div>
           </a>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="<?php echo e(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('assets/pages/scripts/components-date-time-pickers.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $('#from_date,#to_date').datepicker({
        format: 'yyyy-mm-dd'
    })
</script>

<script type="text/javascript">
  function func_filter() {
      var filter = $('#filter').val();
      if(filter == 'from_to'){
          $('#f_date').show();
          $('#t_date').show();
      }else{
          $('#f_date').hide();
          $('#t_date').hide();
      }
  }
</script>



    <script type="text/javascript">
        $(document).ready(function () {
            $(window).load(function(){
                func_filter();
            });
            $('#frmFilter').validate({
                rules: {
                    filter: {required: true},
                    from_date: {required: true},
                    to_date: {required: true},
                    //to_date: {required: true,greaterThan:'#from_date'},
                },
                
            });
        });
        $.validator.addMethod(
          "greaterThan",
          function(value, element, params) {
              var target = $(params).val();
              var isValueNumeric = !isNaN(parseFloat(value)) && isFinite(value);
              var isTargetNumeric = !isNaN(parseFloat(target)) && isFinite(target);
              if (isValueNumeric && isTargetNumeric) {
                  return Number(value) > Number(target);
              }

              if (!/Invalid|NaN/.test(new Date(value))) {
                  return new Date(value) > new Date(target);
              }

              return false;
          },
          'Must be greater than From Date.');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>