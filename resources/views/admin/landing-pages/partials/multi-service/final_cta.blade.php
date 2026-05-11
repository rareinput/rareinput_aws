<div class="space-y-5">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Final CTA Section</h3>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[final_cta][headline]" value="{{ old('content.final_cta.headline', $content['final_cta']['headline']) }}"
                   placeholder="Don't Miss This. Spots Are Filling Fast."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[final_cta][subheadline]" value="{{ old('content.final_cta.subheadline', $content['final_cta']['subheadline']) }}"
                   placeholder="Start 2025 with a competitive edge..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Button Text</label>
            <input type="text" name="content[final_cta][button_text]" value="{{ old('content.final_cta.button_text', $content['final_cta']['button_text']) }}"
                   placeholder="Claim My Discount Now"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>
</div>
