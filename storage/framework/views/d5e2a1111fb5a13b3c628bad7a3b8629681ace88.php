<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta, title, css, scripts, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($image_logo->company_name ?? ''); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    <!-- bootstrap -->
    <link href="<?php echo e(asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <script>
        /* csrf-token */
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),], 512) ?>
    </script>
    <link
        href="<?php echo e(asset('assets/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')); ?>"
        rel="stylesheet">
    <!-- font awesome -->
    <link href="<?php echo e(asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- nprogress -->
    <link href="<?php echo e(asset('assets/admin/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/vendors/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('style'); ?>
    <!-- bootstrap-progressbar -->
    <link
        href="<?php echo e(asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>"
        rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link
        href="<?php echo e(asset('assets/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')); ?>"
        rel="stylesheet"/>
    <!-- custom theme style -->
    <link href="<?php echo e(asset('assets/admin/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>"
          rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>"
          rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title app-border">
                    <a href="<?php echo e(url('')); ?>" class="site_title">
                        <span><?php echo e($image_logo->company_name ?? ''); ?></span></a>
                </div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <?php if (Auth::guard('admin')->user()): ?>
                            <?php if (Auth::guard('admin')->user()->profile_img != ""): ?>
                                <img alt="" class="img-circle profile_img"
                                     src='<?php echo e(asset('public/' . config('constants.CLIENT_FOLDER_PATH') . '/' . Auth::guard('admin')->user()->profile_img)); ?>'>
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/upload/member.png')); ?>"
                                     class="img-circle profile_img" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="profile_info">
                        <span>Welcome</span>
                        <h2> <?php echo e(Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name); ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
                <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- /sidebar menu -->
            </div>
        </div>
        <!-- top navigation -->
        <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /footer content -->
    </div>
</div>
<!-- jquery -->
<script src="<?php echo e(asset('assets/admin/vendors/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo e(asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- fastClick -->
<script src="<?php echo e(asset('assets/admin/vendors/fastclick/lib/fastclick.js')); ?>"></script>
<!-- nprogress -->
<script src="<?php echo e(asset('assets/admin/vendors/nprogress/nprogress.js')); ?>"></script>
<!-- bootstrap-progressbar -->
<script
    src="<?php echo e(asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
<!-- datejs -->
<script src="<?php echo e(asset('assets/admin/vendors/DateJS/build/date.js')); ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(asset('assets/admin/vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/sweetalert2.all.min.js')); ?>"></script>
<!-- custom theme scripts -->
<script src="<?php echo e(asset('assets/admin/build/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<script
    src="<?php echo e(asset('assets/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/jquery.validate.min.js')); ?>"></script>
<script
    src="<?php echo e(asset('assets/admin/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script>
    <?php if(Session::has('error')): ?>
    message.fire({
        type: 'error',
        title: 'Error',
        text: "<?php echo session('error'); ?>"
    });
    <?php session()->forget('error') ?>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
    message.fire({
        type: 'success',
        title: 'Success',
        text: "<?php echo session('success'); ?>"
    });
    <?php session()->forget('scueess') ?>
    <?php endif; ?>
</script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH E:\Xampp\htdocs\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>
