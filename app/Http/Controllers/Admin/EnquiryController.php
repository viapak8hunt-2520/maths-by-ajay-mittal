<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EnquiryStatus;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(Request $request): View
    {
        $enquiries = Enquiry::query()
            ->when($request->filled('q'), function ($q) use ($request) {
                $term = '%'.$request->string('q').'%';
                $q->where(function ($inner) use ($term) {
                    $inner->where('student_name', 'like', $term)
                        ->orWhere('phone', 'like', $term)
                        ->orWhere('email', 'like', $term);
                });
            })
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(Enquiry $enquiry): View
    {
        return view('admin.enquiries.show', [
            'enquiry' => $enquiry,
            'staff' => User::query()->where('is_active', true)->orderBy('name')->get(),
            'statuses' => EnquiryStatus::cases(),
        ]);
    }

    public function update(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::enum(EnquiryStatus::class)],
            'internal_notes' => ['nullable', 'string'],
            'follow_up_date' => ['nullable', 'date'],
            'outcome' => ['nullable', 'string', 'max:500'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $enquiry->update($data);

        return redirect()->route('admin.enquiries.show', $enquiry)->with('success', 'Enquiry updated.');
    }
}
