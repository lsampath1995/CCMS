<ul class="nav navbar-right panel_toolbox">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i
                class="fa fa-ellipsis-h" style="font-size: 19px;"></i></a>
        <ul class="dropdown-menu" role="menu">
            <?php if(isset($view_modal)): ?>
                <li><a data-target-modal="<?php echo e($view_modal->get('target')); ?>"
                       data-id=<?php echo e($view_modal->get('id')); ?>

                           data-url="<?php echo e($view_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       href="<?php echo e($view_modal->get('action' , 'javaqscrip:void(0)')); ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;View</a>
                </li>
            <?php endif; ?>
            <?php if(isset($permission)): ?>
                <li><a href="<?php echo e($permission ?? 'javascrip:void(0)'); ?>"><i
                            class="fa fa-key"></i>&nbsp;&nbsp;Permission</a></li>
            <?php endif; ?>
            <?php if(isset($view)): ?>
                <li><a href="<?php echo e($view ?? 'javascrip:void(0)'); ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;View</a></li>
            <?php endif; ?>
            <?php if(isset($edit)): ?>
                <li class="<?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>"><a
                        href="<?php echo e($edit ?? 'javascrip:void(0)'); ?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a></li>
            <?php endif; ?>
            <?php if(isset($download)): ?>
                <li class=""><a href="<?php echo e($download ?? 'javascrip:void(0)'); ?>"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a>
                </li>
            <?php endif; ?>
            <?php if(isset($restore)): ?>
                <li class=""><a href="<?php echo e($restore ?? 'javascrip:void(0)'); ?>"><i class="fa fa-undo"></i>&nbsp;&nbsp;Restore</a>
                </li>
            <?php endif; ?>
            <?php if(isset($print)): ?>
                <li class="divider"></li>
                <li><a target="_blank" href="<?php echo e($print); ?>"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</a></li>
            <?php endif; ?>
            <?php if(isset($email)): ?>
                <li><a href="#"><i class="fa fa-envelope "></i>&nbsp;&nbsp;Email</a></li>
                <li class="divider"></li>
            <?php endif; ?>
            <?php if(isset($payment_recevie_modal)): ?>
                <li class="<?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>">
                    <a class="call-model " data-url="<?php echo e($payment_recevie_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-id=<?php echo e($payment_recevie_modal->get('id')); ?>

                           href="<?php echo e($payment_recevie_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-target-modal="<?php echo e($payment_recevie_modal->get('target')); ?>"><i class="fa fa-money"></i>&nbsp;&nbsp;
                        Payment Receive</a></li>
            <?php endif; ?>
            <?php if(isset($payment_histroy_modal)): ?>
                <li>
                    <a class="call-model" data-url="<?php echo e($payment_histroy_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-id=<?php echo e($payment_histroy_modal->get('id')); ?>

                           href="<?php echo e($payment_histroy_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-target-modal="<?php echo e($payment_histroy_modal->get('target')); ?>"><i class="fa fa-history"></i>&nbsp;&nbsp;
                        Payment History</a></li>
            <?php endif; ?>
            <?php if(isset($next_date)): ?>
                <li class="divider"></li>
                <li class="<?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>">
                    <a class="call-model" data-url="<?php echo e($next_date->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-id=<?php echo e($next_date->get('id')); ?>

                           href="<?php echo e($next_date->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-target-modal="<?php echo e($next_date->get('target')); ?>"><i class="fa fa-calendar-plus-o"></i>&nbsp;&nbsp;
                        Next Date</a></li>
            <?php endif; ?>
            <?php if(isset($next_date_case)): ?>
                <li class="divider"></li>
                <li>
                    <?php
                        $next=$next_date_case->get('id');
                    ?>
                    <a class="call-model"
                       onClick='nextDateAdd(<?php echo e($next); ?>);'><i class="fa fa-calendar-plus-o"></i>&nbsp;&nbsp; Next Date</a>
                </li>
            <?php endif; ?>
            <?php if(isset($case_transfer)): ?>
                <li class="divider"></li>
                <li class="<?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>">
                    <?php
                        $transfer_case=$case_transfer->get('id');
                    ?>
                    <a class="call-model"
                       onClick='transfer_case(<?php echo e($transfer_case); ?>);'><i class="fa fa-gavel"></i>&nbsp;&nbsp; Case
                        Transfer</a></li>
            <?php endif; ?>
            <li>
                <?php if(isset($edit_modal)): ?>
                    <a class="dropdown-item f-14 call-model <?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>"
                       data-target-modal="<?php echo e($edit_modal->get('target')); ?>"
                       data-id=<?php echo e($edit_modal->get('id')); ?>

                           data-url="<?php echo e($edit_modal->get('action' , 'javaqscrip:void(0)')); ?>"
                       href="<?php echo e($edit_modal->get('action' , 'javaqscrip:void(0)')); ?>">
                        <i class="fa fa-edit"></i>&nbsp;<span class="">Edit</span>
                    </a>
            <?php endif; ?>
            <?php if(isset($delete)): ?>
                <li class="<?php echo e(isset($delete_permission) &&  $delete_permission=="1" ? '':'hidden'); ?>"><a
                        class="delete-confrim "
                        data-id=<?php echo e($delete->get('id')); ?>  href="<?php echo e($delete->get('action' , 'javaqscrip:void(0)')); ?>"><i
                            class="fa fa-trash "></i>&nbsp;&nbsp;Delete</a>
                </li>
            <?php endif; ?>
            <?php if(isset($payment_made)): ?>
                <li class="divider"></li>
                <li class="<?php echo e(isset($edit_permission) &&  $edit_permission=="1" ? '':'hidden'); ?>">
                    <a class="call-model" data-url="<?php echo e($payment_made->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-id=<?php echo e($payment_made->get('id')); ?>

                           href="<?php echo e($payment_made->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-target-modal="<?php echo e($payment_made->get('target')); ?>"><i class="fa fa-money"></i>&nbsp;&nbsp;
                        Payment Made</a></li>
            <?php endif; ?>
            <?php if(isset($payment_made_history)): ?>
                <li>
                    <a class="call-model"
                       data-url="<?php echo e($payment_made_history->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-id=<?php echo e($payment_made_history->get('id')); ?>

                           href="<?php echo e($payment_made_history->get('action' , 'javaqscrip:void(0)')); ?>"
                       data-target-modal="<?php echo e($payment_made_history->get('target')); ?>"><i class="fa fa-history"></i>&nbsp;&nbsp;
                        Payment Made History</a></li>
            <?php endif; ?>
        </ul>
    </li>
</ul>
<?php /**PATH E:\Xampp\htdocs\resources\views/component/action.blade.php ENDPATH**/ ?>