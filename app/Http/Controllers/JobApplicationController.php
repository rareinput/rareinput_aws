<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Mail\ApplicationAcknowledgement;
use App\Mail\NewApplicationNotification;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    public function show(JobPosting $jobPosting): View
    {
        abort_if(! $jobPosting->is_active, 404);

        return view('careers.apply', compact('jobPosting'));
    }

    public function store(StoreJobApplicationRequest $request, JobPosting $jobPosting): RedirectResponse
    {
        abort_if(! $jobPosting->is_active, 404);

        $resumePath = $request->file('resume')->store('resumes', 'local');

        $portfolioUrls = array_values(
            array_filter($request->input('portfolio_urls', []), fn ($u) => filled($u))
        );

        $application = JobApplication::create([
            'job_posting_id'    => $jobPosting->id,
            'name'              => $request->name,
            'email'             => $request->email,
            'work_email'        => $request->work_email,
            'phone'             => $request->phone,
            'experience'        => $request->experience,
            'highest_education' => $request->highest_education,
            'university'        => $request->university,
            'linkedin_url'      => $request->linkedin_url,
            'portfolio_urls'    => empty($portfolioUrls) ? null : $portfolioUrls,
            'cover_note'        => $request->cover_note,
            'resume_path'       => $resumePath,
        ]);

        Mail::to(config('careers.admin_email'))->send(new NewApplicationNotification($application));
        $ackMail = new ApplicationAcknowledgement($application);
        $to = array_filter([$application->email, $application->work_email]);
        Mail::to(array_shift($to))->cc($to)->send($ackMail);

        return redirect()
            ->route('careers')
            ->with('success', 'Your application has been submitted. We will be in touch soon!');
    }
}
