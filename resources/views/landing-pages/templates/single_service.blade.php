<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1e1a17">
    <title>{{ $landingPage->meta_title ?: ($content['hero']['headline_line1'] . ' ' . $content['hero']['headline_line2'] . ' — Rare Input') }}</title>
    <meta name="description" content="{{ $landingPage->meta_description ?: $content['hero']['subheadline'] }}">
    <meta name="robots" content="{{ $landingPage->noindex ? 'noindex, nofollow' : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' }}">
    <link rel="canonical" href="{{ url('/' . $landingPage->slug) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/' . $landingPage->slug) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/' . $landingPage->slug) }}">

    @php $lpOgTitle = $landingPage->meta_title ?: $content['hero']['headline_line1'] . ' — Rare Input'; @endphp
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

    @php $c = $content['colors']; @endphp
    <style>
        :root {
            --lp-bg:        {{ $c['background'] }};
            --lp-accent:    {{ $c['accent'] }};
            --lp-accent-text: {{ $c['accent_text'] }};
            --lp-heading:   {{ $c['heading_text'] }};
            --lp-body:      {{ $c['body_text'] }};
            --lp-card-bg:   {{ $c['card_background'] }};
            --lp-card-border: {{ $c['card_border'] }};
        }
        .hero-bg { background: linear-gradient(160deg, var(--lp-bg) 0%, color-mix(in srgb, var(--lp-bg) 70%, #fff 30%) 60%, var(--lp-bg) 100%); }
        .pill { display: inline-flex; align-items: center; gap: 0.4rem; background: color-mix(in srgb, var(--lp-accent) 10%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 25%, transparent); border-radius: 2rem; padding: 0.35rem 0.9rem; font-size: 0.72rem; font-weight: 700; color: var(--lp-accent); letter-spacing: 0.08em; text-transform: uppercase; }
        .cta-btn { display: inline-flex; align-items: center; gap: 0.75rem; background: var(--lp-accent); color: var(--lp-accent-text); font-size: 1rem; font-weight: 700; padding: 1rem 2.25rem; border-radius: 0.5rem; text-decoration: none; transition: opacity 0.15s; }
        .cta-btn:hover { opacity: 0.88; }
        .cta-btn-outline { display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: var(--lp-accent); font-size: 0.9rem; font-weight: 600; padding: 0.9rem 1.75rem; border-radius: 0.5rem; text-decoration: none; border: 1.5px solid color-mix(in srgb, var(--lp-accent) 40%, transparent); transition: border-color 0.15s; }
        .cta-btn-outline:hover { border-color: var(--lp-accent); }
        .card { background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 1rem; transition: border-color 0.2s, background 0.2s; }
        .card:hover { border-color: color-mix(in srgb, var(--lp-accent) 35%, transparent); background: color-mix(in srgb, var(--lp-accent) 4%, transparent); }
        .stat-card { background: color-mix(in srgb, var(--lp-accent) 7%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 20%, transparent); border-radius: 1rem; }
        .lp-input { background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.12); color: #fff; border-radius: 0.5rem; outline: none; transition: border-color 0.2s; }
        .lp-input:focus { border-color: var(--lp-accent); }
        .lp-input::placeholder { color: rgba(255,255,255,0.3); }
        .check { display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 50%; background: color-mix(in srgb, var(--lp-accent) 20%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 40%, transparent); flex-shrink: 0; }
        [x-cloak] { display: none; }
    </style>
</head>
<body style="font-family: var(--font-sans); background: var(--lp-bg); color: var(--lp-heading); margin: 0;">

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
        @if($content['nav']['cta_text'])
        <a href="#claim" class="cta-btn" style="padding: 0.65rem 1.4rem; font-size: 0.85rem;">{{ $content['nav']['cta_text'] }}</a>
        @endif
    </nav>

    {{-- Hero --}}
    <section class="hero-bg" style="padding: 5.5rem 1.5rem 5rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -100px; right: -100px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, color-mix(in srgb, var(--lp-accent) 12%, transparent) 0%, transparent 70%); pointer-events: none;"></div>
        <div style="max-width: 900px; margin: 0 auto; text-align: center; position: relative; z-index: 1;">
            @if($content['hero']['badge'])
            <div class="pill" style="margin-bottom: 1.75rem;">{{ $content['hero']['badge'] }}</div>
            @endif

            <h1 style="font-size: clamp(2.4rem, 6vw, 4.2rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.035em; margin-bottom: 1.5rem;">
                @if($content['hero']['headline_line1'])<span style="display: block;">{{ $content['hero']['headline_line1'] }}</span>@endif
                @if($content['hero']['headline_line2'])<span style="display: block; background: linear-gradient(135deg, var(--lp-accent), color-mix(in srgb, var(--lp-accent) 70%, #fff)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $content['hero']['headline_line2'] }}</span>@endif
                @if($content['hero']['headline_line3'])<span style="display: block; color: var(--lp-heading);">{{ $content['hero']['headline_line3'] }}</span>@endif
            </h1>

            @if($content['hero']['subheadline'])
            <p style="font-size: 1.15rem; color: var(--lp-body); line-height: 1.75; max-width: 600px; margin: 0 auto 2.5rem;">{{ $content['hero']['subheadline'] }}</p>
            @endif

            <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 3.5rem;">
                @if($content['hero']['primary_cta'])
                <a href="#claim" class="cta-btn">
                    {{ $content['hero']['primary_cta'] }}
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                @endif
                @if($content['hero']['secondary_cta'])
                <a href="{{ $content['hero']['secondary_url'] ?: '#' }}" class="cta-btn-outline">{{ $content['hero']['secondary_cta'] }}</a>
                @endif
            </div>

            @php $heroStats = array_filter($content['hero']['stats'], fn($s) => !empty($s['value'])); @endphp
            @if(count($heroStats) > 0)
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 2.5rem; padding: 2rem; background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 1rem;">
                @foreach($heroStats as $i => $stat)
                @if($i > 0)<div style="width: 1px; height: 40px; background: var(--lp-card-border);"></div>@endif
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 800; color: var(--lp-accent); letter-spacing: -0.03em; line-height: 1;">{{ $stat['value'] }}</div>
                    <div style="font-size: 0.78rem; color: var(--lp-body); font-weight: 500; margin-top: 0.2rem;">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- Problem Section --}}
    @if(!empty($content['problem']['problems']))
    <section style="padding: 5rem 1.5rem; border-top: 1px solid var(--lp-card-border);">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                @if($content['problem']['subheadline'])<div class="pill" style="margin-bottom: 1rem;">{{ $content['problem']['subheadline'] }}</div>@endif
                @if($content['problem']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['problem']['headline'] }}</h2>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1rem;">
                @foreach($content['problem']['problems'] as $p)
                <div style="padding: 1.5rem; background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.12); border-radius: 0.875rem;">
                    @if($p['icon'])<div style="font-size: 1.75rem; margin-bottom: 0.875rem;">{{ $p['icon'] }}</div>@endif
                    <h3 style="font-size: 0.95rem; font-weight: 700; color: #fca5a5; margin-bottom: 0.5rem;">{{ $p['title'] }}</h3>
                    <p style="font-size: 0.82rem; color: var(--lp-body); line-height: 1.65;">{{ $p['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Services Section --}}
    @if(!empty($content['services']['services']))
    <section style="padding: 5rem 1.5rem; background: color-mix(in srgb, var(--lp-accent) 4%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-accent) 10%, transparent); border-bottom: 1px solid color-mix(in srgb, var(--lp-accent) 10%, transparent);">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                @if($content['services']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['services']['headline'] }}</h2>@endif
                @if($content['services']['subheadline'])<p style="color: var(--lp-body); margin-top: 0.75rem; max-width: 480px; margin-left: auto; margin-right: auto; font-size: 0.95rem; line-height: 1.7;">{{ $content['services']['subheadline'] }}</p>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.25rem;">
                @foreach($content['services']['services'] as $s)
                <div class="card" style="padding: 1.75rem;">
                    @if($s['icon'])<div style="font-size: 2rem; margin-bottom: 1.25rem;">{{ $s['icon'] }}</div>@endif
                    <h3 style="font-size: 0.975rem; font-weight: 700; color: var(--lp-heading); margin-bottom: 0.5rem;">{{ $s['title'] }}</h3>
                    <p style="font-size: 0.82rem; color: var(--lp-body); line-height: 1.65; margin-bottom: 1.25rem;">{{ $s['description'] }}</p>
                    @php $bullets = array_filter($s['bullets'] ?? [], fn($b) => !empty($b)); @endphp
                    @if(count($bullets) > 0)
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.4rem;">
                        @foreach($bullets as $bullet)
                        <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.78rem; color: var(--lp-body);">
                            <span class="check"><svg width="10" height="10" fill="none" stroke="var(--lp-accent)" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                            {{ $bullet }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Process --}}
    @if(!empty($content['process']['steps']))
    <section style="padding: 5rem 1.5rem;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3.5rem;">
                @if($content['process']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['process']['headline'] }}</h2>@endif
                @if($content['process']['subheadline'])<p style="color: var(--lp-body); margin-top: 0.75rem; font-size: 0.95rem;">{{ $content['process']['subheadline'] }}</p>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat({{ min(count($content['process']['steps']), 4) }}, 1fr); gap: 1.5rem; text-align: center;">
                @foreach($content['process']['steps'] as $step)
                <div>
                    <div style="width: 56px; height: 56px; border-radius: 50%; background: color-mix(in srgb, var(--lp-accent) 15%, transparent); border: 2px solid color-mix(in srgb, var(--lp-accent) 40%, transparent); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <span style="font-size: 1.1rem; font-weight: 800; color: var(--lp-accent);">{{ $step['number'] }}</span>
                    </div>
                    @if(!empty($step['timeframe']))<div style="font-size: 0.7rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: color-mix(in srgb, var(--lp-accent) 60%, transparent); margin-bottom: 0.35rem;">{{ $step['timeframe'] }}</div>@endif
                    <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--lp-heading); margin-bottom: 0.5rem;">{{ $step['title'] }}</h3>
                    <p style="font-size: 0.78rem; color: var(--lp-body); line-height: 1.6;">{{ $step['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Testimonials --}}
    @if(!empty($content['testimonials']['testimonials']))
    <section style="padding: 5rem 1.5rem; background: var(--lp-card-bg); border-top: 1px solid var(--lp-card-border); border-bottom: 1px solid var(--lp-card-border);">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                @if($content['testimonials']['headline'])<h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">{{ $content['testimonials']['headline'] }}</h2>@endif
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 1.5rem;">
                @foreach($content['testimonials']['testimonials'] as $t)
                <div style="padding: 1.75rem; background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 1rem; display: flex; flex-direction: column;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <div style="color: var(--lp-accent); font-size: 1rem; letter-spacing: 0.1em;">★★★★★</div>
                        @if(!empty($t['result_badge']))<div style="background: color-mix(in srgb, var(--lp-accent) 15%, transparent); border: 1px solid color-mix(in srgb, var(--lp-accent) 30%, transparent); border-radius: 0.375rem; padding: 0.25rem 0.65rem; font-size: 0.72rem; font-weight: 700; color: var(--lp-accent);">{{ $t['result_badge'] }}</div>@endif
                    </div>
                    <p style="font-size: 0.875rem; color: var(--lp-body); line-height: 1.7; margin-bottom: 1.25rem; font-style: italic; flex: 1;">"{{ $t['quote'] }}"</p>
                    <div>
                        <p style="font-size: 0.85rem; font-weight: 700; color: var(--lp-heading);">{{ $t['name'] }}</p>
                        <p style="font-size: 0.78rem; color: var(--lp-body); margin-top: 0.1rem;">{{ $t['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Why Us --}}
    @if(!empty($content['why_us']['reasons']) || !empty($content['why_us']['stats']))
    <section style="padding: 5rem 1.5rem;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                <div>
                    @if($content['why_us']['headline'])<h2 style="font-size: clamp(1.6rem, 3.5vw, 2.25rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 1.25rem;">{{ $content['why_us']['headline'] }}</h2>@endif
                    @if($content['why_us']['subheadline'])<p style="color: var(--lp-body); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2rem;">{{ $content['why_us']['subheadline'] }}</p>@endif
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($content['why_us']['reasons'] as $r)
                        <div style="display: flex; gap: 0.875rem; align-items: flex-start;">
                            <span class="check" style="margin-top: 0.1rem;"><svg width="10" height="10" fill="none" stroke="var(--lp-accent)" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                            <div>
                                <p style="font-size: 0.875rem; font-weight: 700; color: var(--lp-heading); margin-bottom: 0.2rem;">{{ $r['title'] }}</p>
                                <p style="font-size: 0.8rem; color: var(--lp-body); line-height: 1.6;">{{ $r['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if(!empty($content['why_us']['stats']))
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($content['why_us']['stats'] as $stat)
                    <div class="stat-card" style="padding: 1.5rem;">
                        <div style="font-size: 2.25rem; font-weight: 800; color: var(--lp-accent); letter-spacing: -0.03em; line-height: 1;">{{ $stat['value'] }}</div>
                        <p style="font-size: 0.8rem; color: var(--lp-body); margin-top: 0.35rem;">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Lead Form --}}
    <section id="claim" style="padding: 5rem 1.5rem; background: color-mix(in srgb, var(--lp-accent) 6%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-accent) 15%, transparent);">
        <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: start;">
            <div style="padding-top: 0.5rem;">
                @if($content['form']['headline'])<h2 style="font-size: clamp(1.6rem, 3.5vw, 2.25rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 1rem;">{{ $content['form']['headline'] }}</h2>@endif
                @if($content['form']['subheadline'])<p style="color: var(--lp-body); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2rem;">{{ $content['form']['subheadline'] }}</p>@endif

                @php $checklistItems = array_filter($content['form']['checklist_items'] ?? [], fn($i) => !empty($i['text'])); @endphp
                @if(count($checklistItems) > 0)
                <div style="display: flex; flex-direction: column; gap: 0.875rem; margin-bottom: 2rem;">
                    @foreach($checklistItems as $item)
                    <div style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.875rem; color: var(--lp-body);">
                        <span class="check"><svg width="10" height="10" fill="none" stroke="var(--lp-accent)" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg></span>
                        {{ $item['text'] }}
                    </div>
                    @endforeach
                </div>
                @endif

                @php $trustTags = array_filter($content['form']['trust_tags'] ?? [], fn($t) => !empty($t['text'])); @endphp
                @if(count($trustTags) > 0)
                <div style="padding: 1.25rem; background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 0.75rem;">
                    <p style="font-size: 0.78rem; font-weight: 700; color: var(--lp-body); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.75rem;">Trusted By</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                        @foreach($trustTags as $tag)
                        <span style="font-size: 0.75rem; font-weight: 600; color: var(--lp-body); background: var(--lp-card-bg); padding: 0.25rem 0.65rem; border-radius: 2rem; border: 1px solid var(--lp-card-border);">{{ $tag['text'] }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div>
                @if(session('success'))
                <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); border-radius: 0.75rem; padding: 1.25rem; margin-bottom: 1.5rem; color: #4ade80; font-weight: 600; font-size: 0.9rem;">
                    ✓ {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}"
                      style="background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 1rem; padding: 2rem; display: flex; flex-direction: column; gap: 1rem;">
                    @csrf
                    <input type="hidden" name="subject" value="{{ $content['form']['form_subject'] ?: $landingPage->name . ' — Lead' }}">

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Your Name *</label>
                        <input type="text" name="name" required placeholder="Your name"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Work Email *</label>
                        <input type="email" name="email" required placeholder="you@company.com"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box;">
                    </div>

                    @php $dropdownOptions = array_filter($content['form']['dropdown_options'] ?? [], fn($o) => !empty($o['label'])); @endphp
                    @if(count($dropdownOptions) > 0)
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">{{ $content['form']['dropdown_label'] ?: 'What brings you here?' }}</label>
                        <select name="challenge" class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; box-sizing: border-box; background: var(--lp-bg);">
                            <option value="">Select...</option>
                            @foreach($dropdownOptions as $option)
                            <option value="{{ $option['label'] }}">{{ $option['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--lp-body); margin-bottom: 0.4rem; letter-spacing: 0.04em; text-transform: uppercase;">Tell Us About Your Business</label>
                        <textarea name="message" rows="3" placeholder="What does your business do? What's your goal?"
                                  class="lp-input" style="width: 100%; padding: 0.85rem 1rem; font-size: 0.9rem; resize: none; box-sizing: border-box;"></textarea>
                    </div>

                    <button type="submit"
                            style="width: 100%; padding: 1rem; background: var(--lp-accent); color: var(--lp-accent-text); font-size: 0.95rem; font-weight: 700; border: none; border-radius: 0.5rem; cursor: pointer; opacity: 1; transition: opacity 0.15s;"
                            onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                        {{ $content['nav']['cta_text'] ?: 'Submit' }}
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="display: inline; vertical-align: middle; margin-left: 0.4rem;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                    <p style="text-align: center; font-size: 0.72rem; color: var(--lp-body);">No commitment. We respond within 24 hours.</p>
                </form>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    @if(!empty($content['faq']['faqs']))
    <section style="padding: 5rem 1.5rem; border-top: 1px solid var(--lp-card-border);">
        <div style="max-width: 680px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading);">Questions</h2>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.625rem;">
                @foreach($content['faq']['faqs'] as $i => $faq)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }"
                     style="background: var(--lp-card-bg); border: 1px solid var(--lp-card-border); border-radius: 0.75rem; overflow: hidden;">
                    <button @click="open = !open" type="button"
                            style="width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 1.1rem 1.25rem; background: none; border: none; cursor: pointer; text-align: left; color: var(--lp-heading); font-size: 0.9rem; font-weight: 600;">
                        {{ $faq['question'] }}
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform shrink-0 ml-4" fill="none" stroke="var(--lp-accent)" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-cloak style="padding: 0 1.25rem 1.1rem; font-size: 0.84rem; color: var(--lp-body); line-height: 1.7;">
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
    <section style="padding: 5rem 1.5rem; text-align: center; background: color-mix(in srgb, var(--lp-accent) 8%, transparent); border-top: 1px solid color-mix(in srgb, var(--lp-accent) 15%, transparent);">
        <div style="max-width: 580px; margin: 0 auto;">
            <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--lp-heading); margin-bottom: 1rem;">{{ $content['final_cta']['headline'] }}</h2>
            @if($content['final_cta']['subheadline'])<p style="color: var(--lp-body); font-size: 0.95rem; line-height: 1.75; margin-bottom: 2.5rem;">{{ $content['final_cta']['subheadline'] }}</p>@endif
            <a href="#claim" class="cta-btn" style="font-size: 1rem; padding: 1.1rem 2.5rem;">
                {{ $content['final_cta']['button_text'] ?: 'Get Started' }}
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>
    @endif

    {{-- Footer --}}
    <footer style="border-top: 1px solid var(--lp-card-border); padding: 2rem 1.5rem; text-align: center;">
        <p style="font-size: 0.78rem; color: var(--lp-body);">
            &copy; {{ date('Y') }} Rare Input. All rights reserved. &nbsp;·&nbsp;
            <a href="{{ route('privacy-policy') }}" style="color: var(--lp-body); text-decoration: underline;">Privacy Policy</a> &nbsp;·&nbsp;
            <a href="{{ route('terms') }}" style="color: var(--lp-body); text-decoration: underline;">Terms</a>
        </p>
    </footer>

    @foreach(json_decode(\App\Models\Setting::get('footer_scripts', '[]'), true) ?? [] as $script)
        {!! $script['code'] !!}
    @endforeach
</body>
</html>