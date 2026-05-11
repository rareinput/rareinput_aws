<?php

namespace App\Http\Requests\Admin;

use App\Enums\JobExperience;
use App\Enums\JobType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreJobPostingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'department'  => ['required', 'string', 'max:255'],
            'type'        => ['required', new Enum(JobType::class)],
            'location'    => ['required', 'string', 'max:255'],
            'experience'  => ['required', new Enum(JobExperience::class)],
            'description' => ['required', 'string'],
            'is_active'   => ['sometimes', 'boolean'],
        ];
    }
}
