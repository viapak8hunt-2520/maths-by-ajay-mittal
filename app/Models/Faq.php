<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'category', 'question', 'answer', 'display_order', 'status',
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

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('id');
    }
}
