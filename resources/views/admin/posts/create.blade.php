<x-layouts.admin title="New Post">

    <div class="mb-8">
        <a href="{{ route('admin.posts.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Posts</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">New Post</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded text-sm text-red-700 bg-red-50" style="border-radius: var(--radius-card);">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form id="post-form" method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required class="form-input">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                   placeholder="auto-generated from title if left blank"
                   class="form-input">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Excerpt</label>
            <textarea name="excerpt" rows="2" class="form-input" style="resize: none;">{{ old('excerpt') }}</textarea>
        </div>

        @if($categories->isNotEmpty())
        <div>
            <label class="block text-sm font-medium mb-2" style="color: var(--color-heading);">Categories</label>
            <div class="flex flex-wrap gap-3">
                @foreach($categories as $category)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                           @checked(in_array($category->id, old('categories', [])))
                           class="rounded" style="accent-color: var(--color-accent-dark);">
                    <span class="text-sm" style="color: var(--color-heading);">{{ $category->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @endif

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Body <span class="text-red-500">*</span></label>
            <input type="hidden" name="body" id="body-input">
            <div id="quill-editor" style="min-height: 320px; border: 1px solid var(--color-border); border-radius: var(--radius-btn); font-size: 0.875rem;"></div>
            @error('body')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Featured Image</label>
            <input type="file" name="featured_image" accept="image/*"
                   class="w-full text-sm mb-2" style="color: var(--color-text-muted);">
            <input type="text" name="featured_image_alt" value="{{ old('featured_image_alt') }}"
                   placeholder="Alt text (describe the image for SEO & accessibility)"
                   class="form-input">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2" style="color: var(--color-heading);">Status</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="publish_status" value="published"
                               @checked(old('publish_status') === 'published')
                               class="accent-gray-900">
                        <span class="text-sm font-medium" style="color: var(--color-heading);">Published</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="publish_status" value="scheduled"
                               @checked(old('publish_status') === 'scheduled')
                               class="accent-gray-900">
                        <span class="text-sm font-medium" style="color: var(--color-heading);">Scheduled</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="publish_status" value="draft"
                               @checked(old('publish_status', 'draft') === 'draft')
                               class="accent-gray-900">
                        <span class="text-sm font-medium" style="color: var(--color-heading);">Draft</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Target Date</label>
                <input type="datetime-local" name="published_at"
                       value="{{ old('published_at') }}"
                       class="form-input">
                <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Used for scheduling and writer planning. Required if status is Scheduled.</p>
            </div>
        </div>

        {{-- SEO --}}
        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
            <button type="button" @click="open = !open"
                    class="w-full flex items-center justify-between px-5 py-4 text-sm font-semibold text-left"
                    style="background-color: var(--color-surface); color: var(--color-heading);">
                <span>SEO Settings</span>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-cloak class="px-5 py-5 space-y-5 border-t" style="border-color: var(--color-border);">

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" maxlength="255"
                           placeholder="Defaults to post title if blank"
                           class="form-input">
                    <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Recommended: 50–60 characters</p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Meta Description</label>
                    <textarea name="meta_description" rows="3" maxlength="320"
                              placeholder="Defaults to excerpt if blank"
                              class="form-input" style="resize: none;">{{ old('meta_description') }}</textarea>
                    <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Recommended: 150–160 characters</p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">OG Image <span class="font-normal text-xs" style="color: var(--color-text-muted);">(for social sharing — 1200×630px recommended)</span></label>
                    <input type="file" name="og_image" accept="image/*" class="w-full text-sm" style="color: var(--color-text-muted);">
                    <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Defaults to featured image if blank</p>
                </div>

                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="noindex" value="1" @checked(old('noindex'))
                               class="rounded" style="accent-color: var(--color-accent-dark);">
                        <span class="text-sm font-medium" style="color: var(--color-heading);">Hide from search engines (noindex)</span>
                    </label>
                    <p class="mt-1 text-xs ml-5" style="color: var(--color-text-muted);">Use for drafts or pages you don't want indexed</p>
                </div>

            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Save Post</button>
            <a href="{{ route('admin.posts.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>


    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script>
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Write your post body here...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, 4, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link', 'image'],
                    ['clean'],
                ],
            },
        });

        @if(old('body'))
            quill.root.innerHTML = {!! json_encode(old('body')) !!};
        @endif

        document.getElementById('post-form').addEventListener('submit', function () {
            document.getElementById('body-input').value = quill.root.innerHTML;
        });
    </script>

</x-layouts.admin>
