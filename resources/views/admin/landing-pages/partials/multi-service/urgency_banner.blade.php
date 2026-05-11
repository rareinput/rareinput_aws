<div class="space-y-5">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Urgency Banner</h3>
    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Banner Text</label>
        <input type="text" name="content[urgency_banner][text]" value="{{ old('content.urgency_banner.text', $content['urgency_banner']['text']) }}"
               placeholder="🎄 OFFER ENDS DECEMBER 31 · ONLY 10 SPOTS AVAILABLE"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        <p class="text-xs mt-1" style="color: var(--color-text-muted);">Shown as a top bar above the nav. Leave blank to hide it.</p>
    </div>
</div>
