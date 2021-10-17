@extends('admin.layout.app')
@section('title','Vendor Account')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Vendor Name : <span>{{$name}}</span></h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{url('admin/vendor')}}" class="btn btn-primary"><i class="fa fa-backward"></i>
                        &nbsp;&nbsp;Back</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="{{ request()->is('admin/vendor/*') ? 'active' : '' }}"><a
                                        href="{{route('vendor.show',$client->id)}}">Vendor Details</a>
                                </li>
                                @if($adminHasPermition->can(['expense_list']))
                                    <li role="presentation"
                                        class="{{ request()->is('admin/expense-account-list/*') ? 'active' : '' }}"><a
                                            href="{{url('admin/expense-account-list/'.$client->id)}}">Payments</a>
                                    </li>
                                @endif
                            </ul>
                            <br><br>
                            <div id="myTabContent" class="tab-content">
                                <table id="VendorAccountDatatable" class="table"
                                       data-url="{{ url('admin/expense-filter-list') }}"
                                       data-vendor="{{$client->id}}">
                                    <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th width="15%">Invoice Number</th>
                                        <th width="20%">Vendor Company Name</th>
                                        <th width="10%">Total Amount</th>
                                        <th width="15%">Paid Amount</th>
                                        <th width="15%">Due Amount</th>
                                        <th width="8%">Payment Status</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="load-modal"></div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor/vendor-account-datatable.js') }}"></script>
@endpush
