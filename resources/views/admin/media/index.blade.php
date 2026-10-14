@extends('admin.layouts.app')
@section('page_title', 'Media library')
@section('content')
    <x-admin.page-header title="Media library" lead="Uploaded PDFs and files tracked when you attach them to content." />

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Filename</th><th>Type</th><th>Size</th><th>Collection</th><th>Uploaded</th></tr></thead>
                <tbody>
                    @forelse ($media as $file)
                        <tr>
                            <td class="font-medium text-slate-900">{{ $file->filename }}</td>
                            <td><span class="admin-badge-neutral">{{ $file->mime_type }}</span></td>
                            <td class="text-slate-600">{{ number_format($file->size_bytes / 1024, 1) }} KB</td>
                            <td>{{ $file->collection ?: '—' }}</td>
                            <td class="text-slate-500">{{ $file->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="admin-empty m-4">No media uploaded yet. Files appear here when attached to resources or test papers.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($media->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $media->links() }}</div>
        @endif
    </div>
@endsection
