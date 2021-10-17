<br>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li class="{{ Request::segment(2)=='general-setting' ? 'active' :'' }}" role="presentation"><a
                href="{{ url('admin/general-setting') }}">Office Details</a>
        </li>
        <li class="{{ Request::segment(2)=='date-timezone' ? 'active' :'' }}"
            role="presentation" class=""><a href="{{ url('admin/date-timezone') }}">Date & Timezone</a>
        </li>
        <li class="{{ Request::segment(2)=='mail-setup' ? 'active' :'' }}"
            role="presentation" class=""><a href="{{ url('admin/mail-setup') }}">Mail Setup</a>
        </li>
        <li class="{{ Request::segment(2)=='invoice-setting' ? 'active' :'' }}" role="presentation" class=""><a
                href="{{ url('admin/invoice-setting') }}">Invoice Settings</a>
        </li>
    </ul>
</div>
