<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_posting_id',
        'name',
        'email',
        'work_email',
        'phone',
        'experience',
        'highest_education',
        'university',
        'linkedin_url',
        'portfolio_urls',
        'cover_note',
        'resume_path',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'portfolio_urls' => 'array',
            'status'         => ApplicationStatus::class,
        ];
    }

    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(JobPosting::class);
    }
}
