<div class="x_title">
    <h2><i class="fa fa-gavel"></i>&nbsp;&nbsp;Case Details</h2>
    <ul class="nav navbar-right panel_toolbox">
        <li>
            <a class="card-header-color" href="<?php echo e(url('admin/case-running-download/'.$case->case_id.'/download')); ?>"
               title="Download case file"><i class="fa fa-download fa-2x "></i></a>
        </li>
        <li>
            <a class="card-header-color" href="<?php echo e(url('admin/case-running-download/'.$case->case_id.'/print')); ?>"
               title="Print case file" target="_blank"><i class="fa fa-print fa-2x"></i></a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div><br>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="<?php if(Request::segment(2)=='case-running'): ?>active @ else <?php endif; ?>"><a
                href="<?php echo e(route('case-running.show',$case->case_id)); ?>">Details</a>
        </li>
        <li role="presentation" class="<?php if(Request::segment(4)=='histroy'): ?>active @ else <?php endif; ?>"><a
                href="<?php echo e(url( 'admin/case-history/'.$case->case_id)); ?>">History</a>
        </li>
        <li role="presentation" class="<?php if(Request::segment(4)=='transfer'): ?>active @ else <?php endif; ?>"><a
                href="<?php echo e(url('admin/case-transfer/'.$case->case_id)); ?>">Transfer</a>
        </li>
        <?php if($adminHasPermition->can(['case_edit']) =="1"): ?>
            <li role="presentation" class="pull-right udt-nd"><a href="javascript:void(0);"
                                                                 onClick="nextDateAdd(<?php echo e($case->case_id); ?>);"><i
                        class="fa fa-calendar"></i> Update Next Date</a>
            </li>
        <?php else: ?>
            <li role="presentation" class="pull-right udt-nd"><a href="javascript:void(0);"><i
                        class="fa fa-calendar"></i> Update Next Date</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH E:\Xampp\htdocs\resources\views/admin/case/view/card_header.blade.php ENDPATH**/ ?>