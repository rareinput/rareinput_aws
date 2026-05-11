<x-layouts.public title="Apply — {{ $jobPosting->title }}">

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('careers') }}" class="hover:underline">Careers</a>
            <span>/</span>
            <span style="color: var(--color-heading);">Apply</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Job Application</span>
            <h1 class="font-extrabold leading-none mb-4" style="font-size: clamp(2.25rem, 4vw, 3.25rem); letter-spacing: -0.035em; color: var(--color-heading);">
                {{ $jobPosting->title }}
            </h1>
            <div class="flex flex-wrap items-center gap-3">
                <span class="px-2.5 py-1 text-xs font-semibold rounded-full" style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">{{ $jobPosting->type->value }}</span>
                <span class="text-sm" style="color: var(--color-text-muted);">{{ $jobPosting->location }}</span>
                <span class="text-sm" style="color: var(--color-text-muted);">{{ $jobPosting->experience->value }}</span>
            </div>
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: 760px;">

        @if ($errors->any())
            <div class="mb-8 p-4 rounded-xl text-sm" style="background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('careers.apply.store', $jobPosting) }}"
              enctype="multipart/form-data" class="space-y-8">
            @csrf
            <input type="hidden" name="job_posting_id" value="{{ $jobPosting->id }}">

            {{-- Personal Details --}}
            <div>
                <h2 class="font-bold mb-5" style="font-size: 1.1rem; color: var(--color-heading); letter-spacing: -0.01em;">Personal Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Full Name <span class="text-red-500">*</span></label>
                        <input class="form-input" type="text" name="name" value="{{ old('name') }}" required placeholder="John Smith">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Personal Email <span class="text-red-500">*</span></label>
                        <input class="form-input" type="email" name="email" value="{{ old('email') }}" required placeholder="john@gmail.com">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Current Work Email <span style="font-weight:400;color:var(--color-text-muted);">(if applicable)</span></label>
                        <input class="form-input" type="email" name="work_email" value="{{ old('work_email') }}" placeholder="john@company.com">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Phone Number <span class="text-red-500">*</span></label>
                        <input class="form-input" type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+91 98765 43210">
                    </div>
                </div>
            </div>

            {{-- Background --}}
            <div>
                <h2 class="font-bold mb-5" style="font-size: 1.1rem; color: var(--color-heading); letter-spacing: -0.01em;">Background</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Work Experience <span style="font-weight:400;color:var(--color-text-muted);">(brief summary)</span></label>
                        <input class="form-input" type="text" name="experience" value="{{ old('experience') }}" placeholder="e.g. 3 years as a Shopify developer at XYZ Agency">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Highest Education <span class="text-red-500">*</span></label>
                        <input class="form-input" type="text" name="highest_education" value="{{ old('highest_education') }}" required placeholder="e.g. Bachelor of Technology">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">University / Institution <span class="text-red-500">*</span></label>
                        <input class="form-input" type="text" name="university" value="{{ old('university') }}" required placeholder="e.g. Mumbai University">
                    </div>
                </div>
            </div>

            {{-- Online Presence --}}
            <div>
                <h2 class="font-bold mb-5" style="font-size: 1.1rem; color: var(--color-heading); letter-spacing: -0.01em;">Online Presence</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">LinkedIn URL</label>
                        <input class="form-input" type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/yourprofile">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-2 tracking-wide" style="color: var(--color-heading);">
                            Portfolio & Other URLs
                            <span style="font-weight:400;color:var(--color-text-muted);">(GitHub, Behance, Dribbble, personal site, etc.)</span>
                        </label>
                        <div id="portfolio-list" class="space-y-2">
                            @foreach(old('portfolio_urls', ['']) as $url)
                            <div class="flex gap-2">
                                <input type="url" name="portfolio_urls[]" value="{{ $url }}"
                                       class="form-input" placeholder="https://...">
                                <button type="button" onclick="removeUrl(this)"
                                        class="btn-secondary flex-shrink-0" style="padding:0.5rem 0.875rem;">
                                    Remove
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-url" class="mt-3 text-sm font-semibold flex items-center gap-1.5" style="color: var(--color-accent-dark); background: none; border: none; cursor: pointer; padding: 0;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
                            Add another URL
                        </button>
                    </div>
                </div>
            </div>

            {{-- Application --}}
            <div>
                <h2 class="font-bold mb-5" style="font-size: 1.1rem; color: var(--color-heading); letter-spacing: -0.01em;">Your Application</h2>
                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Applying For</label>
                        <div class="form-input" style="background-color: var(--color-surface); cursor: default;">{{ $jobPosting->title }}</div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Cover Note <span class="text-red-500">*</span></label>
                        <textarea class="form-input" name="cover_note" rows="6" required
                                  placeholder="Tell us why you are a great fit for this role and what you would bring to the team..."
                                  style="resize: vertical;">{{ old('cover_note') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Resume <span class="text-red-500">*</span></label>
                        <input class="form-input" type="file" name="resume" accept=".pdf,.doc,.docx" required>
                        <p class="text-xs mt-1.5" style="color: var(--color-text-muted);">PDF, DOC or DOCX — max 5MB</p>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-primary" style="padding: 0.9rem 2.5rem; font-size: 1rem;">
                Submit Application
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>
    </div>
</section>

<script>
    function removeUrl(btn) {
        btn.closest('.flex').remove();
    }

    document.getElementById('add-url').addEventListener('click', function () {
        const list = document.getElementById('portfolio-list');
        const wrapper = document.createElement('div');
        wrapper.className = 'flex gap-2';
        wrapper.innerHTML = `
            <input type="url" name="portfolio_urls[]" class="form-input" placeholder="https://...">
            <button type="button" onclick="removeUrl(this)" class="btn-secondary flex-shrink-0" style="padding:0.5rem 0.875rem;">Remove</button>
        `;
        list.appendChild(wrapper);
    });
</script>

</x-layouts.public>
