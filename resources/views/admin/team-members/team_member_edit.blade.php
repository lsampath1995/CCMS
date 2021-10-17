@extends('admin.layout.app')
@section('title','Member Edit')
@push('style')
    <link href="{{ asset('assets/admin/Image-preview/dist/css/bootstrap-imageupload.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/jcropper/css/cropper.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Member</h3>
        </div>
        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{ url('admin/client_user') }}" class="btn btn-primary"><i class="fa fa-backward"></i>&nbsp;&nbsp;Back</a>
            </div>
        </div>
    </div><br><br><br>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('component.error')
            <div class="x_panel">
                <div class="x_content">
                    <form id="add_user" name="add_user" role="form" method="POST" enctype="multipart/form-data"
                          action="{{route('client_user.update',$users->id)}}">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" id="id" name="id" value="{{ $users->id}}">
                        <input type="hidden" id="imagebase64" name="imagebase64">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="imageupload">
                                            <div class="file-tab">
                                                @if($users->profile_img!='')
                                                    <img id="crop_image"
                                                         src='{{asset('public/'.config('constants.CLIENT_FOLDER_PATH') .'/'. $users->profile_img)}}'
                                                         width='100px' height='100px'
                                                         class="crop_image_img"
                                                    >
                                                    <br>
                                                    <label id="remove_crop">
                                                        <input type="checkbox" value="Yes" name="is_remove_image"
                                                               id="is_remove_image">&nbsp;Remove feature image</label>
                                                @else
                                                    <img id="demo_profile" src="{{asset('public/upload/profile1.png')}}"
                                                         width='100px' height='100px'
                                                         class="demo_profile"
                                                    >
                                                @endif
                                                <div id="upload-demo" class="upload-demo-img"></div>
                                                <br>
                                                <label class="btn btn-link btn-file">
                                        <span class="fa fa-upload text-center font-15"><span
                                                class="set-profile-picture"> &nbsp; Set Profile Picture</span>
                                        </span>
                                                    <!-- The file is stored here. -->
                                                    <input type="file" id="upload" name="image" data-src="">
                                                </label>
                                                <button type="button" class="btn btn-default" id="cancel_img">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="f_name">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="f_name" name="f_name"
                                               placeholder="enter member first name" class="form-control"
                                               value="{{ $users->first_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" id="l_name" name="l_name" class="form-control"
                                               placeholder="enter member last name"
                                               value="{{ $users->last_name}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6"><br>
                                        <label for="email">Email Address <span class="text-danger">*</span></label>
                                        <input type="text" id="email" name="email" class="form-control"
                                               placeholder="enter member email address"
                                               value="{{ $users->email}}" readonly="">
                                    </div>
                                    <div class="col-md-6"><br>
                                        <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" maxlength="10"
                                               placeholder="enter member mobile number"
                                               value="{{ $users->mobile}}" readonly="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-9"><br>
                                        <label for="address">Permanent Home Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="address" name="address" class="form-control"
                                               placeholder="enter member permanent home address"
                                               value="{{ $users->address}}">
                                    </div>
                                    <div class="col-md-3"><br>
                                        <label for="zipcode">Zip Code <span class="text-danger">*</span></label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control"
                                               placeholder="enter member zip code"
                                               maxlength="" value="{{ $users->zipcode}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4"><br>
                                        <label for="country">Country <span class="text-danger">*</span></label>
                                        <select class="form-control select-change country-select2 selct2-width-100"
                                                name="country" id="country"
                                                data-url="{{ route('get.country') }}"
                                                data-clear="#city_id,#state"
                                        >
                                            <option value=""> select country</option>
                                            @if ($users->country)
                                                <option value="{{ $users->country->id }}"
                                                        selected>{{ $users->country->name }}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4"><br>
                                        <label for="state">District <span class="text-danger">*</span></label>
                                        <select id="state" name="state"
                                                data-url="{{ route('get.state') }}"
                                                data-target="#country"
                                                data-clear="#city_id"
                                                class="form-control state-select2 select-change">
                                            <option value=""> select district</option>
                                            @if ($users->state)
                                                <option value="{{ $users->state->id }}"
                                                        selected>{{ $users->state->name }}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4"><br>
                                        <label for="city">City <span class="text-danger">*</span></label>
                                        <select id="city_id" name="city_id"
                                                data-url="{{ route('get.city') }}"
                                                data-target="#state"
                                                class="form-control city-select2">
                                            <option value=""> select city</option>
                                            @if($users->city)
                                                <option value="{{ $users->city->id }}"
                                                        selected>{{ $users->city->name }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4"><br>
                                        <label for="Role">Member Role <span class="text-danger">*</span></label>
                                        <select id="role" name="role" required class="form-control select2">
                                            <option value=""> select member role</option>
                                            @foreach($roles as $roal)
                                                <option
                                                    value="{{ $roal->id}}" {{ ($users->roles->contains($roal->id) ) ? 'selected=""' : '' }}>{{$roal->slug}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="chk_pass" name="chk_pass" value="yes"> Change
                                        Password
                                    </div>
                                </div>
                                <br>
                                <div class="row form-group chk">
                                    <div class="col-md-6">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password" class="form-control"
                                               placeholder="enter new member password"
                                               autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnm_password">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="cnm_password" name="cnm_password"
                                               placeholder="confirm new password"
                                               class="form-control" autocomplete="off">
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12"><br>
                                    <a class="btn btn-danger" href="{{ url('admin/client_user') }}"><i
                                            class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                                    <button type="submit" class="btn btn-success" id="upload-result"><i
                                            class="fa fa-save" id="show_loader"></i>&nbsp;&nbsp;Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">
    <input type="hidden" name="check_user_email_exits"
           id="check_user_email_exits"
           value="{{ url('admin/check_user_email_exits') }}">
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/selectjs.js')}}"></script>
    <script src="{{ asset('assets/admin/jcropper/js/cropper.min.js') }}"></script>
    <script src="{{asset('assets/js/team_member/member-validation_edit.js')}}"></script>
@endpush
