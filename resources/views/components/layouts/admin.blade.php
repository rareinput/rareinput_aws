<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' — Admin' : 'Admin — Rare Input' }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.3rem 0.625rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--color-text-muted);
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .sidebar-link:hover {
            background-color: var(--color-brand-100);
            color: var(--color-heading);
        }
        .sidebar-link.active {
            background-color: var(--color-accent-light);
            color: var(--color-accent-dark);
            font-weight: 600;
        }
        .sidebar-link svg { flex-shrink: 0; min-width: 16px; }
        .sidebar-label {
            overflow: hidden;
            transition: opacity 0.25s cubic-bezier(0.4,0,0.2,1), max-width 0.25s cubic-bezier(0.4,0,0.2,1), transform 0.25s cubic-bezier(0.4,0,0.2,1);
            max-width: 160px;
            transform: translateX(0);
            opacity: 1;
        }
        .sidebar-collapsed .sidebar-label {
            opacity: 0;
            max-width: 0;
            transform: translateX(-8px);
        }
        .sidebar-collapsed .sidebar-link { justify-content: center; padding-left: 0; padding-right: 0; }
        .sidebar-section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--color-text-muted);
            padding: 0 0.75rem;
            margin-top: 0.75rem;
            margin-bottom: 0.1rem;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.2s ease, max-height 0.25s ease;
            max-height: 2rem;
            opacity: 1;
        }
        .sidebar-collapsed .sidebar-section-label { opacity: 0; max-height: 0; margin: 0; }
        .admin-sidebar {
            width: 220px;
            transition: width 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .admin-sidebar.sidebar-collapsed {
            width: 52px;
        }
    </style>
</head>
<body style="background-color: var(--color-bg); color: var(--color-text); margin: 0; display: flex; min-height: 100vh;">

<div x-data="{ collapsed: localStorage.getItem('sidebar-collapsed') === 'true' }"
     x-init="$watch('collapsed', val => localStorage.setItem('sidebar-collapsed', val))"
     style="display: flex; width: 100%; min-height: 100vh;">

    {{-- Sidebar --}}
    <aside :class="collapsed ? 'admin-sidebar sidebar-collapsed' : 'admin-sidebar'"
           style="flex-shrink: 0; background-color: var(--color-brand-50); border-right: 1px solid var(--color-border); display: flex; flex-direction: column; overflow: hidden; position: sticky; top: 0; height: 100vh;">

        {{-- Logo --}}
        <div style="height: 56px; display: flex; align-items: center; border-bottom: 1px solid var(--color-border); flex-shrink: 0; padding: 0 0.75rem;">
            <a href="{{ route('admin.dashboard') }}"
               style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none; min-width: 0;">
                <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 6px; flex-shrink: 0; background-color: var(--color-heading);">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <path d="M2 3h5l3 5-3 5H2l3-5-3-5z" fill="white" opacity="0.9"/>
                        <path d="M8 3h5l-3 5 3 5H8l3-5-3-5z" fill="white" opacity="0.45"/>
                    </svg>
                </span>
                <span class="sidebar-label" style="font-size: 0.95rem; font-weight: 700; color: var(--color-heading); letter-spacing: -0.02em; white-space: nowrap;">Rare Input</span>
            </a>
        </div>

        {{-- Nav --}}
        <nav style="flex: 1; padding: 0.5rem 0.375rem; overflow-y: auto; overflow-x: hidden;">

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="sidebar-label">Dashboard</span>
            </a>

            <div class="sidebar-section-label">Content</div>

            <a href="{{ route('admin.posts.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span class="sidebar-label">Posts</span>
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>
                <span class="sidebar-label">Categories</span>
            </a>

            <a href="{{ route('admin.tags.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>
                <span class="sidebar-label">Tags</span>
            </a>

            <div class="sidebar-section-label">Marketing</div>

            <a href="{{ route('admin.landing-pages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.landing-pages.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                <span class="sidebar-label">Landing Pages</span>
            </a>

            <a href="{{ route('admin.subscribers.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span class="sidebar-label">Subscribers</span>
            </a>

            <a href="{{ route('admin.sequences.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.sequences.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span class="sidebar-label">Sequences</span>
            </a>

            <div class="sidebar-section-label">Careers</div>

            <a href="{{ route('admin.job-postings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.job-postings.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span class="sidebar-label">Jobs</span>
            </a>

            <a href="{{ route('admin.applications.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <span class="sidebar-label">Applications</span>
            </a>

            <div class="sidebar-section-label">Settings</div>

            <a href="{{ route('admin.scripts.edit') }}"
               class="sidebar-link {{ request()->routeIs('admin.scripts.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                <span class="sidebar-label">Scripts</span>
            </a>

        </nav>

        {{-- User + Logout --}}
        <div style="padding: 0.75rem; border-top: 1px solid var(--color-border); flex-shrink: 0;">
            @php $initials = collect(explode(' ', auth()->user()->name))->map(fn($w) => strtoupper($w[0]))->take(2)->implode(''); @endphp
            <div style="display: flex; align-items: center; gap: 0.625rem; padding: 0.4rem 0.625rem; margin-bottom: 0.125rem;">
                <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-accent-dark); color: #fff; font-size: 0.7rem; font-weight: 700; flex-shrink: 0;">{{ $initials }}</span>
                <span class="sidebar-label" style="font-size: 0.82rem; font-weight: 500; color: var(--color-heading); overflow: hidden; text-overflow: ellipsis;">{{ auth()->user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span class="sidebar-label">Logout</span>
                </button>
            </form>
        </div>

    </aside>

    {{-- Main content --}}
    <div style="flex: 1; display: flex; flex-direction: column; min-width: 0;">

        @if (session('success'))
            <div class="text-sm text-center py-3" style="background-color: var(--color-accent-light); color: var(--color-accent-dark); border-bottom: 1px solid var(--color-border);">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="text-sm text-center py-3 bg-red-50 text-red-700" style="border-bottom: 1px solid var(--color-border);">
                {{ session('error') }}
            </div>
        @endif

        <main style="flex: 1; padding: 2.5rem 2rem;">
            <style>.admin-page-header { min-height: 36px; }</style>
            {{ $slot }}
        </main>

    </div>

</div>

</body>
</html>
