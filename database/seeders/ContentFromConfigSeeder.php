<?php

namespace Database\Seeders;

use App\Enums\PublicationStatus;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\StudyResource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentFromConfigSeeder extends Seeder
{
    public function run(): void
    {
        if (Course::query()->exists()) {
            $this->command?->warn('Courses already exist — skipping content import.');

            return;
        }

        $categoryMap = [];
        foreach (config('courses.categories', []) as $index => $category) {
            $model = CourseCategory::query()->create([
                'title' => $category['title'],
                'slug' => $category['id'] ?? Str::slug($category['title']),
                'subtitle' => $category['subtitle'] ?? null,
                'description' => $category['description'] ?? null,
                'subjects' => $category['subjects'] ?? [],
                'display_order' => $index,
                'status' => PublicationStatus::Published,
            ]);
            $categoryMap[$category['id']] = $model->id;
        }

        foreach (config('courses.courses', []) as $index => $course) {
            Course::query()->create([
                'course_category_id' => $categoryMap[$course['category']] ?? array_values($categoryMap)[0],
                'title' => $course['title'],
                'slug' => $course['slug'],
                'short_description' => $course['short_description'] ?? null,
                'full_description' => $course['short_description'] ?? null,
                'target_class' => $course['class'] ?? null,
                'audience' => $course['audience'] ?? null,
                'teaching_modes' => $course['teaching_modes'] ?? [],
                'tags' => $course['tags'] ?? [],
                'subjects' => $course['subjects'] ?? [],
                'syllabus' => $course['syllabus'] ?? [],
                'chapters' => $course['chapters'] ?? [],
                'benefits' => $course['benefits'] ?? [],
                'outcomes' => $course['outcomes'] ?? [],
                'related_course_slugs' => $course['related_course_slugs'] ?? [],
                'display_order' => $index,
                'status' => PublicationStatus::Published,
                'published_at' => now(),
                'seo_title' => $course['seo']['title'] ?? null,
                'seo_description' => $course['seo']['description'] ?? null,
            ]);
        }

        $courseSlugs = Course::query()->pluck('id', 'slug');
        foreach (config('resources.resources', []) as $index => $resource) {
            StudyResource::query()->create([
                'title' => $resource['title'],
                'slug' => $resource['slug'],
                'short_description' => $resource['description'] ?? null,
                'course_id' => isset($resource['course_slug']) ? $courseSlugs[$resource['course_slug']] ?? null : null,
                'class_level' => $resource['class'] ?? null,
                'subject' => $resource['subject'] ?? null,
                'chapter_label' => $resource['chapter'] ?? null,
                'resource_type' => $resource['type'] ?? 'notes',
                'file_path' => $resource['file'] ?? null,
                'pages' => $resource['pages'] ?? null,
                'size_kb' => $resource['size_kb'] ?? null,
                'display_order' => $index,
                'status' => PublicationStatus::Published,
                'published_at' => now(),
                'seo_title' => $resource['seo']['title'] ?? null,
                'seo_description' => $resource['seo']['description'] ?? null,
            ]);
        }

        foreach (config('faqs.items', []) as $index => $faq) {
            Faq::query()->create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'display_order' => $index,
                'status' => PublicationStatus::Published,
            ]);
        }

        SiteSetting::setValue('site', 'homepage', config('homepage'));
        SiteSetting::setValue('site', 'about', config('about'));
        SiteSetting::setValue('site', 'site.contact', config('site.contact'));
        SiteSetting::setValue('site', 'site.social', config('site.social'));
        SiteSetting::setValue('site', 'faqs.meta', [
            'title' => config('faqs.title'),
            'intro' => config('faqs.intro'),
        ]);
    }
}
