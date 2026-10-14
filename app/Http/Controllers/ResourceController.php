<?php

namespace App\Http\Controllers;

use App\Support\Content\CourseCatalog;
use App\Support\Content\ResourceLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResourceController extends Controller
{
    public function index(Request $request, ResourceLibrary $library, CourseCatalog $courses): View
    {
        $filtered = $library->filter(
            courseSlug: $request->string('course')->toString() ?: null,
            class: $request->string('class')->toString() ?: null,
            subject: $request->string('subject')->toString() ?: null,
            chapter: $request->string('chapter')->toString() ?: null,
            type: $request->string('type')->toString() ?: null,
            search: $request->string('q')->toString() ?: null,
        );

        $filterOptions = [
            'classes' => $library->all()->pluck('class')->unique()->filter()->sort()->values(),
            'subjects' => $library->all()->pluck('subject')->unique()->filter()->sort()->values(),
            'courses' => $courses->all()->map(fn (array $c) => ['slug' => $c['slug'], 'title' => $c['title']]),
        ];

        return view('pages.resources.index', [
            'resources' => $filtered,
            'types' => $library->types(),
            'filters' => [
                'course' => $request->string('course')->toString(),
                'class' => $request->string('class')->toString(),
                'subject' => $request->string('subject')->toString(),
                'chapter' => $request->string('chapter')->toString(),
                'type' => $request->string('type')->toString(),
                'q' => $request->string('q')->toString(),
            ],
            'filterOptions' => $filterOptions,
            'seo' => [
                'title' => 'Study Resources — '.config('site.name'),
                'description' => 'Free notes, worksheets, formula sheets and test papers for mathematics students.',
            ],
        ]);
    }

    public function show(string $slug, ResourceLibrary $library, CourseCatalog $courses): View
    {
        $resource = $library->findBySlug($slug);

        abort_unless($resource, 404);

        $course = isset($resource['course_slug'])
            ? $courses->findBySlug($resource['course_slug'])
            : null;

        $answerKey = null;
        if (! empty($resource['answer_key_slug'])) {
            $answerKey = $library->findBySlug($resource['answer_key_slug']);
        }

        return view('pages.resources.show', [
            'resource' => $resource,
            'course' => $course,
            'answerKey' => $answerKey,
            'related' => $library->related($resource),
            'fileAvailable' => $library->fileExists($resource),
            'seo' => [
                'title' => ($resource['seo']['title'] ?? $resource['title']).' — '.config('site.name'),
                'description' => $resource['seo']['description'] ?? $resource['description'] ?? '',
            ],
        ]);
    }

    public function download(string $slug, ResourceLibrary $library): BinaryFileResponse
    {
        $resource = $library->findBySlug($slug);

        abort_unless($resource, 404);

        $path = $library->filePath($resource);

        abort_unless($path, 404);

        $filename = str($resource['slug'])->append('.pdf')->toString();

        return Response::download($path, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
