<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyResource extends Model
{
    protected $fillable = [
        'title', 'slug', 'short_description', 'full_description', 'course_id', 'chapter_id',
        'class_level', 'subject', 'chapter_label', 'resource_type', 'file_path',
        'thumbnail_path', 'pages', 'size_kb', 'is_featured', 'display_order', 'status',
        'published_at', 'seo_title', 'seo_description', 'answer_key_resource_id',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'status' => PublicationStatus::class,
            'published_at' => 'datetime',
        ];
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function answerKey(): BelongsTo
    {
        return $this->belongsTo(self::class, 'answer_key_resource_id');
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
