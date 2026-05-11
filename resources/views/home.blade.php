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

                {{-- Tech trust bar --}}
                <div class="flex flex-wrap gap-6 mt-10 pt-8 border-t" style="border-color: var(--color-border);">
                    @foreach(['Shopify', 'WordPress', 'Laravel', 'Next.js', 'Google Ads', 'Meta Ads'] as $tech)
                        <span class="text-xs font-semibold tracking-wide" style="color: var(--color-text-muted);">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Right — fading dashboard carousel --}}
            <div class="hidden lg:flex items-center justify-center">
                <div class="relative" style="width: 420px; height: 480px;">

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
                    ['name' => 'Shopify',      'bg' => '#96BF48', 'text' => '#fff', 'img' => '/images/tools/shopify.png'],
                    ['name' => 'WordPress',    'bg' => '#21759B', 'text' => '#fff', 'img' => '/images/tools/WordPress.png'],
                    ['name' => 'Laravel',      'bg' => '#FF2D20', 'text' => '#fff', 'img' => '/images/tools/laravel.png'],
                    ['name' => 'Next.js',      'bg' => '#111111', 'text' => '#fff', 'img' => '/images/tools/nextjs.png'],
                    ['name' => 'Google Ads',   'bg' => '#4285F4', 'text' => '#fff', 'img' => '/images/tools/google-ads.png'],
                    ['name' => 'Meta Ads',     'bg' => '#0866FF', 'text' => '#fff', 'img' => null],
                    ['name' => 'Klaviyo',      'bg' => '#1C1C1C', 'text' => '#fff', 'img' => null],
                    ['name' => 'Figma',        'bg' => '#F24E1E', 'text' => '#fff', 'img' => '/images/tools/Figma.png'],
                    ['name' => 'React Native', 'bg' => '#20232A', 'text' => '#61DAFB', 'img' => null],
                    ['name' => 'Tailwind CSS', 'bg' => '#0EA5E9', 'text' => '#fff', 'img' => null],
                ];
                $toolsJson = json_encode($tools, JSON_HEX_TAG);
                @endphp

                {{-- Scene with perspective --}}
                <div id="tools-3d" style="position: relative; width: 100%; height: 100%; perspective: 900px; perspective-origin: 50% 50%;">
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

<script>
    (function () {
        var tools = {!! $toolsJson !!};
        var current = 0;

        function setCard(el, tool) {
            el.style.color = tool.text;
            if (tool.img) {
                el.style.backgroundColor = tool.bg;
                el.style.padding = '0';
                el.style.overflow = 'hidden';
                el.innerHTML = '<img src="' + tool.img + '" alt="' + tool.name + '" style="width:100%; height:100%; object-fit:cover; border-radius: inherit;">';
            } else {
                el.style.backgroundColor = tool.bg;
                el.style.padding = '';
                el.innerHTML = '<span style="font-size:1.1rem; font-weight:700; text-align:center; padding: 1rem;">' + tool.name + '</span>';
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

{{-- ── Social Proof Strip ────────────────────────────────────── --}}
<section class="px-6 py-8 border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <p class="text-xs font-semibold uppercase tracking-widest" style="color: var(--color-text-muted);">Trusted by founders &amp; marketing teams worldwide</p>
            <div class="flex flex-wrap items-center gap-8">
                @foreach([
                    ['Arjun S.', 'Founder', 'ROAS 1.4x → 3.9x in 4 months'],
                    ['Sophie W.', 'CMO', '210% organic traffic growth'],
                    ['Ravi P.', 'CEO', 'Scaled from 500 to 12,000 users'],
                ] as [$name, $role, $result])
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0" style="background-color: var(--color-accent-dark);">{{ substr($name, 0, 1) }}</div>
                    <div>
                        <p class="text-xs font-semibold" style="color: var(--color-heading);">{{ $result }}</p>
                        <p class="text-xs" style="color: var(--color-text-muted);">{{ $name }}, {{ $role }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Services ──────────────────────────────────────────────── --}}
<section id="services" class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">

        <div class="text-center mb-16">
            <span class="section-label">What We Do</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2.25rem; letter-spacing: -0.03em; color: var(--color-heading);">End-to-End Digital Services</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 1rem; color: var(--color-text-muted); max-width: 460px;">Everything you need to build your online presence and grow your business — under one roof.</p>
        </div>

        {{-- Development --}}
        <div class="mb-14">
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Development</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([
                    ['Shopify', 'Custom storefronts, themes, and full Shopify builds tailored to your brand.', 'services.shopify'],
                    ['WordPress', 'Websites, blogs, and content-driven platforms built for performance.', 'services.wordpress'],
                    ['Website Development', 'Custom sites and landing pages using HTML, Laravel, and Next.js.', 'services.web-development'],
                    ['App Development', 'Web apps, portals, dashboards, and iOS/Android mobile apps.', 'services.app-development'],
                ] as [$name, $desc, $route])
                <div class="card p-7">
                    <h3 class="font-bold mb-2" style="font-size: 0.975rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $name }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <a href="{{ route($route) }}" class="inline-flex items-center gap-1 mt-4 text-xs font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Digital Marketing --}}
        <div>
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
                <span class="text-xs font-bold uppercase tracking-widest whitespace-nowrap" style="color: var(--color-accent-dark);">Digital Marketing</span>
                <div class="flex-1 border-t" style="border-color: var(--color-border);"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([
                    ['SEO', 'Rank higher, drive organic traffic, and grow your online visibility.', 'services.seo'],
                    ['Performance Marketing', 'ROI-focused paid campaigns across Google, Meta, and beyond.', 'services.performance-marketing'],
                    ['Email Marketing', 'Automated sequences and targeted campaigns that convert.', 'services.email-marketing'],
                    ['Social Media Marketing', 'Strategic content creation and community management.', 'services.social-media'],
                ] as [$name, $desc, $route])
                <div class="card p-7">
                    <h3 class="font-bold mb-2" style="font-size: 0.975rem; color: var(--color-heading); letter-spacing: -0.01em;">{{ $name }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                    <a href="{{ route($route) }}" class="inline-flex items-center gap-1 mt-4 text-xs font-semibold" style="color: var(--color-accent-dark);">
                        Learn more
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Services Accordion ────────────────────────────────── --}}
<section class="px-6 py-24 border-t" style="background-color: var(--color-brand-900); border-color: rgba(255,255,255,0.06);">
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
                        <a href="{{ route($service['route']) }}" class="inline-flex items-center text-sm font-semibold tracking-wide uppercase" style="padding: 0.6rem 1.5rem; border: 1.5px solid rgba(255,255,255,0.6); border-radius: var(--radius-btn); color: #fff; letter-spacing: 0.06em;">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

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
    document.addEventListener('DOMContentLoaded', function() { openAccordion(0); });
