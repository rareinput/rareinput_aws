<x-layouts.admin title="Edit Subscriber">

    <div class="mb-8">
        <a href="{{ route('admin.subscribers.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Subscribers</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">Edit Subscriber</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.subscribers.update', $subscriber) }}" class="space-y-6" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email', $subscriber->email) }}" required class="form-input">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Name</label>
            <input type="text" name="name" value="{{ old('name', $subscriber->name) }}" class="form-input">
        </div>

        @if ($tags->isNotEmpty())
        <div>
            <label class="block text-sm font-semibold mb-2" style="color: var(--color-heading);">Tags</label>
            <div class="flex flex-wrap gap-3">
                @foreach ($tags as $tag)
                    <label class="flex items-center gap-2 text-sm cursor-pointer" style="color: var(--color-heading);">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                               @checked(in_array($tag->id, old('tags', $subscriber->tags->pluck('id')->toArray())))
                               class="rounded" style="accent-color: var(--color-accent-dark);">
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>
        @endif

        @if ($subscriber->subscriberSequences->isNotEmpty())
        <div>
            <label class="block text-sm font-semibold mb-2" style="color: var(--color-heading);">Active sequences</label>
            <div class="space-y-1">
                @foreach ($subscriber->subscriberSequences as $ss)
                    <div class="text-sm" style="color: var(--color-text-muted);">
                        {{ $ss->sequence->name }} — started {{ $ss->started_at->format('d M Y') }}
                        @if ($ss->completed_at)
                            <span class="ml-2 px-2 py-0.5 text-xs rounded-full" style="background-color: #dcfce7; color: #166534;">Completed</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Save Changes</button>
            <a href="{{ route('admin.subscribers.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

</x-layouts.admin>
