<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()->with('categories')->latest('published_at')->paginate(9);
        $categories = Category::whereHas('posts', fn ($q) => $q->published())->withCount(['posts' => fn ($q) => $q->published()])->orderByDesc('posts_count')->get();
        $recentPosts = Post::published()->latest('published_at')->limit(5)->get(['id', 'title', 'slug', 'published_at']);

        return view('blog.index', compact('posts', 'categories', 'recentPosts'));
    }

    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::published()
            ->whereHas('categories', fn ($q) => $q->where('categories.id', $category->id))
            ->with('categories')
            ->latest('published_at')
            ->paginate(9);

        return view('blog.category', compact('category', 'posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $post->load('categories');

        $wordCount = str_word_count(strip_tags($post->body));
        $readingTime = max(1, (int) ceil($wordCount / 200));

        $categoryIds = $post->categories->pluck('id');

        $recentPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->when($categoryIds->isNotEmpty(), fn ($q) => $q->whereHas('categories', fn ($q) => $q->whereIn('categories.id', $categoryIds)))
            ->latest('published_at')
            ->limit(4)
            ->get(['id', 'title', 'slug', 'published_at'])
            ->whenEmpty(fn () => Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->limit(4)
                ->get(['id', 'title', 'slug', 'published_at']));

        $prevPost = Post::published()
            ->where('published_at', '<', $post->published_at)
            ->latest('published_at')
            ->first(['title', 'slug']);

        $nextPost = Post::published()
            ->where('published_at', '>', $post->published_at)
            ->oldest('published_at')
            ->first(['title', 'slug']);

        return view('blog.show', compact('post', 'recentPosts', 'prevPost', 'nextPost', 'readingTime'));
    }
}
