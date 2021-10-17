<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- meta, title, css, scripts, styles, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $image_logo->company_name ?? '' }} | Password Reset </title>
    <!-- bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- font awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- nprogress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{asset('assets/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- custom theme style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
    <script>
        /* csrf-token */
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/reset') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <a href="{{ url('/') }}"><img src="{{ asset('public/upload/logo/logo.png') }}"
                                                  style="margin-bottom: 20px;"></a><br><br>
                    <img src="{{ asset('public/upload/lawyer3.png') }}" style="margin-bottom: 20px;">
                    <h2> Reset Your Password</h2><br>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ $email ?? old('email') }}" autofocus placeholder="Registered Email">
                        @if ($errors->has('email'))
                            <span class="help-block text-left">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="New Password" autocomplete="off">
                        @if ($errors->has('password'))
                            <span class="help-block text-left">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password" autocomplete="off">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block text-left">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Reset</button>
                    </div>
                    <br>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br/>
                        <div>
                            <p>cms | © 2021 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
