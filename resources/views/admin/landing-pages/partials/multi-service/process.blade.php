<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Process Section</h3>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
        <input type="text" name="content[process][headline]" value="{{ old('content.process.headline', $content['process']['headline']) }}"
               placeholder="Get Started in 3 Steps"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn); max-width: 400px;">
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['process']['steps'] ?? [])) }},
        addItem() { if (this.items.length < 5) this.items.push({ number: '', title: '', description: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Steps (up to 5)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 5"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Step</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-3 rounded border" style="border-color: var(--color-border);">
                    <div class="grid grid-cols-6 gap-3 items-center">
                        <input type="text" :name="`content[process][steps][${index}][number]`"
                               x-model="item.number" placeholder="01"
                               class="px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[process][steps][${index}][title]`"
                               x-model="item.title" placeholder="Claim Your Spot"
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <input type="text" :name="`content[process][steps][${index}][description]`"
                               x-model="item.description" placeholder="Fill the form below. Takes 60 seconds."
                               class="col-span-2 px-3 py-2 text-sm border rounded outline-none"
                               style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline">Remove</button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
