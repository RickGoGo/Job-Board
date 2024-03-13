<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Application::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with([
            'job' => fn ($query) => $query->withCount('applications')
                ->withAvg('applications', 'expected_salary')
                ->withTrashed(),
            'job.employer'
        ])->where('user_id', auth()->user()->id)->latest()->get();

        return view('application.index', ['applications' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('create', [Application::class, $job]);
        return view('application.create', ['job' => $job->load(['employer'])]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $this->authorize('create', [Application::class, $job]);

        $data = $request->validate([
            'expected_salary' => ['required', 'numeric', 'between:4000,500000']
        ]);

        $job->applications()->create([
            'user_id' => auth()->user()->id,
            'expected_salary' => $data['expected_salary']
        ]);

        return redirect()->route('my-application.index')->with('success', 'applied successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, Application $application)
    {
        $this->authorize('delete', [Application::class, $application]);

        $application->delete();

        return redirect()->route('my-application.index')->with('success', 'cancelled successfully');
    }
}
