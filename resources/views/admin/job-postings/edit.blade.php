<x-layouts.admin title="Edit Job Posting">

    <div class="mb-8">
        <a href="{{ route('admin.job-postings.index') }}" class="text-sm hover:underline" style="color: var(--color-text-muted);">← Back to Job Postings</a>
        <h1 class="text-2xl font-bold mt-2" style="color: var(--color-heading);">Edit: {{ $jobPosting->title }}</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg text-sm text-red-700 bg-red-50">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.job-postings.update', $jobPosting) }}" class="space-y-6" style="max-width: 760px;">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $jobPosting->title) }}" required
                       class="form-input">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Department <span class="text-red-500">*</span></label>
                <input type="text" name="department" value="{{ old('department', $jobPosting->department) }}" required
                       class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Type <span class="text-red-500">*</span></label>
                <select name="type" required class="form-input">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}"
                                @selected(old('type', $jobPosting->type->value) === $type->value)>
                            {{ $type->value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Location <span class="text-red-500">*</span></label>
                <input type="text" name="location" value="{{ old('location', $jobPosting->location) }}" required
                       class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Experience Level <span class="text-red-500">*</span></label>
                <select name="experience" required class="form-input">
                    @foreach ($experiences as $exp)
                        <option value="{{ $exp->value }}"
                                @selected(old('experience', $jobPosting->experience->value) === $exp->value)>
                            {{ $exp->value }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1.5" style="color: var(--color-heading);">Description <span class="text-red-500">*</span></label>
            <textarea name="description" rows="6" required class="form-input" style="resize: vertical;">{{ old('description', $jobPosting->description) }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $jobPosting->is_active))
                   class="w-4 h-4 rounded" style="accent-color: var(--color-accent-dark);">
            <label for="is_active" class="text-sm font-medium" style="color: var(--color-heading);">
                Active <span style="color: var(--color-text-muted); font-weight: 400;">(visible on the public Careers page)</span>
            </label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">
                Update Job Posting
            </button>
            <a href="{{ route('admin.job-postings.index') }}" class="btn-secondary">
                Cancel
            </a>
        </div>
    </form>

</x-layouts.admin>
