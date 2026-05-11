<x-layouts.admin title="Posts">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Posts</h1>
        </div>
        <a href="{{ route('admin.posts.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Post
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif

    @if ($posts->isEmpty())
        <p style="color: var(--color-text-muted);">No posts yet. <a href="{{ route('admin.posts.create') }}" class="underline">Create one.</a></p>
    @else
        <form method="POST" action="{{ route('admin.posts.bulk-destroy') }}" onsubmit="return confirm('Delete selected posts?')" id="bulk-form">
            @csrf
            @method('DELETE')

            {{-- Bulk action bar --}}
            <div x-data="{ selected: 0 }" x-init="
                document.addEventListener('change', () => {
                    selected = document.querySelectorAll('.row-check:checked').length;
                });
            ">
                <div class="flex items-center gap-3 mb-2" x-show="selected > 0" x-cloak>
                    <span class="text-sm" style="color: var(--color-text-muted);">
                        <span x-text="selected"></span> selected
                    </span>
                    <button type="submit" form="bulk-form"
                            class="text-sm font-medium text-red-500 hover:underline">
                        Delete Selected
                    </button>
                </div>
            </div>

            <div class="rounded border overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
                <table class="w-full text-sm">
                    <thead style="background-color: var(--color-surface);">
                        <tr>
                            <th class="px-5 py-3 w-8">
                                <input type="checkbox" id="select-all" class="rounded" style="accent-color: var(--color-accent-dark);">
                            </th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">#</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Title</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Date</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                        <tr class="border-t" style="border-color: var(--color-border);">
                            <td class="px-5 py-4 align-middle">
                                <input type="checkbox" name="ids[]" value="{{ $post->id }}" class="row-check rounded" style="accent-color: var(--color-accent-dark);">
                            </td>
                            <td class="px-5 py-4 align-middle text-sm" style="color: var(--color-text-muted);">
                                {{ $posts->firstItem() + $index }}
                            </td>
                            <td class="px-5 py-4 align-middle font-medium" style="color: var(--color-heading);">
                                {{ $post->title }}
                            </td>
                            <td class="px-5 py-4 align-middle">
                                @if ($post->isPublished())
                                    <span class="px-2 py-1 text-xs rounded font-medium" style="background-color: #dcfce7; color: #166534;">Published</span>
                                @elseif ($post->published_at)
                                    <span class="px-2 py-1 text-xs rounded font-medium" style="background-color: #fef9c3; color: #854d0e;">Scheduled</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded font-medium" style="background-color: var(--color-brand-100); color: var(--color-text-muted);">Draft</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 align-middle" style="color: var(--color-text-muted);">
                                {{ $post->published_at?->format('M d, Y') ?? '—' }}
                            </td>
                            <td class="px-5 py-4 align-middle text-right">
                                <div class="flex items-center justify-end gap-4">
                                    @if($post->isPublished())
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-xs font-medium hover:underline" style="color: var(--color-text-muted);">View</a>
                                    @endif
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                          onsubmit="return confirm('Delete this post?')"
                                          class="flex items-center">
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
        </form>

        <div class="mt-6">{{ $posts->links() }}</div>
    @endif

    <script>
        document.getElementById('select-all')?.addEventListener('change', function () {
            document.querySelectorAll('.row-check').forEach(cb => {
                cb.checked = this.checked;
                cb.dispatchEvent(new Event('change', { bubbles: true }));
            });
        });
    </script>

</x-layouts.admin>
