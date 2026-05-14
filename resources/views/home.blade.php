<x-layouts.public
    title="Digital Agency — Development & Marketing"
    description="Rare Input is a full-service digital agency helping ambitious brands grow through custom web development, Shopify, SEO, performance marketing, and email marketing."
    :canonical="route('home')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Organization',
    'name'           => 'Rare Input',
    'url'            => route('home'),
    'logo'           => config('app.url') . '/favicon.svg',
    'description'    => 'Full-service digital agency — web development, Shopify, SEO, performance marketing and email marketing.',
    'contactPoint'   => [
        "\x40type"       => 'ContactPoint',
        'contactType'    => 'customer support',
        'url'            => route('contact'),
    ],
    'sameAs' => [
        'https://linkedin.com/company/rareinput/',
        'https://www.facebook.com/rareinput',
        'https://x.com/rareinput',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
</x-slot>

{{-- ── Hero ──────────────────────────────────────────────────── --}}
<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left — copy --}}
            <div>
                <span class="section-label">Development &amp; Digital Marketing</span>
                <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                    We Build &amp; Grow<br>
                    <span style="color: var(--color-accent-dark);">Digital Businesses</span>
                </h1>
                <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 520px;">
                    From Shopify stores to full-stack web apps, and from SEO to paid campaigns — Rare Input helps ambitious brands ship fast and scale smart.
                </p>

                {{-- Results bar --}}
                <div class="flex flex-wrap gap-8 mb-10">
                    @foreach([
                        ['50+', 'Brands Scaled'],
                        ['210%', 'Avg. Organic Growth'],
                        ['3.9x', 'Avg. ROAS'],
                    ] as [$stat, $label])
                    <div>
                        <div class="font-extrabold" style="font-size: 1.5rem; letter-spacing: -0.03em; color: var(--color-heading);">{{ $stat }}</div>
                        <div class="text-xs font-medium mt-0.5" style="color: var(--color-text-muted);">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap gap-4 items-center">
                    <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                        Free Consultation
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#services" class="btn-secondary text-base" style="padding: 0.875rem 2.25rem;">
                        See Our Services
                    </a>
                </div>

                {{-- Trust signals --}}
                <div class="flex flex-wrap items-center gap-6 mt-8">
                    <span class="text-xs font-medium" style="color: var(--color-text-muted);">✓ No lock-in contracts</span>
                    <span class="text-xs font-medium" style="color: var(--color-text-muted);">✓ Response within 24 hours</span>
                    <span class="text-xs font-medium" style="color: var(--color-text-muted);">✓ No-commitment initial call</span>
                </div>

            </div>

            {{-- Right — fading dashboard carousel --}}
            <div class="flex items-center justify-center lg:justify-center mt-10 lg:mt-0">
                <div class="relative hero-card-wrap" style="width: 420px; height: 480px;">

                    {{-- Slide 1: Campaign Performance --}}
                    <div class="hero-slide absolute rounded-2xl p-7" style="inset: 0; background: #fff; box-shadow: 0 24px 64px rgba(30,26,23,0.13); border: 1px solid var(--color-border); opacity: 1; transition: opacity 0.7s ease;">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-widest mb-1" style="color: var(--color-text-muted);">Campaign Performance</div>
                                <div class="font-extrabold" style="font-size: 1.6rem; color: var(--color-heading); letter-spacing: -0.03em;">$48,200 <span class="text-sm font-semibold" style="color: #16a34a;">↑ 38%</span></div>
                                <div class="text-xs mt-0.5" style="color: var(--color-text-muted);">Revenue this month</div>
                            </div>
                            <div class="rounded-xl flex items-center justify-center shrink-0" style="width: 44px; height: 44px; background: var(--color-accent-light);">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="var(--color-accent-dark)"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                            </div>
                        </div>
                        <div id="hero-bar-chart" class="flex items-end gap-1.5 mb-2" style="height: 88px;"></div>
                        <div id="hero-bar-labels" class="flex justify-between text-xs mb-6" style="color: var(--color-text-light);"></div>
                        <div class="flex flex-col gap-2.5">
                            @foreach([['ROAS','3.9x','+1.2x'],['Organic Traffic','210%','+68%'],['Cost per Lead','$12.40','-22%']] as [$m,$v,$c])
                            <div class="flex items-center justify-between rounded-xl px-4 py-3" style="background: var(--color-surface);">
                                <span class="text-xs font-medium" style="color: var(--color-text-muted);">{{ $m }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-sm" style="color: var(--color-heading);">{{ $v }}</span>
                                    <span class="text-xs font-semibold" style="color: #16a34a;">{{ $c }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Slide 2: SEO Growth --}}
                    <div class="hero-slide absolute rounded-2xl p-7" style="inset: 0; background: #fff; box-shadow: 0 24px 64px rgba(30,26,23,0.13); border: 1px solid var(--color-border); opacity: 0; transition: opacity 0.7s ease;">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-widest mb-1" style="color: var(--color-text-muted);">SEO Growth</div>
                                <div class="font-extrabold" style="font-size: 1.6rem; color: var(--color-heading); letter-spacing: -0.03em;">124K <span class="text-sm font-semibold" style="color: #16a34a;">↑ 210%</span></div>
                                <div class="text-xs mt-0.5" style="color: var(--color-text-muted);">Monthly organic sessions</div>
                            </div>
                            <div class="rounded-xl flex items-center justify-center shrink-0" style="width: 44px; height: 44px; background: #f0fdf4;">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0015.803 15.803z"/></svg>
                            </div>
                        </div>
                        <div id="seo-line-chart" class="relative mb-2" style="height: 88px;"></div>
                        <div id="seo-line-labels" class="flex justify-between text-xs mb-6" style="color: var(--color-text-light);"></div>
                        <div class="flex flex-col gap-2.5">
                            @foreach([['Keywords Ranked','1,840','+430'],['Avg. Position','4.2','↑ 8.1'],['Backlinks','3.2K','+610']] as [$m,$v,$c])
                            <div class="flex items-center justify-between rounded-xl px-4 py-3" style="background: var(--color-surface);">
                                <span class="text-xs font-medium" style="color: var(--color-text-muted);">{{ $m }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-sm" style="color: var(--color-heading);">{{ $v }}</span>
                                    <span class="text-xs font-semibold" style="color: #16a34a;">{{ $c }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Slide 3: Shopify Store --}}
                    <div class="hero-slide absolute rounded-2xl p-7" style="inset: 0; background: #fff; box-shadow: 0 24px 64px rgba(30,26,23,0.13); border: 1px solid var(--color-border); opacity: 0; transition: opacity 0.7s ease;">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-widest mb-1" style="color: var(--color-text-muted);">Shopify Store</div>
                                <div class="font-extrabold" style="font-size: 1.6rem; color: var(--color-heading); letter-spacing: -0.03em;">$3.2M <span class="text-sm font-semibold" style="color: #16a34a;">↑ 94%</span></div>
                                <div class="text-xs mt-0.5" style="color: var(--color-text-muted);">Annual GMV</div>
                            </div>
                            <div class="rounded-xl flex items-center justify-center shrink-0" style="width: 44px; height: 44px; background: #f0fdf4;">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#96BF48"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mb-3">
                            @foreach([
                                ['New order #4821','2 min ago','$240'],
                                ['New order #4820','14 min ago','$89'],
                                ['New order #4819','31 min ago','$530'],
                            ] as [$label,$time,$amt])
                            <div class="flex items-center justify-between rounded-xl px-4 py-3" style="background: var(--color-surface);">
                                <div class="flex items-center gap-2.5">
                                    <div class="rounded-full shrink-0" style="width: 7px; height: 7px; background: #4ade80;"></div>
                                    <div>
                                        <div class="text-xs font-semibold" style="color: var(--color-heading);">{{ $label }}</div>
                                        <div class="text-xs" style="color: var(--color-text-light);">{{ $time }}</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold" style="color: var(--color-heading);">{{ $amt }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col gap-2.5">
                            @foreach([['Conversion Rate','4.8%','+1.9%'],['Avg. Order Value','$218','+$42']] as [$m,$v,$c])
                            <div class="flex items-center justify-between rounded-xl px-4 py-3" style="background: var(--color-surface);">
                                <span class="text-xs font-medium" style="color: var(--color-text-muted);">{{ $m }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-sm" style="color: var(--color-heading);">{{ $v }}</span>
                                    <span class="text-xs font-semibold" style="color: #16a34a;">{{ $c }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>

            <script>
            (function () {
                // Build bar chart with current month highlighted
                var allHeights = [35, 50, 42, 65, 55, 80, 70, 88, 75, 95, 85, 92];
                var allMonths  = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                var curMonth   = new Date().getMonth(); // 0-indexed

                // Build rolling 12-month window ending on current month
                var barMonths = [], barHeights = [];
                for (var i = 11; i >= 0; i--) {
                    var mi = (curMonth - i + 12) % 12;
                    barMonths.push(allMonths[mi]);
                    barHeights.push(allHeights[mi]);
                }

                var chart  = document.getElementById('hero-bar-chart');
                var labels = document.getElementById('hero-bar-labels');

                barHeights.forEach(function (h, i) {
                    var bar = document.createElement('div');
                    var isLast = i === 11;
                    bar.style.cssText = 'flex: 1; border-radius: 3px; height: ' + h + '%; background: ' + (isLast ? 'var(--color-accent)' : 'var(--color-brand-200)') + ';';
                    chart.appendChild(bar);
                });

                // X-axis: show 1st, 4th, 8th, and last (current) labels
                [0, 3, 7, 11].forEach(function (i) {
                    var span = document.createElement('span');
                    span.textContent = barMonths[i];
                    span.style.cssText = i === 11 ? 'color: var(--color-accent); font-weight: 700;' : '';
                    labels.appendChild(span);
                });

                // SEO line chart — rolling 12-month window
                var seoYValues = [70, 65, 60, 54, 48, 40, 32, 24, 17, 11, 6, 3]; // y positions top-to-bottom (lower = higher on chart)
                var seoMonths  = [];
                var seoYOrdered = [];
                for (var j = 11; j >= 0; j--) {
                    seoMonths.push(allMonths[(curMonth - j + 12) % 12]);
                    seoYOrdered.push(seoYValues[11 - j]);
                }

                var W = 300, H = 80;
                var pts = seoYOrdered.map(function(y, i) {
                    return [Math.round(i * W / 11), y];
                });

                // Build smooth SVG path through points
                function svgPath(points) {
                    var d = 'M' + points[0][0] + ',' + points[0][1];
                    for (var k = 1; k < points.length; k++) {
                        var cp1x = points[k-1][0] + (points[k][0] - points[k-1][0]) / 2;
                        var cp1y = points[k-1][1];
                        var cp2x = points[k-1][0] + (points[k][0] - points[k-1][0]) / 2;
                        var cp2y = points[k][1];
                        d += ' C' + cp1x + ',' + cp1y + ' ' + cp2x + ',' + cp2y + ' ' + points[k][0] + ',' + points[k][1];
                    }
                    return d;
                }

                var linePath = svgPath(pts);
                var lastPt   = pts[pts.length - 1];
                var fillPath = linePath + ' L' + lastPt[0] + ',' + H + ' L0,' + H + ' Z';

                var seoContainer = document.getElementById('seo-line-chart');
                seoContainer.innerHTML = '<svg viewBox="0 0 ' + W + ' ' + H + '" style="width:100%;height:100%;" preserveAspectRatio="none">'
                    + '<defs><linearGradient id="seoGrad2" x1="0" y1="0" x2="0" y2="1">'
                    + '<stop offset="0%" stop-color="#16a34a" stop-opacity="0.18"/>'
                    + '<stop offset="100%" stop-color="#16a34a" stop-opacity="0"/>'
                    + '</linearGradient></defs>'
                    + '<path d="' + fillPath + '" fill="url(#seoGrad2)"/>'
                    + '<path d="' + linePath + '" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>'
                    + '<circle cx="' + lastPt[0] + '" cy="' + lastPt[1] + '" r="4" fill="#16a34a"/>'
                    + '</svg>';

                // SEO x-axis labels
                var seoLabelContainer = document.getElementById('seo-line-labels');
                [0, 3, 7, 11].forEach(function(i) {
                    var span = document.createElement('span');
                    span.textContent = seoMonths[i];
                    span.style.cssText = i === 11 ? 'color: #16a34a; font-weight: 700;' : '';
                    seoLabelContainer.appendChild(span);
                });

                // Slide fade logic
                var slides = document.querySelectorAll('.hero-slide');
                var current = 0;

                function goTo(n) {
                    slides[current].style.opacity = '0';
                    slides[current].style.zIndex  = '1';
                    current = n;
                    slides[current].style.opacity = '1';
                    slides[current].style.zIndex  = '2';
                }

                setInterval(function () {
                    goTo((current + 1) % slides.length);
                }, 5000);
            })();
            </script>

        </div>
    </div>
</section>

{{-- ── Social Proof Strip ────────────────────────────────────── --}}
<section class="px-6 py-16 border-b" style="background-color: var(--color-brand-900); border-color: rgba(255,255,255,0.06);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex flex-wrap items-center justify-center gap-12" id="stats-strip">
            @foreach([
                ['50', '+', '', 'Brands Scaled'],
                ['3.9', '', 'x', 'Avg. ROAS Delivered'],
                ['210', '', '%', 'Avg. Organic Growth'],
                ['24', '', 'h', 'Response Guarantee'],
            ] as [$num, $prefix, $suffix, $label])
            <div class="flex items-center gap-3">
                <span class="stat-num font-extrabold" data-target="{{ $num }}" data-prefix="{{ $prefix }}" data-suffix="{{ $suffix }}" style="font-size: 1.6rem; color: #fff; letter-spacing: -0.03em;">{{ $prefix }}{{ $num }}{{ $suffix }}</span>
                <span class="text-sm font-medium" style="color: var(--color-brand-400);">{{ $label }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
(function () {
    var strip = document.getElementById('stats-strip');
    var animated = false;
    function animateStats() {
        if (animated) { return; }
        animated = true;
        strip.querySelectorAll('.stat-num').forEach(function (el) {
            var target = parseFloat(el.dataset.target);
            var prefix = el.dataset.prefix || '';
            var suffix = el.dataset.suffix || '';
            var isDecimal = target % 1 !== 0;
            var start = 0;
            var duration = 1400;
            var startTime = null;
            function step(ts) {
                if (!startTime) { startTime = ts; }
                var progress = Math.min((ts - startTime) / duration, 1);
                var ease = 1 - Math.pow(1 - progress, 3);
                var val = start + (target - start) * ease;
                el.textContent = prefix + (isDecimal ? val.toFixed(1) : Math.round(val)) + suffix;
                if (progress < 1) { requestAnimationFrame(step); }
            }
            requestAnimationFrame(step);
        });
    }
    var observer = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) { animateStats(); }
    }, { threshold: 0.5 });
    observer.observe(strip);
})();
</script>

