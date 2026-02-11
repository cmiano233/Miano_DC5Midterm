<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPostController extends Controller
{
    /**
     * Display dashboard with job posts and applicants
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            // IMPORTANT: eager load applicants
            'jobPosts' => JobPost::with('applicants')->latest()->get()
        ]);
    }

    /**
     * Show create job post form
     */
    public function create()
    {
        return Inertia::render('JobPosts/Create');
    }

    /**
     * Store new job post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'nullable|string|max:255',
            'salary'      => 'nullable|numeric',
        ]);

        JobPost::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Job post created successfully.');
    }
}
