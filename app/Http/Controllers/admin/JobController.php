<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use App\Models\jobType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class JobController
{
    // public function index(){
    //     $jobs = Job::orderBy('created_at', 'DESC')->with('user','applications')->paginate(10); 
    //     return view('admin.jobs.allJobs', [
    //         'jobs' => $jobs
    //     ]);
    // }

    public function index() { 
        $jobs = Job::orderBy('created_at', 'DESC')->with('user', 'applications')->paginate(8);
        $expiredJobs = Job::where('expiry_date', '<', now())->count();
    
        return view('admin.jobs.allJobs', [
            'jobs' => $jobs,
            'expiredJobs' => $expiredJobs
        ]);
    }

    // edit job
    public function edit($id){
        $job = Job::findOrFail($id);
        $categories = Category::orderBy('created_at', 'ASC')->get(); 
        $jobTypes = jobType::orderBy('created_at', 'ASC')->get(); 
       return view('admin.jobs.edit',[
        'job' => $job,
        'categories' => $categories,
        'jobTypes' => $jobTypes,
       ]);
    }

    // update job
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'company_name' => 'required|max:75|min:3',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

            $job = Job::find($id);
            $job->title = $request->title;
            $job->category_id = $request->category;
            $job->job_type_id = $request->jobType;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->expiry_date = $request->expiry_date;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->benefits = $request->benefits;
            $job->responsibility = $request->responsibility;
            $job->qualification = $request->qualifications;
            $job->keywords = $request->keywords;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->website;
            $job->status = $request->status;
            $job->isFeatured = (!empty($request->isFeatured))? $request->isFeatured : 0;
            $job->save();
            session()->flash('success', 'Job updated successfully'); 
            return response()->json([
                'status' => true,
                'errors' => []
            ]);

            // return redirect()->route('account.myJob');

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // delete job
    public function destroy(Request $request){
        $id = $request->id;
        $job = Job::find($id);
        if($job == null){
            session()->flash('error', 'Either job deleted or not found');
            return response()->json([
                'status' => false, 
            ]);
        }
        $job->delete();
        session()->flash('success', 'Job deleted successfully'); 
        return response()->json([
            'status' => true, 
        ]);
    }

    // show all expired jobs
    public function expiredJobs(){
        $expiredJobs = Job::where('expiry_date', '<', now())->orderBy('created_at', 'DESC')->with('user','applications')->paginate(5);
        return view('admin.jobs.expiredJobs', [
            'expiredJobs' => $expiredJobs
        ]);
    }
}
