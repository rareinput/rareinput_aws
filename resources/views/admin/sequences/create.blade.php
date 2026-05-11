<x-layouts.admin title="New Sequence">

    <div class="mb-8">
        <a href="{{ route('admin.sequences.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Sequences</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">New Email Sequence</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.sequences.store') }}" class="space-y-8" style="max-width: 800px;" id="sequence-form">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Sequence Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required class="form-input" placeholder="e.g. Email Marketing Crash Course">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Interval Between Emails <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-2">
                    <input type="number" name="interval_days" value="{{ old('interval_days', 1) }}" min="1" required class="form-input" style="max-width: 100px;">
                    <span class="text-sm" style="color: var(--color-text-muted);">day(s)</span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Description</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-input" placeholder="Optional internal note">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base font-semibold" style="color: var(--color-heading);">Emails in Sequence</h2>
                <button type="button" id="add-email-btn"
                        class="px-3 py-1.5 text-xs font-semibold rounded border transition-colors hover:opacity-80"
                        style="border-color: var(--color-brand-900); color: var(--color-brand-900); border-radius: var(--radius-btn);">
                    Add Email
                </button>
            </div>

            <div id="emails-container" class="space-y-6">
                @foreach (old('emails', [['subject' => '', 'body' => '']]) as $index => $email)
                <div class="email-block rounded-xl border p-6 space-y-4" style="border-color: var(--color-border);">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold email-label" style="color: var(--color-heading);">Email {{ $index + 1 }}</span>
                        <button type="button" class="remove-email-btn text-xs text-red-500 hover:underline" {{ $index === 0 ? 'style=display:none' : '' }}>Remove</button>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Subject <span class="text-red-500">*</span></label>
                        <input type="text" name="emails[{{ $index }}][subject]" value="{{ $email['subject'] }}" required class="form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Body <span class="text-red-500">*</span></label>
                        <textarea name="emails[{{ $index }}][body]" rows="6" required class="form-input" style="resize: vertical; font-family: monospace; font-size: 0.875rem;">{{ $email['body'] }}</textarea>
                        <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Plain text. Use line breaks for paragraphs.</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">Create Sequence</button>
            <a href="{{ route('admin.sequences.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>

    <template id="email-template">
        <div class="email-block rounded-xl border p-6 space-y-4" style="border-color: var(--color-border);">
            <div class="flex items-center justify-between">
                <span class="text-sm font-semibold email-label" style="color: var(--color-heading);">Email __INDEX__</span>
                <button type="button" class="remove-email-btn text-xs text-red-500 hover:underline">Remove</button>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Subject <span class="text-red-500">*</span></label>
                <input type="text" name="emails[__INDEX__][subject]" required class="form-input">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Body <span class="text-red-500">*</span></label>
                <textarea name="emails[__INDEX__][body]" rows="6" required class="form-input" style="resize: vertical; font-family: monospace; font-size: 0.875rem;"></textarea>
                <p class="mt-1 text-xs" style="color: var(--color-text-muted);">Plain text. Use line breaks for paragraphs.</p>
            </div>
        </div>
    </template>

    <script>
        const container = document.getElementById('emails-container');
        const addBtn = document.getElementById('add-email-btn');
        const template = document.getElementById('email-template');

        function rebuildLabels() {
            container.querySelectorAll('.email-label').forEach((el, i) => {
                el.textContent = 'Email ' + (i + 1);
            });
            const blocks = container.querySelectorAll('.email-block');
            blocks.forEach((block, i) => {
                block.querySelector('.remove-email-btn').style.display = i === 0 ? 'none' : '';
            });
        }

        addBtn.addEventListener('click', () => {
            const index = container.querySelectorAll('.email-block').length;
            const html = template.innerHTML.replaceAll('__INDEX__', index);
            const wrapper = document.createElement('div');
            wrapper.innerHTML = html;
            const block = wrapper.firstElementChild;
            block.querySelector('.remove-email-btn').addEventListener('click', () => {
                block.remove();
                rebuildLabels();
            });
            container.appendChild(block);
            rebuildLabels();
        });

        container.querySelectorAll('.remove-email-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.email-block').remove();
                rebuildLabels();
            });
        });
    </script>

</x-layouts.admin>
