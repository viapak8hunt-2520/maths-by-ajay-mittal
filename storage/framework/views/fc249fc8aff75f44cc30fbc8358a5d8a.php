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

<div class="divide-y divide-brand-navy/10 rounded-2xl border border-brand-navy/10 bg-white">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <button type="button"
                    class="faq-accordion-trigger flex w-full items-center justify-between gap-4 px-5 py-4 text-left text-sm font-semibold text-brand-navy transition hover:bg-brand-ivory/80 sm:text-base"
                    data-accordion-trigger
                    aria-expanded="<?php echo e($index === 0 ? 'true' : 'false'); ?>"
                    aria-controls="faq-panel-<?php echo e($index); ?>">
                <span><?php echo e($item['question']); ?></span>
                <span aria-hidden="true" class="faq-accordion-icon text-brand-royal transition-transform duration-300">+</span>
            </button>
            <div id="faq-panel-<?php echo e($index); ?>"
                 class="<?php echo \Illuminate\Support\Arr::toCssClasses(['faq-accordion-panel px-5 pb-4 text-sm leading-relaxed text-brand-muted', 'hidden' => $index !== 0]); ?>">
                <?php echo e($item['answer']); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/html/resources/views/components/site/faq-accordion.blade.php ENDPATH**/ ?>