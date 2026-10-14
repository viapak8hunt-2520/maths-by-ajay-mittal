@php
    $hero = config('homepage.hero');
    $types = config('resources.types');
@endphp

<x-layouts.app :seo="$seo">
    <section class="math-grid-bg relative overflow-hidden border-b border-brand-navy/10" data-no-reveal>
        <div class="container-page grid items-center gap-10 py-14 lg:grid-cols-2 lg:py-20">
            <div class="hero-stagger">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-gold">Mathematics coaching</p>
                <h1 class="mt-4 font-display text-4xl font-semibold leading-tight text-brand-navy sm:text-5xl">{{ $hero['headline'] }}</h1>
                <p class="mt-5 max-w-xl text-base leading-relaxed text-brand-muted sm:text-lg">{{ $hero['subheadline'] }}</p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <x-ui.button :href="route($hero['primary_cta']['route'])" variant="primary">{{ $hero['primary_cta']['label'] }}</x-ui.button>
                    <x-ui.button :href="route($hero['secondary_cta']['route'])" variant="secondary">{{ $hero['secondary_cta']['label'] }}</x-ui.button>
                </div>
            </div>
            <div class="relative hero-panel-enter">
                <div class="card card-accent-top panel-gradient hero-float-soft relative overflow-hidden p-8">
                    <div class="absolute -right-8 -top-8 h-40 w-40 rounded-full bg-brand-violet/15"></div>
                    <div class="absolute -bottom-10 -left-6 h-32 w-32 rotate-12 border-2 border-brand-teal/35"></div>
                    <div class="absolute right-6 top-16 h-20 w-20 rounded-full bg-brand-gold/10"></div>
                    <p class="font-display text-2xl text-brand-navy">Concept · Practice · Confidence</p>
                    <div class="mt-6 space-y-3 font-mono text-sm text-brand-navy/80">
                        <p>\( ax^2 + bx + c = 0 \)</p>
                        <p>\( \sin^2\theta + \cos^2\theta = 1 \)</p>
                        <p>\( \int x^n \, dx = \frac{x^{n+1}}{n+1} + C \)</p>
                    </div>
                    <p class="mt-6 text-xs text-brand-muted">Replace this panel with a classroom or teacher photograph when assets are available.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
            <div>
                <h2 class="section-title">{{ config('homepage.intro.title') }}</h2>
                <p class="section-lead">{{ config('homepage.intro.lead') }}</p>
                <p class="mt-4 text-sm leading-relaxed text-brand-muted">{{ config('homepage.intro.body') }}</p>
            </div>
            <dl class="card grid gap-4">
                @foreach (config('homepage.intro.highlights', []) as $item)
                    <div class="border-b border-brand-navy/5 pb-4 last:border-0 last:pb-0">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-brand-gold">{{ $item['label'] }}</dt>
                        <dd class="mt-1 text-sm text-brand-navy">{{ $item['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    <section class="section-surface-alt py-14 sm:py-16">
        <div class="container-page">
            <h2 class="section-title">Course categories</h2>
            <p class="section-lead">Structured programmes for every stage — from school foundations to competitive exam preparation.</p>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($categories as $category)
                    <article class="card">
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand-royal">{{ $category['subtitle'] }}</p>
                        <h3 class="mt-2 font-display text-xl font-semibold">{{ $category['title'] }}</h3>
                        <p class="mt-3 text-sm text-brand-muted">{{ $category['description'] }}</p>
                        <p class="mt-4 text-xs text-brand-navy/70">{{ implode(' · ', $category['subjects'] ?? []) }}</p>
                        <div class="mt-6">
                            <x-ui.button href="{{ route('courses.index', ['category' => $category['id']]) }}" variant="secondary">Explore courses</x-ui.button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <h2 class="section-title">{{ config('homepage.why_choose.title') }}</h2>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (config('homepage.why_choose.items', []) as $item)
                <article class="card">
                    <h3 class="font-display text-lg font-semibold">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $item['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="band-navy py-14 text-white sm:py-16">
        <div class="container-page">
            <h2 class="font-display text-3xl font-semibold sm:text-4xl">{{ config('homepage.methodology.title') }}</h2>
            <ol class="mt-10 grid gap-4 md:grid-cols-5">
                @foreach (config('homepage.methodology.steps', []) as $index => $step)
                    <li class="rounded-2xl border border-white/10 bg-white/5 p-4">
                        <p class="text-xs font-semibold text-brand-gold">Step {{ $index + 1 }}</p>
                        <p class="mt-2 font-display text-lg font-semibold">{{ $step['title'] }}</p>
                        <p class="mt-2 text-sm text-white/75">{{ $step['description'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="section-title">Featured study resources</h2>
                <p class="section-lead">Free notes, worksheets and test papers — no registration required.</p>
            </div>
            <x-ui.button href="{{ route('resources.index') }}" variant="secondary">View all resources</x-ui.button>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($featuredResources as $resource)
                <x-cards.resource-card :resource="$resource" :types="$types" />
            @endforeach
        </div>
    </section>

    <section class="section-surface-alt py-14 sm:py-16">
        <div class="container-page">
            <h2 class="section-title">Results & testimonials</h2>
            @if ($results->isNotEmpty())
                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    @foreach ($results as $result)
                        <article class="card">
                            <p class="font-display text-lg font-semibold">{{ $result['title'] ?? '' }}</p>
                            <p class="mt-2 text-sm text-brand-muted">{{ $result['description'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="mt-4 max-w-2xl text-sm text-brand-muted">{{ config('testimonials.results.intro') }}</p>
            @endif

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="card">
                        <p class="text-sm leading-relaxed text-brand-muted">“{{ $testimonial['quote'] }}”</p>
                        <footer class="mt-4 text-sm font-semibold text-brand-navy">
                            {{ $testimonial['name'] }}
                            @if (! empty($testimonial['is_placeholder']))
                                <span class="block text-xs font-normal text-brand-muted">Placeholder content</span>
                            @endif
                        </footer>
                    </blockquote>
                @endforeach
            </div>
            <div class="mt-8">
                <x-ui.button href="{{ route('results') }}" variant="secondary">Visit results page</x-ui.button>
            </div>
        </div>
    </section>

    <section class="container-page py-14 sm:py-16">
        <h2 class="section-title">{{ config('homepage.coaching_modes.title') }}</h2>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            @foreach (config('homepage.coaching_modes.modes', []) as $mode)
                <article class="card">
                    <h3 class="font-display text-xl font-semibold">{{ $mode['title'] }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-brand-muted">{{ $mode['description'] }}</p>
                    <div class="mt-6">
                        <x-ui.button :href="route($mode['cta']['route'])" variant="primary">{{ $mode['cta']['label'] }}</x-ui.button>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="container-page pb-14 sm:pb-16">
        <h2 class="section-title">{{ config('faqs.title') }}</h2>
        <p class="section-lead">{{ config('faqs.intro') }}</p>
        <div class="mt-8 max-w-3xl">
            <x-site.faq-accordion :items="$faqs" />
        </div>
        <p class="mt-4 text-sm"><a href="{{ route('faq') }}" class="font-semibold text-brand-royal hover:underline">View all FAQs</a></p>
    </section>

    <x-site.contact-cta />

    @push('head')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/katex.min.css">
    @endpush

    @push('scripts')
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/katex.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.11/dist/contrib/auto-render.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof renderMathInElement === 'function') {
                    renderMathInElement(document.querySelector('.math-grid-bg'), {
                        delimiters: [
                            { left: '\\(', right: '\\)', display: false },
                            { left: '\\[', right: '\\]', display: true },
                        ],
                        throwOnError: false,
                    });
                }
            });
        </script>
    @endpush
</x-layouts.app>
