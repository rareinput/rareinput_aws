@php
    $currentPage   = request()->integer('page', 1);
    $isFirstPage   = $currentPage <= 1;
    $blogCanonical = $isFirstPage ? route('blog.index') : request()->url();
    $blogItemList  = [
        '@context'        => 'https://schema.org',
        '@type'           => 'ItemList',
        'name'            => 'Rare Input Blog',
        'url'             => $blogCanonical,
        'itemListElement' => $posts->map(fn ($p, $i) => [
            '@type'    => 'ListItem',
            'position' => (($currentPage - 1) * 9) + $i + 1,
            'url'      => route('blog.show', $p->slug),
            'name'     => $p->title,
        ])->values()->all(),
    ];
@endphp
<x-layouts.public
    title="Digital Marketing & Development Blog"
    description="Insights, guides, and expert perspectives on web development, Shopify, SEO, performance marketing, and email marketing from the Rare Input team."
    :canonical="$blogCanonical"
    :noindex="!$isFirstPage"
>
    <x-slot:head>
        @if($posts->isNotEmpty())
        <script type="application/ld+json">{!! json_encode($blogItemList, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        @endif
        <script type="application/ld+json">{!! json_encode([
            "\x40context"        => 'https://schema.org',
            "\x40type"           => 'BreadcrumbList',
            'itemListElement'    => [
                ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
                ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
            ],
        ], JSON_UNESCAPED_SLASHES) !!}</script>
    </x-slot:head>

<section style="background: var(--color-surface); padding: 4rem 1.5rem 3rem; border-bottom: 1px solid var(--color-border);">
    <div class="mx-auto px-6" style="max-width: var(--max-width);">
        <span class="section-label">Blog</span>
        <h1 style="font-size: 2.5rem; font-weight: 800; letter-spacing: -0.03em; color: var(--color-heading); margin-bottom: 0.75rem;">Insights & Ideas</h1>
        <p style="font-size: 1rem; color: var(--color-text-muted); max-width: 480px; line-height: 1.7;">Thoughts on development, marketing, and building digital businesses.</p>
    </div>
</section>

<section class="px-6 py-16">
    <div class="mx-auto px-6" style="max-width: var(--max-width);">
        @php $blogLayout = \App\Models\Setting::get('blog_layout', 'list'); @endphp
        @if ($posts->isEmpty())
            <div style="text-align: center; padding: 5rem 0;">
                <p style="font-size: 3rem; margin-bottom: 1rem;">✍️</p>
                <p style="color: var(--color-text-muted); font-size: 1rem;">No posts yet. Check back soon.</p>
            </div>
        @elseif ($blogLayout === 'list')
            {{-- ── List Layout with Sidebar ── --}}
            <div class="grid grid-cols-12 gap-16 items-start">

                {{-- Posts --}}
                <div class="col-span-8">
                    <div class="flex flex-col" style="gap: 1.5rem;">
                        @foreach ($posts as $post)
                        <article class="card" style="overflow: hidden;">
                            <a href="{{ route('blog.show', $post->slug) }}" class="flex gap-0" style="text-decoration: none;">
                                {{-- Thumbnail --}}
                                <div style="flex-shrink: 0; width: 220px;">
                                    @if ($post->featured_image)
                                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->featured_image_alt ?: $post->title }}"
                                             style="width: 220px; height: 100%; min-height: 160px; object-fit: cover; display: block;"
                                             loading="lazy" decoding="async">
                                    @else
                                        <div style="width: 220px; min-height: 160px; height: 100%; background: linear-gradient(135deg, var(--color-surface-2), var(--color-accent-light)); display: flex; align-items: center; justify-content: center; font-size: 2rem;">✍️</div>
                                    @endif
                                </div>
                                {{-- Content --}}
                                <div style="padding: 1.5rem 1.75rem; flex: 1; display: flex; flex-direction: column; justify-content: center;">
                                    <div class="flex items-center gap-3" style="margin-bottom: 0.5rem;">
                                        @if($post->categories->isNotEmpty())
                                            @foreach($post->categories as $category)
                                                <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--color-accent-dark);">{{ $category->name }}</span>
                                            @endforeach
                                            <span style="color: var(--color-border-strong);">·</span>
                                        @endif
                                        <span style="font-size: 0.75rem; color: var(--color-text-light); font-weight: 500;">{{ $post->published_at->format('M d, Y') }}</span>
                                    </div>
                                    <h2 style="font-size: 1.15rem; font-weight: 700; color: var(--color-heading); margin-bottom: 0.6rem; line-height: 1.4; letter-spacing: -0.01em; transition: color 0.15s;"
                                        onmouseover="this.style.color='var(--color-accent-dark)'" onmouseout="this.style.color='var(--color-heading)'">
                                        {{ $post->title }}
                                    </h2>
                                    @if ($post->excerpt)
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.65; flex: 1;">{{ Str::limit($post->excerpt, 160) }}</p>
                                    @endif
                                    <span style="display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 1rem; font-size: 0.85rem; font-weight: 600; color: var(--color-accent-dark);">
                                        Read more
                                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                                    </span>
                                </div>
                            </a>
                        </article>
                        @endforeach
                    </div>
                    <div style="margin-top: 3rem;">{{ $posts->links() }}</div>
                </div>

                {{-- Sidebar --}}
                <aside class="col-span-4 sticky top-20 flex flex-col gap-6">

                    {{-- Categories --}}
                    @if($categories->isNotEmpty())
                    <div class="p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                        <p class="text-xs font-bold tracking-widest uppercase mb-4" style="color: var(--color-text-light);">Categories</p>
                        <div class="flex flex-col gap-2">
                            @foreach($categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}"
                               class="flex items-center justify-between group"
                               style="text-decoration: none;">
                                <span class="text-sm font-medium transition-colors group-hover:text-[var(--color-accent-dark)]" style="color: var(--color-heading);">{{ $category->name }}</span>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full" style="background: var(--color-accent-light); color: var(--color-accent-dark);">{{ $category->posts_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Recent Posts --}}
                    @if($recentPosts->isNotEmpty())
                    <div class="p-6 rounded-2xl border" style="background: var(--color-surface); border-color: var(--color-border);">
                        <p class="text-xs font-bold tracking-widest uppercase mb-4" style="color: var(--color-text-light);">Recent Posts</p>
                        <div class="flex flex-col gap-4">
                            @foreach($recentPosts as $recent)
                            <a href="{{ route('blog.show', $recent->slug) }}" class="block group" style="text-decoration: none;">
                                <p class="text-sm font-semibold leading-snug transition-colors group-hover:text-[var(--color-accent-dark)]" style="color: var(--color-heading);">{{ $recent->title }}</p>
                                <p class="text-xs mt-1" style="color: var(--color-text-light);">{{ $recent->published_at->format('M d, Y') }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

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
        @else
            {{-- ── Grid Layout ── --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2rem;">
                @foreach ($posts as $post)
                <article class="card" style="overflow: hidden; display: flex; flex-direction: column;">
                    @if ($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->featured_image_alt ?: $post->title }}"
                             style="width: 100%; height: 200px; object-fit: cover;"
                             loading="lazy" decoding="async">
                    @else
                        <div style="width: 100%; height: 200px; background: linear-gradient(135deg, var(--color-surface-2), var(--color-accent-light)); display: flex; align-items: center; justify-content: center; font-size: 2.5rem;">✍️</div>
                    @endif
                    <div style="padding: 1.75rem; flex: 1; display: flex; flex-direction: column;">
                        <p style="font-size: 0.75rem; color: var(--color-text-light); margin-bottom: 0.75rem; font-weight: 500;">
                            {{ $post->published_at->format('M d, Y') }}
                        </p>
                        <h2 style="font-size: 1.1rem; font-weight: 700; color: var(--color-heading); margin-bottom: 0.75rem; line-height: 1.4; letter-spacing: -0.01em;">
                            <a href="{{ route('blog.show', $post->slug) }}" style="transition: color 0.15s;" onmouseover="this.style.color='var(--color-accent-dark)'" onmouseout="this.style.color='var(--color-heading)'">
                                {{ $post->title }}
                            </a>
                        </h2>
                        @if ($post->excerpt)
                            <p style="font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.65; flex: 1;">{{ Str::limit($post->excerpt, 120) }}</p>
                        @endif
                        @if($post->categories->isNotEmpty())
                            <div class="flex flex-wrap gap-1.5 mt-3">
                                @foreach($post->categories as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}"
                                       class="text-xs font-semibold px-2.5 py-0.5 rounded-full transition-opacity hover:opacity-80"
                                       style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <a href="{{ route('blog.show', $post->slug) }}"
                           style="display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 1.25rem; font-size: 0.85rem; font-weight: 600; color: var(--color-accent-dark); transition: gap 0.15s;"
                           onmouseover="this.style.gap='0.6rem'" onmouseout="this.style.gap='0.35rem'">
                            Read more
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            <div style="margin-top: 3rem;">{{ $posts->links() }}</div>
        @endif
    </div>
</section>

</x-layouts.public>
