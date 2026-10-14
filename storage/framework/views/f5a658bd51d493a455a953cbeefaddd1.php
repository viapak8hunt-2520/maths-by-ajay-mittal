<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — <?php echo e(config('site.name')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/admin.css']); ?>
</head>
<body class="admin-shell flex items-center justify-center p-4">
    <div class="admin-card w-full max-w-md">
        <h1 class="text-xl font-semibold text-slate-900">Admin sign in</h1>
        <p class="mt-1 text-sm text-slate-500">Mathematics by Ajay Mittal</p>

        <?php if($errors->any()): ?>
            <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(route('admin.login.store')); ?>" class="mt-6 space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="admin-label" for="email">Email</label>
                <input class="admin-input" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required autofocus>
            </div>
            <div>
                <label class="admin-label" for="password">Password</label>
                <input class="admin-input" type="password" name="password" id="password" required>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>
            <button type="submit" class="admin-btn-primary w-full">Sign in</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>