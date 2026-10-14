@extends('admin.layouts.app')
@section('title', 'Courses')
@section('page_title', 'Courses')
@section('page_description', 'Manage programmes, syllabus and publication status')

@section('content')
    <x-admin.page-header title="Course catalogue" lead="Search, filter and edit mathematics programmes shown on the public website.">
        <a href="{{ route('admin.courses.create') }}" class="admin-btn-primary">New course</a>
    </x-admin.page-header>

    <div class="admin-card mb-5">
        <form method="get" class="flex flex-col gap-3 sm:flex-row sm:items-end">
            <div class="flex-1">
                <label class="admin-label">Search</label>
                <input class="admin-input" name="q" value="{{ request('q') }}" placeholder="Search by title…">
            </div>
            <div class="sm:w-48">
                <label class="admin-label">Status</label>
                <select class="admin-select" name="status">
                    <option value="">All statuses</option>
                    @foreach (\App\Enums\PublicationStatus::cases() as $s)
                        <option value="{{ $s->value }}" @selected(request('status') === $s->value)>{{ $s->label() }}</option>
                    @endforeach
                </select>
            </div>
            <button class="admin-btn-secondary" type="submit">Apply</button>
        </form>
    </div>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Category</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>
                                <p class="font-semibold text-slate-900">{{ $course->title }}</p>
                                <p class="text-xs text-slate-500">{{ $course->slug }}</p>
                            </td>
                            <td>{{ $course->category?->title }}</td>
                            <td>{{ $course->target_class ?: '—' }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $course->status])</td>
                            <td class="text-slate-500">{{ $course->updated_at->format('d M Y') }}</td>
                            <td class="text-right whitespace-nowrap">
                                <a class="admin-link mr-3" href="{{ route('admin.courses.edit', $course) }}">Edit</a>
                                <a class="admin-link mr-3" href="{{ route('admin.courses.chapters.index', $course) }}">Chapters</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="admin-empty m-4">No courses match your filters.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($courses->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $courses->links() }}</div>
        @endif
    </div>
@endsection
