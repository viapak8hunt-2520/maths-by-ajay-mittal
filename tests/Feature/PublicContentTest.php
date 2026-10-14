<?php

namespace Tests\Feature;

use App\Enums\PublicationStatus;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_course_is_visible_on_public_site(): void
    {
        $category = CourseCategory::query()->create([
            'title' => 'School Mathematics',
            'slug' => 'school',
            'status' => PublicationStatus::Published,
        ]);

        Course::query()->create([
            'course_category_id' => $category->id,
            'title' => 'Class 10 Maths',
            'slug' => 'class-10-maths',
            'short_description' => 'Board prep',
            'status' => PublicationStatus::Published,
            'published_at' => now(),
        ]);

        $this->get('/courses/class-10-maths')->assertOk()->assertSee('Class 10 Maths');
    }

    public function test_draft_course_returns_not_found_publicly(): void
    {
        $category = CourseCategory::query()->create([
            'title' => 'School Mathematics',
            'slug' => 'school',
            'status' => PublicationStatus::Published,
        ]);

        Course::query()->create([
            'course_category_id' => $category->id,
            'title' => 'Hidden Draft',
            'slug' => 'hidden-draft',
            'status' => PublicationStatus::Draft,
        ]);

        $this->get('/courses/hidden-draft')->assertNotFound();
    }
}
