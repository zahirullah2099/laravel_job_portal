<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\jobType;
use App\Models\Category;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Mail\jobNotification;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobsController
{
    public function index(Request $request)
    {
        $categoires = Category::where('status', 1)->get();
        $jobTypes = jobType::where('status', 1)->get();

        $jobs = Job::where('expiry_date', '>=', now())->where('status', 1);
        // Search using keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->orWhere('title', 'LIKE', '%' . $request->keyword . '%');
                $query->orWhere('keywords', 'LIKE', '%' . $request->keyword . '%');
            });
        }
        // search using location
        if (!empty($request->location)) {
            $jobs = $jobs->where('location', $request->location);
        }
        // search using category
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id', $request->category);
        }
        // search using jobType
        $jobTypeArray = [];
        if (!empty($request->jobType)) {
            $jobTypeArray = explode(',', $request->jobType);
            $jobs = $jobs->WhereIn('job_type_id', $jobTypeArray);
        }
        // search using experience
        if (!empty($request->experience)) {
            $jobs = $jobs->where('experience', $request->experience);
        }


        $jobs =  $jobs->with(['jobType', 'category']);
        if ($request->sort == 0) {
            $jobs = $jobs->orderBy('created_at', 'ASC');
        } else {
            $jobs = $jobs->orderBy('created_at', 'DESC');
        }
        $jobs = $jobs->paginate(9);
        return view('front.jobs', [
            'categories' => $categoires,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }

    // Job detail page
    public function detail($id)
    {
        $job = Job::where(['id' => $id, 'status' => 1])->with(['jobType', 'category'])->first();
        if ($job == null) {
            abort(404);
        }

        $count = 0;
        if (Auth::user()) {
            $count = SavedJob::where([
                'user_id' => Auth::id(),
                'job_id' => $id
            ])->count();
        }
        $applications = JobApplication::where('job_id', $id)->with('user')->get();

        return view('front.jobDetail', [
            'job' => $job,
            'count' => $count,
            'applications' => $applications
        ]);
    }


    public function applyJob(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);


        $id = $request->job_id;
        $job = Job::find($id);

        // If the job doesn't exist
        if ($job == null) {
            $message = 'Job does not exist';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // Check if the user is trying to apply for their own job
        $employer_id = $job->user_id;
        if ($employer_id == Auth::id()) {
            $message = 'You cannot apply to your own job.';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // Check if the user has already applied for this job
        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::id(),
            'job_id' => $id
        ])->count();

        if ($jobApplicationCount > 0) {
            $message = 'You cannot apply to the same job twice.';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');

            // Generate a unique name for the resume
            $resumeName = time() . '_' . $resume->getClientOriginalName();

            // Store the file in the 'public/resumes' folder
            $resumePath = $resume->move(public_path('resumes'), $resumeName);

            // Create the job application
            $jobApplication = new JobApplication();
            $jobApplication->user_id = Auth::id();
            $jobApplication->employer_id = $employer_id;
            $jobApplication->job_id = $id;
            $jobApplication->resume = $resumeName;  // Save the file path
            $jobApplication->applied_date = now();
            $jobApplication->save();

            // Send email notification to the employer
            $employer = User::find($employer_id);
            $mailData = [
                'employer' => $employer,
                'user' => Auth::user(),
                'job' => $job,
            ];

            Mail::to($employer->email)->send(new jobNotification($mailData));

            $message = 'You have successfully applied for the job';
            session()->flash('success', $message);
            return response()->json([
                'status' => true,
                'message' => $message,
            ]);
        } else {
            $message = 'Invalid resume file';
            session()->flash('resumeError', $message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }
    }




















    // SAVE JOB 
    public function saveJob(Request $request)
    {
        $id = $request->id;
        $job = Job::find($id);
        if ($job == null) {
            // session()->flash('error' , 'Job not found!');
            $message = 'Job not found!';
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // check if user already saved the job
        $count = SavedJob::where([
            'user_id' => Auth::id(),
            'job_id' => $id
        ])->count();
        if ($count > 0) {
            // session()->flash('error' , 'You have already saved the job');
            $message = 'You have already saved this job';
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // save the job
        $saveJob = new SavedJob();
        $saveJob->user_id = Auth::id();
        $saveJob->job_id = $id;
        $saveJob->save();
        // session()->flash('success' , 'You have successfully saved the job');
        $message = 'You have successfully saved the job';
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }
}
