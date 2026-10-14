<?php $__env->startSection('page_title', $resource->exists ? 'Edit resource' : 'Create resource'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => $resource->exists ? 'Edit resource' : 'Create resource','lead' => 'Upload a PDF and link it to a course for the public library.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resource->exists ? 'Edit resource' : 'Create resource'),'lead' => 'Upload a PDF and link it to a course for the public library.']); ?>
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

    <form method="post" enctype="multipart/form-data" action="<?php echo e($resource->exists ? route('admin.resources.update', $resource) : route('admin.resources.store')); ?>" class="admin-card max-w-3xl space-y-4">
        <?php echo csrf_field(); ?>
        <?php if($resource->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="<?php echo e(old('title', $resource->title)); ?>" required></div>
            <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="<?php echo e(old('slug', $resource->slug)); ?>"></div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Type</label><select class="admin-select" name="resource_type"><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php if(old('resource_type', $resource->resource_type) === $key): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div><label class="admin-label">Course</label><select class="admin-select" name="course_id"><option value="">—</option><?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($course->id); ?>" <?php if(old('course_id', $resource->course_id) == $course->id): echo 'selected'; endif; ?>><?php echo e($course->title); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        </div>
        <div><label class="admin-label">Short description</label><textarea class="admin-textarea" name="short_description" rows="3"><?php echo e(old('short_description', $resource->short_description)); ?></textarea></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Class</label><input class="admin-input" name="class_level" value="<?php echo e(old('class_level', $resource->class_level)); ?>"></div>
            <div><label class="admin-label">Subject</label><input class="admin-input" name="subject" value="<?php echo e(old('subject', $resource->subject)); ?>"></div>
        </div>
        <div><label class="admin-label">Chapter label</label><input class="admin-input" name="chapter_label" value="<?php echo e(old('chapter_label', $resource->chapter_label)); ?>"></div>
        <div>
            <label class="admin-label">PDF file</label>
            <input class="admin-file-input" type="file" name="file" accept="application/pdf">
            <?php if($resource->file_path): ?>
                <p class="mt-2 text-xs text-slate-500">Current: <?php echo e($resource->file_path); ?></p>
            <?php endif; ?>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Status</label><select class="admin-select" name="status"><?php $__currentLoopData = \App\Enums\PublicationStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->value); ?>" <?php if(old('status', $resource->status?->value) === $s->value): echo 'selected'; endif; ?>><?php echo e($s->label()); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="flex items-end pb-1">
                <label class="inline-flex items-center gap-2 text-sm font-medium text-slate-700">
                    <input type="checkbox" class="rounded border-slate-300 text-indigo-600" name="is_featured" value="1" <?php if(old('is_featured', $resource->is_featured)): echo 'checked'; endif; ?>> Featured on library
                </label>
            </div>
        </div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save resource</button></div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/resources/form.blade.php ENDPATH**/ ?>