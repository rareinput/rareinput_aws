<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\LandingPage;
use App\Models\Post;
use App\Models\Subscriber;
use App\Enums\LandingPageStatus;
use App\Enums\SubscriberStatus;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'posts_published'  => Post::published()->count(),
            'posts_draft'      => Post::whereNull('published_at')->orWhere('published_at', '>', now())->count(),
            'subscribers'      => Subscriber::where('status', SubscriberStatus::Active)->count(),
            'landing_pages'    => LandingPage::where('status', LandingPageStatus::Published)->count(),
            'applications_new' => JobApplication::where('status', 'New')->count(),
        ];

        $recentPosts         = Post::latest()->limit(5)->get();
        $recentSubscribers   = Subscriber::latest()->limit(5)->get();
        $recentApplications  = JobApplication::with('jobPosting')->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentSubscribers', 'recentApplications'));
    }
}
