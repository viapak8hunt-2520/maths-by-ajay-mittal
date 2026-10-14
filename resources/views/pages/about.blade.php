<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'About'],
]">
    <x-site.page-heading :title="$content['hero']['title']" :lead="$content['hero']['subtitle']" align="center" />

    <section class="container-page max-w-3xl space-y-8 pb-14">
        @foreach ($content['sections'] as $section)
            <article class="card">
                <h2 class="font-display text-2xl font-semibold">{{ $section['title'] }}</h2>
                <p class="mt-3 text-sm leading-relaxed text-brand-muted">{{ $section['body'] }}</p>
            </article>
        @endforeach
    </section>

    <x-site.contact-cta />
</x-layouts.app>
