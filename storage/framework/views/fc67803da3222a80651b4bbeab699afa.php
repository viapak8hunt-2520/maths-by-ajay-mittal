<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo,'breadcrumbs' => [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Results & Testimonials'],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Results & Testimonials'],
])]); ?>
    <?php if (isset($component)) { $__componentOriginal42552989991c33c24e80ac01be089449 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42552989991c33c24e80ac01be089449 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.page-heading','data' => ['title' => 'Results & testimonials','lead' => 'Verified achievements and approved student feedback are published here.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.page-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Results & testimonials','lead' => 'Verified achievements and approved student feedback are published here.']); ?>
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

    <section class="container-page space-y-12 pb-14">
        <div>
            <h2 class="font-display text-2xl font-semibold">Student achievements</h2>
            <?php if(($results['enabled'] ?? false) && ! empty($results['items'])): ?>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <?php $__currentLoopData = $results['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <h3 class="font-semibold"><?php echo e($item['title'] ?? ''); ?></h3>
                            <p class="mt-2 text-sm text-brand-muted"><?php echo e($item['description'] ?? ''); ?></p>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal3607a477fdef7402bc742abad5df9c51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3607a477fdef7402bc742abad5df9c51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.empty-state','data' => ['class' => 'mt-6','title' => 'Results coming soon','message' => $results['intro'] ?? 'Verified results will be added when available.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','title' => 'Results coming soon','message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($results['intro'] ?? 'Verified results will be added when available.')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3607a477fdef7402bc742abad5df9c51)): ?>
<?php $attributes = $__attributesOriginal3607a477fdef7402bc742abad5df9c51; ?>
<?php unset($__attributesOriginal3607a477fdef7402bc742abad5df9c51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3607a477fdef7402bc742abad5df9c51)): ?>
<?php $component = $__componentOriginal3607a477fdef7402bc742abad5df9c51; ?>
<?php unset($__componentOriginal3607a477fdef7402bc742abad5df9c51); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold">Testimonials</h2>
            <?php if(($testimonials['enabled'] ?? false) && ! empty($testimonials['items'])): ?>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <?php $__currentLoopData = $testimonials['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <blockquote class="card">
                            <p class="text-sm text-brand-muted">“<?php echo e($item['quote']); ?>”</p>
                            <footer class="mt-3 text-sm font-semibold"><?php echo e($item['name']); ?></footer>
                        </blockquote>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="mt-4 max-w-2xl text-sm text-brand-muted"><?php echo e($testimonials['intro'] ?? ''); ?></p>
            <?php endif; ?>
        </div>
    </section>
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
<?php /**PATH /var/www/html/resources/views/pages/results.blade.php ENDPATH**/ ?>