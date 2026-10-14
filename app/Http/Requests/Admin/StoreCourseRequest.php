<?php

namespace App\Http\Requests\Admin;

use App\Enums\PublicationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage-content') ?? false;
    }

    public function rules(): array
    {
        $courseId = $this->route('course')?->id;

        return [
            'course_category_id' => ['required', 'exists:course_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('courses', 'slug')->ignore($courseId)],
            'short_description' => ['nullable', 'string', 'max:500'],
            'full_description' => ['nullable', 'string'],
            'target_class' => ['nullable', 'string', 'max:50'],
            'audience' => ['nullable', 'string', 'max:255'],
            'teaching_modes' => ['nullable'],
            'tags' => ['nullable'],
            'subjects' => ['nullable'],
            'syllabus' => ['nullable'],
            'chapters' => ['nullable'],
            'benefits' => ['nullable'],
            'outcomes' => ['nullable'],
            'related_course_slugs' => ['nullable'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'featured_image' => ['nullable', 'image', 'max:5120'],
        ];
    }
}