{{-- ── Why Rare Input ───────────────────────────────────────── --}}
<section class="px-6 py-20 border-t" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-14">
            <span class="section-label">Why Us</span>
            <h2 class="font-extrabold mb-3" style="font-size: clamp(1.75rem, 3vw, 2.25rem); letter-spacing: -0.03em; color: var(--color-heading);">Why Rare Input?</h2>
            <p class="mx-auto text-sm leading-relaxed" style="color: var(--color-text-muted); max-width: 420px;">Most agencies specialise in one thing. We do the full stack — and we tie every decision back to your growth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                [
                    'icon' => '<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>',
                    'title' => 'One Team, Full Stack',
                    'desc'  => 'Development, SEO, paid ads, and email — handled by one team with shared context. No handoff gaps, no "that\'s not our department".',
                    'tags'  => ['Dev + Marketing', 'Unified Strategy', 'Single Point of Contact'],
                ],
                [
                    'icon' => '<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                    'title' => 'No Lock-In Contracts',
                    'desc'  => 'Month-to-month retainers and milestone-based project payments. You stay because the work delivers — not because you\'re contractually stuck.',
                    'tags'  => ['Month-to-Month', 'Transparent Pricing', 'No Hidden Fees'],
                ],
                [
                    'icon' => '<svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>',
                    'title' => 'Outcome-Focused',
                    'desc'  => 'We measure success the same way you do — revenue, traffic, conversions. Every recommendation is backed by data, not agency vanity metrics.',
                    'tags'  => ['ROI-First', 'Data-Driven', 'Clear Reporting'],
                ],
            ] as $item)
            <div class="card p-8">
                <div class="flex items-center justify-center rounded-xl mb-5" style="width: 48px; height: 48px; background: var(--color-accent-light); color: var(--color-accent-dark);">
                    {!! $item['icon'] !!}
                </div>
                <h3 class="font-bold mb-2" style="font-size: 1.05rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $item['title'] }}</h3>
                <p class="text-sm leading-relaxed mb-5" style="color: var(--color-text-muted);">{{ $item['desc'] }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($item['tags'] as $tag)
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full" style="background: var(--color-surface-2); color: var(--color-text-muted);">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Industries We Serve ──────────────────────────────────── --}}
<section class="px-6 py-20 border-t border-b" style="background-color: var(--color-bg); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <div>
                <span class="section-label">Who We Work With</span>
                <h2 class="font-extrabold mt-2 mb-4" style="font-size: clamp(1.75rem, 3vw, 2.25rem); letter-spacing: -0.03em; color: var(--color-heading);">Built for Ambitious<br>Brands Across Industries</h2>
                <p class="leading-relaxed" style="font-size: 1rem; color: var(--color-text-muted); max-width: 420px;">Whether you're launching, scaling, or rebuilding — we've worked with businesses like yours and know what it takes to grow in your market.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                @foreach([
                    ['D2C & E-commerce', '#'],
                    ['SaaS & Tech', '#'],
                    ['Fashion & Apparel', '#'],
                    ['Health & Wellness', '#'],
                    ['Food & Beverage', '#'],
                    ['Education & EdTech', '#'],
                    ['Professional Services', '#'],
                    ['Real Estate', '#'],
                    ['Beauty & Personal Care', '#'],
                    ['Retail & Consumer Goods', '#'],
                    ['Hospitality & Travel', '#'],
                    ['Media & Publishing', '#'],
                ] as [$industry, $link])
                <span class="inline-flex items-center text-sm font-semibold px-4 py-2 rounded-full border transition-colors duration-200"
                      style="background: var(--color-bg); border-color: var(--color-border-strong); color: var(--color-text-muted);">
                    {{ $industry }}
                </span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Services Accordion ────────────────────────────────── --}}
