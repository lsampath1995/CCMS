<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <?php if ($adminHasPermition->can(['dashboard_list']) == "1"): ?>
                <li><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-tachometer"></i> Dashboard</a>
                </li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['client_list']) == "1"): ?>
                <li><a href="<?php echo e(route('clients.index')); ?>"><i class="fa fa-user-plus"></i> Clients</a></li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['case_list']) == "1"): ?>
                <li><a href="<?php echo e(route('case-running.index')); ?>"><i class="fa fa-gavel"></i> Court Cases</a>
                </li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['task_list']) == "1"): ?>
                <li><a href="<?php echo e(route('tasks.index')); ?>"><i class="fa fa-tasks"></i> Assign Tasks</a></li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['appointment_list']) == "1"): ?>
                <li><a href="<?php echo e(route('appointment.index')); ?>"><i class="fa fa-calendar-plus-o"></i>
                        Appointments</a>
                </li>
            <?php endif; ?>
            <?php if (\Auth::guard('admin')->user()->user_type == "Admin"): ?>
                <li><a><i class="fa fa-users"></i> Team Members<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo e(url('admin/client_user')); ?>"> Members</a></li>
                        <li><a href="<?php echo e(route('role.index')); ?>"> Members Roles</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['service_list']) == "1" || $adminHasPermition->can(['invoice_list']) == "1"): ?>
                <li><a><i class="fa fa-money"></i> Income<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if ($adminHasPermition->can(['service_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/service')); ?>"> Advocate Services</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['invoice_list']) == "1"): ?>
                        <li><a href="<?php echo e(url('admin/invoice')); ?>"> Clients Invoices</a>
                            <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['vendor_list']) == "1"): ?>
                <li><a href="<?php echo e(route('vendor.index')); ?>"><i class="fa fa-user-plus"></i> Vendors</a></li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['expense_type_list']) == "1" || $adminHasPermition->can(['expense_list']) == "1"): ?>
                <li><a><i class="fa fa-money"></i> Expenses<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if ($adminHasPermition->can(['expense_type_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/expense-type')); ?>"> Expense Types</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['expense_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/expense')); ?>">Expenses</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($adminHasPermition->can(['case_type_list']) == "1"
                || $adminHasPermition->can(['court_type_list']) == "1"
                || $adminHasPermition->can(['court_list']) == "1"
                || $adminHasPermition->can(['case_status_list']) == "1"
                || $adminHasPermition->can(['judge_list']) == "1"
                || $adminHasPermition->can(['tax_list']) == "1"
                || $adminHasPermition->can(['general_setting_edit']) == "1"): ?>
                <li><a><i class="fa fa-gear"></i>System Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if ($adminHasPermition->can(['case_type_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/case-type')); ?>">Case Types Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['court_type_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/court-type')); ?>">Court Types Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['court_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/court')); ?>">Courts Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['case_status_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/case-status')); ?>">Case Status Types Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['judge_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/judge')); ?>">Judges Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['tax_list']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/tax')); ?>">Taxes Settings</a></li>
                        <?php endif; ?>
                        <?php if ($adminHasPermition->can(['general_setting_edit']) == "1"): ?>
                            <li><a href="<?php echo e(url('admin/general-setting')); ?>">General Settings</a></li>
                        <?php endif; ?>
                        <?php if (\Auth::guard('admin')->user()->user_type == "Admin"): ?>
                            <li><a href="<?php echo e(url('http://localhost/backupmanager')); ?>">Database & File
                                    Backups</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH E:\Xampp\htdocs\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>
