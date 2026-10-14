<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page_title', 'Dashboard'); ?>
<?php $__env->startSection('page_description', 'Your coaching content and admissions at a glance'); ?>

<?php $__env->startSection('content'); ?>
    <div data-admin-dashboard class="space-y-8">
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="admin-stat admin-stat-indigo">
            <p class="admin-stat-label">Total courses</p>
            <p class="admin-stat-value"><?php echo e($stats['courses_total']); ?></p>
            <p class="admin-stat-meta"><?php echo e($stats['courses_published']); ?> published · <?php echo e($stats['courses_draft']); ?> drafts</p>
        </div>
        <div class="admin-stat admin-stat-violet">
            <p class="admin-stat-label">Study resources</p>
            <p class="admin-stat-value"><?php echo e($stats['resources_published']); ?></p>
            <p class="admin-stat-meta">Published on the public site</p>
        </div>
        <div class="admin-stat admin-stat-cyan">
            <p class="admin-stat-label">Test papers</p>
            <p class="admin-stat-value"><?php echo e($stats['test_papers_total']); ?></p>
            <p class="admin-stat-meta">All statuses in library</p>
        </div>
        <div class="admin-stat admin-stat-emerald">
            <p class="admin-stat-label">New enquiries</p>
            <p class="admin-stat-value"><?php echo e($stats['enquiries_new']); ?></p>
            <p class="admin-stat-meta"><?php echo e($stats['enquiries_total']); ?> total received</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 xl:grid-cols-3">
        <div class="admin-card xl:col-span-1">
            <h2 class="text-base font-bold text-slate-900">Quick actions</h2>
            <p class="mt-1 text-sm text-slate-500">Jump into common workflows</p>
            <div class="mt-5 space-y-2">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-content')): ?>
                    <a class="admin-quick-action" href="<?php echo e(route('admin.courses.create')); ?>">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">+</span>
                        Create course
                    </a>
                    <a class="admin-quick-action" href="<?php echo e(route('admin.resources.create')); ?>">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700">↑</span>
                        Upload resource
                    </a>
                    <a class="admin-quick-action" href="<?php echo e(route('admin.test-papers.create')); ?>">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 text-violet-700">✎</span>
                        Add test paper
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-enquiries')): ?>
                    <a class="admin-quick-action" href="<?php echo e(route('admin.enquiries.index')); ?>">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">✉</span>
                        Review enquiries
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="admin-card-flush xl:col-span-2">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recent enquiries</h2>
                <p class="text-sm text-slate-500">Latest admission interest from the public site</p>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Course interest</th>
                            <th>Status</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><a class="admin-link" href="<?php echo e(route('admin.enquiries.show', $enquiry)); ?>"><?php echo e($enquiry->student_name); ?></a></td>
                                <td><?php echo e($enquiry->course_interest); ?></td>
                                <td><span class="admin-badge-info"><?php echo e($enquiry->status->label()); ?></span></td>
                                <td class="text-slate-500"><?php echo e($enquiry->created_at->format('d M Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">
                                    <div class="admin-empty my-4">No enquiries yet. They will appear here when visitors submit the contact form.</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <div class="admin-card-flush">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recently updated courses</h2>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Status</th><th>Updated</th></tr></thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><a class="admin-link" href="<?php echo e(route('admin.courses.edit', $course)); ?>"><?php echo e($course->title); ?></a></td>
                                <td><span class="admin-badge-neutral"><?php echo e($course->status->label()); ?></span></td>
                                <td class="text-slate-500"><?php echo e($course->updated_at->diffForHumans()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="3"><div class="admin-empty my-4">No courses yet.</div></td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card-flush">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recent test papers</h2>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Type</th><th>Updated</th></tr></thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentPapers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><a class="admin-link" href="<?php echo e(route('admin.test-papers.edit', $paper)); ?>"><?php echo e($paper->title); ?></a></td>
                                <td><span class="admin-badge-neutral"><?php echo e($paper->paper_type); ?></span></td>
                                <td class="text-slate-500"><?php echo e($paper->updated_at->diffForHumans()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="3"><div class="admin-empty my-4">No test papers yet.</div></td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>