<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EnquiryStatus;
use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\StudyResource;
use App\Models\TestPaper;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'courses_total' => Course::count(),
                'courses_published' => Course::where('status', PublicationStatus::Published)->count(),
                'courses_draft' => Course::where('status', PublicationStatus::Draft)->count(),
                'test_papers_total' => TestPaper::count(),
                'resources_published' => StudyResource::where('status', PublicationStatus::Published)->count(),
                'enquiries_total' => Enquiry::count(),
                'enquiries_new' => Enquiry::where('status', EnquiryStatus::New)->count(),
            ],
            'recentCourses' => Course::query()->latest('updated_at')->limit(5)->get(),
            'recentPapers' => TestPaper::query()->latest('updated_at')->limit(5)->get(),
            'recentEnquiries' => Enquiry::query()->latest()->limit(5)->get(),
        ]);
    }
}
