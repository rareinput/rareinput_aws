@props(['heading' => 'Stay in the loop', 'subheading' => 'Get insights on digital marketing and web development straight to your inbox.'])

<section class="px-6 py-16" style="background-color: var(--color-surface); border-top: 1px solid var(--color-border);">
    <div class="mx-auto text-center" style="max-width: 560px;">
        <span class="section-label">Newsletter</span>
        <h2 class="font-extrabold mb-3" style="font-size: 1.75rem; color: var(--color-heading); letter-spacing: -0.03em;">{{ $heading }}</h2>
        <p class="mb-8" style="color: var(--color-text-muted); font-size: 0.95rem;">{{ $subheading }}</p>

        @if(session('success') && str_contains(session('success'), 'subscribed'))
            <div class="mb-6 px-4 py-3 rounded-lg text-sm font-medium" style="background-color: #dcfce7; color: #166534;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
            @csrf
            <input
                type="text"
                name="name"
                placeholder="Your name (optional)"
                value="{{ old('name') }}"
                class="form-input flex-1"
            >
            <input
                type="email"
                name="email"
                placeholder="Your email address"
                value="{{ old('email') }}"
                required
                class="form-input flex-1"
            >
            <button type="submit" class="btn-primary whitespace-nowrap">Subscribe</button>
        </form>

        @error('email')
            <p class="mt-2 text-sm" style="color: #dc2626;">{{ $message }}</p>
        @enderror

        <p class="mt-4 text-xs" style="color: var(--color-text-muted);">No spam, ever. Unsubscribe at any time.</p>
    </div>
</section>
