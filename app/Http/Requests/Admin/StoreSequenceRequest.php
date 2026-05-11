<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSequenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:255'],
            'description'     => ['nullable', 'string', 'max:1000'],
            'interval_days'   => ['required', 'integer', 'min:1'],
            'emails'          => ['required', 'array', 'min:1'],
            'emails.*.subject' => ['required', 'string', 'max:255'],
            'emails.*.body'    => ['required', 'string'],
        ];
    }
}
