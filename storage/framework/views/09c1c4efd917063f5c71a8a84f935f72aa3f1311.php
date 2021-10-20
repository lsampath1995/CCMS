<?php if(count($errors) > 0): ?>
    <div class="col-12">
        <div class="form-group">
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong class="mb-1"><?php echo e($error); ?><br></strong>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH E:\Xampp\htdocs\resources\views/component/error.blade.php ENDPATH**/ ?>