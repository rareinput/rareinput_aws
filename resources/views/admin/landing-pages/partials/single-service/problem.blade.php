<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Problem Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[problem][headline]" value="{{ old('content.problem.headline', $content['problem']['headline']) }}"
                   placeholder="Most Shopify Stores Leave Money on the Table"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[problem][subheadline]" value="{{ old('content.problem.subheadline', $content['problem']['subheadline']) }}"
                   placeholder="Sound Familiar?"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['problem']['problems'] ?? [])) }},
        addItem() { if (this.items.length < 6) this.items.push({ icon: '', title: '', description: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Problems (up to 6)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 6"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Problem</button>
        </div>
        <div class="space-y-3">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 rounded border relative" style="border-color: var(--color-border);">
                    <button type="button" @click="removeItem(index)"
                            class="absolute top-3 right-3 text-xs text-red-500 hover:underline">Remove</button>
                    <div class="grid grid-cols-5 gap-3">
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Icon (emoji)</label>
                            <input type="text" :name="`content[problem][problems][${index}][icon]`"
                                   x-model="item.icon" placeholder="🐌"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Title</label>
                            <input type="text" :name="`content[problem][problems][${index}][title]`"
                                   x-model="item.title" placeholder="Slow Load Times"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Description</label>
                            <input type="text" :name="`content[problem][problems][${index}][description]`"
                                   x-model="item.description" placeholder="Every extra second costs you 7% in conversions..."
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No problems added yet. Click "+ Add Problem".</p>
            </template>
        </div>
    </div>
</div>
