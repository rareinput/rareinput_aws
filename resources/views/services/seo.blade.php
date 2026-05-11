<x-layouts.public
    title="SEO Agency — Search Engine Optimisation Services"
    description="Data-driven SEO services that grow organic traffic and increase rankings. Technical SEO, content strategy, link building, and local SEO — all under one roof."
    :canonical="route('services.seo')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'Search Engine Optimisation (SEO)',
    'url'         => route('services.seo'),
    'description' => 'Data-driven SEO services — technical SEO, content strategy, link building, and local SEO that grow organic traffic and rankings.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'SEO',
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
            <span style="color: var(--color-heading);">SEO</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Digital Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Search Engine <span style="color: var(--color-accent-dark);">Optimisation</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Rank higher, drive consistent organic traffic, and grow your visibility where it matters — on Google.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                Get a Free SEO Audit
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Full-spectrum SEO that actually works</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">We don't chase quick wins that vanish. We build sustainable organic growth through technical excellence, content strategy, and authority building.</p>
                <ul class="space-y-4">
                    @foreach([
                        'Comprehensive SEO audit & competitor analysis',
                        'Keyword research & content strategy',
                        'On-page SEO optimisation',
                        'Technical SEO (speed, crawlability, schema)',
                        'Link building & authority development',
                        'Local SEO & Google Business Profile',
                        'Monthly performance reporting',
                        'Core Web Vitals optimisation',
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
                    ['Organic Growth', 'Traffic that compounds over time without ongoing ad spend.'],
                    ['Technical SEO', 'Site structure, speed, and crawlability that search engines love.'],
                    ['Content Strategy', 'Content that ranks and converts, not just filler articles.'],
                    ['Link Building', 'Quality backlinks that build your domain authority.'],
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
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">SEO is a long game — here is how we play it.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Audit', 'We analyse your current rankings, technical health, and competitor landscape.'],
                ['02', 'Strategy', 'We build a keyword and content roadmap aligned with your business goals.'],
                ['03', 'Execution', 'We implement on-page, technical, and off-page improvements month by month.'],
                ['04', 'Report', 'Monthly reports with clear metrics — rankings, traffic, and conversions.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">SEO that is built to last,<br>not just to impress.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We don't promise overnight rankings or use tactics that put your site at risk. We build real, defensible organic growth that compounds over time.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Our SEO work is grounded in a deep understanding of both search engines and your customers — so the traffic we drive actually converts.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['No black-hat shortcuts', 'We only use techniques that stand up to algorithm updates and Google scrutiny.'],
                    ['Technical depth', 'We fix the things most agencies skip — crawl errors, Core Web Vitals, schema, and more.'],
                    ['Content that earns links', 'We create assets worth linking to, not just articles that fill a calendar.'],
                    ['Full transparency', 'Monthly reports show exactly what we did, what moved, and what is next.'],
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
    ['quote' => 'We went from page 4 to position 3 for our main keyword in five months. Organic traffic is up 180% year on year. The results speak for themselves.', 'name' => 'Ramesh I.', 'role' => 'Founder'],
    ['quote' => 'Their technical SEO audit uncovered issues we had no idea existed — crawl errors, duplicate content, slow pages. Fixing them alone moved the needle significantly.', 'name' => 'Sophie A.', 'role' => 'Digital Director'],
    ['quote' => 'What I appreciate most is the transparency. Every month I know exactly what was done, what moved, and what the plan is for next month. No smoke and mirrors.', 'name' => 'Aditya K.', 'role' => 'CEO'],
    ['quote' => 'Our local SEO was non-existent before Rare Input. Now we rank in the top 3 map results for all our key service areas. Enquiries from Google have tripled.', 'name' => 'Patricia O.', 'role' => 'Business Owner'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['How long does SEO take to show results?', 'SEO is a long-term investment. Most clients start seeing meaningful movement in rankings and traffic within 3–6 months. Competitive industries may take longer. We will set realistic expectations based on your specific situation from day one.'],
                ['Do you guarantee first-page rankings?', 'No reputable SEO agency can guarantee specific rankings — search engines make that call, not us. What we guarantee is that we will use proven, ethical techniques and be fully transparent about progress every month.'],
                ['Do you work on local SEO?', 'Yes. We handle local SEO including Google Business Profile optimisation, local citation building, and location-specific keyword targeting for businesses that serve a specific geographic area.'],
                ['Will you create content as part of the service?', 'Content strategy and planning are included. Content creation (blog posts, landing pages, etc.) can be included depending on the package — we will discuss this during onboarding.'],
                ['Can you work alongside our existing marketing team?', 'Absolutely. We are happy to collaborate with in-house teams, share reporting, and work within your existing workflows.'],
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
        <span class="section-label" style="color: var(--color-accent);">Start ranking today</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's grow your organic traffic</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Get a free SEO audit and find out exactly what's holding your site back.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get Free Audit
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
