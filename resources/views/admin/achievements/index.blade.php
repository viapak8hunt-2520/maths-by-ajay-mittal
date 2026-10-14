@extends('admin.layouts.app')
@section('page_title', 'Achievements')
@section('content')
    <x-admin.page-header title="Achievements & results" lead="Highlight scores, ranks and milestones on the results page.">
        <a href="{{ route('admin.achievements.create') }}" class="admin-btn-primary">Add achievement</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Title</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($achievements as $item)
                        <tr>
                            <td class="font-semibold">{{ $item->title }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $item->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.achievements.edit', $item) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="3"><div class="admin-empty m-4">No achievements yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($achievements->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $achievements->links() }}</div>
        @endif
    </div>
@endsection
