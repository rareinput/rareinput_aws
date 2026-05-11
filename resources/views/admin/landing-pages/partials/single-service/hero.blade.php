<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Hero Section</h3>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Badge Text</label>
        <input type="text" name="content[hero][badge]" value="{{ old('content.hero.badge', $content['hero']['badge']) }}"
               placeholder="e.g. Shopify Development Agency"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline Line 1</label>
            <input type="text" name="content[hero][headline_line1]" value="{{ old('content.hero.headline_line1', $content['hero']['headline_line1']) }}"
                   placeholder="Your Shopify Store"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Line 2 <span class="font-normal text-xs" style="color: var(--color-text-muted);">(gradient)</span></label>
            <input type="text" name="content[hero][headline_line2]" value="{{ old('content.hero.headline_line2', $content['hero']['headline_line2']) }}"
                   placeholder="Should Be Selling."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Line 3</label>
            <input type="text" name="content[hero][headline_line3]" value="{{ old('content.hero.headline_line3', $content['hero']['headline_line3']) }}"
                   placeholder="Not Just Existing."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
        <textarea name="content[hero][subheadline]" rows="2"
                  class="w-full px-4 py-2.5 text-sm border rounded outline-none resize-none"
                  style="border-color: var(--color-border); border-radius: var(--radius-btn);"
                  placeholder="We build Shopify stores engineered for conversion...">{{ old('content.hero.subheadline', $content['hero']['subheadline']) }}</textarea>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Primary CTA Text</label>
            <input type="text" name="content[hero][primary_cta]" value="{{ old('content.hero.primary_cta', $content['hero']['primary_cta']) }}"
                   placeholder="Get a Free Store Audit"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Secondary CTA Text</label>
            <input type="text" name="content[hero][secondary_cta]" value="{{ old('content.hero.secondary_cta', $content['hero']['secondary_cta']) }}"
                   placeholder="See Our Work"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Secondary CTA URL</label>
            <input type="text" name="content[hero][secondary_url]" value="{{ old('content.hero.secondary_url', $content['hero']['secondary_url']) }}"
                   placeholder="/services/shopify"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    {{-- Stats --}}
    <div>
        <label class="block text-sm font-medium mb-3" style="color: var(--color-heading);">Stats (up to 4)</label>
        <div class="grid grid-cols-4 gap-3">
            @for($i = 0; $i < 4; $i++)
            <div class="p-3 rounded border space-y-2" style="border-color: var(--color-border);">
                <input type="text" name="content[hero][stats][{{ $i }}][value]"
                       value="{{ old("content.hero.stats.{$i}.value", $content['hero']['stats'][$i]['value'] ?? '') }}"
                       placeholder="40+"
                       class="w-full px-3 py-2 text-sm border rounded outline-none"
                       style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                <input type="text" name="content[hero][stats][{{ $i }}][label]"
                       value="{{ old("content.hero.stats.{$i}.label", $content['hero']['stats'][$i]['label'] ?? '') }}"
                       placeholder="Stores Built"
                       class="w-full px-3 py-2 text-sm border rounded outline-none"
                       style="border-color: var(--color-border); border-radius: var(--radius-btn);">
            </div>
            @endfor
        </div>
        <p class="text-xs mt-2" style="color: var(--color-text-muted);">Leave value blank to hide a stat.</p>
    </div>
</div>
