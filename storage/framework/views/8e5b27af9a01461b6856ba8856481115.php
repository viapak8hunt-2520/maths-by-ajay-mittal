<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'class' => 'h-5 w-5']));

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

foreach (array_filter((['name', 'class' => 'h-5 w-5']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php switch($name):
    case ('dashboard'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h6v8H4V5zm10 0h6v5h-6V5zM4 15h6v4H4v-4zm10 3h6v6h-6v-6z"/></svg>
        <?php break; ?>
    <?php case ('courses'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5l8 4.5-8 4.5-8-4.5 8-4.5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 11v5l8 4.5 8-4.5v-5"/></svg>
        <?php break; ?>
    <?php case ('folder'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/></svg>
        <?php break; ?>
    <?php case ('document'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4h8l4 4v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/><path stroke-linecap="round" d="M16 4v4h4"/></svg>
        <?php break; ?>
    <?php case ('clipboard'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5h6a2 2 0 0 1 2 2v12H7V7a2 2 0 0 1 2-2z"/><path stroke-linecap="round" d="M9 3h6v4H9V3z"/></svg>
        <?php break; ?>
    <?php case ('chat'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-4 3v-3H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        <?php break; ?>
    <?php case ('star'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.9 6.5 7.1.6-5.4 4.6 1.7 7-6.3-3.8-6.3 3.8 1.7-7-5.4-4.6 7.1-.6L12 3z"/></svg>
        <?php break; ?>
    <?php case ('trophy'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4h8v3a4 4 0 0 1-8 0V4z"/><path stroke-linecap="round" d="M6 4H4v1a3 3 0 0 0 3 3M18 4h2v1a3 3 0 0 1-3 3"/><path stroke-linecap="round" d="M12 11v3M9 20h6M10 14h4v3h-4v-3z"/></svg>
        <?php break; ?>
    <?php case ('globe'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M3 12h18M12 3c2.5 2.8 4 6 4 9s-1.5 6.2-4 9c-2.5-2.8-4-6.2-4-9s1.5-6.2 4-9z"/></svg>
        <?php break; ?>
    <?php case ('photo'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="10" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 16l-5-5-4 4-2-2-5 5"/></svg>
        <?php break; ?>
    <?php case ('inbox'): ?>
        <svg <?php echo e($attributes->merge(['class' => $class])); ?> fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4V6z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 10l6.5 4h3L20 10"/></svg>
        <?php break; ?>
    <?php default: ?>
        <span class="<?php echo e($class); ?> inline-block h-2 w-2 rounded-full bg-indigo-400"></span>
<?php endswitch; ?>
<?php /**PATH /var/www/html/resources/views/admin/partials/icons.blade.php ENDPATH**/ ?>