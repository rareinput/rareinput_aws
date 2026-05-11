<x-layouts.admin title="Applications">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">
                Applications
                @if($applications->total() > 0)
                    <span class="ml-2 text-sm font-normal px-2 py-0.5 rounded-full" style="background-color:var(--color-surface);color:var(--color-text-muted);">{{ $applications->total() }}</span>
                @endif
            </h1>
        </div>
    </div>

    {{-- Filter --}}
    <form method="GET" class="flex items-center gap-3 mb-6">
        <select name="job_posting_id" class="form-input" style="max-width:280px;">
            <option value="">All positions</option>
            @foreach($jobs as $job)
                <option value="{{ $job->id }}" @selected(request('job_posting_id') == $job->id)>{{ $job->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary" style="padding:0.5rem 1.25rem;">Filter</button>
        @if(request('job_posting_id'))
            <a href="{{ route('admin.applications.index') }}" class="btn-secondary" style="padding:0.5rem 1.25rem;">Clear</a>
        @endif
    </form>

    @if($applications->isEmpty())
        <p style="color: var(--color-text-muted);">No applications yet.</p>
    @else
        <form method="POST" action="{{ route('admin.applications.bulk-destroy') }}" onsubmit="return confirm('Delete selected applications and their resumes?')" id="bulk-form">
            @csrf
            @method('DELETE')

            {{-- Bulk action bar --}}
            <div class="flex items-center gap-3 mb-3" x-data="{ selected: 0 }" x-init="
                $watch('selected', v => {});
                document.addEventListener('change', () => {
                    selected = document.querySelectorAll('.row-check:checked').length;
                });
            ">
                <span class="text-sm" style="color: var(--color-text-muted);" x-show="selected > 0" x-cloak>
                    <span x-text="selected"></span> selected
                </span>
                <button type="submit" form="bulk-form"
                        class="text-sm font-medium text-red-500 hover:underline"
                        x-show="selected > 0" x-cloak>
                    Delete Selected
                </button>
            </div>

            <div class="rounded-xl border overflow-hidden" style="border-color: var(--color-border);">
                <table class="w-full text-sm">
                    <thead style="background-color: var(--color-surface);">
                        <tr>
                            <th class="px-5 py-3 w-8">
                                <input type="checkbox" id="select-all" class="rounded" style="accent-color: var(--color-accent-dark);">
                            </th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Applicant</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Position</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Status</th>
                            <th class="text-left px-5 py-3 font-semibold" style="color: var(--color-heading);">Applied</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                        <tr class="border-t" style="border-color: var(--color-border);">
                            <td class="px-5 py-4 align-middle">
                                <input type="checkbox" name="ids[]" value="{{ $app->id }}" class="row-check rounded" style="accent-color: var(--color-accent-dark);">
                            </td>
                            <td class="px-5 py-4 align-middle">
                                <p class="font-medium" style="color: var(--color-heading);">{{ $app->name }}</p>
                                <p class="text-xs" style="color: var(--color-text-muted);">{{ $app->email }}</p>
                            </td>
                            <td class="px-5 py-4 align-middle" style="color: var(--color-text-muted);">{{ $app->jobPosting->title }}</td>
                            <td class="px-5 py-4 align-middle">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full" style="{{ $app->status->color() }}">
                                    {{ $app->status->value }}
                                </span>
                            </td>
                            <td class="px-5 py-4 align-middle text-xs" style="color: var(--color-text-muted);">{{ $app->created_at->format('d M Y') }}</td>
                            <td class="px-5 py-4 align-middle text-right">
                                <div class="flex items-center justify-end gap-4">
                                    <a href="{{ route('admin.applications.show', $app) }}"
                                       class="text-xs font-medium hover:underline" style="color: var(--color-accent-dark);">View</a>
                                    <form method="POST" action="{{ route('admin.applications.destroy', $app) }}"
                                          onsubmit="return confirm('Delete this application and resume?')"
                                          class="flex items-center">
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
        </form>

        <div class="mt-6">{{ $applications->appends(request()->query())->links() }}</div>
    @endif

    <script>
        document.getElementById('select-all')?.addEventListener('change', function () {
            document.querySelectorAll('.row-check').forEach(cb => {
                cb.checked = this.checked;
                cb.dispatchEvent(new Event('change', { bubbles: true }));
            });
        });
    </script>

</x-layouts.admin>
