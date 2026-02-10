<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPostController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'jobPosts' => JobPost::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('JobPosts/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
        ]);

        JobPost::create($request->all());

        return redirect()->route('dashboard');
    }
}
