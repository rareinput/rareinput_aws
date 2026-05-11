<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Services Section</h3>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[services][headline]" value="{{ old('content.services.headline', $content['services']['headline']) }}"
                   placeholder="30% Off On All Services"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[services][subheadline]" value="{{ old('content.services.subheadline', $content['services']['subheadline']) }}"
                   placeholder="Pick one or combine multiple..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Discount Badge Text</label>
            <input type="text" name="content[services][discount_badge]" value="{{ old('content.services.discount_badge', $content['services']['discount_badge']) }}"
                   placeholder="30% OFF"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['services']['services'] ?? [])) }},
        addItem() { if (this.items.length < 8) this.items.push({ icon: '', title: '', description: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Services (up to 8)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 8"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Service</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-3 rounded border" style="border-color: var(--color-border);">
                    <div class="grid grid-cols-6 gap-3 items-center">
                        <input type="text" :name="`content[services][services][${index}][icon]`"
                               x-model="item.icon" placeholder="🛍️"
                               class="px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[services][services][${index}][title]`"
                               x-model="item.title" placeholder="Shopify Development"
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[services][services][${index}][description]`"
                               x-model="item.description" placeholder="Custom Shopify stores built to convert..."
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline">Remove</button>
                    </div>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No services added yet.</p>
            </template>
        </div>
    </div>
</div>
