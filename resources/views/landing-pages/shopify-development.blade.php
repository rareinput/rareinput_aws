<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopify Development Agency — Build a Store That Actually Sells | Rare Input</title>
    <meta name="description" content="We build high-converting Shopify stores for D2C brands. Custom themes, speed optimisation, conversion-focused design. Book a free strategy call today.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('landing.shopify-development') }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Shopify Development Agency — Build a Store That Actually Sells | Rare Input">
    <meta property="og:description" content="We build high-converting Shopify stores for D2C brands. Custom themes, speed optimisation, conversion-focused design.">
    <meta property="og:url" content="{{ route('landing.shopify-development') }}">
    <meta property="og:site_name" content="Rare Input">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Shopify Development Agency | Rare Input">
    <meta name="twitter:description" content="High-converting Shopify stores for D2C brands. Book a free strategy call.">

    <script type="application/ld+json">{!! json_encode([
        '@context'      => 'https://schema.org',
        '@type'         => 'Service',
        'name'          => 'Shopify Development',
        'provider'      => ['@type' => 'Organization', 'name' => 'Rare Input', 'url' => url('/')],
        'description'   => 'Custom Shopify store development for D2C and eCommerce brands. High-converting themes, speed optimisation, and ongoing support.',
        'areaServed'    => 'IN',
        'serviceType'   => 'Shopify Development',
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { --green: #96bf48; --shopify: #5c6ac4; }
        .hero-bg { background: linear-gradient(160deg, #0f172a 0%, #1e293b 60%, #0f2027 100%); }
        .accent { color: #7c3aed; }
        .pill { display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(124,58,237,0.1); border: 1px solid rgba(124,58,237,0.25); border-radius: 2rem; padding: 0.35rem 0.9rem; font-size: 0.72rem; font-weight: 700; color: #a78bfa; letter-spacing: 0.08em; text-transform: uppercase; }
        .cta-btn { display: inline-flex; align-items: center; gap: 0.75rem; background: #7c3aed; color: #fff; font-size: 1rem; font-weight: 700; padding: 1rem 2.25rem; border-radius: 0.5rem; text-decoration: none; transition: background 0.15s; letter-spacing: -0.01em; }
        .cta-btn:hover { background: #6d28d9; }
        .cta-btn-outline { display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: #a78bfa; font-size: 0.9rem; font-weight: 600; padding: 0.9rem 1.75rem; border-radius: 0.5rem; text-decoration: none; border: 1.5px solid rgba(124,58,237,0.4); transition: border-color 0.15s, color 0.15s; }
        .cta-btn-outline:hover { border-color: #7c3aed; color: #c4b5fd; }
        .card { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; transition: border-color 0.2s, background 0.2s; }
        .card:hover { border-color: rgba(124,58,237,0.35); background: rgba(124,58,237,0.04); }
        .stat-card { background: rgba(124,58,237,0.07); border: 1px solid rgba(124,58,237,0.2); border-radius: 1rem; }
        .lp-input { background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.12); color: #fff; border-radius: 0.5rem; outline: none; transition: border-color 0.2s; }
        .lp-input:focus { border-color: #7c3aed; }
        .lp-input::placeholder { color: rgba(255,255,255,0.3); }
        .check { display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 50%; background: rgba(124,58,237,0.2); border: 1px solid rgba(124,58,237,0.4); flex-shrink: 0; }
        .divider { border: none; border-top: 1px solid rgba(255,255,255,0.07); margin: 0; }
        .gradient-border { border: 1px solid transparent; background-clip: padding-box; position: relative; }
        .gradient-border::before { content: ''; position: absolute; inset: -1px; border-radius: inherit; background: linear-gradient(135deg, rgba(124,58,237,0.5), rgba(99,102,241,0.2)); z-index: -1; border-radius: 1rem; }
        [x-cloak] { display: none; }
    </style>
</head>
<body style="font-family: var(--font-sans); background: #0f172a; color: #fff; margin: 0;">

    {{-- Nav --}}
    <nav style="position: sticky; top: 0; z-index: 50; padding: 1.1rem 2rem; display: flex; align-items: center; justify-content: space-between; background: rgba(15,23,42,0.92); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.06);">
        <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
            <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #7c3aed;">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="white" opacity="0.9"/>
                    <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="white" opacity="0.45"/>
                </svg>
            </span>
            <span style="font-size: 1.05rem; font-weight: 700; color: #fff; letter-spacing: -0.02em;">Rare Input</span>
        </a>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="tel:+919999999999" style="font-size: 0.82rem; font-weight: 600; color: rgba(255,255,255,0.5); text-decoration: none; display: none;">+91 99999 99999</a>
            <a href="#claim" class="cta-btn" style="padding: 0.65rem 1.4rem; font-size: 0.85rem;">Book Free Call</a>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero-bg" style="padding: 5.5rem 1.5rem 5rem; position: relative; overflow: hidden;">
        {{-- Background decoration --}}
        <div style="position: absolute; top: -100px; right: -100px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(124,58,237,0.12) 0%, transparent 70%); pointer-events: none;"></div>
        <div style="position: absolute; bottom: -80px; left: -80px; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(99,102,241,0.08) 0%, transparent 70%); pointer-events: none;"></div>

        <div style="max-width: 900px; margin: 0 auto; text-align: center; position: relative; z-index: 1;">
            <div class="pill" style="margin-bottom: 1.75rem;">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="4" fill="#a78bfa"/></svg>
                Shopify Development Agency
            </div>

            <h1 style="font-size: clamp(2.4rem, 6vw, 4.2rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.035em; margin-bottom: 1.5rem;">
                Your Shopify Store<br>
                <span style="background: linear-gradient(135deg, #a78bfa, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Should Be Selling.</span><br>
                <span style="color: rgba(255,255,255,0.85);">Not Just Existing.</span>
            </h1>

            <p style="font-size: 1.15rem; color: rgba(255,255,255,0.55); line-height: 1.75; max-width: 600px; margin: 0 auto 2.5rem;">
                We build Shopify stores engineered for conversion — not just looks. Custom themes, blazing-fast performance, and UX that turns visitors into buyers.
            </p>

            <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 3.5rem;">
                <a href="#claim" class="cta-btn">
                    Get a Free Store Audit
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('services.shopify') }}" class="cta-btn-outline">See Our Work</a>
            </div>

            {{-- Stats Row --}}
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 2.5rem; padding: 2rem; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07); border-radius: 1rem;">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em;">40+</div>
                    <div style="font-size: 0.78rem; color: rgba(255,255,255,0.4); font-weight: 500; margin-top: 0.2rem;">Stores Built</div>
                </div>
                <div style="width: 1px; height: 40px; background: rgba(255,255,255,0.08);"></div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em;">3.8X</div>
                    <div style="font-size: 0.78rem; color: rgba(255,255,255,0.4); font-weight: 500; margin-top: 0.2rem;">Avg. Revenue Lift</div>
                </div>
                <div style="width: 1px; height: 40px; background: rgba(255,255,255,0.08);"></div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em;">&lt; 2s</div>
                    <div style="font-size: 0.78rem; color: rgba(255,255,255,0.4); font-weight: 500; margin-top: 0.2rem;">Page Load Time</div>
                </div>
                <div style="width: 1px; height: 40px; background: rgba(255,255,255,0.08);"></div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em;">98</div>
                    <div style="font-size: 0.78rem; color: rgba(255,255,255,0.4); font-weight: 500; margin-top: 0.2rem;">Avg PageSpeed Score</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Problem Section --}}
    <section style="padding: 5rem 1.5rem; border-top: 1px solid rgba(255,255,255,0.06);">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="pill" style="margin-bottom: 1rem;">Sound Familiar?</div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">Most Shopify Stores Leave Money on the Table</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1rem;">
                @php
                $problems = [
                    ['icon' => '🐌', 'title' => 'Slow Load Times', 'desc' => 'Every extra second costs you 7% in conversions. Bloated themes kill your store before visitors even see your product.'],
                    ['icon' => '💸', 'title' => 'High Cart Abandonment', 'desc' => 'A confusing checkout flow is the #1 reason carts get abandoned. Generic themes don\'t fix this.'],
                    ['icon' => '📱', 'title' => 'Broken on Mobile', 'desc' => '70% of ecommerce traffic is mobile. If your store isn\'t built mobile-first, you\'re losing most of your customers.'],
                    ['icon' => '🎨', 'title' => 'Looks Like Everyone Else', 'desc' => 'Cookie-cutter themes make your brand invisible. No differentiation = no loyalty = compete only on price.'],
                ];
                @endphp
                @foreach($problems as $p)
                <div style="padding: 1.5rem; background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.12); border-radius: 0.875rem;">
                    <div style="font-size: 1.75rem; margin-bottom: 0.875rem;">{{ $p['icon'] }}</div>
                    <h3 style="font-size: 0.95rem; font-weight: 700; color: #fca5a5; margin-bottom: 0.5rem;">{{ $p['title'] }}</h3>
                    <p style="font-size: 0.82rem; color: rgba(255,255,255,0.4); line-height: 1.65;">{{ $p['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <p style="font-size: 1.1rem; color: rgba(255,255,255,0.6); line-height: 1.7;">We fix all of this — with a store built <strong style="color: #a78bfa;">specifically for your brand and your customers.</strong></p>
            </div>
        </div>
    </section>

    {{-- What We Build --}}
    <section style="padding: 5rem 1.5rem; background: rgba(124,58,237,0.04); border-top: 1px solid rgba(124,58,237,0.1); border-bottom: 1px solid rgba(124,58,237,0.1);">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="pill" style="margin-bottom: 1rem;">Our Shopify Services</div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">Everything Your Store Needs to Win</h2>
                <p style="color: rgba(255,255,255,0.45); margin-top: 0.75rem; max-width: 480px; margin-left: auto; margin-right: auto; font-size: 0.95rem; line-height: 1.7;">From scratch or from an existing store — we handle design, development, optimisation, and migration.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.25rem;">
                @php
                $services = [
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/></svg>',
                        'title' => 'Custom Theme Development',
                        'desc' => 'Bespoke Shopify themes built pixel-by-pixel for your brand. Not modified templates — actual custom code tailored to convert your specific audience.',
                        'points' => ['Brand-aligned design system', 'Conversion-optimised layouts', 'Liquid + JS development'],
                    ],
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>',
                        'title' => 'Speed & Performance',
                        'desc' => 'We audit and optimise every millisecond. Image compression, lazy loading, script deferral, and Core Web Vitals fixes that boost both UX and SEO.',
                        'points' => ['Core Web Vitals optimisation', '90+ PageSpeed scores', 'Lazy loading & image CDN'],
                    ],
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>',
                        'title' => 'Checkout Optimisation',
                        'desc' => 'Streamlined checkout flow, trust signals, and upsells that reduce abandonment and increase average order value without annoying your customers.',
                        'points' => ['One-page checkout setup', 'Post-purchase upsells', 'Trust badge placement'],
                    ],
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/></svg>',
                        'title' => 'Shopify Migration',
                        'desc' => 'Moving from WooCommerce, Magento, or another platform? We migrate your products, orders, customers, and SEO rankings without downtime.',
                        'points' => ['Zero-downtime migration', 'SEO redirect mapping', 'Data integrity guaranteed'],
                    ],
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.401.604-.401.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.959.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z"/></svg>',
                        'title' => 'Apps & Integrations',
                        'desc' => 'Connect your store to the tools you rely on — CRMs, ERPs, loyalty programs, review platforms, and custom Shopify apps built for your workflow.',
                        'points' => ['Custom app development', 'Third-party integrations', 'Shopify Flow automation'],
                    ],
                    [
                        'icon' => '<svg width="22" height="22" fill="none" stroke="#a78bfa" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                        'title' => 'CRO & A/B Testing',
                        'desc' => 'Data-driven improvements to your store — heatmaps, session recordings, A/B tests on product pages, cart flows, and CTAs. Turn more visitors into buyers.',
                        'points' => ['Heatmap & session analysis', 'A/B test implementation', 'Conversion funnel audits'],
                    ],
                ];
                @endphp
                @foreach($services as $s)
                <div class="card" style="padding: 1.75rem;">
                    <div style="width: 44px; height: 44px; border-radius: 0.625rem; background: rgba(124,58,237,0.12); border: 1px solid rgba(124,58,237,0.2); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
                        {!! $s['icon'] !!}
                    </div>
                    <h3 style="font-size: 0.975rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">{{ $s['title'] }}</h3>
                    <p style="font-size: 0.82rem; color: rgba(255,255,255,0.45); line-height: 1.65; margin-bottom: 1.25rem;">{{ $s['desc'] }}</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.4rem;">
                        @foreach($s['points'] as $point)
                        <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.78rem; color: rgba(255,255,255,0.5);">
                            <span class="check"><svg width="10" height="10" fill="none" stroke="#a78bfa" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                            {{ $point }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section style="padding: 5rem 1.5rem;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <div class="pill" style="margin-bottom: 1rem;">How It Works</div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">From Brief to Live in 4 Weeks</h2>
                <p style="color: rgba(255,255,255,0.45); margin-top: 0.75rem; font-size: 0.95rem;">A structured process that keeps you informed at every step — no black box development.</p>
            </div>

            <div style="position: relative;">
                {{-- Connector line --}}
                <div style="position: absolute; top: 28px; left: calc(12.5%); right: calc(12.5%); height: 1px; background: linear-gradient(90deg, rgba(124,58,237,0.4), rgba(99,102,241,0.4)); display: none;"></div>

                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; text-align: center;">
                    @php
                    $steps = [
                        ['num' => '1', 'title' => 'Discovery Call', 'desc' => 'We understand your brand, goals, target audience, and current bottlenecks.', 'time' => 'Day 1'],
                        ['num' => '2', 'title' => 'Design & Prototype', 'desc' => 'Wireframes and high-fidelity mockups. You approve before a single line of code is written.', 'time' => 'Week 1'],
                        ['num' => '3', 'title' => 'Development', 'desc' => 'Custom Liquid theme development with daily progress updates and staging previews.', 'time' => 'Weeks 2–3'],
                        ['num' => '4', 'title' => 'Launch & Support', 'desc' => 'Final QA, go-live, and 30 days of post-launch support included.', 'time' => 'Week 4'],
                    ];
                    @endphp
                    @foreach($steps as $step)
                    <div>
                        <div style="width: 56px; height: 56px; border-radius: 50%; background: rgba(124,58,237,0.15); border: 2px solid rgba(124,58,237,0.4); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                            <span style="font-size: 1.1rem; font-weight: 800; color: #a78bfa;">{{ $step['num'] }}</span>
                        </div>
                        <div style="font-size: 0.7rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(167,139,250,0.6); margin-bottom: 0.35rem;">{{ $step['time'] }}</div>
                        <h3 style="font-size: 0.9rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">{{ $step['title'] }}</h3>
                        <p style="font-size: 0.78rem; color: rgba(255,255,255,0.4); line-height: 1.6;">{{ $step['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Social Proof --}}
    <section style="padding: 5rem 1.5rem; background: rgba(255,255,255,0.02); border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06);">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <div class="pill" style="margin-bottom: 1rem;">Client Results</div>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">Stores That Sell More</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 1.5rem;">
                @php
                $testimonials = [
                    [
                        'quote' => 'We were on a Debut theme for 3 years and hitting a growth ceiling. Rare Input rebuilt our store from scratch — our conversion rate jumped from 1.4% to 3.1% in the first month.',
                        'name' => 'Riya Kapoor',
                        'role' => 'Founder, Bloom Skincare',
                        'result' => '+121% CVR',
                    ],
                    [
                        'quote' => 'Page speed went from 42 to 96 on mobile. Bounce rate dropped 30%. We rank on page 1 now for keywords we couldn\'t touch before. The store literally changed our business.',
                        'name' => 'Arjun Nair',
                        'role' => 'CEO, GearUp Sports',
                        'result' => '96 PageSpeed',
                    ],
                    [
                        'quote' => 'Migrated from WooCommerce with 8,000 SKUs and didn\'t lose a single ranking. Rare Input handled everything and gave us a store that\'s 10x better to manage.',
                        'name' => 'Shreya Menon',
                        'role' => 'Head of eCommerce, CraftBox India',
                        'result' => '0 Downtime',
                    ],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div style="padding: 1.75rem; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; display: flex; flex-direction: column;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <div style="color: #a78bfa; font-size: 1rem; letter-spacing: 0.1em;">★★★★★</div>
                        <div style="background: rgba(124,58,237,0.15); border: 1px solid rgba(124,58,237,0.3); border-radius: 0.375rem; padding: 0.25rem 0.65rem; font-size: 0.72rem; font-weight: 700; color: #a78bfa;">{{ $t['result'] }}</div>
                    </div>
                    <p style="font-size: 0.875rem; color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 1.25rem; font-style: italic; flex: 1;">"{{ $t['quote'] }}"</p>
                    <div>
                        <p style="font-size: 0.85rem; font-weight: 700; color: #fff;">{{ $t['name'] }}</p>
                        <p style="font-size: 0.78rem; color: rgba(255,255,255,0.35); margin-top: 0.1rem;">{{ $t['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Us --}}
    <section style="padding: 5rem 1.5rem;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                <div>
                    <div class="pill" style="margin-bottom: 1.25rem;">Why Rare Input</div>
                    <h2 style="font-size: clamp(1.6rem, 3.5vw, 2.25rem); font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 1.25rem;">We Only Win When You Do</h2>
                    <p style="color: rgba(255,255,255,0.5); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2rem;">We're not a template shop. We study your customers, your funnel, and your competitors before writing a single line of code. Every decision is made with conversion in mind.</p>

                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @php
                        $reasons = [
                            ['title' => 'Shopify-Only Focus', 'desc' => 'We don\'t do everything. We do Shopify exceptionally well.'],
                            ['title' => 'Conversion-First Design', 'desc' => 'Every design decision is backed by CRO principles, not just aesthetics.'],
                            ['title' => 'Dedicated Project Manager', 'desc' => 'One point of contact. No chasing updates across a scattered team.'],
                            ['title' => 'Post-Launch Support', 'desc' => '30 days of support included. We don\'t disappear at launch.'],
                        ];
                        @endphp
                        @foreach($reasons as $r)
                        <div style="display: flex; gap: 0.875rem; align-items: flex-start;">
                            <span class="check" style="margin-top: 0.1rem;"><svg width="10" height="10" fill="none" stroke="#a78bfa" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                            <div>
                                <p style="font-size: 0.875rem; font-weight: 700; color: #fff; margin-bottom: 0.2rem;">{{ $r['title'] }}</p>
                                <p style="font-size: 0.8rem; color: rgba(255,255,255,0.4); line-height: 1.6;">{{ $r['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div class="stat-card" style="padding: 1.5rem;">
                        <div style="font-size: 2.25rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em; line-height: 1;">$3M+</div>
                        <p style="font-size: 0.8rem; color: rgba(255,255,255,0.45); margin-top: 0.35rem;">Revenue generated for clients in the last 12 months</p>
                    </div>
                    <div class="stat-card" style="padding: 1.5rem;">
                        <div style="font-size: 2.25rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em; line-height: 1;">2.6%</div>
                        <p style="font-size: 0.8rem; color: rgba(255,255,255,0.45); margin-top: 0.35rem;">Average conversion rate across our client stores (vs 1.3% industry avg)</p>
                    </div>
                    <div class="stat-card" style="padding: 1.5rem;">
                        <div style="font-size: 2.25rem; font-weight: 800; color: #a78bfa; letter-spacing: -0.03em; line-height: 1;">14 days</div>
                        <p style="font-size: 0.8rem; color: rgba(255,255,255,0.45); margin-top: 0.35rem;">Average time to first design prototype after kickoff</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lead Form --}}
    <section id="claim" style="padding: 5rem 1.5rem; background: linear-gradient(160deg, rgba(124,58,237,0.08) 0%, rgba(99,102,241,0.04) 100%); border-top: 1px solid rgba(124,58,237,0.15);">
        <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: start;">
            {{-- Left: Copy --}}
            <div style="padding-top: 0.5rem;">
                <div class="pill" style="margin-bottom: 1.25rem;">Free Store Audit</div>
                <h2 style="font-size: clamp(1.6rem, 3.5vw, 2.25rem); font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 1rem;">Get a Free Shopify Audit — No Strings Attached</h2>
                <p style="color: rgba(255,255,255,0.5); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2rem;">We'll analyse your store for speed, conversion blockers, UX issues, and missed revenue opportunities. You get a full report — whether you work with us or not.</p>

                <div style="display: flex; flex-direction: column; gap: 0.875rem;">
                    @php
                    $includes = [
                        'PageSpeed & Core Web Vitals report',
                        'Conversion funnel analysis',
                        'Mobile UX review',
                        'Quick win recommendations',
                        'Free 30-min strategy call',
                    ];
                    @endphp
                    @foreach($includes as $item)
                    <div style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.875rem; color: rgba(255,255,255,0.6);">
                        <span class="check"><svg width="10" height="10" fill="none" stroke="#a78bfa" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                        {{ $item }}
                    </div>
                    @endforeach
                </div>

                <div style="margin-top: 2rem; padding: 1.25rem; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 0.75rem;">
                    <p style="font-size: 0.78rem; font-weight: 700; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.75rem;">Trusted By</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                        @foreach(['D2C Brands', 'Fashion Labels', 'Health & Wellness', 'Electronics', 'Home Decor'] as $brand)
                        <span style="font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); background: rgba(255,255,255,0.05); padding: 0.25rem 0.65rem; border-radius: 2rem; border: 1px solid rgba(255,255,255,0.08);">{{ $brand }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right: Form --}}
            <div>
                @if(session('success'))
                    <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); border-radius: 0.75rem; padding: 1.25rem; margin-bottom: 1.5rem; color: #4ade80; font-weight: 600; font-size: 0.9rem;">
                        ✓ {{ session('success') }} We'll be in touch within 24 hours.
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.09); border-radius: 1rem; padding: 2rem; display: flex; flex-direction: column; gap: 1rem;">
                    @csrf
                    <input type="hidden" name="subject" value="Shopify Development — Free Store Audit Request">

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Your Name *</label>
                        <input type="text" name="name" required placeholder="Riya Kapoor"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Work Email *</label>
                        <input type="email" name="email" required placeholder="riya@yourstore.com"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Your Shopify Store URL</label>
                        <input type="url" name="website" placeholder="https://yourstore.myshopify.com"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.4); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">What's Your Main Challenge?</label>
                        <select name="challenge" class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                            <option value="" style="background: #0f172a;">Select...</option>
                            <option value="Low conversion rate" style="background: #0f172a;">Low conversion rate</option>
                            <option value="Slow page speed" style="background: #0f172a;">Slow page speed</option>
                            <option value="High cart abandonment" style="background: #0f172a;">High cart abandonment</option>
                            <option value="Poor mobile experience" style="background: #0f172a;">Poor mobile experience</option>
                            <option value="Platform migration" style="background: #0f172a;">Platform migration</option>
                            <option value="Need a new store" style="background: #0f172a;">Need a new store built</option>
                            <option value="Other" style="background: #0f172a;">Other</option>
                        </select>
                    </div>

                    <button type="submit"
                            style="width: 100%; padding: 1rem; background: #7c3aed; color: #fff; font-size: 0.95rem; font-weight: 700; border: none; border-radius: 0.5rem; cursor: pointer; transition: background 0.15s; letter-spacing: -0.01em; margin-top: 0.25rem;"
                            onmouseover="this.style.background='#6d28d9'" onmouseout="this.style.background='#7c3aed'">
                        Get My Free Shopify Audit
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="display: inline; vertical-align: middle; margin-left: 0.4rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                    <p style="text-align: center; font-size: 0.72rem; color: rgba(255,255,255,0.2);">No commitment. Audit delivered within 48 hours.</p>
                </form>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section style="padding: 5rem 1.5rem; border-top: 1px solid rgba(255,255,255,0.06);">
        <div style="max-width: 680px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">Questions</h2>
            </div>
            @php
            $faqs = [
                ['q' => 'How much does a custom Shopify store cost?', 'a' => 'It depends on scope — a custom theme build typically starts at $1,000. We provide a fixed-price quote after the discovery call so there are no surprises.'],
                ['q' => 'How long does it take to build a Shopify store?', 'a' => 'Typically 3–5 weeks for a full custom build. Simple projects can go live in 2 weeks. We give you a timeline during the discovery call.'],
                ['q' => 'Do you work with existing stores or only new ones?', 'a' => 'Both. We rebuild existing stores, optimise live ones, migrate from other platforms, or build brand-new stores from scratch.'],
                ['q' => 'What\'s included in the free audit?', 'a' => 'PageSpeed scores, Core Web Vitals, conversion funnel gaps, mobile UX issues, and specific recommendations. Delivered as a written report + a 30-min walk-through call.'],
                ['q' => 'Do I need to be on Shopify already?', 'a' => 'No. We handle migrations from WooCommerce, Magento, OpenCart, or any other platform. Your data, products, orders, and SEO rankings are preserved.'],
                ['q' => 'Do you offer ongoing support after launch?', 'a' => '30 days of post-launch support is included in every project. We also offer monthly retainer support for ongoing store management and improvements.'],
            ];
            @endphp
            <div style="display: flex; flex-direction: column; gap: 0.625rem;">
                @foreach($faqs as $i => $faq)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }"
                     style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07); border-radius: 0.75rem; overflow: hidden;">
                    <button @click="open = !open" type="button"
                            style="width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1.1rem 1.25rem; background: none; border: none; cursor: pointer; text-align: left; color: #fff; font-size: 0.9rem; font-weight: 600;">
                        {{ $faq['q'] }}
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform shrink-0 ml-4" fill="none" stroke="#a78bfa" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-cloak style="padding: 0 1.25rem 1.1rem; font-size: 0.84rem; color: rgba(255,255,255,0.45); line-height: 1.7;">
                        {{ $faq['a'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section style="padding: 5rem 1.5rem; text-align: center; background: linear-gradient(160deg, rgba(124,58,237,0.1), rgba(99,102,241,0.05)); border-top: 1px solid rgba(124,58,237,0.15);">
        <div style="max-width: 580px; margin: 0 auto;">
            <div class="pill" style="margin-bottom: 1.5rem;">Free, No Commitment</div>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 1rem;">Your Store Could Be<br>Converting 2X More.</h2>
            <p style="color: rgba(255,255,255,0.45); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2.5rem;">Find out exactly where you're losing customers — with a free audit delivered in 48 hours.</p>
            <a href="#claim" class="cta-btn" style="font-size: 1rem; padding: 1.1rem 2.5rem;">
                Get My Free Audit
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <p style="margin-top: 1rem; font-size: 0.75rem; color: rgba(255,255,255,0.25);">No credit card · No sales pressure · Just honest feedback</p>
        </div>
    </section>

    {{-- Footer --}}
    <footer style="border-top: 1px solid rgba(255,255,255,0.06); padding: 2rem 1.5rem; text-align: center;">
        <p style="font-size: 0.78rem; color: rgba(255,255,255,0.2);">
            &copy; {{ date('Y') }} Rare Input. All rights reserved. &nbsp;·&nbsp;
            <a href="{{ route('privacy-policy') }}" style="color: rgba(255,255,255,0.2); text-decoration: underline;">Privacy Policy</a> &nbsp;·&nbsp;
            <a href="{{ route('terms') }}" style="color: rgba(255,255,255,0.2); text-decoration: underline;">Terms</a>
        </p>
    </footer>

</body>
</html>
