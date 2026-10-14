<!DOCTYPE html>
<html lang="en" x-data="adminShell" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#6366f1">
    <title>@yield('title', 'Admin') — {{ config('site.name') }}</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="admin-shell h-full">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <div class="flex min-w-0 flex-1 flex-col lg:pl-0">
            @include('admin.partials.topbar')

            <main class="admin-main">
                @include('admin.partials.flash')
                @if (! empty($breadcrumbs ?? null))
                    @include('admin.partials.breadcrumbs')
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
