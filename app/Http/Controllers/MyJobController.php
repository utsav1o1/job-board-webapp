<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\UJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    public function index()
    { 
        Gate::authorize('viewAnyEmployer', UJob::class);
        return view(
            'my_job.index',
            [
                'jobs' => auth()->user()->employer
                    ->ujobs()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                    ->get()
            ]
        );
    }

    public function create()
    { 
        Gate::authorize('create', UJob::class);
        return view('my_job.create');
    }

    public function store(JobRequest $request)
    {  
        Gate::authorize('create', UJob::class);
        auth()->user()->employer->jobs()->create($request->validated());
        
        return redirect()->route('my-jobs.index')
        ->with('success', 'Job created successfully.');
    }
    
    public function edit(UJob $myJob)
    {
        Gate::authorize('update', UJob::class);
        
        return view('my_job.edit', ['job' => $myJob]);
    }
    
    public function update(JobRequest $request, UJob $myJob)
    {
        //
        Gate::authorize('update', UJob::class);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }
}
