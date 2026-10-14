@props(['resource', 'types' => []])

@php
    $typeLabel = $types[$resource['type'] ?? ''] ?? ucfirst(str_replace('_', ' ', $resource['type'] ?? 'Resource'));
@endphp

<article class="card flex h-full flex-col">
    <div class="flex items-start justify-between gap-3">
        <span class="rounded-full bg-brand-teal/10 px-2.5 py-0.5 text-xs font-semibold text-brand-teal">{{ $typeLabel }}</span>
        @if ($resource['free'] ?? true)
            <span class="text-xs font-medium text-brand-success">Free</span>
        @endif
    </div>
    <h3 class="mt-4 font-display text-lg font-semibold text-brand-navy">
        <a href="{{ route('resources.show', $resource['slug']) }}" class="hover:text-brand-royal">{{ $resource['title'] }}</a>
    </h3>
    <p class="mt-2 flex-1 text-sm text-brand-muted">{{ $resource['description'] }}</p>
    <p class="mt-3 text-xs text-brand-navy/70">Class {{ $resource['class'] ?? '—' }} · {{ $resource['subject'] ?? '' }}</p>
    <div class="mt-5 flex flex-wrap gap-2">
        <x-ui.button href="{{ route('resources.show', $resource['slug']) }}" variant="secondary" class="flex-1">Details</x-ui.button>
        <x-ui.button href="{{ route('resources.download', $resource['slug']) }}" variant="primary" class="flex-1">
            <x-ui.icon name="download" class="h-4 w-4" /> PDF
        </x-ui.button>
    </div>
</article>
