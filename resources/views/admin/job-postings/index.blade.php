<x-layouts.admin title="Job Postings">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Job Postings</h1>
        </div>
        <a href="{{ route('admin.job-postings.create') }}"
           class="px-4 py-2 text-white text-sm font-semibold rounded transition-opacity hover:opacity-90"
           style="background-color: var(--color-brand-900); border-radius: var(--radius-btn);">
            New Job Posting
        </a>
    </div>

    @if ($jobs->isEmpty())
        <p style="color: var(--color-text-muted);">No job postings yet. <a href="{{ route('admin.job-postings.create') }}" class="underline" style="color: var(--color-accent-dark);">Create one.</a></p>
    @else
        <div class="rounded-xl border overflow-hidden" style="border-color: var(--color-border);">
            <table class="w-full text-sm">
                <thead style="background-color: var(--color-surface);">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Title</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Department</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Type</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Location</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Experience</th>
                        <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr class="border-t" style="border-color: var(--color-border);">
                        <td class="px-5 py-4 font-medium" style="color: var(--color-heading);">{{ $job->title }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $job->department }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $job->type->value }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $job->location }}</td>
                        <td class="px-5 py-4" style="color: var(--color-text-muted);">{{ $job->experience->value }}</td>
                        <td class="px-5 py-4">
                            @if ($job->is_active)
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: #dcfce7; color: #166534;">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full font-medium" style="background-color: var(--color-surface); color: var(--color-text-muted);">Hidden</span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('admin.job-postings.edit', $job) }}"
                                   class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">Edit</a>
                                <form method="POST" action="{{ route('admin.job-postings.destroy', $job) }}"
                                      onsubmit="return confirm('Delete this job posting?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-medium hover:underline text-red-500">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $jobs->links() }}</div>
    @endif

</x-layouts.admin>
