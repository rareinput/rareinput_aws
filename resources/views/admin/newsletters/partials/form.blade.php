<div>
    <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">Subject <span class="text-red-500">*</span></label>
    <input type="text" name="subject" value="{{ old('subject', $newsletter?->subject) }}" required class="form-input">
    @error('subject')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
</div>

<div>
    <div class="flex items-center justify-between mb-1">
        <label class="block text-sm font-medium" style="color: var(--color-heading);">Body <span class="text-red-500">*</span></label>
        <button type="button" id="toggle-html"
                class="text-xs font-semibold px-2.5 py-1 rounded border"
                style="color: var(--color-accent-dark); border-color: var(--color-accent-dark);">
            &lt;/&gt; HTML Source
        </button>
    </div>
    <input type="hidden" name="body" id="body-input">
    <div id="quill-editor" style="min-height: 400px; border: 1px solid var(--color-border); border-radius: var(--radius-btn); font-size: 0.875rem;"></div>
    <textarea id="html-editor"
              class="hidden w-full font-mono text-xs px-3 py-3 border outline-none resize-y"
              style="min-height: 400px; border-color: var(--color-border); border-radius: var(--radius-btn); background: var(--color-brand-50); color: var(--color-heading);"
              placeholder="Paste raw HTML here..."></textarea>
    @error('body')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
</div>

<div x-data="{ type: '{{ old('schedule_type', 'draft') }}' }">
    <label class="block text-sm font-medium mb-3" style="color: var(--color-heading);">Send Options</label>
    <div class="flex flex-col gap-3">

        <label class="flex items-start gap-3 p-4 rounded-xl border cursor-pointer transition-colors"
               :style="type === 'draft' ? 'border-color: var(--color-accent-dark); background: var(--color-accent-light);' : 'border-color: var(--color-border); background: var(--color-surface);'">
            <input type="radio" name="schedule_type" value="draft" x-model="type" class="mt-0.5" style="accent-color: var(--color-accent-dark);">
            <div>
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Save as Draft</p>
                <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">Don't send yet — save and come back later.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 p-4 rounded-xl border cursor-pointer transition-colors"
               :style="type === 'now' ? 'border-color: var(--color-accent-dark); background: var(--color-accent-light);' : 'border-color: var(--color-border); background: var(--color-surface);'">
            <input type="radio" name="schedule_type" value="now" x-model="type" class="mt-0.5" style="accent-color: var(--color-accent-dark);">
            <div>
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Send Now</p>
                <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">Send immediately to all active subscribers.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 p-4 rounded-xl border cursor-pointer transition-colors"
               :style="type === 'scheduled' ? 'border-color: var(--color-accent-dark); background: var(--color-accent-light);' : 'border-color: var(--color-border); background: var(--color-surface);'">
            <input type="radio" name="schedule_type" value="scheduled" x-model="type" class="mt-0.5" style="accent-color: var(--color-accent-dark);">
            <div class="flex-1">
                <p class="text-sm font-semibold" style="color: var(--color-heading);">Schedule</p>
                <p class="text-xs mt-0.5 mb-3" style="color: var(--color-text-muted);">Pick a date and time to send automatically.</p>
                <input type="datetime-local" name="scheduled_at"
                       value="{{ old('scheduled_at', $newsletter?->scheduled_at?->format('Y-m-d\TH:i')) }}"
                       x-show="type === 'scheduled'"
                       class="form-input text-sm"
                       style="max-width: 260px;">
                @error('scheduled_at')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
        </label>

    </div>
</div>

<div class="flex justify-end gap-3 pt-2">
    <a href="{{ route('admin.newsletters.index') }}"
       class="px-4 py-2 text-sm font-medium rounded border"
       style="border-color: var(--color-border); color: var(--color-text-muted); border-radius: var(--radius-btn);">
        Cancel
    </a>
    <button type="submit" class="btn-primary">Save Newsletter</button>
</div>
