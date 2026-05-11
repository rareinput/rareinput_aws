<?php

namespace App\Console\Commands;

use App\Mail\SequenceEmailMail;
use App\Models\SequenceEmail;
use App\Models\SubscriberSequence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSequenceEmails extends Command
{
    protected $signature = 'sequences:send';

    protected $description = 'Send drip sequence emails to enrolled subscribers';

    public function handle(): int
    {
        $today = now()->startOfDay();

        // Fetch all active, incomplete subscriber sequences with necessary relations
        $subscriberSequences = SubscriberSequence::query()
            ->with(['subscriber', 'sequence.emails', 'sends'])
            ->whereNull('completed_at')
            ->whereHas('subscriber', fn ($q) => $q->where('status', 'active'))
            ->whereHas('sequence', fn ($q) => $q->where('is_active', true))
            ->get();

        $sent = 0;

        foreach ($subscriberSequences as $ss) {
            $sequence      = $ss->sequence;
            $subscriber    = $ss->subscriber;
            $sentEmailIds  = $ss->sends->pluck('sequence_email_id')->toArray();

            foreach ($sequence->emails as $email) {
                // Skip already sent emails
                if (in_array($email->id, $sentEmailIds)) {
                    continue;
                }

                // day_number is 1-based; day 1 = sent immediately on started_at
                // day_number = (sort_order - 1) * interval_days + 1
                $dayNumber = ($email->sort_order - 1) * $sequence->interval_days + 1;
                $dueDate   = $ss->started_at->copy()->addDays($dayNumber - 1)->startOfDay();

                if ($today->greaterThanOrEqualTo($dueDate)) {
                    Mail::to($subscriber->email)->send(new SequenceEmailMail($subscriber, $email));

                    $ss->sends()->create([
                        'sequence_email_id' => $email->id,
                        'sent_at'           => now(),
                    ]);

                    $sent++;
                }

                // Only send one email per run per subscriber per sequence
                break;
            }

            // Mark completed if all emails have been sent
            $allSent = $ss->fresh()->sends->count() === $sequence->emails->count();
            if ($allSent) {
                $ss->update(['completed_at' => now()]);
            }
        }

        $this->info("Sent {$sent} sequence email(s).");

        return self::SUCCESS;
    }
}
