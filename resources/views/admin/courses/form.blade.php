@extends('admin.layouts.app')
@section('page_title', $course->exists ? 'Edit course' : 'Create course')
@section('content')
    <x-admin.page-header :title="$course->exists ? 'Edit course' : 'Create course'" lead="Configure syllabus, SEO and publication settings." />

    <form method="post" enctype="multipart/form-data" action="{{ $course->exists ? route('admin.courses.update', $course) : route('admin.courses.store') }}" class="admin-card max-w-4xl space-y-5">
        @csrf
        @if ($course->exists)
            @method('PUT')
        @endif

        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $course->title) }}" required></div>
            <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="{{ old('slug', $course->slug) }}"></div>
            <div><label class="admin-label">Category</label><select class="admin-select" name="course_category_id" required>@foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('course_category_id', $course->course_category_id)==$cat->id)>{{ $cat->title }}</option>@endforeach</select></div>
            <div><label class="admin-label">Status</label><select class="admin-select" name="status" required>@foreach(\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $course->status?->value)===$s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        </div>

        <div><label class="admin-label">Short description</label><textarea class="admin-textarea" rows="2" name="short_description">{{ old('short_description', $course->short_description) }}</textarea></div>
        <div><label class="admin-label">Full description</label><textarea class="admin-textarea" rows="4" name="full_description">{{ old('full_description', $course->full_description) }}</textarea></div>

        <div class="admin-form-actions">
            @if ($course->exists)
                <a class="admin-btn-secondary" href="{{ route('courses.show', $course->slug).'?preview=1' }}" target="_blank">Preview public page</a>
            @endif
            <button class="admin-btn-primary" type="submit">Save course</button>
        </div>
    </form>
@endsection
