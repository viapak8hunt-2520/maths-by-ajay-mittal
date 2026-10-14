<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['seo' => [], 'breadcrumbs' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['seo' => [], 'breadcrumbs' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php
        $pageTitle = $seo['title'] ?? config('site.name');
        $pageDescription = $seo['description'] ?? config('site.tagline');
        $canonical = $seo['canonical'] ?? url()->current();
    ?>

    <title><?php echo e($pageTitle); ?></title>
    <meta name="description" content="<?php echo e($pageDescription); ?>">
    <link rel="canonical" href="<?php echo e($canonical); ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($pageTitle); ?>">
    <meta property="og:description" content="<?php echo e($pageDescription); ?>">
    <meta property="og:url" content="<?php echo e($canonical); ?>">
    <meta property="og:site_name" content="<?php echo e(config('site.name')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="min-h-screen flex flex-col">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:shadow">
        Skip to main content
    </a>

    <?php if (isset($component)) { $__componentOriginale7973a0cd111432859375f720ac31db5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale7973a0cd111432859375f720ac31db5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale7973a0cd111432859375f720ac31db5)): ?>
<?php $attributes = $__attributesOriginale7973a0cd111432859375f720ac31db5; ?>
<?php unset($__attributesOriginale7973a0cd111432859375f720ac31db5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale7973a0cd111432859375f720ac31db5)): ?>
<?php $component = $__componentOriginale7973a0cd111432859375f720ac31db5; ?>
<?php unset($__componentOriginale7973a0cd111432859375f720ac31db5); ?>
<?php endif; ?>

    <main id="main-content" class="flex-1">
        <?php if(! empty($breadcrumbs)): ?>
            <?php if (isset($component)) { $__componentOriginalfb9fc13d22dfd0cfbb2b52779f693db8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb9fc13d22dfd0cfbb2b52779f693db8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.breadcrumbs','data' => ['items' => $breadcrumbs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb9fc13d22dfd0cfbb2b52779f693db8)): ?>
<?php $attributes = $__attributesOriginalfb9fc13d22dfd0cfbb2b52779f693db8; ?>
<?php unset($__attributesOriginalfb9fc13d22dfd0cfbb2b52779f693db8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb9fc13d22dfd0cfbb2b52779f693db8)): ?>
<?php $component = $__componentOriginalfb9fc13d22dfd0cfbb2b52779f693db8; ?>
<?php unset($__componentOriginalfb9fc13d22dfd0cfbb2b52779f693db8); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php echo e($slot); ?>

    </main>

    <?php if (isset($component)) { $__componentOriginal21120ef38d90a9d572330a5268a23b04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal21120ef38d90a9d572330a5268a23b04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal21120ef38d90a9d572330a5268a23b04)): ?>
<?php $attributes = $__attributesOriginal21120ef38d90a9d572330a5268a23b04; ?>
<?php unset($__attributesOriginal21120ef38d90a9d572330a5268a23b04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21120ef38d90a9d572330a5268a23b04)): ?>
<?php $component = $__componentOriginal21120ef38d90a9d572330a5268a23b04; ?>
<?php unset($__componentOriginal21120ef38d90a9d572330a5268a23b04); ?>
<?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/components/layouts/app.blade.php ENDPATH**/ ?>