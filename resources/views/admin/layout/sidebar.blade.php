<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            @if($adminHasPermition->can(['dashboard_list'])=="1")
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            @endif
            @if($adminHasPermition->can(['client_list']) =="1")
                <li><a href="{{ route('clients.index') }}"><i class="fa fa-user-plus"></i> Clients</a></li>
            @endif
            @if($adminHasPermition->can(['case_list']) =="1")
                <li><a href="{{ route('case-running.index') }}"><i class="fa fa-gavel"></i> Court Cases</a></li>
            @endif
            @if($adminHasPermition->can(['task_list']) =="1")
                <li><a href="{{ route('tasks.index') }}"><i class="fa fa-tasks"></i> Assign Tasks</a></li>
            @endif
            @if($adminHasPermition->can(['appointment_list']) =="1")
                <li><a href="{{ route('appointment.index') }}"><i class="fa fa-calendar-plus-o"></i> Appointments</a>
                </li>
            @endif
            @if(\Auth::guard('admin')->user()->user_type=="Admin")
                <li><a><i class="fa fa-users"></i> Team Members<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('admin/client_user') }}"> Members</a></li>
                        <li><a href="{{ route('role.index') }}"> Members Roles</a></li>
                    </ul>
                </li>
            @endif
            @if($adminHasPermition->can(['service_list']) == "1" || $adminHasPermition->can(['invoice_list'])=="1")
                <li><a><i class="fa fa-money"></i> Income<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if($adminHasPermition->can(['service_list']) == "1")
                            <li><a href="{{ url('admin/service') }}"> Advocate Services</a></li>
                        @endif
                        @if($adminHasPermition->can(['invoice_list']) == "1")
                            <li><a href="{{ url('admin/invoice') }}"> Clients Invoices</a>
                        @endif
                    </ul>
                </li>
            @endif
            @if($adminHasPermition->can(['vendor_list']) =="1")
                <li><a href="{{ route('vendor.index') }}"><i class="fa fa-user-plus"></i> Vendors</a></li>
            @endif
            @if($adminHasPermition->can(['expense_type_list'])=="1" || $adminHasPermition->can(['expense_list'])=="1")
                <li><a><i class="fa fa-money"></i> Expenses<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if($adminHasPermition->can(['expense_type_list']) =="1")
                            <li><a href="{{ url('admin/expense-type') }}"> Expense Types</a></li>
                        @endif
                        @if($adminHasPermition->can(['expense_list']) =="1")
                            <li><a href="{{ url('admin/expense') }}">Expenses</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if($adminHasPermition->can(['case_type_list'])=="1"
            || $adminHasPermition->can(['court_type_list'])=="1"
            || $adminHasPermition->can(['court_list'])=="1"
            || $adminHasPermition->can(['case_status_list'])=="1"
            || $adminHasPermition->can(['judge_list'])=="1"
            || $adminHasPermition->can(['tax_list'])=="1"
            || $adminHasPermition->can(['general_setting_edit'])=="1")
                <li><a><i class="fa fa-gear"></i>System Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if($adminHasPermition->can(['case_type_list']) == "1")
                            <li><a href="{{ url('admin/case-type') }}">Case Types Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['court_type_list']) == "1")
                            <li><a href="{{ url('admin/court-type') }}">Court Types Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['court_list']) == "1")
                            <li><a href="{{ url('admin/court') }}">Courts Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['case_status_list']) == "1")
                            <li><a href="{{ url('admin/case-status') }}">Case Status Types Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['judge_list']) == "1")
                            <li><a href="{{ url('admin/judge') }}">Judges Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['tax_list']) == "1")
                            <li><a href="{{ url('admin/tax') }}">Taxes Settings</a></li>
                        @endif
                        @if($adminHasPermition->can(['general_setting_edit']) == "1")
                            <li><a href="{{ url('admin/general-setting') }}">General Settings</a></li>
                        @endif
                        @if(\Auth::guard('admin')->user()->user_type=="Admin")
                            <li><a href="{{ url('http://localhost/backupmanager') }}">Database & File Backups</a></li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
