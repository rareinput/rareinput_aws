<?php

namespace App\Mail;

use App\Models\SequenceEmail;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SequenceEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public bool $deleteWhenMissingModels = true;

    public function __construct(
        public Subscriber $subscriber,
        public SequenceEmail $sequenceEmail,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('app.name')),
            subject: $this->sequenceEmail->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.sequence-email',
        );
    }
}
