<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\jobType;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class JobsController
{
    public function index(Request $request){
        $categoires = Category::where('status', 1)->get();
        $jobTypes = jobType::where('status', 1)->get();

        $jobs = Job::where('status', 1);
        // Search using keyword
        if(!empty($request->keyword)){
            $jobs = $jobs->where(function($query) use($request){
                $query->orWhere('title', 'LIKE', '%'.$request->keyword.'%');
                $query->orWhere('keywords', 'LIKE', '%'.$request->keyword.'%');
            });

        }
        // search using location
        if(!empty($request->location)){
            $jobs = $jobs->where('location',$request->location);
        }
        // search using category
        if(!empty($request->category)){
            $jobs = $jobs->where('category_id',$request->category);
        }
        // search using jobType
        $jobTypeArray = [];
        if(!empty($request->jobType)){
            $jobTypeArray = explode(',', $request->jobType);
            $jobs = $jobs->WhereIn('job_type_id',$jobTypeArray);
        }
         // search using experience
         if(!empty($request->experience)){
            $jobs = $jobs->where('experience',$request->experience);
        }


        $jobs =  $jobs->with(['jobType','category']);
        if($request->sort == 0){
            $jobs = $jobs->orderBy('created_at','ASC');
        }else{
            $jobs = $jobs->orderBy('created_at','DESC');
        }
        $jobs = $jobs->paginate(9);
        return view('front.jobs',[
            'categories' => $categoires,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }
}
