<x-layouts.public
    title="Digital Agency — Development & Marketing"
    description="Rare Input is a full-service digital agency helping ambitious brands grow through custom web development, Shopify, SEO, performance marketing, and email marketing."
    :canonical="route('home')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Organization',
    'name'           => 'Rare Input',
    'url'            => route('home'),
    'logo'           => config('app.url') . '/favicon.svg',
    'description'    => 'Full-service digital agency — web development, Shopify, SEO, performance marketing and email marketing.',
    'contactPoint'   => [
        "\x40type"       => 'ContactPoint',
        'contactType'    => 'customer support',
        'url'            => route('contact'),
    ],
    'sameAs' => [
        'https://linkedin.com/company/rareinput/',
        'https://www.facebook.com/rareinput',
        'https://x.com/rareinput',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
</x-slot>

{{-- ── Hero ──────────────────────────────────────────────────── --}}
<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="max-w-2xl">
            <span class="section-label">Development &amp; Digital Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                We Build &amp; Grow<br>
                <span style="color: var(--color-accent-dark);">Digital Businesses</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 520px;">
                From Shopify stores to full-stack web apps, and from SEO to paid campaigns — Rare Input helps ambitious brands ship fast and scale smart.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                    Start a Project
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#services" class="btn-secondary text-base" style="padding: 0.875rem 2.25rem;">
                    See Our Services
                </a>
            </div>

            {{-- Tech trust bar --}}
            <div class="flex flex-wrap gap-6 mt-12 pt-8 border-t" style="border-color: var(--color-border);">
                @foreach(['Shopify', 'WordPress', 'Laravel', 'Next.js', 'Google Ads', 'Meta Ads'] as $tech)
                    <span class="text-xs font-semibold tracking-wide" style="color: var(--color-text-muted);">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Services ──────────────────────────────────────────────── --}}
<section id="services" class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">

        <div class="text-center mb-16">
            <span class="section-label">What We Do</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2.25rem; letter-spacing: -0.03em; color: var(--color-heading);">End-to-End Digital Services</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 1rem; color: var(--color-text-muted); max-width: 460px;">Everything you need to build your online presence and grow your business — under one roof.</p>
        </div>

        {{-- Development --}}
        <div class="mb-14">
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Development</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([
                    ['Shopify', 'Custom storefronts, themes, and full Shopify builds tailored to your brand.', 'services.shopify'],
                    ['WordPress', 'Websites, blogs, and content-driven platforms built for performance.', 'services.wordpress'],
                    ['Website Development', 'Custom sites and landing pages using HTML, Laravel, and Next.js.', 'services.web-development'],
                    ['App Development', 'Web apps, portals, dashboards, and iOS/Android mobile apps.', 'services.app-development'],
                ] as [$name, $desc, $route])
                <div class="card p-7">
                    <h3 class="font-bold mb-2" style="font-size: 0.975rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $name }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <a href="{{ route($route) }}" class="inline-flex items-center gap-1 mt-4 text-xs font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Digital Marketing --}}
        <div>
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Digital Marketing</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([
                    ['SEO', 'Rank higher, drive organic traffic, and grow your online visibility.', 'services.seo'],
                    ['Performance Marketing', 'ROI-focused paid campaigns across Google, Meta, and beyond.', 'services.performance-marketing'],
                    ['Email Marketing', 'Automated sequences and targeted campaigns that convert.', 'services.email-marketing'],
                    ['Social Media Marketing', 'Strategic content creation and community management.', 'services.social-media'],
                ] as [$name, $desc, $route])
                <div class="card p-7">
                    <h3 class="font-bold mb-2" style="font-size: 0.975rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $name }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <a href="{{ route($route) }}" class="inline-flex items-center gap-1 mt-4 text-xs font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<x-testimonials :testimonials="[
    ['quote' => 'Rare Input built our entire Shopify store and took our Google Ads ROAS from 1.4x to 3.9x in under four months. Having one team handle both was a game changer.', 'name' => 'Arjun S.', 'role' => 'Founder'],
    ['quote' => 'We brought them in for SEO and ended up using them for our full website rebuild too. Both delivered beyond expectations. Organic traffic is up 210% year on year.', 'name' => 'Sophie W.', 'role' => 'CMO'],
    ['quote' => 'The app they built scaled from 500 to 12,000 users without a single architecture issue. They clearly thought ahead when designing the system.', 'name' => 'Ravi P.', 'role' => 'CEO'],
    ['quote' => 'They are the rare agency that actually cares about outcomes, not just deliverables. Every decision was tied back to what would make our business grow.', 'name' => 'Laura B.', 'role' => 'Head of Growth'],
    ['quote' => 'Our email flows and paid campaigns are now managed by the same team which means the messaging is consistent across every touchpoint. The results show it.', 'name' => 'Neel J.', 'role' => 'Marketing Director'],
    ['quote' => 'From the first call to the final handover, the communication was clear, the timelines were met, and the output was excellent. Exactly what you want from an agency.', 'name' => 'Emma C.', 'role' => 'Co-Founder'],
]" />

{{-- ── CTA Banner ────────────────────────────────────────────── --}}
<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Ready to grow?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build something<br>great together</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your project and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Contact Us
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

{{-- ── Contact Form ──────────────────────────────────────────── --}}
<section id="contact" class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 860px;">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-12 items-start">

            {{-- Left info --}}
            <div class="md:col-span-2">
                <span class="section-label">Get In Touch</span>
                <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Send us a message</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.95rem; color: var(--color-text-muted);">
                    Fill out the form and we'll get back to you within one business day.
                </p>
                <ul class="space-y-4">
                    @foreach([
                        ['📍', 'Based in India, serving globally'],
                        ['⚡', 'Response within 24 hours'],
                        ['🤝', 'No-commitment initial call'],
                    ] as [$icon, $text])
                    <li class="flex items-center gap-3 text-sm" style="color: var(--color-text-muted);">
                        <span class="text-base">{{ $icon }}</span> {{ $text }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Form card --}}
            <div class="md:col-span-3 rounded-2xl p-8 border shadow-lg" style="background-color: var(--color-bg); border-color: var(--color-border); box-shadow: var(--shadow-lg);">

                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-lg text-sm" style="background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c;">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Full Name</label>
                            <input class="form-input" type="text" name="name" value="{{ old('name') }}" placeholder="John Smith" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Email Address</label>
                            <input class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Subject</label>
                        <input class="form-input" type="text" name="subject" value="{{ old('subject') }}" placeholder="What can we help you with?">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Message</label>
                        <textarea class="form-input" name="message" rows="5" placeholder="Tell us about your project..." required style="resize: vertical;">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full" style="padding: 0.9rem;">
                        Send Message
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

</x-layouts.public>
