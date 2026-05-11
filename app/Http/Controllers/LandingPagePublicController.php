<?php

namespace App\Http\Controllers;

use App\Enums\LandingPageStatus;
use App\Models\LandingPage;
use Illuminate\View\View;

class LandingPagePublicController extends Controller
{
    public function __invoke(string $slug): View
    {
        $landingPage = LandingPage::where('slug', $slug)
            ->where('status', LandingPageStatus::Published)
            ->firstOrFail();

        $content = $landingPage->resolvedContent();

        return view("landing-pages.templates.{$landingPage->template->value}", compact('landingPage', 'content'));
    }
}
