<?php $__env->startSection('title', 'Client Create'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('component.heading', [
    'page_title' => 'Add Client',
    'action' => route('clients.index'),
    'text' => 'Back'
]); ?>
<?php echo $__env->renderComponent(); ?>
    <div class="title_right">
        <div class="form-group pull-right top_search">
            <a href="<?php echo e(url('admin/clients')); ?>" class="btn btn-primary"><i class="fa fa-backward"></i>
                &nbsp;&nbsp;Back</a>
        </div>
    </div><br><br><br>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('component.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="x_panel">
                <form id="add_client" name="add_client" role="form" method="POST"
                      action="<?php echo e(route('clients.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="x_content">
                        <?php if (count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    <?php $__currentLoopData = $errors->all();
                                    $__env->addLoop($__currentLoopData);
                                    foreach ($__currentLoopData as $error): $__env->incrementLoopIndices();
                                        $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach;
                                    $__env->popLoop();
                                    $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">First Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter client's first name" class="form-control"
                                       id="f_name" name="f_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Middle Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter client's middle name" class="form-control"
                                       id="m_name" name="m_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Last Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter client's last name" class="form-control"
                                       id="l_name" name="l_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Select Client's Gender <span
                                        class="text-danger">*</span></label><br>
                                <input type="radio" name="gender" id="genderM" value="Male" checked="" required/> &nbsp;&nbsp;Male
                                Client&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" id="genderF" value="Female"/>&nbsp;&nbsp;Female Client
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Email Address</label>
                                <input type="text" placeholder="enter client's email address" class="form-control"
                                       id="email" name="email">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter client's mobile number" class="form-control"
                                       id="mobile" maxlength="10"
                                       name="mobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Landline Number</label>
                                <input type="text" placeholder="enter client's landline number" class="form-control"
                                       id="alternate_no"
                                       name="alternate_no" maxlength="10">
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Permanent Home Address<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="enter client's permanent home address"
                                       class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Country <span class="text-danger">*</span></label>
                                <select class="form-control select-change country-select2"
                                        name="country" id="country"
                                        data-url="<?php echo e(route('get.country')); ?>"
                                        data-clear="#city_id,#state"
                                >
                                    <option value=""> select country</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">District <span class="text-danger">*</span></label>
                                <select id="state" name="state"
                                        data-url="<?php echo e(route('get.state')); ?>"
                                        data-target="#country"
                                        data-clear="#city_id"
                                        class="form-control state-select2 select-change">
                                    <option value=""> select district</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">City <span class="text-danger">*</span></label>
                                <select id="city_id" name="city_id"
                                        data-url="<?php echo e(route('get.city')); ?>"
                                        data-target="#state"
                                        class="form-control city-select2">
                                    <option value=""> select city</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Work Place Address</label>
                                <input type="text" placeholder="enter client's work place address" class="form-control"
                                       id="reference_name"
                                       name="reference_name">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Work Place Number</label>
                                <input type="text" placeholder="enter client's work place number " class="form-control"
                                       id="reference_mobile"
                                       name="reference_mobile">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                            <input type="checkbox" value="Yes" name="change_court_chk" id="change_court_chk"> Add more
                            person(s)<br/>
                        </div>
                        <div id="change_court_div" class="hidden">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                    <label for="fullname">Other Parties Details<span
                                            class="text-danger">*</span></label><br><br>
                                    <input type="radio" name="type" id="test6" value="single" checked="" required/>
                                    &nbsp;&nbsp;Single Advocate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="type" id="test7" value="multiple"/>&nbsp;&nbsp;Multiple
                                    Advocates
                                </div>
                            </div>
                            <br>
                            <div class="repeater one">
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item>
                                        <div class="row border-addmore">
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" placeholder="enter client's first name"
                                                       id="firstname" name="firstname"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter first name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">Middle Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" placeholder="enter client's middle name"
                                                       id="middlename" name="middlename"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter middle name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="lastname" name="lastname"
                                                       placeholder="enter client's last name"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter last name." class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <label for="fullname">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="mobile_client" name="mobile_client"
                                                       placeholder="enter client's mobile number"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter mobile number."
                                                       data-rule-number="true" data-msg-number="please enter digit 0-9."
                                                       data-rule-minlength="10"
                                                       data-msg-minlength="mobile must be 10 digit."
                                                       data-rule-maxlength="10"
                                                       data-msg-maxlength="mobile must be 10 digit."
                                                       class="form-control" maxlength="10">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <label for="fullname">Permanent Home Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="address_client" name="address_client"
                                                       placeholder="enter client's permanent home address "
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter address." class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br><br>
                                                <button type="button" data-repeater-delete
                                                        class="btn btn-danger"><i class="fa fa-trash-o"
                                                                                  aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <br>
                                    <button data-repeater-create type="button" value="Add New"
                                            class="btn btn-success waves-effect waves-light btn btn-success-edit"
                                    ><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="repeater two">
                                <div data-repeater-list="group-b">
                                    <div data-repeater-item>
                                        <div class="row border-addmore">
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" placeholder="enter client's first name"
                                                       id="firstname" name="firstname"
                                                       data-rule-required="true" data-msg-required="Please enter name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">Middle Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="middlename" name="middlename"
                                                       placeholder="enter client's middle name"
                                                       data-rule-required="true" data-msg-required="Please enter name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="lastname" name="lastname"
                                                       placeholder="enter client's last name"
                                                       data-rule-required="true" data-msg-required="Please enter name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <label for="fullname">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="mobile_client" name="mobile_client"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter mobile number."
                                                       placeholder="enter client's mobile number"
                                                       data-rule-number="true" data-msg-number="please enter digit 0-9."
                                                       data-rule-minlength="10"
                                                       data-msg-minlength="mobile must be 10 digit."
                                                       data-rule-maxlength="10"
                                                       data-msg-maxlength="mobile must be 10 digit."
                                                       class="form-control" maxlength="10">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <label for="fullname">Address <span class="text-danger">*</span></label>
                                                <input type="text" id="address_client" name="address_client"
                                                       placeholder="enter client's permanent home address"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter address." class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <label for="fullname">Advocate Name<span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" id="advocate_name" name="advocate_name"
                                                       placeholder="enter client's advocate name"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter advocate name."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                                <button type="button" data-repeater-delete
                                                        class="btn btn-danger waves-effect waves-light"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>&nbsp;
                                    <button data-repeater-create type="button" value="Add New"
                                            class="btn btn-success waves-effect waves-light btn btn-success-edit"
                                    ><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-danger"><i
                                        class="fa fa-times">
                                    </i>&nbsp;&nbsp;Cancel</a>
                                <input type="hidden" name="route-exist-check"
                                       id="route-exist-check"
                                       value="<?php echo e(url('admin/check_client_email_exits')); ?>">
                                <input type="hidden" name="token-value"
                                       id="token-value"
                                       value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                                                                 id="show_loader"></i>&nbsp;&nbsp;Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/admin/js/selectjs.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/vendors/repeter/repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/vendors/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/client/add-client-validation.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\resources\views/admin/client/client_create.blade.php ENDPATH**/ ?>
