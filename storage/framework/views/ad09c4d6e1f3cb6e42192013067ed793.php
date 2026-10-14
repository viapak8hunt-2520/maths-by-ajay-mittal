<?php if(session('success')): ?>
    <div class="admin-alert-success" role="status"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="admin-alert-error" role="alert">
        <p class="font-semibold">Please fix the following:</p>
        <ul class="mt-2 list-disc pl-5">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/admin/partials/flash.blade.php ENDPATH**/ ?>