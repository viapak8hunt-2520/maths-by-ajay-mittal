@extends('admin.layouts.app')
@section('page_title', $achievement->exists ? 'Edit achievement' : 'Create achievement')
@section('content')
    <x-admin.page-header :title="$achievement->exists ? 'Edit achievement' : 'Create achievement'" lead="Showcase results on the public results page." />

    <form method="post" action="{{ $achievement->exists ? route('admin.achievements.update', $achievement) : route('admin.achievements.store') }}" class="admin-card max-w-2xl space-y-4">
        @csrf
        @if ($achievement->exists)
            @method('PUT')
        @endif

        <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $achievement->title) }}" required></div>
        <div><label class="admin-label">Description</label><textarea class="admin-textarea" name="description" rows="4">{{ old('description', $achievement->description) }}</textarea></div>
        <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $achievement->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save achievement</button></div>
    </form>
@endsection
