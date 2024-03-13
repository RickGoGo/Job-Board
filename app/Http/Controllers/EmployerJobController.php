<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerJobRequest;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployerJobController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Job::class, 'employer_job');   //be careful the parameter name.
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = auth()->user()->employer->jobs()
            ->with(['employer', 'applications', 'applications.user'])
            ->withCount('applications')
            ->withAvg('applications', 'expected_salary')
            ->withTrashed()
            ->latest()
            ->get();
        return view(
            'employer.job.index',
            ['jobs' => $jobs]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployerJobRequest $request)
    {
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('employer-jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $employerJob)
    {
        return redirect()->route('jobs.show', $employerJob);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $employerJob)
    {
        return view('employer.job.edit', ['job' => $employerJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerJobRequest $request, Job $employerJob)
    {
        $employerJob->update($request->validated());

        return redirect()->route('employer-jobs.index', $employerJob)->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $employerJob)
    {
        $employerJob->delete();

        return redirect()->route('employer-jobs.index')->with('success', 'Job deleted successfuly.');
    }
}
