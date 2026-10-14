@extends('admin.layouts.app')
@section('page_title', $resource->exists ? 'Edit resource' : 'Create resource')
@section('content')
    <x-admin.page-header :title="$resource->exists ? 'Edit resource' : 'Create resource'" lead="Upload a PDF and link it to a course for the public library." />

    <form method="post" enctype="multipart/form-data" action="{{ $resource->exists ? route('admin.resources.update', $resource) : route('admin.resources.store') }}" class="admin-card max-w-3xl space-y-4">
        @csrf
        @if ($resource->exists)
            @method('PUT')
        @endif

        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $resource->title) }}" required></div>
            <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="{{ old('slug', $resource->slug) }}"></div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Type</label><select class="admin-select" name="resource_type">@foreach ($types as $key => $label)<option value="{{ $key }}" @selected(old('resource_type', $resource->resource_type) === $key)>{{ $label }}</option>@endforeach</select></div>
            <div><label class="admin-label">Course</label><select class="admin-select" name="course_id"><option value="">—</option>@foreach ($courses as $course)<option value="{{ $course->id }}" @selected(old('course_id', $resource->course_id) == $course->id)>{{ $course->title }}</option>@endforeach</select></div>
        </div>
        <div><label class="admin-label">Short description</label><textarea class="admin-textarea" name="short_description" rows="3">{{ old('short_description', $resource->short_description) }}</textarea></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Class</label><input class="admin-input" name="class_level" value="{{ old('class_level', $resource->class_level) }}"></div>
            <div><label class="admin-label">Subject</label><input class="admin-input" name="subject" value="{{ old('subject', $resource->subject) }}"></div>
        </div>
        <div><label class="admin-label">Chapter label</label><input class="admin-input" name="chapter_label" value="{{ old('chapter_label', $resource->chapter_label) }}"></div>
        <div>
            <label class="admin-label">PDF file</label>
            <input class="admin-file-input" type="file" name="file" accept="application/pdf">
            @if ($resource->file_path)
                <p class="mt-2 text-xs text-slate-500">Current: {{ $resource->file_path }}</p>
            @endif
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $resource->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
            <div class="flex items-end pb-1">
                <label class="inline-flex items-center gap-2 text-sm font-medium text-slate-700">
                    <input type="checkbox" class="rounded border-slate-300 text-indigo-600" name="is_featured" value="1" @checked(old('is_featured', $resource->is_featured))> Featured on library
                </label>
            </div>
        </div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save resource</button></div>
    </form>
@endsection
