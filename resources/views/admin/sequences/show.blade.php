<x-layouts.admin title="{{ $sequence->name }}">

    <div class="mb-8">
        <a href="{{ route('admin.sequences.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Sequences</a>
        <div class="flex items-center justify-between mt-2">
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">{{ $sequence->name }}</h1>
            <a href="{{ route('admin.sequences.edit', $sequence) }}"
               class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
               style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
                Edit
            </a>
        </div>
        <div class="flex items-center gap-4 mt-2 text-sm" style="color: var(--color-text-muted);">
            <span>Every {{ $sequence->interval_days }} {{ Str::plural('day', $sequence->interval_days) }}</span>
            <span>·</span>
            <span>{{ $sequence->emails->count() }} {{ Str::plural('email', $sequence->emails->count()) }}</span>
            <span>·</span>
            @if ($sequence->is_active)
                <span class="px-2 py-0.5 text-xs rounded-full font-medium" style="background-color: #dcfce7; color: #166534;">Active</span>
            @else
                <span class="px-2 py-0.5 text-xs rounded-full font-medium" style="background-color: var(--color-surface); color: var(--color-text-muted);">Paused</span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Emails --}}
        <div class="lg:col-span-2 space-y-4">
            <h2 class="text-base font-semibold" style="color: var(--color-heading);">Emails</h2>
            @foreach ($sequence->emails as $email)
            <div class="rounded-xl border p-5" style="border-color: var(--color-border);">
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-2 py-0.5 text-xs rounded-full font-medium" style="background-color: var(--color-surface); color: var(--color-text-muted); border: 1px solid var(--color-border);">Day {{ ($email->sort_order - 1) * $sequence->interval_days + 1 }}</span>
                    <span class="font-semibold text-sm" style="color: var(--color-heading);">{{ $email->subject }}</span>
                </div>
                <p class="text-sm whitespace-pre-wrap" style="color: var(--color-text-muted);">{{ Str::limit($email->body, 200) }}</p>
            </div>
            @endforeach
        </div>

        {{-- Enrolled Subscribers --}}
        <div>
            <h2 class="text-base font-semibold mb-4" style="color: var(--color-heading);">Enrolled Subscribers ({{ $sequence->subscriberSequences->count() }})</h2>
            @if ($sequence->subscriberSequences->isEmpty())
                <p class="text-sm" style="color: var(--color-text-muted);">No subscribers enrolled yet.</p>
            @else
                <div class="space-y-3">
                    @foreach ($sequence->subscriberSequences as $ss)
                    <div class="rounded-lg border p-3" style="border-color: var(--color-border);">
                        <p class="text-sm font-medium" style="color: var(--color-heading);">{{ $ss->subscriber->email }}</p>
                        <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">
                            Started {{ $ss->started_at->format('d M Y') }}
                            @if ($ss->completed_at)
                                · Completed {{ $ss->completed_at->format('d M Y') }}
                            @endif
                        </p>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</x-layouts.admin>
