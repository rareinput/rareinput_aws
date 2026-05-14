<x-layouts.public
    title="Mobile & Web App Development Agency"
    description="We build custom mobile and web applications — from MVPs to enterprise-grade products. Scalable architecture, clean code, and on-time delivery."
    :canonical="route('services.app-development')"
>
<x-slot name="head">
<script type="application/ld+json">{!! json_encode([
    "\x40context"    => 'https://schema.org',
    "\x40type"       => 'Service',
    "\x40id"         => route('services.app-development') . '#service',
    'name'        => 'App Development',
    'url'         => route('services.app-development'),
    'description' => 'Custom mobile and web application development — from MVPs to enterprise-grade products. Scalable architecture and on-time delivery.',
    'provider'    => ["\x40type" => 'Organization', 'name' => 'Rare Input', 'url' => route('home')],
    'serviceType' => 'App Development',
    'areaServed'  => 'Worldwide',
    'image'       => config('app.url') . '/og-default.jpg',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context" => 'https://schema.org',
    "\x40type"    => 'FAQPage',
    'mainEntity'  => [
        ["\x40type" => 'Question', 'name' => 'Do you build native or cross-platform mobile apps?', 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We build both. For most projects we recommend cross-platform frameworks like React Native for efficiency, but we can build fully native iOS or Android apps when the project requires it.']],
        ["\x40type" => 'Question', 'name' => 'Can you take over an existing app or codebase?',    'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. We are comfortable picking up existing projects. We will start with a code review to understand the current state and then agree on the best path forward.']],
        ["\x40type" => 'Question', 'name' => 'How do you handle project scoping?',                 'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'We invest time upfront to define requirements, user flows, and technical architecture. This reduces surprises mid-project and ensures we are building the right thing.']],
        ["\x40type" => 'Question', 'name' => 'Who owns the code after the project?',               'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'You do. Upon full payment, all code and assets are yours. We will deliver a full handover including documentation and repository access.']],
        ["\x40type" => 'Question', 'name' => 'Do you offer post-launch maintenance?',              'acceptedAnswer' => ["\x40type" => 'Answer', 'text' => 'Yes. We offer ongoing maintenance and support retainers to handle bug fixes, dependency updates, and new features after launch.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode([
    "\x40context"        => 'https://schema.org',
    "\x40type"           => 'BreadcrumbList',
    'itemListElement'    => [
        ["\x40type" => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => url('/')],
        ["\x40type" => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
        ["\x40type" => 'ListItem', 'position' => 3, 'name' => 'App Development', 'item' => route('services.app-development')],
    ],
], JSON_UNESCAPED_SLASHES) !!}</script>
</x-slot>

<section class="px-6 py-24 border-b" style="background: linear-gradient(155deg, var(--color-surface) 0%, var(--color-accent-light) 100%); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex items-center gap-2 mb-8 text-sm" style="color: var(--color-text-muted);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:underline">Services</a>
            <span>/</span>
            <span style="color: var(--color-heading);">App Development</span>
        </div>
        <div class="max-w-2xl">
            <span class="section-label">App Development</span>
            <h1 class="font-extrabold leading-none mb-6" style="font-size: clamp(2.75rem, 5vw, 4rem); letter-spacing: -0.035em; color: var(--color-heading);">
                App <span style="color: var(--color-accent-dark);">Development</span>
            </h1>
            <p class="text-lg leading-relaxed mb-10" style="color: var(--color-text-muted); max-width: 540px;">
                Custom web apps, portals, dashboards, and iOS/Android mobile apps — built to solve real business problems and scale with your growth.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('contact') }}" class="btn-primary text-base" style="padding: 0.875rem 2.25rem;">
                    Discuss My App Idea
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#process" class="text-sm font-semibold" style="color: var(--color-text-muted);">See how it works ↓</a>
            </div>
        </div>
    </div>
</section>

<section class="px-6 py-10 border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="flex flex-wrap items-center justify-center gap-12">
            @foreach([['iOS + Android','Single codebase, both platforms'],['8–16 wks','Typical web or mobile app timeline'],['You own it','Full code & IP handover on completion']] as [$stat,$label])
            <div class="text-center">
                <div class="font-extrabold" style="font-size: 1.6rem; color: var(--color-heading); letter-spacing: -0.03em;">{{ $stat }}</div>
                <div class="text-xs font-medium mt-1" style="color: var(--color-text-muted);">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-14">
            <div>
                <span class="section-label">What's Included</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">From idea to shipped product</h2>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">We handle the full product lifecycle — from scoping and design to development, testing, and deployment.</p>
            </div>
            <ul class="space-y-4 lg:pt-2">
                @foreach([
                    'Web application development (Laravel, Next.js)',
                    'iOS & Android mobile app development',
                    'Admin dashboards & portals',
                    'REST API design & development',
                    'Database architecture & optimisation',
                    'Third-party service integrations',
                    'Authentication & role-based access',
                    'Ongoing maintenance & support',
                ] as $item)
                <li class="flex items-start gap-3 text-sm" style="color: var(--color-text);">
                    <span class="mt-0.5 flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center" style="background-color: var(--color-accent-light);">
                        <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" style="color: var(--color-accent-dark);"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    {{ $item }}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['iOS & Android', 'Native and cross-platform mobile apps for both major platforms.'],
                ['Web Apps', 'Powerful browser-based applications built for scale.'],
                ['Dashboards', 'Data-rich admin interfaces that make management easy.'],
                ['Secure by Design', 'Built with security best practices from the ground up.'],
            ] as [$title, $desc])
            <div class="card p-6">
                <h3 class="font-bold mb-2" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="process" class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="text-center mb-16">
            <span class="section-label">Our Process</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">How we work</h2>
            <p class="mx-auto leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted); max-width: 460px;">A structured approach that turns complex requirements into reliable software.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['01', 'Scoping', 'We define features, user flows, and technical requirements in detail.'],
                ['02', 'Design', 'UX wireframes and UI designs reviewed and iterated with you.'],
                ['03', 'Build & Test', 'Agile development with regular builds and thorough QA testing.'],
                ['04', 'Deploy & Support', 'Smooth deployment with ongoing monitoring and support.'],
            ] as [$step, $title, $desc])
            <div class="card p-7">
                <span class="block text-4xl font-extrabold mb-4" style="color: var(--color-accent-light); letter-spacing: -0.05em;">{{ $step }}</span>
                <h3 class="font-bold mb-2" style="font-size: 1rem; color: var(--color-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="section-label">Why Rare Input</span>
                <h2 class="font-extrabold mb-6" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">We build products,<br>not just features.</h2>
                <p class="leading-relaxed mb-6" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    A lot of agencies will build exactly what you spec — nothing more. We go further by asking the right questions up front, so we build the right product the first time.
                </p>
                <p class="leading-relaxed" style="font-size: 0.975rem; color: var(--color-text-muted);">
                    Our developers think like product owners. From database design to user flows, every decision is made with scalability, security, and real-world usage in mind.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
                @foreach([
                    ['End-to-end ownership', 'We own the full stack — design, API, database, and deployment.'],
                    ['Built to scale', 'Architecture decisions are made for where you are going, not just where you are now.'],
                    ['Security first', 'Auth, permissions, and data handling are treated as core requirements, not afterthoughts.'],
                    ['No handover headaches', 'Clean code, documentation, and a full walkthrough when we ship.'],
                ] as [$title, $desc])
                <div class="p-5 rounded-xl border" style="border-color: var(--color-border); background-color: var(--color-surface);">
                    <h3 class="font-bold mb-1" style="font-size: 0.9rem; color: var(--color-heading);">{{ $title }}</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="px-6 py-12 border-t border-b" style="background: linear-gradient(135deg, var(--color-brand-900) 0%, #2a2017 100%); border-color: var(--color-brand-900);">
    <div class="mx-auto flex flex-col sm:flex-row items-center justify-between gap-6" style="max-width: var(--max-width);">
        <div>
            <p class="font-bold text-white mb-1" style="font-size: 1.05rem;">Have an app idea you want to ship?</p>
            <p class="text-sm" style="color: var(--color-brand-400);">We scope, design, build, and deploy — from idea to live product.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn-accent shrink-0">
            Discuss My Idea
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

