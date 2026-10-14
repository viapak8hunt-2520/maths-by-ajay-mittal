<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::query()
            ->with('category')
            ->when($request->filled('q'), fn ($q) => $q->where('title', 'like', '%'.$request->string('q').'%'))
            ->when($request->filled('category'), fn ($q) => $q->whereHas('category', fn ($c) => $c->where('slug', $request->string('category'))))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->ordered()
            ->paginate(15)
            ->withQueryString();

        return view('admin.courses.index', [
            'courses' => $courses,
            'categories' => CourseCategory::ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.courses.form', [
            'course' => new Course(['status' => PublicationStatus::Draft]),
            'categories' => CourseCategory::ordered()->get(),
        ]);
    }

    public function store(StoreCourseRequest $request, FileUploadService $files): RedirectResponse
    {
        $data = $this->mappedData($request->validated());

        if ($request->hasFile('featured_image')) {
            $data['featured_image_path'] = $files->storeImage($request->file('featured_image'), 'courses');
        }

        if (($data['status'] ?? null) === PublicationStatus::Published->value) {
            $data['published_at'] = now();
        }

        Course::query()->create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created.');
    }

    public function edit(Course $course): View
    {
        return view('admin.courses.form', [
            'course' => $course,
            'categories' => CourseCategory::ordered()->get(),
        ]);
    }

    public function update(StoreCourseRequest $request, Course $course, FileUploadService $files): RedirectResponse
    {
        $data = $this->mappedData($request->validated(), $course);

        if ($request->hasFile('featured_image')) {
            $files->deleteIfUnused($course->featured_image_path);
            $data['featured_image_path'] = $files->storeImage($request->file('featured_image'), 'courses');
        }

        if (($data['status'] ?? $course->status->value) === PublicationStatus::Published->value && ! $course->published_at) {
            $data['published_at'] = now();
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }

    public function duplicate(Course $course): RedirectResponse
    {
        $copy = $course->replicate();
        $copy->title = $course->title.' (Copy)';
        $copy->slug = Str::slug($copy->title).'-'.Str::random(4);
        $copy->status = PublicationStatus::Draft;
        $copy->published_at = null;
        $copy->save();

        return redirect()->route('admin.courses.edit', $copy)->with('success', 'Course duplicated.');
    }

    protected function mappedData(array $validated, ?Course $course = null): array
    {
        $jsonFields = ['teaching_modes', 'tags', 'subjects', 'syllabus', 'chapters', 'benefits', 'outcomes', 'related_course_slugs'];

        foreach ($jsonFields as $field) {
            if (isset($validated[$field]) && is_string($validated[$field])) {
                $decoded = json_decode($validated[$field], true);
                $validated[$field] = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
            }
        }

        if (empty($validated['slug'] ?? null)) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        return $validated;
    }
}
