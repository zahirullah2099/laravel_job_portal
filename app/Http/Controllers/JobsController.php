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

        $jobs = Job::where('status', 1);
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
        if(Auth::user()){
            $count = SavedJob::where([
                'user_id' => Auth::id(),
                'job_id' => $id
        ])->count();
        }
        $applications= JobApplication::where('job_id', $id)->with('user')->get(); 
    
        return view('front.jobDetail', [
                            'job' => $job, 
                             'count' => $count,
                             'applications' => $applications
                            ]);
    }

    // apply for job
    public function applyJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first(); 
        // if job does not exist
        if ($job == null) {
            $message = 'Job does not exist';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // you cannot apply on your own job
        $employer_id = $job->user_id; 
        if ($employer_id == Auth::id()) {
            $message = 'you cannot apply on your own job';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' =>  $message
            ]);
        }
        // you cannot apply on the same job twice
        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::id(),
            'job_id' => $id
        ])->count();

        if($jobApplicationCount > 0){
            $message = 'you cannot apply on the same job twice';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' =>  $message
            ]);
        }

        // save the application
        $jobApplication = new JobApplication();
        $jobApplication->user_id = Auth::id();
        $jobApplication->employer_id  = $employer_id;
        $jobApplication->job_id = $id;
        $jobApplication->applied_date = now();
        $jobApplication->save(); 
        // send notification email to employer
        $employer = User::where('id', $employer_id)->first();  

        $mailData = [
            'employer' => $employer,
            'user' => Auth::user(),
            'job' => $job,
        ];
        
        Mail::to($employer->email)->send(new jobNotification($mailData));

        $message = 'you have successfully applied for the job';
        session()->flash('success', $message);
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }

    // SAVE JOB 
    public function saveJob(Request $request){
        $id = $request->id;
        $job = Job::find($id);
        if($job == null){
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
        if($count > 0){
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
