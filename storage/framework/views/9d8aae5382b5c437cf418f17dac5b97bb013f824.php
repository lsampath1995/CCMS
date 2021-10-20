<<<<<<< HEAD
<?php $__env->startSection('title', 'Client'); ?>
<?php $__env->startSection('content'); ?>
<div class="">
    <?php $__env->startComponent('component.heading', [
        'page_title' => 'Clients List',
        'action' => route('clients.create'),
        'text' => 'Add Client',
        'permission' => $adminHasPermition->can(['client_add'])
            =======
<?php $__env->startSection('title', 'Client'); ?>
    <?php $__env->startSection('content'); ?>
    <div class="">
        <?php $__env->startComponent('component.heading', [
            'page_title' => 'Clients List',
            'action' => route('clients.create'),
            'text' => 'Add Client',
            'permission' => $adminHasPermition->can(['client_add'])
                >>>>>>> origin / main
        ]); ?>
        <?php echo $__env->renderComponent(); ?>
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="clientDataTable" class="table" data-url="<?php echo e(route('clients.list')); ?>">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Client Name</th>
                                <th width="5%">Mobile Number</th>
                                <th width="5%" data-orderable="false">Number of Cases</th>
                                <th width="5%" data-orderable="false">Enable | Disable</th>
                                <th width="5%" data-orderable="false" class="text-center"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/js/client/client-datatable.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
    <<<<<<< HEAD

    <?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\resources\views/admin/client/client.blade.php ENDPATH**/ ?>
    =======

    <?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\resources\views/admin/client/client.blade.php ENDPATH**/ ?>
    >>>>>>> origin/main
