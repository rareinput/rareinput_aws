<?php

namespace App\Console\Commands;

use App\Jobs\SendNewsletterJob;
use App\Models\Newsletter;
use Illuminate\Console\Command;

class SendScheduledNewsletters extends Command
{
    protected $signature = 'newsletters:send-scheduled';

    protected $description = 'Dispatch scheduled newsletters that are due to be sent.';

    public function handle(): void
    {
        $due = Newsletter::where('status', 'scheduled')
            ->where('scheduled_at', '<=', now())
            ->get();

        foreach ($due as $newsletter) {
            SendNewsletterJob::dispatch($newsletter);
            $this->info("Dispatched newsletter #{$newsletter->id}: {$newsletter->subject}");
        }

        if ($due->isEmpty()) {
            $this->info('No scheduled newsletters due.');
        }
    }
}
