<?php

namespace App\Jobs;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewsletterJob implements ShouldQueue
{
    use Queueable;

    public bool $deleteWhenMissingModels = true;

    public function __construct(public Newsletter $newsletter) {}

    public function handle(): void
    {
        $this->newsletter->update(['status' => 'sending']);

        $count = 0;

        Subscriber::where('status', 'active')->chunkById(100, function ($subscribers) use (&$count) {
            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->later(now()->addSeconds($count * 2), new NewsletterMail($this->newsletter, $subscriber));
                $count++;
            }
        });

        $this->newsletter->update([
            'status' => 'sent',
            'sent_at' => now(),
            'sent_count' => $count,
        ]);
    }
}
