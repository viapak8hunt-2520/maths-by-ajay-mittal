<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['items' => []]));

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

foreach (array_filter((['items' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(count($items)): ?>
    <nav aria-label="Breadcrumb" class="border-b border-brand-navy/5 bg-white/60">
        <ol class="container-page flex flex-wrap items-center gap-2 py-3 text-sm text-brand-muted">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex items-center gap-2">
                    <?php if($index > 0): ?>
                        <span aria-hidden="true">/</span>
                    <?php endif; ?>
                    <?php if(! empty($item['url']) && $index < count($items) - 1): ?>
                        <a href="<?php echo e($item['url']); ?>" class="hover:text-brand-royal"><?php echo e($item['label']); ?></a>
                    <?php else: ?>
                        <span class="text-brand-navy"><?php echo e($item['label']); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </nav>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/site/breadcrumbs.blade.php ENDPATH**/ ?>