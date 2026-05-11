<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\View\View;

class CareersController extends Controller
{
    public function __invoke(): View
    {
        $jobs = JobPosting::active()->latest()->get();

        return view('careers', compact('jobs'));
    }
}
