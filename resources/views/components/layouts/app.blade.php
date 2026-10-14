@props(['seo' => [], 'breadcrumbs' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageTitle = $seo['title'] ?? config('site.name');
        $pageDescription = $seo['description'] ?? config('site.tagline');
        $canonical = $seo['canonical'] ?? url()->current();
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:site_name" content="{{ config('site.name') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen flex flex-col">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:shadow">
        Skip to main content
    </a>

    <x-site.header />

    <main id="main-content" class="flex-1">
        @if (! empty($breadcrumbs))
            <x-site.breadcrumbs :items="$breadcrumbs" />
        @endif

        {{ $slot }}
    </main>

    <x-site.footer />

    @stack('scripts')
</body>
</html>
