@extends('admin.layouts.app')
@section('page_title', $chapter->exists ? 'Edit chapter' : 'Create chapter')
@section('content')
    <x-admin.page-header :title="$chapter->exists ? 'Edit chapter' : 'Create chapter'" :lead="'Course: '.$course->title" />

    <form method="post" action="{{ $chapter->exists ? route('admin.chapters.update', $chapter) : route('admin.courses.chapters.store', $course) }}" class="admin-card max-w-xl space-y-4">
        @csrf
        @if ($chapter->exists)
            @method('PUT')
        @endif

        <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $chapter->title) }}" required></div>
        <div><label class="admin-label">Description</label><textarea class="admin-textarea" name="description" rows="4">{{ old('description', $chapter->description) }}</textarea></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Display order</label><input class="admin-input" type="number" name="display_order" value="{{ old('display_order', $chapter->display_order ?? 0) }}"></div>
            <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $chapter->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        </div>
        <div class="admin-form-actions">
            <a class="admin-btn-secondary" href="{{ route('admin.courses.chapters.index', $course) }}">Cancel</a>
            <button class="admin-btn-primary" type="submit">Save chapter</button>
        </div>
    </form>
@endsection
