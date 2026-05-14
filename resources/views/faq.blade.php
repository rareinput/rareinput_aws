@php
$faqSchema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How do I get started with Rare Input?',                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The best first step is to reach out via our contact page. Tell us about your project, goals, and timeline. We will get back to you within one business day to set up an initial call — no commitment required.']],
        ['@type' => 'Question', 'name' => 'Do you work with clients outside India?',                       'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with clients globally. Most of our collaboration happens remotely over video calls and async communication tools, so location is rarely a barrier.']],
        ['@type' => 'Question', 'name' => 'Do you take on small projects or only large engagements?',     'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We work on projects of all sizes. Whether you need a single landing page or a full product build, we will be upfront about whether it is a good fit and what to expect.']],
        ['@type' => 'Question', 'name' => 'Will I have a dedicated point of contact?',                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Every client has a dedicated project lead who handles communication, keeps things on track, and is your single point of contact throughout the engagement.']],
        ['@type' => 'Question', 'name' => 'Do you sign NDAs?',                                            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We are happy to sign a mutual NDA before any detailed discussions if your project requires confidentiality.']],
        ['@type' => 'Question', 'name' => 'What information do you need to get started?',                 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'For development projects, a brief describing your goals, features, and any existing assets. For marketing, your current situation, targets, and ad spend budget. The more context you share upfront, the better our scoping will be.']],
        ['@type' => 'Question', 'name' => 'How long does a typical website project take?',                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A landing page or simple marketing site typically takes 2–4 weeks. A full multi-page website takes 4–8 weeks. Larger projects with custom functionality take longer, and we will give you a clear estimate before we start.']],
        ['@type' => 'Question', 'name' => 'How long does a Shopify or WordPress build take?',             'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Custom Shopify and WordPress builds typically take 4–8 weeks depending on scope. If you need a faster turnaround, let us know — we can discuss options.']],
        ['@type' => 'Question', 'name' => 'How long does an app development project take?',               'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'App projects vary significantly by scope. A simple MVP can take 6–10 weeks. A full-featured product with mobile apps and a backend can take 3–6 months. We scope this carefully before committing to a timeline.']],
        ['@type' => 'Question', 'name' => 'How soon can I expect results from SEO?',                     'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'SEO is a long-term investment. Most clients start seeing meaningful movement in rankings and traffic within 3–6 months. Highly competitive industries may take longer. We set realistic expectations from the start.']],
        ['@type' => 'Question', 'name' => 'How quickly can paid ads start driving traffic?',              'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Paid ads can drive traffic immediately after launch. However, meaningful optimisation — improving ROAS and reducing wasted spend — typically takes 4–8 weeks of data gathering.']],
        ['@type' => 'Question', 'name' => 'What happens if a project runs over the estimated timeline?',  'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We communicate any delays early and transparently. If delays are on our side, we absorb the cost. If they are due to scope changes or delayed client feedback, we will discuss the impact together before proceeding.']],
        ['@type' => 'Question', 'name' => 'Do you publish pricing on your website?',                      'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We do not publish fixed prices because every project is different. After an initial call we will send a detailed proposal with a clear scope and cost breakdown — no vague estimates.']],
        ['@type' => 'Question', 'name' => 'How do payments work?',                                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Development projects are typically split into milestones — a deposit upfront, payments at key stages, and a final payment on completion. Marketing retainers are billed monthly. We will confirm the structure in our proposal.']],
        ['@type' => 'Question', 'name' => 'Do you require a deposit?',                                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We require a deposit before starting any project. This is typically 30–50% of the total project value, depending on scope.']],
        ['@type' => 'Question', 'name' => 'What currencies do you accept?',                               'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We accept USD, GBP, and EUR. If you are paying in a different currency, let us know and we will find a workable arrangement.']],
        ['@type' => 'Question', 'name' => 'Can you handle both development and marketing for my business?','acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Many of our clients use us for both. Having one team manage your website and your marketing means better alignment between what you build and how you promote it.']],
        ['@type' => 'Question', 'name' => 'Do you offer ongoing support after a project is delivered?',   'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We offer ongoing maintenance and support retainers for development projects and ongoing management for marketing services. We are not a build-and-disappear agency.']],
        ['@type' => 'Question', 'name' => 'Can you work with our existing in-house team?',                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely. We collaborate with in-house designers, developers, and marketing teams regularly. We adapt to your workflows and tools.']],
        ['@type' => 'Question', 'name' => 'Do you offer services a la carte or only as bundles?',         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Both. You can engage us for a single service or a combination. We will recommend what makes sense for your situation, not just sell you more than you need.']],
        ['@type' => 'Question', 'name' => 'What if I am unhappy with the work?',                          'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We include review rounds in every project and stay in close communication throughout to avoid surprises. If something is not right, we fix it. We stand behind our work.']],
    ],
];
@endphp
<x-layouts.public
    title="FAQ"
    description="Answers to common questions about working with Rare Input — our process, pricing, timelines, and what to expect when you start a project with us."
    :canonical="route('faq')"
