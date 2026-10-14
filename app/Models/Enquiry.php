<?php

namespace App\Models;

use App\Enums\EnquiryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $fillable = [
        'student_name', 'parent_name', 'phone', 'email', 'course_interest',
        'teaching_mode', 'message', 'status', 'internal_notes', 'follow_up_date',
        'outcome', 'assigned_to',
    ];

    protected function casts(): array
    {
        return [
            'status' => EnquiryStatus::class,
            'follow_up_date' => 'date',
        ];
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
