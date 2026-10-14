<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title', 'description', 'student_name', 'course_label', 'display_order', 'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => PublicationStatus::class,
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }
}
