<x-layouts.admin title="Subscribers">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Subscribers</h1>
        </div>
        <a href="{{ route('admin.subscribers.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            Add Subscriber
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif

    {{-- Filters --}}
    <form method="GET" class="flex flex-wrap gap-3 mb-6">
        <select name="tag" class="form-input" style="max-width: 200px;">
            <option value="">All tags</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @selected(request('tag') == $tag->id)>{{ $tag->name }}</option>
            @endforeach
        </select>
        <select name="status" class="form-input" style="max-width: 200px;">
            <option value="">All statuses</option>
            @foreach ($statuses as $status)
                <option value="{{ $status->value }}" @selected(request('status') === $status->value)>{{ ucfirst($status->value) }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary">Filter</button>
        @if (request()->hasAny(['tag', 'status']))
            <a href="{{ route('admin.subscribers.index') }}" class="btn-secondary">Clear</a>
        @endif
    </form>

    @if ($subscribers->isEmpty())
        <p style="color: var(--color-text-muted);">No subscribers found.</p>
    @else
        <div class="rounded-xl border overflow-hidden" style="border-color: var(--color-border);">
            <table class="w-full text-sm">
                <thead style="background-color: var(--color-surface);">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Email</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Name</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Tags</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Subscribed</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                    <tr class="border-t" style="border-color: var(--color-border);">
                        <td class="px-5 py-4 font-medium" style="color: var(--color-heading);">{{ $subscriber->email }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $subscriber->name ?? '—' }}</td>
                        <td class="px-5 py-4">
                            <div class="flex flex-wrap gap-1">
                                @forelse ($subscriber->tags as $tag)
                                    <span class="px-2 py-0.5 text-xs rounded-full font-medium" style="background-color: var(--color-surface); color: var(--color-text-muted); border: 1px solid var(--color-border);">{{ $tag->name }}</span>
                                @empty
                                    <span style="color: var(--color-text-muted);">—</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            @if ($subscriber->status->value === 'active')
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: #dcfce7; color: #166534;">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: #fee2e2; color: #991b1b;">Unsubscribed</span>
                            @endif
                        </td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $subscriber->subscribed_at?->format('d M Y') ?? '—' }}</td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('admin.subscribers.edit', $subscriber) }}"
                                   class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                <form method="POST" action="{{ route('admin.subscribers.destroy', $subscriber) }}"
                                      onsubmit="return confirm('Delete this subscriber?')">
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
        <div class="mt-6">{{ $subscribers->links() }}</div>
    @endif

</x-layouts.admin>
