<x-layouts.public
    title="Shopify Development Agency"
    description="Custom Shopify store development, theme design, app integrations, and Shopify Plus migrations. We build fast, conversion-optimised Shopify stores that scale."
    :canonical="route('services.shopify')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'Shopify Development',
    'url'         => route('services.shopify'),
    'description' => 'Custom Shopify store development, theme design, app integrations, and Shopify Plus migrations.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Shopify Development',
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
            <span style="color: var(--color-heading);">Shopify</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Development</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Shopify <span style="color: var(--color-accent-dark);">Development</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                We build high-converting Shopify stores from the ground up — custom themes, seamless integrations, and storefronts that turn browsers into buyers.
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Everything you need to sell online</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Whether you're launching a brand new store or revamping an existing one, we handle every aspect of your Shopify build.
                </p>
                <ul class="space-y-4">
                    @foreach([
                        'Custom Shopify theme design & development',
                        'Shopify store setup & configuration',
                        'Product catalog setup & management',
                        'Payment gateway integration',
                        'Third-party app integrations',
                        'Speed & performance optimisation',
                        'Mobile-first responsive design',
                        'SEO-ready store structure',
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
                    ['Custom Themes', 'Built from scratch to match your brand — no cookie-cutter templates.'],
                    ['Fast Loading', 'Optimised for Core Web Vitals and sub-2s load times.'],
                    ['Mobile First', 'Designed for the majority of shoppers who browse on mobile.'],
                    ['Integrations', 'Apps, ERPs, CRMs, payment gateways — we connect them all.'],
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
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">A clear, collaborative process so you always know what's happening and what comes next.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Discovery', 'We learn about your brand, goals, and target audience to define the right scope and approach.'],
                ['02', 'Design', 'We create wireframes and high-fidelity designs for your approval before writing a single line of code.'],
                ['03', 'Development', 'We build your store with clean code, tested across all devices and browsers.'],
                ['04', 'Launch & Support', 'We handle go-live and stick around to fix any issues and make post-launch improvements.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">We don't just build stores.<br>We build businesses.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Most agencies hand you a pretty store and disappear. We take a different approach — we think about conversion, performance, and long-term growth from day one.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Our team combines deep Shopify expertise with a marketer's mindset, so every decision — from layout to checkout flow — is made with your revenue in mind.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['Conversion-focused design', 'Every element is designed to reduce friction and increase sales.'],
                    ['SEO built-in from day one', 'Proper structure, metadata, and speed so you rank from launch.'],
                    ['Data-driven decisions', 'We use analytics to inform design and UX choices.'],
                    ['Long-term partnership', 'We are available after launch for support, updates, and growth.'],
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
    ['quote' => 'Rare Input completely transformed our Shopify store. Our conversion rate went up by 34% within the first month of launch. The attention to detail in the design was outstanding.', 'name' => 'Priya S.', 'role' => 'Founder'],
    ['quote' => 'We had worked with two other agencies before Rare Input. The difference was night and day — they actually understood e-commerce and built the store to sell, not just to look good.', 'name' => 'Arjun M.', 'role' => 'CEO'],
    ['quote' => 'From brief to launch in under six weeks. The process was smooth, communication was excellent, and the final product exceeded our expectations.', 'name' => 'Sarah M.', 'role' => 'Head of Digital'],
    ['quote' => 'The integrations they set up — connecting our ERP, loyalty app, and review platform — saved us hours of manual work every week. Genuinely game-changing.', 'name' => 'Rohan K.', 'role' => 'Operations Director'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['Do you build on Shopify Plus?', 'Yes — we work across all Shopify plans including Shopify Plus. We are familiar with the additional features and customisation options Plus unlocks, such as Checkout Extensibility and B2B tools.'],
                ['Can you redesign my existing Shopify store?', 'Absolutely. Whether you want a full redesign or targeted improvements to specific pages, we can work with your existing store or rebuild it from scratch.'],
                ['How long does a Shopify project take?', 'A typical custom Shopify store takes 4–8 weeks from kickoff to launch, depending on the scope. We will give you a clear timeline before we start.'],
                ['Will I be able to manage the store myself after launch?', 'Yes. Shopify is designed to be managed without technical knowledge. We will walk you through everything and make sure you are confident managing products, orders, and content.'],
                ['Do you offer ongoing support after launch?', 'Yes. We offer ongoing maintenance and support packages for clients who need help with updates, new features, or troubleshooting after launch.'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to sell more?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your Shopify store</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your project and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
