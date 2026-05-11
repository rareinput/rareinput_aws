<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sequence extends Model
{
    /** @use HasFactory<\Database\Factories\SequenceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'interval_days',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active'     => 'boolean',
            'interval_days' => 'integer',
        ];
    }

    public function emails(): HasMany
    {
        return $this->hasMany(SequenceEmail::class)->orderBy('sort_order');
    }

    public function subscriberSequences(): HasMany
    {
        return $this->hasMany(SubscriberSequence::class);
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class, 'subscriber_sequences')
            ->withPivot(['started_at', 'completed_at'])
            ->withTimestamps();
    }
}
