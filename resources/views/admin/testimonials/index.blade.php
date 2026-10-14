@extends('admin.layouts.app')
@section('page_title', 'Testimonials')
@section('content')
    <x-admin.page-header title="Student testimonials" lead="Social proof on the homepage and results page.">
        <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-primary">Add testimonial</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Student</th><th>Course / class</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($testimonials as $item)
                        <tr>
                            <td class="font-semibold">{{ $item->student_name }}</td>
                            <td class="text-slate-600">{{ $item->course_label ?: '—' }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $item->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.testimonials.edit', $item) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4"><div class="admin-empty m-4">No testimonials yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($testimonials->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $testimonials->links() }}</div>
        @endif
    </div>
@endsection
