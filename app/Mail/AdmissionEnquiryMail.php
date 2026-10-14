<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdmissionEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New admission enquiry — '.config('site.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admission-enquiry',
            with: ['enquiry' => $this->enquiry],
        );
    }
}