<section id="services" class="px-6 py-24 border-t" style="background-color: var(--color-brand-900); border-color: rgba(255,255,255,0.06);">
    <div class="mx-auto" style="max-width: var(--max-width);">

        <div class="text-center mb-16">
            <span class="section-label" style="color: var(--color-accent);">What We Specialise In</span>
            <h2 class="font-extrabold text-white" style="font-size: 2.25rem; letter-spacing: -0.03em;">Our Core Services</h2>
        </div>

        <div id="services-accordion" class="flex flex-col gap-3" onmouseleave="closeAllAccordions()">
            @php
            $accordionServices = [
                [
                    'num'   => '01',
                    'title' => 'Shopify & E-commerce',
                    'desc'  => 'We build Shopify stores that convert — custom themes, full-stack builds, app integrations, and ongoing optimisation. From launch to scale.',
                    'tags'  => ['Custom Themes', 'Shopify Plus', 'App Integration', 'Conversion Optimisation'],
                    'route' => 'services.shopify',
                ],
                [
                    'num'   => '02',
                    'title' => 'Web & App Development',
                    'desc'  => 'Custom websites, web apps, portals, and mobile apps built on Laravel, Next.js, and React Native. We design for performance and built to scale.',
                    'tags'  => ['Laravel', 'Next.js', 'React Native', 'API Development'],
                    'route' => 'services.web-development',
                ],
                [
                    'num'   => '03',
                    'title' => 'SEO & Organic Growth',
                    'desc'  => 'Technical SEO, content strategy, and link building that compounds over time. We help you rank, get found, and bring in qualified traffic.',
                    'tags'  => ['Technical SEO', 'Content Strategy', 'Link Building', 'Local SEO'],
                    'route' => 'services.seo',
                ],
                [
                    'num'   => '04',
                    'title' => 'Performance Marketing',
                    'desc'  => 'ROI-first paid campaigns across Google and Meta. Every dollar tracked, every decision backed by data. We optimise for revenue, not just clicks.',
                    'tags'  => ['Google Ads', 'Meta Ads', 'Retargeting', 'A/B Testing'],
                    'route' => 'services.performance-marketing',
                ],
                [
                    'num'   => '05',
                    'title' => 'Email & Social Media',
                    'desc'  => 'Automated email flows that nurture and convert, paired with social strategies that build audiences and drive engagement across every channel.',
                    'tags'  => ['Email Automation', 'Klaviyo', 'Instagram', 'Content Creation'],
                    'route' => 'services.email-marketing',
                ],
            ];
            @endphp

            @foreach($accordionServices as $i => $service)
            <div class="accordion-item rounded-2xl overflow-hidden transition-all duration-300"
                 style="background-color: rgba(255,255,255,0.07);"
                 onmouseenter="openAccordion({{ $i }})">
                <div class="accordion-header flex items-center justify-between px-8 py-6 cursor-pointer select-none">
                    <div class="flex items-center gap-6">
                        <span class="text-xs font-bold tabular-nums" style="color: rgba(255,255,255,0.4);">{{ $service['num'] }}.</span>
                        <span class="accordion-title font-extrabold text-white transition-colors duration-300" style="font-size: clamp(1.25rem, 2.5vw, 1.6rem); letter-spacing: -0.02em;">{{ $service['title'] }}</span>
                    </div>
                </div>
                <div class="accordion-body overflow-hidden transition-all duration-700" style="max-height: 0;">
                    <div class="px-8 pb-8">
                        <p class="leading-relaxed mb-6" style="font-size: 1rem; color: rgba(255,255,255,0.65);">{{ $service['desc'] }}</p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($service['tags'] as $tag)
                            <span class="text-xs font-semibold px-3 py-1.5 rounded-full" style="background-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.7); border: 1px solid rgba(255,255,255,0.12);">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="{{ route($service['route']) }}" class="inline-flex items-center text-sm font-semibold tracking-wide uppercase" style="padding: 0.6rem 1.5rem; border: 1.5px solid rgba(255,255,255,0.6); border-radius: var(--radius-btn); color: #fff; letter-spacing: 0.06em;">
                                Learn More
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-sm font-semibold" style="padding: 0.6rem 1.5rem; border-radius: var(--radius-btn); background: #fff; color: var(--color-accent-dark);">
                                Book a Free Call
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Service CTA Banner ───────────────────────────────────── --}}
<div class="px-6 py-5 border-t border-b" style="background-color: var(--color-surface-2); border-color: var(--color-border);">
    <div class="mx-auto flex items-center justify-between gap-6" style="max-width: var(--max-width);">
        <p class="font-semibold" style="font-size: clamp(0.95rem, 1.5vw, 1.05rem); color: var(--color-heading);">Ready to build something that actually grows your business?</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 font-semibold text-sm whitespace-nowrap shrink-0" style="padding: 0.75rem 1.75rem; border-radius: var(--radius-btn); background: var(--color-accent-dark); color: #fff;">
            Start The Journey
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10"/></svg>
        </a>
    </div>
</div>

<script>
    function openAccordion(index) {
        const items = document.querySelectorAll('#services-accordion .accordion-item');
        items.forEach(function(item, i) {
            const body = item.querySelector('.accordion-body');
            const title = item.querySelector('.accordion-title');
            if (i === index) {
                body.style.maxHeight = body.scrollHeight + 'px';
                item.style.backgroundColor = 'var(--color-accent-dark)';
                title.style.color = '#fff';
            } else {
                body.style.maxHeight = '0';
                item.style.backgroundColor = 'rgba(255,255,255,0.07)';
                title.style.color = '#fff';
            }
        });
    }
    function closeAllAccordions() {
        const items = document.querySelectorAll('#services-accordion .accordion-item');
        items.forEach(function(item) {
            item.querySelector('.accordion-body').style.maxHeight = '0';
            item.style.backgroundColor = 'rgba(255,255,255,0.07)';
        });
    }
