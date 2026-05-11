<x-layouts.admin title="Dashboard">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Dashboard</h1>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 gap-4 mb-10" style="grid-template-columns: repeat(5, 1fr);">
        <a href="{{ route('admin.posts.index') }}" class="p-5 rounded block" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card); text-decoration: none;">
            <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--color-text-muted);">Published Posts</p>
            <p class="text-3xl font-bold" style="color: var(--color-heading);">{{ $stats['posts_published'] }}</p>
            @if($stats['posts_draft'] > 0)
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">{{ $stats['posts_draft'] }} draft</p>
            @endif
        </a>
        <a href="{{ route('admin.subscribers.index') }}" class="p-5 rounded block" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card); text-decoration: none;">
            <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--color-text-muted);">Active Subscribers</p>
            <p class="text-3xl font-bold" style="color: var(--color-heading);">{{ $stats['subscribers'] }}</p>
        </a>
        <a href="{{ route('admin.landing-pages.index') }}" class="p-5 rounded block" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card); text-decoration: none;">
            <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--color-text-muted);">Live Landing Pages</p>
            <p class="text-3xl font-bold" style="color: var(--color-heading);">{{ $stats['landing_pages'] }}</p>
        </a>
        <a href="{{ route('admin.applications.index') }}" class="p-5 rounded block" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card); text-decoration: none;">
            <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--color-text-muted);">New Applications</p>
            <p class="text-3xl font-bold" style="color: var(--color-heading);">{{ $stats['applications_new'] }}</p>
        </a>
        <a href="{{ route('admin.job-postings.index') }}" class="p-5 rounded block" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card); text-decoration: none;">
            <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--color-text-muted);">Quick Links</p>
            <p class="text-sm font-semibold mt-1" style="color: var(--color-accent-dark);">Jobs &rarr;</p>
            <p class="text-sm font-semibold mt-1" style="color: var(--color-accent-dark);">Sequences &rarr;</p>
        </a>
    </div>

    {{-- Activity Feed --}}
    <div class="grid gap-6" style="grid-template-columns: 1fr 1fr 1fr;">

        {{-- Recent Posts --}}
        <div class="rounded" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card);">
            <div class="flex items-center justify-between px-5 py-4" style="border-bottom: 1px solid var(--color-border);">
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Recent Posts</p>
                <a href="{{ route('admin.posts.create') }}" class="text-xs font-semibold" style="color: var(--color-accent-dark);">+ New</a>
            </div>
            <div class="divide-y" style="--tw-divide-opacity: 1;">
                @forelse($recentPosts as $post)
                <div class="px-5 py-3 flex items-center justify-between gap-3" style="border-bottom: 1px solid var(--color-border);">
                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate" style="color: var(--color-heading);">{{ $post->title }}</p>
                        <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">{{ $post->updated_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex items-center gap-3 shrink-0">
                        <span class="text-xs px-2 py-0.5 rounded" style="{{ $post->isPublished() ? 'background-color:#dcfce7;color:#166534' : 'background-color:#f3f4f6;color:#6b7280' }}">
                            {{ $post->isPublished() ? 'Published' : 'Draft' }}
                        </span>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-xs" style="color: var(--color-accent-dark);">Edit</a>
                    </div>
                </div>
                @empty
                <p class="px-5 py-4 text-sm" style="color: var(--color-text-muted);">No posts yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Subscribers --}}
        <div class="rounded" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card);">
            <div class="flex items-center justify-between px-5 py-4" style="border-bottom: 1px solid var(--color-border);">
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Recent Subscribers</p>
                <a href="{{ route('admin.subscribers.index') }}" class="text-xs" style="color: var(--color-accent-dark);">View all</a>
            </div>
            <div>
                @forelse($recentSubscribers as $subscriber)
                <div class="px-5 py-3 flex items-center justify-between gap-3" style="border-bottom: 1px solid var(--color-border);">
                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate" style="color: var(--color-heading);">{{ $subscriber->name ?: $subscriber->email }}</p>
                        @if($subscriber->name)
                        <p class="text-xs truncate" style="color: var(--color-text-muted);">{{ $subscriber->email }}</p>
                        @endif
                    </div>
                    <div class="shrink-0">
                        <span class="text-xs" style="color: var(--color-text-muted);">{{ $subscriber->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @empty
                <p class="px-5 py-4 text-sm" style="color: var(--color-text-muted);">No subscribers yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Applications --}}
        <div class="rounded" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card);">
            <div class="flex items-center justify-between px-5 py-4" style="border-bottom: 1px solid var(--color-border);">
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Recent Applications</p>
                <a href="{{ route('admin.applications.index') }}" class="text-xs" style="color: var(--color-accent-dark);">View all</a>
            </div>
            <div>
                @forelse($recentApplications as $application)
                <div class="px-5 py-3 flex items-center justify-between gap-3" style="border-bottom: 1px solid var(--color-border);">
                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate" style="color: var(--color-heading);">{{ $application->name }}</p>
                        <p class="text-xs truncate" style="color: var(--color-text-muted);">{{ $application->jobPosting?->title ?? '—' }}</p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <span class="text-xs px-2 py-0.5 rounded" style="{{ $application->status->color() }}">{{ $application->status->value }}</span>
                        <a href="{{ route('admin.applications.show', $application) }}" class="text-xs" style="color: var(--color-accent-dark);">View</a>
                    </div>
                </div>
                @empty
                <p class="px-5 py-4 text-sm" style="color: var(--color-text-muted);">No applications yet.</p>
                @endforelse
            </div>
        </div>

    </div>

</x-layouts.admin>
