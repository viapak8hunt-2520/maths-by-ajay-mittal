<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Results & Testimonials'],
]">
    <x-site.page-heading
        title="Results & testimonials"
        lead="Verified achievements and approved student feedback are published here."
    />

    <section class="container-page space-y-12 pb-14">
        <div>
            <h2 class="font-display text-2xl font-semibold">Student achievements</h2>
            @if (($results['enabled'] ?? false) && ! empty($results['items']))
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    @foreach ($results['items'] as $item)
                        <article class="card">
                            <h3 class="font-semibold">{{ $item['title'] ?? '' }}</h3>
                            <p class="mt-2 text-sm text-brand-muted">{{ $item['description'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>
            @else
                <x-ui.empty-state class="mt-6" title="Results coming soon" :message="$results['intro'] ?? 'Verified results will be added when available.'" />
            @endif
        </div>

        <div>
            <h2 class="font-display text-2xl font-semibold">Testimonials</h2>
            @if (($testimonials['enabled'] ?? false) && ! empty($testimonials['items']))
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    @foreach ($testimonials['items'] as $item)
                        <blockquote class="card">
                            <p class="text-sm text-brand-muted">“{{ $item['quote'] }}”</p>
                            <footer class="mt-3 text-sm font-semibold">{{ $item['name'] }}</footer>
                        </blockquote>
                    @endforeach
                </div>
            @else
                <p class="mt-4 max-w-2xl text-sm text-brand-muted">{{ $testimonials['intro'] ?? '' }}</p>
            @endif
        </div>
    </section>
</x-layouts.app>
