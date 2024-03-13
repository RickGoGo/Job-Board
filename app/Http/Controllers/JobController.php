<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::filter(request()->only('search', 'salary_from', 'salary_to', 'experience', 'category'))
            ->latest()->get();

        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $job = $job->load(['employer', 'employer.jobs']);
        return view('job.show', ['job' => $job]);
    }
}
