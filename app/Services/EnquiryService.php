<?php

namespace App\Services;

use App\Enums\EnquiryStatus;
use App\Mail\AdmissionEnquiryMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class EnquiryService
{
    public function submit(array $data): void
    {
        if (Schema::hasTable('enquiries')) {
            Enquiry::query()->create([
                ...$data,
                'status' => EnquiryStatus::New,
            ]);
        }

        $handler = config('site.enquiry.handler', 'file');

        match ($handler) {
            'mail' => $this->sendMail($data),
            'log' => $this->logEnquiry($data),
            default => $this->storeFile($data),
        };
    }

    protected function sendMail(array $data): void
    {
        $to = config('site.enquiry.mail_to');

        Mail::to($to)->send(new AdmissionEnquiryMail($data));

        $this->storeFile($data);
    }

    protected function logEnquiry(array $data): void
    {
        Log::channel('single')->info('Admission enquiry received', [
            'student_name' => $data['student_name'] ?? null,
            'course_interest' => $data['course_interest'] ?? null,
        ]);
        $this->storeFile($data);
    }

    protected function storeFile(array $data): void
    {
        $path = 'enquiries/'.now()->format('Y-m-d').'.jsonl';
        $line = json_encode(array_merge($data, ['submitted_at' => now()->toIso8601String()]), JSON_UNESCAPED_UNICODE).PHP_EOL;

        Storage::disk('local')->append($path, $line);
    }
}
