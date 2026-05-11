<div class="space-y-6">
    <h3 class="text-base font-bold" style="color: var(--color-heading);">Services Section</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Headline</label>
            <input type="text" name="content[services][headline]" value="{{ old('content.services.headline', $content['services']['headline']) }}"
                   placeholder="Everything Your Store Needs to Win"
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subheadline</label>
            <input type="text" name="content[services][subheadline]" value="{{ old('content.services.subheadline', $content['services']['subheadline']) }}"
                   placeholder="From scratch or existing store..."
                   class="w-full px-4 py-2.5 text-sm border rounded outline-none"
                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
        </div>
    </div>

    <div x-data="{
        items: {{ json_encode(array_values($content['services']['services'] ?? [])) }},
        addItem() { if (this.items.length < 8) this.items.push({ icon: '', title: '', description: '', bullets: ['', '', ''] }) },
        removeItem(i) { this.items.splice(i, 1) },
        addBullet(i) { this.items[i].bullets.push('') },
        removeBullet(i, j) { this.items[i].bullets.splice(j, 1) }
    }">
        <div class="flex items-center justify-between mb-3">
            <label class="text-sm font-medium" style="color: var(--color-heading);">Services (up to 8)</label>
            <button type="button" @click="addItem" :disabled="items.length >= 8"
                    class="text-xs font-semibold hover:underline" style="color: var(--color-accent-dark);">+ Add Service</button>
        </div>
        <div class="space-y-4">
            <template x-for="(item, index) in items" :key="index">
                <div class="p-4 rounded border" style="border-color: var(--color-border);">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold" style="color: var(--color-text-muted);" x-text="`Service ${index + 1}`"></span>
                        <button type="button" @click="removeItem(index)" class="text-xs text-red-500 hover:underline">Remove</button>
                    </div>
                    <div class="grid grid-cols-5 gap-3 mb-3">
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Icon (emoji)</label>
                            <input type="text" :name="`content[services][services][${index}][icon]`"
                                   x-model="item.icon" placeholder="🛍️"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div>
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Title</label>
                            <input type="text" :name="`content[services][services][${index}][title]`"
                                   x-model="item.title" placeholder="Custom Theme Development"
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs mb-1" style="color: var(--color-text-muted);">Description</label>
                            <input type="text" :name="`content[services][services][${index}][description]`"
                                   x-model="item.description" placeholder="Bespoke Shopify themes built pixel-by-pixel..."
                                   class="w-full px-3 py-2 text-sm border rounded outline-none"
                                   style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-xs font-medium" style="color: var(--color-text-muted);">Bullet Points</label>
                            <button type="button" @click="addBullet(index)"
                                    class="text-xs hover:underline" style="color: var(--color-accent-dark);">+ Add Bullet</button>
                        </div>
                        <div class="space-y-1.5">
                            <template x-for="(bullet, j) in item.bullets" :key="j">
                                <div class="flex gap-2">
                                    <input type="text" :name="`content[services][services][${index}][bullets][${j}]`"
                                           x-model="item.bullets[j]" placeholder="Bullet point text"
                                           class="flex-1 px-3 py-1.5 text-sm border rounded outline-none"
                                           style="border-color: var(--color-border); border-radius: var(--radius-btn);">
                                    <button type="button" @click="removeBullet(index, j)" class="text-xs text-red-400 hover:underline px-1">×</button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
            <template x-if="items.length === 0">
                <p class="text-sm py-4 text-center" style="color: var(--color-text-muted);">No services added yet. Click "+ Add Service".</p>
            </template>
        </div>
    </div>
</div>
