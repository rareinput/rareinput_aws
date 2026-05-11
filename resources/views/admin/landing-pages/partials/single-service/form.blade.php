<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Form Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[form][headline]" value="{{ old('content.form.headline', $content['form']['headline']) }}"
                   placeholder="Get a Free Shopify Audit — No Strings Attached"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[form][subheadline]" value="{{ old('content.form.subheadline', $content['form']['subheadline']) }}"
                   placeholder="We'll analyse your store for speed, conversion blockers..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Form Subject <span class="text-red-500">*</span></label>
        <input type="text" name="content[form][form_subject]" value="{{ old('content.form.form_subject', $content['form']['form_subject']) }}"
               placeholder="e.g. Shopify Development — Free Store Audit Request"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        <p class="text-xs mt-1" style="color: var(--color-text-muted);">Appears in your inbox as the email subject so you know which page it came from.</p>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Dropdown Label</label>
        <input type="text" name="content[form][dropdown_label]" value="{{ old('content.form.dropdown_label', $content['form']['dropdown_label']) }}"
               placeholder="What's Your Main Challenge?"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn); max-width: 400px;">
    </div>

    {{-- Dropdown Options --}}
    <div x-data="{
        items: {{ json_encode(array_values($content['form']['dropdown_options'] ?? [])) }},
        addItem() { this.items.push({ label: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Dropdown Options</label>
            <button type="button" @click="addItem"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Option</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="flex gap-2">
                    <input type="text" :name="`content[form][dropdown_options][${index}][label]`"
                           x-model="item.label" placeholder="Low conversion rate"
                           class="flex-1 px-3 py-2 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline px-2">Remove</button>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-xs" style="color: var(--color-text-muted);">No options yet — dropdown won't appear if empty.</p>
            </template>
        </div>
    </div>

    {{-- Checklist Items --}}
    <div x-data="{
        items: {{ json_encode(array_values($content['form']['checklist_items'] ?? [])) }},
        addItem() { if (this.items.length < 8) this.items.push({ text: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Audit Checklist Items (up to 8)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 8"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Item</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="flex gap-2">
                    <input type="text" :name="`content[form][checklist_items][${index}][text]`"
                           x-model="item.text" placeholder="PageSpeed & Core Web Vitals report"
                           class="flex-1 px-3 py-2 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline px-2">Remove</button>
                </div>
            </template>
        </div>
    </div>

    {{-- Trust Tags --}}
    <div x-data="{
        items: {{ json_encode(array_values($content['form']['trust_tags'] ?? [])) }},
        addItem() { this.items.push({ text: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Trust Tags</label>
            <button type="button" @click="addItem"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Tag</button>
        </div>
        <div class="flex flex-wrap gap-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="flex gap-1 items-center">
                    <input type="text" :name="`content[form][trust_tags][${index}][text]`"
                           x-model="item.text" placeholder="D2C Brands"
                           class="px-3 py-1.5 text-sm border rounded outline-none w-32"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400">×</button>
                </div>
            </template>
        </div>
    </div>
</div>
