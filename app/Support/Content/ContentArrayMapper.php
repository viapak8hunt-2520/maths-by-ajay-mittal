<?php

namespace App\Support\Content;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\StudyResource;
use App\Models\TestPaper;

class ContentArrayMapper
{
    public static function category(CourseCategory $category): array
    {
        return [
            'id' => $category->slug,
            'slug' => $category->slug,
            'title' => $category->title,
            'subtitle' => $category->subtitle,
            'description' => $category->description,
            'subjects' => $category->subjects ?? [],
            'route' => 'courses.index',
            'filter' => $category->slug,
        ];
    }

    public static function course(Course $course): array
    {
        $course->loadMissing('category');

        return [
            'slug' => $course->slug,
            'title' => $course->title,
            'category' => $course->category?->slug,
            'class' => $course->target_class,
            'audience' => $course->audience,
            'teaching_modes' => $course->teaching_modes ?? [],
            'short_description' => $course->short_description,
            'tags' => $course->tags ?? [],
            'subjects' => $course->subjects ?? [],
            'syllabus' => $course->syllabus ?? [],
            'benefits' => $course->benefits ?? [],
            'outcomes' => $course->outcomes ?? [],
            'chapters' => $course->chapters ?? [],
            'related_course_slugs' => $course->related_course_slugs ?? [],
            'seo' => [
                'title' => $course->seo_title ?? $course->title,
                'description' => $course->seo_description ?? $course->short_description,
            ],
        ];
    }

    public static function studyResource(StudyResource $resource): array
    {
        $resource->loadMissing('course');

        return [
            'slug' => $resource->slug,
            'title' => $resource->title,
            'description' => $resource->short_description,
            'type' => $resource->resource_type,
            'course_slug' => $resource->course?->slug,
            'class' => $resource->class_level,
            'subject' => $resource->subject,
            'chapter' => $resource->chapter_label,
            'file' => $resource->file_path,
            'pages' => $resource->pages,
            'size_kb' => $resource->size_kb,
            'free' => true,
            'access_tier' => 'free',
            'source' => 'study_resource',
            'source_id' => $resource->id,
            'answer_key_slug' => $resource->answerKey?->slug ?? null,
            'seo' => [
                'title' => $resource->seo_title ?? $resource->title,
                'description' => $resource->seo_description ?? $resource->short_description,
            ],
        ];
    }

    public static function testPaper(TestPaper $paper): array
    {
        $paper->loadMissing('course');

        return [
            'slug' => $paper->slug,
            'title' => $paper->title,
            'description' => $paper->description,
            'type' => $paper->paper_type,
            'course_slug' => $paper->course?->slug,
            'class' => $paper->course?->target_class,
            'subject' => $paper->examination_type,
            'chapter' => $paper->chapter?->title,
            'file' => $paper->question_paper_path,
            'pages' => null,
            'size_kb' => null,
            'free' => true,
            'access_tier' => 'free',
            'source' => 'test_paper',
            'source_id' => $paper->id,
            'seo' => [
                'title' => $paper->seo_title ?? $paper->title,
                'description' => $paper->seo_description ?? $paper->description,
            ],
        ];
    }
}
