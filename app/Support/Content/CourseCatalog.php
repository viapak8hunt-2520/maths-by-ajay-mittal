<?php

namespace App\Support\Content;

use App\Enums\PublicationStatus;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class CourseCatalog
{
    public function all(bool $includeUnpublished = false): Collection
    {
        if (! Schema::hasTable('courses')) {
            return collect();
        }

        $query = Course::query()->with('category')->ordered();

        if (! $includeUnpublished) {
            $query->published();
        }

        return $query->get()->map(fn (Course $course) => ContentArrayMapper::course($course));
    }

    public function categories(bool $includeUnpublished = false): Collection
    {
        if (! Schema::hasTable('course_categories')) {
            return collect();
        }

        $query = CourseCategory::query()->ordered();

        if (! $includeUnpublished) {
            $query->published();
        }

        return $query->get()->map(fn (CourseCategory $category) => ContentArrayMapper::category($category));
    }

    public function findBySlug(string $slug, bool $includeUnpublished = false): ?array
    {
        if (! Schema::hasTable('courses')) {
            return null;
        }

        $query = Course::query()->with('category')->where('slug', $slug);

        if (! $includeUnpublished) {
            $query->published();
        }

        $course = $query->first();

        return $course ? ContentArrayMapper::course($course) : null;
    }

    public function related(array $course): Collection
    {
        $slugs = $course['related_course_slugs'] ?? [];

        return $this->all()->whereIn('slug', $slugs)->values();
    }

    public function filter(?string $category = null, ?string $search = null): Collection
    {
        return $this->all()
            ->when($category, fn (Collection $c) => $c->where('category', $category))
            ->when($search, function (Collection $c) use ($search) {
                $term = mb_strtolower(trim($search));

                return $c->filter(function (array $course) use ($term) {
                    $haystack = mb_strtolower(implode(' ', [
                        $course['title'] ?? '',
                        $course['short_description'] ?? '',
                        implode(' ', $course['tags'] ?? []),
                    ]));

                    return str_contains($haystack, $term);
                });
            })
            ->values();
    }

    public function findModelBySlug(string $slug): ?Course
    {
        return Course::query()->with('category')->where('slug', $slug)->first();
    }

    public function categoryMatchesFilter(CourseCategory $category, ?string $filter): bool
    {
        return ! $filter || $category->slug === $filter;
    }

    public static function publicationStatuses(): array
    {
        return PublicationStatus::cases();
    }
}
