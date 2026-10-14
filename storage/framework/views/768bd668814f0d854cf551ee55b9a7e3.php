<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'lead' => null, 'align' => 'left']));

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

foreach (array_filter((['title', 'lead' => null, 'align' => 'left']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'container-page py-10 sm:py-14',
    'text-center' => $align === 'center',
]); ?>">
    <h1 class="<?php echo \Illuminate\Support\Arr::toCssClasses(['section-title', 'section-title-center' => $align === 'center']); ?>"><?php echo e($title); ?></h1>
    <?php if($lead): ?>
        <p class="<?php echo \Illuminate\Support\Arr::toCssClasses(['section-lead', 'mx-auto' => $align === 'center']); ?>"><?php echo e($lead); ?></p>
    <?php endif; ?>
    <?php echo e($slot ?? ''); ?>

</div>
<?php /**PATH /var/www/html/resources/views/components/site/page-heading.blade.php ENDPATH**/ ?>