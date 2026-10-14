@extends('admin.layouts.app')
@section('page_title', 'Enquiry — '.$enquiry->student_name)
@section('content')
    <x-admin.page-header :title="$enquiry->student_name" lead="Submitted {{ $enquiry->created_at->format('d M Y, H:i') }}">
        <a class="admin-btn-secondary" href="{{ route('admin.enquiries.index') }}">All enquiries</a>
    </x-admin.page-header>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="admin-card">
            <h2 class="text-base font-bold text-slate-900">Submission details</h2>
            <dl class="admin-detail-list mt-5">
                <div><dt>Student</dt><dd>{{ $enquiry->student_name }}</dd></div>
                <div><dt>Parent / guardian</dt><dd>{{ $enquiry->parent_name ?: '—' }}</dd></div>
                <div><dt>Phone</dt><dd>{{ $enquiry->phone }}</dd></div>
                <div><dt>Email</dt><dd>{{ $enquiry->email ?: '—' }}</dd></div>
                <div><dt>Course interest</dt><dd>{{ $enquiry->course_interest }}</dd></div>
                <div><dt>Teaching mode</dt><dd>{{ $enquiry->teaching_mode }}</dd></div>
                <div><dt>Message</dt><dd class="font-normal text-slate-700">{{ $enquiry->message ?: '—' }}</dd></div>
            </dl>
        </div>

        <form method="post" action="{{ route('admin.enquiries.update', $enquiry) }}" class="admin-card space-y-4">
            @csrf
            @method('PUT')
            <h2 class="text-base font-bold text-slate-900">Follow-up</h2>
            <div>
                <label class="admin-label">Status</label>
                <select class="admin-select" name="status">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" @selected($enquiry->status === $status)>{{ $status->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="admin-label">Assigned staff</label>
                <select class="admin-select" name="assigned_to">
                    <option value="">—</option>
                    @foreach ($staff as $user)
                        <option value="{{ $user->id }}" @selected($enquiry->assigned_to == $user->id)>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="admin-label">Follow-up date</label>
                <input class="admin-input" type="date" name="follow_up_date" value="{{ old('follow_up_date', optional($enquiry->follow_up_date)->format('Y-m-d')) }}">
            </div>
            <div>
                <label class="admin-label">Outcome</label>
                <input class="admin-input" name="outcome" value="{{ old('outcome', $enquiry->outcome) }}">
            </div>
            <div>
                <label class="admin-label">Internal notes (private)</label>
                <textarea class="admin-textarea" name="internal_notes" rows="5">{{ old('internal_notes', $enquiry->internal_notes) }}</textarea>
            </div>
            <div class="admin-form-actions">
                <button class="admin-btn-primary" type="submit">Update enquiry</button>
            </div>
        </form>
    </div>
@endsection
