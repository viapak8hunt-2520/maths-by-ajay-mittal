@php
    $groups = [
        'Overview' => [
            ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'dashboard'],
        ],
        'Content' => [
            ['label' => 'Courses', 'route' => 'admin.courses.index', 'icon' => 'courses', 'gate' => 'manage-content'],
            ['label' => 'Categories', 'route' => 'admin.course-categories.index', 'icon' => 'folder', 'gate' => 'manage-content'],
            ['label' => 'Resources', 'route' => 'admin.resources.index', 'icon' => 'document', 'gate' => 'manage-content'],
            ['label' => 'Test papers', 'route' => 'admin.test-papers.index', 'icon' => 'clipboard', 'gate' => 'manage-content'],
        ],
        'Website' => [
            ['label' => 'FAQs', 'route' => 'admin.faqs.index', 'icon' => 'chat', 'gate' => 'manage-content'],
            ['label' => 'Testimonials', 'route' => 'admin.testimonials.index', 'icon' => 'star', 'gate' => 'manage-content'],
            ['label' => 'Achievements', 'route' => 'admin.achievements.index', 'icon' => 'trophy', 'gate' => 'manage-content'],
            ['label' => 'Site content', 'route' => 'admin.site-content.edit', 'icon' => 'globe', 'gate' => 'manage-content'],
            ['label' => 'Media library', 'route' => 'admin.media.index', 'icon' => 'photo', 'gate' => 'manage-content'],
        ],
        'Operations' => [
            ['label' => 'Enquiries', 'route' => 'admin.enquiries.index', 'icon' => 'inbox', 'gate' => 'manage-enquiries'],
        ],
    ];

    $isActive = function (string $route): bool {
        $pattern = str_ends_with($route, '.index')
            ? str_replace('.index', '.*', $route)
            : $route;

        return request()->routeIs($pattern) || request()->routeIs($route);
    };
@endphp

<aside class="admin-sidebar fixed inset-y-0 left-0 z-40 flex w-[17.5rem] -translate-x-full flex-col text-white transition-transform duration-300 lg:static lg:translate-x-0"
       :class="{ 'translate-x-0': sidebarOpen }">
    <div class="admin-sidebar-brand m-4 rounded-2xl p-4">
        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-indigo-200">Control center</p>
        <p class="mt-1 text-base font-bold leading-snug">Mathematics by<br><span class="text-indigo-200">Ajay Mittal</span></p>
    </div>

    <nav class="flex-1 space-y-1 overflow-y-auto px-3 pb-6" aria-label="Admin navigation">
        @foreach ($groups as $section => $links)
            @php
                $visible = collect($links)->filter(fn ($l) => ! isset($l['gate']) || auth()->user()->can($l['gate']));
            @endphp
            @if ($visible->isNotEmpty())
                <p class="admin-nav-section">{{ $section }}</p>
                @foreach ($visible as $link)
                    <a href="{{ route($link['route']) }}"
                       class="admin-nav-link {{ $isActive($link['route']) ? 'admin-nav-link-active' : '' }}">
                        @include('admin.partials.icons', ['name' => $link['icon'], 'class' => 'h-5 w-5 shrink-0 opacity-90'])
                        <span>{{ $link['label'] }}</span>
                    </a>
                @endforeach
            @endif
        @endforeach
    </nav>

    <div class="border-t border-white/10 p-4 text-xs text-slate-400">
        Signed in as <span class="font-semibold text-slate-200">{{ auth()->user()->name }}</span>
    </div>
</aside>

<div class="fixed inset-0 z-30 bg-slate-900/60 backdrop-blur-sm lg:hidden" x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"></div>
