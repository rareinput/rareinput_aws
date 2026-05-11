<x-layouts.public
    title="Careers"
    description="Join the Rare Input team. We're looking for talented developers, marketers, and strategists who want to do great work for ambitious brands."
    :canonical="route('careers')"
>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span style="color: var(--color-heading);">Careers</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">We're Hiring</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Join the <span style="color: var(--color-accent-dark);">Rare Input</span> Team
            </h1>
            <p class="text-lg leading-relaxed" style="color: var(--color-text-muted); max-width: 520px;">
                We are a remote-first agency building and growing digital businesses. If you are passionate about your craft and want to do your best work, we would love to hear from you.
            </p>
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">

        @if ($jobs->isEmpty())
            <div class="text-center py-20">
                <h2 class="font-bold mb-3" style="font-size: 1.5rem; color: var(--color-heading);">No open positions right now</h2>
                <p class="mb-8 mx-auto" style="color: var(--color-text-muted); font-size: 1rem; max-width: 400px;">
                    We do not have any active openings at the moment, but we are always growing. Send us your details and we will keep you in mind.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary">
                    Get In Touch
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        @else
            <div class="text-center mb-14">
                <span class="section-label">Open Positions</span>
                <h2 class="font-extrabold" style="font-size: 2.25rem; letter-spacing: -0.03em; color: var(--color-heading);">
                    {{ $jobs->count() }} {{ Str::plural('Role', $jobs->count()) }} Available
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($jobs as $job)
                <div class="card p-7 flex flex-col">

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold uppercase tracking-widest" style="color: var(--color-text-muted);">
                            {{ $job->department }}
                        </span>
                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full" style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
                            {{ $job->type->value }}
                        </span>
                    </div>

                    <h3 class="font-bold mb-2" style="font-size: 1.1rem; color: var(--color-heading); letter-spacing: -0.01em; line-height: 1.3;">
                        {{ $job->title }}
                    </h3>

                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <p class="flex items-center gap-1.5 text-sm" style="color: var(--color-text-muted);">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4-4.5-6-8-6-11a6 6 0 0112 0c0 3-2 6.5-6 11z"/>
                                <circle cx="12" cy="10" r="2"/>
                            </svg>
                            {{ $job->location }}
                        </p>
                        <p class="flex items-center gap-1.5 text-sm" style="color: var(--color-text-muted);">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $job->experience->value }}
                        </p>
                    </div>

                    <p class="text-sm leading-relaxed flex-1" style="color: var(--color-text-muted);">
                        {{ Str::limit($job->description, 140) }}
                    </p>

                    <div class="mt-6 pt-5 border-t" style="border-color: var(--color-border);">
                        <a href="{{ route('careers.apply', $job) }}"
                           class="btn-primary w-full" style="justify-content: center; padding: 0.7rem 1.5rem;">
                            Apply Now
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Don't see your role?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">We're always looking for great people</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Send us your portfolio or CV and tell us what you do best. We will keep you in mind for future openings.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Send Your CV
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
