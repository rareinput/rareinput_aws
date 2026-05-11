<x-layouts.public
    title="Social Media Marketing Agency — Content & Growth"
    description="Social media management, content creation, and paid social campaigns that build brand awareness and drive consistent engagement across Instagram, LinkedIn, and more."
    :canonical="route('services.social-media')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    'name'        => 'Social Media Marketing',
    'url'         => route('services.social-media'),
    'description' => 'Social media management, content creation, and paid social campaigns that build brand awareness and drive engagement across Instagram, LinkedIn, and more.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'Social Media Marketing',
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
            <span style="color: var(--color-heading);">Social Media Marketing</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Digital Marketing</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Social Media <span style="color: var(--color-accent-dark);">Marketing</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Strategy, content, and community management that builds your brand presence and drives real engagement across every platform.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                Grow Your Presence
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Content that connects, community that converts</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.975rem; color: var(--color-text-muted);">We handle everything from strategy and content creation to scheduling, engagement, and reporting — so your brand stays active and relevant every day.</p>
                <ul class="space-y-4">
                    @foreach([
                        'Social media strategy & platform selection',
                        'Content calendar planning & creation',
                        'Graphic design & video editing for posts',
                        'Caption writing & hashtag research',
                        'Daily scheduling & publishing',
                        'Community management & engagement',
                        'Instagram, Facebook, LinkedIn & X (Twitter)',
                        'Monthly analytics & performance reporting',
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
                    ['Multi-Platform', 'Consistent presence across Instagram, Facebook, LinkedIn, and more.'],
                    ['On-Brand Content', 'Visuals and copy that reflect your brand identity every time.'],
                    ['Community Management', 'Timely responses and engagement that builds real relationships.'],
                    ['Growth Tracking', 'Follower growth, reach, and engagement tracked every month.'],
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
                ['01', 'Brand Onboarding', 'We learn your brand voice, audience, goals, and competitive landscape.'],
                ['02', 'Strategy & Calendar', 'We build a monthly content plan aligned with your business objectives.'],
                ['03', 'Create & Publish', 'We design, write, and schedule content across your chosen platforms.'],
                ['04', 'Review & Refine', 'Monthly reviews with performance data to continuously improve results.'],
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
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Consistent, on-brand content<br>without the chaos.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Managing social media well takes time, creativity, and consistency. Most businesses start strong and fade — we make sure your presence stays active and purposeful every single month.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    We take the time to understand your brand before we create anything — so every post feels like you, not like a generic agency output.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['Brand voice first', 'We learn how you speak before we write a single caption.'],
                    ['Content that earns attention', 'Designed to stop the scroll, not just fill a feed.'],
                    ['Real community management', 'We respond to comments and DMs as your brand, not a bot.'],
                    ['Data-led decisions', 'We track what resonates and double down on what works.'],
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
    ['quote' => 'Our Instagram engagement tripled in the first two months. The content they create genuinely looks and sounds like us — our followers have no idea it is outsourced.', 'name' => 'Aisha F.', 'role' => 'Founder'],
    ['quote' => 'We went from posting sporadically to having a consistent, professional presence across three platforms. The content calendar keeps everything organised and on-brand.', 'name' => 'Oliver M.', 'role' => 'Marketing Manager'],
    ['quote' => 'What stood out was how quickly they understood our audience. The captions and visuals resonated immediately — we started seeing meaningful follower growth within weeks.', 'name' => 'Kavitha N.', 'role' => 'Director'],
    ['quote' => 'The community management is excellent. They respond to comments and DMs promptly and always in the right tone. Our community feels genuinely looked after.', 'name' => 'James O.', 'role' => 'Co-Founder'],
]" />

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['Which social media platforms do you manage?', 'We manage Instagram, Facebook, LinkedIn, and X (Twitter). We will recommend which platforms to focus on based on where your audience actually spends time — not just all of them for the sake of it.'],
                ['How many posts will you create per month?', 'This depends on the plan agreed. Typically we produce 12–20 posts per month per platform. Quality and consistency matter more than volume, so we focus on content that earns attention.'],
                ['Do you respond to comments and messages?', 'Yes. Community management — responding to comments, DMs, and mentions — is included. We act as your brand, so response tone and quality are taken seriously.'],
                ['Will I have approval over content before it goes live?', 'Yes. We share a content calendar each month for your review and approval before anything is published. You will always have visibility and sign-off over what goes out.'],
                ['Can you help with social media ads as well?', 'Paid social (Facebook and Instagram ads) is covered under our Performance Marketing service. We can run both organic and paid social together for maximum impact.'],
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
        <span class="section-label" style="color: var(--color-accent);">Ready to grow?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build your social presence</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your brand and we'll create a social strategy that gets results.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Get in Touch
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
