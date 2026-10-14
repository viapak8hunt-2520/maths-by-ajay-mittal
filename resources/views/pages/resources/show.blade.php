@php
    $typeLabel = config('resources.types')[$resource['type'] ?? ''] ?? 'Resource';
@endphp

<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Study Resources', 'url' => route('resources.index')],
    ['label' => $resource['title']],
]">
    <section class="container-page py-10 sm:py-14">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">{{ $typeLabel }}</p>
                <h1 class="mt-2 font-display text-3xl font-semibold">{{ $resource['title'] }}</h1>
                <p class="mt-4 text-base leading-relaxed text-brand-muted">{{ $resource['description'] }}</p>

                <dl class="mt-8 grid gap-3 text-sm sm:grid-cols-2">
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Class</dt><dd class="mt-1 font-medium">{{ $resource['class'] ?? '—' }}</dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Subject</dt><dd class="mt-1 font-medium">{{ $resource['subject'] ?? '—' }}</dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Chapter</dt><dd class="mt-1 font-medium">{{ $resource['chapter'] ?? '—' }}</dd></div>
                    <div class="card py-4"><dt class="text-xs uppercase text-brand-muted">Access</dt><dd class="mt-1 font-medium text-brand-success">Free download</dd></div>
                </dl>

                @if ($course)
                    <p class="mt-6 text-sm">Part of <a href="{{ route('courses.show', $course['slug']) }}" class="font-semibold text-brand-royal hover:underline">{{ $course['title'] }}</a></p>
                @endif

                @if ($answerKey)
                    <p class="mt-4 text-sm">Answer key: <a href="{{ route('resources.show', $answerKey['slug']) }}" class="font-semibold text-brand-royal hover:underline">{{ $answerKey['title'] }}</a></p>
                @endif
            </div>

            <aside class="card">
                <h2 class="font-display text-lg font-semibold">Download</h2>
                @if ($fileAvailable)
                    @if (! empty($resource['pages']))
                        <p class="mt-2 text-sm text-brand-muted">{{ $resource['pages'] }} pages @if(!empty($resource['size_kb'])) · ~{{ $resource['size_kb'] }} KB @endif</p>
                    @endif
                    <div class="mt-5 flex flex-col gap-2">
                        <x-ui.button href="{{ route('resources.download', $resource['slug']) }}" variant="primary" class="w-full">
                            <x-ui.icon name="download" class="h-4 w-4" /> Download PDF
                        </x-ui.button>
                        <x-ui.button href="{{ route('resources.download', $resource['slug']) }}" variant="secondary" class="w-full" target="_blank" rel="noopener">
                            Open PDF
                        </x-ui.button>
                    </div>
                @else
                    <p class="mt-3 text-sm text-brand-muted">The PDF file is not available yet. Please check back later or contact us for assistance.</p>
                    <div class="mt-4">
                        <x-ui.button href="{{ route('contact') }}" variant="secondary" class="w-full">Contact us</x-ui.button>
                    </div>
                @endif
            </aside>
        </div>

        @if ($related->isNotEmpty())
            <div class="mt-14">
                <h2 class="section-title">Related resources</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    @foreach ($related as $item)
                        <x-cards.resource-card :resource="$item" :types="config('resources.types')" />
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layouts.app>
