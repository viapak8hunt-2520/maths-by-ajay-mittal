<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TestPaper;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TestPaperController extends Controller
{
    public function index(Request $request): View
    {
        $testPapers = TestPaper::query()
            ->with('course')
            ->when($request->filled('q'), fn ($q) => $q->where('title', 'like', '%'.$request->string('q').'%'))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->ordered()
            ->paginate(15)
            ->withQueryString();

        return view('admin.test-papers.index', compact('testPapers'));
    }

    public function create(): View
    {
        return view('admin.test-papers.form', [
            'testPaper' => new TestPaper(['status' => PublicationStatus::Draft, 'paper_type' => 'practice_paper']),
            'courses' => Course::ordered()->get(),
        ]);
    }

    public function store(Request $request, FileUploadService $files): RedirectResponse
    {
        $data = $this->validated($request);

        foreach (['question_paper', 'answer_key', 'solution'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field.'_path'] = $files->storeDocument($request->file($field), 'test-papers');
            }
        }

        if ($data['status'] === PublicationStatus::Published->value) {
            $data['published_at'] = now();
        }

        TestPaper::query()->create($data);

        return redirect()->route('admin.test-papers.index')->with('success', 'Test paper created.');
    }

    public function edit(TestPaper $testPaper): View
    {
        return view('admin.test-papers.form', [
            'testPaper' => $testPaper,
            'courses' => Course::ordered()->get(),
        ]);
    }

    public function update(Request $request, TestPaper $testPaper, FileUploadService $files): RedirectResponse
    {
        $data = $this->validated($request, $testPaper);

        foreach (['question_paper', 'answer_key', 'solution'] as $field) {
            if ($request->hasFile($field)) {
                $files->deleteIfUnused($testPaper->{$field.'_path'});
                $data[$field.'_path'] = $files->storeDocument($request->file($field), 'test-papers');
            }
        }

        if ($data['status'] === PublicationStatus::Published->value && ! $testPaper->published_at) {
            $data['published_at'] = now();
        }

        $testPaper->update($data);

        return redirect()->route('admin.test-papers.index')->with('success', 'Test paper updated.');
    }

    public function destroy(TestPaper $testPaper, FileUploadService $files): RedirectResponse
    {
        foreach (['question_paper_path', 'answer_key_path', 'solution_path'] as $path) {
            $files->deleteIfUnused($testPaper->{$path});
        }

        $testPaper->delete();

        return redirect()->route('admin.test-papers.index')->with('success', 'Test paper deleted.');
    }

    protected function validated(Request $request, ?TestPaper $testPaper = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('test_papers', 'slug')->ignore($testPaper?->id)],
            'description' => ['nullable', 'string'],
            'instructions' => ['nullable', 'string'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'chapter_id' => ['nullable', 'exists:chapters,id'],
            'examination_type' => ['nullable', 'string', 'max:120'],
            'paper_type' => ['required', 'string', 'max:40'],
            'difficulty' => ['nullable', 'string', 'max:20'],
            'max_marks' => ['nullable', 'integer', 'min:0'],
            'duration_minutes' => ['nullable', 'integer', 'min:0'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'question_paper' => ['nullable', 'file', 'mimes:pdf', 'max:15360'],
            'answer_key' => ['nullable', 'file', 'mimes:pdf', 'max:15360'],
            'solution' => ['nullable', 'file', 'mimes:pdf', 'max:15360'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
