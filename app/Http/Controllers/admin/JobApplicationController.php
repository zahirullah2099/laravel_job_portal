<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController
{
    public function index(){
        $jobApplications = JobApplication::orderBy('created_at', 'DESC')
            ->with('user','job','employer')
            ->paginate(10);
        return view('admin.job_applications.list', [
            'jobApplications' => $jobApplications
        ]);
    }

    // delete job application
    public function destroy(Request $request){
        $id = $request->id;
        $jobApplication = JobApplication::find($id);
    
        if ($jobApplication == null) {
            session()->flash('error', 'Either job application deleted or not found');
            return response()->json(['status' => false]);
        }
    
        // Get the resume file path
        $resumePath = public_path('resumes/' . $jobApplication->resume);
    
        // Delete the resume file if it exists
        if (file_exists($resumePath)) {
            unlink($resumePath);
        }
    
        // Delete the job application record
        $jobApplication->delete();
    
        session()->flash('success', 'Job application deleted successfully');
        return response()->json(['status' => true]);
    }
    
}
