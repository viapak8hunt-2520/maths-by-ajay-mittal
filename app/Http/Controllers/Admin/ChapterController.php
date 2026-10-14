<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ChapterController extends Controller
{
    public function index(Course $course): View
    {
        return view('admin.chapters.index', [
            'course' => $course,
            'chapters' => $course->chapterRecords()->orderBy('display_order')->get(),
        ]);
    }

    public function create(Course $course): View
    {
        return view('admin.chapters.form', [
            'course' => $course,
            'chapter' => new Chapter(['status' => PublicationStatus::Published]),
        ]);
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $course->chapterRecords()->create($this->validated($request));

        return redirect()->route('admin.courses.chapters.index', $course)->with('success', 'Chapter created.');
    }

    public function edit(Chapter $chapter): View
    {
        return view('admin.chapters.form', [
            'course' => $chapter->course,
            'chapter' => $chapter,
        ]);
    }

    public function update(Request $request, Chapter $chapter): RedirectResponse
    {
        $chapter->update($this->validated($request));

        return redirect()->route('admin.courses.chapters.index', $chapter->course)->with('success', 'Chapter updated.');
    }

    public function destroy(Chapter $chapter): RedirectResponse
    {
        $courseId = $chapter->course_id;
        $chapter->delete();

        return redirect()->route('admin.courses.chapters.index', $courseId)->with('success', 'Chapter deleted.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
        ]);
    }
}
