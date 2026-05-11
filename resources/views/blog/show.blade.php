@php
    $metaTitle       = $post->meta_title ?: ($post->title . ' — Rare Input');
    $metaDescription = $post->meta_description ?: $post->excerpt;
    $ogImage         = $post->og_image
                        ? Storage::url($post->og_image)
                        : ($post->featured_image ? Storage::url($post->featured_image) : null);
    $canonicalUrl    = route('blog.show', $post->slug);

    $jsonLd = [
        '@context'      => 'https://schema.org',
        '@type'         => 'Article',
        'headline'      => $post->title,
        'description'   => $metaDescription ?? '',
        'datePublished' => $post->published_at->toIso8601String(),
        'dateModified'  => $post->updated_at->toIso8601String(),
        'url'           => $canonicalUrl,
        'author'        => ['@type' => 'Organization', 'name' => 'Rare Input', 'url' => url('/')],
        'publisher'     => ['@type' => 'Organization', 'name' => 'Rare Input', 'url' => url('/')],
    ];
    if ($ogImage) {
        $jsonLd['image'] = $ogImage;
    }
    $jsonLdJson = json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $breadcrumb = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog',  'item' => route('blog.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $post->title, 'item' => $canonicalUrl],
        ],
    ];
    $breadcrumbJson = json_encode($breadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp

<x-layouts.public :title="$post->meta_title ?: $post->title">
    <x-slot:head>
        {{-- Canonical --}}
        <link rel="canonical" href="{{ $canonicalUrl }}">

        {{-- Robots --}}
        @if($post->noindex)
        <meta name="robots" content="noindex, nofollow">
        @else
        <meta name="robots" content="index, follow">
        @endif

        {{-- Open Graph --}}
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $metaTitle }}">
        <meta property="og:description" content="{{ $metaDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:site_name" content="Rare Input">
        @if($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        @endif
        <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
        <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $metaTitle }}">
        <meta name="twitter:description" content="{{ $metaDescription }}">
        @if($ogImage)
        <meta name="twitter:image" content="{{ $ogImage }}">
        @endif

        {{-- JSON-LD Article Schema --}}
        <script type="application/ld+json">{!! $jsonLdJson !!}</script>

        {{-- JSON-LD Breadcrumb Schema --}}
        <script type="application/ld+json">{!! $breadcrumbJson !!}</script>
    </x-slot:head>

{{-- Breadcrumb --}}
<div class="border-b px-6 py-4" style="background: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <nav class="flex items-center gap-2 text-xs font-medium" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="transition-colors hover:text-[var(--color-heading)]">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="transition-colors hover:text-[var(--color-heading)]">Blog</a>
            <span>/</span>
            <span class="truncate" style="color: var(--color-heading); max-width: 400px;">{{ $post->title }}</span>
        </nav>
    </div>
</div>

