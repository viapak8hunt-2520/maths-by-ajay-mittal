<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Courses'],
]">
    <x-site.page-heading
        title="Courses"
        lead="Browse mathematics programmes for school classes, senior secondary boards and competitive examinations."
    />

    <section class="container-page pb-14">
        <form method="get" action="{{ route('courses.index') }}" class="card grid gap-4 md:grid-cols-[1fr_auto_auto] md:items-end">
            <div>
                <label for="q" class="text-sm font-medium text-brand-navy">Search</label>
                <input id="q" name="q" value="{{ $search }}" placeholder="Search by course title or tag"
                       class="mt-1 w-full rounded-lg border border-brand-navy/15 bg-white px-3 py-2 text-sm focus:border-brand-royal focus:outline-none focus:ring-2 focus:ring-brand-royal/20">
            </div>
            <div>
                <label for="category" class="text-sm font-medium text-brand-navy">Category</label>
                <select id="category" name="category" class="mt-1 w-full rounded-lg border border-brand-navy/15 bg-white px-3 py-2 text-sm">
                    <option value="">All categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($activeCategory === $category['id'])>{{ $category['title'] }}</option>
                    @endforeach
                </select>
            </div>
            <x-ui.button type="submit" variant="primary">Apply filters</x-ui.button>
        </form>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($courses as $course)
                <x-cards.course-card :course="$course" />
            @empty
                <x-ui.empty-state title="No courses match your filters" message="Try clearing the category or changing your search keywords.">
                    <div class="mt-6">
                        <x-ui.button href="{{ route('courses.index') }}" variant="secondary">Reset filters</x-ui.button>
                    </div>
                </x-ui.empty-state>
            @endforelse
        </div>
    </section>
</x-layouts.app>
