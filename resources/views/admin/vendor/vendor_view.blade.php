@extends('admin.layout.app')
@section('title','Vendor Detail')
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
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                     aria-labelledby="home-tab">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Vendor Name</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p>
                                                    : @if($client->first_name!=null)  {{ $client->first_name.' '. $client->last_name }} @else {{'N/A'}}@endif </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Mobile Number</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->mobile ?? 'N/A' }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Company GST Number</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->gst ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Country</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->country->name}} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>District</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->state->name }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>City</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->city->name }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Company Name</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p>: {{ $client->company_name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Vendor Email Address </b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->email ?? 'N/A' }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Company Landline Number</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->alternate_no ?? 'N/A' }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Company PAN Number</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->pan ?? 'N/A' }} </p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><b>Company Address</b></p>
                                            </div>
                                            <div class="col-md-7 part">
                                                <p> : {{ $client->address ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <li class="divider"></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.vendor.payment_made')
    @include('admin.vendor.payment_made_history')
@endsection