</script>

{{-- ── How We Work ─────────────────────────────────────────── --}}
<section class="px-6 py-24" style="background-color: var(--color-bg);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-16">
            <span class="section-label">Our Process</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2.25rem; letter-spacing: -0.03em; color: var(--color-heading);">How We Work</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 1rem; color: var(--color-text-muted); max-width: 460px;">A clear, repeatable process that keeps you informed and in control at every stage.</p>
        </div>

        {{-- Connector line sits behind the circles row --}}
        <div class="relative">
            <div class="hidden lg:block absolute h-px top-6" style="left: 10%; right: 10%; background: var(--color-border-strong); z-index: 0;"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach([
                    ['01', 'Discovery', 'We start by understanding your business, goals, and competitive landscape — not with a pitch deck.'],
                    ['02', 'Strategy', 'We map out a clear plan: what to build, what to prioritise, and how to measure success.'],
                    ['03', 'Build', 'Design and development in focused sprints with regular check-ins so nothing is a surprise.'],
                    ['04', 'Launch', 'Thorough QA, performance checks, and a smooth handover. We stay available post-launch.'],
                    ['05', 'Grow', 'Ongoing optimisation — SEO, campaigns, and conversion improvements that compound over time.'],
                ] as [$num, $title, $desc])
                <div class="relative flex flex-col items-center text-center" style="z-index: 1;">
                    <div class="flex items-center justify-center rounded-full font-extrabold mb-5 shrink-0" style="width: 48px; height: 48px; background: var(--color-accent-light); color: var(--color-accent-dark); font-size: 0.8rem; border: 2px solid var(--color-accent);">{{ $num }}</div>
                    <h3 class="font-bold mb-2" style="font-size: 1rem; color: var(--color-heading);">{{ $title }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Tools / Tech Stack ────────────────────────────────────── --}}
<section class="px-6 py-24" style="background-color: var(--color-brand-950);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            {{-- Left --}}
            <div>
                <span class="section-label" style="color: var(--color-accent);">Our Tech Stack</span>
                <h2 class="font-extrabold text-white mt-2 mb-6" style="font-size: clamp(1.75rem, 3vw, 2.5rem); letter-spacing: -0.03em; line-height: 1.2;">
                    Building With<br>
                    <span style="color: var(--color-accent);">The Right Tools</span>
                </h2>
                <p class="text-sm leading-relaxed" style="color: var(--color-brand-400); max-width: 420px;">
                    At Rare Input, every tool we use is carefully chosen for the job. From storefronts to full-stack apps, from paid campaigns to email automation — we pick what works best for your business, not what's easiest for us.
                </p>
            </div>

            {{-- Right — 3D carousel --}}
            <div class="relative flex items-center justify-center" style="height: 340px;">
                @php
                $tools = [
                    ['name' => 'Shopify',      'bg' => '#ffffff'],
                    ['name' => 'WordPress',    'bg' => '#21759B'],
                    ['name' => 'Laravel',      'bg' => '#ffffff'],
                    ['name' => 'Next.js',      'bg' => '#111111'],
                    ['name' => 'Google Ads',   'bg' => '#ffffff'],
                    ['name' => 'Meta Ads',     'bg' => '#111111'],
                    ['name' => 'Figma',        'bg' => '#ffffff'],
                    ['name' => 'React',        'bg' => '#20232A'],
                    ['name' => 'Tailwind CSS', 'bg' => '#ffffff'],
                    ['name' => 'Klaviyo',      'bg' => '#1C1C1C'],
                ];
                $toolsJson = json_encode($tools, JSON_HEX_TAG);
                @endphp

                {{-- Scene with perspective --}}
                <div id="tools-3d" style="position: relative; width: 100%; height: 100%; perspective: 900px; perspective-origin: 50% 50%;" class="tools-3d-wrap">
                    {{-- 3D stage preserving transforms --}}
                    <div id="tools-stage" style="position: absolute; inset: 0; transform-style: preserve-3d; display: flex; align-items: center; justify-content: center;">

                        {{-- Left card --}}
                        <div id="tool-left" class="absolute flex items-center justify-center rounded-2xl select-none"
                             style="width: 290px; height: 290px;
                                    transform: translateX(-210px) translateZ(-120px) rotateY(42deg);
                                    opacity: 0.7;
                                    transition: all 0.6s cubic-bezier(0.4,0,0.2,1);
                                    z-index: 1;
                                    filter: brightness(0.75);"></div>

                        {{-- Center card --}}
                        <div id="tool-center" class="absolute flex items-center justify-center rounded-2xl select-none"
                             style="width: 290px; height: 290px;
                                    transform: translateX(0) translateZ(0) rotateY(0deg);
                                    opacity: 1;
                                    transition: all 0.6s cubic-bezier(0.4,0,0.2,1);
                                    z-index: 3;
                                    box-shadow: 0 25px 70px rgba(0,0,0,0.7), 0 0 0 1px rgba(255,255,255,0.08);"></div>

                        {{-- Right card --}}
                        <div id="tool-right" class="absolute flex items-center justify-center rounded-2xl select-none"
                             style="width: 290px; height: 290px;
                                    transform: translateX(210px) translateZ(-120px) rotateY(-42deg);
                                    opacity: 0.7;
                                    transition: all 0.6s cubic-bezier(0.4,0,0.2,1);
                                    z-index: 1;
                                    filter: brightness(0.75);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 1023px) {
        .tools-3d-wrap { transform: scale(0.7); transform-origin: center center; }
    }
    @media (max-width: 639px) {
        .tools-3d-wrap { transform: scale(0.6); transform-origin: center center; }
        .hero-card-wrap { transform: scale(0.78); transform-origin: top center; }
    }
