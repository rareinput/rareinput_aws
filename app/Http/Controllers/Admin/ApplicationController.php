<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $jobs = JobPosting::orderBy('title')->get();

        $applications = JobApplication::with('jobPosting')
            ->when($request->filled('job_posting_id'), fn ($q) => $q->where('job_posting_id', $request->job_posting_id))
            ->latest()
            ->paginate(25);

        return view('admin.applications.index', compact('applications', 'jobs'));
    }

    public function show(JobApplication $application): View
    {
        $application->load('jobPosting');
        $statuses = ApplicationStatus::cases();

        return view('admin.applications.show', compact('application', 'statuses'));
    }

    public function update(Request $request, JobApplication $application): RedirectResponse
    {
        $request->validate([
            'status' => ['required', new Enum(ApplicationStatus::class)],
        ]);

        $application->update(['status' => $request->status]);

        return redirect()
            ->route('admin.applications.show', $application)
            ->with('success', 'Status updated.');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate(['ids' => ['required', 'array'], 'ids.*' => ['integer', 'exists:job_applications,id']]);

        $applications = JobApplication::whereIn('id', $request->ids)->get();

        foreach ($applications as $application) {
            if ($application->resume_path && Storage::disk('local')->exists($application->resume_path)) {
                Storage::disk('local')->delete($application->resume_path);
            }
            $application->delete();
        }

        return redirect()->route('admin.applications.index')->with('success', count($applications) . ' application(s) deleted.');
    }

    public function destroy(JobApplication $application): RedirectResponse
    {
        if ($application->resume_path && Storage::disk('local')->exists($application->resume_path)) {
            Storage::disk('local')->delete($application->resume_path);
        }

        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Application deleted.');
    }

    public function download(JobApplication $application): StreamedResponse
    {
        abort_unless(Storage::disk('local')->exists($application->resume_path), 404);

        $ext = pathinfo($application->resume_path, PATHINFO_EXTENSION);

        return Storage::disk('local')->download(
            $application->resume_path,
            'Resume — ' . $application->name . '.' . $ext
        );
    }
}
