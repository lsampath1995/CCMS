<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
<form action="<?php echo e(route('backupmanager_create')); ?>" method="post" id="frmNew">
    <?php echo e(csrf_field()); ?>

    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Create New Backup</button>
    <<<<<<< HEAD
    <button type="submit" class="btn btn-warning btn-sm"><a href="<?php echo e(url('http://localhost/')); ?>"><i
                class="fa fa-caret-left"></i> Back</a></button>
    =======
    <button type="submit" class="btn btn-warning btn-sm"><a href="<?php echo e(url('http://localhost/')); ?>"><i
                class="fa fa-caret-left"></i> Back</a></button>
    >>>>>>> origin/main
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form id="frm" action="<?php echo e(route('backupmanager_restore_delete')); ?>" method="post">
    <?php echo csrf_field(); ?>


    <table class="table" style="font-size: 14px; color: #777777;">
        <thead>
        <tr>
            <th style="text-align: center;" width="1">#</th>
            <th>Name</th>
            <th>Date</th>
            <th style="text-align: center;">Type</th>
            <th style="text-align: center;">Download</th>
            <th style="text-align: center;" width="1">Action</th>
        </tr>
        </thead>

        <tbody>
        <<<<<<< HEAD
        <?php $__currentLoopData = $backups;
        $__env->addLoop($__currentLoopData);
        foreach ($__currentLoopData as $index => $backup): $__env->incrementLoopIndices();
            $loop = $__env->getLastLoop(); ?>
            =======
            <?php $__currentLoopData = $backups;
            $__env->addLoop($__currentLoopData);
            foreach ($__currentLoopData as $index => $backup): $__env->incrementLoopIndices();
                $loop = $__env->getLastLoop(); ?>
                >>>>>>> origin/main
                <tr>
                    <td style="text-align: center;"><?php echo e(++$index); ?></td>
                    <td><?php echo e($backup['name']); ?></td>
                    <td class="date"><?php echo e($backup['date']); ?></td>
                    <td style="text-align: center;">
                        <<<<<<< HEAD
                        <span
                            class="col-sm-8 badge badge-<?php echo e($backup['type'] === 'Files' ? 'primary' : 'success'); ?>"><?php echo e($backup['type']); ?></span>
                        =======
                        <span
                            class="col-sm-8 badge badge-<?php echo e($backup['type'] === 'Files' ? 'primary' : 'success'); ?>"><?php echo e($backup['type']); ?></span>
                        >>>>>>> origin/main
                    </td>
                    <td style="text-align: center;">
                        <a href="<?php echo e(route('backupmanager_download', [$backup['name']])); ?>">
                            <i class="fa fa-download btn btn-primary"></i>
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <<<<<<< HEAD
                        <input type="checkbox" name="backups[]" class="chkBackup"
                               value="<?php echo e($backup['name']); ?>">
                    </td>
                </tr>
            <?php endforeach;
            $__env->popLoop();
            $loop = $__env->getLastLoop(); ?>
            =======
            <input type="checkbox" name="backups[]" class="chkBackup" value="<?php echo e($backup['name']); ?>">
            </td>
            </tr>
        <?php endforeach;
        $__env->popLoop();
        $loop = $__env->getLastLoop(); ?>
        >>>>>>> origin/main
        </tbody>
    </table>

    <br><br>

    <<<<<<< HEAD
    <?php if (count($backups)): ?>
    =======
    <?php if (count($backups)): ?>
        >>>>>>> origin/main
        <input type="hidden" name="type" value="restore" id="type">

        <div class="pull-right" style="margin-right: 15px;">
            <button type="submit" id="btnSubmit" class="btn btn-success" disabled="disabled">
                <i class="fa fa-refresh"></i>
                <small><strong>Restore</strong></small>
            </button>
            <button type="submit" id="btnDelete" class="btn btn-danger" disabled="disabled">
                <i class="fa fa-remove"></i>
                <small><strong>Delete</strong></small>
            </button>
        </div>
        <div class="clearfix"></div>
    <?php endif; ?>
