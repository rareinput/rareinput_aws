<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'job_posting_id'    => ['required', 'integer', 'exists:job_postings,id'],
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'max:255'],
            'work_email'        => ['nullable', 'email', 'max:255'],
            'phone'             => ['required', 'string', 'max:50'],
            'experience'        => ['nullable', 'string', 'max:500'],
            'highest_education' => ['required', 'string', 'max:255'],
            'university'        => ['required', 'string', 'max:255'],
            'linkedin_url'      => ['nullable', 'url', 'max:500'],
            'portfolio_urls'    => ['nullable', 'array', 'max:10'],
            'portfolio_urls.*'  => ['nullable', 'url', 'max:500'],
            'cover_note'        => ['required', 'string', 'min:20'],
            'resume'            => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'resume.mimes' => 'Resume must be a PDF, DOC, or DOCX file.',
            'resume.max'   => 'Resume must not exceed 5MB.',
            'cover_note.min' => 'Cover note must be at least 20 characters.',
        ];
    }
}
