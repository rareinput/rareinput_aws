<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' — Admin' : 'Admin — Rare Input' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen" style="background-color: var(--color-brand-50); color: var(--color-text);">

    <header class="shadow-sm" style="background-color: var(--color-bg); border-bottom: 1px solid var(--color-border);">
        <div class="mx-auto flex items-center justify-between px-6 py-4" style="max-width: var(--max-width);">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.posts.index') }}" class="text-lg font-bold" style="color: var(--color-heading);">
                    Rare Input <span class="text-sm font-normal" style="color: var(--color-text-muted);">Admin</span>
                </a>
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium" style="color: var(--color-text-muted);">
                    <a href="{{ route('admin.posts.index') }}" class="hover:text-gray-900 transition-colors">Posts</a>
                    <a href="{{ route('admin.posts.create') }}" class="hover:text-gray-900 transition-colors">New Post</a>
                </nav>
            </div>
            <div class="flex items-center gap-4 text-sm" style="color: var(--color-text-muted);">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline" style="color: var(--color-text-muted);">Logout</button>
                </form>
            </div>
        </div>
    </header>

    @if (session('success'))
        <div class="text-sm text-center py-3" style="background-color: var(--color-accent-light); color: var(--color-accent-dark);">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="text-sm text-center py-3 bg-red-50 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <main class="mx-auto px-6 py-10" style="max-width: var(--max-width);">
        {{ $slot }}
    </main>

</body>
</html>
