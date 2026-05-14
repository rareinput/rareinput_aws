<x-layouts.public
    title="WordPress Development Agency"
    description="Custom WordPress websites, theme development, plugin integrations, and WooCommerce stores. Fast, secure, and built to rank on search engines."
    :canonical="route('services.wordpress')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    "\x40id"         => route('services.wordpress') . '#service',
    'name'        => 'WordPress Development',
    'url'         => route('services.wordpress'),
    'description' => 'Custom WordPress websites, theme development, plugin integrations, and WooCommerce stores. Fast, secure, and built to rank.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'WordPress Development',
    'areaServed'  => 'Worldwide',
    'image'       => config('app.url') . '/og-default.jpg',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context" => 'https://schema.org',
    "\x40type"    => 'FAQPage',
    'mainEntity'  => [
        ["\x40type" => 'Question', 'name' => 'Do you use page builders like Elementor?',      'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We can — but we prefer to build custom themes with clean code where possible. If you specifically need Elementor or another page builder, we can accommodate that.']],
        ["\x40type" => 'Question', 'name' => 'Can you migrate my existing website to WordPress?', 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. We handle content migrations from other CMS platforms, static HTML sites, and other WordPress installs. We will make sure nothing is lost in the process.']],
        ["\x40type" => 'Question', 'name' => 'Will my WordPress site be secure?',             'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Security is a priority in every build. We harden WordPress configurations, limit plugin exposure, set up SSL, and recommend managed hosting with automated backups.']],
        ["\x40type" => 'Question', 'name' => 'How long does a WordPress project take?',       'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Most WordPress sites take 3–6 weeks depending on complexity. Larger projects with custom plugins or WooCommerce integrations may take longer.']],
        ["\x40type" => 'Question', 'name' => 'Can I update the content myself after launch?', 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Absolutely. WordPress is built for this. We will make sure the content management experience is intuitive and hand over a brief walkthrough so you can manage pages, posts, and media with confidence.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context"        => 'https://schema.org',
    "\x40type"           => 'BreadcrumbList',
    'itemListElement'    => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => url('/')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
        ["\x40type" => 'ListItem', 'position' => 3, 'name' => 'WordPress Development', 'item' => route('services.wordpress')],
    ],
], JSON_UNESCAPED_SLASHES) !!}</script>
</x-slot>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:underline">Services</a>
            <span>/</span>
            <span style="color: var(--color-heading);">WordPress</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">WordPress Development</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                WordPress <span style="color: var(--color-accent-dark);">Development</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                We build fast, flexible, and fully custom WordPress websites — from content-driven blogs to complex multi-site platforms.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                    Build My WordPress Site
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#process" class="text-sm font-semibold" style="color: var(--color-text-muted);">See how it works ↓</a>
            </div>
        </div>
    </div>
</section>

<section class="px-6 py-10 border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex flex-wrap items-center justify-center gap-12">
            @foreach([['sub-1s','Load time target on every build'],['3–6 wks','Typical project timeline'],['100%','Code & credentials handed over on completion']] as [$stat,$label])
            <div class="text-center">
                <div class="font-extrabold" style="font-size: 1.6rem; color: var(--color-heading); letter-spacing: -0.03em;">{{ $stat }}</div>
                <div class="text-xs font-medium mt-1" style="color: var(--color-text-muted);">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-14">
            <div>
                <span class="section-label">What's Included</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Everything for a powerful WordPress site</h2>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">From custom theme development to plugin integrations, we handle every aspect of your WordPress build.</p>
            </div>
            <ul class="space-y-4 lg:pt-2">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['Custom Themes', 'Pixel-perfect designs built to match your brand identity.'],
                ['Plugin Power', 'The right plugins configured correctly for your needs.'],
                ['WooCommerce', 'Full e-commerce capability built into your WordPress site.'],
                ['Optimised Speed', 'Fast-loading pages that keep visitors engaged.'],
            ] as [$title, $desc])
            <div class="card p-6">
                <h3 class="font-bold mb-2" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="process" class="px-6 py-24" style="background-color: var(--color-surface);">
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

<section class="px-6 py-12 border-t border-b" style="background: linear-gradient(135deg, var(--color-brand-900) 0%, #2a2017 100%); border-color: var(--color-brand-900);">
    <div class="mx-auto flex flex-col sm:flex-row items-center justify-between gap-6" style="max-width: var(--max-width);">
        <div>
            <p class="font-bold text-white mb-1" style="font-size: 1.05rem;">Ready to start your WordPress project?</p>
            <p class="text-sm" style="color: var(--color-brand-400);">Custom themes, clean code, and a site you can actually manage yourself.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn-accent shrink-0">
            Get a Free Quote
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

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

<section class="px-6 py-16 border-t border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <p class="text-xs font-bold uppercase tracking-widest mb-6" style="color: var(--color-text-muted);">Pair this with</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach([
                ['SEO & Organic Growth', 'Make the most of your new site with an SEO strategy that compounds over time.', 'services.seo'],
                ['Performance Marketing', 'Drive immediate traffic with paid campaigns while organic rankings build.', 'services.performance-marketing'],
            ] as [$title, $desc, $route])
            <a href="{{ route($route) }}" class="block p-7 rounded-xl border transition-colors duration-200 group hover:border-[var(--color-accent-dark)]" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <div class="font-bold mb-2 group-hover:underline" style="font-size: 0.95rem; color: var(--color-heading);">{{ $title }}</div>
                <div class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Ready to go live?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your WordPress site</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your site and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Start Your WordPress Project
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
