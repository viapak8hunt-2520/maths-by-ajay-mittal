@extends('admin.layouts.app')
@section('page_title', 'FAQs')
@section('content')
    <x-admin.page-header title="Frequently asked questions" lead="Published items appear on the public FAQ page.">
        <a href="{{ route('admin.faqs.create') }}" class="admin-btn-primary">Add FAQ</a>
    </x-admin.page-header>

    <div class="admin-card-flush">
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Question</th><th>Order</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
                <tbody>
                    @forelse ($faqs as $faq)
                        <tr>
                            <td class="max-w-xl font-semibold">{{ $faq->question }}</td>
                            <td class="text-slate-500">{{ $faq->display_order }}</td>
                            <td>@include('admin.partials.status-badge', ['status' => $faq->status])</td>
                            <td class="text-right"><a class="admin-link" href="{{ route('admin.faqs.edit', $faq) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4"><div class="admin-empty m-4">No FAQs yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($faqs->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $faqs->links() }}</div>
        @endif
    </div>
@endsection
