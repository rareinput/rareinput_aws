<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Hero Section</h3>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Badge Text</label>
        <input type="text" name="content[hero][badge]" value="{{ old('content.hero.badge', $content['hero']['badge']) }}"
               placeholder="🎄 Christmas Special Offer — Limited Time"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
        <input type="text" name="content[hero][headline]" value="{{ old('content.hero.headline', $content['hero']['headline']) }}"
               placeholder="Grow Your Business This Christmas"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
        <textarea name="content[hero][subheadline]" rows="2"
                  class="w-full px-4 py-2.5 text-sm border rounded outline-none resize-none"
                  style="border-color: var(--color-border); border-radius: var(--radius-btn);"
                  placeholder="Shopify stores, SEO, Performance Marketing...">{{ old('content.hero.subheadline', $content['hero']['subheadline']) }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">CTA Button Text</label>
            <input type="text" name="content[hero][cta_text]" value="{{ old('content.hero.cta_text', $content['hero']['cta_text']) }}"
                   placeholder="Claim My 30% Discount"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Countdown End Date</label>
            <input type="date" name="content[hero][countdown_end_date]" value="{{ old('content.hero.countdown_end_date', $content['hero']['countdown_end_date']) }}"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
            <p class="text-xs mt-1" style="color: var(--color-text-muted);">Leave blank to hide the countdown timer.</p>
        </div>
    </div>
</div>
