<x-layouts.public title="Unsubscribed" :noindex="true">

<section class="px-6 py-24" style="background-color: var(--color-bg);">
    <div class="mx-auto text-center" style="max-width: 560px;">
        <div class="mb-6">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="mx-auto" style="color: var(--color-text-muted);">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
        </div>
        <h1 class="font-extrabold mb-4" style="font-size: 2rem; color: var(--color-heading); letter-spacing: -0.03em;">You've been unsubscribed.</h1>
        <p class="mb-8" style="color: var(--color-text-muted); font-size: 0.95rem;">
            You'll no longer receive emails from Rare Input. We're sorry to see you go.
        </p>
        <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
    </div>
</section>

</x-layouts.public>
