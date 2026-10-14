<?php
    $typeLabel = config('resources.types')[$resource['type'] ?? ''] ?? 'Resource';
?>

<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo,'breadcrumbs' => [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Study Resources', 'url' => route('resources.index')],
    ['label' => $resource['title']],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Study Resources', 'url' => route('resources.index')],
    ['label' => $resource['title']],
])]); ?>
    <section class="container-page py-10 sm:py-14">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold"><?php echo e($typeLabel); ?></p>
                <h1 class="mt-2 font-display text-3xl font-semibold"><?php echo e($resource['title']); ?></h1>
                <p class="mt-4 text-base leading-relaxed text-brand-muted"><?php echo e($resource['description']); ?></p>

                <dl class="mt-8 grid gap-3 text-sm sm:grid-cols-2">
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Class</dt><dd class="mt-1 font-medium"><?php echo e($resource['class'] ?? '—'); ?></dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Subject</dt><dd class="mt-1 font-medium"><?php echo e($resource['subject'] ?? '—'); ?></dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Chapter</dt><dd class="mt-1 font-medium"><?php echo e($resource['chapter'] ?? '—'); ?></dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Access</dt><dd class="mt-1 font-medium text-brand-success">Free download</dd></div>
                </dl>

                <?php if($course): ?>
                    <p class="mt-6 text-sm">Part of <a href="<?php echo e(route('courses.show', $course['slug'])); ?>" class="font-semibold text-brand-royal hover:underline"><?php echo e($course['title']); ?></a></p>
                <?php endif; ?>

                <?php if($answerKey): ?>
                    <p class="mt-4 text-sm">Answer key: <a href="<?php echo e(route('resources.show', $answerKey['slug'])); ?>" class="font-semibold text-brand-royal hover:underline"><?php echo e($answerKey['title']); ?></a></p>
                <?php endif; ?>
            </div>

            <aside class="card">
                <h2 class="font-display text-lg font-semibold">Download</h2>
                <?php if($fileAvailable): ?>
                    <?php if(! empty($resource['pages'])): ?>
                        <p class="mt-2 text-sm text-brand-muted"><?php echo e($resource['pages']); ?> pages <?php if(!empty($resource['size_kb'])): ?> · ~<?php echo e($resource['size_kb']); ?> KB <?php endif; ?></p>
                    <?php endif; ?>
                    <div class="mt-5 flex flex-col gap-2">
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('resources.download', $resource['slug'])).'','variant' => 'primary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('resources.download', $resource['slug'])).'','variant' => 'primary','class' => 'w-full']); ?>
                            <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'download','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'download','class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56804098dcf376a0e2227cb77b6cd00a)): ?>
<?php $attributes = $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a; ?>
<?php unset($__attributesOriginal56804098dcf376a0e2227cb77b6cd00a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56804098dcf376a0e2227cb77b6cd00a)): ?>
<?php $component = $__componentOriginal56804098dcf376a0e2227cb77b6cd00a; ?>
<?php unset($__componentOriginal56804098dcf376a0e2227cb77b6cd00a); ?>
<?php endif; ?> Download PDF
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('resources.download', $resource['slug'])).'','variant' => 'secondary','class' => 'w-full','target' => '_blank','rel' => 'noopener']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('resources.download', $resource['slug'])).'','variant' => 'secondary','class' => 'w-full','target' => '_blank','rel' => 'noopener']); ?>
                            Open PDF
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="mt-3 text-sm text-brand-muted">The PDF file is not available yet. Please check back later or contact us for assistance.</p>
                    <div class="mt-4">
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('contact')).'','variant' => 'secondary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('contact')).'','variant' => 'secondary','class' => 'w-full']); ?>Contact us <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
            </aside>
        </div>

        <?php if($related->isNotEmpty()): ?>
            <div class="mt-14">
                <h2 class="section-title">Related resources</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal474647e4af8beece4d18f14c1519546b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal474647e4af8beece4d18f14c1519546b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.resource-card','data' => ['resource' => $item,'types' => config('resources.types')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.resource-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['resource' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'types' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('resources.types'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal474647e4af8beece4d18f14c1519546b)): ?>
<?php $attributes = $__attributesOriginal474647e4af8beece4d18f14c1519546b; ?>
<?php unset($__attributesOriginal474647e4af8beece4d18f14c1519546b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal474647e4af8beece4d18f14c1519546b)): ?>
<?php $component = $__componentOriginal474647e4af8beece4d18f14c1519546b; ?>
<?php unset($__componentOriginal474647e4af8beece4d18f14c1519546b); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
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
<?php /**PATH /var/www/html/resources/views/pages/resources/show.blade.php ENDPATH**/ ?>