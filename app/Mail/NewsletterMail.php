<?php

namespace App\Mail;

use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Email;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public bool $deleteWhenMissingModels = true;

    public function __construct(
        public Newsletter $newsletter,
        public Subscriber $subscriber,
    ) {}

    public function envelope(): Envelope
    {
        $unsubscribeUrl = route('unsubscribe', $this->subscriber->unsubscribe_token).'?nl='.$this->newsletter->id;

        return new Envelope(
            from: new Address(config('mail.from.address'), config('app.name')),
            subject: $this->newsletter->subject,
            using: [
                function (Email $message) use ($unsubscribeUrl) {
                    $message->getHeaders()
                        ->addTextHeader('List-Unsubscribe', '<'.$unsubscribeUrl.'>')
                        ->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');
                },
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter',
            text: 'emails.newsletter-text',
            with: ['trackedBody' => $this->trackedBody()],
        );
    }

    public function trackedBody(): string
    {
        $token = $this->subscriber->unsubscribe_token;
        $newsletterId = $this->newsletter->id;
        $body = $this->newsletter->body;

        // Rewrite links
        $body = preg_replace_callback(
            '/<a\s[^>]*href=["\']([^"\']+)["\'][^>]*>/i',
            function ($matches) use ($newsletterId, $token) {
                $original = $matches[0];
                $url = $matches[1];
                $trackedUrl = route('nl.click', [$newsletterId, $token]).'?url='.urlencode($url);

                return str_replace($matches[1], $trackedUrl, $original);
            },
            $body
        );

        // Append tracking pixel
        $pixelUrl = route('nl.open', [$newsletterId, $token]);
        $body .= '<img src="'.$pixelUrl.'" width="1" height="1" style="display:none;" alt="">';

        return $body;
    }
}
