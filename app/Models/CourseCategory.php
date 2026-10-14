<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    protected $fillable = [
        'title', 'slug', 'subtitle', 'description', 'subjects',
        'display_order', 'status',
    ];

    protected function casts(): array
    {
        return [
            'subjects' => 'array',
            'status' => PublicationStatus::class,
        ];
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
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
