@php
    $user = auth()->user();
@endphp

<header class="admin-topbar sticky top-0 z-20 px-4 py-3 sm:px-6">
    <div class="flex items-center justify-between gap-4">
        <div class="flex min-w-0 items-center gap-3">
            <button type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 lg:hidden"
                    @click="toggleSidebar()"
                    aria-label="Open navigation">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
            <div class="min-w-0">
                <h1 class="truncate text-lg font-bold text-slate-900 sm:text-xl">@yield('page_title', 'Dashboard')</h1>
                @hasSection('page_description')
                    <p class="truncate text-sm text-slate-500">@yield('page_description')</p>
                @endif
            </div>
        </div>

        <div class="flex shrink-0 items-center gap-2 sm:gap-3">
            <a href="{{ route('home') }}" class="admin-btn-secondary hidden sm:inline-flex" target="_blank" rel="noopener">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M14 3h7v7M10 14L21 3M5 5h5v14h14v-5"/></svg>
                View site
            </a>

            <div class="admin-user-pill">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-cyan-500 text-xs font-bold text-white">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </span>
                <span class="text-left leading-tight">
                    <span class="block text-xs font-semibold text-slate-900">{{ $user->name }}</span>
                    <span class="block text-[10px] text-slate-500">{{ $user->role?->label() }}</span>
                </span>
            </div>

            <form method="post" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="admin-btn-ghost hidden sm:inline-flex">Logout</button>
            </form>
        </div>
    </div>
</header>
