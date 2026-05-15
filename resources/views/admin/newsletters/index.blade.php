<x-layouts.admin title="Newsletters">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Newsletters</h1>
        </div>
        <a href="{{ route('admin.newsletters.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Newsletter
        </a>
    </div>

    <div class="mb-6 p-4 rounded-xl border flex items-center gap-4" style="background: var(--color-surface); border-color: var(--color-border);">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: var(--color-accent-dark); flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span class="text-sm font-medium" style="color: var(--color-heading);">
            <strong>{{ $subscriberCount }}</strong> active subscriber{{ $subscriberCount !== 1 ? 's' : '' }} will receive your next newsletter.
        </span>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-6 p-4 rounded-lg text-sm font-medium" style="background-color: #fee2e2; color: #991b1b;">{{ session('error') }}</div>
    @endif

    @if ($newsletters->isEmpty())
        <p style="color: var(--color-text-muted);">No newsletters yet. <a href="{{ route('admin.newsletters.create') }}" class="underline">Create one.</a></p>
    @else
        <div class="rounded border overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
            <table class="w-full text-sm">
                <thead style="background-color: var(--color-surface);">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Subject</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Scheduled / Sent</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Recipients</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newsletters as $newsletter)
                    <tr class="border-t" style="border-color: var(--color-border);">
                        <td class="px-5 py-3 font-medium" style="color: var(--color-heading);">{{ $newsletter->subject }}</td>
                        <td class="px-5 py-3">
                            @php
                                $badge = match($newsletter->status) {
                                    'sent'      => ['bg' => '#dcfce7', 'text' => '#166534', 'label' => 'Sent'],
                                    'sending'   => ['bg' => '#dbeafe', 'text' => '#1e40af', 'label' => 'Sending'],
                                    'scheduled' => ['bg' => '#fef9c3', 'text' => '#854d0e', 'label' => 'Scheduled'],
                                    default     => ['bg' => 'var(--color-surface)', 'text' => 'var(--color-text-muted)', 'label' => 'Draft'],
                                };
                            @endphp
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full"
                                  style="background: {{ $badge['bg'] }}; color: {{ $badge['text'] }};">
                                {{ $badge['label'] }}
                            </span>
                        </td>
                        <td class="px-5 py-3" style="color: var(--color-text-muted);">
                            @if($newsletter->sent_at)
                                {{ $newsletter->sent_at->format('M d, Y g:i A') }}
                            @elseif($newsletter->scheduled_at)
                                {{ $newsletter->scheduled_at->format('M d, Y g:i A') }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-5 py-3" style="color: var(--color-text-muted);">
                            {{ $newsletter->sent_count ?: '—' }}
                        </td>
                        <td class="px-5 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                @if($newsletter->isSent())
                                    <a href="{{ route('admin.newsletters.show', $newsletter) }}"
                                       class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Stats</a>
                                @else
                                    <a href="{{ route('admin.newsletters.edit', $newsletter) }}"
                                       class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                @endif
                                <form method="POST" action="{{ route('admin.newsletters.destroy', $newsletter) }}"
                                      onsubmit="return confirm('Delete this newsletter?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs font-medium text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $newsletters->links() }}</div>
    @endif

</x-layouts.admin>
