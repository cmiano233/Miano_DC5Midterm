<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicantController extends Controller
{
    /**
     * Show create applicant form
     */
    public function create(JobPost $jobPost)
    {
        return Inertia::render('Applicants/Create', [
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Store new applicant
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
        ]);

        Applicant::create([
            'job_post_id' => $validated['job_post_id'],
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'status'      => 'Pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Applicant added successfully.');
    }
}