{{-- Main layout --}}
<div class="mx-auto px-6 py-16" style="max-width: var(--max-width);">
    <div class="grid grid-cols-12 gap-16 items-start">

        {{-- Article --}}
        <article class="col-span-8">
            @if ($post->featured_image)
                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->featured_image_alt ?: $post->title }}"
                     class="w-full object-cover rounded-2xl mb-10 shadow-lg" style="max-height: 440px;">
            @endif

            <header class="mb-10">
                <div class="flex items-center gap-3 mb-3">
                    <p class="text-xs font-semibold tracking-widest uppercase" style="color: var(--color-text-light);">
                        {{ $post->published_at->format('F d, Y') }}
                    </p>
                    <span class="text-xs" style="color: var(--color-text-light);">·</span>
                    <p class="text-xs font-semibold" style="color: var(--color-text-light);">{{ $readingTime }} min read</p>
                </div>
                <h1 class="font-extrabold tracking-tight leading-tight mb-4" style="font-size: clamp(1.75rem, 4vw, 2.75rem); color: var(--color-heading);">
                    {{ $post->title }}
                </h1>
                @if($post->categories->isNotEmpty())
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($post->categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}"
                               class="inline-block px-3 py-1 text-xs font-semibold rounded-full transition-opacity hover:opacity-80"
                               style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif

                @if ($post->excerpt)
                    <p class="text-lg leading-relaxed border-l-4 pl-5" style="color: var(--color-text-muted); border-color: var(--color-accent);">
                        {{ $post->excerpt }}
                    </p>
                @endif
            </header>

            <div id="post-body" class="prose-content text-base" style="line-height: 1.85; color: var(--color-text);">
                {!! $post->body !!}
            </div>

            {{-- Author --}}
            <div class="flex items-center gap-5 mt-12 p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                <div class="w-13 h-13 rounded-full flex items-center justify-center shrink-0" style="width: 52px; height: 52px; background: var(--color-accent-light);">
                    <span class="text-xl font-bold" style="color: var(--color-accent-dark);">R</span>
                </div>
                <div>
                    <p class="font-bold text-sm mb-0.5" style="color: var(--color-heading);">By Rare Input</p>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">We help brands grow through Shopify, SEO, performance marketing, and smart digital strategy.</p>
                </div>
            </div>

            {{-- Post Navigation --}}
            <div class="grid grid-cols-2 gap-4 mt-16 pt-8 border-t" style="border-color: var(--color-border);">
                @if($prevPost)
                <a href="{{ route('blog.show', $prevPost->slug) }}"
                   class="block p-5 rounded-2xl border transition-all hover:-translate-y-0.5 hover:shadow-md"
                   style="background: var(--color-surface); border-color: var(--color-border);">
                    <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color: var(--color-text-light);">← Previous Post</p>
                    <p class="text-sm font-semibold leading-snug" style="color: var(--color-heading);">{{ $prevPost->title }}</p>
                </a>
                @else
                <div></div>
                @endif

                @if($nextPost)
                <a href="{{ route('blog.show', $nextPost->slug) }}"
                   class="block p-5 rounded-2xl border text-right transition-all hover:-translate-y-0.5 hover:shadow-md"
                   style="background: var(--color-surface); border-color: var(--color-border);">
                    <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color: var(--color-text-light);">Next Post →</p>
                    <p class="text-sm font-semibold leading-snug" style="color: var(--color-heading);">{{ $nextPost->title }}</p>
                </a>
                @endif
            </div>
        </article>

        {{-- Sidebar --}}
        <aside class="col-span-4 sticky top-20 flex flex-col gap-6">

            {{-- Table of Contents --}}
            <div id="toc-box" class="hidden p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                <p class="text-xs font-bold tracking-widest uppercase mb-3" style="color: var(--color-text-light);">Contents</p>
                <nav id="toc-nav" class="flex flex-col gap-1.5"></nav>
            </div>

            {{-- Recent Posts --}}
            @if($recentPosts->isNotEmpty())
            <div class="p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                <p class="text-xs font-bold tracking-widest uppercase mb-4" style="color: var(--color-text-light);">
                    {{ $post->categories->isNotEmpty() ? 'Related Posts' : 'Recent Posts' }}
                </p>
                <div class="flex flex-col gap-4">
                    @foreach($recentPosts as $recent)
                    <a href="{{ route('blog.show', $recent->slug) }}" class="block group">
                        <p class="text-sm font-semibold leading-snug transition-colors group-hover:text-[var(--color-accent-dark)]" style="color: var(--color-heading);">{{ $recent->title }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Share --}}
            <div class="p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                <p class="text-xs font-bold tracking-widest uppercase mb-4" style="color: var(--color-text-light);">Share this post</p>
                <div class="flex flex-col gap-2.5">
                    <a id="share-twitter" href="#" target="_blank" rel="noopener"
                       class="flex items-center gap-2.5 px-3.5 py-2.5 text-xs font-medium rounded-lg border transition-colors hover:bg-[var(--color-surface-2)]"
                       style="border-color: var(--color-border); color: var(--color-heading);">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        Share on X
                    </a>
                    <a id="share-linkedin" href="#" target="_blank" rel="noopener"
                       class="flex items-center gap-2.5 px-3.5 py-2.5 text-xs font-medium rounded-lg border transition-colors hover:bg-[var(--color-surface-2)]"
                       style="border-color: var(--color-border); color: var(--color-heading);">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        Share on LinkedIn
                    </a>
                    <button id="copy-link"
                            class="flex items-center gap-2.5 px-3.5 py-2.5 text-xs font-medium rounded-lg border transition-colors hover:bg-[var(--color-surface-2)] w-full cursor-pointer"
                            style="border-color: var(--color-border); color: var(--color-heading); background: transparent;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        <span id="copy-label">Copy Link</span>
                    </button>
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="p-6 rounded-2xl border" style="background: var(--color-accent-light); border-color: var(--color-accent);">
                <p class="text-xs font-bold tracking-widest uppercase mb-1.5" style="color: var(--color-accent-dark);">Newsletter</p>
                <p class="text-sm font-semibold mb-1" style="color: var(--color-heading);">Get insights in your inbox</p>
                <p class="text-xs leading-relaxed mb-4" style="color: var(--color-text-muted);">No fluff. Just actionable tips on Shopify, SEO, and growth — straight to your inbox.</p>
                <form method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <input type="email" name="email" required placeholder="Your email"
                           class="w-full px-3.5 py-2.5 text-xs rounded-lg outline-none mb-2.5 border"
                           style="border-color: var(--color-accent); background: #fff; color: var(--color-text);">
                    <button type="submit" class="w-full py-2.5 text-xs font-bold text-white rounded-lg transition-opacity hover:opacity-85 cursor-pointer border-0"
                            style="background: var(--color-heading);">
                        Subscribe →
                    </button>
                </form>
            </div>

            {{-- Free Audit CTA --}}
            <div class="p-6 rounded-2xl text-center" style="background: var(--color-heading);">
                <p class="text-xs font-bold tracking-widest uppercase mb-1.5" style="color: var(--color-accent);">Free Offer</p>
                <p class="text-base font-bold leading-snug mb-1.5 text-white">Get a Free Digital Audit</p>
                <p class="text-xs leading-relaxed mb-5" style="color: var(--color-brand-300);">We'll review your website, SEO, and ads — and show you exactly where you're leaving money on the table.</p>
                <a href="{{ route('contact') }}"
                   class="block py-2.5 text-xs font-bold rounded-lg transition-opacity hover:opacity-90"
                   style="background: var(--color-accent); color: var(--color-heading);">
                    Claim My Free Audit →
                </a>
            </div>

        </aside>
    </div>