</form>
<div id="overlay">
    <div class="spinner"></div>
    <span class="overlay-message">Working, please wait...</span>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    #overlay {
        position: fixed;
        display: none;
        width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999999999;
        }

        #overlay .overlay-message {
            position: fixed;
            left: 50%;
            top: 57%;
            height: 100px;
            width: 250px;
            margin-left: -120px;
            margin-top: -50px;
            color: #fff;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }

        .spinner {
            position: fixed;
            left: 50%;
            top: 40%;
            height: 80px;
            width: 80px;
            margin-left: -40px;
            margin-top: -40px;
            -webkit-animation: rotation .9s infinite linear;
            -moz-animation: rotation .9s infinite linear;
            -o-animation: rotation .9s infinite linear;
            animation: rotation .9s infinite linear;
            border: 6px solid rgba(255, 255, 255, .15);
            border-top-color: rgba(255, 255, 255, .8);
            border-radius: 100%;
        }

        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(359deg);
            }
        }

        @-moz-keyframes rotation {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(359deg);
            }
        }

    @-o-keyframes rotation {
        from {
            -o-transform: rotate(0deg);
        }
        to {
            -o-transform: rotate(359deg);
        }
    }

    <
    <
    <
    <
    <
    <
    <
    HEAD

    @keyframes rotation {

    =
    =
    =
    =
    =
    =
    =
    @keyframes rotation {

    >>> >>> > origin

    /
    main
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(359deg);
    }

    }

    table.dataTable tr.group td {
        background-image: radial-gradient(#fff, #eee);
        border: none;
        text-align: center;
        font-weight: bold;
        font-size: 16px;
    }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>

        $('.table').DataTable({
            "order": [],
            "responsive": true,
            "pageLength": 10,
            "autoWidth": false,
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [-1]
                }
            ],
            rowGroup: {
                dataSrc: 2
            }
        });

        var $btnSubmit = $('#btnSubmit');
        var $btnDelete = $('#btnDelete');
        var $type = $('#type');
        var type = 'restore';

        $btnSubmit.on('click', function () {
            $type.val('restore');
            type = 'restore';
        });

        $btnDelete.on('click', function () {
            $type.val('delete');
            type = 'delete';
        });

        $(document).on('click', '.chkBackup', function () {
            var checkedCount = $('.chkBackup:checked').length;

            if (checkedCount > 0) {
                $btnSubmit.attr('disabled', false);
                $btnDelete.attr('disabled', false);
                <
                <
                <
                <
                <
                << HEAD
            } else
                {
                ======
                    =
                }
            else
                {
                >>>>>>>
                    origin / main
                    $btnSubmit.attr('disabled', true);
                    $btnDelete.attr('disabled', true);
                }

                if (this.checked) {
                    $(this).closest('tr').addClass('warning');
                    <
                    <
                    <
                    <
                    <
                    << HEAD
            } else
                    {
                    ======
                        =
                    }
                else
                    {
                    >>>>>>>
                        origin / main
                        $(this).closest('tr').removeClass('warning');
                    }
                }
            )
                ;

                $('#frm').submit(function () {
                    var $this = this;
                    var checkedCount = $('.chkBackup:checked').length;
                    var $btn = $('#btnSubmit');

                    if (!checkedCount) {
                        swal("Please select backup(s) first!");
                        return false;
                    }

                    if (checkedCount > 2 && type === 'restore') {
                        swal("Please select one or two backups max.");
                        return false;
                    }

                    var msg = 'Continue with restoration process ?';

                    if (type === 'delete') {
                        msg = 'Are you sure you want to delete selected backups ?';
                    }

                    swal({
                        title: "Confirm",
                        text: msg,
                        icon: "warning",
                        buttons: true,
                dangerMode: true
                    }).then(function (response) {
                        if (response) {
                            $btn.attr('disabled', true);

                            $this.submit();

                            showOverlay();
                        }
                    });

                    return false;
                });

                $('#frmNew').submit(function () {
                    this.submit();

                    showOverlay();
                });

                function showOverlay() {
                    $('#overlay').show();
                }

                function hideOverlay() {
                    $('#overlay').show();
                }

    </script>
<?php $__env->stopPush(); ?>
<<<<<<< HEAD

<?php echo $__env->make('backupmanager::layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\vendor\sarfraznawaz2005\backupmanager\src/Views/index.blade.php ENDPATH**/ ?>
=======

<?php echo $__env->make('backupmanager::layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\vendor\sarfraznawaz2005\backupmanager\src/Views/index.blade.php ENDPATH**/ ?>
>>>>>>> origin/main
