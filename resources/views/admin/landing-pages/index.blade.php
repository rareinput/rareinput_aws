<x-layouts.admin title="Landing Pages">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Landing Pages</h1>
        </div>
        <a href="{{ route('admin.landing-pages.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Landing Page
        </a>
    </div>

    @if($landingPages->isEmpty())
        <div class="text-center py-20" style="color: var(--color-text-muted);">
            <p class="text-lg font-medium mb-2">No landing pages yet.</p>
            <p class="text-sm mb-6">Create your first landing page to get started.</p>
            <a href="{{ route('admin.landing-pages.create') }}"
               class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
               style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
                Create Landing Page
            </a>
        </div>
    @else
        <div class="rounded overflow-hidden" style="border: 1px solid var(--color-border); border-radius: var(--radius-card); background-color: var(--color-bg);">
            <table class="w-full text-sm">
                <thead>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-text-muted);">Name</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-text-muted);">Template</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-text-muted);">Slug</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-text-muted);">Status</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-text-muted);">Updated</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($landingPages as $page)
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td class="px-5 py-4 font-medium" style="color: var(--color-heading);">{{ $page->name }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $page->template->label() }}</td>
                        <td class="px-5 py-4">
                            <code class="text-xs px-2 py-0.5 rounded" style="background-color: var(--color-brand-100); color: var(--color-text-muted);">/{{ $page->slug }}</code>
                        </td>
                        <td class="px-5 py-4">
                            <span class="text-xs font-semibold px-2 py-0.5 rounded" style="{{ $page->status->badgeStyle() }}">
                                {{ $page->status->label() }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-xs" style="color: var(--color-text-muted);">{{ $page->updated_at->diffForHumans() }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3 justify-end">
                                @if($page->isPublished())
                                <a href="/{{ $page->slug }}" target="_blank"
                                   class="text-xs hover:underline" style="color: var(--color-text-muted);">View ↗</a>
                                @endif
                                <a href="{{ route('admin.landing-pages.preview', $page) }}" target="_blank"
                                   class="text-xs hover:underline" style="color: var(--color-text-muted);">Preview</a>
                                <a href="{{ route('admin.landing-pages.edit', $page) }}"
                                   class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                <form method="POST" action="{{ route('admin.landing-pages.duplicate', $page) }}">
                                    @csrf
                                    <button type="submit" class="text-xs hover:underline" style="color: var(--color-text-muted);">Duplicate</button>
                                </form>
                                <form method="POST" action="{{ route('admin.landing-pages.destroy', $page) }}"
                                      onsubmit="return confirm('Delete \'{{ $page->name }}\'?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($landingPages->hasPages())
        <div class="mt-6">{{ $landingPages->links() }}</div>
        @endif
    @endif

</x-layouts.admin>
