<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Study Resources'],
]">
    <x-site.page-heading
        title="Study resources"
        lead="Free notes, worksheets, formula sheets and test papers. Filter by class, subject, course or resource type."
    />

    <section class="container-page pb-14">
        <form method="get" class="card grid gap-4 lg:grid-cols-3">
            <div class="lg:col-span-3">
                <label for="q" class="text-sm font-medium">Search</label>
                <input id="q" name="q" value="{{ $filters['q'] }}" placeholder="Search resources"
                       class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
            </div>
            <div>
                <label for="course" class="text-sm font-medium">Course</label>
                <select id="course" name="course" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <option value="">All courses</option>
                    @foreach ($filterOptions['courses'] as $course)
                        <option value="{{ $course['slug'] }}" @selected($filters['course'] === $course['slug'])>{{ $course['title'] }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="class" class="text-sm font-medium">Class</label>
                <select id="class" name="class" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <option value="">All classes</option>
                    @foreach ($filterOptions['classes'] as $class)
                        <option value="{{ $class }}" @selected($filters['class'] === $class)>Class {{ $class }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="subject" class="text-sm font-medium">Subject</label>
                <select id="subject" name="subject" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <option value="">All subjects</option>
                    @foreach ($filterOptions['subjects'] as $subject)
                        <option value="{{ $subject }}" @selected($filters['subject'] === $subject)>{{ $subject }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="type" class="text-sm font-medium">Resource type</label>
                <select id="type" name="type" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <option value="">All types</option>
                    @foreach ($types as $key => $label)
                        <option value="{{ $key }}" @selected($filters['type'] === $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="chapter" class="text-sm font-medium">Chapter contains</label>
                <input id="chapter" name="chapter" value="{{ $filters['chapter'] }}" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
            </div>
            <div class="flex items-end">
                <x-ui.button type="submit" variant="primary" class="w-full">Apply filters</x-ui.button>
            </div>
        </form>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($resources as $resource)
                <x-cards.resource-card :resource="$resource" :types="$types" />
            @empty
                <x-ui.empty-state title="No resources found" message="Adjust filters or explore the full library.">
                    <div class="mt-6">
                        <x-ui.button href="{{ route('resources.index') }}" variant="secondary">Clear filters</x-ui.button>
                    </div>
                </x-ui.empty-state>
            @endforelse
        </div>
    </section>
</x-layouts.app>
