<x-layouts.app :seo="['title' => 'Page not found — '.config('site.name'), 'description' => 'The page you requested could not be found.']">
    <section class="container-page flex min-h-[50vh] flex-col items-center justify-center py-20 text-center">
        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-brand-gold">404</p>
        <h1 class="mt-4 font-display text-4xl font-semibold text-brand-navy">Page not found</h1>
        <p class="mt-3 max-w-md text-sm text-brand-muted">The link may be outdated or the page may have moved. Explore courses and free study resources below.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <x-ui.button href="{{ route('home') }}" variant="primary">Home</x-ui.button>
            <x-ui.button href="{{ route('courses.index') }}" variant="secondary">Courses</x-ui.button>
            <x-ui.button href="{{ route('resources.index') }}" variant="secondary">Study resources</x-ui.button>
        </div>
    </section>
</x-layouts.app>
