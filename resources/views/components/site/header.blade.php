@php
    $nav = config('site.navigation', []);
@endphp

<header class="site-header-enter sticky top-0 z-40 border-b border-brand-royal/15 bg-brand-ivory/90 backdrop-blur-md">
    <div class="container-page flex h-16 items-center justify-between gap-4 lg:h-20">
        <a href="{{ route('home') }}" class="group flex min-w-0 flex-col">
            <span class="truncate font-display text-lg font-semibold text-brand-navy sm:text-xl">Mathematics</span>
            <span class="truncate text-xs font-medium tracking-wide text-brand-gold sm:text-sm">by Ajay Mittal</span>
        </a>

        <nav class="hidden items-center gap-6 lg:flex" aria-label="Primary">
            @foreach ($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="nav-link-animated text-sm font-medium text-brand-navy/80 transition hover:text-brand-royal {{ request()->routeIs($item['route']) ? 'is-active text-brand-royal' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden lg:block">
            <x-ui.button href="{{ route('courses.index') }}" variant="primary">Explore Courses</x-ui.button>
        </div>

        <button type="button"
                class="inline-flex items-center justify-center rounded-lg border border-brand-navy/15 p-2 lg:hidden"
                data-mobile-nav-toggle
                aria-expanded="false"
                aria-controls="mobile-nav-panel"
                aria-label="Open menu">
            <x-ui.icon name="menu" class="h-5 w-5" />
        </button>
    </div>

    <div id="mobile-nav-panel" class="hidden border-t border-brand-navy/10 lg:hidden" data-mobile-nav-panel>
        <nav class="container-page flex flex-col gap-1 py-4" aria-label="Mobile primary">
            @foreach ($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="rounded-lg px-3 py-2 text-sm font-medium text-brand-navy hover:bg-white">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="pt-2">
                <x-ui.button href="{{ route('contact') }}" variant="primary" class="w-full">Enquire Now</x-ui.button>
            </div>
        </nav>
    </div>
</header>
