<x-layouts.public title="You're Subscribed!" :noindex="true">

<section class="px-6 py-24" style="background-color: var(--color-bg);">
    <div class="mx-auto text-center" style="max-width: 560px;">

        <div class="mb-6">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="mx-auto" style="color: var(--color-accent-dark);">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1 class="font-extrabold mb-3" style="font-size: 2rem; color: var(--color-heading); letter-spacing: -0.03em;">
            You're subscribed!
        </h1>
        <p class="mb-10" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.7;">
            Welcome to the Rare Input newsletter. Expect actionable tips on Shopify, SEO, and growth — no fluff, straight to your inbox.
        </p>

        @if($named)
            {{-- Name already saved --}}
            <div class="p-6 rounded-2xl border mb-8" style="background: var(--color-surface); border-color: var(--color-border);">
                <p class="font-semibold mb-1" style="color: var(--color-heading);">You're all set{{ $subscriber->name ? ', ' . $subscriber->name : '' }}.</p>
                <p style="color: var(--color-text-muted); font-size: 0.875rem;">We'll use your name to personalise future emails.</p>
            </div>
        @else
            {{-- Ask for first name --}}
            <div class="p-6 rounded-2xl border mb-8 text-left" style="background: var(--color-surface); border-color: var(--color-border);">
                <p class="font-bold mb-1" style="color: var(--color-heading); font-size: 0.95rem;">One more thing — what's your first name?</p>
                <p class="mb-5" style="color: var(--color-text-muted); font-size: 0.8rem;">So we can address you personally in our emails.</p>
                <form method="POST" action="{{ route('subscribe.save-name') }}">
                    @csrf
                    <div class="flex gap-2">
                        <input type="text" name="name" required placeholder="Your first name"
                               class="flex-1 px-4 py-2.5 text-sm rounded-lg border outline-none"
                               style="border-color: var(--color-border); background: var(--color-bg); color: var(--color-heading);">
                        <button type="submit" class="btn-primary shrink-0">Save</button>
                    </div>
                    @error('name')
                        <p class="text-xs mt-2" style="color: #e53e3e;">{{ $message }}</p>
                    @enderror
                </form>
                <p class="text-xs mt-3" style="color: var(--color-text-light);">
                    <a href="{{ route('blog.index') }}" style="color: var(--color-text-light);">Skip and go to the blog →</a>
                </p>
            </div>
        @endif

        <a href="{{ route('blog.index') }}" class="btn-primary">Browse the Blog →</a>

    </div>
</section>

</x-layouts.public>
