@props(['name', 'class' => 'h-5 w-5'])

@switch($name)
    @case('dashboard')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h6v8H4V5zm10 0h6v5h-6V5zM4 15h6v4H4v-4zm10 3h6v6h-6v-6z"/></svg>
        @break
    @case('courses')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5l8 4.5-8 4.5-8-4.5 8-4.5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 11v5l8 4.5 8-4.5v-5"/></svg>
        @break
    @case('folder')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/></svg>
        @break
    @case('document')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4h8l4 4v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/><path stroke-linecap="round" d="M16 4v4h4"/></svg>
        @break
    @case('clipboard')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5h6a2 2 0 0 1 2 2v12H7V7a2 2 0 0 1 2-2z"/><path stroke-linecap="round" d="M9 3h6v4H9V3z"/></svg>
        @break
    @case('chat')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-4 3v-3H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        @break
    @case('star')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.9 6.5 7.1.6-5.4 4.6 1.7 7-6.3-3.8-6.3 3.8 1.7-7-5.4-4.6 7.1-.6L12 3z"/></svg>
        @break
    @case('trophy')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4h8v3a4 4 0 0 1-8 0V4z"/><path stroke-linecap="round" d="M6 4H4v1a3 3 0 0 0 3 3M18 4h2v1a3 3 0 0 1-3 3"/><path stroke-linecap="round" d="M12 11v3M9 20h6M10 14h4v3h-4v-3z"/></svg>
        @break
    @case('globe')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M3 12h18M12 3c2.5 2.8 4 6 4 9s-1.5 6.2-4 9c-2.5-2.8-4-6.2-4-9s1.5-6.2 4-9z"/></svg>
        @break
    @case('photo')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="10" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 16l-5-5-4 4-2-2-5 5"/></svg>
        @break
    @case('inbox')
        <svg {{ $attributes->merge(['class' => $class]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4V6z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 10l6.5 4h3L20 10"/></svg>
        @break
    @default
        <span class="{{ $class }} inline-block h-2 w-2 rounded-full bg-indigo-400"></span>
@endswitch
