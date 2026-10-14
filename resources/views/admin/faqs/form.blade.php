@extends('admin.layouts.app')
@section('page_title', $faq->exists ? 'Edit FAQ' : 'Create FAQ')
@section('content')
    <x-admin.page-header :title="$faq->exists ? 'Edit FAQ' : 'Create FAQ'" lead="Keep answers clear and concise for parents and students." />

    <form method="post" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" class="admin-card max-w-2xl space-y-4">
        @csrf
        @if ($faq->exists)
            @method('PUT')
        @endif

        <div><label class="admin-label">Question</label><input class="admin-input" name="question" value="{{ old('question', $faq->question) }}" required></div>
        <div><label class="admin-label">Answer</label><textarea class="admin-textarea" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div><label class="admin-label">Display order</label><input class="admin-input" type="number" name="display_order" value="{{ old('display_order', $faq->display_order ?? 0) }}"></div>
            <div><label class="admin-label">Status</label><select class="admin-select" name="status">@foreach (\App\Enums\PublicationStatus::cases() as $s)<option value="{{ $s->value }}" @selected(old('status', $faq->status?->value) === $s->value)>{{ $s->label() }}</option>@endforeach</select></div>
        </div>
        <div class="admin-form-actions"><button class="admin-btn-primary" type="submit">Save FAQ</button></div>
    </form>
@endsection
