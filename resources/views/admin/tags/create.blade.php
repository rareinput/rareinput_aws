<x-layouts.admin title="New Tag">

    <div class="mb-8">
        <a href="{{ route('admin.tags.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Tags</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">New Tag</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.tags.store') }}" class="space-y-6" style="max-width: 560px;">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required class="form-input" placeholder="e.g. Email Marketing Course">
            <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Slug is generated automatically from the name.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Description</label>
            <textarea name="description" rows="3" class="form-input" style="resize: vertical;" placeholder="Optional description for this tag…">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Create Tag</button>
            <a href="{{ route('admin.tags.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

</x-layouts.admin>
