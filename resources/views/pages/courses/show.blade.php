@php
    $types = config('resources.types');
@endphp

<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Courses', 'url' => route('courses.index')],
    ['label' => $course['title']],
]">
    <section class="container-page py-10 sm:py-14">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">{{ ucfirst(str_replace('-', ' ', $course['category'])) }}</p>
                <h1 class="mt-2 font-display text-3xl font-semibold sm:text-4xl">{{ $course['title'] }}</h1>
                <p class="mt-4 text-base leading-relaxed text-brand-muted">{{ $course['short_description'] }}</p>

                <dl class="mt-8 grid gap-3 text-sm sm:grid-cols-2">
                    <div class="card py-4">
                        <dt class="text-xs font-semibold uppercase text-brand-muted">Class / level</dt>
                        <dd class="mt-1 font-medium">{{ $course['class'] ?? '—' }}</dd>
                    </div>
                    <div class="card py-4">
                        <dt class="text-xs font-semibold uppercase text-brand-muted">Teaching mode</dt>
                        <dd class="mt-1 font-medium capitalize">{{ implode(', ', $course['teaching_modes'] ?? []) }}</dd>
                    </div>
                </dl>

                <h2 class="mt-10 font-display text-2xl font-semibold">Subjects covered</h2>
                <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                    @foreach ($course['subjects'] ?? [] as $subject)
                        <li>{{ $subject }}</li>
                    @endforeach
                </ul>

                <h2 class="mt-10 font-display text-2xl font-semibold">Syllabus overview</h2>
                <div class="mt-4 space-y-4">
                    @foreach ($course['syllabus'] ?? [] as $block)
                        <article class="card">
                            <h3 class="font-semibold text-brand-navy">{{ $block['title'] }}</h3>
                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                                @foreach ($block['topics'] ?? [] as $topic)
                                    <li>{{ $topic }}</li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>

                <div class="mt-10 grid gap-6 md:grid-cols-2">
                    <div>
                        <h2 class="font-display text-xl font-semibold">Benefits</h2>
                        <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                            @foreach ($course['benefits'] ?? [] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h2 class="font-display text-xl font-semibold">Learning outcomes</h2>
                        <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-brand-muted">
                            @foreach ($course['outcomes'] ?? [] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="card">
                    <h2 class="font-display text-lg font-semibold">Admission enquiry</h2>
                    <p class="mt-2 text-sm text-brand-muted">Share your goals and preferred learning mode. Fee schedules and batch timings are shared during consultation.</p>
                    <div class="mt-4 flex flex-col gap-2">
                        <x-ui.button href="{{ route('contact', ['course' => $course['slug']]) }}" variant="primary" class="w-full">Enquire now</x-ui.button>
                        <x-ui.button href="{{ route('resources.index', ['course' => $course['slug']]) }}" variant="secondary" class="w-full">Related resources</x-ui.button>
                    </div>
                </div>

                @if (! empty($course['chapters']))
                    <div class="card">
                        <h2 class="font-display text-lg font-semibold">Chapters</h2>
                        <ol class="mt-3 list-decimal space-y-1 pl-5 text-sm text-brand-muted">
                            @foreach ($course['chapters'] as $chapter)
                                <li>{{ $chapter }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
            </aside>
        </div>

        @if ($resources->isNotEmpty())
            <div class="mt-14">
                <h2 class="section-title">Study resources for this course</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($resources as $resource)
                        <x-cards.resource-card :resource="$resource" :types="$types" />
                    @endforeach
                </div>
            </div>
        @endif

        @if ($testPapers->isNotEmpty())
            <div class="mt-14">
                <h2 class="section-title">Test papers & mock tests</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($testPapers as $paper)
                        <x-cards.resource-card :resource="$paper" :types="$types" />
                    @endforeach
                </div>
            </div>
        @endif

        @if ($relatedCourses->isNotEmpty())
            <div class="mt-14">
                <h2 class="section-title">Related courses</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-3">
                    @foreach ($relatedCourses as $related)
                        <x-cards.course-card :course="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <x-site.contact-cta />
</x-layouts.app>
