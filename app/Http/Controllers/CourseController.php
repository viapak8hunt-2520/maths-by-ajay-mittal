<?php

namespace App\Http\Controllers;

use App\Support\Content\CourseCatalog;
use App\Support\Content\ResourceLibrary;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request, CourseCatalog $catalog): View
    {
        $category = $request->string('category')->toString() ?: null;
        $search = $request->string('q')->toString() ?: null;

        $courses = $catalog->filter($category, $search);

        return view('pages.courses.index', [
            'courses' => $courses,
            'categories' => $catalog->categories(),
            'activeCategory' => $category,
            'search' => $search,
            'seo' => [
                'title' => 'Courses — '.config('site.name'),
                'description' => 'Browse mathematics courses for school, senior secondary and competitive exams.',
            ],
        ]);
    }

    public function show(string $slug, CourseCatalog $catalog, ResourceLibrary $resources): View
    {
        $preview = request()->boolean('preview') && auth()->check() && auth()->user()->can('manage-content');
        $course = $catalog->findBySlug($slug, $preview);

        abort_unless($course, 404);

        $courseResources = $resources->forCourse($course['slug']);
        $testPapers = $courseResources->filter(fn (array $r) => in_array($r['type'] ?? '', ['practice_paper', 'mock_test', 'previous_year'], true));

        return view('pages.courses.show', [
            'course' => $course,
            'relatedCourses' => $catalog->related($course),
            'resources' => $courseResources,
            'testPapers' => $testPapers,
            'seo' => [
                'title' => ($course['seo']['title'] ?? $course['title']).' — '.config('site.name'),
                'description' => $course['seo']['description'] ?? $course['short_description'] ?? '',
            ],
        ]);
    }
}
