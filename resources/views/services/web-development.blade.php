<x-layouts.public
    title="Custom Website Development Agency"
    description="We design and build custom websites from scratch — fast, responsive, SEO-ready, and tailored to your brand and business goals."
    :canonical="route('services.web-development')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    "\x40id"         => route('services.web-development') . '#service',
    'name'        => 'Web Development',
    'url'         => route('services.web-development'),
    'description' => 'Custom website design and development — fast, responsive, SEO-ready, and tailored to your brand and business goals.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Web Development',
    'areaServed'  => 'Worldwide',
    'image'       => config('app.url') . '/og-default.jpg',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context" => 'https://schema.org',
    "\x40type"    => 'FAQPage',
    'mainEntity'  => [
        ["\x40type" => 'Question', 'name' => 'Do you use website builders or templates?',  'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'No. Every site we build is designed and coded from scratch. This gives us full control over performance, SEO, and the final output — no bloated builders or locked templates.']],
        ["\x40type" => 'Question', 'name' => 'What technologies do you use?',              'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We primarily build with HTML, CSS, JavaScript, Laravel, and Next.js. The right stack depends on your project — we will recommend what makes the most sense for your needs.']],
        ["\x40type" => 'Question', 'name' => 'Do you handle hosting and deployment?',      'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We can advise on hosting and set up your deployment pipeline, but we do not lock you into any specific provider. We work with your existing setup or help you choose a suitable host.']],
        ["\x40type" => 'Question', 'name' => 'How long does a website project take?',      'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'A marketing site or landing page typically takes 2–4 weeks. Larger multi-page projects with custom functionality may take 6–10 weeks. We will give you a clear timeline upfront.']],
        ["\x40type" => 'Question', 'name' => 'Will the site be optimised for search engines?', 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. Every site we build has proper semantic HTML, meta structure, fast load times, and Core Web Vitals in mind from day one.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context"        => 'https://schema.org',
    "\x40type"           => 'BreadcrumbList',
    'itemListElement'    => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => url('/')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
        ["\x40type" => 'ListItem', 'position' => 3, 'name' => 'Web Development', 'item' => route('services.web-development')],
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
            <span style="color: var(--color-heading);">Website Development</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Web Development</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Website <span style="color: var(--color-accent-dark);">Development</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Custom websites, landing pages, and frontend builds using HTML, Laravel, and Next.js — crafted for performance, SEO, and conversions.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                    Start My Web Project
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
            @foreach([['2–4 wks','Landing page to live'],['100','Core Web Vitals score target'],['No templates','Every site custom-built from scratch']] as [$stat,$label])
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Built for speed, scale, and results</h2>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">Whether you need a marketing site, a landing page, or a full web presence, we build it right the first time.</p>
            </div>
            <ul class="space-y-4 lg:pt-2">
                @foreach([
                    'Custom UI/UX design & development',
                    'HTML/CSS/JS frontend builds',
                    'Laravel backend development',
                    'Next.js & React applications',
                    'Landing page design & optimisation',
                    'CMS integration',
                    'Performance & Core Web Vitals optimisation',
                    'Responsive, mobile-first design',
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
                ['Custom Built', 'No templates — every site is designed and coded from scratch.'],
                ['Fast by Default', 'Optimised for Core Web Vitals and sub-2s load times.'],
                ['SEO Ready', 'Structured correctly from day one for organic discovery.'],
                ['Mobile First', 'Designed for all screen sizes, especially mobile.'],
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
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">From first brief to final launch — a process built for clarity and speed.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Discovery', 'We define your goals, sitemap, and tech stack before writing a line of code.'],
                ['02', 'Design', 'High-fidelity mockups reviewed and approved by you before development starts.'],
                ['03', 'Development', 'Clean, semantic code built for performance, accessibility, and maintainability.'],
                ['04', 'Launch', 'Thorough QA across devices and browsers, then a smooth go-live.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">We write code.<br>We don't drag and drop it.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We don't use website builders or rely on generic templates. Every site we deliver is written from scratch — structured for performance, maintainability, and growth.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Whether it's a single landing page or a multi-section marketing site, you get a product that's fast, accessible, and built to convert.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['No templates, ever', 'Every design and line of code is created specifically for your project.'],
                    ['Performance obsessed', 'We optimise for Core Web Vitals, load times, and real-world device performance.'],
                    ['SEO baked in', 'Semantic HTML, proper meta structure, and schema from the very first commit.'],
                    ['Handover included', 'We walk you through everything and make sure you are fully in control after launch.'],
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
            <p class="font-bold text-white mb-1" style="font-size: 1.05rem;">Got a project in mind?</p>
            <p class="text-sm" style="color: var(--color-brand-400);">No templates, no builders — just a fast, custom website built from scratch.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn-accent shrink-0">
            Start My Project
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
                ['Do you use website builders or templates?', 'No. Every site we build is designed and coded from scratch. This gives us full control over performance, structure, and design — and means you get something unique rather than a dressed-up template.'],
                ['What technologies do you use?', 'We primarily build with HTML, CSS, JavaScript, Laravel, and Next.js. The right stack depends on your project — we will recommend what suits your needs best during our initial conversation.'],
                ['Do you handle hosting and deployment?', 'We can advise on hosting and set up your deployment pipeline, but we do not lock you into our own hosting. You own your infrastructure.'],
                ['How long does a website project take?', 'A marketing site or landing page typically takes 2–4 weeks. Larger multi-page sites with custom functionality take longer. We will scope this clearly before we start.'],
                ['Will the site be optimised for search engines?', 'Yes. Every site we build has proper semantic HTML, meta structure, fast load times, and Core Web Vitals optimisation built in from the start.'],
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
                ['SEO & Organic Growth', 'Get found on Google — we build sites that rank and then help you stay there.', 'services.seo'],
                ['Social Media Marketing', 'Build brand awareness and drive traffic back to your new site every month.', 'services.social-media'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to build?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your website</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us what you need built and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Start Your Web Project
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