</style>
<script>
    var toolsList = {!! $toolsJson !!};
    var svgs = {
            'Shopify': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 290" width="290" height="290"><g transform="translate(145,112) scale(4) translate(-12.25,-13.95)"><path fill="#8DB849" d="M11.3,1c0.2,0,0.3,0.1,0.5,0.2C10.6,1.7,9.4,3,8.8,5.8L6.6,6.4C7.3,4.4,8.7,1,11.3,1z M12.4,2c0.2,0.6,0.4,1.3,0.4,2.4c0,0.1,0,0.1,0,0.2L9.9,5.4C10.5,3.3,11.5,2.4,12.4,2z M15,3.8l-1.3,0.4c0-0.1,0-0.2,0-0.3c0-0.9-0.1-1.6-0.3-2.2C14.1,1.9,14.7,2.8,15,3.8z M21.5,5.4c0-0.1-0.1-0.2-0.2-0.2C21.1,5.2,19,5,19,5s-1.5-1.5-1.7-1.6c-0.2-0.2-0.5-0.1-0.6-0.1c0,0-0.3,0.1-0.8,0.3c-0.5-1.4-1.4-2.7-2.9-2.7c0,0-0.1,0-0.1,0c-0.4-0.6-1-0.8-1.5-0.8C7.8,0,6.1,4.5,5.5,6.8C4.7,7,3.9,7.3,3,7.6c-0.8,0.2-0.8,0.3-0.9,1C2,9.1,0,24.9,0,24.9l15.9,3l8.6-1.9C24.5,26,21.5,5.6,21.5,5.4z"/><path fill="#5A863E" d="M21.2,5.2C21.1,5.2,19,5,19,5s-1.5-1.5-1.7-1.6c-0.1-0.1-0.1-0.1-0.2-0.1l-1.2,24.6l8.6-1.9c0,0-3-20.4-3-20.6C21.5,5.3,21.3,5.2,21.2,5.2"/><path fill="#fff" d="M13,10l-1.1,3.2c0,0-0.9-0.5-2.1-0.5c-1.7,0-1.8,1-1.8,1.3c0,1.4,3.8,2,3.8,5.4c0,2.7-1.7,4.4-4,4.4c-2.7,0-4.1-1.7-4.1-1.7l0.7-2.4c0,0,1.4,1.2,2.6,1.2c0.8,0,1.1-0.6,1.1-1.1c0-1.9-3.1-2-3.1-5.1c0-2.6,1.9-5.1,5.6-5.1C12.3,9.5,13,10,13,10"/></g><g transform="translate(-64,151) scale(3.29)"><path fill="#1A1919" d="M34.6,15.9c-0.9-0.5-1.3-0.9-1.3-1.4c0-0.7,0.6-1.1,1.6-1.1c1.1,0,2.1,0.5,2.1,0.5l0.8-2.4c0,0-0.7-0.6-2.8-0.6c-3,0-5,1.7-5,4.1c0,1.4,1,2.4,2.2,3.1c1,0.6,1.4,1,1.4,1.6c0,0.6-0.5,1.2-1.5,1.2c-1.4,0-2.8-0.7-2.8-0.7l-0.8,2.4c0,0,1.2,0.8,3.3,0.8c3,0,5.2-1.5,5.2-4.2C37,17.7,35.9,16.6,34.6,15.9 M46.7,10.8c-1.5,0-2.7,0.7-3.6,1.8l0,0l1.3-6.8H41l-3.3,17.3h3.4l1.1-5.9c0.4-2.2,1.6-3.6,2.7-3.6c0.8,0,1.1,0.5,1.1,1.3c0,0.5,0,1-0.1,1.5l-1.3,6.8h3.4l1.3-7c0.1-0.7,0.2-1.6,0.2-2.2C49.5,12,48.5,10.8,46.7,10.8 M55.4,20.7c-1.2,0-1.6-1-1.6-2.2c0-1.9,1-5.1,2.8-5.1c1.2,0,1.6,1,1.6,2C58.2,17.6,57.2,20.7,55.4,20.7z M57.1,10.8c-4.1,0-6.8,3.7-6.8,7.8c0,2.6,1.6,4.7,4.7,4.7c4,0,6.7-3.6,6.7-7.8C61.7,13.1,60.3,10.8,57.1,10.8z M67.1,20.8c-0.9,0-1.4-0.5-1.4-0.5l0.6-3.2c0.4-2.1,1.5-3.5,2.7-3.5c1,0,1.4,1,1.4,1.9C70.3,17.7,69,20.8,67.1,20.8z M70.4,10.8c-2.3,0-3.6,2-3.6,2h0l0.2-1.8h-3c-0.1,1.2-0.4,3.1-0.7,4.5l-2.4,12.4h3.4l0.9-5h0.1c0,0,0.7,0.4,2,0.4c4,0,6.6-4.1,6.6-8.2C73.9,12.9,72.9,10.8,70.4,10.8z M78.7,6c-1.1,0-1.9,0.9-1.9,2c0,1,0.6,1.7,1.6,1.7h0c1.1,0,2-0.7,2-2C80.4,6.7,79.7,6,78.7,6 M74,23.1h3.4l2.3-12h-3.4L74,23.1z M88.3,11.1h-2.4l0.1-0.6c0.2-1.2,0.9-2.2,2-2.2c0.6,0,1.1,0.2,1.1,0.2l0.7-2.7c0,0-0.6-0.3-1.8-0.3c-1.2,0-2.4,0.3-3.3,1.1c-1.2,1-1.7,2.4-2,3.8l-0.1,0.6H81l-0.5,2.6h1.6l-1.8,9.5h3.4l1.8-9.5h2.3L88.3,11.1z M96.4,11.1c0,0-2.1,5.3-3.1,8.2h0c-0.1-0.9-0.8-8.2-0.8-8.2h-3.6l2,11c0,0.2,0,0.4-0.1,0.6c-0.4,0.8-1.1,1.5-1.8,2c-0.6,0.5-1.4,0.8-1.9,1l0.9,2.9c0.7-0.1,2.1-0.7,3.3-1.8c1.5-1.4,3-3.7,4.4-6.7l4.1-8.9L96.4,11.1z"/></g></svg>',

            'WordPress': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="220" height="220"><path fill="#fff" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM3.457 12c0-1.189.253-2.32.7-3.345L7.7 19.235A8.47 8.47 0 013.457 12zm8.543 8.457a8.505 8.505 0 01-2.416-.349l2.566-7.455 2.629 7.202c.017.042.038.08.06.117a8.506 8.506 0 01-2.84.485zm1.18-12.752c.515-.027.98-.081.98-.081.461-.054.407-.731-.054-.704 0 0-1.386.109-2.281.109-.84 0-2.254-.109-2.254-.109-.461-.027-.515.677-.054.704 0 0 .435.054.896.081l1.332 3.648-1.87 5.609L7.7 7.705c.515-.027.98-.081.98-.081.461-.054.407-.731-.054-.704 0 0-1.386.109-2.281.109-.16 0-.349-.004-.549-.01A8.474 8.474 0 0112 3.543c2.221 0 4.248.849 5.764 2.238-.037-.002-.073-.007-.11-.007-.84 0-1.436.731-1.436 1.517 0 .704.407 1.3.839 2.003.326.569.705 1.3.705 2.357 0 .731-.281 1.58-.649 2.76l-.851 2.843-3.082-9.148zm4.006 11.375l2.607-7.53c.488-1.219.65-2.193.65-3.059 0-.314-.021-.606-.058-.882A8.464 8.464 0 0120.543 12a8.47 8.47 0 01-3.357 6.08z"/></svg>',

            'Laravel': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 290" width="290" height="290"><g transform="translate(145,115) scale(2.1) translate(-25,-27)"><path d="m49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1 -.402.694l-9.209 5.302v10.509c0 .286-.152.55-.4.694l-19.223 11.066c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1 -.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054l-19.219-11.066a.801.801 0 0 1 -.402-.694v-32.916c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216zm-36.84-31.068v31.068l17.618 10.143v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-21.483l-4.645-2.676-3.363-1.934zm8.81-5.994-8.007 4.609 8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764 4.645-2.674v-20.096l-3.363 1.936-4.646 2.675v20.096zm24.667-23.325-8.006 4.609 8.006 4.609 8.005-4.61zm-.801 10.605-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937zm-18.422 20.561 11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833z" fill="#FF2D20"/></g><g transform="translate(20,158) scale(2.21)"><path fill="#FF2D20" d="M4.44 0v23.05h8.34v3.97H0V0h4.44zm24 11.46V9.03h4.22v18h-4.2v-2.44c-.58.9-1.38 1.6-2.42 2.1-1.04.53-2.1.78-3.15.78-1.37 0-2.62-.25-3.75-.75a8.76 8.76 0 0 1-2.92-2.06 9.6 9.6 0 0 1-1.9-3 9.72 9.72 0 0 1-.67-3.64c0-1.26.23-2.47.68-3.6a9.56 9.56 0 0 1 1.9-3.04 8.77 8.77 0 0 1 2.9-2.08c1.14-.5 2.4-.75 3.75-.75 1.05 0 2.1.26 3.14.77 1.04.52 1.84 1.22 2.4 2.12zm-.38 8.77a6.3 6.3 0 0 0 .4-2.2c0-.78-.14-1.5-.4-2.2A5.58 5.58 0 0 0 26.98 14a5.23 5.23 0 0 0-1.68-1.22 5.16 5.16 0 0 0-2.18-.47c-.8 0-1.52.17-2.16.48A5.3 5.3 0 0 0 19.3 14a5.3 5.3 0 0 0-1.06 1.83 6.56 6.56 0 0 0-.37 2.2c0 .77.12 1.5.37 2.2.24.7.6 1.3 1.06 1.8a5.28 5.28 0 0 0 1.66 1.25c.64.3 1.36.46 2.16.46s1.53-.15 2.18-.46a5.22 5.22 0 0 0 1.68-1.24 5.58 5.58 0 0 0 1.08-1.8zm7.92 6.8v-18H47.4v4.14h-7.22v13.85h-4.2zm26.67-15.57V9.03h4.2v18h-4.2v-2.44c-.56.9-1.37 1.6-2.4 2.1-1.05.53-2.1.78-3.16.78-1.37 0-2.62-.25-3.75-.75a8.76 8.76 0 0 1-2.92-2.06 9.6 9.6 0 0 1-1.9-3 9.72 9.72 0 0 1-.66-3.64c0-1.26.22-2.47.67-3.6a9.56 9.56 0 0 1 1.9-3.04 8.77 8.77 0 0 1 2.9-2.08c1.14-.5 2.4-.75 3.75-.75 1.05 0 2.1.26 3.14.77 1.04.52 1.85 1.22 2.4 2.12zm-.38 8.77a6.3 6.3 0 0 0 .38-2.2c0-.78-.13-1.5-.38-2.2A5.58 5.58 0 0 0 61.2 14a5.23 5.23 0 0 0-1.7-1.22c-.65-.3-1.38-.47-2.17-.47-.8 0-1.52.17-2.17.48A5.3 5.3 0 0 0 53.5 14a5.3 5.3 0 0 0-1.06 1.83 6.56 6.56 0 0 0-.36 2.2c0 .77.12 1.5.36 2.2.25.7.6 1.3 1.06 1.8a5.28 5.28 0 0 0 1.66 1.25c.65.3 1.37.46 2.17.46.8 0 1.52-.15 2.18-.46a5.22 5.22 0 0 0 1.7-1.24 5.58 5.58 0 0 0 1.07-1.8zm21.46-11.2H88l-6.9 18h-5.3l-6.9-18h4.25l5.3 13.78 5.28-13.77zm13.44-.46c5.73 0 9.64 5.08 8.9 11.02H92.1c0 1.54 1.58 4.54 5.3 4.54 3.2 0 5.35-2.8 5.35-2.8l2.84 2.2c-2.55 2.7-4.63 3.95-7.9 3.95-5.82 0-9.76-3.7-9.76-9.47 0-5.23 4.08-9.46 9.23-9.46zm-5.05 7.9h10.1c-.04-.35-.6-4.56-5.08-4.56-4.5 0-4.98 4.22-5.02 4.56zM108.82 27V0h4.2v27.02h-4.2z"/></g></svg>',

            'Next.js': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="200" height="200"><path fill="#fff" d="m478.5.6c-2.2.2-9.2.9-15.5 1.4-145.3 13.1-281.4 91.5-367.6 212-48 67-78.7 143-90.3 223.5-4.1 28.1-4.6 36.4-4.6 74.5s.5 46.4 4.6 74.5c27.8 192.1 164.5 353.5 349.9 413.3 33.2 10.7 68.2 18 108 22.4 15.5 1.7 82.5 1.7 98 0 68.7-7.6 126.9-24.6 184.3-53.9 8.8-4.5 10.5-5.7 9.3-6.7-.8-.6-38.3-50.9-83.3-111.7l-81.8-110.5-102.5-151.7c-56.4-83.4-102.8-151.6-103.2-151.6-.4-.1-.8 67.3-1 149.6-.3 144.1-.4 149.9-2.2 153.3-2.6 4.9-4.6 6.9-8.8 9.1-3.2 1.6-6 1.9-21.1 1.9h-17.3l-4.6-2.9c-3-1.9-5.2-4.4-6.7-7.3l-2.1-4.5.2-200.5.3-200.6 3.1-3.9c1.6-2.1 5-4.8 7.4-6.1 4.1-2 5.7-2.2 23-2.2 20.4 0 23.8.8 29.1 6.6 1.5 1.6 57 85.2 123.4 185.9s157.2 238.2 201.8 305.7l81 122.7 4.1-2.7c36.3-23.6 74.7-57.2 105.1-92.2 64.7-74.3 106.4-164.9 120.4-261.5 4.1-28.1 4.6-36.4 4.6-74.5s-.5-46.4-4.6-74.5c-27.8-192.1-164.5-353.5-349.9-413.3-32.7-10.6-67.5-17.9-106.5-22.3-9.6-1-75.7-2.1-84-1.3zm209.4 309.4c4.8 2.4 8.7 7 10.1 11.8.8 2.6 1 58.2.8 183.5l-.3 179.8-31.7-48.6-31.8-48.6v-130.7c0-84.5.4-132 1-134.3 1.6-5.6 5.1-10 9.9-12.6 4.1-2.1 5.6-2.3 21.3-2.3 14.8 0 17.4.2 20.7 2z"/></svg>',

            'Google Ads': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2442.4 2237" width="200" height="183"><path fill="#FBBC04" d="M50.4,1628.6L862.5,221.9l703.7,406.3L754.2,2034.9L50.4,1628.6z"/><path fill="#4285F4" d="M2385.1,1623.7L1572.5,216.5C1467.6,18.1,1221.8-57.7,1023.4,47.2S749.3,397.9,854.1,596.3c4.6,8.7,9.5,17.2,14.7,25.6l812.6,1407.2c109.6,195.8,357.2,265.7,553,156.1c195.8-109.6,265.7-357.2,156.1-553c-1.8-3.2-3.6-6.3-5.4-9.4L2385.1,1623.7L2385.1,1623.7z"/><circle fill="#34A853" cx="406.3" cy="1828.6" r="406.3"/></svg>',

            'Meta Ads': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 287.59 191" width="230" height="153"><defs><linearGradient id="ma" gradientTransform="matrix(1 0 0 -1 0 192)" gradientUnits="userSpaceOnUse" x1="62.34" x2="260.34" y1="101.45" y2="91.45"><stop offset="0" stop-color="#0064e1"/><stop offset=".4" stop-color="#0064e1"/><stop offset=".83" stop-color="#0073ee"/><stop offset="1" stop-color="#0082fb"/></linearGradient><linearGradient id="mb" gradientTransform="matrix(1 0 0 -1 0 192)" gradientUnits="userSpaceOnUse" x1="41.42" x2="41.42" y1="53" y2="126"><stop offset="0" stop-color="#0082fb"/><stop offset="1" stop-color="#0064e0"/></linearGradient></defs><path d="M31.06 126c0 11 2.41 19.41 5.56 24.51A19 19 0 0 0 53.19 160c8.1 0 15.51-2 29.79-21.76 11.44-15.83 24.92-38 34-52l15.36-23.6c10.67-16.39 23-34.61 37.18-47C181.07 5.6 193.54 0 206.09 0c21.07 0 41.14 12.21 56.5 35.11 16.81 25.08 25 56.67 25 89.27 0 19.38-3.82 33.62-10.32 44.87C271 180.13 258.72 191 238.13 191v-31c17.63 0 22-16.2 22-34.74 0-26.42-6.16-55.74-19.73-76.69-9.63-14.86-22.11-23.94-35.84-23.94-14.85 0-26.8 11.2-40.23 31.17-7.14 10.61-14.47 23.54-22.7 38.13l-9.06 16c-18.2 32.27-22.81 39.62-31.91 51.75C84.74 183 71.12 191 53.19 191c-21.27 0-34.72-9.21-43-23.09C3.34 156.6 0 141.76 0 124.85z" fill="#0081fb"/><path d="M24.49 37.3C38.73 15.35 59.28 0 82.85 0c13.65 0 27.22 4 41.39 15.61 15.5 12.65 32 33.48 52.63 67.81l7.39 12.32c17.84 29.72 28 45 33.93 52.22 7.64 9.26 13 12 19.94 12 17.63 0 22-16.2 22-34.74l27.4-.86c0 19.38-3.82 33.62-10.32 44.87C271 180.13 258.72 191 238.13 191c-12.8 0-24.14-2.78-36.68-14.61-9.64-9.08-20.91-25.21-29.58-39.71L146.08 93.6c-12.94-21.62-24.81-37.74-31.68-45-7.4-7.89-16.89-17.37-32.05-17.37-12.27 0-22.69 8.61-31.41 21.78z" fill="url(#ma)"/><path d="M82.35 31.23c-12.27 0-22.69 8.61-31.41 21.78C38.61 71.62 31.06 99.34 31.06 126c0 11 2.41 19.41 5.56 24.51l-26.48 17.4C3.34 156.6 0 141.76 0 124.85 0 94.1 8.44 62.05 24.49 37.3 38.73 15.35 59.28 0 82.85 0z" fill="url(#mb)"/></svg>',

            'Figma': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="1.466 2.199 285.068 427.602" width="120" height="180"><path d="M144 216c0-39.359 31.907-71.267 71.267-71.267 39.359 0 71.267 31.908 71.267 71.267 0 39.36-31.908 71.267-71.267 71.267C175.907 287.267 144 255.36 144 216z" fill="#1abcfe"/><path d="M1.466 358.534c0-39.359 31.907-71.267 71.267-71.267H144v71.267c0 39.36-31.907 71.267-71.267 71.267S1.466 397.894 1.466 358.534z" fill="#0acf83"/><path d="M144 2.2v142.533h71.267c39.36 0 71.267-31.907 71.267-71.267S254.627 2.2 215.267 2.2z" fill="#ff7262"/><path d="M1.466 73.466c0 39.36 31.907 71.267 71.267 71.267H144V2.199H72.733c-39.36 0-71.267 31.908-71.267 71.267z" fill="#f24e1e"/><path d="M1.466 216c0 39.36 31.907 71.267 71.267 71.267H144V144.733H72.733c-39.36 0-71.267 31.908-71.267 71.267z" fill="#a259ff"/></svg>',

            'React': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-11.5 -10.232 23 20.463" width="130" height="130"><circle cx="0" cy="0" r="2.05" fill="#61DAFB"/><g stroke="#61DAFB" stroke-width="1" fill="none"><ellipse rx="11" ry="4.2"/><ellipse rx="11" ry="4.2" transform="rotate(60)"/><ellipse rx="11" ry="4.2" transform="rotate(120)"/></g></svg>',

            'Tailwind CSS': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 33" width="120" height="73"><path fill="#0EA5E9" fill-rule="evenodd" clip-rule="evenodd" d="M27 0C19.8 0 15.3 3.6 13.5 10.8c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C30.744 12.672 33.514 15.6 40.5 15.6c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.514-3.522-2.004-5.147-3.653C36.756 2.928 33.986 0 27 0zM13.5 15.6C6.3 15.6 1.8 19.2 0 26.4c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 28.272 20.014 31.2 27 31.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.514-3.522-2.004-5.147-3.653C23.256 18.528 20.486 15.6 13.5 15.6z"/></svg>',

            'Klaviyo': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 581 172" width="250" height="74"><path fill="#fff" d="M329.9,34.4c3.1,0,6.1-1.2,8.3-3.3c2.2-2.1,3.5-5.1,3.6-8.1c0-3.1-1.3-6.1-3.5-8.3c-2.2-2.2-5.2-3.5-8.3-3.5c-3.1,0.1-6,1.3-8.2,3.6c-2.2,2.2-3.4,5.2-3.3,8.2c0,3,1.2,5.9,3.4,8.1C324,33.1,326.9,34.3,329.9,34.4L329.9,34.4z M410.5,45.4h28.6v2.3c-1.6,0.3-3.1,0.8-4.5,1.6c-2.6,1.2-7.8,7.1-11.9,17c-6.8,17.1-13.9,37.4-21.4,60.6l-2.8,8.8c-1.2,4-2.3,6.6-2.8,8.1c-0.5,1.6-1.2,4-2.4,6.9c-0.7,2.2-1.6,4.4-2.7,6.4c-1.4,2.6-4,7.9-6.1,9.5c-3.3,2.8-8.2,5.9-14.3,5.4c-11.9,0-20.8-8.8-20.9-19.2c0-7.1,4.5-11.8,11.3-11.8c4.9,0,9.2,2.6,9.2,8.1c0,4-4,8.1-4,10.2c0,5.4,3.1,7.9,9.2,7.9c4.9,0,8.9-3.1,11.9-9.3c4-7.1,4.4-14.9,1-23.6l-25.1-66c-5.8-15.2-10.1-20.2-15.5-20.8v-2.3h39.6v2.3c-4.7,0.5-7.1,3.3-7.1,8.3c0,3.6,1.4,9.2,4,16.3l4.7,12.8c5.4,13.9,9.8,26,12,33.6c5.1-15.8,9.8-29.6,14.3-41.7c3.3-9,4.9-15.4,4.9-19.2c0-6.8-3.7-9.9-9.2-9.9L410.5,45.4L410.5,45.4z M135.2,129.7c-5.1-0.9-9.4-5.4-9.4-14.9V0L97,6.2v2.4c4.9-0.5,9.8,3.8,9.8,13v93.2c0,9-4.9,14.2-9.8,14.9c-0.5,0.1-0.9,0.1-1.4,0.2c-2.5,0.2-5-0.3-7.3-1.3c-3.9-1.7-7.1-4.7-9.8-9.1L65.2,98.4c-2.8-4.5-7-7.9-11.9-9.8c-4.9-1.9-10.3-2.2-15.4-0.8l15-16.5c11.3-12.5,21.8-20.4,31.7-23.7v-2.3h-33v2.3c8.5,3.3,8,10.6-1.8,22L28.8,94V0L0,6.2v2.4c4.9,0,9.8,4.8,9.8,13.3v92.8C9.8,125,5,129,0,129.7v2.3h38.2v-2.3c-6.3-0.9-9.4-5.7-9.4-14.9V97.7l8.2-9l19.8,32.4c4.7,7.8,9.1,10.9,16,10.9h66.4v-1.8C139.3,130.2,137.4,130.1,135.2,129.7L135.2,129.7z M214.4,118.8V80c-0.4-25.3-11.1-36.9-35.6-36.9c-7.8-0.1-15.4,2.5-21.6,7.3c-6.5,4.9-9.6,10.4-9.6,16.8c0,6.2,3.5,10.9,9.2,10.9c6.1,0,10.5-3.5,10.5-8.3c0-3.6-2.4-8.7-2.4-12.1c0-6.2,4.7-11.6,12.9-11.6c10.5,0,18,7.8,18,25.1v10.4l-8.7,2.1c-4.5,0.9-8.4,1.8-11.3,2.6c-3,0.9-6.8,2.1-11.3,3.8c-9.1,3.5-13.9,6.8-18.1,13c-2.1,3-3.1,6.6-3.1,10.2c0,14.4,10.1,21,24.2,21c11.2,0,23-5.9,28.4-17c0.1,3.5,0.9,6.9,2.5,10.1c5.9,11.9,25.5,4.9,25.5,4.9V130C215.1,131.3,214.4,121.2,214.4,118.8L214.4,118.8z M195.8,106.8c0,5.7-2.1,10.4-6.3,13.7c-4,3.3-8.2,5-12.6,5c-8.5,0-14.1-5.5-14.1-15.8c0-4.8,2.7-9.3,4.9-11.9c1.8-1.8,3.8-3.3,6.1-4.3c3-1.6,4.4-2.4,6.5-3.3l8-2.9c4-1.6,6.4-2.4,7.5-2.9L195.8,106.8L195.8,106.8z M581,45.4h-67.8V0H581l-14.2,22.7L581,45.4L581,45.4z M443.1,120.9c-8.4-8.6-13.1-20.2-12.9-32.3c-0.1-5.9,1-11.8,3.2-17.3c2.2-5.5,5.5-10.5,9.7-14.8c8.6-9,19-13.5,31.3-13.5c12,0,22.5,4.5,31.1,13.5c4.2,4.2,7.6,9.2,9.8,14.7c2.3,5.5,3.4,11.4,3.3,17.4c0.1,6-1,11.9-3.3,17.4c-2.3,5.5-5.6,10.6-9.8,14.8c-8.6,8.8-19,13.4-31.1,13.4C462.2,134.3,451.7,129.8,443.1,120.9L443.1,120.9z M490.1,58c-3.4-6.7-8-10.6-13.3-11.7c-10.8-2.2-20.3,8.9-23.9,26.4c-1.5,7.9-1.9,15.9-1.1,23.8c0.8,8,3,15.7,6.6,22.9c3.5,6.7,8,10.6,13.3,11.7c10.8,2.2,20.6-9.3,24.2-27C498.9,89.3,497.4,71.3,490.1,58L490.1,58L490.1,58z M340,114.8V45.4h-61.4v2.1c8.2,1.2,12.1,7.4,8.4,17.3c-19.2,51.8-18,49.5-19.2,53.6c-1.2-4-4-13.8-8.5-26.1c-4.5-12.3-7.5-20.4-8.7-24.1c-4.7-14.4-3.1-19.7,4.5-20.6v-2.3h-39.8v2.3c5.9,1.2,11.2,8,15.5,20.1l6.1,15.8c6.7,17,14.6,40.5,17.2,48.5h13.2c4.3-12.3,21.3-61.5,23.6-66.5c2.5-5.7,5.3-10,8.4-13c1.5-1.6,3.3-2.9,5.4-3.7c2-0.8,4.2-1.3,6.4-1.2c0,0,9.6,0,9.6,9.2v58.1c0,9.7-4.7,14.2-9.6,14.9v2.3h38v-2.3C344.2,129,340,124.5,340,114.8L340,114.8z"/></svg>',
        };

    (function () {
        var tools = toolsList;
        var current = 0;

        function setCard(el, tool) {
            el.style.backgroundColor = tool.bg;
            el.style.display = 'flex';
            el.style.alignItems = 'center';
            el.style.justifyContent = 'center';
            el.style.overflow = 'hidden';
            var svg = svgs[tool.name];
            if (svg) {
                el.style.padding = '0';
                el.innerHTML = svg;
            } else if (tool.img) {
                el.style.padding = '0';
                el.innerHTML = '<img src="' + tool.img + '" alt="' + tool.name + '" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">';
            } else {
                el.style.padding = '2rem';
                el.innerHTML = '<span style="color:#fff;font-size:1.1rem;font-weight:700;text-align:center;">' + tool.name + '</span>';
            }
        }

        function update() {
            var left   = (current - 1 + tools.length) % tools.length;
            var center = current;
            var right  = (current + 1) % tools.length;
            setCard(document.getElementById('tool-left'),   tools[left]);
            setCard(document.getElementById('tool-center'), tools[center]);
            setCard(document.getElementById('tool-right'),  tools[right]);
        }

        function next() {
            current = (current + 1) % tools.length;
            update();
        }

        update();
        var timer = setInterval(next, 2500);

        document.getElementById('tools-3d').addEventListener('mouseenter', function () { clearInterval(timer); });
        document.getElementById('tools-3d').addEventListener('mouseleave', function () { timer = setInterval(next, 2500); });
    })();
