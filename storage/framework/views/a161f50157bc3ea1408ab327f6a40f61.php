<?php
    $types = config('resources.types');
?>

<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo,'breadcrumbs' => [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Courses', 'url' => route('courses.index')],
    ['label' => $course['title']],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Courses', 'url' => route('courses.index')],
    ['label' => $course['title']],
])]); ?>
    <section class="container-page py-10 sm:py-14">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold"><?php echo e(ucfirst(str_replace('-', ' ', $course['category']))); ?></p>
                <h1 class="mt-2 font-display text-3xl font-semibold sm:text-4xl"><?php echo e($course['title']); ?></h1>
                <p class="mt-4 text-base leading-relaxed text-brand-muted"><?php echo e($course['short_description']); ?></p>

                <dl class="mt-8 grid gap-3 text-sm sm:grid-cols-2">
                    <div class="card py-4">
                        <dt class="text-xs font-semibold uppercase text-brand-muted">Class / level</dt>
                        <dd class="mt-1 font-medium"><?php echo e($course['class'] ?? '—'); ?></dd>
                    </div>
                    <div class="card py-4">
                        <dt class="text-xs font-semibold uppercase text-brand-muted">Teaching mode</dt>
                        <dd class="mt-1 font-medium capitalize"><?php echo e(implode(', ', $course['teaching_modes'] ?? [])); ?></dd>
                    </div>
                </dl>

                <h2 class="mt-10 font-display text-2xl font-semibold">Subjects covered</h2>
                <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                    <?php $__currentLoopData = $course['subjects'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($subject); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <h2 class="mt-10 font-display text-2xl font-semibold">Syllabus overview</h2>
                <div class="mt-4 space-y-4">
                    <?php $__currentLoopData = $course['syllabus'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <h3 class="font-semibold text-brand-navy"><?php echo e($block['title']); ?></h3>
                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                                <?php $__currentLoopData = $block['topics'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($topic); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-10 grid gap-6 md:grid-cols-2">
                    <div>
                        <h2 class="font-display text-xl font-semibold">Benefits</h2>
                        <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                            <?php $__currentLoopData = $course['benefits'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($item); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div>
                        <h2 class="font-display text-xl font-semibold">Learning outcomes</h2>
                        <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                            <?php $__currentLoopData = $course['outcomes'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($item); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="card">
                    <h2 class="font-display text-lg font-semibold">Admission enquiry</h2>
                    <p class="mt-2 text-sm text-brand-muted">Share your goals and preferred learning mode. Fee schedules and batch timings are shared during consultation.</p>
                    <div class="mt-4 flex flex-col gap-2">
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('contact', ['course' => $course['slug']])).'','variant' => 'primary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('contact', ['course' => $course['slug']])).'','variant' => 'primary','class' => 'w-full']); ?>Enquire now <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('resources.index', ['course' => $course['slug']])).'','variant' => 'secondary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('resources.index', ['course' => $course['slug']])).'','variant' => 'secondary','class' => 'w-full']); ?>Related resources <?php echo $__env->renderComponent(); ?>
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
                </div>

                <?php if(! empty($course['chapters'])): ?>
                    <div class="card">
                        <h2 class="font-display text-lg font-semibold">Chapters</h2>
                        <ol class="mt-3 list-decimal space-y-1 pl-5 text-sm text-brand-muted">
                            <?php $__currentLoopData = $course['chapters']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($chapter); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                <?php endif; ?>
            </aside>
        </div>

        <?php if($resources->isNotEmpty()): ?>
            <div class="mt-14">
                <h2 class="section-title">Study resources for this course</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal474647e4af8beece4d18f14c1519546b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal474647e4af8beece4d18f14c1519546b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.resource-card','data' => ['resource' => $resource,'types' => $types]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.resource-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['resource' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resource),'types' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($types)]); ?>
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

        <?php if($testPapers->isNotEmpty()): ?>
            <div class="mt-14">
                <h2 class="section-title">Test papers & mock tests</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <?php $__currentLoopData = $testPapers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal474647e4af8beece4d18f14c1519546b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal474647e4af8beece4d18f14c1519546b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.resource-card','data' => ['resource' => $paper,'types' => $types]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.resource-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['resource' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paper),'types' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($types)]); ?>
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

        <?php if($relatedCourses->isNotEmpty()): ?>
            <div class="mt-14">
                <h2 class="section-title">Related courses</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-3">
                    <?php $__currentLoopData = $relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalcc3fa0a60794ee960b55d89cf8d6c7e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3fa0a60794ee960b55d89cf8d6c7e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.course-card','data' => ['course' => $related]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.course-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['course' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($related)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3fa0a60794ee960b55d89cf8d6c7e8)): ?>
<?php $attributes = $__attributesOriginalcc3fa0a60794ee960b55d89cf8d6c7e8; ?>
<?php unset($__attributesOriginalcc3fa0a60794ee960b55d89cf8d6c7e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3fa0a60794ee960b55d89cf8d6c7e8)): ?>
<?php $component = $__componentOriginalcc3fa0a60794ee960b55d89cf8d6c7e8; ?>
<?php unset($__componentOriginalcc3fa0a60794ee960b55d89cf8d6c7e8); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
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
<?php /**PATH /var/www/html/resources/views/pages/courses/show.blade.php ENDPATH**/ ?>