@extends('admin.layouts.app')
@section('page_title', 'Course categories')
@section('content')
    <x-admin.page-header title="Course categories" lead="Group programmes (JEE, boards, foundation) for the public catalogue.">
        <a href="{{ route('admin.course-categories.create') }}" class="admin-btn-primary">New category</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Title</th><th>Slug</th><th>Order</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="font-semibold text-slate-900">{{ $category->title }}</td>
                            <td class="text-slate-500">{{ $category->slug }}</td>
                            <td>{{ $category->display_order }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $category->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.course-categories.edit', $category) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="admin-empty m-4">No categories yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($categories->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $categories->links() }}</div>
        @endif
    </div>
@endsection
