@props([
    'title'         => null,
    'description'   => 'Rare Input — Development & Digital Marketing agency helping ambitious brands grow.',
    'canonical'     => null,
    'ogTitle'       => null,
    'ogDescription' => null,
    'ogImage'       => null,
    'noindex'       => false,
])
@php
    $pageTitle    = $title ? $title . ' — Rare Input' : 'Rare Input';
    $ogTitleFinal = $ogTitle ?? $pageTitle;
    $ogDescFinal  = $ogDescription ?? $description;
    $ogImageFinal = $ogImage ?? config('app.url') . '/og-default.jpg';
    $canonicalUrl = $canonical ?? request()->url();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ $canonicalUrl }}">
    <meta property="og:title"       content="{{ $ogTitleFinal }}">
    <meta property="og:description" content="{{ $ogDescFinal }}">
    <meta property="og:image"       content="{{ $ogImageFinal }}">
    <meta property="og:site_name"   content="Rare Input">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $ogTitleFinal }}">
    <meta name="twitter:description" content="{{ $ogDescFinal }}">
    <meta name="twitter:image"       content="{{ $ogImageFinal }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=optional" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=optional"></noscript>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    {!! $head ?? '' !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen" style="background-color: var(--color-bg); color: var(--color-text); font-family: var(--font-sans);">

    {{-- ── Cookie Consent Banner ──────────────────────────── --}}
    @if(\App\Models\Setting::get('cookie_consent_enabled', '1') === '1')
    <div id="cookie-banner" style="display:none; position:fixed; bottom:0; left:0; right:0; z-index:9999; padding:1rem 1.5rem; background-color:var(--color-brand-900); border-top:1px solid rgba(255,255,255,0.08);">
        <div style="max-width:var(--max-width); margin:0 auto; display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:1rem;">
            <p style="font-size:0.85rem; color:var(--color-brand-300); margin:0; max-width:640px;">
                We use cookies to analyse site traffic and improve your experience.
                <a href="{{ route('privacy-policy') }}" style="color:var(--color-accent); text-decoration:underline;">Privacy Policy</a>
            </p>
            <div style="display:flex; gap:0.75rem; flex-shrink:0;">
                <button id="cookie-decline" style="padding:0.5rem 1.25rem; font-size:0.8rem; font-weight:600; border-radius:var(--radius-btn); border:1px solid rgba(255,255,255,0.2); background:transparent; color:var(--color-brand-300); cursor:pointer;">
                    Decline
                </button>
                <button id="cookie-accept" style="padding:0.5rem 1.25rem; font-size:0.8rem; font-weight:600; border-radius:var(--radius-btn); border:none; background:var(--color-accent); color:var(--color-heading); cursor:pointer;">
                    Accept
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- ── Navbar ─────────────────────────────────────────── --}}
    <header class="sticky top-0 z-50 border-b" style="background-color: rgba(255,254,251,0.95); backdrop-filter: blur(12px); border-color: var(--color-border);">
        <div class="mx-auto flex items-center justify-between px-6 py-4" style="max-width: var(--max-width);">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="flex items-center justify-center w-8 h-8 rounded-lg" style="background-color: var(--color-heading);">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="white" opacity="0.9"/>
                        <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="white" opacity="0.45"/>
                    </svg>
                </span>
                <span class="text-lg font-bold tracking-tight" style="color: var(--color-heading); letter-spacing: -0.02em;">Rare Input</span>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>

                {{-- Services dropdown --}}
                <div class="relative" id="services-dropdown">
                    <button id="services-btn" class="nav-link flex items-center gap-1" style="background: none; border: none; cursor: pointer; padding: 0;">
                        Services
                        <svg id="services-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.2s ease;"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div id="services-menu" class="hidden absolute top-full pt-3 z-50" style="min-width: 480px; right: -120px;">
                        <div class="rounded-2xl border shadow-xl p-6" style="background-color: var(--color-bg); border-color: var(--color-border); box-shadow: var(--shadow-lg);">
                            <div class="grid grid-cols-2 gap-6">

                                {{-- Development --}}
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color: var(--color-accent-dark);">Development</p>
                                    <ul class="space-y-1">
                                        @foreach([
                                            ['Shopify', 'services.shopify'],
                                            ['WordPress', 'services.wordpress'],
                                            ['Web Development', 'services.web-development'],
                                            ['App Development', 'services.app-development'],
                                        ] as [$label, $route])
                                        <li>
                                            <a href="{{ route($route) }}" class="flex items-center gap-2 py-1.5 text-sm font-medium transition-colors" style="color: var(--color-text-muted);" onmouseover="this.style.backgroundColor='var(--color-surface)';this.style.color='var(--color-heading)';" onmouseout="this.style.backgroundColor='';this.style.color='var(--color-text-muted)';">{{ $label }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- Marketing --}}
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color: var(--color-accent-dark);">Marketing</p>
                                    <ul class="space-y-1">
                                        @foreach([
                                            ['SEO', 'services.seo'],
                                            ['Performance Marketing', 'services.performance-marketing'],
                                            ['Email Marketing', 'services.email-marketing'],
                                            ['Social Media', 'services.social-media'],
                                        ] as [$label, $route])
                                        <li>
                                            <a href="{{ route($route) }}" class="flex items-center gap-2 py-1.5 text-sm font-medium transition-colors" style="color: var(--color-text-muted);" onmouseover="this.style.backgroundColor='var(--color-surface)';this.style.color='var(--color-heading)';" onmouseout="this.style.backgroundColor='';this.style.color='var(--color-text-muted)';">{{ $label }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
                <a href="{{ route('contact') }}" class="btn-primary" style="padding: 0.55rem 1.25rem; font-size: 0.875rem;">Get in Touch</a>
            </nav>

            {{-- Mobile toggle --}}
            <button id="mobile-menu-btn" class="md:hidden p-1" style="color: var(--color-text); background: none; border: none; cursor: pointer;">
                <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile nav --}}
        <div id="mobile-menu" class="hidden md:hidden border-t px-6 py-5 space-y-4" style="border-color: var(--color-border); background-color: var(--color-bg);">
            <a href="{{ route('home') }}" class="nav-link block text-base">Home</a>
            <a href="{{ route('about') }}" class="nav-link block text-base">About</a>

            {{-- Mobile services accordion --}}
            <div>
                <button id="mobile-services-btn" class="nav-link flex items-center gap-1 text-base w-full" style="background: none; border: none; cursor: pointer; padding: 0;">
                    Services
                    <svg id="mobile-services-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.2s ease;"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mobile-services-menu" class="hidden mt-3 pl-3 border-l space-y-3" style="border-color: var(--color-border);">
                    <p class="text-xs font-bold uppercase tracking-widest" style="color: var(--color-accent-dark);">Development</p>
                    <a href="{{ route('services.shopify') }}" class="nav-link block text-sm">Shopify</a>
                    <a href="{{ route('services.wordpress') }}" class="nav-link block text-sm">WordPress</a>
                    <a href="{{ route('services.web-development') }}" class="nav-link block text-sm">Web Development</a>
                    <a href="{{ route('services.app-development') }}" class="nav-link block text-sm">App Development</a>
                    <p class="text-xs font-bold uppercase tracking-widest pt-1" style="color: var(--color-accent-dark);">Marketing</p>
                    <a href="{{ route('services.seo') }}" class="nav-link block text-sm">SEO</a>
                    <a href="{{ route('services.performance-marketing') }}" class="nav-link block text-sm">Performance Marketing</a>
                    <a href="{{ route('services.email-marketing') }}" class="nav-link block text-sm">Email Marketing</a>
                    <a href="{{ route('services.social-media') }}" class="nav-link block text-sm">Social Media</a>
                </div>
            </div>

            <a href="{{ route('blog.index') }}" class="nav-link block text-base">Blog</a>
            <div class="pt-2">
                <a href="{{ route('contact') }}" class="btn-primary">Get in Touch</a>
            </div>
        </div>
    </header>

    {{-- Flash --}}
    @if (session('success'))
        <div class="text-sm text-center py-3 px-6 font-medium" style="background-color: var(--color-accent-light); color: var(--color-accent-dark); border-bottom: 1px solid var(--color-accent);">
            {{ session('success') }}
        </div>
    @endif

    <main class="flex-1">{{ $slot }}</main>

    {{-- ── Footer ─────────────────────────────────────────── --}}
    <footer style="background-color: var(--color-brand-900); color: var(--color-brand-300);">
        <div class="mx-auto px-6 pt-16 pb-10" style="max-width: var(--max-width);">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-10 mb-12">

                {{-- Brand --}}
                <div class="md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                        <span class="flex items-center justify-center w-16 h-16 rounded-2xl flex-shrink-0" style="background-color: var(--color-accent);">
                            <svg width="32" height="32" viewBox="0 0 16 16" fill="none">
                                <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="white" opacity="0.9"/>
                                <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="white" opacity="0.45"/>
                            </svg>
                        </span>
                        <span class="text-4xl font-bold whitespace-nowrap" style="color: #fff; letter-spacing: -0.03em;">Rare Input</span>
                    </a>
                    <p class="text-sm leading-relaxed" style="color: var(--color-brand-400);">
                        We build and grow digital businesses — from custom development to results-driven marketing.
                    </p>
                </div>

                {{-- Development --}}
                <div class="text-sm">
                    <p class="font-semibold mb-4 text-xs uppercase tracking-widest" style="color: var(--color-brand-500);">Development</p>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('services.shopify') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Shopify</a></li>
                        <li><a href="{{ route('services.wordpress') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">WordPress</a></li>
                        <li><a href="{{ route('services.web-development') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Web Development</a></li>
                        <li><a href="{{ route('services.app-development') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">App Development</a></li>
                    </ul>
                </div>

                {{-- Marketing --}}
                <div class="text-sm">
                    <p class="font-semibold mb-4 text-xs uppercase tracking-widest" style="color: var(--color-brand-500);">Marketing</p>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('services.seo') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">SEO</a></li>
                        <li><a href="{{ route('services.performance-marketing') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Performance Marketing</a></li>
                        <li><a href="{{ route('services.email-marketing') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Email Marketing</a></li>
                        <li><a href="{{ route('services.social-media') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Social Media</a></li>
                    </ul>
                </div>

                {{-- Company --}}
                <div class="text-sm">
                    <p class="font-semibold mb-4 text-xs uppercase tracking-widest" style="color: var(--color-brand-500);">Company</p>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('about') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">About</a></li>
                        <li><a href="{{ route('blog.index') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Contact</a></li>
                        <li><a href="{{ route('careers') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Careers</a></li>
                    </ul>
                </div>

                {{-- Information --}}
                <div class="text-sm">
                    <p class="font-semibold mb-4 text-xs uppercase tracking-widest" style="color: var(--color-brand-500);">Information</p>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Help Center</a></li>
                        <li><a href="{{ route('faq') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">FAQ</a></li>
                        <li><a href="{{ route('terms') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t flex flex-col sm:flex-row justify-between items-center gap-4 text-xs" style="border-color: var(--color-brand-800); color: var(--color-brand-500);">
                <span>&copy; {{ date('Y') }} Rare Input. All rights reserved.</span>

                {{-- Social icons --}}
                <div class="flex items-center gap-4">
                    <a href="https://linkedin.com/company/rareinput/" aria-label="LinkedIn" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/rareinput" aria-label="Facebook" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://x.com/rareinput" aria-label="Twitter / X" class="transition-colors hover:text-white" style="color: var(--color-brand-400);">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>

                <span>Built with ❤️ for ambitious brands.</span>
            </div>
        </div>
    </footer>

    @foreach(json_decode(\App\Models\Setting::get('footer_scripts', '[]'), true) ?? [] as $script)
        {!! $script['code'] !!}
    @endforeach

    @php
        $headScriptsJson = json_encode(
            array_map(fn($s) => $s['code'], json_decode(\App\Models\Setting::get('head_scripts', '[]'), true) ?? [])
        );
        $cookieConsentEnabled = \App\Models\Setting::get('cookie_consent_enabled', '1') === '1';
    @endphp
    <script>
        // ── Cookie Consent ───────────────────────────────────
        (function () {
            var CONSENT_KEY = 'ri_cookie_consent';
            var EXPIRY_DAYS = 180;

            var EU_TIMEZONES = [
                'Europe/Amsterdam','Europe/Andorra','Europe/Athens','Europe/Belgrade',
                'Europe/Berlin','Europe/Bratislava','Europe/Brussels','Europe/Bucharest',
                'Europe/Budapest','Europe/Busingen','Europe/Chisinau','Europe/Copenhagen',
                'Europe/Dublin','Europe/Gibraltar','Europe/Guernsey','Europe/Helsinki',
                'Europe/Isle_of_Man','Europe/Istanbul','Europe/Jersey','Europe/Kaliningrad',
                'Europe/Kiev','Europe/Kyiv','Europe/Lisbon','Europe/Ljubljana','Europe/London',
                'Europe/Luxembourg','Europe/Madrid','Europe/Malta','Europe/Mariehamn',
                'Europe/Minsk','Europe/Monaco','Europe/Moscow','Europe/Nicosia','Europe/Oslo',
                'Europe/Paris','Europe/Podgorica','Europe/Prague','Europe/Riga','Europe/Rome',
                'Europe/Samara','Europe/San_Marino','Europe/Sarajevo','Europe/Saratov',
                'Europe/Simferopol','Europe/Skopje','Europe/Sofia','Europe/Stockholm',
                'Europe/Tallinn','Europe/Tirane','Europe/Ulyanovsk','Europe/Uzhgorod',
                'Europe/Vaduz','Europe/Vatican','Europe/Vienna','Europe/Vilnius',
                'Europe/Volgograd','Europe/Warsaw','Europe/Zagreb','Europe/Zaporozhye',
                'Europe/Zurich','Atlantic/Reykjavik','Atlantic/Faroe'
            ];

            var CA_TIMEZONES = ['America/Los_Angeles','America/Vancouver','America/Tijuana'];

            function getConsent() {
                try {
                    var item = localStorage.getItem(CONSENT_KEY);
                    if (!item) { return null; }
                    var data = JSON.parse(item);
                    if (Date.now() > data.expires) { localStorage.removeItem(CONSENT_KEY); return null; }
                    return data.value;
                } catch (e) { return null; }
            }

            function setConsent(value) {
                try {
                    localStorage.setItem(CONSENT_KEY, JSON.stringify({
                        value: value,
                        expires: Date.now() + EXPIRY_DAYS * 86400000
                    }));
                } catch (e) {}
            }

            function loadAnalytics() {
                var scripts = {!! $headScriptsJson !!};
                scripts.forEach(function (html) {
                    var tmp = document.createElement('div');
                    tmp.innerHTML = html;
                    tmp.querySelectorAll('script').forEach(function (s) {
                        var el = document.createElement('script');
                        if (s.src) { el.src = s.src; el.async = true; }
                        else { el.textContent = s.textContent; }
                        document.head.appendChild(el);
                    });
                });
            }

            function needsConsent() {
                try {
                    var tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    return EU_TIMEZONES.indexOf(tz) !== -1 || CA_TIMEZONES.indexOf(tz) !== -1;
                } catch (e) { return true; }
            }

            function hideBanner() {
                var b = document.getElementById('cookie-banner');
                if (b) { b.style.display = 'none'; }
            }

            var consentEnabled = {{ $cookieConsentEnabled ? 'true' : 'false' }};
            var consent = getConsent();

            if (!consentEnabled) {
                loadAnalytics();
            } else if (consent === 'accepted') {
                loadAnalytics();
            } else if (consent === 'declined') {
                // GA stays blocked
            } else if (!needsConsent()) {
                setConsent('accepted');
                loadAnalytics();
            } else {
                document.addEventListener('DOMContentLoaded', function () {
                    var banner = document.getElementById('cookie-banner');
                    if (banner) { banner.style.display = 'block'; }

                    document.getElementById('cookie-accept').addEventListener('click', function () {
                        setConsent('accepted');
                        hideBanner();
                        loadAnalytics();
                    });

                    document.getElementById('cookie-decline').addEventListener('click', function () {
                        setConsent('declined');
                        hideBanner();
                    });
                });
            }
        })();
    </script>
    <script>
        // Mobile hamburger
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        btn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Services dropdown (hover)
        const servicesDropdown = document.getElementById('services-dropdown');
        const servicesMenu = document.getElementById('services-menu');
        const servicesChevron = document.getElementById('services-chevron');

        servicesDropdown.addEventListener('mouseenter', function () {
            servicesMenu.classList.remove('hidden');
            servicesChevron.style.transform = 'rotate(180deg)';
        });

        servicesDropdown.addEventListener('mouseleave', function () {
            servicesMenu.classList.add('hidden');
            servicesChevron.style.transform = '';
        });

        // Mobile services accordion
        const mobileServicesBtn = document.getElementById('mobile-services-btn');
        const mobileServicesMenu = document.getElementById('mobile-services-menu');
        const mobileServicesChevron = document.getElementById('mobile-services-chevron');
        mobileServicesBtn.addEventListener('click', function () {
            const isOpen = !mobileServicesMenu.classList.contains('hidden');
            mobileServicesMenu.classList.toggle('hidden');
            mobileServicesChevron.style.transform = isOpen ? '' : 'rotate(180deg)';
        });
    </script>
</body>
</html>
