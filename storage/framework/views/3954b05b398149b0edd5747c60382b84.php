<?php
    $contact = config('site.contact');
    $categories = config('courses.categories', []);
    $social = config('site.social', []);
    $copyright = str_replace(':year', date('Y'), config('site.footer.copyright'));
?>

<footer class="band-navy border-t border-brand-royal/25 text-white">
    <div class="container-page grid gap-10 py-12 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <p class="font-display text-xl font-semibold">Mathematics by Ajay Mittal</p>
            <p class="mt-3 text-sm leading-relaxed text-white/75"><?php echo e(config('site.tagline')); ?></p>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Explore</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                <?php $__currentLoopData = config('site.navigation', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route($item['route'])); ?>" class="hover:text-white"><?php echo e($item['label']); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('faq')); ?>" class="hover:text-white">FAQ</a></li>
            </ul>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Courses</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('courses.index', ['category' => $category['id']])); ?>" class="hover:text-white">
                            <?php echo e($category['title']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Contact</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                <li><a href="tel:<?php echo e(preg_replace('/\s+/', '', $contact['phone'])); ?>" class="hover:text-white"><?php echo e($contact['phone_display']); ?></a></li>
                <li><a href="mailto:<?php echo e($contact['email']); ?>" class="hover:text-white"><?php echo e($contact['email']); ?></a></li>
            </ul>
            <?php if(collect($social)->filter()->isNotEmpty()): ?>
                <div class="mt-4 flex flex-wrap gap-3 text-sm">
                    <?php if($social['youtube'] ?? false): ?>
                        <a href="<?php echo e($social['youtube']); ?>" class="text-white/80 hover:text-white" rel="noopener noreferrer">YouTube</a>
                    <?php endif; ?>
                    <?php if($social['instagram'] ?? false): ?>
                        <a href="<?php echo e($social['instagram']); ?>" class="text-white/80 hover:text-white" rel="noopener noreferrer">Instagram</a>
                    <?php endif; ?>
                    <?php if($social['facebook'] ?? false): ?>
                        <a href="<?php echo e($social['facebook']); ?>" class="text-white/80 hover:text-white" rel="noopener noreferrer">Facebook</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="container-page flex flex-col gap-2 py-6 text-xs text-white/60 sm:flex-row sm:items-center sm:justify-between">
            <p><?php echo e($copyright); ?></p>
            <p>Free study resources · Admission enquiries welcome</p>
        </div>
    </div>
</footer>
<?php /**PATH /var/www/html/resources/views/components/site/footer.blade.php ENDPATH**/ ?>