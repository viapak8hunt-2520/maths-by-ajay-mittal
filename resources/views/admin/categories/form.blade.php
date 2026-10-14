@extends('admin.layouts.app')
@section('page_title', $category->exists ? 'Edit category' : 'Create category')
@section('content')
    <x-admin.page-header :title="$category->exists ? 'Edit category' : 'Create category'" lead="Organise courses into programmes visitors can browse." />

    <form method="post" action="{{ $category->exists ? route('admin.course-categories.update', $category) : route('admin.course-categories.store') }}" class="admin-card max-w-xl space-y-4">
        @csrf
        @if ($category->exists)
            @method('PUT')
        @endif

        <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $category->title) }}" required></div>
        <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="{{ old('slug', $category->slug) }}"></div>
        <div><label class="admin-label">Subtitle</label><input class="admin-input" name="subtitle" value="{{ old('subtitle', $category->subtitle) }}"></div>
        <div><label class="admin-label">Description</label><textarea class="admin-textarea" name="description" rows="3">{{ old('description', $category->description) }}</textarea></div>
        <div><label class="admin-label">Subjects (one per line)</label><textarea class="admin-textarea" name="subjects" rows="4">{{ old('subjects', implode("\n", $category->subjects ?? [])) }}</textarea></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Display order</label><input class="admin-input" type="number" name="display_order" value="{{ old('display_order', $category->display_order ?? 0) }}"></div>
            <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $category->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        </div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save category</button></div>
    </form>
@endsection
