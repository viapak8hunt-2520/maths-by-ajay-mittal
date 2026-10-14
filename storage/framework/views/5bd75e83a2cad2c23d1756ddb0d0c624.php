<?php $__env->startSection('page_title', 'Test papers'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Test papers','lead' => 'Question papers and answer keys for download on the site.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Test papers','lead' => 'Question papers and answer keys for download on the site.']); ?>
        <a href="<?php echo e(route('admin.test-papers.create')); ?>" class="admin-btn-primary">Add test paper</a>
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
                <thead><tr><th>Title</th><th>Type</th><th>Files</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $testPapers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="font-semibold"><?php echo e($paper->title); ?></td>
                            <td><span class="admin-badge-neutral"><?php echo e($paper->paper_type); ?></span></td>
                            <td class="text-slate-600">
                                <?php if($paper->question_paper_path): ?><span class="admin-badge-info mr-1">Q</span><?php endif; ?>
                                <?php if($paper->answer_key_path): ?><span class="admin-badge-success">A</span><?php endif; ?>
                                <?php if(! $paper->question_paper_path && ! $paper->answer_key_path): ?>—<?php endif; ?>
                            </td>
                            <td><?php echo $__env->make('admin.partials.status-badge', ['status' => $paper->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                            <td class="text-right"><a class="admin-link" href="<?php echo e(route('admin.test-papers.edit', $paper)); ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5"><div class="admin-empty m-4">No test papers yet.</div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($testPapers->hasPages()): ?>
            <div class="border-t border-slate-100 px-4 py-3"><?php echo e($testPapers->links()); ?></div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/test-papers/index.blade.php ENDPATH**/ ?>