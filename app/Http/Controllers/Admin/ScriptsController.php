<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScriptsController extends Controller
{
    public function edit(): View
    {
        $headScripts   = json_decode(Setting::get('head_scripts', '[]'), true) ?? [];
        $footerScripts = json_decode(Setting::get('footer_scripts', '[]'), true) ?? [];

        return view('admin.scripts.edit', compact('headScripts', 'footerScripts'));
    }

    public function update(Request $request): RedirectResponse
    {
        $headScripts   = [];
        $footerScripts = [];

        foreach ($request->input('head_scripts', []) as $entry) {
            if (!empty(trim($entry['code'] ?? ''))) {
                $headScripts[] = [
                    'name' => trim($entry['name'] ?? ''),
                    'code' => trim($entry['code']),
                ];
            }
        }

        foreach ($request->input('footer_scripts', []) as $entry) {
            if (!empty(trim($entry['code'] ?? ''))) {
                $footerScripts[] = [
                    'name' => trim($entry['name'] ?? ''),
                    'code' => trim($entry['code']),
                ];
            }
        }

        Setting::set('head_scripts', json_encode($headScripts));
        Setting::set('footer_scripts', json_encode($footerScripts));

        return redirect()->route('admin.scripts.edit')->with('success', 'Scripts saved successfully.');
    }
}
