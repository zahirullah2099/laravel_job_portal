<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\jobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
    public function updateProfile(Request $request){
        $id = Auth::id();
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id',
        ]);  

        if($validator->passes()){
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
    public function updateProfilePic(Request $request){
        
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if($validator->passes()){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id.'-'.time().'.'.$ext; 
            $image->move(public_path('/profile_pic/'), $imageName);

            // create a small thumbnail
            $sourcePath = public_path('/profile_pic/'. $imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_pic/thumb/'. $imageName));
            // DELETE OLD profile pic
            File::delete(public_path('profile_pic/thumb/'.Auth::user()->image));
            File::delete(public_path('profile_pic/'.Auth::user()->image));
           User::where('id',$id)->update(['image' => $imageName]);
            session()->flash('success', 'Profile picture updated successfully');
            return response()->json([
                'status' => true,
                'success' => [],
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' =>$validator->errors()
            ]);
        }
    }

    // CREATE JOB
    public function createJob(){
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = jobType::orderBy('name', 'ASC')->where('status', 1)->get();
        return view('front.account.job.create', 
        ['categories' => $categories,
        'jobTypes' => $jobTypes]);
    }

    // STORE JOB
    public function saveJob(Request $request){
        $rules =[ 
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'company_name' => 'required|max:75|min:3',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->passes()){

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]); 
        }
    }






    // LOGOUT USER FROM THE SYSTEM
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
