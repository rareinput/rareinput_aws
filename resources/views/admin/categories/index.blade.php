<x-layouts.admin title="Categories">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Categories</h1>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Add new category --}}
        <div>
            <h2 class="text-sm font-semibold mb-4" style="color: var(--color-heading);">Add New Category</h2>
            <form method="POST" action="{{ route('admin.categories.store') }}" class="flex gap-3">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Category name" required
                       class="flex-1 px-4 py-2.5 text-sm border rounded outline-none"
                       style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                <button type="submit"
                        class="px-5 py-2.5 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
                        style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
                    Add
                </button>
            </form>
            @error('name')<p class="mt-2 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        {{-- Category list --}}
        <div>
            <h2 class="text-sm font-semibold mb-4" style="color: var(--color-heading);">All Categories</h2>
            @if($categories->isEmpty())
                <p class="text-sm" style="color: var(--color-text-muted);">No categories yet.</p>
            @else
                <div class="rounded border overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
                    <table class="w-full text-sm">
                        <thead style="background-color: var(--color-surface);">
                            <tr>
                                <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Name</th>
                                <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Posts</th>
                                <th class="px-5 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="border-t" style="border-color: var(--color-border);" x-data="{ editing: false }">
                                <td class="px-5 py-3 align-middle">
                                    <span x-show="!editing" style="color: var(--color-heading);">{{ $category->name }}</span>
                                    <form x-show="editing" x-cloak method="POST" action="{{ route('admin.categories.update', $category) }}" class="flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $category->name }}" required
                                               class="px-3 py-1.5 text-sm border rounded outline-none"
                                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                                        <button type="submit" class="text-xs font-medium text-green-600 hover:underline">Save</button>
                                        <button type="button" @click="editing = false" class="text-xs font-medium hover:underline" style="color: var(--color-text-muted);">Cancel</button>
                                    </form>
                                </td>
                                <td class="px-5 py-3 align-middle text-sm" style="color: var(--color-text-muted);">{{ $category->posts_count }}</td>
                                <td class="px-5 py-3 align-middle text-right">
                                    <div class="flex items-center justify-end gap-4">
                                        <button type="button" @click="editing = true" x-show="!editing"
                                                class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</button>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                              onsubmit="return confirm('Delete this category?')" class="flex items-center">
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
            @endif
        </div>

    </div>

</x-layouts.admin>
