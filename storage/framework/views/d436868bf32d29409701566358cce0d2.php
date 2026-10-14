<?php
    $hero = config('homepage.hero');
    $types = config('resources.types');
?>

<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo)]); ?>
    <section class="math-grid-bg relative overflow-hidden border-b border-brand-navy/10" data-no-reveal>
        <div class="container-page grid items-center gap-10 py-14 lg:grid-cols-2 lg:py-20">
            <div class="hero-stagger">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-gold">Mathematics coaching</p>
                <h1 class="mt-4 font-display text-4xl font-semibold leading-tight text-brand-navy sm:text-5xl"><?php echo e($hero['headline']); ?></h1>
                <p class="mt-5 max-w-xl text-base leading-relaxed text-brand-muted sm:text-lg"><?php echo e($hero['subheadline']); ?></p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => route($hero['primary_cta']['route']),'variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route($hero['primary_cta']['route'])),'variant' => 'primary']); ?><?php echo e($hero['primary_cta']['label']); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => route($hero['secondary_cta']['route']),'variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route($hero['secondary_cta']['route'])),'variant' => 'secondary']); ?><?php echo e($hero['secondary_cta']['label']); ?> <?php echo $__env->renderComponent(); ?>
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
            <div class="relative hero-panel-enter">
                <div class="card card-accent-top panel-gradient hero-float-soft relative overflow-hidden p-8">
                    <div class="absolute -right-8 -top-8 h-40 w-40 rounded-full bg-brand-violet/15"></div>
                    <div class="absolute -bottom-10 -left-6 h-32 w-32 rotate-12 border-2 border-brand-teal/35"></div>
                    <div class="absolute right-6 top-16 h-20 w-20 rounded-full bg-brand-gold/10"></div>
                    <p class="font-display text-2xl text-brand-navy">Concept · Practice · Confidence</p>
                    <div class="mt-6 space-y-3 font-mono text-sm text-brand-navy/80">
                        <p>\( ax^2 + bx + c = 0 \)</p>
                        <p>\( \sin^2\theta + \cos^2\theta = 1 \)</p>
                        <p>\( \int x^n \, dx = \frac{x^{n+1}}{n+1} + C \)</p>
                    </div>
                    <p class="mt-6 text-xs text-brand-muted">Replace this panel with a classroom or teacher photograph when assets are available.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
            <div>
                <h2 class="section-title"><?php echo e(config('homepage.intro.title')); ?></h2>
                <p class="section-lead"><?php echo e(config('homepage.intro.lead')); ?></p>
                <p class="mt-4 text-sm leading-relaxed text-brand-muted"><?php echo e(config('homepage.intro.body')); ?></p>
            </div>
            <dl class="card grid gap-4">
                <?php $__currentLoopData = config('homepage.intro.highlights', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border-b border-brand-navy/5 pb-4 last:border-0 last:pb-0">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-brand-gold"><?php echo e($item['label']); ?></dt>
                        <dd class="mt-1 text-sm text-brand-navy"><?php echo e($item['value']); ?></dd>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </dl>
        </div>
    </section>

    <section class="section-surface-alt py-14 sm:py-16">
        <div class="container-page">
            <h2 class="section-title">Course categories</h2>
            <p class="section-lead">Structured programmes for every stage — from school foundations to competitive exam preparation.</p>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="card">
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand-royal"><?php echo e($category['subtitle']); ?></p>
                        <h3 class="mt-2 font-display text-xl font-semibold"><?php echo e($category['title']); ?></h3>
                        <p class="mt-3 text-sm text-brand-muted"><?php echo e($category['description']); ?></p>
                        <p class="mt-4 text-xs text-brand-navy/70"><?php echo e(implode(' · ', $category['subjects'] ?? [])); ?></p>
                        <div class="mt-6">
                            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('courses.index', ['category' => $category['id']])).'','variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('courses.index', ['category' => $category['id']])).'','variant' => 'secondary']); ?>Explore courses <?php echo $__env->renderComponent(); ?>
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
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <h2 class="section-title"><?php echo e(config('homepage.why_choose.title')); ?></h2>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <?php $__currentLoopData = config('homepage.why_choose.items', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="card">
                    <h3 class="font-display text-lg font-semibold"><?php echo e($item['title']); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-brand-muted"><?php echo e($item['description']); ?></p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section class="band-navy py-14 text-white sm:py-16">
        <div class="container-page">
            <h2 class="font-display text-3xl font-semibold sm:text-4xl"><?php echo e(config('homepage.methodology.title')); ?></h2>
            <ol class="mt-10 grid gap-4 md:grid-cols-5">
                <?php $__currentLoopData = config('homepage.methodology.steps', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="rounded-2xl border border-white/10 bg-white/5 p-4">
                        <p class="text-xs font-semibold text-brand-gold">Step <?php echo e($index + 1); ?></p>
                        <p class="mt-2 font-display text-lg font-semibold"><?php echo e($step['title']); ?></p>
                        <p class="mt-2 text-sm text-white/75"><?php echo e($step['description']); ?></p>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="section-title">Featured study resources</h2>
                <p class="section-lead">Free notes, worksheets and test papers — no registration required.</p>
            </div>
            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('resources.index')).'','variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('resources.index')).'','variant' => 'secondary']); ?>View all resources <?php echo $__env->renderComponent(); ?>
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
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php $__currentLoopData = $featuredResources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    </section>

    <section class="section-surface-alt py-14 sm:py-16">
        <div class="container-page">
            <h2 class="section-title">Results & testimonials</h2>
            <?php if($results->isNotEmpty()): ?>
                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <p class="font-display text-lg font-semibold"><?php echo e($result['title'] ?? ''); ?></p>
                            <p class="mt-2 text-sm text-brand-muted"><?php echo e($result['description'] ?? ''); ?></p>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="mt-4 max-w-2xl text-sm text-brand-muted"><?php echo e(config('testimonials.results.intro')); ?></p>
            <?php endif; ?>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <blockquote class="card">
                        <p class="text-sm leading-relaxed text-brand-muted">“<?php echo e($testimonial['quote']); ?>”</p>
                        <footer class="mt-4 text-sm font-semibold text-brand-navy">
                            <?php echo e($testimonial['name']); ?>

                            <?php if(! empty($testimonial['is_placeholder'])): ?>
                                <span class="block text-xs font-normal text-brand-muted">Placeholder content</span>
                            <?php endif; ?>
                        </footer>
                    </blockquote>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-8">
                <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e(route('results')).'','variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('results')).'','variant' => 'secondary']); ?>Visit results page <?php echo $__env->renderComponent(); ?>
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
    </section>

    <section class="container-page py-14 sm:py-16">
        <h2 class="section-title"><?php echo e(config('homepage.coaching_modes.title')); ?></h2>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <?php $__currentLoopData = config('homepage.coaching_modes.modes', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="card">
                    <h3 class="font-display text-xl font-semibold"><?php echo e($mode['title']); ?></h3>
                    <p class="mt-3 text-sm leading-relaxed text-brand-muted"><?php echo e($mode['description']); ?></p>
                    <div class="mt-6">
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => route($mode['cta']['route']),'variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route($mode['cta']['route'])),'variant' => 'primary']); ?><?php echo e($mode['cta']['label']); ?> <?php echo $__env->renderComponent(); ?>
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
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section class="container-page pb-14 sm:pb-16">
        <h2 class="section-title"><?php echo e(config('faqs.title')); ?></h2>
        <p class="section-lead"><?php echo e(config('faqs.intro')); ?></p>
        <div class="mt-8 max-w-3xl">
            <?php if (isset($component)) { $__componentOriginal561de2cd0c8855a1c059ce266555b22a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal561de2cd0c8855a1c059ce266555b22a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.faq-accordion','data' => ['items' => $faqs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.faq-accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($faqs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal561de2cd0c8855a1c059ce266555b22a)): ?>
<?php $attributes = $__attributesOriginal561de2cd0c8855a1c059ce266555b22a; ?>
<?php unset($__attributesOriginal561de2cd0c8855a1c059ce266555b22a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal561de2cd0c8855a1c059ce266555b22a)): ?>
<?php $component = $__componentOriginal561de2cd0c8855a1c059ce266555b22a; ?>
<?php unset($__componentOriginal561de2cd0c8855a1c059ce266555b22a); ?>
<?php endif; ?>
        </div>
        <p class="mt-4 text-sm"><a href="<?php echo e(route('faq')); ?>" class="font-semibold text-brand-royal hover:underline">View all FAQs</a></p>
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

    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/katex.min.css">
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/katex.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/contrib/auto-render.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof renderMathInElement === 'function') {
                    renderMathInElement(document.querySelector('.math-grid-bg'), {
                        delimiters: [
                            { left: '\\(', right: '\\)', display: false },
                            { left: '\\[', right: '\\]', display: true },
                        ],
                        throwOnError: false,
                    });
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH /var/www/html/resources/views/pages/home.blade.php ENDPATH**/ ?>