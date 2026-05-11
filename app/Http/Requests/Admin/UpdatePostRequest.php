<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $postId = $this->route('post')?->id;

        return [
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:posts,slug,' . $postId],
            'excerpt'          => ['nullable', 'string'],
            'body'             => ['required', 'string'],
            'featured_image'     => ['nullable', 'image', 'max:2048'],
            'featured_image_alt' => ['nullable', 'string', 'max:255'],
            'publish_status'   => ['required', 'in:published,scheduled,draft'],
            'published_at'     => ['nullable', 'date'],
            'remove_image'     => ['nullable', 'boolean'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:320'],
            'og_image'         => ['nullable', 'image', 'max:2048'],
            'remove_og_image'  => ['nullable', 'boolean'],
            'noindex'          => ['nullable', 'boolean'],
        ];
    }
}
