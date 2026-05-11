<x-layouts.admin title="Tags">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Tags</h1>
        </div>
        <a href="{{ route('admin.tags.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Tag
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif

    @if ($tags->isEmpty())
        <p style="color: var(--color-text-muted);">No tags yet. <a href="{{ route('admin.tags.create') }}" class="underline" style="color: var(--color-accent-dark);">Create one.</a></p>
    @else
        <div class="rounded-xl border overflow-hidden" style="border-color: var(--color-border);">
            <table class="w-full text-sm">
                <thead style="background-color: var(--color-surface);">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Name</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Slug</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Subscribers</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr class="border-t" style="border-color: var(--color-border);">
                        <td class="px-5 py-4 font-medium" style="color: var(--color-heading);">{{ $tag->name }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $tag->slug }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $tag->subscribers_count }}</td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('admin.tags.edit', $tag) }}"
                                   class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}"
                                      onsubmit="return confirm('Delete this tag?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-medium hover:underline text-red-500">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $tags->links() }}</div>
    @endif

</x-layouts.admin>
