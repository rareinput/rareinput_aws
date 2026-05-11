<x-layouts.admin title="Sequences">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Email Sequences</h1>
        </div>
        <a href="{{ route('admin.sequences.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Sequence
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif

    @if ($sequences->isEmpty())
        <p style="color: var(--color-text-muted);">No sequences yet. <a href="{{ route('admin.sequences.create') }}" class="underline" style="color: var(--color-accent-dark);">Create one.</a></p>
    @else
        <div class="rounded-xl border overflow-hidden" style="border-color: var(--color-border);">
            <table class="w-full text-sm">
                <thead style="background-color: var(--color-surface);">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Name</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Interval</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Emails</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Enrolled</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sequences as $sequence)
                    <tr class="border-t" style="border-color: var(--color-border);">
                        <td class="px-5 py-4 font-medium" style="color: var(--color-heading);">{{ $sequence->name }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">Every {{ $sequence->interval_days }} {{ Str::plural('day', $sequence->interval_days) }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $sequence->emails_count }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $sequence->subscriber_sequences_count }}</td>
                        <td class="px-5 py-4">
                            @if ($sequence->is_active)
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: #dcfce7; color: #166534;">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: var(--color-surface); color: var(--color-text-muted);">Paused</span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('admin.sequences.show', $sequence) }}"
                                   class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">View</a>
                                <a href="{{ route('admin.sequences.edit', $sequence) }}"
                                   class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                <form method="POST" action="{{ route('admin.sequences.destroy', $sequence) }}"
                                      onsubmit="return confirm('Delete this sequence and all its sends?')">
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
        <div class="mt-6">{{ $sequences->links() }}</div>
    @endif

</x-layouts.admin>
