<?php
    $contact = config('site.contact');
    $wa = 'https://wa.me/'.preg_replace('/\D/', '', $contact['whatsapp']).'?text='.urlencode($contact['whatsapp_message']);
    $selectedCourse = old('course_interest', $prefillCourseTitle ?? '');
?>

<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['seo' => $seo,'breadcrumbs' => [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Contact'],
]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seo),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Contact'],
])]); ?>
    <?php if (isset($component)) { $__componentOriginal42552989991c33c24e80ac01be089449 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42552989991c33c24e80ac01be089449 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site.page-heading','data' => ['title' => 'Contact & admissions','lead' => 'Tell us about the student’s class, goals and preferred teaching mode. We will respond as soon as possible.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site.page-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Contact & admissions','lead' => 'Tell us about the student’s class, goals and preferred teaching mode. We will respond as soon as possible.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal42552989991c33c24e80ac01be089449)): ?>
<?php $attributes = $__attributesOriginal42552989991c33c24e80ac01be089449; ?>
<?php unset($__attributesOriginal42552989991c33c24e80ac01be089449); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal42552989991c33c24e80ac01be089449)): ?>
<?php $component = $__componentOriginal42552989991c33c24e80ac01be089449; ?>
<?php unset($__componentOriginal42552989991c33c24e80ac01be089449); ?>
<?php endif; ?>

    <section class="container-page grid gap-10 pb-14 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="card">
            <?php if(session('success')): ?>
                <div class="mb-6 rounded-lg border border-brand-success/30 bg-green-50 px-4 py-3 text-sm text-brand-success" role="status">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                    <p class="font-semibold">Please correct the following:</p>
                    <ul class="mt-2 list-disc pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo e(route('contact.store')); ?>" class="grid gap-4">
                <?php echo csrf_field(); ?>
                <div class="hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                </div>

                <div>
                    <label for="student_name" class="text-sm font-medium">Student name *</label>
                    <input id="student_name" name="student_name" value="<?php echo e(old('student_name')); ?>" required
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                </div>
                <div>
                    <label for="parent_name" class="text-sm font-medium">Parent / guardian name</label>
                    <input id="parent_name" name="parent_name" value="<?php echo e(old('parent_name')); ?>"
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="phone" class="text-sm font-medium">Phone *</label>
                        <input id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required
                               class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>
                        <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>"
                               class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    </div>
                </div>
                <div>
                    <label for="course_interest" class="text-sm font-medium">Course or class of interest *</label>
                    <input id="course_interest" name="course_interest" list="course-options" value="<?php echo e($selectedCourse); ?>" required
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <datalist id="course-options">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($course['title']); ?>"></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
                </div>
                <div>
                    <label for="teaching_mode" class="text-sm font-medium">Preferred teaching mode *</label>
                    <select id="teaching_mode" name="teaching_mode" required class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                        <option value="">Select…</option>
                        <?php $__currentLoopData = ['offline' => 'Offline classroom', 'online' => 'Online', 'either' => 'Either mode']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php if(old('teaching_mode') === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label for="message" class="text-sm font-medium">Message</label>
                    <textarea id="message" name="message" rows="4" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm"><?php echo e(old('message')); ?></textarea>
                </div>
                <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['type' => 'submit','variant' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','variant' => 'primary']); ?>Submit enquiry <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
            </form>
        </div>

        <aside class="space-y-6">
            <div class="card">
                <h2 class="font-display text-lg font-semibold">Contact information</h2>
                <ul class="mt-4 space-y-3 text-sm text-brand-muted">
                    <li><span class="font-medium text-brand-navy">Phone:</span> <a href="tel:<?php echo e(preg_replace('/\s+/', '', $contact['phone'])); ?>" class="text-brand-royal"><?php echo e($contact['phone_display']); ?></a></li>
                    <li><span class="font-medium text-brand-navy">Email:</span> <a href="mailto:<?php echo e($contact['email']); ?>" class="text-brand-royal"><?php echo e($contact['email']); ?></a></li>
                    <li><span class="font-medium text-brand-navy">Address:</span> <?php echo e($contact['address']['line1']); ?>, <?php echo e($contact['address']['city']); ?></li>
                </ul>
                <div class="mt-5 flex flex-col gap-2">
                    <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => ''.e($wa).'','variant' => 'primary','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e($wa).'','variant' => 'primary','class' => 'w-full']); ?>WhatsApp <?php echo $__env->renderComponent(); ?>
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

            <?php if($contact['address']['map_embed_url'] ?? false): ?>
                <div class="card overflow-hidden p-0">
                    <iframe title="Location map" src="<?php echo e($contact['address']['map_embed_url']); ?>" class="min-h-64 w-full border-0" loading="lazy"></iframe>
                </div>
            <?php endif; ?>
        </aside>
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
<?php /**PATH /var/www/html/resources/views/pages/contact.blade.php ENDPATH**/ ?>