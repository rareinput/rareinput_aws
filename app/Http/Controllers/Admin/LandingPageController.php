<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LandingPageTemplate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLandingPageRequest;
use App\Http\Requests\Admin\UpdateLandingPageRequest;
use App\Models\LandingPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $landingPages = LandingPage::latest()->paginate(20);

        return view('admin.landing-pages.index', compact('landingPages'));
    }

    public function create(): View
    {
        $templates = LandingPageTemplate::cases();

        return view('admin.landing-pages.create', compact('templates'));
    }

    public function store(StoreLandingPageRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('landing-pages/og', 'public');
        }

        LandingPage::create($data);

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing page created successfully.');
    }

    public function edit(LandingPage $landingPage): View
    {
        $content = $landingPage->resolvedContent();
        $tabs = $this->tabsFor($landingPage->template);

        return view('admin.landing-pages.edit', compact('landingPage', 'content', 'tabs'));
    }

    public function update(UpdateLandingPageRequest $request, LandingPage $landingPage): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('og_image')) {
            if ($landingPage->og_image) {
                Storage::disk('public')->delete($landingPage->og_image);
            }
            $data['og_image'] = $request->file('og_image')->store('landing-pages/og', 'public');
        } elseif ($request->boolean('remove_og_image') && $landingPage->og_image) {
            Storage::disk('public')->delete($landingPage->og_image);
            $data['og_image'] = null;
        }

        unset($data['remove_og_image']);

        $landingPage->update($data);

        return redirect()->route('admin.landing-pages.edit', $landingPage)->with('success', 'Landing page updated successfully.');
    }

    public function destroy(LandingPage $landingPage): RedirectResponse
    {
        if ($landingPage->og_image) {
            Storage::disk('public')->delete($landingPage->og_image);
        }

        $landingPage->delete();

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing page deleted.');
    }

    public function duplicate(LandingPage $landingPage): RedirectResponse
    {
        $newPage = $landingPage->replicate();
        $newPage->name = $landingPage->name . ' (Copy)';
        $newPage->slug = Str::slug($newPage->name);
        $newPage->status = \App\Enums\LandingPageStatus::Draft;
        $newPage->og_image = null;
        $newPage->save();

        return redirect()->route('admin.landing-pages.edit', $newPage)->with('success', 'Page duplicated. You are now editing the copy.');
    }

    public function preview(LandingPage $landingPage): View
    {
        $content = $landingPage->resolvedContent();

        return view("landing-pages.templates.{$landingPage->template->value}", compact('landingPage', 'content'));
    }

    private function tabsFor(LandingPageTemplate $template): array
    {
        return match ($template) {
            LandingPageTemplate::SingleService => [
                'nav'          => 'Nav',
                'hero'         => 'Hero',
                'problem'      => 'Problem',
                'services'     => 'Services',
                'process'      => 'Process',
                'testimonials' => 'Testimonials',
                'why_us'       => 'Why Us',
                'form'         => 'Form',
                'faq'          => 'FAQ',
                'final_cta'    => 'Final CTA',
                'colors'       => '🎨 Colors',
            ],
            LandingPageTemplate::MultiService => [
                'nav'            => 'Nav',
                'urgency_banner' => 'Urgency Banner',
                'hero'           => 'Hero',
                'trust_badges'   => 'Trust Badges',
                'services'       => 'Services',
                'testimonials'   => 'Testimonials',
                'process'        => 'Process',
                'form'           => 'Form',
                'faq'            => 'FAQ',
                'final_cta'      => 'Final CTA',
                'colors'         => '🎨 Colors',
            ],
        };
    }
}
