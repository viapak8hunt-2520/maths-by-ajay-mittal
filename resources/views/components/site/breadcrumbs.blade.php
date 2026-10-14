@props(['items' => []])

@if (count($items))
    <nav aria-label="Breadcrumb" class="border-b border-brand-navy/5 bg-white/60">
        <ol class="container-page flex flex-wrap items-center gap-2 py-3 text-sm text-brand-muted">
            @foreach ($items as $index => $item)
                <li class="flex items-center gap-2">
                    @if ($index > 0)
                        <span aria-hidden="true">/</span>
                    @endif
                    @if (! empty($item['url']) && $index < count($items) - 1)
                        <a href="{{ $item['url'] }}" class="hover:text-brand-royal">{{ $item['label'] }}</a>
                    @else
                        <span class="text-brand-navy">{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
