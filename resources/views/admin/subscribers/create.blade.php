<x-layouts.admin title="Add Subscriber">

    <div class="mb-8">
        <a href="{{ route('admin.subscribers.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Subscribers</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">Add Subscriber</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.subscribers.store') }}" class="space-y-6" style="max-width: 600px;">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-input">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-input">
        </div>

        @if ($tags->isNotEmpty())
        <div>
            <label class="block text-sm font-semibold mb-2" style="color: var(--color-heading);">Tags</label>
            <div class="flex flex-wrap gap-3">
                @foreach ($tags as $tag)
                    <label class="flex items-center gap-2 text-sm cursor-pointer" style="color: var(--color-heading);">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                               @checked(in_array($tag->id, old('tags', [])))
                               class="rounded" style="accent-color: var(--color-accent-dark);">
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>
        @endif

        @if ($sequences->isNotEmpty())
        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Enroll in sequence</label>
            <select name="sequence_id" class="form-input" style="max-width: 360px;">
                <option value="">None</option>
                @foreach ($sequences as $sequence)
                    <option value="{{ $sequence->id }}" @selected(old('sequence_id') == $sequence->id)>{{ $sequence->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Add Subscriber</button>
            <a href="{{ route('admin.subscribers.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

</x-layouts.admin>
