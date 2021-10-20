<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <?php if($adminHasPermition->can(['dashboard_list'])): ?>
        <br><br><br><br>
        <link href="<?php echo e(asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.css')); ?> " rel="stylesheet">
        <form method="POST" action="<?php echo e(url('admin/dashboard')); ?>" id="case_board_form">
        <?php echo e(csrf_field()); ?>

        <!-- top tiles -->
            <div class="row">
                <a href="<?php echo e(route('clients.index')); ?>">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count"><?php echo e($client ?? ''); ?></div>
                            <h3>Clients</h3>
                            <p>Total clients.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo e(route('case-running.index')); ?>">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-gavel"></i></div>
                            <div class="count"><?php echo e($case_total ?? ''); ?></div>
                            <h3>Cases</h3>
                            <p>Total cases.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo e(url('admin/case-important')); ?>">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-star"></i></div>
                            <div class="count"><?php echo e($important_case ?? ''); ?></div>
                            <h3>Important Cases</h3>
                            <p>Total important cases.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo e(url('admin/case-archived')); ?>">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-file-archive-o"></i></div>
                            <div class="count"><?php echo e($archived_total); ?></div>
                            <h3>Archived Cases</h3>
                            <p>Total completed cases.</p>
                        </div>
                    </div>
                </a>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-university"></i>&nbsp&nbspToday Case Board</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="client_case" id="client_case"
                                           class="form-control datecase" readonly=""
                                           value="<?php echo e(($date!='')?date($date_format_laravel,strtotime($date)):date($date_format_laravel)); ?>">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php if($totalCaseCount>0): ?>
                                <?php if(count($case_dashbord)>0 && !empty($case_dashbord)): ?>
                                    <?php $__currentLoopData = $case_dashbord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $court): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4 class="title text-primary">Case Hearing Judge
                                            : <?php echo $court['judge_name']; ?></h4>
                                        <table id="case_list" class="table row-border" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Registration Number</th>
                                                <th width="35%">Petitioner & Respondent</th>
                                                <th width="15%">Case Hearing Date</th>
                                                <th width="10%">Case Status</th>
                                                <th width="17%" style="text-align: center;">Select Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($court['cases']) && count($court['cases'])>0): ?>
                                                <?php $__currentLoopData = $court['cases']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $class = ( $value->priority=='High')?'fa fa-star':(( $value->priority=='Medium')?'fa fa-star-half-o':'fa fa-star-o');
                                                    ?>
                                                    <?php if($value->client_position=='Petitioner'): ?>
                                                        <?php
                                                            $first = $value->first_name.' '.$value->middle_name.' '.$value->last_name;
                                                            $second = $value->party_name;
                                                        ?>
                                                    <?php else: ?>
                                                        <?php
                                                            $first = $value->party_name;
                                                            $second = $value->first_name.' '.$value->middle_name.' '.$value->last_name;
                                                        ?>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><span
                                                                class="text-primary"><?php echo e($value->registration_number); ?></span><br/><small><?php echo e(($value->caseSubType!='')?$value->caseSubType:$value->caseType); ?></small>
                                                        </td>
                                                        <td>
                                                            Petitioner Name &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $first; ?>

                                                            <br/><b></b><br/>Respondent Name : <?php echo $second; ?>

                                                        </td>
                                                        <td><?php if($value->hearing_date!=''): ?>
                                                                <?php echo e(date($date_format_laravel,strtotime($value->hearing_date))); ?>

                                                            <?php else: ?>
                                                                <span
                                                                    class="blink_me text-danger">Date Not Updated</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($value->case_status_name); ?></td>
                                                        <td>
                                                            <ul class="padding-bottom-custom" style="list-style: none;">
                                                                <?php if($adminHasPermition->can(['case_edit']) =="1"): ?>
                                                                    <li style="text-align:left"><a class=""
                                                                                                   href="javascript:void(0);"
                                                                                                   onclick="nextDateAdd('<?php echo e($value->case_id); ?>');"><i
                                                                                class="fa fa-calendar-plus-o"></i>&nbsp;&nbsp;Add
                                                                            Next Date</a></li><br>
                                                                    <li style="text-align:left"><a class=""
                                                                                                   href="javascript:void(0);"
                                                                                                   onClick="transfer_case('<?php echo e($value->case_id); ?>');"><i
                                                                                class="fa fa-gavel"></i> &nbsp;&nbsp;Transfer
                                                                            Case</a></li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php elseif($case_total>0 && count($case_dashbord)==0): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customers-space">
                                            <p class="text-center customers-tittle"><i
                                                    class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;Today you don't have
                                                cases to handle.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="customers-space">
                                                <h4 class="customers-heading">Manage your cases</h4>
                                                <p class="customers-tittle">Maintain complete case details like case
                                                    history, case transfer, next hearing date etc.</p><br>
                                                <div class="cst-btn">
                                                    <div class="top-btns" style="text-align: left;">
                                                        <a class="btn btn-info"
                                                           href="<?php echo e(url('admin/case-running/create')); ?>"><i
                                                                class="fa fa-plus"></i>&nbsp&nbspAdd Case </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-calendar-plus-o"></i>&nbsp&nbspToday Appointments</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="appoint_range" id="appoint_range" class="form-control"
                                           value="<?php echo e(date($date_format_laravel)); ?>" readonly="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php if(count($appoint_calander)>0): ?>
                                <table id="appointment_list" class="table row-border" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client Name</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                    </tr>
                                    </thead>
                                </table>
                            <?php elseif($appointmentCount>0 && count($appoint_calander)==0): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customers-space">
                                            <p class="text-center customers-tittle"><i
                                                    class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;Today you don't have
                                                appointments.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="customers-space">
                                                <h4 class="customers-heading">Manage your Appointments</h4>
                                                <p class="customers-tittle">Schedule your appointment with advocates
                                                    diary and we will remind and notify as and when your appointment is
                                                    due.</p><br>
                                                <div class="cst-btn">
                                                    <div class="top-btns" style="text-align: left;">
                                                        <a class="btn btn-info"
                                                           href="<?php echo e(url('admin/appointment/create')); ?>"><i
                                                                class="fa fa-plus"></i>&nbsp&nbspAdd
                                                            Appointment </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-calendar"></i>&nbsp&nbspAdvocate Calendar</h2><br><br>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="calendar_dashbors_case"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="load-modal"></div>
            <!-- /top tiles -->
        </form>
        <div class="modal fade" id="modal-case-priority" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal">
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-change-court" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal_transfer"></div>
            </div>
        </div>
        <div class="modal fade" id="modal-next-date" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal_next_date"></div>
            </div>
        </div>
        <input type="hidden" name="token-value"
               id="token-value"
               value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="case-running"
               id="case-running"
               value="<?php echo e(url('admin/case-running')); ?>">
        <input type="hidden" name="appointment"
               id="appointment"
               value="<?php echo e(url('admin/appointment')); ?>">
        <input type="hidden" name="ajaxCalander"
               id="ajaxCalander"
               value="<?php echo e(url('admin/ajaxCalander')); ?>">
        <input type="hidden" name="date_format_datepiker"
               id="date_format_datepiker"
               value="<?php echo e($date_format_datepiker); ?>">
        <input type="hidden" name="dashboard_appointment_list"
               id="dashboard_appointment_list"
               value="<?php echo e(url('admin/dashboard-appointment-list')); ?>">
        <input type="hidden" name="getNextDateModal"
               id="getNextDateModal"
               value="<?php echo e(url('admin/getNextDateModal')); ?>">
        <input type="hidden" name="getChangeCourtModal"
               id="getChangeCourtModal"
               value="<?php echo e(url('admin/getChangeCourtModal')); ?>">
        <input type="hidden" name="getCaseImportantModal"
               id="getCaseImportantModal"
               value="<?php echo e(url('admin/getCaseImportantModal')); ?>">
        <input type="hidden" name="getCourt"
               id="getCourt"
               value="<?php echo e(url('getCourt')); ?>">
        <input type="hidden" name="downloadCaseBoard"
               id="downloadCaseBoard"
               value="<?php echo e(url('admin/downloadCaseBoard')); ?>">
        <input type="hidden" name="printCaseBoard"
               id="printCaseBoard"
               value="<?php echo e(url('admin/printCaseBoard')); ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
    <script src="<?php echo e(asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashbord/dashbord-datatable.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\resources\views/admin/index.blade.php ENDPATH**/ ?>