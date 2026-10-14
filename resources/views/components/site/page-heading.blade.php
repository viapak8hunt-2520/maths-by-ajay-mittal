@props(['title', 'lead' => null, 'align' => 'left'])

<div @class([
    'container-page py-10 sm:py-14',
    'text-center' => $align === 'center',
])>
    <h1 @class(['section-title', 'section-title-center' => $align === 'center'])>{{ $title }}</h1>
    @if ($lead)
        <p @class(['section-lead', 'mx-auto' => $align === 'center'])>{{ $lead }}</p>
    @endif
    {{ $slot ?? '' }}
</div>
