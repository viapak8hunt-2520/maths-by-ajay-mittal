@props(['course'])

<article class="card card-accent-top flex h-full flex-col">
    <div class="flex flex-wrap gap-2">
        @foreach (($course['tags'] ?? []) as $tag)
            <span class="rounded-full bg-brand-royal/10 px-2.5 py-0.5 text-xs font-medium text-brand-royal">{{ $tag }}</span>
        @endforeach
    </div>
    <h3 class="mt-4 font-display text-xl font-semibold text-brand-navy">
        <a href="{{ route('courses.show', $course['slug']) }}" class="hover:text-brand-royal">{{ $course['title'] }}</a>
    </h3>
    <p class="mt-2 flex-1 text-sm leading-relaxed text-brand-muted">{{ $course['short_description'] }}</p>
    <dl class="mt-4 grid gap-2 text-xs text-brand-navy/80">
        <div class="flex justify-between gap-4 border-t border-brand-navy/5 pt-3">
            <dt class="font-medium">Audience</dt>
            <dd class="text-right">{{ $course['audience'] ?? '—' }}</dd>
        </div>
        <div class="flex justify-between gap-4">
            <dt class="font-medium">Mode</dt>
            <dd class="text-right capitalize">{{ implode(' · ', $course['teaching_modes'] ?? []) }}</dd>
        </div>
    </dl>
    <div class="mt-5">
        <x-ui.button href="{{ route('courses.show', $course['slug']) }}" variant="secondary" class="w-full">
            View course <x-ui.icon name="arrow-right" class="h-4 w-4" />
        </x-ui.button>
    </div>
</article>
