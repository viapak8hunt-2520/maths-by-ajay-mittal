<?php $__env->startSection('page_title', $course->exists ? 'Edit course' : 'Create course'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => $course->exists ? 'Edit course' : 'Create course','lead' => 'Configure syllabus, SEO and publication settings.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course->exists ? 'Edit course' : 'Create course'),'lead' => 'Configure syllabus, SEO and publication settings.']); ?>
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

    <form method="post" enctype="multipart/form-data" action="<?php echo e($course->exists ? route('admin.courses.update', $course) : route('admin.courses.store')); ?>" class="admin-card max-w-4xl space-y-5">
        <?php echo csrf_field(); ?>
        <?php if($course->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="<?php echo e(old('title', $course->title)); ?>" required></div>
            <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="<?php echo e(old('slug', $course->slug)); ?>"></div>
            <div><label class="admin-label">Category</label><select class="admin-select" name="course_category_id" required><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($cat->id); ?>" <?php if(old('course_category_id', $course->course_category_id)==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->title); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div><label class="admin-label">Status</label><select class="admin-select" name="status" required><?php $__currentLoopData = \App\Enums\PublicationStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->value); ?>" <?php if(old('status', $course->status?->value)===$s->value): echo 'selected'; endif; ?>><?php echo e($s->label()); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        </div>

        <div><label class="admin-label">Short description</label><textarea class="admin-textarea" rows="2" name="short_description"><?php echo e(old('short_description', $course->short_description)); ?></textarea></div>
        <div><label class="admin-label">Full description</label><textarea class="admin-textarea" rows="4" name="full_description"><?php echo e(old('full_description', $course->full_description)); ?></textarea></div>

        <div class="admin-form-actions">
            <?php if($course->exists): ?>
                <a class="admin-btn-secondary" href="<?php echo e(route('courses.show', $course->slug).'?preview=1'); ?>" target="_blank">Preview public page</a>
            <?php endif; ?>
            <button class="admin-btn-primary" type="submit">Save course</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/courses/form.blade.php ENDPATH**/ ?>