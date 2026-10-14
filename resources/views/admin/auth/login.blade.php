<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — {{ config('site.name') }}</title>
    @vite(['resources/css/admin.css'])
</head>
<body class="admin-login-shell">
    <div class="admin-login-card">
        <div class="mb-6 text-center">
            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-cyan-500 text-xl font-bold text-white shadow-lg">
                M
            </div>
            <h1 class="text-2xl font-bold text-slate-900">Welcome back</h1>
            <p class="mt-1 text-sm text-slate-500">Sign in to manage Mathematics by Ajay Mittal</p>
        </div>

        @if ($errors->any())
            <div class="admin-alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="post" action="{{ route('admin.login.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="admin-label" for="email">Email address</label>
                <input class="admin-input" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
            </div>
            <div>
                <label class="admin-label" for="password">Password</label>
                <input class="admin-input" type="password" name="password" id="password" required placeholder="••••••••••••">
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                Keep me signed in
            </label>
            <button type="submit" class="admin-btn-primary w-full py-3">Sign in to admin</button>
        </form>
    </div>
</body>
</html>
