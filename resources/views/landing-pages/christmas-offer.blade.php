<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Christmas Offer — 30% Off Digital Marketing & Web Services | Rare Input</title>
    <meta name="description" content="Limited Christmas offer from Rare Input. Get 30% off on Shopify, SEO, Performance Marketing, and Web Development. Only 10 spots available. Claim yours before December 31.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ route('landing.christmas-offer') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="🎄 Christmas Offer — 30% Off | Rare Input">
    <meta property="og:description" content="Limited spots available. Get 30% off on Shopify, SEO, Performance Marketing, and Web Development this Christmas.">
    <meta property="og:url" content="{{ route('landing.christmas-offer') }}">
    <meta property="og:site_name" content="Rare Input">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="🎄 Christmas Offer — 30% Off | Rare Input">
    <meta name="twitter:description" content="Limited spots available. Get 30% off on Shopify, SEO, Performance Marketing, and Web Development this Christmas.">

    {{-- JSON-LD --}}
    <script type="application/ld+json">{!! json_encode([
        '@context'      => 'https://schema.org',
        '@type'         => 'SpecialAnnouncement',
        'name'          => 'Christmas Offer — 30% Off Digital Services',
        'text'          => 'Rare Input is offering 30% off on all digital marketing and web development services this Christmas. Limited to 10 clients.',
        'category'      => 'https://www.wikidata.org/wiki/Q1081891',
        'datePosted'    => now()->toIso8601String(),
        'expires'       => now()->endOfYear()->toIso8601String(),
        'announcementLocation' => ['@type' => 'Organization', 'name' => 'Rare Input', 'url' => url('/')],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .lp-gradient { background: linear-gradient(135deg, #1a1512 0%, #2d1f0e 50%, #1a1512 100%); }
        .gold-text { background: linear-gradient(135deg, #e8a838, #f5c842, #e8a838); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .snow { position: relative; overflow: hidden; }
        .benefit-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(232,168,56,0.2); border-radius: 1rem; transition: border-color 0.2s, background 0.2s; }
        .benefit-card:hover { border-color: rgba(232,168,56,0.5); background: rgba(255,255,255,0.07); }
        .trust-badge { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 0.75rem; }
        .countdown-box { background: rgba(232,168,56,0.12); border: 1px solid rgba(232,168,56,0.3); border-radius: 0.75rem; }
        .lp-input { background: rgba(255,255,255,0.08); border: 1.5px solid rgba(255,255,255,0.15); color: #fff; border-radius: 0.5rem; outline: none; transition: border-color 0.2s; }
        .lp-input:focus { border-color: #e8a838; }
        .lp-input::placeholder { color: rgba(255,255,255,0.35); }
        .stripe { background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(232,168,56,0.03) 10px, rgba(232,168,56,0.03) 20px); }
    </style>
</head>
<body style="font-family: var(--font-sans); background: #1a1512; color: #fff; margin: 0;">

    {{-- Minimal Nav --}}
    <nav style="padding: 1.25rem 2rem; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.08);">
        <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
            <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #e8a838;">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="white" opacity="0.9"/>
                    <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="white" opacity="0.45"/>
                </svg>
            </span>
            <span style="font-size: 1.1rem; font-weight: 700; color: #fff; letter-spacing: -0.02em;">Rare Input</span>
        </a>
        <a href="#claim" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 700; color: #1a1512; background: #e8a838; padding: 0.6rem 1.25rem; border-radius: 0.4rem; text-decoration: none;">
            Book a Free Call
        </a>
    </nav>

    {{-- Urgency Banner --}}
    <div style="background: #e8a838; color: #1a1512; text-align: center; padding: 0.6rem 1rem; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.04em;">
        🎄 OFFER ENDS DECEMBER 31 &nbsp;·&nbsp; ONLY 10 SPOTS AVAILABLE &nbsp;·&nbsp; <span id="spots-left">7</span> REMAINING
    </div>

    {{-- Hero --}}
    <section class="lp-gradient snow" style="padding: 6rem 1.5rem 5rem; text-align: center; position: relative;">
        <div style="max-width: 820px; margin: 0 auto; position: relative; z-index: 1;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(232,168,56,0.15); border: 1px solid rgba(232,168,56,0.3); border-radius: 2rem; padding: 0.4rem 1rem; font-size: 0.78rem; font-weight: 700; color: #e8a838; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 2rem;">
                🎄 Christmas Special Offer — Limited Time
            </div>
            <h1 style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem;">
                Grow Your Business <br>
                <span class="gold-text">This Christmas</span><br>
                <span style="color: rgba(255,255,255,0.9);">Save 30% on Everything</span>
            </h1>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.65); line-height: 1.7; max-width: 580px; margin: 0 auto 2.5rem;">
                Shopify stores, SEO, Performance Marketing, Web Development — all at <strong style="color: #e8a838;">30% off</strong>. Start the new year ahead of your competition.
            </p>

            {{-- Countdown --}}
            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 3rem;" id="countdown">
                @php
                    $endDate = \Carbon\Carbon::create(now()->year, 12, 31, 23, 59, 59);
                    if ($endDate->isPast()) $endDate->addYear();
                @endphp
                <div class="countdown-box" style="padding: 1rem 1.25rem; min-width: 72px; text-align: center;">
                    <div id="cd-days" style="font-size: 2rem; font-weight: 800; color: #e8a838; line-height: 1;">--</div>
                    <div style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 0.25rem;">Days</div>
                </div>
                <div class="countdown-box" style="padding: 1rem 1.25rem; min-width: 72px; text-align: center;">
                    <div id="cd-hours" style="font-size: 2rem; font-weight: 800; color: #e8a838; line-height: 1;">--</div>
                    <div style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 0.25rem;">Hours</div>
                </div>
                <div class="countdown-box" style="padding: 1rem 1.25rem; min-width: 72px; text-align: center;">
                    <div id="cd-mins" style="font-size: 2rem; font-weight: 800; color: #e8a838; line-height: 1;">--</div>
                    <div style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 0.25rem;">Mins</div>
                </div>
                <div class="countdown-box" style="padding: 1rem 1.25rem; min-width: 72px; text-align: center;">
                    <div id="cd-secs" style="font-size: 2rem; font-weight: 800; color: #e8a838; line-height: 1;">--</div>
                    <div style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 0.25rem;">Secs</div>
                </div>
            </div>

            <a href="#claim"
               style="display: inline-flex; align-items: center; gap: 0.75rem; background: #e8a838; color: #1a1512; font-size: 1.05rem; font-weight: 800; padding: 1.1rem 2.5rem; border-radius: 0.5rem; text-decoration: none; transition: opacity 0.15s; letter-spacing: -0.01em;">
                Claim My 30% Discount
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <p style="margin-top: 1rem; font-size: 0.78rem; color: rgba(255,255,255,0.3);">No credit card required · Free consultation call included</p>
        </div>
    </section>

    {{-- Trust Badges --}}
    <section style="background: rgba(255,255,255,0.02); border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06); padding: 1.75rem 2rem;">
        <div style="max-width: 900px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.6);">
                <span style="color: #e8a838;">✓</span> 50+ Brands Served
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.6);">
                <span style="color: #e8a838;">✓</span> 3X Average ROI
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.6);">
                <span style="color: #e8a838;">✓</span> 5-Star Rated Agency
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.6);">
                <span style="color: #e8a838;">✓</span> Results in 90 Days
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.6);">
                <span style="color: #e8a838;">✓</span> No Long-Term Contracts
            </div>
        </div>
    </section>

    {{-- What's Included --}}
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                <span style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #e8a838;">What's Included</span>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; letter-spacing: -0.03em; margin-top: 0.75rem; color: #fff;">30% Off On All Services</h2>
                <p style="color: rgba(255,255,255,0.5); margin-top: 0.75rem; font-size: 1rem; max-width: 480px; margin-left: auto; margin-right: auto;">Pick one or combine multiple — the discount applies to everything.</p>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
                @php
                $services = [
                    ['icon' => '🛍️', 'title' => 'Shopify Development', 'desc' => 'Custom Shopify stores built to convert. From setup to advanced customisation.'],
                    ['icon' => '🔍', 'title' => 'SEO', 'desc' => 'Rank higher on Google and drive consistent organic traffic to your business.'],
                    ['icon' => '📈', 'title' => 'Performance Marketing', 'desc' => 'Google Ads, Meta Ads — campaigns engineered for maximum ROI.'],
                    ['icon' => '💻', 'title' => 'Web Development', 'desc' => 'Fast, beautiful websites built on modern tech that actually converts visitors.'],
                    ['icon' => '📱', 'title' => 'App Development', 'desc' => 'Mobile apps for iOS and Android that your customers will love using.'],
                    ['icon' => '📧', 'title' => 'Email Marketing', 'desc' => 'Automated sequences and campaigns that nurture leads and drive repeat sales.'],
                ];
                @endphp
                @foreach($services as $service)
                <div class="benefit-card" style="padding: 1.75rem;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">{{ $service['icon'] }}</div>
                    <h3 style="font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">{{ $service['title'] }}</h3>
                    <p style="font-size: 0.85rem; color: rgba(255,255,255,0.5); line-height: 1.6;">{{ $service['desc'] }}</p>
                    <div style="margin-top: 1rem; display: inline-flex; align-items: center; gap: 0.75rem;">
                        <span style="font-size: 0.8rem; color: rgba(255,255,255,0.3); text-decoration: line-through;">Regular Price</span>
                        <span style="font-size: 0.85rem; font-weight: 700; color: #e8a838; background: rgba(232,168,56,0.12); padding: 0.2rem 0.6rem; border-radius: 0.25rem;">30% OFF</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Social Proof --}}
    <section style="background: rgba(255,255,255,0.02); border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06); padding: 6rem 1.5rem;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #e8a838;">Client Results</span>
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; margin-top: 0.75rem; color: #fff;">Real Businesses. Real Growth.</h2>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                @php
                $testimonials = [
                    ['quote' => 'Rare Input transformed our Shopify store. Revenue went up 3X in just 4 months. Best investment we made.', 'name' => 'Priya Sharma', 'role' => 'Founder, FashionKart'],
                    ['quote' => 'Our Google Ads ROAS went from 1.8X to 5.2X after Rare Input took over. They know what they\'re doing.', 'name' => 'Rahul Mehta', 'role' => 'CEO, TechGadgets India'],
                    ['quote' => 'From zero to page 1 on Google in 90 days. Their SEO work is genuinely impressive.', 'name' => 'Ananya Patel', 'role' => 'Co-Founder, OrganicRoots'],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div class="trust-badge" style="padding: 1.75rem;">
                    <div style="color: #e8a838; font-size: 1.2rem; margin-bottom: 1rem;">★★★★★</div>
                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7); line-height: 1.7; margin-bottom: 1.25rem; font-style: italic;">"{{ $t['quote'] }}"</p>
                    <div>
                        <p style="font-size: 0.85rem; font-weight: 700; color: #fff;">{{ $t['name'] }}</p>
                        <p style="font-size: 0.78rem; color: rgba(255,255,255,0.4);">{{ $t['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #e8a838;">Simple Process</span>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; margin-top: 0.75rem; color: #fff; margin-bottom: 3.5rem;">Get Started in 3 Steps</h2>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; text-align: center;">
                @php
                $steps = [
                    ['num' => '01', 'title' => 'Claim Your Spot', 'desc' => 'Fill the form below. Takes 60 seconds.'],
                    ['num' => '02', 'title' => 'Free Strategy Call', 'desc' => 'We understand your goals and build a plan.'],
                    ['num' => '03', 'title' => 'We Get to Work', 'desc' => 'Execution starts within 48 hours.'],
                ];
                @endphp
                @foreach($steps as $step)
                <div>
                    <div style="width: 56px; height: 56px; border-radius: 50%; background: rgba(232,168,56,0.12); border: 1px solid rgba(232,168,56,0.3); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 0.85rem; font-weight: 800; color: #e8a838;">{{ $step['num'] }}</div>
                    <h3 style="font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">{{ $step['title'] }}</h3>
                    <p style="font-size: 0.85rem; color: rgba(255,255,255,0.45); line-height: 1.6;">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Lead Capture Form --}}
    <section id="claim" style="padding: 6rem 1.5rem; background: rgba(232,168,56,0.05); border-top: 1px solid rgba(232,168,56,0.15);">
        <div style="max-width: 560px; margin: 0 auto; text-align: center;">
            <span style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #e8a838;">Limited Spots Left</span>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; margin-top: 0.75rem; color: #fff; margin-bottom: 0.75rem;">Claim Your 30% Discount</h2>
            <p style="color: rgba(255,255,255,0.5); font-size: 0.95rem; margin-bottom: 2.5rem; line-height: 1.7;">Fill in your details and we'll reach out within 24 hours to schedule your free strategy call.</p>

            @if(session('success'))
                <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); border-radius: 0.75rem; padding: 1.25rem; margin-bottom: 1.5rem; color: #4ade80; font-weight: 600;">
                    🎉 {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}" style="display: flex; flex-direction: column; gap: 1rem; text-align: left;">
                @csrf
                <input type="hidden" name="subject" value="Christmas Offer — 30% Discount Enquiry">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Your Name *</label>
                        <input type="text" name="name" required placeholder="John Doe"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Email Address *</label>
                    <input type="email" name="email" required placeholder="you@company.com"
                           class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Service You're Interested In</label>
                    <select name="service" class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                        <option value="" style="background: #1a1512;">Select a service...</option>
                        <option value="Shopify Development" style="background: #1a1512;">Shopify Development</option>
                        <option value="SEO" style="background: #1a1512;">SEO</option>
                        <option value="Performance Marketing" style="background: #1a1512;">Performance Marketing</option>
                        <option value="Web Development" style="background: #1a1512;">Web Development</option>
                        <option value="App Development" style="background: #1a1512;">App Development</option>
                        <option value="Email Marketing" style="background: #1a1512;">Email Marketing</option>
                        <option value="Multiple Services" style="background: #1a1512;">Multiple Services</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Tell Us About Your Business</label>
                    <textarea name="message" rows="3" placeholder="What does your business do? What's your goal?"
                              class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; resize: none; box-sizing: border-box;"></textarea>
                </div>

                <button type="submit"
                        style="width: 100%; padding: 1.1rem; background: #e8a838; color: #1a1512; font-size: 1rem; font-weight: 800; border: none; border-radius: 0.5rem; cursor: pointer; transition: opacity 0.15s; letter-spacing: -0.01em;"
                        onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    🎄 Claim My 30% Christmas Discount
                </button>
                <p style="text-align: center; font-size: 0.75rem; color: rgba(255,255,255,0.25);">We respect your privacy. No spam, ever.</p>
            </form>
        </div>
    </section>

    {{-- FAQ --}}
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 680px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: #fff;">Common Questions</h2>
            </div>
            @php
            $faqs = [
                ['q' => 'Is this offer really 30% off?', 'a' => 'Yes — 30% off our standard pricing on all services. The discount applies to new projects signed before December 31.'],
                ['q' => 'How many spots are left?', 'a' => 'We cap Christmas offer clients at 10 to maintain quality. Once spots are gone, the offer closes regardless of the date.'],
                ['q' => 'Do I need to pay upfront?', 'a' => 'No. We start with a free strategy call. Payment is structured after we agree on scope and deliverables.'],
                ['q' => 'How quickly will you get back to me?', 'a' => 'Within 24 hours on business days. Often much faster.'],
                ['q' => 'Can I use this offer for multiple services?', 'a' => 'Absolutely. The 30% discount applies across all services you bundle together.'],
            ];
            @endphp
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                @foreach($faqs as $i => $faq)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 0.75rem; overflow: hidden;">
                    <button @click="open = !open" type="button"
                            style="width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; background: none; border: none; cursor: pointer; text-align: left; color: #fff; font-size: 0.95rem; font-weight: 600;">
                        {{ $faq['q'] }}
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform shrink-0 ml-4" fill="none" stroke="#e8a838" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-cloak style="padding: 0 1.5rem 1.25rem; font-size: 0.875rem; color: rgba(255,255,255,0.5); line-height: 1.7;">
                        {{ $faq['a'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section style="padding: 5rem 1.5rem; text-align: center; background: linear-gradient(135deg, rgba(232,168,56,0.08), rgba(232,168,56,0.03));">
        <div style="max-width: 600px; margin: 0 auto;">
            <p style="font-size: 3rem; margin-bottom: 1rem;">🎄</p>
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 1rem;">Don't Miss This.<br>Spots Are Filling Fast.</h2>
            <p style="color: rgba(255,255,255,0.5); font-size: 1rem; line-height: 1.7; margin-bottom: 2.5rem;">Start 2025 with a competitive edge. Lock in your 30% discount today before the last spots are taken.</p>
            <a href="#claim"
               style="display: inline-flex; align-items: center; gap: 0.75rem; background: #e8a838; color: #1a1512; font-size: 1rem; font-weight: 800; padding: 1.1rem 2.5rem; border-radius: 0.5rem; text-decoration: none; transition: opacity 0.15s;">
                Claim My Discount Now
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer style="border-top: 1px solid rgba(255,255,255,0.06); padding: 2rem 1.5rem; text-align: center;">
        <p style="font-size: 0.8rem; color: rgba(255,255,255,0.25);">
            &copy; {{ date('Y') }} Rare Input. All rights reserved. &nbsp;·&nbsp;
            <a href="{{ route('privacy-policy') }}" style="color: rgba(255,255,255,0.25); text-decoration: underline;">Privacy Policy</a> &nbsp;·&nbsp;
            <a href="{{ route('terms') }}" style="color: rgba(255,255,255,0.25); text-decoration: underline;">Terms</a>
        </p>
    </footer>

    {{-- Countdown JS --}}
    <script>
        function updateCountdown() {
            const end = new Date('{{ $endDate->toIso8601String() }}');
            const now = new Date();
            const diff = end - now;
            if (diff <= 0) return;
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);
            document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
            document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
            document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>

</body>
</html>
