<?php $__env->startSection('page_title', 'Media library'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Media library','lead' => 'Uploaded PDFs and files tracked when you attach them to content.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Media library','lead' => 'Uploaded PDFs and files tracked when you attach them to content.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb19cb35a534439097b02b8af91726ee)): ?>
<?php $attributes = $__attributesOriginalcb19cb35a534439097b02b8af91726ee; ?>
<?php unset($__attributesOriginalcb19cb35a534439097b02b8af91726ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb19cb35a534439097b02b8af91726ee)): ?>
<?php $component = $__componentOriginalcb19cb35a534439097b02b8af91726ee; ?>
<?php unset($__componentOriginalcb19cb35a534439097b02b8af91726ee); ?>
<?php endif; ?>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Filename</th><th>Type</th><th>Size</th><th>Collection</th><th>Uploaded</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="font-medium text-slate-900"><?php echo e($file->filename); ?></td>
                            <td><span class="admin-badge-neutral"><?php echo e($file->mime_type); ?></span></td>
                            <td class="text-slate-600"><?php echo e(number_format($file->size_bytes / 1024, 1)); ?> KB</td>
                            <td><?php echo e($file->collection ?: '—'); ?></td>
                            <td class="text-slate-500"><?php echo e($file->created_at->format('d M Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5"><div class="admin-empty m-4">No media uploaded yet. Files appear here when attached to resources or test papers.</div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($media->hasPages()): ?>
            <div class="border-t border-slate-100 px-4 py-3"><?php echo e($media->links()); ?></div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/media/index.blade.php ENDPATH**/ ?>