<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SequenceSend extends Model
{
    /** @use HasFactory<\Database\Factories\SequenceSendFactory> */
    use HasFactory;

    protected $fillable = [
        'subscriber_sequence_id',
        'sequence_email_id',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    public function subscriberSequence(): BelongsTo
    {
        return $this->belongsTo(SubscriberSequence::class);
    }

    public function sequenceEmail(): BelongsTo
    {
        return $this->belongsTo(SequenceEmail::class);
    }
}
