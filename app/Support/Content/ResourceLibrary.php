<?php

namespace App\Support\Content;

use App\Models\StudyResource;
use App\Models\TestPaper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ResourceLibrary
{
    public function types(): array
    {
        return config('resources.types', []);
    }

    public function all(bool $includeUnpublished = false): Collection
    {
        $resources = $this->studyResources($includeUnpublished);
        $papers = $this->testPapers($includeUnpublished);

        return $resources->concat($papers)->sortBy('title')->values();
    }

    protected function studyResources(bool $includeUnpublished): Collection
    {
        if (! Schema::hasTable('study_resources')) {
            return collect();
        }

        $query = StudyResource::query()->with(['course', 'answerKey'])->ordered();

        if (! $includeUnpublished) {
            $query->published();
        }

        return $query->get()->map(fn (StudyResource $r) => ContentArrayMapper::studyResource($r));
    }

    protected function testPapers(bool $includeUnpublished): Collection
    {
        if (! Schema::hasTable('test_papers')) {
            return collect();
        }

        $query = TestPaper::query()->with(['course', 'chapter'])->ordered();

        if (! $includeUnpublished) {
            $query->published();
        }

        return $query->get()->map(fn (TestPaper $p) => ContentArrayMapper::testPaper($p));
    }

    public function findBySlug(string $slug, bool $includeUnpublished = false): ?array
    {
        if (! Schema::hasTable('study_resources') && ! Schema::hasTable('test_papers')) {
            return null;
        }

        $resourceQuery = StudyResource::query()->with(['course', 'answerKey'])->where('slug', $slug);
        $paperQuery = TestPaper::query()->with(['course', 'chapter'])->where('slug', $slug);

        if (! $includeUnpublished) {
            $resourceQuery->published();
            $paperQuery->published();
        }

        if ($resource = $resourceQuery->first()) {
            return ContentArrayMapper::studyResource($resource);
        }

        if ($paper = $paperQuery->first()) {
            return ContentArrayMapper::testPaper($paper);
        }

        return null;
    }

    public function forCourse(?string $courseSlug, bool $includeUnpublished = false): Collection
    {
        if (! $courseSlug) {
            return collect();
        }

        return $this->all($includeUnpublished)
            ->where('course_slug', $courseSlug)
            ->values();
    }

    public function filter(
        ?string $courseSlug = null,
        ?string $class = null,
        ?string $subject = null,
        ?string $chapter = null,
        ?string $type = null,
        ?string $search = null,
        bool $includeUnpublished = false,
    ): Collection {
        return $this->all($includeUnpublished)
            ->when($courseSlug, fn (Collection $c) => $c->where('course_slug', $courseSlug))
            ->when($class, fn (Collection $c) => $c->where('class', $class))
            ->when($subject, fn (Collection $c) => $c->filter(
                fn (array $r) => mb_strtolower($r['subject'] ?? '') === mb_strtolower($subject)
            ))
            ->when($chapter, fn (Collection $c) => $c->filter(
                fn (array $r) => str_contains(mb_strtolower($r['chapter'] ?? ''), mb_strtolower($chapter))
            ))
            ->when($type, fn (Collection $c) => $c->where('type', $type))
            ->when($search, function (Collection $c) use ($search) {
                $term = mb_strtolower(trim($search));

                return $c->filter(function (array $resource) use ($term) {
                    $haystack = mb_strtolower(implode(' ', [
                        $resource['title'] ?? '',
                        $resource['description'] ?? '',
                        $resource['subject'] ?? '',
                        $resource['chapter'] ?? '',
                    ]));

                    return str_contains($haystack, $term);
                });
            })
            ->values();
    }

    public function fileExists(array $resource): bool
    {
        $path = $resource['file'] ?? null;
        if (! $path) {
            return false;
        }

        return Storage::disk('local')->exists($path);
    }

    public function filePath(array $resource): ?string
    {
        if (! $this->fileExists($resource)) {
            return null;
        }

        return Storage::disk('local')->path($resource['file']);
    }

    public function related(array $resource, int $limit = 4): Collection
    {
        return $this->all()
            ->reject(fn (array $r) => ($r['slug'] ?? '') === ($resource['slug'] ?? ''))
            ->filter(fn (array $r) => ($r['course_slug'] ?? null) === ($resource['course_slug'] ?? null)
                || ($r['subject'] ?? null) === ($resource['subject'] ?? null))
            ->take($limit)
            ->values();
    }
}
