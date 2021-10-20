<div class="page-title">
    <?php if (isset($page_title)): ?>
        <div class="title_left">
            <h3><?php echo e($page_title); ?></h3>
        </div>
    <?php endif; ?>
    <div class="title_right">
        <div class="form-group pull-right top_search">
            <?php if (isset($action)): ?>
                <a href="<?php echo e($action); ?>"
                   class="btn btn-primary <?php echo e(isset($permission) && $permission == "1" ? '' : 'hidden'); ?>"><i
                        class="fa fa-plus"></i> <?php echo e($text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH E:\Xampp\htdocs\resources\views/component/heading.blade.php ENDPATH**/ ?>
