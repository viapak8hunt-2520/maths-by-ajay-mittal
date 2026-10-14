<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Services\EnquiryService;
use App\Support\Content\CourseCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(CourseCatalog $courses): View
    {
        $courseSlug = request()->string('course')->toString();
        $prefillCourse = $courseSlug ? $courses->findBySlug($courseSlug) : null;

        return view('pages.contact', [
            'courses' => $courses->all(),
            'prefillCourseTitle' => $prefillCourse['title'] ?? ($courseSlug ?: null),
            'seo' => [
                'title' => 'Contact & Admissions — '.config('site.name'),
                'description' => 'Enquire about mathematics coaching, batches and study resources.',
            ],
        ]);
    }

    public function store(StoreEnquiryRequest $request, EnquiryService $enquiries): RedirectResponse
    {
        $data = $request->validated();
        unset($data['website']);

        $enquiries->submit($data);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you. Your enquiry has been received. We will contact you soon.');
    }
}
