@extends('admin.layout.app')
@section('title','Office Settings')
@push('style')
@endpush
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Office Details</h3>
        </div>
        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{url('admin/dashboard')}}" class="btn btn-primary"><i class="fa fa-backward"></i>
                    &nbsp;&nbsp;Back</a>
            </div>
        </div>
    </div><br><br><br>
    <div class="clearfix"></div>
    <form id="mail_setup" name="mail_setup" role="form" method="POST"
          action="{{ route('general-setting.update',$GeneralSettings->id) }}" enctype="multipart/form-data"
          autocomplete="off">
        @csrf()
        <input type="hidden" name="_method" value="PATCH">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @include('admin.settings.setting-header')
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="invoice_prefex">Office Name <span class="text-danger">*</span></label>
                                <input type="text" required data-msg-required="Please enter company name"
                                       placeholder="enter office name"
                                       class="form-control" id="cmp_name" name="cmp_name"
                                       value="{{ $GeneralSettings->company_name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">Office Address <span class="text-danger">*</span></label>
                                <input type="text" data-msg-required="Please enter address"
                                       placeholder="enter office address"
                                       class="form-control" id="address" name="address" required
                                       value="{{ $GeneralSettings->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">Country <span class="text-danger">*</span></label>
                                <select data-msg-required="Please select country" required=""
                                        class="form-control select-change country-select2 selct2-width-100"
                                        name="country" id="country"
                                        data-url="{{ route('get.country') }}"
                                        data-clear="#city_id,#state"
                                >
                                    <option value=""> select country</option>
                                    @foreach ($countrys as $country)
                                        <option
                                            value="{{ $country->id }}" {{$GeneralSettings->country== $country->id ? 'selected' : '' }}
                                        >{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">District <span class="text-danger">*</span></label>
                                <select data-msg-required="Please select district" required="" id="state" name="state"
                                        data-url="{{ route('get.state') }}"
                                        data-target="#country"
                                        data-clear="#city_id"
                                        class="form-control state-select2 select-change">
                                    <option value=""> select district</option>
                                    @foreach ($states as $state)
                                        <option
                                            value="{{ $state->id }}" {{$GeneralSettings->state== $state->id ? 'selected' : '' }}
                                        >{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">City <span class="text-danger">*</span></label>
                                <select data-msg-required="Please select city" required="" id="city_id" name="city_id"
                                        data-url="{{ route('get.city') }}"
                                        data-target="#state"
                                        class="form-control city-select2">
                                    <option value=""> select city</option>
                                    @foreach ($citys as $city)
                                        <option
                                            value="{{ $city->id }}" {{$GeneralSettings->city== $city->id ? 'selected' : '' }}
                                        >{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">Postal Code <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter postal code"
                                       data-msg-required="Please enter postal code"
                                       class="form-control" id="pincode" name="pincode" required
                                       value="{{ $GeneralSettings->pincode }}">
                            </div>
                            <div class="form-group pull-right"><br><br><br><br><br>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger"><i
                                            class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                                    <button type="submit" class="btn btn-success" name="btn_add_smtp"><i
                                            class="fa fa-save"
                                            id="show_loader"></i>&nbsp;&nbsp;Save
                                    </button>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/selectjs.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.checkImageSize.js')}}"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script src="{{asset('assets/js/settings/general-setting-validation.js')}}"></script>
@endpush
