<x-layouts.public title="Contact">

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span style="color: var(--color-heading);">Contact</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">Get In Touch</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                Let's talk about <span style="color: var(--color-accent-dark);">your project</span>
            </h1>
            <p class="text-lg leading-relaxed" style="color: var(--color-text-muted); max-width: 540px;">
                Tell us what you need — we'll get back to you within one business day.
            </p>
        </div>
    </div>
</section>

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 900px;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-12">
            @foreach([
                ['Fast Response', 'We reply within 24 hours, typically much sooner.'],
                ['Global Clients', 'Based in India, serving clients worldwide.'],
                ['Free Consultation', 'First call is always free, no strings attached.'],
            ] as [$title, $desc])
            <div class="card p-6">
                <h3 class="font-bold mb-1.5" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>

        <div class="rounded-2xl p-8 border" style="background-color: var(--color-bg); border-color: var(--color-border); box-shadow: var(--shadow-lg);">

            @if ($errors->any())
                <div class="mb-5 p-4 rounded-lg text-sm" style="background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c;">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Full Name</label>
                        <input class="form-input" type="text" name="name" value="{{ old('name') }}" placeholder="John Smith" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Email Address</label>
                        <input class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Subject</label>
                    <input class="form-input" type="text" name="subject" value="{{ old('subject', request('subject')) }}" placeholder="What can we help you with?">
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color: var(--color-heading);">Message</label>
                    <textarea class="form-input" name="message" rows="6" placeholder="Describe your project, goals, or questions..." required style="resize: vertical;">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full" style="padding: 0.9rem; justify-content: center;">
                    Send Message
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>

</x-layouts.public>
