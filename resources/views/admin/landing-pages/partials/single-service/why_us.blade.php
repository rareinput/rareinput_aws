<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Why Us Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[why_us][headline]" value="{{ old('content.why_us.headline', $content['why_us']['headline']) }}"
                   placeholder="We Only Win When You Do"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[why_us][subheadline]" value="{{ old('content.why_us.subheadline', $content['why_us']['subheadline']) }}"
                   placeholder="We're not a template shop..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    {{-- Reasons --}}
    <div x-data="{
        items: {{ json_encode(array_values($content['why_us']['reasons'] ?? [])) }},
        addItem() { if (this.items.length < 6) this.items.push({ title: '', description: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Reasons (up to 6)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 6"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Reason</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-3 rounded border" style="border-color: var(--color-border);">
                    <div class="grid grid-cols-3 gap-3 items-center">
                        <input type="text" :name="`content[why_us][reasons][${index}][title]`"
                               x-model="item.title" placeholder="Shopify-Only Focus"
                               class="px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[why_us][reasons][${index}][description]`"
                               x-model="item.description" placeholder="We don't do everything. We do Shopify exceptionally well."
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    </div>
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline mt-2">Remove</button>
                </div>
            </template>
        </div>
    </div>

    {{-- Stats --}}
    <div x-data="{
        items: {{ json_encode(array_values($content['why_us']['stats'] ?? [])) }},
        addItem() { if (this.items.length < 4) this.items.push({ value: '', label: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Stats Cards (up to 4)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 4"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Stat</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-3 rounded border" style="border-color: var(--color-border);">
                    <div class="grid grid-cols-3 gap-3 items-center">
                        <input type="text" :name="`content[why_us][stats][${index}][value]`"
                               x-model="item.value" placeholder="₹2.4 Cr+"
                               class="px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[why_us][stats][${index}][label]`"
                               x-model="item.label" placeholder="Revenue generated for clients in the last 12 months"
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    </div>
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline mt-2">Remove</button>
                </div>
            </template>
        </div>
    </div>
</div>
