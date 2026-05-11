<x-layouts.public :title="$category->name . ' — Blog'">
    <x-slot:head>
        <meta name="description" content="Browse all posts in {{ $category->name }} from Rare Input — digital growth insights, tips, and strategies.">
        <link rel="canonical" href="{{ route('blog.category', $category->slug) }}">
        <meta name="robots" content="index, follow">
    </x-slot:head>

<section style="background: var(--color-surface); padding: 4rem 1.5rem 3rem; border-bottom: 1px solid var(--color-border);">
    <div class="mx-auto px-6" style="max-width: var(--max-width);">
        <nav class="flex items-center gap-2 text-xs font-medium mb-4" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="transition-colors hover:text-[var(--color-heading)]">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="transition-colors hover:text-[var(--color-heading)]">Blog</a>
            <span>/</span>
            <span style="color: var(--color-heading);">{{ $category->name }}</span>
        </nav>
        <span class="section-label">Category</span>
        <h1 style="font-size: 2.5rem; font-weight: 800; letter-spacing: -0.03em; color: var(--color-heading); margin-bottom: 0.75rem;">{{ $category->name }}</h1>
        <p style="font-size: 1rem; color: var(--color-text-muted); line-height: 1.7;">{{ $posts->total() }} {{ Str::plural('post', $posts->total()) }} in this category</p>
    </div>
</section>

<section class="px-6 py-16">
    <div class="mx-auto px-6" style="max-width: var(--max-width);">
        @if ($posts->isEmpty())
            <div style="text-align: center; padding: 5rem 0;">
                <p style="font-size: 3rem; margin-bottom: 1rem;">✍️</p>
                <p style="color: var(--color-text-muted); font-size: 1rem;">No posts in this category yet.</p>
                <a href="{{ route('blog.index') }}" class="btn-secondary" style="display: inline-flex; margin-top: 1.5rem;">← All Posts</a>
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                @foreach ($posts as $post)
                <article class="card" style="overflow: hidden; display: flex; flex-direction: column;">
                    @if ($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->featured_image_alt ?: $post->title }}"
                             style="width: 100%; height: 200px; object-fit: cover;">
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
                                @foreach($post->categories as $cat)
                                    <a href="{{ route('blog.category', $cat->slug) }}"
                                       class="text-xs font-semibold px-2.5 py-0.5 rounded-full transition-opacity hover:opacity-80"
                                       style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
                                        {{ $cat->name }}
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
