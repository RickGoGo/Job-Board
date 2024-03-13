<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|min:3'
        ]);

        $request->user()->employer()->create([
            'company_name' => $data['company_name']
        ]);

        return redirect()->intended(route('employer-jobs.index'))->with('success', 'Congts, you are an employer now.');
    }
}
