<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Nothing found', 'message' => 'Try adjusting your filters or search terms.']));

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

foreach (array_filter((['title' => 'Nothing found', 'message' => 'Try adjusting your filters or search terms.']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="card col-span-full py-12 text-center">
    <p class="font-display text-xl font-semibold text-brand-navy"><?php echo e($title); ?></p>
    <p class="mx-auto mt-2 max-w-md text-sm text-brand-muted"><?php echo e($message); ?></p>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /var/www/html/resources/views/components/ui/empty-state.blade.php ENDPATH**/ ?>