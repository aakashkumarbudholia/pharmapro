<?php $__env->startSection('content'); ?>
<?php
if($action=='Add'){
    $id = '';
    $email = '';
    $client_name = '';
    $client_physical_address = '';
    $country = '';
    $state = '';
    $city = '';
    $client_type = '';
    $service_type = '';
    $nature_of_business = '';
    $company_contact_number = '';
    $company_email = '';
    $dir_1_name = '';
    $dir_1_contact_number = '';
    $dir_1_email = '';
    $dir_2_name = '';
    $dir_2_contact_number = '';
    $dir_2_email = '';
    $acc_1_name = '';
    $acc_1_contact_number = '';
    $acc_1_email = '';
    $acc_2_name = '';
    $acc_2_contact_number = '';
    $acc_2_email = '';
    $doc_uploder_name = '';
    $doc_uploder_contact_number = '';
    $doc_uploder_contact_email = '';
    //$user_name = '';
}else{
    $id = $editdata->id;
    $email = $editdata->email;
    $client_name = $editdata->client_name;
    $client_physical_address = $editdata->client_physical_address;
    $country = $editdata->country;
    $state = $editdata->state;
    $city = $editdata->city;
    $client_type = $editdata->client_type;
    $service_type = $editdata->service_type;
    $nature_of_business = $editdata->nature_of_business;
    $company_contact_number = $editdata->company_contact_number;
    $company_email = $editdata->company_email;
    $dir_1_name = $editdata->dir_1_name;
    $dir_1_contact_number = $editdata->dir_1_contact_number;
    $dir_1_email = $editdata->dir_1_email;
    $dir_2_name = $editdata->dir_2_name;
    $dir_2_contact_number = $editdata->dir_2_contact_number;
    $dir_2_email = $editdata->dir_2_email;
    $acc_1_name = $editdata->acc_1_name;
    $acc_1_contact_number = $editdata->acc_1_contact_number;
    $acc_1_email = $editdata->acc_1_email;
    $acc_2_name = $editdata->acc_2_name;
    $acc_2_contact_number = $editdata->acc_2_contact_number;
    $acc_2_email = $editdata->acc_2_email;
    $doc_uploder_name = $editdata->doc_uploder_name;
    $doc_uploder_contact_number = $editdata->doc_uploder_contact_number;
    $doc_uploder_contact_email = $editdata->doc_uploder_contact_email;
    //$user_name = $editdata->user_name;
}
?>

<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo e(url('client_mgt')); ?>">Client</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"><?php echo e($action); ?></span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_5">
                    <?php echo $__env->make('layouts.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i><?php echo e($action); ?> Client </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'client_mgt/insert';
                            }else{
                                $url = 'client_mgt/update';
                            }
                            ?>
                            <form action="<?php echo e(url($url)); ?>" class="form-horizontal form-bordered" name="frmClientManagement" id="frmClientManagement" method="POST">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="<?php echo e($email); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Client Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="client_name" id="client_name" placeholder="Client Name" class="form-control" value="<?php echo e($client_name); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Client Physical Address *</label>
                                        <div class="col-md-9">                      
                                            <textarea name="client_physical_address" id="client_physical_address" placeholder="Client Physical Address" class="form-control" rows="4" required><?php echo e($client_physical_address); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="country" id="country" placeholder="Country" class="form-control" value="<?php echo e($country); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">State *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="state" id="state" placeholder="State" class="form-control" value="<?php echo e($state); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">City *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="city" id="city" placeholder="City" class="form-control" value="<?php echo e($city); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Client Type *</label>
                                        <div class="col-md-9">                      
                                            <select name="client_type" id="client_type" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                                <?php if($client_types): ?>
                                                    <?php $__currentLoopData = $client_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($c_type->id); ?>" <?php if($c_type->id==$client_type){ echo 'selected'; } ?> ><?php echo e($c_type->type_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Service Type *</label>
                                        <div class="col-md-9">
                                            <select name="service_type" id="service_type" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                                <?php if($service_types): ?>
                                                    <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($s_type->id); ?>" <?php if($s_type->id==$service_type){ echo 'selected'; } ?> ><?php echo e($s_type->type_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Nature of Business *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nature_of_business" id="nature_of_business" placeholder=" Nature of Business" class="form-control" value="<?php echo e($nature_of_business); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Company Contact Number *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="company_contact_number" id="company_contact_number" placeholder="Company Contact Number" class="form-control" value="<?php echo e($company_contact_number); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Company Email ID *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="company_email" id="company_email" placeholder="Company Email ID" class="form-control" value="<?php echo e($company_email); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 1 Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_1_name" id="dir_1_name" placeholder="Director 1 Name" class="form-control" value="<?php echo e($dir_1_name); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 1 Contact Number *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_1_contact_number" id="dir_1_contact_number" placeholder="Director 1 Contact Number" class="form-control" value="<?php echo e($dir_1_contact_number); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 1 Email ID *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_1_email" id="dir_1_email" placeholder="Director 1 Email ID" class="form-control" value="<?php echo e($dir_1_email); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 2 Name </label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_2_name" id="dir_2_name" placeholder="Director 2 Name" class="form-control" value="<?php echo e($dir_2_name); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 2 Contact Number </label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_2_contact_number" id="dir_2_contact_number" placeholder=" Director 2 Contact Number" class="form-control" value="<?php echo e($dir_2_contact_number); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Director 2 Email ID </label>
                                        <div class="col-md-9">
                                            <input type="text" name="dir_2_email" id="dir_2_email" placeholder="Director 2 Email ID" class="form-control" value="<?php echo e($dir_2_email); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 1 Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_1_name" id="acc_1_name" placeholder="Accountant 1 Name" class="form-control" value="<?php echo e($acc_1_name); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 1 Contact Number *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_1_contact_number" id="acc_1_contact_number" placeholder="Accountant 1 Contact Number" class="form-control" value="<?php echo e($acc_1_contact_number); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 1 Email ID *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_1_email" id="acc_1_email" placeholder="Accountant 1 Email ID" class="form-control" value="<?php echo e($acc_1_email); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 2 Name </label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_2_name" id="acc_2_name" placeholder="Accountant 2 Name" class="form-control" value="<?php echo e($acc_2_name); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 2 Contact Number </label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_2_contact_number" id="acc_2_contact_number" placeholder="Accountant 2 Contact Number" class="form-control" value="<?php echo e($acc_2_contact_number); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Accountant 2 Email ID </label>
                                        <div class="col-md-9">
                                            <input type="text" name="acc_2_email" id="acc_2_email" placeholder="Accountant 2 Email ID" class="form-control" value="<?php echo e($acc_2_email); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Document Uploader Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="doc_uploder_name" id="doc_uploder_name" placeholder="Document Uploader Name" class="form-control" value="<?php echo e($doc_uploder_name); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Document Uploader Contact Number *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="doc_uploder_contact_number" id="doc_uploder_contact_number" placeholder="Document Uploader Contact Number" class="form-control" value="<?php echo e($doc_uploder_contact_number); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Document Uploader Email ID *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="doc_uploder_contact_email" id="doc_uploder_contact_email" placeholder="Document Uploader Email ID" class="form-control" value="<?php echo e($doc_uploder_contact_email); ?>" required>
                                        </div>
                                    </div>
                                                                        
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="reset" class="btn default">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#frmClientManagement').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true,email:true},
                    // user_name: {required: true},
                    // password: {required: true,minlength:6},
                    company_name: {required: true},
                    phone: {required: true,number:true,minlength:10,maxlength:15},
                },
                
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>