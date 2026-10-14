@extends('admin.layouts.app')
@section('page_title', 'Test papers')
@section('content')
    <x-admin.page-header title="Test papers" lead="Question papers and answer keys for download on the site.">
        <a href="{{ route('admin.test-papers.create') }}" class="admin-btn-primary">Add test paper</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Title</th><th>Type</th><th>Files</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($testPapers as $paper)
                        <tr>
                            <td class="font-semibold">{{ $paper->title }}</td>
                            <td><span class="admin-badge-neutral">{{ $paper->paper_type }}</span></td>
                            <td class="text-slate-600">
                                @if ($paper->question_paper_path)<span class="admin-badge-info mr-1">Q</span>@endif
                                @if ($paper->answer_key_path)<span class="admin-badge-success">A</span>@endif
                                @if (! $paper->question_paper_path && ! $paper->answer_key_path)—@endif
                            </td>
                            <td>@include('admin.partials.status-badge', ['status' => $paper->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.test-papers.edit', $paper) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="admin-empty m-4">No test papers yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($testPapers->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $testPapers->links() }}</div>
        @endif
    </div>
@endsection