</div>

<script>
    // Share buttons
    const pageUrl = encodeURIComponent(window.location.href);
    const pageTitle = encodeURIComponent(document.title);
    document.getElementById('share-twitter').href = `https://twitter.com/intent/tweet?url=${pageUrl}&text=${pageTitle}`;
    document.getElementById('share-linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`;
    document.getElementById('copy-link').addEventListener('click', function () {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const label = document.getElementById('copy-label');
            label.textContent = 'Copied!';
            setTimeout(() => label.textContent = 'Copy Link', 2000);
        });
    });

    // Build Table of Contents from headings in post body
    const headings = document.querySelectorAll('#post-body h1, #post-body h2, #post-body h3');
    if (headings.length > 1) {
        const tocNav = document.getElementById('toc-nav');
        const tocBox = document.getElementById('toc-box');
        tocBox.classList.remove('hidden');
        tocBox.style.display = '';

        headings.forEach((heading, i) => {
            if (!heading.id) heading.id = 'heading-' + i;
            const isH3 = heading.tagName === 'H3';

            const a = document.createElement('a');
            a.href = '#' + heading.id;
            a.textContent = heading.textContent;
            a.className = 'text-xs leading-snug transition-colors hover:text-[var(--color-heading)] ' + (isH3 ? 'pl-3 font-normal' : 'font-medium');
            a.style.color = 'var(--color-text-muted)';
            a.style.textDecoration = 'none';
            tocNav.appendChild(a);
        });
    }
</script>

</x-layouts.public>
