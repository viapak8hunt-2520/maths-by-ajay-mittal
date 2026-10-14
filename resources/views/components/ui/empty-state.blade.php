@props(['title' => 'Nothing found', 'message' => 'Try adjusting your filters or search terms.'])

<div class="card col-span-full py-12 text-center">
    <p class="font-display text-xl font-semibold text-brand-navy">{{ $title }}</p>
    <p class="mx-auto mt-2 max-w-md text-sm text-brand-muted">{{ $message }}</p>
    {{ $slot }}
</div>
