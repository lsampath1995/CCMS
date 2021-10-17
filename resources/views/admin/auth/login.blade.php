<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta, title, css, scripts, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $image_logo->company_name ?? '' }} | Login </title>
    <!-- bootstrap -->
    <link href="{{URL::asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- font awesome -->
    <link href="{{URL::asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- nprogress -->
    <link href="{{URL::asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{URL::asset('assets/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- custom theme style -->
    <link href="{{URL::asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
    <script>
        /* csrf-token */
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]);?>
    </script>
    <style type="text/css">
        /* login button hover style */
        .login_content_btn a:hover {
            text-decoration: none;
        }

        /* body background style */
        body {
            background-image: url("public/upload/backgrounds/background1.jpg");
        }
    </style>
</head>
<body class="login" style="background-image: url('public/upload/backgrounds/background1.jpg');">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                {{ csrf_field() }}
                <!-- system logo -->
                    <a href="{{ url('/') }}"><img src="{{ asset('public/upload/logo.png') }}"
                                                  style="margin-bottom: 50px;"></a><br><br>
                    <!-- profile picture -->
                    <img src="{{ asset('public/upload/lawyer3.png') }}" style="margin-bottom: 20px;">
                    <h2>System Login</h2><br>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               autofocus placeholder="Username (email)">
                        @if ($errors->has('email'))
                            <span class="help-block text-left">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" autocomplete="off"
                               placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block text-left">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" name="login" class="btn btn-default">Log In</button>
                        <a class="reset_pass" id="reset" href="{{ url('/admin/password/reset') }}">Forgot Password?</a>
                    </div>
                    <br>
                    <div class="separator"><br/>
                        <div>
                            <p>cms | © 2021 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<!-- jquery -->
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">
    <!-- login form validation script -->
    $(document).ready(function () {
        "use strict";
        $(".fill-login").click(function () {
            $("#email").val($(this).data("email"));
            $("#password").val($(this).data("password"));
        });
    });
</script>
</body>
</html>
