@props(['testimonials'])

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-12">
            <span class="section-label">Testimonials</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">What our clients say</h2>
        </div>

        <div class="relative" x-data="testimonialCarousel({{ count($testimonials) }})">

            {{-- Track --}}
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (current * 100) + '%)'">
                    @foreach($testimonials as $t)
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="card p-8 mx-auto" style="max-width: 700px;">
                            <div class="flex gap-1 mb-5">
                                @for($i = 0; $i < 5; $i++)
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: var(--color-accent);"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                @endfor
                            </div>
                            <p class="leading-relaxed mb-6" style="font-size: 1rem; color: var(--color-text-muted);">"{{ $t['quote'] }}"</p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0" style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
                                    {{ strtoupper(substr($t['name'], 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-sm" style="color: var(--color-heading);">{{ $t['name'] }}</p>
                                    <p class="text-xs" style="color: var(--color-text-muted);">{{ $t['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev / Next --}}
            <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 w-10 h-10 rounded-full flex items-center justify-center border shadow-sm transition-colors hover:bg-white" style="background-color: var(--color-bg); border-color: var(--color-border); color: var(--color-heading);">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 w-10 h-10 rounded-full flex items-center justify-center border shadow-sm transition-colors hover:bg-white" style="background-color: var(--color-bg); border-color: var(--color-border); color: var(--color-heading);">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            {{-- Dots --}}
            <div class="flex justify-center gap-2 mt-8">
                @foreach($testimonials as $i => $t)
                <button @click="current = {{ $i }}" class="w-2 h-2 rounded-full transition-all" :style="current === {{ $i }} ? 'background-color: var(--color-accent-dark); width: 1.5rem;' : 'background-color: var(--color-border);'"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
function testimonialCarousel(total) {
    return {
        current: 0,
        total: total,
        next() { this.current = (this.current + 1) % this.total; },
        prev() { this.current = (this.current - 1 + this.total) % this.total; },
    }
}
</script>
