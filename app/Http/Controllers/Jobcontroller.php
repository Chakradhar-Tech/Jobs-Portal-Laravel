<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class Jobcontroller extends Controller
{

    public function index()
    {
        return view('jobs.index');
    }

    public function getJobs(){
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return response()->json($jobs);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' =>$job]);
    }

    public function ajaxStore()
    {
        request()->validate([
            'title'=> 'required|min:3',
            'salary'=>'required'
        ]);
         $job = Job::create([
            'title'=>request('title'),
            'salary'=>request('salary'),
            'employer_id'=>1
         ]);

            Mail::to($job->employer->user)->queue(
                new JobPosted($job)
            );

         return response()->json([
            'message'=>'created new job successfully.',
            'job'=>$job
        ]);
    }

    public function edit(Job $job)
    {
        // Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' =>$job]);
    }

    public function update(Job $job)
    {

        // Gate::authorize('edit', $job);

        request()->validate([
            'title'=>'required|min:3',
            'salary'=>'required'
        ]);

        $job->update([
            'title' =>request('title'),
            'salary'=>request('salary')
        ]);

        return response()->json([
            'message'=>'successfully updated the job'
        ]);
    }

    public function destroy(Job $job)
    {

        Gate::authorize('edit', $job);


        $job->delete();

        return response()->json([
            'message'=>'Job Deleted successfully.'
        ]);

    }
}
