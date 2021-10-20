<?php $__env->startSection('title', 'Case List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row"><br><br><br><br>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <?php echo $__env->make('admin.case.view.card_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="dashboard-widget-content">
                        <div class="col-md-6 hidden-small">
                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>Case Type :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->caseType); ?></td>
                                </tr>
                                <tr>
                                    <td>Filing No :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->filing_number); ?></td>
                                </tr>
                                <tr>
                                    <td>Filing Date :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e(date($date_format_laravel, strtotime($case->filing_date))); ?></td>
                                </tr>
                                <tr>
                                    <td>Registration No :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->registration_number); ?></td>
                                </tr>
                                <tr>
                                    <td>Registration Date :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e(date($date_format_laravel, strtotime($case->registration_date))); ?></td>
                                </tr>
                                <tr>
                                    <td>CNR Number :</td>
                                    <td class="fs15 fw700 text-right"> <?php echo e($case->cnr_number); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 hidden-small">
                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>First Hearing Date :</td>
                                    <td class="fs15 fw700 text-right s">
                                        <?php echo e(date($date_format_laravel, strtotime($case->first_hearing_date))); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Next Hearing Date :</td>
                                    <?php if ($adminHasPermition->can(['case_edit']) == "1"): ?>
                                        <td class="fs15 fw700 text-right">
                                            <?php echo e(date($date_format_laravel, strtotime($case->next_date))); ?>

                                            &nbsp;<a href="javascript:void(0);"
                                                     onClick="nextDateAdd(<?php echo e($case->case_id); ?>);">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>
                                    <?php else: ?>
                                        <td class="fs15 fw700 text-right">
                                            <?php echo e(date($date_format_laravel, strtotime($case->next_date))); ?>

                                            &nbsp;<a href="javascript:void(0);">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td>Case Status :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->case_status_name); ?></td>
                                </tr>
                                <tr>
                                    <td>Court Number :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->court_no); ?></td>
                                </tr>
                                <tr>
                                    <td>Judge Name :</td>
                                    <td class="fs15 fw700 text-right"><?php echo e($case->judge_name); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30"><i class="fa fa-user"></i>&nbsp;&nbsp;Petitioner & Advocate</h4>
                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td> <?php if (count($petitioner_and_advocate) > 0 && !empty($petitioner_and_advocate)): ?><?php $i = 1; ?><?php $__currentLoopData = $petitioner_and_advocate;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $value): $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <p class="subscri-ti-das"> <?php echo e($i . ') ' . $value['party_name']); ?></p>
                                                <p class="subscri-ti-das"> Advocate
                                                    - <?php echo e($value['party_advocate']); ?> </p>
                                                <?php $i++; ?><?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?><?php endif; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30"><i class="fa fa-user"></i>&nbsp;&nbsp;Respondent & Advocate</h4>
                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>
                                        <?php if (count($respondent_and_advocate) > 0 && !empty($respondent_and_advocate)): ?><?php $i = 1; ?><?php $__currentLoopData = $respondent_and_advocate;
                                            $__env->addLoop($__currentLoopData);
                                            foreach ($__currentLoopData as $value): $__env->incrementLoopIndices();
                                                $loop = $__env->getLastLoop(); ?>
                                                <p class="subscri-ti-das"> <?php echo e($i . ') ' . $value['party_name']); ?></p>
                                                <p class="subscri-ti-das"> Advocate
                                                    - <?php echo e($value['party_advocate']); ?> </p>
                                                <?php $i++; ?><?php endforeach;
                                            $__env->popLoop();
                                            $loop = $__env->getLastLoop(); ?><?php endif; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="load-modal"></div>
    <div class="modal fade" id="modal-next-date" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_next_date">
            </div>
        </div>
    </div>
    <div class="col-xs-12 invoice-header" align="center"><a href="<?php echo e(url('admin/case-running')); ?>"
                                                            class="btn btn-primary"><i class="fa fa-backward"></i>
            &nbsp;&nbsp;Back</a></div>
    <input type="hidden" name="getNextDateModals"
           id="getNextDateModals"
           value="<?php echo e(url('admin/getNextDateModal')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/js/case/case_view_detail.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\resources\views/admin/case/view/view_case_details.blade.php ENDPATH**/ ?>
