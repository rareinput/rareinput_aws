<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services.index');
    }

    public function shopify(): View
    {
        return view('services.shopify');
    }

    public function wordpress(): View
    {
        return view('services.wordpress');
    }

    public function webDevelopment(): View
    {
        return view('services.web-development');
    }

    public function appDevelopment(): View
    {
        return view('services.app-development');
    }

    public function seo(): View
    {
        return view('services.seo');
    }

    public function performanceMarketing(): View
    {
        return view('services.performance-marketing');
    }

    public function emailMarketing(): View
    {
        return view('services.email-marketing');
    }

    public function socialMedia(): View
    {
        return view('services.social-media');
    }
}
