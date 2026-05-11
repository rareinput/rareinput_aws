<div class="space-y-5">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Form Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[form][headline]" value="{{ old('content.form.headline', $content['form']['headline']) }}"
                   placeholder="Claim Your 30% Discount"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[form][subheadline]" value="{{ old('content.form.subheadline', $content['form']['subheadline']) }}"
                   placeholder="Fill in your details and we'll reach out within 24 hours..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Form Subject <span class="text-red-500">*</span></label>
        <input type="text" name="content[form][form_subject]" value="{{ old('content.form.form_subject', $content['form']['form_subject']) }}"
               placeholder="e.g. Christmas Offer — 30% Discount Enquiry"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        <p class="text-xs mt-1" style="color: var(--color-text-muted);">Appears in your inbox as the email subject so you know which page it came from.</p>
    </div>
</div>
