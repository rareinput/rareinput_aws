<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'excerpt'          => ['nullable', 'string'],
            'body'             => ['required', 'string'],
            'featured_image'     => ['nullable', 'image', 'max:2048'],
            'featured_image_alt' => ['nullable', 'string', 'max:255'],
            'publish_status'   => ['required', 'in:published,scheduled,draft'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:320'],
            'og_image'         => ['nullable', 'image', 'max:2048'],
            'noindex'          => ['nullable', 'boolean'],
        ];
    }
}
