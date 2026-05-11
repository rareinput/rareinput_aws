<x-layouts.public
    title="Email Marketing Agency — Campaigns, Automation & Drip Sequences"
    description="Strategic email marketing that converts. We design campaigns, automated sequences, and list growth systems that keep your audience engaged and buying."
    :canonical="route('services.email-marketing')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'Email Marketing',
    'url'         => route('services.email-marketing'),
    'description' => 'Strategic email marketing — campaigns, automated drip sequences, and list growth systems that keep your audience engaged and buying.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Email Marketing',
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
            <span style="color: var(--color-heading);">Email Marketing</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Digital Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Email <span style="color: var(--color-accent-dark);">Marketing</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Automated sequences and targeted campaigns that nurture leads, retain customers, and drive consistent revenue.
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Email that works while you sleep</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">From welcome sequences to re-engagement campaigns, we build email systems that convert subscribers into loyal customers.</p>
                <ul class="space-y-4">
                    @foreach([
                        'Email strategy & funnel design',
                        'Welcome & onboarding sequences',
                        'Abandoned cart & browse recovery',
                        'Promotional & broadcast campaigns',
                        'List segmentation & personalisation',
                        'ESP setup (Klaviyo, Mailchimp, etc.)',
                        'Email template design & development',
                        'Performance tracking & optimisation',
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
                    ['Automation', 'Set-and-forget sequences that work around the clock.'],
                    ['Segmentation', 'The right message to the right person at the right time.'],
                    ['Beautiful Design', 'On-brand email templates that stand out in the inbox.'],
                    ['Clear Reporting', 'Open rates, clicks, and revenue tracked every send.'],
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
                ['01', 'Audit & Strategy', 'We review your current setup and design a complete email marketing roadmap.'],
                ['02', 'Setup & Design', 'We configure your ESP, build templates, and write your sequences.'],
                ['03', 'Launch & Automate', 'Flows go live and campaigns are sent on schedule.'],
                ['04', 'Test & Improve', 'Ongoing A/B testing and monthly performance reviews.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Email is your highest-ROI channel.<br>We treat it that way.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Too many businesses send emails without a strategy — batch and blast with no segmentation, no automation, and no understanding of what actually drives revenue.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We build email programmes that are deliberate, personalised, and tied directly to your commercial goals — whether that's increasing repeat purchases, reducing churn, or converting cold leads.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['Strategy before sending', 'We map your full funnel before writing a single email — every send has a purpose.'],
                    ['Revenue attribution', 'We track exactly which emails are driving sales, not just opens and clicks.'],
                    ['Deliverability focus', 'Proper domain setup, list hygiene, and send practices to keep you out of spam.'],
                    ['Always improving', 'Continuous A/B testing means your emails get more effective over time.'],
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
    ['quote' => 'Our welcome sequence alone now generates 18% of our monthly revenue on autopilot. Rare Input built the entire flow and it has been running flawlessly for over a year.', 'name' => 'Priya M.', 'role' => 'Founder'],
    ['quote' => 'We switched from batch-and-blast to properly segmented campaigns and our open rates went from 14% to 38%. The strategy shift Rare Input recommended changed everything.', 'name' => 'David H.', 'role' => 'Head of Growth'],
    ['quote' => 'The abandoned cart flow they set up recovers around 22% of abandoned checkouts. That alone pays for the service several times over every month.', 'name' => 'Sneha K.', 'role' => 'E-commerce Manager'],
    ['quote' => 'They wrote every email in our brand voice perfectly from the first draft. I barely had to request changes. It felt like they had been working with us for years.', 'name' => 'Marcus R.', 'role' => 'CEO'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['Which email platforms do you work with?', 'We work with Klaviyo, Mailchimp, ActiveCampaign, Brevo, and most other major ESPs. If you already use a platform, we will work within it. If you are starting fresh, we will recommend the best fit for your business.'],
                ['Do you write the email copy as well?', 'Yes. Copywriting is included in our email marketing service. We will learn your brand voice and write emails that feel authentic to your business, not generic agency output.'],
                ['How many emails will you send per month?', 'This depends on your strategy. Automation flows run based on user behaviour, so there is no fixed volume. For broadcast campaigns, we typically recommend 2–4 per month to maintain engagement without fatiguing your list.'],
                ['Can you help grow our email list?', 'Yes. List growth strategy — including opt-in form design, lead magnets, and pop-up optimisation — can be included in our engagement.'],
                ['What if we already have existing flows set up?', 'We will audit your existing automations and campaigns first, identify what is working and what is not, and either improve them or rebuild them from scratch depending on what makes more sense.'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to convert?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your email engine</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your business and we'll map out the perfect email strategy.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
