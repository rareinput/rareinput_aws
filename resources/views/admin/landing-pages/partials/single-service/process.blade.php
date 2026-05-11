<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Process Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[process][headline]" value="{{ old('content.process.headline', $content['process']['headline']) }}"
                   placeholder="From Brief to Live in 4 Weeks"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[process][subheadline]" value="{{ old('content.process.subheadline', $content['process']['subheadline']) }}"
                   placeholder="A structured process that keeps you informed..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['process']['steps'] ?? [])) }},
        addItem() { if (this.items.length < 6) this.items.push({ number: '', title: '', description: '', timeframe: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Steps (up to 6)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 6"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Step</button>
        </div>
        <div class="space-y-3">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 rounded border relative" style="border-color: var(--color-border);">
                    <button type="button" @click="removeItem(index)"
                            class="absolute top-3 right-3 text-xs text-red-500 hover:underline">Remove</button>
                    <div class="grid grid-cols-6 gap-3">
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Step #</label>
                            <input type="text" :name="`content[process][steps][${index}][number]`"
                                   x-model="item.number" placeholder="1"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Timeframe</label>
                            <input type="text" :name="`content[process][steps][${index}][timeframe]`"
                                   x-model="item.timeframe" placeholder="Day 1"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Title</label>
                            <input type="text" :name="`content[process][steps][${index}][title]`"
                                   x-model="item.title" placeholder="Discovery Call"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Description</label>
                            <input type="text" :name="`content[process][steps][${index}][description]`"
                                   x-model="item.description" placeholder="We understand your brand, goals..."
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No steps added yet.</p>
            </template>
        </div>
    </div>
</div>
