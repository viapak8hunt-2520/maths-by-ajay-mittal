@extends('admin.layouts.app')
@section('page_title', $testPaper->exists ? 'Edit test paper' : 'Create test paper')
@section('content')
    <x-admin.page-header :title="$testPaper->exists ? 'Edit test paper' : 'Create test paper'" lead="Attach question paper and optional answer key PDFs." />

    <form method="post" enctype="multipart/form-data" action="{{ $testPaper->exists ? route('admin.test-papers.update', $testPaper) : route('admin.test-papers.store') }}" class="admin-card max-w-3xl space-y-4">
        @csrf
        @if ($testPaper->exists)
            @method('PUT')
        @endif

        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Title</label><input class="admin-input" name="title" value="{{ old('title', $testPaper->title) }}" required></div>
            <div><label class="admin-label">Slug</label><input class="admin-input" name="slug" value="{{ old('slug', $testPaper->slug) }}"></div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div><label class="admin-label">Paper type</label><input class="admin-input" name="paper_type" value="{{ old('paper_type', $testPaper->paper_type) }}"></div>
            <div><label class="admin-label">Course</label><select class="admin-select" name="course_id"><option value="">—</option>@foreach ($courses as $course)<option value="{{ $course->id }}" @selected(old('course_id', $testPaper->course_id) == $course->id)>{{ $course->title }}</option>@endforeach</select></div>
        </div>
        <div><label class="admin-label">Description</label><textarea class="admin-textarea" name="description" rows="3">{{ old('description', $testPaper->description) }}</textarea></div>
        <div><label class="admin-label">Question paper PDF</label><input class="admin-file-input" type="file" name="question_paper" accept="application/pdf"></div>
        <div><label class="admin-label">Answer key PDF</label><input class="admin-file-input" type="file" name="answer_key" accept="application/pdf"></div>
        <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $testPaper->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save test paper</button></div>
    </form>
@endsection
