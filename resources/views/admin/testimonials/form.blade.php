@extends('admin.layouts.app')
@section('page_title', $testimonial->exists ? 'Edit testimonial' : 'Create testimonial')
@section('content')
    <x-admin.page-header :title="$testimonial->exists ? 'Edit testimonial' : 'Create testimonial'" lead="Short quotes from students or parents." />

    <form method="post" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="admin-card max-w-2xl space-y-4">
        @csrf
        @if ($testimonial->exists)
            @method('PUT')
        @endif

        <div><label class="admin-label">Student name</label><input class="admin-input" name="student_name" value="{{ old('student_name', $testimonial->student_name) }}" required></div>
        <div><label class="admin-label">Course / class</label><input class="admin-input" name="course_label" value="{{ old('course_label', $testimonial->course_label) }}"></div>
        <div><label class="admin-label">Quote</label><textarea class="admin-textarea" name="quote" rows="4" required>{{ old('quote', $testimonial->quote) }}</textarea></div>
        <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $testimonial->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save testimonial</button></div>
    </form>
@endsection
