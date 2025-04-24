<?php

namespace App\Http\Controllers;

use App\Models\CreateResume;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class resumeController
{
    public function viewResume($id)
    {
        $resume = JobApplication::findOrFail($id);
        return view('front.account.job.viewResume', [
            'resume' => $resume,
        ]);
    }

    // public function downloadResume($id){
    //     $resume = JobApplication::findOrFail($id); 
    //     return response()->download(public_path('resumes/.1744877917_GraySimple.pdf'));
    // }
    public function downloadResume($id)
    {
        $resume = JobApplication::findOrFail($id);
        $file = public_path('resumes/' . $resume->resume);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'Resume not found.');
        }
    }

    // create resume
    public function createResume()
    {
        return view('front.account.job.createResume');
    }
    // show resume
    public function showResume()
    {
        $resume = CreateResume::latest()->first();
        return view('front.account.job.showResume', [
            'resume' => $resume,
        ]);
    }

    public function storeResume(Request $request)
    {
        // dd($request->all()); // dump all submitted data
        // return response()->json($request->all());

        $validatedData = Validator::make($request->all(), [
            // ✅ Personal Info
            'profile_image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name'                => 'required|string|max:255',
            'job_title'           => 'nullable|string|max:255',
            'summary'             => 'nullable|string',

            // ✅ Contact Info
            'phone'               => 'required|string|max:20',
            'email'               => 'required|email|max:255',
            'location'            => 'required|string|max:255',
            'portfolio_url'       => 'nullable|url|max:255',

            // ✅ Education
            'degree'              => 'required|string|max:255',
            'level'               => 'required|string|max:255',
            'university'          => 'required|string|max:255',
            'education_duration'  => 'required|string|max:100',

            // ✅ Experience
            'job_title_1'         => 'required|string|max:255',
            'job_description_1'   => 'nullable|string',
            'job_title_2'         => 'nullable|string|max:255',
            'job_description_2'   => 'nullable|string',

            // ✅ Skills
            'skills'              => 'nullable|string|max:1000',

            // ✅ Languages
            'languages'           => 'nullable|string|max:1000',

            // ✅ Diploma / Certifications
            'diploma_title'       => 'nullable|string|max:255',
            'diploma_year'        => 'nullable|string|max:100',
            'diploma_description' => 'nullable|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], 422);
        }

        if ($validatedData->passes()) {
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');

                // Generate a unique name for the resume
                $imagePath = time() . '_' . $image->getClientOriginalName();

                // Store the file in the 'public/createResume' folder
                $resumePath = $image->move(public_path('createResume'), $imagePath);

                // Store in database
                $resume = new CreateResume();

                $resume->user_id = Auth::user()->id;
                $resume->name = $request->name;
                $resume->email = $request->email;
                $resume->profile_image = $imagePath;
                $resume->job_title = $request->job_title;
                $resume->summary = $request->summary;
                $resume->phone = $request->phone;
                $resume->location = $request->location;
                $resume->portfolio_url = $request->portfolio_url;
                $resume->degree = $request->degree;
                $resume->level = $request->level;
                $resume->university = $request->university;
                $resume->education_duration = $request->education_duration;
                $resume->job_title_1 = $request->job_title_1;
                $resume->job_description_1 = $request->job_description_1;
                $resume->job_title_2 = $request->job_title_2;
                $resume->job_description_2 = $request->job_description_2;
                $resume->skills = $request->skills;
                $resume->languages = $request->languages;
                $resume->diploma_title = $request->diploma_title;
                $resume->diploma_year = $request->diploma_year;
                $resume->diploma_description = $request->diploma_description;

                $resume->save();
                return response()->json(['success' => 'Resume created successfully.']);
                // if ($resume->save()) {
                //     return redirect()->route('show.Resume');
                // }
            }
        }
    }

    // download resume 
    public function download()
{
    $resume = CreateResume::where('user_id', Auth::id())->latest()->first();

    $pdf = Pdf::loadView('front.account.resume_pdf', ['resume' => $resume]);


    return $pdf->download('resume.pdf');
}
}
