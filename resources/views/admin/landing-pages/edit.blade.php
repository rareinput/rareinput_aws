<x-layouts.admin title="Edit: {{ $landingPage->name }}">

    <div class="flex items-center justify-between mb-6">
        <div>
            <a href="{{ route('admin.landing-pages.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Landing Pages</a>
            <h1 class="text-xl font-bold mt-1" style="color: var(--color-heading);">{{ $landingPage->name }}</h1>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs font-semibold px-2 py-0.5 rounded" style="{{ $landingPage->status->badgeStyle() }}">{{ $landingPage->status->label() }}</span>
            <a href="{{ route('admin.landing-pages.preview', $landingPage) }}" target="_blank"
               class="text-sm hover:underline" style="color: var(--color-text-muted);">Preview ↗</a>
            @if($landingPage->isPublished())
            <a href="/{{ $landingPage->slug }}" target="_blank"
               class="text-sm hover:underline" style="color: var(--color-accent-dark);">View Live ↗</a>
            @endif
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.landing-pages.update', $landingPage) }}"
          enctype="multipart/form-data"
          x-data="{ activeTab: '{{ array_key_first($tabs) }}' }">
        @csrf
        @method('PUT')

        {{-- Tab Navigation --}}
        <div class="flex flex-wrap gap-1.5 mb-6 p-1 rounded" style="background-color: var(--color-brand-100); border-radius: var(--radius-card);">
            @foreach($tabs as $key => $label)
            <button type="button"
                    @click="activeTab = '{{ $key }}'"
                    :class="activeTab === '{{ $key }}' ? 'shadow-sm' : 'opacity-60 hover:opacity-80'"
                    :style="activeTab === '{{ $key }}' ? 'background-color: var(--color-bg); color: var(--color-accent-dark); font-weight: 600;' : 'background-color: transparent; color: var(--color-text-muted);'"
                    class="px-3.5 py-1.5 text-xs rounded transition-all"
                    style="border-radius: var(--radius-btn);">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Tab Panels --}}
        @php $templateDir = str_replace('_', '-', $landingPage->template->value); @endphp
        @foreach($tabs as $key => $label)
        <div x-show="activeTab === '{{ $key }}'" x-cloak>
            @include("admin.landing-pages.partials.{$templateDir}.{$key}", ['content' => $content])
        </div>
        @endforeach

        {{-- Settings (always visible) --}}
        <div class="mt-8 pt-8" style="border-top: 1px solid var(--color-border);">
            <h2 class="text-base font-bold mb-5" style="color: var(--color-heading);">Page Settings</h2>
            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Page Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $landingPage->name) }}" required
                           class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $landingPage->slug) }}"
                           class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <p class="text-xs mt-1" style="color: var(--color-text-muted);">URL: <code>/{{ $landingPage->slug }}</code></p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Status</label>
                    <select name="status" class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                            style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <option value="draft" @selected(old('status', $landingPage->status->value) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $landingPage->status->value) === 'published')>Published</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $landingPage->meta_title) }}"
                           placeholder="Defaults to hero headline"
                           class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                              class="w-full px-4 py-2.5 text-sm border rounded outline-none resize-none"
                              style="border-color: var(--color-border); border-radius: var(--radius-btn);">{{ old('meta_description', $landingPage->meta_description) }}</textarea>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">OG Image</label>
                    @if($landingPage->og_image)
                        <div class="flex items-center gap-4 mb-3">
                            <img src="{{ asset('storage/' . $landingPage->og_image) }}" alt="OG Image" class="h-16 rounded object-cover">
                            <label class="flex items-center gap-2 text-sm cursor-pointer" style="color: var(--color-text-muted);">
                                <input type="checkbox" name="remove_og_image" value="1"> Remove image
                            </label>
                        </div>
                    @endif
                    <input type="file" name="og_image" accept="image/*"
                           class="text-sm" style="color: var(--color-text-muted);">
                    <p class="text-xs mt-1" style="color: var(--color-text-muted);">Recommended: 1200×630px</p>
                </div>

                <div class="col-span-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="hidden" name="noindex" value="0">
                        <input type="checkbox" name="noindex" value="1" {{ old('noindex', $landingPage->noindex) ? 'checked' : '' }}
                               class="w-4 h-4 rounded" style="accent-color: var(--color-accent-dark);">
                        <span class="text-sm font-medium" style="color: var(--color-heading);">No-index this page</span>
                    </label>
                    <p class="text-xs mt-1 ml-7" style="color: var(--color-text-muted);">Checked = hide from search engines (default for landing pages). Uncheck only for pages you want Google to index.</p>
                </div>

            </div>
        </div>

        <div class="mt-8 flex items-center gap-4">
            <button type="submit"
                    class="px-6 py-2.5 text-sm font-semibold rounded"
                    style="background-color: var(--color-accent-dark); color: #fff; border-radius: var(--radius-btn);">
                Save Changes
            </button>
            <a href="{{ route('admin.landing-pages.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">Cancel</a>
        </div>

    </form>

</x-layouts.admin>
