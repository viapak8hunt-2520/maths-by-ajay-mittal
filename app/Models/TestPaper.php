<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestPaper extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'instructions', 'course_id', 'chapter_id',
        'examination_type', 'paper_type', 'difficulty', 'max_marks', 'duration_minutes',
        'question_paper_path', 'answer_key_path', 'solution_path', 'is_featured',
        'display_order', 'status', 'published_at', 'seo_title', 'seo_description',
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

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('title');
    }
}
