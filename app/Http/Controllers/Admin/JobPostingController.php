<?php

namespace App\Http\Controllers\Admin;

use App\Enums\JobExperience;
use App\Enums\JobType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobPostingRequest;
use App\Http\Requests\Admin\UpdateJobPostingRequest;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobPostingController extends Controller
{
    public function index(): View
    {
        $jobs = JobPosting::latest()->paginate(20);

        return view('admin.job-postings.index', compact('jobs'));
    }

    public function create(): View
    {
        $types       = JobType::cases();
        $experiences = JobExperience::cases();

        return view('admin.job-postings.create', compact('types', 'experiences'));
    }

    public function store(StoreJobPostingRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        JobPosting::create($data);

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'Job posting created successfully.');
    }

    public function edit(JobPosting $jobPosting): View
    {
        $types       = JobType::cases();
        $experiences = JobExperience::cases();

        return view('admin.job-postings.edit', compact('jobPosting', 'types', 'experiences'));
    }

    public function update(UpdateJobPostingRequest $request, JobPosting $jobPosting): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        $jobPosting->update($data);

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'Job posting updated successfully.');
    }

    public function destroy(JobPosting $jobPosting): RedirectResponse
    {
        $jobPosting->delete();

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'Job posting deleted.');
    }
}
