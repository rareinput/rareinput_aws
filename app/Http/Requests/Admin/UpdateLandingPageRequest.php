<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandingPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('landing_page')?->id;

        return [
            'name'             => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', "unique:landing_pages,slug,{$id}", 'not_regex:/^(admin|about|contact|services|blog|careers|privacy-policy|terms|faq|unsubscribe|sitemap\.xml|christmas-offer|shopify-development)$/i'],
            'status'           => ['required', 'string', 'in:draft,published'],
            'content'          => ['nullable', 'array'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:320'],
            'og_image'         => ['nullable', 'image', 'max:2048'],
            'remove_og_image'  => ['nullable', 'boolean'],
        ];
    }
}
