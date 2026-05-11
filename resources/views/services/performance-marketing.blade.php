<x-layouts.public
    title="Performance Marketing Agency — Google & Meta Ads"
    description="ROI-focused paid advertising across Google, Meta, and more. We manage campaigns that drive qualified traffic, leads, and revenue — not just clicks."
    :canonical="route('services.performance-marketing')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'Performance Marketing',
    'url'         => route('services.performance-marketing'),
    'description' => 'ROI-focused paid advertising across Google, Meta, and more. Campaigns that drive qualified traffic, leads, and revenue.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Performance Marketing',
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
            <span style="color: var(--color-heading);">Performance Marketing</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Digital Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Performance <span style="color: var(--color-accent-dark);">Marketing</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                ROI-focused paid campaigns across Google and Meta — every dollar tracked, every decision data-driven.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                Start Your Campaign
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Paid ads that pay back</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">We manage your paid media end-to-end — from strategy and creative to campaign management and optimisation.</p>
                <ul class="space-y-4">
                    @foreach([
                        'Google Ads (Search, Display, Shopping, YouTube)',
                        'Meta Ads (Facebook & Instagram)',
                        'Audience research & targeting strategy',
                        'Ad creative & copywriting',
                        'Landing page optimisation',
                        'Conversion tracking & pixel setup',
                        'A/B testing & creative iteration',
                        'Weekly & monthly performance reporting',
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
                    ['Precise Targeting', 'Reach the right audience at the right moment.'],
                    ['Data Driven', 'Every decision backed by real performance data.'],
                    ['Constant Testing', 'Continuous A/B testing to improve results over time.'],
                    ['ROI Focused', 'We optimise for profit, not just clicks.'],
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
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Research', 'We audit your market, competitors, and existing ad performance.'],
                ['02', 'Strategy', 'We define campaign structure, budgets, audiences, and creative direction.'],
                ['03', 'Launch & Optimise', 'We launch, monitor daily, and optimise continuously for best ROI.'],
                ['04', 'Report', 'Transparent weekly and monthly reports with clear ROAS metrics.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">We manage budgets<br>like they're our own.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Most agencies optimise for spend — the more you spend, the more they earn. We optimise for returns. Every campaign decision is made with your profitability in mind.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We combine creative thinking with rigorous data analysis — testing constantly, cutting what doesn't work, and scaling what does.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['Profit over vanity metrics', 'We track ROAS and actual revenue impact, not just clicks and impressions.'],
                    ['Creative that converts', 'Ad copy and visuals designed to stop the scroll and drive action.'],
                    ['Full-funnel thinking', 'We consider the entire customer journey, from first click to final purchase.'],
                    ['Complete transparency', 'You see exactly where your budget goes and what it returns every week.'],
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
    ['quote' => 'Our Google Ads ROAS went from 1.8x to 4.2x in three months. Rare Input completely restructured our campaigns and the difference was immediate.', 'name' => 'Nisha P.', 'role' => 'Founder'],
    ['quote' => 'We were burning through budget with our previous agency and had nothing to show for it. Rare Input cut our wasted spend by 40% in the first month and scaled what was actually working.', 'name' => 'Chris O.', 'role' => 'Marketing Director'],
    ['quote' => 'The creative they produced for our Meta campaigns outperformed everything we had tested before. They understand both the data and the creative side, which is rare.', 'name' => 'Meera K.', 'role' => 'Growth Manager'],
    ['quote' => 'Full transparency every week — what we spent, what we made, what changed and why. It felt like having a performance marketing expert in-house without the overhead.', 'name' => 'Ben H.', 'role' => 'Co-Founder'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['What is the minimum ad budget you work with?', 'We typically recommend a minimum monthly ad spend of $500–$1,000 to generate enough data to optimise effectively. Our management fee is charged separately on top of ad spend.'],
                ['Do you run both Google and Meta ads?', 'Yes. We manage campaigns across Google Ads (Search, Display, Shopping, YouTube) and Meta Ads (Facebook and Instagram). We will recommend the right mix based on your business and audience.'],
                ['How do you measure success?', 'We track metrics that matter to your business — ROAS, cost per lead, cost per acquisition, and revenue. Vanity metrics like impressions and clicks are secondary to actual business outcomes.'],
                ['Do I need a landing page before we start?', 'A strong landing page significantly improves results. If you do not have one, we can build or optimise it as part of the engagement. Sending paid traffic to a poorly converting page wastes budget.'],
                ['How quickly will I see results from paid ads?', 'Unlike SEO, paid ads can drive traffic immediately. However, optimisation takes time — typically 4–8 weeks to gather enough data to make meaningful improvements to ROAS and CPA.'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to scale?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's make your ad spend work harder</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us your goals and we'll build a campaign strategy around them.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
