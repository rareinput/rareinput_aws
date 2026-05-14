@php $c = $content['colors']; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1e1a17">
    <title>{{ $landingPage->meta_title ?: ($content['hero']['headline'] . ' — Rare Input') }}</title>
    <meta name="description" content="{{ $landingPage->meta_description ?: $content['hero']['subheadline'] }}">
    <meta name="robots" content="{{ $landingPage->noindex ? 'noindex, nofollow' : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' }}">
    <link rel="canonical" href="{{ url('/' . $landingPage->slug) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/' . $landingPage->slug) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/' . $landingPage->slug) }}">

    @php $lpOgTitle = $landingPage->meta_title ?: $content['hero']['headline'] . ' — Rare Input'; @endphp
    <meta property="og:type"    content="website">
    <meta property="og:locale"  content="en_US">
    <meta property="og:title"   content="{{ $lpOgTitle }}">
    <meta property="og:description" content="{{ $landingPage->meta_description ?: $content['hero']['subheadline'] }}">
    <meta property="og:url"      content="{{ url('/' . $landingPage->slug) }}">
    <meta property="og:site_name" content="Rare Input">
    @if($landingPage->og_image)
    <meta property="og:image" content="{{ asset('storage/' . $landingPage->og_image) }}">
    @else
    <meta property="og:image" content="{{ config('app.url') }}/og-default.jpg">
    @endif
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type"   content="image/jpeg">
    <meta property="og:image:alt"    content="{{ $lpOgTitle }}">
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:site"        content="@rareinput">
    <meta name="twitter:title"       content="{{ $lpOgTitle }}">
    <meta name="twitter:description" content="{{ $landingPage->meta_description ?: $content['hero']['subheadline'] }}">
    <meta name="twitter:image"       content="{{ $landingPage->og_image ? asset('storage/' . $landingPage->og_image) : config('app.url') . '/og-default.jpg' }}">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="apple-touch-icon" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @foreach(json_decode(\App\Models\Setting::get('head_scripts', '[]'), true) ?? [] as $script)
        {!! $script['code'] !!}
    @endforeach

    <style>
        :root {
            --lp-bg:           {{ $c['background'] }};
            --lp-accent:       {{ $c['accent'] }};
            --lp-accent-text:  {{ $c['accent_text'] }};
            --lp-heading:      {{ $c['heading_text'] }};
            --lp-body:         {{ $c['body_text'] }};
            --lp-card-bg:      {{ $c['card_background'] }};
            --lp-card-border:  {{ $c['card_border'] }};
        }
        .lp-gradient { background: linear-gradient(135deg, var(--lp-bg) 0%, color-mix(in srgb, var(--lp-accent) 8%, var(--lp-bg)) 50%, var(--lp-bg) 100%); }
        .gold-text { background: linear-gradient(135deg, var(--lp-accent), color-mix(in srgb, var(--lp-accent) 80%, #fff), var(--lp-accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .benefit-card { background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 1rem; transition: border-color 0.2s, background 0.2s; }
        .benefit-card:hover { border-color: color-mix(in srgb, var(--lp-accent) 50%, transparent); background: color-mix(in srgb, var(--lp-card-bg) 70%, var(--lp-accent) 7%); }
        .trust-badge { background: color-mix(in srgb, var(--lp-heading) 6%, transparent); border: 1px solid color-mix(in srgb, var(--lp-heading) 10%, transparent); border-radius: 0.75rem; }
        .countdown-box { background: color-mix(in srgb, var(--lp-accent) 12%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 30%, transparent); border-radius: 0.75rem; }
        .lp-input { background: color-mix(in srgb, var(--lp-heading) 8%, transparent); border: 1.5px solid color-mix(in srgb, var(--lp-heading) 15%, transparent); color: var(--lp-heading); border-radius: 0.5rem; outline: none; transition: border-color 0.2s; }
        .lp-input:focus { border-color: var(--lp-accent); }
        .lp-input::placeholder { color: color-mix(in srgb, var(--lp-heading) 35%, transparent); }
        [x-cloak] { display: none; }
    </style>
</head>
<body style="font-family: var(--font-sans); background: var(--lp-bg); color: var(--lp-heading); margin: 0;">

    {{-- Urgency Banner --}}
    @if(!empty($content['urgency_banner']['text']))
    <div style="background: var(--lp-accent); color: var(--lp-accent-text); text-align: center; padding: 0.6rem 1rem; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.04em;">
        {{ $content['urgency_banner']['text'] }}
    </div>
    @endif

    {{-- Nav --}}
    <nav style="padding: 1.25rem 2rem; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid color-mix(in srgb, var(--lp-heading) 8%, transparent);">
        <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
            <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: var(--lp-accent);">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="{{ $c['accent_text'] }}" opacity="0.9"/>
                    <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="{{ $c['accent_text'] }}" opacity="0.45"/>
                </svg>
            </span>
            <span style="font-size: 1.1rem; font-weight: 700; color: var(--lp-heading); letter-spacing: -0.02em;">Rare Input</span>
        </a>
        @if($content['nav']['cta_text'])
        <a href="#claim" style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 700; color: var(--lp-accent-text); background: var(--lp-accent); padding: 0.6rem 1.25rem; border-radius: 0.4rem; text-decoration: none;">
            {{ $content['nav']['cta_text'] }}
        </a>
        @endif
    </nav>

    {{-- Hero --}}
    <section class="lp-gradient" style="padding: 6rem 1.5rem 5rem; text-align: center; position: relative; overflow: hidden;">
        <div style="max-width: 820px; margin: 0 auto; position: relative; z-index: 1;">
            @if($content['hero']['badge'])
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: color-mix(in srgb, var(--lp-accent) 15%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 30%, transparent); border-radius: 2rem; padding: 0.4rem 1rem; font-size: 0.78rem; font-weight: 700; color: var(--lp-accent); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 2rem;">
                {{ $content['hero']['badge'] }}
            </div>
            @endif

            @if($content['hero']['headline'])
            <h1 style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem;">
                <span class="gold-text">{{ $content['hero']['headline'] }}</span>
            </h1>
            @endif

            @if($content['hero']['subheadline'])
            <p style="font-size: 1.2rem; color: var(--lp-body); line-height: 1.7; max-width: 580px; margin: 0 auto 2.5rem;">
                {{ $content['hero']['subheadline'] }}
            </p>
            @endif

            {{-- Countdown --}}
            @if(!empty($content['hero']['countdown_end_date']))
            @php $endDate = \Carbon\Carbon::parse($content['hero']['countdown_end_date'])->endOfDay(); @endphp
            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 3rem;" id="countdown">
                @foreach(['cd-days' => 'Days', 'cd-hours' => 'Hours', 'cd-mins' => 'Mins', 'cd-secs' => 'Secs'] as $id => $label)
                <div class="countdown-box" style="padding: 1rem 1.25rem; min-width: 72px; text-align: center;">
                    <div id="{{ $id }}" style="font-size: 2rem; font-weight: 800; color: var(--lp-accent); line-height: 1;">--</div>
                    <div style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: color-mix(in srgb, var(--lp-heading) 40%, transparent); margin-top: 0.25rem;">{{ $label }}</div>
                </div>
                @endforeach
            </div>
            <script>
                (function() {
                    var end = new Date('{{ $endDate->toIso8601String() }}');
                    function tick() {
                        var diff = end - new Date();
                        if (diff <= 0) return;
                        var d = Math.floor(diff / 86400000);
                        var h = Math.floor((diff % 86400000) / 3600000);
                        var m = Math.floor((diff % 3600000) / 60000);
                        var s = Math.floor((diff % 60000) / 1000);
                        document.getElementById('cd-days').textContent = String(d).padStart(2,'0');
                        document.getElementById('cd-hours').textContent = String(h).padStart(2,'0');
                        document.getElementById('cd-mins').textContent = String(m).padStart(2,'0');
                        document.getElementById('cd-secs').textContent = String(s).padStart(2,'0');
                    }
                    tick(); setInterval(tick, 1000);
                })();
            </script>
            @endif

            @if($content['hero']['cta_text'])
            <a href="#claim" style="display: inline-flex; align-items: center; gap: 0.75rem; background: var(--lp-accent); color: var(--lp-accent-text); font-size: 1.05rem; font-weight: 800; padding: 1.1rem 2.5rem; border-radius: 0.5rem; text-decoration: none; letter-spacing: -0.01em;">
                {{ $content['hero']['cta_text'] }}
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <p style="margin-top: 1rem; font-size: 0.78rem; color: color-mix(in srgb, var(--lp-heading) 30%, transparent);">No credit card required · Free consultation call included</p>
            @endif
        </div>
    </section>

    {{-- Trust Badges --}}
    @php $badges = array_filter($content['trust_badges']['badges'] ?? [], fn($b) => !empty($b['text'])); @endphp
    @if(count($badges) > 0)
    <section style="background: color-mix(in srgb, var(--lp-heading) 2%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-heading) 6%, transparent); border-bottom: 1px solid color-mix(in srgb, var(--lp-heading) 6%, transparent); padding: 1.75rem 2rem;">
        <div style="max-width: 900px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 2rem;">
            @foreach($badges as $badge)
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; font-weight: 600; color: var(--lp-body);">
                <span style="color: var(--lp-accent);">✓</span> {{ $badge['text'] }}
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Services --}}
    @if(!empty($content['services']['services']))
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                @if($content['services']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.75rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['services']['headline'] }}</h2>@endif
                @if($content['services']['subheadline'])<p style="color: var(--lp-body); margin-top: 0.75rem; font-size: 1rem; max-width: 480px; margin-left: auto; margin-right: auto;">{{ $content['services']['subheadline'] }}</p>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
                @foreach($content['services']['services'] as $service)
                <div class="benefit-card" style="padding: 1.75rem;">
                    @if($service['icon'])<div style="font-size: 2rem; margin-bottom: 1rem;">{{ $service['icon'] }}</div>@endif
                    <h3 style="font-size: 1rem; font-weight: 700; color: var(--lp-heading); margin-bottom: 0.5rem;">{{ $service['title'] }}</h3>
                    <p style="font-size: 0.85rem; color: var(--lp-body); line-height: 1.6;">{{ $service['description'] }}</p>
                    @if(!empty($content['services']['discount_badge']))
                    <div style="margin-top: 1rem;">
                        <span style="font-size: 0.85rem; font-weight: 700; color: var(--lp-accent); background: color-mix(in srgb, var(--lp-accent) 12%, transparent); padding: 0.2rem 0.6rem; border-radius: 0.25rem;">{{ $content['services']['discount_badge'] }}</span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Testimonials --}}
    @if(!empty($content['testimonials']['testimonials']))
    <section style="background: color-mix(in srgb, var(--lp-heading) 2%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-heading) 6%, transparent); border-bottom: 1px solid color-mix(in srgb, var(--lp-heading) 6%, transparent); padding: 6rem 1.5rem;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                @if($content['testimonials']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['testimonials']['headline'] }}</h2>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                @foreach($content['testimonials']['testimonials'] as $t)
                <div class="trust-badge" style="padding: 1.75rem;">
                    <div style="color: var(--lp-accent); font-size: 1.2rem; margin-bottom: 1rem;">★★★★★</div>
                    <p style="font-size: 0.9rem; color: var(--lp-body); line-height: 1.7; margin-bottom: 1.25rem; font-style: italic;">"{{ $t['quote'] }}"</p>
                    <div>
                        <p style="font-size: 0.85rem; font-weight: 700; color: var(--lp-heading);">{{ $t['name'] }}</p>
                        <p style="font-size: 0.78rem; color: color-mix(in srgb, var(--lp-heading) 40%, transparent);">{{ $t['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Process --}}
    @if(!empty($content['process']['steps']))
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            @if($content['process']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 3.5rem;">{{ $content['process']['headline'] }}</h2>@endif
            <div style="display: grid; grid-template-columns: repeat({{ min(count($content['process']['steps']), 4) }}, 1fr); gap: 2rem;">
                @foreach($content['process']['steps'] as $step)
                <div>
                    <div style="width: 56px; height: 56px; border-radius: 50%; background: color-mix(in srgb, var(--lp-accent) 12%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 30%, transparent); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 0.85rem; font-weight: 800; color: var(--lp-accent);">{{ $step['number'] }}</div>
                    <h3 style="font-size: 1rem; font-weight: 700; color: var(--lp-heading); margin-bottom: 0.5rem;">{{ $step['title'] }}</h3>
                    <p style="font-size: 0.85rem; color: color-mix(in srgb, var(--lp-heading) 45%, transparent); line-height: 1.6;">{{ $step['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Lead Form --}}
    <section id="claim" style="padding: 6rem 1.5rem; background: color-mix(in srgb, var(--lp-accent) 5%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-accent) 15%, transparent);">
        <div style="max-width: 560px; margin: 0 auto; text-align: center;">
            @if($content['form']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 0.75rem;">{{ $content['form']['headline'] }}</h2>@endif
            @if($content['form']['subheadline'])<p style="color: var(--lp-body); font-size: 0.95rem; margin-bottom: 2.5rem; line-height: 1.7;">{{ $content['form']['subheadline'] }}</p>@endif

            @if(session('success'))
            <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); border-radius: 0.75rem; padding: 1.25rem; margin-bottom: 1.5rem; color: #4ade80; font-weight: 600;">
                🎉 {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}" style="display: flex; flex-direction: column; gap: 1rem; text-align: left;">
                @csrf
                <input type="hidden" name="subject" value="{{ $content['form']['form_subject'] ?: $landingPage->name . ' — Lead' }}">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Your Name *</label>
                        <input type="text" name="name" required placeholder="Your Name"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 0.78rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Email Address *</label>
                    <input type="email" name="email" required placeholder="you@company.com"
                           class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.78rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Tell Us About Your Business</label>
                    <textarea name="message" rows="3" placeholder="What does your business do? What's your goal?"
                              class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; resize: none; box-sizing: border-box;"></textarea>
                </div>

                <button type="submit"
                        style="width: 100%; padding: 1.1rem; background: var(--lp-accent); color: var(--lp-accent-text); font-size: 1rem; font-weight: 800; border: none; border-radius: 0.5rem; cursor: pointer; transition: opacity 0.15s; letter-spacing: -0.01em;"
                        onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    {{ $content['nav']['cta_text'] ?: 'Submit' }}
                </button>
                <p style="text-align: center; font-size: 0.75rem; color: color-mix(in srgb, var(--lp-heading) 25%, transparent);">We respect your privacy. No spam, ever.</p>
            </form>
        </div>
    </section>

    {{-- FAQ --}}
    @if(!empty($content['faq']['faqs']))
    <section style="padding: 6rem 1.5rem;">
        <div style="max-width: 680px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">Common Questions</h2>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                @foreach($content['faq']['faqs'] as $i => $faq)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }"
                     style="background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 0.75rem; overflow: hidden;">
                    <button @click="open = !open" type="button"
                            style="width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; background: none; border: none; cursor: pointer; text-align: left; color: var(--lp-heading); font-size: 0.95rem; font-weight: 600;">
                        {{ $faq['question'] }}
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform shrink-0 ml-4" fill="none" stroke="var(--lp-accent)" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-cloak style="padding: 0 1.5rem 1.25rem; font-size: 0.875rem; color: var(--lp-body); line-height: 1.7;">
                        {{ $faq['answer'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Final CTA --}}
    @if($content['final_cta']['headline'])
    <section style="padding: 5rem 1.5rem; text-align: center; background: linear-gradient(135deg, color-mix(in srgb, var(--lp-accent) 8%, transparent), color-mix(in srgb, var(--lp-accent) 3%, transparent));">
        <div style="max-width: 600px; margin: 0 auto;">
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 1rem;">{{ $content['final_cta']['headline'] }}</h2>
            @if($content['final_cta']['subheadline'])<p style="color: var(--lp-body); font-size: 1rem; line-height: 1.7; margin-bottom: 2.5rem;">{{ $content['final_cta']['subheadline'] }}</p>@endif
            <a href="#claim" style="display: inline-flex; align-items: center; gap: 0.75rem; background: var(--lp-accent); color: var(--lp-accent-text); font-size: 1rem; font-weight: 800; padding: 1.1rem 2.5rem; border-radius: 0.5rem; text-decoration: none;">
                {{ $content['final_cta']['button_text'] ?: 'Get Started' }}
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>
    @endif

    {{-- Footer --}}
    <footer style="border-top: 1px solid color-mix(in srgb, var(--lp-heading) 6%, transparent); padding: 2rem 1.5rem; text-align: center;">
        <p style="font-size: 0.8rem; color: color-mix(in srgb, var(--lp-heading) 25%, transparent);">
            &copy; {{ date('Y') }} Rare Input. All rights reserved. &nbsp;·&nbsp;
            <a href="{{ route('privacy-policy') }}" style="color: color-mix(in srgb, var(--lp-heading) 25%, transparent); text-decoration: underline;">Privacy Policy</a> &nbsp;·&nbsp;
            <a href="{{ route('terms') }}" style="color: color-mix(in srgb, var(--lp-heading) 25%, transparent); text-decoration: underline;">Terms</a>
        </p>
    </footer>

    @foreach(json_decode(\App\Models\Setting::get('footer_scripts', '[]'), true) ?? [] as $script)
        {!! $script['code'] !!}
    @endforeach
</body>
</html>
