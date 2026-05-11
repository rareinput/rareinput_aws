<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">FAQ Section</h3>

    <div x-data="{
        items: {{ json_encode(array_values($content['faq']['faqs'] ?? [])) }},
        addItem() { if (this.items.length < 10) this.items.push({ question: '', answer: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">FAQs (up to 10)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 10"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add FAQ</button>
        </div>
        <div class="space-y-3">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 rounded border" style="border-color: var(--color-border);">
                    <div class="flex items-start justify-between mb-2">
                        <span class="text-xs font-semibold" style="color: var(--color-text-muted);" x-text="`FAQ ${index + 1}`"></span>
                        <button type="button" @click="removeItem(index)" class="text-xs text-red-500 hover:underline">Remove</button>
                    </div>
                    <input type="text" :name="`content[faq][faqs][${index}][question]`"
                           x-model="item.question" placeholder="How much does a custom Shopify store cost?"
                           class="w-full px-3 py-2 text-sm border rounded outline-none mb-2"
                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                    <textarea :name="`content[faq][faqs][${index}][answer]`"
                              x-model="item.answer" rows="2" placeholder="Answer..."
                              class="w-full px-3 py-2 text-sm border rounded outline-none resize-none"
                              style="border-color: var(--color-border); border-radius: var(--radius-btn);"></textarea>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No FAQs added yet.</p>
            </template>
        </div>
    </div>
</div>
