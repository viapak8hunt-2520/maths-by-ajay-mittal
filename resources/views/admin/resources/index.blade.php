@extends('admin.layouts.app')
@section('page_title', 'Study resources')
@section('content')
    <x-admin.page-header title="Study resources" lead="Notes, worksheets and PDFs for the public library.">
        <a href="{{ route('admin.resources.create') }}" class="admin-btn-primary">Add resource</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Title</th><th>Type</th><th>Course</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($resources as $resource)
                        <tr>
                            <td class="font-semibold">{{ $resource->title }}</td>
                            <td><span class="admin-badge-info">{{ $resource->resource_type }}</span></td>
                            <td>{{ $resource->course?->title ?: '—' }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $resource->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.resources.edit', $resource) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="admin-empty m-4">No study resources yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($resources->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $resources->links() }}</div>
        @endif
    </div>
@endsection
