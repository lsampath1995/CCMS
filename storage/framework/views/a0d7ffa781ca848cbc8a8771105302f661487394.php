<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- meta, title, css, scripts, styles, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($image_logo->company_name ?? ''); ?> | Password Recover</title>
    <!-- bootstrap -->
    <link href="<?php echo e(asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- font awesome -->
    <link href="<?php echo e(asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- nprogress -->
    <link href="<?php echo e(asset('assets/admin/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- animate.css -->
    <link href="<?php echo e(asset('assets/admin/vendors/animate.css/animate.min.css')); ?>" rel="stylesheet">
    <!-- custom theme style -->
    <link href="<?php echo e(asset('assets/admin/build/css/custom.min.css')); ?>" rel="stylesheet">
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
                <?php if (session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <form class="form-horizontal" role="form" method="POST"
                      action="<?php echo e(url('/admin/password/email')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <a href="<?php echo e(url('/')); ?>"><img
                            src="<?php echo e(asset('public/upload/logo/logo.png')); ?>"
                            style="margin-bottom: 20px;"></a><br><br><br>
                    <img src="<?php echo e(asset('public/upload/lawyer3.png')); ?>" style="margin-bottom: 20px;">
                    <h2>Recover Your Password</h2><br>
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="form-control" name="email"
                               value="<?php echo e(old('email')); ?>"
                               placeholder="Email">
                        <?php if ($errors->has('email')): ?>
                            <span class="help-block text-left">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Send Mail</button>
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
</body>
</html>
<?php /**PATH E:\Xampp\htdocs\resources\views/admin/auth/passwords/email.blade.php ENDPATH**/ ?>
