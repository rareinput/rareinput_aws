<?php

namespace App\Http\Controllers;

use App\Enums\LandingPageStatus;
use App\Models\Category;
use App\Models\LandingPage;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $now = now()->toAtomString();
        $staticPages = [
            ['url' => route('home'),                           'priority' => '1.0', 'changefreq' => 'weekly',  'lastmod' => $now],
            ['url' => route('services.index'),                 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.shopify'),               'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.wordpress'),             'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.web-development'),       'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.app-development'),       'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.seo'),                   'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.performance-marketing'), 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.email-marketing'),       'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('services.social-media'),          'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('blog.index'),                     'priority' => '0.8', 'changefreq' => 'daily',   'lastmod' => $now],
            ['url' => route('about'),                          'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('contact'),                        'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $now],
            ['url' => route('careers'),                        'priority' => '0.6', 'changefreq' => 'weekly',  'lastmod' => $now],
            ['url' => route('faq'),                            'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => $now],
        ];

        $posts = Post::published()
            ->where('noindex', false)
            ->latest('published_at')
            ->get(['slug', 'updated_at']);

        $categories = Category::whereHas('posts', fn ($q) => $q->where('noindex', false))
            ->get(['slug', 'updated_at']);

        $landingPages = LandingPage::where('status', LandingPageStatus::Published)
            ->where('noindex', false)
            ->get(['slug', 'updated_at']);

        return response()
            ->view('sitemap', compact('staticPages', 'posts', 'categories', 'landingPages'))
            ->header('Content-Type', 'application/xml');
    }
}
