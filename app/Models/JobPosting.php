<?php

namespace App\Models;

use App\Enums\JobExperience;
use App\Enums\JobType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    /** @use HasFactory<\Database\Factories\JobPostingFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'department',
        'type',
        'location',
        'experience',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'type'       => JobType::class,
            'experience' => JobExperience::class,
            'is_active'  => 'boolean',
        ];
    }

    public function scopeActive($query): void
    {
        $query->where('is_active', true);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
