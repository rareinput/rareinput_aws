<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Testimonials Section</h3>

    <div>
        <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
        <input type="text" name="content[testimonials][headline]" value="{{ old('content.testimonials.headline', $content['testimonials']['headline']) }}"
               placeholder="Stores That Sell More"
               class="w-full px-4 py-2.5 text-sm border rounded outline-none"
               style="border-color: var(--color-border); border-radius: var(--radius-btn); max-width: 480px;">
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['testimonials']['testimonials'] ?? [])) }},
        addItem() { if (this.items.length < 6) this.items.push({ quote: '', name: '', role: '', result_badge: '' }) },
        removeItem(i) { this.items.splice(i, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Testimonials (up to 6)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 6"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Testimonial</button>
        </div>
        <div class="space-y-3">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 rounded border" style="border-color: var(--color-border);">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold" style="color: var(--color-text-muted);" x-text="`Testimonial ${index + 1}`"></span>
                        <button type="button" @click="removeItem(index)" class="text-xs text-red-500 hover:underline">Remove</button>
                    </div>
                    <div class="space-y-3">
                        <textarea :name="`content[testimonials][testimonials][${index}][quote]`"
                                  x-model="item.quote" rows="2" placeholder="We were on a Debut theme for 3 years..."
                                  class="w-full px-3 py-2 text-sm border rounded outline-none resize-none"
                                  style="border-color: var(--color-border); border-radius: var(--radius-btn);"></textarea>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="text" :name="`content[testimonials][testimonials][${index}][name]`"
                                   x-model="item.name" placeholder="Riya Kapoor"
                                   class="px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                            <input type="text" :name="`content[testimonials][testimonials][${index}][role]`"
                                   x-model="item.role" placeholder="Founder, Bloom Skincare"
                                   class="px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                            <input type="text" :name="`content[testimonials][testimonials][${index}][result_badge]`"
                                   x-model="item.result_badge" placeholder="+121% CVR"
                                   class="px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No testimonials added yet.</p>
            </template>
        </div>
    </div>
</div>