<section class="px-6 py-24" style="background-color: var(--color-surface);">
    <div class="mx-auto" style="max-width: 760px;">
        <div class="text-center mb-12">
            <span class="section-label">FAQ</span>
            <h2 class="font-extrabold mb-4" style="font-size: 2rem; letter-spacing: -0.03em; color: var(--color-heading);">Frequently asked questions</h2>
        </div>
        <div class="space-y-4">
            @foreach([
                ['Do you build native or cross-platform mobile apps?', 'We build both. For most projects we recommend cross-platform frameworks like React Native or Flutter as they allow us to ship on iOS and Android simultaneously. For projects with specific native requirements, we can build natively.'],
                ['Can you take over an existing app or codebase?', 'Yes. We are comfortable picking up existing projects. We will start with a code review to understand the current state before estimating the work involved.'],
                ['How do you handle project scoping?', 'We invest time upfront to define requirements, user flows, and technical architecture before writing any code. This prevents costly changes mid-project and ensures we are all aligned on what is being built.'],
                ['Who owns the code after the project?', 'You do. Upon full payment, all code and assets are yours. We will deliver a full handover including documentation and access to all repositories and services.'],
                ['Do you offer post-launch maintenance?', 'Yes. We offer ongoing maintenance and support retainers to handle bug fixes, dependency updates, and new feature development after the initial launch.'],
            ] as [$q, $a])
            <details class="group rounded-xl border" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer font-semibold text-sm list-none" style="color: var(--color-heading);">
                    {{ $q }}
                    <svg class="flex-shrink-0 transition-transform group-open:rotate-180" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="px-6 pb-5 text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $a }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-16 border-t border-b" style="background-color: var(--color-surface); border-color: var(--color-border);">
    <div class="mx-auto" style="max-width: var(--max-width);">
        <p class="text-xs font-bold uppercase tracking-widest mb-6" style="color: var(--color-text-muted);">Pair this with</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach([
                ['Web Development', 'Need a marketing site or landing page to go alongside your app? We build those too.', 'services.web-development'],
                ['Performance Marketing', 'Acquire users fast with paid campaigns tuned to your app\'s onboarding funnel.', 'services.performance-marketing'],
            ] as [$title, $desc, $route])
            <a href="{{ route($route) }}" class="block p-7 rounded-xl border transition-colors duration-200 group hover:border-[var(--color-accent-dark)]" style="border-color: var(--color-border); background-color: var(--color-bg);">
                <div class="font-bold mb-2 group-hover:underline" style="font-size: 0.95rem; color: var(--color-heading);">{{ $title }}</div>
                <div class="text-sm leading-relaxed" style="color: var(--color-text-muted);">{{ $desc }}</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="px-6 py-24 text-center" style="background-color: var(--color-brand-900);">
    <div class="mx-auto" style="max-width: 600px;">
        <span class="section-label" style="color: var(--color-accent);">Ready to build?</span>
        <h2 class="font-extrabold mb-5 text-white" style="font-size: 2.25rem; letter-spacing: -0.03em; line-height: 1.2;">Let's bring your app idea to life</h2>
        <p class="leading-relaxed mb-10" style="font-size: 1rem; color: var(--color-brand-400);">Tell us about your idea and we'll get back to you within 24 hours.</p>
        <a href="{{ route('contact') }}" class="btn-accent">
            Start Building My App
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

</x-layouts.public>
