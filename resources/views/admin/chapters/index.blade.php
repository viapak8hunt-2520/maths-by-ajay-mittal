@extends('admin.layouts.app')
@section('page_title', 'Chapters — '.$course->title)
@section('content')
    <x-admin.page-header :title="'Chapters: '.$course->title" lead="Syllabus units shown on the course detail page.">
        <a class="admin-btn-secondary" href="{{ route('admin.courses.edit', $course) }}">Back to course</a>
        <a class="admin-btn-primary" href="{{ route('admin.courses.chapters.create', $course) }}">Add chapter</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Order</th><th>Title</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($chapters as $chapter)
                        <tr>
                            <td class="text-slate-500">{{ $chapter->display_order }}</td>
                            <td class="font-semibold">{{ $chapter->title }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $chapter->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.chapters.edit', $chapter) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4"><div class="admin-empty m-4">No chapters yet. Add the first unit for this course.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
