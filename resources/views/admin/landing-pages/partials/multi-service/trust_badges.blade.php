<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Trust Badges</h3>

    <div x-data="{
        items: {{ json_encode(array_values($content['trust_badges']['badges'] ?? [])) }},
        addItem() { if (this.items.length < 6) this.items.push({ text: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Badges (up to 6)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 6"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Badge</button>
        </div>
        <div class="space-y-2">
            <template x-for="(item, index) in items" :key="index">
                <div class="flex gap-2">
                    <input type="text" :name="`content[trust_badges][badges][${index}][text]`"
                           x-model="item.text" placeholder="50+ Brands Served"
                           class="flex-1 px-3 py-2 text-sm border rounded outline-none"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <button type="button" @click="removeItem(index)" class="text-xs text-red-400 hover:underline px-2">Remove</button>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-3 text-center" style="color: var(--color-text-muted);">No badges yet.</p>
            </template>
        </div>
        <p class="text-xs mt-2" style="color: var(--color-text-muted);">Shown as a row of trust signals below the hero section.</p>
    </div>
</div>
