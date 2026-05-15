<x-layouts.admin title="Newsletter Stats">

    <div class="mb-8">
        <a href="{{ route('admin.newsletters.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Newsletters</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">{{ $newsletter->subject }}</h1>
        <p class="text-sm mt-1" style="color: var(--color-text-muted);">
            Sent {{ $newsletter->sent_at?->format('M d, Y g:i A') ?? '—' }}
        </p>
    </div>

    {{-- Stat Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 1rem; margin-bottom: 2rem;">

        <div class="p-5 rounded-xl border" style="background: var(--color-surface); border-color: var(--color-border);">
            <p class="text-xs font-bold tracking-widest uppercase mb-1" style="color: var(--color-text-light);">Sent</p>
            <p class="text-3xl font-extrabold" style="color: var(--color-heading);">{{ number_format($stats['sent']) }}</p>
        </div>

        <div class="p-5 rounded-xl border" style="background: var(--color-surface); border-color: var(--color-border);">
            <p class="text-xs font-bold tracking-widest uppercase mb-1" style="color: var(--color-text-light);">Opens</p>
            <p class="text-3xl font-extrabold" style="color: var(--color-heading);">{{ number_format($stats['opens']) }}</p>
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">{{ $stats['open_rate'] }}% open rate</p>
        </div>

        <div class="p-5 rounded-xl border" style="background: var(--color-surface); border-color: var(--color-border);">
            <p class="text-xs font-bold tracking-widest uppercase mb-1" style="color: var(--color-text-light);">Clicks</p>
            <p class="text-3xl font-extrabold" style="color: var(--color-heading);">{{ number_format($stats['unique_clicks']) }}</p>
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">{{ $stats['click_rate'] }}% click rate · {{ $stats['clicks'] }} total</p>
        </div>

        <div class="p-5 rounded-xl border" style="background: var(--color-surface); border-color: var(--color-border);">
            <p class="text-xs font-bold tracking-widest uppercase mb-1" style="color: var(--color-text-light);">Unsubscribes</p>
            <p class="text-3xl font-extrabold" style="color: var(--color-heading);">{{ number_format($stats['unsubscribes']) }}</p>
            @if($stats['sent'] > 0)
                <p class="text-xs mt-1" style="color: var(--color-text-muted);">{{ round(($stats['unsubscribes'] / $stats['sent']) * 100, 1) }}% unsub rate</p>
            @endif
        </div>

    </div>

    <div class="grid gap-8" style="grid-template-columns: 1fr 1fr;">

        {{-- Top Clicked Links --}}
        <div>
            <h2 class="text-base font-bold mb-4" style="color: var(--color-heading);">Top Clicked Links</h2>
            @if($topLinks->isEmpty())
                <p class="text-sm" style="color: var(--color-text-muted);">No clicks recorded yet.</p>
            @else
                <div class="rounded border overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
                    <table class="w-full text-sm">
                        <thead style="background: var(--color-surface);">
                            <tr>
                                <th class="text-left px-4 py-3 font-semibold" style="color: var(--color-heading);">URL</th>
                                <th class="text-right px-4 py-3 font-semibold" style="color: var(--color-heading);">Clicks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topLinks as $link)
                            <tr class="border-t" style="border-color: var(--color-border);">
                                <td class="px-4 py-2.5">
                                    <a href="{{ $link['url'] }}" target="_blank" class="text-xs hover:underline truncate block max-w-xs" style="color: var(--color-accent-dark);">
                                        {{ $link['url'] }}
                                    </a>
                                </td>
                                <td class="px-4 py-2.5 text-right text-xs font-semibold" style="color: var(--color-heading);">{{ $link['count'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Recent Activity --}}
        <div>
            <h2 class="text-base font-bold mb-4" style="color: var(--color-heading);">Recent Activity</h2>
            @if($events->isEmpty())
                <p class="text-sm" style="color: var(--color-text-muted);">No activity recorded yet.</p>
            @else
                <div class="rounded border overflow-hidden" style="border-color: var(--color-border); border-radius: var(--radius-card);">
                    <table class="w-full text-sm">
                        <thead style="background: var(--color-surface);">
                            <tr>
                                <th class="text-left px-4 py-3 font-semibold" style="color: var(--color-heading);">Subscriber</th>
                                <th class="text-left px-4 py-3 font-semibold" style="color: var(--color-heading);">Event</th>
                                <th class="text-left px-4 py-3 font-semibold" style="color: var(--color-heading);">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events->take(20) as $event)
                            <tr class="border-t" style="border-color: var(--color-border);">
                                <td class="px-4 py-2.5 text-xs" style="color: var(--color-heading);">{{ $event->subscriber?->email ?? '—' }}</td>
                                <td class="px-4 py-2.5">
                                    @php
                                        $badge = match($event->type) {
                                            'open'        => ['bg' => '#dbeafe', 'text' => '#1e40af', 'label' => 'Open'],
                                            'click'       => ['bg' => '#dcfce7', 'text' => '#166534', 'label' => 'Click'],
                                            'unsubscribe' => ['bg' => '#fee2e2', 'text' => '#991b1b', 'label' => 'Unsub'],
                                            default       => ['bg' => 'var(--color-surface)', 'text' => 'var(--color-text-muted)', 'label' => $event->type],
                                        };
                                    @endphp
                                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full"
                                          style="background: {{ $badge['bg'] }}; color: {{ $badge['text'] }};">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="px-4 py-2.5 text-xs" style="color: var(--color-text-muted);">{{ $event->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

</x-layouts.admin>
