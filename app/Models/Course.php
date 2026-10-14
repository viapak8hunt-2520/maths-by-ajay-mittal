<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'course_category_id', 'title', 'slug', 'short_description', 'full_description',
        'target_class', 'audience', 'teaching_modes', 'tags', 'subjects', 'syllabus',
        'chapters', 'benefits', 'outcomes', 'related_course_slugs', 'featured_image_path',
        'display_order', 'status', 'published_at', 'seo_title', 'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'teaching_modes' => 'array',
            'tags' => 'array',
            'subjects' => 'array',
            'syllabus' => 'array',
            'chapters' => 'array',
            'benefits' => 'array',
            'outcomes' => 'array',
            'related_course_slugs' => 'array',
            'status' => PublicationStatus::class,
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function chapterRecords(): HasMany
    {
        return $this->hasMany(Chapter::class)->orderBy('display_order');
    }

    public function studyResources(): HasMany
    {
        return $this->hasMany(StudyResource::class);
    }

    public function testPapers(): HasMany
    {
        return $this->hasMany(TestPaper::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('title');
    }
}
