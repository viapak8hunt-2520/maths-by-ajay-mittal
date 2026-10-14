@extends('admin.layouts.app')
@section('page_title', 'Enquiries')
@section('content')
    <x-admin.page-header title="Admission enquiries" lead="Leads from the contact form — assign staff and track follow-ups." />

    <div class="admin-card mb-5">
        <form method="get" class="flex flex-col gap-3 sm:flex-row sm:items-end">
            <div class="flex-1">
                <label class="admin-label">Search</label>
                <input class="admin-input" name="q" value="{{ request('q') }}" placeholder="Name, phone or course…">
            </div>
            <div class="sm:w-48">
                <label class="admin-label">Status</label>
                <select class="admin-select" name="status">
                    <option value="">All statuses</option>
                    @foreach (\App\Enums\EnquiryStatus::cases() as $s)
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
                <thead><tr><th>Student</th><th>Phone</th><th>Course interest</th><th>Status</th><th>Submitted</th></tr></thead>
                <tbody>
                    @forelse ($enquiries as $enquiry)
                        <tr>
                            <td><a class="admin-link font-semibold" href="{{ route('admin.enquiries.show', $enquiry) }}">{{ $enquiry->student_name }}</a></td>
                            <td>{{ $enquiry->phone }}</td>
                            <td>{{ $enquiry->course_interest }}</td>
                            <td><span class="admin-badge-info">{{ $enquiry->status->label() }}</span></td>
                            <td class="text-slate-500">{{ $enquiry->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="admin-empty m-4">No enquiries match your filters.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($enquiries->hasPages())
            <div class="border-t border-slate-100 px-4 py-3">{{ $enquiries->links() }}</div>
        @endif
    </div>
@endsection
