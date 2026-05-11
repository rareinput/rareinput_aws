<x-layouts.admin title="New Landing Page">

    <div class="mb-8">
        <a href="{{ route('admin.landing-pages.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Landing Pages</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">New Landing Page</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.landing-pages.store') }}" enctype="multipart/form-data" class="space-y-6" style="max-width: 620px;">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Page Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Shopify Dev — Q2 Campaign"
                   class="form-input">
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">Internal label — not shown on the page.</p>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="auto-generated from name"
                   class="form-input">
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">The URL will be <code>yourdomain.com/{slug}</code></p>
        </div>

        <div>
            <label class="block text-sm font-medium mb-3" style="color: var(--color-heading);">Template <span class="text-red-500">*</span></label>
            <div class="grid grid-cols-2 gap-4">
                @foreach($templates as $template)
                <label class="relative flex flex-col gap-2 p-4 border rounded cursor-pointer transition-colors hover:border-gray-400"
                       style="border-color: var(--color-border); border-radius: var(--radius-card);"
                       x-data
                       :style="$el.querySelector('input').checked ? 'border-color: var(--color-accent-dark); background-color: var(--color-accent-light);' : ''">
                    <input type="radio" name="template" value="{{ $template->value }}"
                           @checked(old('template') === $template->value || ($loop->first && !old('template')))
                           class="sr-only">
                    <span class="font-semibold text-sm" style="color: var(--color-heading);">{{ $template->label() }}</span>
                    <span class="text-xs" style="color: var(--color-text-muted);">
                        @if($template->value === 'single_service')
                            Best for campaigns promoting one specific service. Includes problem/solution, detailed services breakdown, stats, and a form with checklist.
                        @else
                            Best for seasonal offers across all services. Includes countdown timer, urgency banner, services grid, and a simple lead form.
                        @endif
                    </span>
                </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Status</label>
            <select name="status" class="form-input">
                <option value="draft" @selected(old('status', 'draft') === 'draft')>Draft</option>
                <option value="published" @selected(old('status') === 'published')>Published</option>
            </select>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Create & Edit Content</button>
            <a href="{{ route('admin.landing-pages.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

</x-layouts.admin>
