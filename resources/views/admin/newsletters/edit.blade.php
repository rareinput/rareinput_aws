<x-layouts.admin title="Edit Newsletter">

    <div class="mb-8">
        <a href="{{ route('admin.newsletters.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Newsletters</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">Edit Newsletter</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded text-sm text-red-700 bg-red-50" style="border-radius: var(--radius-card);">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form id="newsletter-form" method="POST" action="{{ route('admin.newsletters.update', $newsletter) }}" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.newsletters.partials.form', ['newsletter' => $newsletter])
    </form>

    @include('admin.newsletters.partials.editor-scripts', ['body' => old('body', $newsletter->body)])

</x-layouts.admin>
