<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SequenceEmail extends Model
{
    /** @use HasFactory<\Database\Factories\SequenceEmailFactory> */
    use HasFactory;

    protected $fillable = [
        'sequence_id',
        'sort_order',
        'subject',
        'body',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class);
    }

    public function sends(): HasMany
    {
        return $this->hasMany(SequenceSend::class);
    }
}
