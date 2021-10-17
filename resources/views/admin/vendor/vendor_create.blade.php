@extends('admin.layout.app')
@section('title','Vendor Create')
@section('content')
    @component('component.heading' , [
        'page_title' => 'Add Vendor',
        'action' => route('vendor.index') ,
        'text' => 'Back'
         ])
    @endcomponent
    <br><br><br>
    <div class="row">
        <form id="add_vendor" name="add_vendor" role="form" method="POST" action="{{route('vendor.store')}}"
              enctype="multipart/form-data">
            @csrf()
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('component.error')
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="company_name">Company Name <span class="text-danger"></span></label>
                                <input type="text" placeholder="enter company name" class="form-control"
                                       name="company_name"
                                       id="company_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="f_name">First Name <span class="text-danger"></span></label>
                                <input type="text" placeholder="enter vendor's first name" class="form-control"
                                       id="f_name" name="f_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="l_name">Last Name <span class="text-danger"></span></label>
                                <input type="text" placeholder="enter vendor's last name" class="form-control"
                                       id="l_name" name="l_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="email">Email Address <span class="text-danger"></span></label>
                                <input type="email" placeholder="enter vendor's email address" class="form-control"
                                       id="email" name="email">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter vendor's mobile number" class="form-control"
                                       id="mobile" name="mobile"
                                       data-rule-required="true"
                                       data-rule-number="true"
                                       data-msg-required="Mobile number is required"
                                       data-rule-minlength="10"
                                       data-rule-maxlength="10">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="alternate_no">Company Landline Number<span
                                        class="text-danger"></span></label>
                                <input type="text" placeholder="enter company landline number" class="form-control"
                                       id="alternate_no"
                                       name="alternate_no"
                                       data-rule-required="false"
                                       data-rule-number="true"
                                       data-rule-minlength="10"
                                       data-rule-maxlength="10">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="address">Company Address <span class="text-danger">*</span></label>
                                <input type="text" placeholder="enter company address" class="form-control" id="address"
                                       name="address"
                                       data-rule-required="true" data-msg-required="Company address is required">
                            </div>
                            <div class="col-md-4 form-group"><br>
                                <label for="country">Country <span class="text-danger">*</span></label>
                                <select class="form-control select-change country-select2" data-rule-required="true"
                                        data-msg-required=" Please select country" name="country"
                                        id="country"
                                        data-url="{{ route('get.country') }}"
                                        data-clear="#city_id,#state"
                                >
                                    <option value=""> select country</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group"><br>
                                <label for="state">District <span class="text-danger">*</span></label>
                                <select id="state" name="state"
                                        data-url="{{ route('get.state') }}"
                                        data-target="#country"
                                        data-clear="#city_id"
                                        class="form-control state-select2 select-change" data-rule-required="true"
                                        data-msg-required=" Please select district">
                                    <option value=""> select district</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group"><br>
                                <label for="city">City <span class="text-danger">*</span></label>
                                <select id="city_id" name="city_id"
                                        data-url="{{ route('get.city') }}"
                                        data-target="#state"
                                        class="form-control city-select2" data-rule-required="true"
                                        data-msg-required=" Please select city">
                                    <option value=""> select city</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group"><br>
                                <label for="gst">Company GSTIN Number </label>
                                <input type="text" placeholder="enter company gstin number" class="form-control"
                                       id="gst" name="gst">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group"><br>
                                <label for="pan">Company PAN Number</label>
                                <input type="text" placeholder="enter company pan number" class="form-control" id="pan"
                                       name="pan">
                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <br>
                                    <a href="{{ route('vendor.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                                                                     id="show_loader"></i>&nbsp;&nbsp;Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/selectjs.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/vendor.js') }}"></script>
@endpush
