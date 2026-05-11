<x-layouts.public
    title="About Us"
    description="Meet the team behind Rare Input — a full-service digital agency passionate about building great products and driving real growth for ambitious brands worldwide."
    :canonical="route('about')"
>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span style="color: var(--color-heading);">About</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Who We Are</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                We are <span style="color: var(--color-accent-dark);">Rare Input</span>
            </h1>
            <p class="text-lg leading-relaxed" style="color: var(--color-text-muted); max-width: 560px;">
                A development and digital marketing agency that helps ambitious brands build better digital products and grow faster online.
            </p>
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="section-label">Our Mission</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">We exist to make great work accessible.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Too many businesses settle for mediocre agencies — slow communication, generic output, and a disconnect between what is promised and what is delivered. We set out to be different.
                </p>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Rare Input was built on a simple belief: that businesses of all sizes deserve the same quality of thinking, craft, and care that the biggest brands get from the biggest agencies.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We combine technical depth with commercial thinking — so everything we build or run is tied to outcomes that actually matter to your business.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-5">
                @foreach([
                    ['Outcome-Focused', 'We measure success by your results, not our output.'],
                    ['Technically Deep', 'We go beyond surface-level execution into real craft.'],
                    ['Transparent', 'No smoke and mirrors. You always know what we are doing and why.'],
                    ['Long-Term Thinking', 'We build things that last, not quick fixes that create future problems.'],
                ] as [$title, $desc])
                <div class="card p-6">
                    <h3 class="font-bold mb-1.5" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- What we do --}}
<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-16">
            <span class="section-label">What We Do</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Development and marketing, under one roof</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 500px;">We cover the full digital stack — from building your product to growing your audience.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['Shopify', 'Custom storefronts and e-commerce experiences built to convert.', 'services.shopify'],
                ['Web & App Development', 'Websites, web apps, and mobile apps built from scratch.', 'services.web-development'],
                ['SEO & Performance Marketing', 'Organic growth and paid campaigns that drive measurable ROI.', 'services.seo'],
                ['Email & Social Media', 'Retention-focused programmes and content that builds your brand.', 'services.email-marketing'],
            ] as [$name, $desc, $route])
            <div class="card p-7">
                <h3 class="font-bold mb-2" style="font-size: 0.975rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $name }}</h3>
                <p class="text-sm leading-relaxed mb-4" style="color: var(--color-text-muted);">{{ $desc }}</p>
                <a href="{{ route($route) }}" class="inline-flex items-center gap-1 text-xs font-semibold" style="color: var(--color-accent-dark);">
                    Learn more
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Values --}}
<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-16">
            <span class="section-label">How We Work</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">The principles we work by</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['Honesty over comfort', 'We tell you what you need to hear, not just what you want to hear. If something will not work, we say so upfront.'],
                ['Quality over speed', 'We would rather take the time to do something right than ship something mediocre on a tight deadline.'],
                ['Clarity in communication', 'We keep you informed at every stage. No surprises, no chasing for updates — just clear, proactive communication.'],
                ['Ownership of outcomes', 'We do not just execute briefs. We take responsibility for the results our work produces.'],
                ['Continuous improvement', 'We test, learn, and iterate — in everything from ad campaigns to code quality.'],
                ['Client success is our success', 'We grow when our clients grow. Our incentives are aligned with yours.'],
            ] as [$title, $desc])
            <div class="p-6 rounded-xl border" style="border-color: var(--color-border); background-color: var(--color-surface);">
                <h3 class="font-bold mb-2" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Let's work together</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Ready to build something great?</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your project and we will get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
