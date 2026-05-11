<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest()->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('posts/og', 'public');
        }

        $data['noindex'] = $request->boolean('noindex');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $targetDate = filled($data['published_at']) ? $data['published_at'] : null;

        $data['published_at'] = match ($data['publish_status']) {
            'published' => $targetDate ?? now(),
            'scheduled' => $targetDate,
            'draft'     => null,
        };

        unset($data['publish_status']);
        $post = Post::create($data);
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        $categories = Category::orderBy('name')->get();
        $post->load('categories');

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        } elseif ($request->boolean('remove_image') && $post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
            $data['featured_image'] = null;
        }

        if ($request->hasFile('og_image')) {
            if ($post->og_image) {
                Storage::disk('public')->delete($post->og_image);
            }
            $data['og_image'] = $request->file('og_image')->store('posts/og', 'public');
        } elseif ($request->boolean('remove_og_image') && $post->og_image) {
            Storage::disk('public')->delete($post->og_image);
            $data['og_image'] = null;
        }

        $data['noindex'] = $request->boolean('noindex');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $targetDate = filled($data['published_at']) ? $data['published_at'] : null;

        $data['published_at'] = match ($data['publish_status']) {
            'published' => $targetDate ?? now(),
            'scheduled' => $targetDate,
            'draft'     => null,
        };

        unset($data['remove_image'], $data['publish_status']);
        $post->update($data);
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate(['ids' => ['required', 'array'], 'ids.*' => ['integer', 'exists:posts,id']]);

        $posts = Post::whereIn('id', $request->ids)->get();

        foreach ($posts as $post) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $post->delete();
        }

        return redirect()->route('admin.posts.index')->with('success', count($posts) . ' post(s) deleted.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        if ($post->og_image) {
            Storage::disk('public')->delete($post->og_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
