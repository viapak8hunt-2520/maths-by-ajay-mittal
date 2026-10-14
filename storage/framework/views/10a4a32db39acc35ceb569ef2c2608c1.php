<?php $__env->startSection('title', 'Courses'); ?>
<?php $__env->startSection('page_title', 'Courses'); ?>
<?php $__env->startSection('page_description', 'Manage programmes, syllabus and publication status'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Course catalogue','lead' => 'Search, filter and edit mathematics programmes shown on the public website.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Course catalogue','lead' => 'Search, filter and edit mathematics programmes shown on the public website.']); ?>
        <a href="<?php echo e(route('admin.courses.create')); ?>" class="admin-btn-primary">New course</a>
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

    <div class="admin-card mb-5">
        <form method="get" class="flex flex-col gap-3 sm:flex-row sm:items-end">
            <div class="flex-1">
                <label class="admin-label">Search</label>
                <input class="admin-input" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search by title…">
            </div>
            <div class="sm:w-48">
                <label class="admin-label">Status</label>
                <select class="admin-select" name="status">
                    <option value="">All statuses</option>
                    <?php $__currentLoopData = \App\Enums\PublicationStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($s->value); ?>" <?php if(request('status') === $s->value): echo 'selected'; endif; ?>><?php echo e($s->label()); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button class="admin-btn-secondary" type="submit">Apply</button>
        </form>
    </div>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Category</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <p class="font-semibold text-slate-900"><?php echo e($course->title); ?></p>
                                <p class="text-xs text-slate-500"><?php echo e($course->slug); ?></p>
                            </td>
                            <td><?php echo e($course->category?->title); ?></td>
                            <td><?php echo e($course->target_class ?: '—'); ?></td>
                            <td><?php echo $__env->make('admin.partials.status-badge', ['status' => $course->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                            <td class="text-slate-500"><?php echo e($course->updated_at->format('d M Y')); ?></td>
                            <td class="text-right whitespace-nowrap">
                                <a class="admin-link mr-3" href="<?php echo e(route('admin.courses.edit', $course)); ?>">Edit</a>
                                <a class="admin-link mr-3" href="<?php echo e(route('admin.courses.chapters.index', $course)); ?>">Chapters</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6"><div class="admin-empty m-4">No courses match your filters.</div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($courses->hasPages()): ?>
            <div class="border-t border-slate-100 px-4 py-3"><?php echo e($courses->links()); ?></div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/courses/index.blade.php ENDPATH**/ ?>