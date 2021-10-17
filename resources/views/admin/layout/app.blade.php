<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta, title, css, scripts, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $image_logo->company_name ?? '' }} | @yield('title')</title>
    <!-- bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script>
        /* csrf-token */
        window.Laravel = @json([
            'csrfToken' => csrf_token(),
        ])
    </script>
    <link href="{{asset('assets/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
          rel="stylesheet">
    <!-- font awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- nprogress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@stack('style')
<!-- bootstrap-progressbar -->
    <link href="{{asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
          rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"
          rel="stylesheet"/>
    <!-- custom theme style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title app-border">
                    <a href="{{url('')}}" class="site_title">
                        <span>{{ $image_logo->company_name ?? '' }}</span></a>
                </div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        @if(Auth::guard('admin')->user())
                            @if(Auth::guard('admin')->user()->profile_img!="")
                                <img alt="" class="img-circle profile_img"
                                     src='{{asset('public/'.config('constants.CLIENT_FOLDER_PATH') .'/'. Auth::guard('admin')->user()->profile_img)}}'>
                            @else
                                <img src="{{asset('public/upload/member.png')}}" class="img-circle profile_img" alt="">
                            @endif
                        @endif
                    </div>
                    <div class="profile_info">
                        <span>Welcome</span>
                        <h2> {{Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
            @include('admin.layout.sidebar')
            <!-- /sidebar menu -->
            </div>
        </div>
        <!-- top navigation -->
    @include('admin.layout.header')
    <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
        <!-- footer content -->
    @include('admin.layout.footer')
    <!-- /footer content -->
    </div>
</div>
<!-- jquery -->
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- fastClick -->
<script src="{{asset('assets/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- nprogress -->
<script src="{{asset('assets/admin/vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- datejs -->
<script src="{{asset('assets/admin/vendors/DateJS/build/date.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('assets/admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/sweetalert2.all.min.js') }}"></script>
<!-- custom theme scripts -->
<script src="{{asset('assets/admin/build/js/custom.js') }}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script
    src="{{asset('assets/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}"></script>
<script src="{{asset('assets/admin/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
    @if(Session::has( 'error' ))
    message.fire({
        type: 'error',
        title: 'Error',
        text: "{!!  session('error')  !!}"
    });
    @php session()->forget('error') @endphp
    @endif
    @if(Session::has('success'))
    message.fire({
        type: 'success',
        title: 'Success',
        text: "{!!  session('success')  !!}"
    });
    @php session()->forget('scueess') @endphp
    @endif
</script>
@stack('js')
</body>
</html>
