<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudyResource;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudyResourceController extends Controller
{
    public function index(Request $request): View
    {
        $resources = StudyResource::query()
            ->with('course')
            ->when($request->filled('q'), fn ($q) => $q->where('title', 'like', '%'.$request->string('q').'%'))
            ->when($request->filled('type'), fn ($q) => $q->where('resource_type', $request->string('type')))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->ordered()
            ->paginate(15)
            ->withQueryString();

        return view('admin.resources.index', compact('resources'));
    }

    public function create(): View
    {
        return view('admin.resources.form', [
            'resource' => new StudyResource(['status' => PublicationStatus::Draft]),
            'courses' => Course::ordered()->get(),
            'types' => config('resources.types'),
        ]);
    }

    public function store(Request $request, FileUploadService $files): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file_path'] = $files->storeDocument($request->file('file'));
            $data['size_kb'] = (int) ceil($request->file('file')->getSize() / 1024);
        }

        if ($data['status'] === PublicationStatus::Published->value) {
            $data['published_at'] = now();
        }

        StudyResource::query()->create($data);

        return redirect()->route('admin.resources.index')->with('success', 'Resource created.');
    }

    public function edit(StudyResource $resource): View
    {
        return view('admin.resources.form', [
            'resource' => $resource,
            'courses' => Course::ordered()->get(),
            'types' => config('resources.types'),
        ]);
    }

    public function update(Request $request, StudyResource $resource, FileUploadService $files): RedirectResponse
    {
        $data = $this->validated($request, $resource);

        if ($request->hasFile('file')) {
            $files->deleteIfUnused($resource->file_path);
            $data['file_path'] = $files->storeDocument($request->file('file'));
            $data['size_kb'] = (int) ceil($request->file('file')->getSize() / 1024);
        }

        if ($data['status'] === PublicationStatus::Published->value && ! $resource->published_at) {
            $data['published_at'] = now();
        }

        $resource->update($data);

        return redirect()->route('admin.resources.index')->with('success', 'Resource updated.');
    }

    public function destroy(StudyResource $resource, FileUploadService $files): RedirectResponse
    {
        $files->deleteIfUnused($resource->file_path);
        $resource->delete();

        return redirect()->route('admin.resources.index')->with('success', 'Resource deleted.');
    }

    protected function validated(Request $request, ?StudyResource $resource = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('study_resources', 'slug')->ignore($resource?->id)],
            'short_description' => ['nullable', 'string'],
            'full_description' => ['nullable', 'string'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'chapter_id' => ['nullable', 'exists:chapters,id'],
            'class_level' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:120'],
            'chapter_label' => ['nullable', 'string', 'max:120'],
            'resource_type' => ['required', 'string', 'max:40'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'file' => [$resource ? 'nullable' : 'nullable', 'file', 'mimes:pdf', 'max:15360'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
