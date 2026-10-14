<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseCategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => CourseCategory::ordered()->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.categories.form', ['category' => new CourseCategory(['status' => PublicationStatus::Published])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        CourseCategory::query()->create($data);

        return redirect()->route('admin.course-categories.index')->with('success', 'Category created.');
    }

    public function edit(CourseCategory $courseCategory): View
    {
        return view('admin.categories.form', ['category' => $courseCategory]);
    }

    public function update(Request $request, CourseCategory $courseCategory): RedirectResponse
    {
        $courseCategory->update($this->validated($request, $courseCategory));

        return redirect()->route('admin.course-categories.index')->with('success', 'Category updated.');
    }

    public function destroy(CourseCategory $courseCategory): RedirectResponse
    {
        if (Course::query()->where('course_category_id', $courseCategory->id)->exists()) {
            return back()->withErrors(['category' => 'Cannot delete a category that still has courses.']);
        }

        $courseCategory->delete();

        return redirect()->route('admin.course-categories.index')->with('success', 'Category deleted.');
    }

    protected function validated(Request $request, ?CourseCategory $category = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:course_categories,slug,'.($category?->id ?? 'NULL')],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'subjects' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['subjects'] = $this->linesToArray($data['subjects'] ?? '');

        return $data;
    }

    protected function linesToArray(string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
