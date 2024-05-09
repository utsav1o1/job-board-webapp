<?php

namespace App\Http\Controllers;

use App\Models\UJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('job.index',['jobs'=>UJob::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
       

        return view('job.show',compact('job'));

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
