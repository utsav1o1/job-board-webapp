<?php

namespace App\Http\Controllers;

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
                          ->with('ujob', 'ujob.employer')
                          ->latest()
                          ->get();

        return view('my_job_application.index', compact('applications'));
    }


    public function destroy(string $id)
    {
        //
    }
}