>
<x-slot:head>
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context"        => 'https://schema.org',
    "\x40type"           => 'BreadcrumbList',
    'itemListElement'    => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'FAQ',  'item' => route('faq')],
    ],
], JSON_UNESCAPED_SLASHES) !!}</script>
</x-slot:head>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span style="color: var(--color-heading);">FAQ</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Got Questions?</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Frequently Asked <span style="color: var(--color-accent-dark);">Questions</span>
            </h1>
            <p class="text-lg leading-relaxed" style="color: var(--color-text-muted); max-width: 540px;">
                Everything you need to know about working with Rare Input — from how we work to what to expect and when.
            </p>
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: 860px;">

        {{-- Working With Us --}}
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Working With Us</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['How do I get started with Rare Input?', 'The best first step is to reach out via our contact page. Tell us about your project, goals, and timeline. We will get back to you within one business day to set up an initial call — no commitment required.'],
                    ['Do you work with clients outside India?', 'Yes. We work with clients globally. Most of our collaboration happens remotely over video calls and async communication tools, so location is rarely a barrier.'],
                    ['Do you take on small projects or only large engagements?', 'We work on projects of all sizes. Whether you need a single landing page or a full product build, we will be upfront about whether it is a good fit and what to expect.'],
                    ['Will I have a dedicated point of contact?', 'Yes. Every client has a dedicated project lead who handles communication, keeps things on track, and is your single point of contact throughout the engagement.'],
                    ['Do you sign NDAs?', 'Yes. We are happy to sign a mutual NDA before any detailed discussions if your project requires confidentiality.'],
                    ['What information do you need to get started?', 'For development projects, a brief describing your goals, features, and any existing assets. For marketing, your current situation, targets, and ad spend budget. The more context you share upfront, the better our scoping will be.'],
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

        {{-- Timelines --}}
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Timelines</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['How long does a typical website project take?', 'A landing page or simple marketing site typically takes 2–4 weeks. A full multi-page website takes 4–8 weeks. Larger projects with custom functionality take longer, and we will give you a clear estimate before we start.'],
                    ['How long does a Shopify or WordPress build take?', 'Custom Shopify and WordPress builds typically take 4–8 weeks depending on scope. If you need a faster turnaround, let us know — we can discuss options.'],
                    ['How long does an app development project take?', 'App projects vary significantly by scope. A simple MVP can take 6–10 weeks. A full-featured product with mobile apps and a backend can take 3–6 months. We scope this carefully before committing to a timeline.'],
                    ['How soon can I expect results from SEO?', 'SEO is a long-term investment. Most clients start seeing meaningful movement in rankings and traffic within 3–6 months. Highly competitive industries may take longer. We set realistic expectations from the start.'],
                    ['How quickly can paid ads start driving traffic?', 'Paid ads can drive traffic immediately after launch. However, meaningful optimisation — improving ROAS and reducing wasted spend — typically takes 4–8 weeks of data gathering.'],
                    ['What happens if a project runs over the estimated timeline?', 'We communicate any delays early and transparently. If delays are on our side, we absorb the cost. If they are due to scope changes or delayed client feedback, we will discuss the impact together before proceeding.'],
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

        {{-- Pricing & Payments --}}
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Pricing & Payments</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['Do you publish pricing on your website?', 'We do not publish fixed prices because every project is different. After an initial call we will send a detailed proposal with a clear scope and cost breakdown — no vague estimates.'],
                    ['How do payments work?', 'Development projects are typically split into milestones — a deposit upfront, payments at key stages, and a final payment on completion. Marketing retainers are billed monthly. We will confirm the structure in our proposal.'],
                    ['Do you require a deposit?', 'Yes. We require a deposit before starting any project. This is typically 30–50% of the total project value, depending on scope.'],
                    ['What currencies do you accept?', 'We accept USD, GBP, and EUR. If you are paying in a different currency, let us know and we will find a workable arrangement.'],
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

        {{-- Services --}}
        <div>
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Services</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['Can you handle both development and marketing for my business?', 'Yes. Many of our clients use us for both. Having one team manage your website and your marketing means better alignment between what you build and how you promote it.'],
                    ['Do you offer ongoing support after a project is delivered?', 'Yes. We offer ongoing maintenance and support retainers for development projects and ongoing management for marketing services. We are not a build-and-disappear agency.'],
                    ['Can you work with our existing in-house team?', 'Absolutely. We collaborate with in-house designers, developers, and marketing teams regularly. We adapt to your workflows and tools.'],
                    ['Do you offer services a la carte or only as bundles?', 'Both. You can engage us for a single service or a combination. We will recommend what makes sense for your situation, not just sell you more than you need.'],
                    ['What if I am unhappy with the work?', 'We include review rounds in every project and stay in close communication throughout to avoid surprises. If something is not right, we fix it. We stand behind our work.'],
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

    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Still have questions?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Just ask us directly</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">We reply to every enquiry within one business day.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Send Us a Message
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
