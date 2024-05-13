<?php

namespace App\Http\Controllers;

use App\Models\UJob;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  

        Gate::authorize('viewAny', UJob::class);
        $filters = $request->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        //  dd($filters);
        // $job->when(request('search'), function ($query) {

        //     $query->where(function ($query) {
        //         $query->where('title', 'like', '%' . request('search') . '%')
        //             ->orWhere('description', 'like', '%' . request('search') . '%');
        //     });
        // })->when(request('min_salary'), function ($query) {
        //     $query->where('salary', '>=', request('min_salary'));
        // })->when(request('max_salary'), function ($query) {
        //     $query->where('salary', '<=', request('max_salary'));
        // })->when(request('experience'),function($query){
        //     $query->where('experience',request('experience'));
        // })->when(request('category'),function($query){
        //     $query->where('category',request('category'));
        // });

        return view('job.index', ['jobs' => UJob::with('employer')->latest()->filter($filters)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UJob $job)
    {
        Gate::authorize('view',$job);

        return view('job.show', ['job'=>$job->load('employer.ujobs')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UJob $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UJob $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UJob $job)
    {
        //
    }
}
