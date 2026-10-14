<nav aria-label="Breadcrumb" class="mb-5 flex flex-wrap items-center gap-2 text-sm text-slate-500">
    @foreach ($breadcrumbs as $index => $item)
        @if ($index > 0)
            <span class="text-slate-300">/</span>
        @endif
        @if (! empty($item['url']))
            <a href="{{ $item['url'] }}" class="font-medium hover:text-indigo-600">{{ $item['label'] }}</a>
        @else
            <span class="font-semibold text-slate-800">{{ $item['label'] }}</span>
        @endif
    @endforeach
</nav>
