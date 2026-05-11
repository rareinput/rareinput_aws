<div class="space-y-5">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Nav</h3>
    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">CTA Button Text</label>
        <input type="text" name="content[nav][cta_text]" value="{{ old('content.nav.cta_text', $content['nav']['cta_text']) }}"
               placeholder="Claim My Discount"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn); max-width: 360px;">
        <p class="text-xs mt-1" style="color: var(--color-text-muted);">Button links to the form section.</p>
    </div>
</div>