</script>

{{-- ── FAQ ─────────────────────────────────────────────────── --}}
<section class="px-6 py-24" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-16 items-start">

            {{-- Left --}}
            <div class="md:col-span-2">
                <span class="section-label" style="color: var(--color-accent);">Frequently Asked Questions</span>
                <h2 class="font-extrabold text-white mt-2" style="font-size: clamp(2rem, 3.5vw, 2.75rem); letter-spacing: -0.03em; line-height: 1.15;">
                    Get Answers To<br>Your Vision Or<br>
                    <span style="color: var(--color-accent);">Our Services</span>
                </h2>
                <p class="mt-6 text-sm leading-relaxed" style="color: var(--color-brand-400);">
                    Still have questions? <a href="{{ route('faq') }}" style="color: var(--color-accent); text-decoration: underline;">Visit our full FAQ</a> or <a href="{{ route('contact') }}" style="color: var(--color-accent); text-decoration: underline;">get in touch</a>.
                </p>
            </div>

            {{-- Right --}}
            <div class="md:col-span-3" id="home-faq">
                @php $faqs = [
                    ['q' => 'What services does Rare Input offer?', 'a' => 'We offer end-to-end digital services — Shopify & e-commerce development, web & app development, SEO, performance marketing (Google & Meta Ads), email marketing, and social media management.'],
                    ['q' => 'How long does a typical project take?', 'a' => 'It depends on scope. A Shopify store typically takes 4–6 weeks, a custom web app 8–16 weeks. Marketing campaigns can launch within 1–2 weeks. We provide a clear timeline in our proposal.'],
                    ['q' => 'Do you work with international clients?', 'a' => 'Yes — we are remote-first and work with clients across the US, UK, Europe, and beyond. We accept payments in USD, GBP, and EUR.'],
                    ['q' => 'What is your pricing structure?', 'a' => 'Development projects are fixed-price with milestone-based payments. Marketing services are monthly retainers. We share a detailed proposal after an initial discovery call — no surprises.'],
                    ['q' => 'Do you require a long-term contract?', 'a' => 'No lock-in contracts. Marketing retainers run month-to-month. Development projects are scoped and agreed upfront. You are never tied in longer than you want to be.'],
                ]; @endphp

                @foreach($faqs as $fi => $faq)
                <div class="faq-item border-b" style="border-color: rgba(255,255,255,0.08);">
                    <button class="w-full flex items-center justify-between gap-6 py-6 text-left cursor-pointer"
                            onclick="toggleFaq({{ $fi }})"
                            style="background: none; border: none;">
                        <span class="faq-question font-semibold text-white" style="font-size: 1rem;">{{ $faq['q'] }}</span>
                        <span class="faq-icon shrink-0 text-2xl font-light transition-transform duration-300" style="color: var(--color-accent); line-height: 1;">+</span>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500" style="max-height: 0;">
                        <p class="pb-6 text-sm leading-relaxed" style="color: var(--color-brand-400);">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFaq(index) {
        const items = document.querySelectorAll('#home-faq .faq-item');
        items.forEach(function(item, i) {
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');
            if (i === index) {
                const isOpen = answer.style.maxHeight !== '0px' && answer.style.maxHeight !== '';
                answer.style.maxHeight = isOpen ? '0' : answer.scrollHeight + 'px';
                icon.textContent = isOpen ? '+' : '×';
                icon.style.transform = isOpen ? '' : 'rotate(0deg)';
            } else {
                answer.style.maxHeight = '0';
                icon.textContent = '+';
            }
        });
    }
