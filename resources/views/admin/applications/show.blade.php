<x-layouts.admin title="Application — {{ $application->name }}">

    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.applications.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Applications</a>
            <h1 class="text-2xl font-bold mt-1" style="color: var(--color-heading);">{{ $application->name }}</h1>
            <p class="text-sm mt-1" style="color: var(--color-text-muted);">{{ $application->jobPosting->title }} &middot; Applied {{ $application->created_at->format('d M Y') }}</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="px-3 py-1.5 text-sm font-semibold rounded-full" style="{{ $application->status->color() }}">
                {{ $application->status->value }}
            </span>
            <form method="POST" action="{{ route('admin.applications.destroy', $application) }}"
                  onsubmit="return confirm('Delete this application and resume permanently?')"
                  class="flex items-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm font-medium hover:underline text-red-500">Delete Application</button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Left: Applicant details --}}
        <div class="lg:col-span-2 space-y-6">

            <div class="rounded-xl border p-6 space-y-4" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest" style="color: var(--color-text-muted);">Contact</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">Personal Email</p>
                        <p style="color: var(--color-text-muted);">{{ $application->email }}</p>
                    </div>
                    @if($application->work_email)
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">Work Email</p>
                        <p style="color: var(--color-text-muted);">{{ $application->work_email }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">Phone</p>
                        <p style="color: var(--color-text-muted);">{{ $application->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border p-6 space-y-4" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest" style="color: var(--color-text-muted);">Background</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    @if($application->experience)
                    <div class="sm:col-span-2">
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">Experience</p>
                        <p style="color: var(--color-text-muted);">{{ $application->experience }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">Highest Education</p>
                        <p style="color: var(--color-text-muted);">{{ $application->highest_education }}</p>
                    </div>
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">University</p>
                        <p style="color: var(--color-text-muted);">{{ $application->university }}</p>
                    </div>
                </div>
            </div>

            @if($application->linkedin_url || $application->portfolio_urls)
            <div class="rounded-xl border p-6 space-y-4" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest" style="color: var(--color-text-muted);">Online Presence</h2>
                <div class="space-y-2 text-sm">
                    @if($application->linkedin_url)
                    <div>
                        <p class="font-semibold mb-0.5" style="color: var(--color-heading);">LinkedIn</p>
                        <a href="{{ $application->linkedin_url }}" target="_blank" rel="noopener"
                           class="hover:underline break-all" style="color: var(--color-accent-dark);">{{ $application->linkedin_url }}</a>
                    </div>
                    @endif
                    @if($application->portfolio_urls)
                    <div>
                        <p class="font-semibold mb-1" style="color: var(--color-heading);">Portfolio URLs</p>
                        <ul class="space-y-1">
                            @foreach($application->portfolio_urls as $url)
                            <li>
                                <a href="{{ $url }}" target="_blank" rel="noopener"
                                   class="hover:underline break-all" style="color: var(--color-accent-dark);">{{ $url }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <div class="rounded-xl border p-6" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest mb-4" style="color: var(--color-text-muted);">Cover Note</h2>
                <p class="text-sm leading-relaxed whitespace-pre-wrap" style="color: var(--color-text);">{{ $application->cover_note }}</p>
            </div>

        </div>

        {{-- Right: Actions --}}
        <div class="space-y-5">

            <div class="rounded-xl border p-6" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest mb-4" style="color: var(--color-text-muted);">Resume</h2>
                <a href="{{ route('admin.applications.download', $application) }}"
                   class="btn-primary w-full" style="justify-content:center;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                    Download Resume
                </a>
            </div>

            <div class="rounded-xl border p-6" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <h2 class="font-bold text-sm uppercase tracking-widest mb-4" style="color: var(--color-text-muted);">Update Status</h2>
                <form method="POST" action="{{ route('admin.applications.update', $application) }}">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-input mb-3">
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" @selected($application->status === $status)>
                                {{ $status->value }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary w-full" style="justify-content:center;">
                        Save Status
                    </button>
                </form>
            </div>

        </div>
    </div>

</x-layouts.admin>
