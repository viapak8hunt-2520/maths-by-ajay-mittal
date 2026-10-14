<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    protected $fillable = [
        'course_id', 'title', 'description', 'display_order', 'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => PublicationStatus::class,
        ];
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }
}