</script>

{{-- ── Blog Teaser ──────────────────────────────────────────── --}}
@if($latestPosts->isNotEmpty())
<section class="px-6 py-24" style="background-color: var(--color-bg);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-end justify-between mb-12">
            <div>
                <span class="section-label">From The Blog</span>
                <h2 class="font-extrabold mt-2" style="font-size: clamp(1.75rem, 3vw, 2.25rem); letter-spacing: -0.03em; color: var(--color-heading);">Insights & Thinking</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold" style="color: var(--color-accent-dark);">
                View All Posts
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="card group flex flex-col overflow-hidden" style="text-decoration: none;">
                @if($post->featured_image)
                <div class="overflow-hidden" style="height: 200px;">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->featured_image_alt ?? $post->title }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                @else
                <div class="flex items-center justify-center" style="height: 200px; background: var(--color-surface-2);">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="color: var(--color-text-light);"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                </div>
                @endif
                <div class="p-6 flex flex-col flex-1">
                    @if($post->categories->isNotEmpty())
                    <span class="text-xs font-bold uppercase tracking-widest mb-3" style="color: var(--color-accent-dark);">{{ $post->categories->first()->name }}</span>
                    @endif
                    <h3 class="font-bold leading-snug mb-3 group-hover:text-amber-700 transition-colors" style="font-size: 1rem; color: var(--color-heading);">{{ $post->title }}</h3>
                    @if($post->excerpt)
                    <p class="text-sm leading-relaxed mb-4 flex-1" style="color: var(--color-text-muted);">{{ Str::limit($post->excerpt, 100) }}</p>
                    @endif
                    <div class="flex items-center justify-between mt-auto pt-4 border-t" style="border-color: var(--color-border);">
                        <span class="text-xs" style="color: var(--color-text-light);">{{ $post->published_at->format('M d, Y') }}</span>
                        <span class="text-xs font-semibold" style="color: var(--color-accent-dark);">Read →</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-8 text-center sm:hidden">
            <a href="{{ route('blog.index') }}" class="btn-secondary text-sm">View All Posts</a>
        </div>
    </div>
</section>
@endif

{{-- ── CTA Banner ────────────────────────────────────────────── --}}
<section class="px-6 py-24 text-center" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label">Ready to grow?</span>
        <h2 class="font-extrabold mb-5" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2; color: var(--color-heading);">Most projects start with<br>a 20-minute call</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-text-muted);">No pitch deck, no pressure. Just a straight conversation about your goals and whether we're the right fit.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Book a Free Call
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
