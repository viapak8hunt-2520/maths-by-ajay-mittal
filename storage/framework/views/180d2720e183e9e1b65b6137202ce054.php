<?php $__env->startSection('page_title', 'Website content'); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $h = fn (string $path, mixed $default = '') => old('homepage.'.$path, data_get($homepage, $path, $default));
        $a = fn (string $path, mixed $default = '') => old('about.'.$path, data_get($about, $path, $default));
        $c = fn (string $path, mixed $default = '') => old('contact.'.$path, data_get($contact, $path, $default));
        $s = fn (string $key, mixed $default = '') => old("social.{$key}", data_get($social, $key, $default));
        $f = fn (string $key, mixed $default = '') => old("faqs.{$key}", data_get($faqsMeta, $key, $default));
    ?>

    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Website content','lead' => 'Edit text shown on the homepage, about page, contact details and FAQ heading — saved to the database and used on the public site.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Website content','lead' => 'Edit text shown on the homepage, about page, contact details and FAQ heading — saved to the database and used on the public site.']); ?>
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

    <?php if($errors->any()): ?>
        <div class="admin-alert-error mb-4">
            <p class="font-semibold">Please fix the highlighted fields:</p>
            <ul class="mt-2 list-disc pl-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('admin.site-content.update')); ?>" class="admin-card w-full max-w-none" x-data="{ tab: '<?php echo e(old('_tab', 'homepage')); ?>' }">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="_tab" x-model="tab">

        <nav class="admin-tabs" role="tablist">
            <?php $__currentLoopData = [
                'homepage' => 'Homepage',
                'about' => 'About page',
                'contact' => 'Contact & social',
                'faqs' => 'FAQ page',
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" role="tab" class="admin-tab" :class="tab === '<?php echo e($key); ?>' && 'admin-tab-active'" @click="tab = '<?php echo e($key); ?>'"><?php echo e($label); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'homepage'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <?php echo $__env->make('admin.site-content.partials.tab-homepage', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'about'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <?php echo $__env->make('admin.site-content.partials.tab-about', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'contact'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <?php echo $__env->make('admin.site-content.partials.tab-contact', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'faqs'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <?php echo $__env->make('admin.site-content.partials.tab-faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="admin-form-actions mt-8">
            <button class="admin-btn-primary" type="submit">Save website content</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/site-content/edit.blade.php ENDPATH**/ ?>