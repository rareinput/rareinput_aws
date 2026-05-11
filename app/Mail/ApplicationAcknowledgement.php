<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationAcknowledgement extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public JobApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('careers.from_address'), config('app.name')),
            subject: 'We received your application — ' . $this->application->jobPosting->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application-acknowledgement',
        );
    }
}
