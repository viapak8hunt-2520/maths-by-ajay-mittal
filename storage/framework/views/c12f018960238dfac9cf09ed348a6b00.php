<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo,'breadcrumbs' => [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'About'],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'About'],
])]); ?>
    <?php if (isset($component)) { $__componentOriginal42552989991c33c24e80ac01be089449 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42552989991c33c24e80ac01be089449 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.page-heading','data' => ['title' => $content['hero']['title'],'lead' => $content['hero']['subtitle'],'align' => 'center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.page-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content['hero']['title']),'lead' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content['hero']['subtitle']),'align' => 'center']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal42552989991c33c24e80ac01be089449)): ?>
<?php $attributes = $__attributesOriginal42552989991c33c24e80ac01be089449; ?>
<?php unset($__attributesOriginal42552989991c33c24e80ac01be089449); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal42552989991c33c24e80ac01be089449)): ?>
<?php $component = $__componentOriginal42552989991c33c24e80ac01be089449; ?>
<?php unset($__componentOriginal42552989991c33c24e80ac01be089449); ?>
<?php endif; ?>

    <section class="container-page max-w-3xl space-y-8 pb-14">
        <?php $__currentLoopData = $content['sections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="card">
                <h2 class="font-display text-2xl font-semibold"><?php echo e($section['title']); ?></h2>
                <p class="mt-3 text-sm leading-relaxed text-brand-muted"><?php echo e($section['body']); ?></p>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php if (isset($component)) { $__componentOriginalffe0f88f5abf17952ba963f72e276dfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffe0f88f5abf17952ba963f72e276dfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.contact-cta','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.contact-cta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalffe0f88f5abf17952ba963f72e276dfd)): ?>
<?php $attributes = $__attributesOriginalffe0f88f5abf17952ba963f72e276dfd; ?>
<?php unset($__attributesOriginalffe0f88f5abf17952ba963f72e276dfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffe0f88f5abf17952ba963f72e276dfd)): ?>
<?php $component = $__componentOriginalffe0f88f5abf17952ba963f72e276dfd; ?>
<?php unset($__componentOriginalffe0f88f5abf17952ba963f72e276dfd); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/pages/about.blade.php ENDPATH**/ ?>