<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\Job;
use App\Models\User;
use App\Models\jobType;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\SavedJob;

use function Pest\Laravel\get;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AccountController
{
    // SHOW REGISTRATION FORM
    public function registration()
    {
        return view('front.account.registration');
    }

    // PROCESS REGISTRATION FORM
    public function processRegistraion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success', 'you have registered successfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // SHOW LOGIN FORM
    public function login()
    {
        return view('front.account.login');
    }


    // AUTHENTICATE USER
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.login')->with('error', 'Either email/password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    // SHOW USER PROFILE
    public function profile()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        return view('front.account.profile', ['user' => $user]);
    }

    // UPDATE USER PROFILE
    public function updateProfile(Request $request)
    {
        $id = Auth::id();
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;

            $user->save();
            session()->flash('success', 'Profile updated successfully');
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    // UPDATE USER PROFILE PICTURE
    public function updateProfilePic(Request $request)
    {

        $id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($validator->passes()) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id . '-' . time() . '.' . $ext;
            $image->move(public_path('/profile_pic/'), $imageName);

            // create a small thumbnail
            $sourcePath = public_path('/profile_pic/' . $imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_pic/thumb/' . $imageName));
            // DELETE OLD profile pic
            File::delete(public_path('profile_pic/thumb/' . Auth::user()->image));
            File::delete(public_path('profile_pic/' . Auth::user()->image));
            User::where('id', $id)->update(['image' => $imageName]);
            session()->flash('success', 'Profile picture updated successfully');
            return response()->json([
                'status' => true,
                'success' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // CREATE JOB
    public function createJob()
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = jobType::orderBy('name', 'ASC')->where('status', 1)->get();
        return view(
            'front.account.job.create',
            [
                'categories' => $categories,
                'jobTypes' => $jobTypes
            ]
        );
    }

    // STORE JOB
    public function saveJob(Request $request)
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

            $job = new Job();
            $job->title = $request->title;
            $job->category_id = $request->category;
            $job->job_type_id = $request->jobType;
            $job->user_id = Auth::id();
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
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
            $job->save();
            session()->flash('success', 'Job created successfully');
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

    // SHOW USER SAVED JOBS
    public function savedJobs(){ 
        $savedJobs = SavedJob::where('user_id', Auth::id())
        ->with(['job','job.jobType', 'job.applications'])
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        return view('front.account.job.saved-jobs',
        ['savedJobs' => $savedJobs]);  
    }
    // REMOVE SAVED JOB
    public function removeSavedJob(Request $request){ 
        // checking the job belongs to the auth user or not
        $savedJob = SavedJob::where([
                                'id' => $request->id, 
                                'user_id' => Auth::id()])
                                ->first(); 
         if($savedJob == null){
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
            ]);
        }    
        
        SavedJob::find($request->id)->delete();
        session()->flash('success', 'Job removed successfully'); 
        return response()->json([
            'status' => true,
        ]);
    }

    // SHOW USER JOBS
    public function myJob()
    {
        $job = Job::where('user_id', Auth::id())->with('jobType')->orderBy('created_at', 'DESC')->paginate(10);
        $employerId = Auth::id(); // Get the authenticated employer's ID

        $jobApplication = JobApplication::where('employer_id', $employerId)
                        ->select('job_id', DB::raw('COUNT(*) as total_applicants'))
                        ->groupBy('job_id')
                        ->get(); 
        return view('front.account.job.my-jobs', [
            'jobs' => $job,
            'jobApplication' => $jobApplication
        ]);
    }

    // EDIT JOB
    public function editJob(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = jobType::orderBy('name', 'ASC')->where('status', 1)->get();

        $job = Job::where(['user_id' => Auth::id(), 'id' => $id])->first();
        if ($job == null) {
            abort(404);
        }

        return view('front.account.job.edit', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'job' => $job
        ]);
    }

    // UPDATE JOB
    public function updateJob(Request $request, $id)
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
            $job->user_id = Auth::id();
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
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

    // DELETE JOB
    public function deleteJob(Request $request)
    {
        $job = Job::where([
            'user_id' => Auth::id(),
            'id' => $request->jobId
        ])->first();

        if ($job == null) {
            session()->flash('error', 'Either job deleted or not found.');
            return response()->json([
                'status' => true
            ]);
        }

        Job::where('id', $request->jobId)->delete();
        session()->flash('success', 'Job deleted successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }






    // LOGOUT USER FROM THE SYSTEM
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }

    // my job applications
    public function myJobApplications(){
        $jobApplications = JobApplication::where('user_id',Auth::id())
        ->with(['job','job.jobType', 'job.applications'])
        ->orderBy('created_at', 'DESC')
        ->paginate(10); 
        return view('front.account.job.my-job-application',['jobApplications' => $jobApplications]); 
    }

    public function removeJobs(Request $request){ 
        // checking the job belongs to the auth user or not
        $jobApplication = JobApplication::where([
                                'id' => $request->id, 
                                'user_id' => Auth::id()])
                                ->first(); 
         if($jobApplication == null){
            session()->flash('error', 'Job application not found');
            return response()->json([
                'status' => false,
            ]);
        }    
        
        JobApplication::find($request->id)->delete();
        session()->flash('success', 'Job application removed successfully'); 
        return response()->json([
            'status' => true,
        ]);
    }
   
    //  UPDATE PASSWORD
    // public function updatePassword(Request $request){
    //     $validator = Validator::make($request->all(),
    //     [
    //         'old_password' => 'required',
    //         'new_password' => 'required|min:6',
    //         'confirm_password' => 'required|same:new_password',
    //     ]);

    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors()
    //         ]);

    //         if(Hash::check($request->old_password, Auth::user()->password) == false){
    //             session()->flash('error', 'Your old password is incorrect.'); 
    //             return response()->json([
    //                 'status' => false 
    //             ]);
    //         }

    //         $user = User::find(Auth::user()->id);
    //         $user->password = Hash::make($request->new_password);
    //         $user->save(); 
    //         session()->flash('success', 'Your password is updated successfully.'); 
    //         return response()->json([
    //             'status' => true 
    //         ]);
    //     }
    // }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return response()->json([
                'status' => false,
                'errors' => ['old_password' => 'Your old password is incorrect.']
            ]);
        }
    
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Your password has been updated successfully.'
        ]);
    }

    // forgot password page
    public function forgotPassword(){
        return view("front.account.forgot-password");
    }

    // process forgot password
    public function processForgotPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
        ]);
        if($validator->fails()){
            return redirect()->route('account.forgotPassword')
            ->withInput()
            ->withErrors($validator);
        }

        $token = Str::random(60);
        // delete existing email 
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // fetch user data
        $user = User::where('email', $request->email)->first();
        $mailData = [
            'token' => $token,
            'user' => $user,
            'subject' => 'You have request to change you password'
        ];
        Mail::to($request->email)->send(new ResetPasswordEmail($mailData));
        return redirect()->route('account.forgotPassword')->with('success', 'Reset password email has been sent to you inbox.');
    }

    // reset password
    public function resetPassword(){

    }
    
}
