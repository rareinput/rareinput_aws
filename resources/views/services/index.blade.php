<x-layouts.public
    title="Services — Web Development & Digital Marketing"
    description="Explore Rare Input's full range of services: Shopify, WordPress, web & app development, SEO, performance marketing, email marketing, and social media management."
    :canonical="route('services.index')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context" => 'https://schema.org',
    "\x40type"    => 'ItemList',
    'name'     => 'Rare Input Services',
    'url'      => route('services.index'),
    'itemListElement' => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Shopify Development',      'url' => route('services.shopify')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'WordPress Development',    'url' => route('services.wordpress')],
        ["\x40type" => 'ListItem', 'position' => 3, 'name' => 'Web Development',          'url' => route('services.web-development')],
        ["\x40type" => 'ListItem', 'position' => 4, 'name' => 'App Development',          'url' => route('services.app-development')],
        ["\x40type" => 'ListItem', 'position' => 5, 'name' => 'SEO',                      'url' => route('services.seo')],
        ["\x40type" => 'ListItem', 'position' => 6, 'name' => 'Performance Marketing',    'url' => route('services.performance-marketing')],
        ["\x40type" => 'ListItem', 'position' => 7, 'name' => 'Email Marketing',          'url' => route('services.email-marketing')],
        ["\x40type" => 'ListItem', 'position' => 8, 'name' => 'Social Media Marketing',  'url' => route('services.social-media')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
</x-slot>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span style="color: var(--color-heading);">Services</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">What We Do</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                End-to-End <span style="color: var(--color-accent-dark);">Digital Services</span>
            </h1>
            <p class="text-lg leading-relaxed" style="color: var(--color-text-muted); max-width: 540px;">
                From building your digital presence to growing it — everything your business needs, under one roof.
            </p>
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">

        {{-- Development --}}
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Development</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    ['Shopify Development', 'We build high-converting Shopify stores from the ground up — custom themes, seamless integrations, and storefronts that turn browsers into buyers.', 'services.shopify', ['Custom theme design', 'Store setup & configuration', 'App integrations', 'Speed optimisation']],
                    ['WordPress Development', 'Fast, flexible, and fully custom WordPress websites — from content-driven blogs to complex multi-site platforms.', 'services.wordpress', ['Custom theme development', 'Plugin development', 'WooCommerce integration', 'Performance optimisation']],
                    ['Website Development', 'Custom websites, landing pages, and frontend builds using HTML, Laravel, and Next.js — built for performance, SEO, and conversions.', 'services.web-development', ['Custom UI/UX design', 'Laravel & Next.js builds', 'Landing page optimisation', 'Core Web Vitals']],
                    ['App Development', 'Custom web apps, portals, dashboards, and iOS/Android mobile apps — built to solve real business problems and scale with your growth.', 'services.app-development', ['Web application development', 'iOS & Android apps', 'REST API development', 'Admin dashboards']],
                ] as [$name, $desc, $route, $features])
                <div class="card p-8 flex flex-col">
                    <h2 class="font-bold mb-3" style="font-size: 1.15rem; color: var(--color-heading); letter-spacing: -0.02em;">{{ $name }}</h2>
                    <p class="text-sm leading-relaxed mb-5" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <ul class="space-y-2 mb-6">
                        @foreach($features as $feature)
                        <li class="flex items-center gap-2 text-sm" style="color: var(--color-text);">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background-color: var(--color-accent-light);">
                                <svg width="8" height="8" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" style="color: var(--color-accent-dark);"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route($route) }}" class="mt-auto inline-flex items-center gap-1.5 text-sm font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Digital Marketing --}}
        <div>
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Digital Marketing</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    ['SEO', 'Rank higher, drive consistent organic traffic, and grow your visibility where it matters — on Google.', 'services.seo', ['SEO audit & competitor analysis', 'Keyword & content strategy', 'Technical SEO', 'Link building']],
                    ['Performance Marketing', 'ROI-focused paid campaigns across Google and Meta — every dollar tracked, every decision data-driven.', 'services.performance-marketing', ['Google Ads management', 'Meta Ads management', 'Conversion tracking', 'A/B testing']],
                    ['Email Marketing', 'Automated sequences and targeted campaigns that nurture leads, retain customers, and drive consistent revenue.', 'services.email-marketing', ['Email strategy & funnels', 'Welcome & onboarding sequences', 'List segmentation', 'ESP setup & management']],
                    ['Social Media Marketing', 'Strategy, content, and community management that builds your brand presence and drives real engagement.', 'services.social-media', ['Content calendar & creation', 'Graphic design for posts', 'Community management', 'Monthly analytics reporting']],
                ] as [$name, $desc, $route, $features])
                <div class="card p-8 flex flex-col">
                    <h2 class="font-bold mb-3" style="font-size: 1.15rem; color: var(--color-heading); letter-spacing: -0.02em;">{{ $name }}</h2>
                    <p class="text-sm leading-relaxed mb-5" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <ul class="space-y-2 mb-6">
                        @foreach($features as $feature)
                        <li class="flex items-center gap-2 text-sm" style="color: var(--color-text);">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background-color: var(--color-accent-light);">
                                <svg width="8" height="8" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" style="color: var(--color-accent-dark);"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route($route) }}" class="mt-auto inline-flex items-center gap-1.5 text-sm font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Not sure where to start?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's figure it out together</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your business and we'll recommend the right services for your goals.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Book a Discovery Call
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
