<x-layouts.public
    title="Email Marketing Agency — Campaigns, Automation & Drip Sequences"
    description="Strategic email marketing that converts. We design campaigns, automated sequences, and list growth systems that keep your audience engaged and buying."
    :canonical="route('services.email-marketing')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    "\x40id"         => route('services.email-marketing') . '#service',
    'name'        => 'Email Marketing',
    'url'         => route('services.email-marketing'),
    'description' => 'Strategic email marketing — campaigns, automated drip sequences, and list growth systems that keep your audience engaged and buying.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Email Marketing',
    'areaServed'  => 'Worldwide',
    'image'       => config('app.url') . '/og-default.jpg',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context" => 'https://schema.org',
    "\x40type"    => 'FAQPage',
    'mainEntity'  => [
        ["\x40type" => 'Question', 'name' => 'Which email platforms do you work with?',        'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We work with Klaviyo, Mailchimp, ActiveCampaign, Brevo, and most other major ESPs. We will recommend the best platform for your use case if you are starting fresh.']],
        ["\x40type" => 'Question', 'name' => 'Do you write the email copy as well?',           'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. Copywriting is included in our email marketing service. We will learn your brand voice and write emails that feel authentic and drive action.']],
        ["\x40type" => 'Question', 'name' => 'How many emails will you send per month?',       'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'This depends on your strategy. Automation flows run based on user behaviour, so frequency varies. For broadcast campaigns, we typically recommend 2–4 per month to maintain engagement without fatiguing your list.']],
        ["\x40type" => 'Question', 'name' => 'Can you help grow our email list?',              'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. List growth strategy — including opt-in form design, lead magnets, and pop-up timing — is part of our service. A healthy, growing list is essential for long-term email performance.']],
        ["\x40type" => 'Question', 'name' => 'What if we already have existing flows set up?', 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We will audit your existing automations and campaigns first, identify what is working and what is not, and then optimise or rebuild accordingly.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context"        => 'https://schema.org',
    "\x40type"           => 'BreadcrumbList',
    'itemListElement'    => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => url('/')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
        ["\x40type" => 'ListItem', 'position' => 3, 'name' => 'Email Marketing', 'item' => route('services.email-marketing')],
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
            <span style="color: var(--color-heading);">Email Marketing</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Email Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Email <span style="color: var(--color-accent-dark);">Marketing</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Automated sequences and targeted campaigns that nurture leads, retain customers, and drive consistent revenue.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                    Start My Email Strategy
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
            @foreach([['22%','Avg. abandoned cart recovery rate'],['38%','Avg. open rate with proper segmentation'],['$1 : $42','Average email marketing ROI']] as [$stat,$label])
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Email that works while you sleep</h2>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">From welcome sequences to re-engagement campaigns, we build email systems that convert subscribers into loyal customers.</p>
            </div>
            <ul class="space-y-4 lg:pt-2">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['Automation', 'Set-and-forget sequences that work around the clock.'],
                ['Segmentation', 'The right message to the right person at the right time.'],
                ['Beautiful Design', 'On-brand email templates that stand out in the inbox.'],
                ['Clear Reporting', 'Open rates, clicks, and revenue tracked every send.'],
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
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">Strategy before sending — every email has a purpose and a place in the funnel.</p>
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

<section class="px-6 py-12 border-t border-b" style="background: linear-gradient(135deg, var(--color-brand-900) 0%, #2a2017 100%); border-color: var(--color-brand-900);">
    <div class="mx-auto flex flex-col sm:flex-row items-center justify-between gap-6" style="max-width: var(--max-width);">
        <div>
            <p class="font-bold text-white mb-1" style="font-size: 1.05rem;">Ready to make email your best-performing channel?</p>
            <p class="text-sm" style="color: var(--color-brand-400);">We'll audit your current setup and show you exactly where the revenue is being left on the table.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn-accent shrink-0">
            Build My Email Engine
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

<section class="px-6 py-16 border-t border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <p class="text-xs font-bold uppercase tracking-widest mb-6" style="color: var(--color-text-muted);">Pair this with</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach([
                ['Performance Marketing', 'Drive qualified leads and buyers into your email funnel with paid campaigns.', 'services.performance-marketing'],
                ['Shopify Development', 'Maximise your email revenue with a store built to convert from the first click.', 'services.shopify'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to convert?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your email engine</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your business and we'll map out the perfect email strategy.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Build My Email Engine
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
