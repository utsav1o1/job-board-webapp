<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        $applications = $user->jobApplications()
            ->with([
                'ujob' => fn ($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary'), 'ujob.employer'
            ])
            ->latest()
            ->get();

        return view('my_job_application.index', compact('applications'));
    }




    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application removed.');
    }
}
