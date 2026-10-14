@props(['title', 'lead' => null])

<div class="admin-page-header">
    <div>
        <h2 class="admin-page-title">{{ $title }}</h2>
        @if ($lead)
            <p class="admin-page-lead">{{ $lead }}</p>
        @endif
    </div>
    @if (trim($slot ?? '') !== '')
        <div class="flex flex-wrap gap-2">{{ $slot }}</div>
    @endif
</div>
