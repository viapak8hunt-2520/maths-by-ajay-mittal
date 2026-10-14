<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'student_name', 'course_label', 'quote', 'photo_path', 'display_order', 'status',
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