</script>

<x-testimonials :testimonials="[
    ['quote' => 'Rare Input built our entire Shopify store and took our Google Ads ROAS from 1.4x to 3.9x in under four months. Having one team handle both was a game changer.', 'name' => 'Arjun S.', 'role' => 'Founder'],
    ['quote' => 'We brought them in for SEO and ended up using them for our full website rebuild too. Both delivered beyond expectations. Organic traffic is up 210% year on year.', 'name' => 'Sophie W.', 'role' => 'CMO'],
    ['quote' => 'The app they built scaled from 500 to 12,000 users without a single architecture issue. They clearly thought ahead when designing the system.', 'name' => 'Ravi P.', 'role' => 'CEO'],
    ['quote' => 'They are the rare agency that actually cares about outcomes, not just deliverables. Every decision was tied back to what would make our business grow.', 'name' => 'Laura B.', 'role' => 'Head of Growth'],
    ['quote' => 'Our email flows and paid campaigns are now managed by the same team which means the messaging is consistent across every touchpoint. The results show it.', 'name' => 'Neel J.', 'role' => 'Marketing Director'],
    ['quote' => 'From the first call to the final handover, the communication was clear, the timelines were met, and the output was excellent. Exactly what you want from an agency.', 'name' => 'Emma C.', 'role' => 'Co-Founder'],
]" />

{{-- ── FAQ ───────────────────────────────────────────────────── --}}
<section class="px-6 py-24" style="background-color: var(--color-brand-950);">
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

{{-- ── CTA Banner ────────────────────────────────────────────── --}}
<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Ready to grow?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's build something<br>great together</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your project and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Contact Us
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

{{-- ── Contact Form ──────────────────────────────────────────── --}}
<section id="contact" class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 860px;">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-12 items-start">

            {{-- Left info --}}
            <div class="md:col-span-2">
                <span class="section-label">Get In Touch</span>
                <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Send us a message</h2>
                <p class="leading-relaxed mb-8" style="font-size: 0.95rem; color: var(--color-text-muted);">
                    Fill out the form and we'll get back to you within one business day.
                </p>
                <ul class="space-y-4">
                    @foreach([
                        'Remote-first, serving globally',
                        'Response within 24 hours',
                        'No-commitment initial call',
                    ] as $text)
                    <li class="flex items-center gap-3 text-sm" style="color: var(--color-text-muted);">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="color: var(--color-accent-dark); flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        {{ $text }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Form card --}}
            <div class="md:col-span-3 rounded-2xl p-8 border shadow-lg" style="background-color: var(--color-bg); border-color: var(--color-border); box-shadow: var(--shadow-lg);">

                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-lg text-sm" style="background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c;">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Full Name</label>
                            <input class="form-input" type="text" name="name" value="{{ old('name') }}" placeholder="John Smith" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Email Address</label>
                            <input class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Subject</label>
                        <input class="form-input" type="text" name="subject" value="{{ old('subject') }}" placeholder="What can we help you with?">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Message</label>
                        <textarea class="form-input" name="message" rows="5" placeholder="Tell us about your project..." required style="resize: vertical;">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full" style="padding: 0.9rem;">
                        Send Message
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

</x-layouts.public>
