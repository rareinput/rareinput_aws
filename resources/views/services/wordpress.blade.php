<x-layouts.public
    title="WordPress Development Agency"
    description="Custom WordPress websites, theme development, plugin integrations, and WooCommerce stores. Fast, secure, and built to rank on search engines."
    :canonical="route('services.wordpress')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'WordPress Development',
    'url'         => route('services.wordpress'),
    'description' => 'Custom WordPress websites, theme development, plugin integrations, and WooCommerce stores. Fast, secure, and built to rank.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'WordPress Development',
    'areaServed'  => 'Worldwide',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
</x-slot>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('home') }}#services" class="hover:underline">Services</a>
            <span>/</span>
            <span style="color: var(--color-heading);">WordPress</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Development</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                WordPress <span style="color: var(--color-accent-dark);">Development</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                We build fast, flexible, and fully custom WordPress websites — from content-driven blogs to complex multi-site platforms.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                Start Your Project
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <span class="section-label">What's Included</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Everything for a powerful WordPress site</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">From custom theme development to plugin integrations, we handle every aspect of your WordPress build.</p>
                <ul class="space-y-4">
                    @foreach([
                        'Custom WordPress theme design & development',
                        'Plugin development & customisation',
                        'WooCommerce integration',
                        'Page builder setup (Elementor, Gutenberg)',
                        'Performance & speed optimisation',
                        'Security hardening & backups',
                        'SEO-ready structure & metadata',
                        'Content migration & setup',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm" style="color: var(--color-text);">
                        <span class="mt-0.5 flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center" style="background-color: var(--color-accent-light);">
                            <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" style="color: var(--color-accent-dark);"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="grid grid-cols-2 gap-5">
                @foreach([
                    ['Custom Themes', 'Pixel-perfect designs built to match your brand identity.'],
                    ['Plugin Power', 'The right plugins configured correctly for your needs.'],
                    ['WooCommerce', 'Full e-commerce capability built into your WordPress site.'],
                    ['Optimised Speed', 'Fast-loading pages that keep visitors engaged.'],
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

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-16">
            <span class="section-label">Our Process</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">How we work</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">A clear process from brief to launch so there are no surprises.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Discovery', 'We understand your goals, audience, and content requirements before anything else.'],
                ['02', 'Design', 'We design your theme in high fidelity, ready for your sign-off.'],
                ['03', 'Development', 'We build your site with clean, maintainable code and thorough testing.'],
                ['04', 'Launch & Training', 'We go live and train you to manage your content with confidence.'],
            ] as [$step, $title, $desc])
            <div class="card p-7">
                <span class="block text-4xl font-extrabold mb-4" style="color: var(--color-accent-light); letter-spacing: -0.05em;">{{ $step }}</span>
                <h3 class="font-bold mb-2" style="font-size: 1rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="section-label">Why Rare Input</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">WordPress done right,<br>the first time.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Too many WordPress sites are bloated, slow, and hard to manage. We build lean, well-structured sites that your team can actually use — without relying on page builders that weigh everything down.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We know WordPress inside out — themes, hooks, custom post types, REST APIs — and we use that depth to build sites that are fast, secure, and built to last.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['Clean, maintainable code', 'No bloated page builders — just well-structured, documented code.'],
                    ['Performance from the start', 'We optimise images, scripts, and caching before we hand over the keys.'],
                    ['Security by default', 'Hardened configurations, limited attack surface, and regular backup planning.'],
                    ['You own everything', 'Full handover of code, credentials, and documentation — no lock-in.'],
                ] as [$title, $desc])
                <div class="p-5 rounded-xl border" style="border-color: var(--color-border); background-color: var(--color-surface);">
                    <h3 class="font-bold mb-1" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<x-testimonials :testimonials="[
    ['quote' => 'Our old WordPress site was a nightmare — slow, broken plugins, impossible to update. Rare Input rebuilt it from scratch and it loads in under a second. We could not be happier.', 'name' => 'Deepa N.', 'role' => 'Marketing Manager'],
    ['quote' => 'They built us a fully custom theme that looks exactly like our brand. No generic templates, no compromise. The WooCommerce integration works flawlessly.', 'name' => 'James C.', 'role' => 'Founder'],
    ['quote' => 'The training session after handover was genuinely useful. I can now update content, add pages, and manage the blog without needing to call anyone. That independence is priceless.', 'name' => 'Ananya S.', 'role' => 'Director'],
    ['quote' => 'Security and speed were our biggest concerns coming in. Rare Input delivered on both. Our site is fast, locked down, and ranking better than ever.', 'name' => 'Tom F.', 'role' => 'Head of Technology'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['Do you use page builders like Elementor?', 'We can — but we prefer to build custom themes with clean code where possible. If you specifically need Elementor or another builder, we can accommodate that. We will always recommend the approach that is best for your long-term performance.'],
                ['Can you migrate my existing website to WordPress?', 'Yes. We handle content migrations from other CMS platforms, static HTML sites, and other WordPress installs. We will ensure nothing is lost and all URLs are preserved where possible.'],
                ['Will my WordPress site be secure?', 'Security is a priority in every build. We harden WordPress configurations, limit plugin exposure, and set up proper backup systems. We can also advise on ongoing security monitoring.'],
                ['How long does a WordPress project take?', 'Most WordPress sites take 3–6 weeks depending on complexity. Larger projects with custom functionality take longer. We will give you a clear estimate upfront.'],
                ['Can I update the content myself after launch?', 'Absolutely. WordPress is built for this. We will make sure the content management experience is straightforward, and we offer training as part of every project handover.'],
            ] as [$q, $a])
            <details class="group rounded-xl border" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer font-semibold text-sm list-none" style="color: var(--color-heading);">
                    {{ $q }}
                    <svg class="flex-shrink-0 transition-transform group-open:rotate-180" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="px-6 pb-5 text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $a }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Ready to launch?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your WordPress site</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your project and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
