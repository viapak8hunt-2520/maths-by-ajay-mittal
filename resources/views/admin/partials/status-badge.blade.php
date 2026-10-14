@php
    $statusValue = $status instanceof \App\Enums\PublicationStatus ? $status->value : (string) $status;
    $class = match ($statusValue) {
        'published' => 'admin-badge-success',
        'draft' => 'admin-badge-warning',
        default => 'admin-badge-neutral',
    };
    $label = $status instanceof \BackedEnum ? $status->label() : ucfirst($statusValue);
@endphp
<span class="{{ $class }}">{{ $label }}</span>
