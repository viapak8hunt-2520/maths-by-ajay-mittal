@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_description', 'Your coaching content and admissions at a glance')

@section('content')
    <div data-admin-dashboard class="space-y-8">
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="admin-stat admin-stat-indigo">
            <p class="admin-stat-label">Total courses</p>
            <p class="admin-stat-value">{{ $stats['courses_total'] }}</p>
            <p class="admin-stat-meta">{{ $stats['courses_published'] }} published · {{ $stats['courses_draft'] }} drafts</p>
        </div>
        <div class="admin-stat admin-stat-violet">
            <p class="admin-stat-label">Study resources</p>
            <p class="admin-stat-value">{{ $stats['resources_published'] }}</p>
            <p class="admin-stat-meta">Published on the public site</p>
        </div>
        <div class="admin-stat admin-stat-cyan">
            <p class="admin-stat-label">Test papers</p>
            <p class="admin-stat-value">{{ $stats['test_papers_total'] }}</p>
            <p class="admin-stat-meta">All statuses in library</p>
        </div>
        <div class="admin-stat admin-stat-emerald">
            <p class="admin-stat-label">New enquiries</p>
            <p class="admin-stat-value">{{ $stats['enquiries_new'] }}</p>
            <p class="admin-stat-meta">{{ $stats['enquiries_total'] }} total received</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 xl:grid-cols-3">
        <div class="admin-card xl:col-span-1">
            <h2 class="text-base font-bold text-slate-900">Quick actions</h2>
            <p class="mt-1 text-sm text-slate-500">Jump into common workflows</p>
            <div class="mt-5 space-y-2">
                @can('manage-content')
                    <a class="admin-quick-action" href="{{ route('admin.courses.create') }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">+</span>
                        Create course
                    </a>
                    <a class="admin-quick-action" href="{{ route('admin.resources.create') }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-cyan-100 text-cyan-700">↑</span>
                        Upload resource
                    </a>
                    <a class="admin-quick-action" href="{{ route('admin.test-papers.create') }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 text-violet-700">✎</span>
                        Add test paper
                    </a>
                @endcan
                @can('manage-enquiries')
                    <a class="admin-quick-action" href="{{ route('admin.enquiries.index') }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">✉</span>
                        Review enquiries
                    </a>
                @endcan
            </div>
        </div>

        <div class="admin-card-flush xl:col-span-2">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recent enquiries</h2>
                <p class="text-sm text-slate-500">Latest admission interest from the public site</p>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Course interest</th>
                            <th>Status</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentEnquiries as $enquiry)
                            <tr>
                                <td><a class="admin-link" href="{{ route('admin.enquiries.show', $enquiry) }}">{{ $enquiry->student_name }}</a></td>
                                <td>{{ $enquiry->course_interest }}</td>
                                <td><span class="admin-badge-info">{{ $enquiry->status->label() }}</span></td>
                                <td class="text-slate-500">{{ $enquiry->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="admin-empty my-4">No enquiries yet. They will appear here when visitors submit the contact form.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <div class="admin-card-flush">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recently updated courses</h2>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Status</th><th>Updated</th></tr></thead>
                    <tbody>
                        @forelse ($recentCourses as $course)
                            <tr>
                                <td><a class="admin-link" href="{{ route('admin.courses.edit', $course) }}">{{ $course->title }}</a></td>
                                <td><span class="admin-badge-neutral">{{ $course->status->label() }}</span></td>
                                <td class="text-slate-500">{{ $course->updated_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3"><div class="admin-empty my-4">No courses yet.</div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card-flush">
            <div class="border-b border-slate-100 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Recent test papers</h2>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Type</th><th>Updated</th></tr></thead>
                    <tbody>
                        @forelse ($recentPapers as $paper)
                            <tr>
                                <td><a class="admin-link" href="{{ route('admin.test-papers.edit', $paper) }}">{{ $paper->title }}</a></td>
                                <td><span class="admin-badge-neutral">{{ $paper->paper_type }}</span></td>
                                <td class="text-slate-500">{{ $paper->updated_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3"><div class="admin-empty my-4">No test papers yet.</div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
