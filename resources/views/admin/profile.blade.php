@extends('admin.layout.app')
@section('title','Profile')
@push('style')
    <link href="{{ asset('assets/admin/Image-preview/dist/css/bootstrap-imageupload.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/jcropper/css/cropper.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <br><br><br><br>
    <div class="title_right">
        <div class="form-group pull-right top_search">
            <a href="{{url('admin/dashboard')}}" class="btn btn-primary"><i class="fa fa-backward"></i>&nbsp;&nbsp;Back</a>
        </div>
    </div><br><br><br>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-user"></i>&nbsp&nbspProfile Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation"
                                        class="@if(request()->segment(2)=='admin-profile') active @else @endif"><a
                                            href="{{ url('admin/admin-profile') }}">Profile</a>
                                    </li>
                                    <li role="presentation"
                                        class="@if(request()->segment(3)=='password') active @else @endif"><a
                                            href="{{ url('admin/change/password') }}">Change Password</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_detail"
                                         aria-labelledby="profile">
                                        <form id="add_user" name="add_user" role="form" method="POST"
                                              enctype="multipart/form-data"
                                              action="{{ url('admin/edit-profile')}}">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{ $users->id}}">
                                            <input type="hidden" id="imagebase64" name="imagebase64">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center dimage">
                                                            @if($users->profile_img!='')
                                                                <img id="crop_image"
                                                                     src='{{asset('public/'.config('constants.CLIENT_FOLDER_PATH') .'/'. $users->profile_img)}}'
                                                                     width='100px' height='100px'
                                                                     class="crop_image_profile"
                                                                >
                                                                <div class="contct-info">
                                                                    <label id="remove_crop">
                                                                        <input type="checkbox" value="Yes"
                                                                               name="is_remove_image"
                                                                               id="is_remove_image">&nbsp;Remove profile
                                                                        picture.
                                                                    </label>
                                                                </div>
                                                            @else
                                                                <img id="demo_profile"
                                                                     src='{{asset('public/upload/profile.png')}}'
                                                                     width='100px'
                                                                     height='100px'
                                                                     class="crop_image_profile"
                                                                >
                                                            @endif
                                                            <div class="imageupload">
                                                                <div class="file-tab">
                                                                    <div id="upload-demo" class="upload-demo"></div>
                                                                    <div id="upload-demo-i"></div>
                                                                    <br>
                                                                    <label class="btn btn-link btn-file">
                                                                        <span><i class="fa fa-upload"></i>&nbsp;&nbsp;Set profile picture</span>
                                                                        <!-- The file is stored here. -->
                                                                        <input type="file" id="upload" name="image"
                                                                               data-src="{{ $users->id}}">
                                                                    </label>
                                                                    <button type="button" class="btn btn-default"
                                                                            id="cancel_img">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="f_name">First Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="f_name" name="f_name"
                                                                   placeholder="enter first name" class="form-control"
                                                                   value="{{ $users->first_name}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="last_name">Last Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="l_name" name="l_name"
                                                                   placeholder="enter last name"
                                                                   class="form-control"
                                                                   value="{{ $users->last_name}}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="email">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="email" name="email"
                                                                   placeholder="enter email address"
                                                                   class="form-control" value="{{ $users->email}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="mobile">Mobile No <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="mobile" name="mobile"
                                                                   placeholder="enter your mobile number"
                                                                   class="form-control" maxlength="10"
                                                                   value="{{ $users->mobile}}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    @if(Auth::guard('admin')->user()->user_type=="Admin")
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="email">Registration No <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" id="registration_no"
                                                                       name="registration_no"
                                                                       placeholder="enter your registration number"
                                                                       value="{{ $users->registration_no}}"
                                                                       class="form-control" autocomplete="off">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="mobile">Associated Name <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" id="associated_name"
                                                                       name="associated_name" class="form-control"
                                                                       placeholder="enter associated name"
                                                                       autocomplete="off"
                                                                       value="{{ $users->associated_name}}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <br>
                                                    <div class="row form-group">
                                                        <div class="col-md-9">
                                                            <label for="address">Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="address" name="address"
                                                                   placeholder="enter your address"
                                                                   class="form-control"
                                                                   value="{{ $users->address}}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="zipcode">Zip Code <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" id="zip_code" name="zip_code"
                                                                   placeholder="enter your zip code"
                                                                   class="form-control" maxlength=""
                                                                   value="{{ $users->zipcode}}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="country">Country <span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control select-change country-select2 select2-profile-country"
                                                                name="country" id="country"
                                                                data-url="{{ route('get.country') }}"
                                                                data-clear="#city_id,#state"
                                                            >
                                                                <option value=""> Select Country</option>
                                                                @if ($users->country)
                                                                    <option value="{{ $users->country->id }}"
                                                                            selected>{{ $users->country->name }}</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="state">District <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="state" name="state"
                                                                    data-url="{{ route('get.state') }}"
                                                                    data-target="#country"
                                                                    data-clear="#city_id"
                                                                    class="form-control state-select2 select-change select2-profile-state">
                                                                <option value="">Select District</option>
                                                                @if ($users->state)
                                                                    <option value="{{ $users->state->id }}"
                                                                            selected>{{ $users->state->name }}</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="city">City <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="city_id" name="city_id"
                                                                    data-url="{{ route('get.city') }}"
                                                                    data-target="#state"
                                                                    class="form-control city-select2">
                                                                <option value=""> Select City</option>
                                                                @if($users->city)
                                                                    <option value="{{ $users->city->id }}"
                                                                            selected>{{ $users->city->name }}</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group pull-right">
                                                    <div class="col-md-12 col-sm-6 col-xs-12"><br>
                                                        <input type="hidden" name="route-exist-check"
                                                               id="route-exist-check"
                                                               value="{{ url('admin/check_user_email_exits') }}">
                                                        <input type="hidden" name="token-value"
                                                               id="token-value"
                                                               value="{{csrf_token()}}">
                                                        <a href="{{ route('dashboard.index') }}" class="btn btn-danger"><i
                                                                class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                                                        <button type="submit" class="btn btn-success"
                                                                id="upload-result" name="save"><i class="fa fa-save"
                                                                                                  id="show_loader"></i>&nbsp;&nbsp;Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/selectjs.js')}}"></script>
    <script src="{{ asset('assets/admin/jcropper/js/cropper.min.js') }}"></script>
    <script src="{{asset('assets/js/profile/image-crop.js')}}"></script>
    <script src="{{asset('assets/js/profile/profile-validation.js')}}"></script>
    <script src="{{asset('assets/js/profile/change-password-validation.js')}}"></script>
@endpush
