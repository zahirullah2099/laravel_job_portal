 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>CareerVibe | {{ env('APP_NAME') }}</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
 </head>

 <body>

     <div class="container my-5">
         @if ($resume)
             <div class="row justify-content-center shadow">
                 <!-- Left Sidebar -->
                 <div class="col-md-4 bg-light p-4 rounded shadow-sm">
                     <div class="text-center">
                         @if ($resume->profile_image)
                             <img src="{{ asset('createResume/' . $resume->profile_image) }}"
                                 class="rounded-circle img-fluid" style="width: 150px; height: 150px;"
                                 alt="Profile Image">
                         @endif

                         <h3 class="mt-3"><strong>{{ $resume->name }}</strong></h3>
                         <p class="text-muted">{{ $resume->job_title }}</p>
                     </div>

                     <hr>

                     <h5>Contact</h5>
                     <p><i class="bi bi-telephone-fill"></i>{{ $resume->phone }}</p>
                     <p><i class="bi bi-envelope-fill"></i>{{ $resume->email }}</p>
                     <p><i class="bi bi-geo-alt-fill"></i>{{ $resume->location }}</p>
                     <p><a href="https://portfolio.example.com" target="_blank">{{ $resume->portfolio_url }}</a></p>

                     <hr>

                     <h5>Education</h5>
                     <p><strong>{{ $resume->degree }}</strong></p>
                     <p>{{ $resume->level }}</p>
                     <p>{{ $resume->university }}</p>
                     <p>{{ $resume->education_duration }}</p>

                     <hr>

                     <h5>Skills</h5>
                     <ul class="me-2">
                         @foreach (preg_split('/[\s,]+/', $resume->skills) as $skill)
                             @if (trim($skill) !== '')
                                 <li style="list-style: disc">{{ trim($skill) }}</li>
                             @endif
                         @endforeach
                     </ul>


                     {{-- <span class="badge bg-dark me-1">{{ trim($skill) }}</span>
                    <p>HTML, CSS, JavaScript, PHP, Laravel, MySQL, Git</p> --}}
                 </div>

                 <!-- Right Content Area -->
                 <div class="col-md-4 ps-md-5 mt-4 mt-md-0">
                     <h4 class="fw-bold">Profile Summary</h4>
                     <p>{{ $resume->summary }}</p>

                     <hr>

                     <h4 class="fw-bold">Experience</h4>
                     <div class="mb-3">
                         <h5 class="mb-1">{{ $resume->job_title_1 }}</h5>
                         <small class="text-muted">{{ $resume->job_description_1 }}</small>
                         <h5 class="mb-1">{{ $resume->job_title_2 }}</h5>
                         <small class="text-muted">{{ $resume->job_description_2 }}</small>

                     </div>

                     <hr>

                     <h4 class="fw-bold">Language</h4>
                     @foreach (preg_split('/[\s,]+/', $resume->languages) as $lang)
                         @if (trim($lang) !== '')
                             <span class="badge bg-dark me-1">{{ trim($lang) }}</span>
                         @endif
                     @endforeach
                     <hr>

                     <h4 class="fw-bold">Diploma / Certification</h4>
                     <h5>{{ $resume->diploma_title }}</h5>
                     <small class="text-muted">{{ $resume->diploma_year }}</small>
                     <p>{{ $resume->diploma_description }}</p>
                 </div>
                 {{-- <a href="" class="btn">Download pdf</a> --}}
             </div>
             <button type="button" class="btn mx-auto float-end mt-2 text-white"
                 style="background-color: #A8DF8E" id="downloadResume">Download
                 pdf</button>
     </div>
     @endif
     <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
     <script src="{{ asset('assets/js/custom.js') }}"></script>

 </body>

 </html>

 <script>
    $("#downloadResume").on('click', function () {
    window.location.href = "{{ route('resume.download') }}";
});

 </script>






 {{-- 
@extends('layouts.app') <!-- Optional: Use your layout -->

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-4 bg-light p-4 rounded shadow-sm">
            <div class="text-center">
                <img src="{{ asset('storage/resume_images/' . $resume->image) }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px;" alt="Profile Image">
                <h3 class="mt-3"><strong>{{ $resume->name }}</strong></h3>
                <p class="text-muted">{{ $resume->job_title }}</p>
            </div>

            <hr>

            <h5>Contact</h5>
            <p><i class="bi bi-telephone-fill"></i> {{ $resume->phone }}</p>
            <p><i class="bi bi-envelope-fill"></i> {{ $resume->email }}</p>
            <p><i class="bi bi-geo-alt-fill"></i> {{ $resume->location }}</p>
            @if ($resume->portfolio)
            <p><a href="{{ $resume->portfolio }}" target="_blank">Visit my portfolio</a></p>
            @endif

            <hr>

            <h5>Education</h5>
            <p><strong>{{ $resume->education_level }}</strong></p>
            <p>{{ $resume->institute }}<br>{{ $resume->edu_start }} - {{ $resume->edu_end }}</p>

            <hr>

            <h5>Skills</h5>
            @foreach (explode(',', $resume->skills) as $skill)
                <p class="mb-1">• {{ trim($skill) }}</p>
            @endforeach
        </div>

        <!-- Right Content Area -->
        <div class="col-md-8 ps-md-5 mt-4 mt-md-0">
            <h4 class="fw-bold">Profile Summary</h4>
            <p>{{ $resume->summary }}</p>

            <hr>

            <h4 class="fw-bold">Experience</h4>
            @foreach ($experiences as $exp)
            <div class="mb-3">
                <h5 class="mb-1">{{ $exp->position }}</h5>
                <small class="text-muted">{{ $exp->company }} | {{ $exp->start_year }} - {{ $exp->end_year ?? 'Present' }}</small>
                <p>{{ $exp->description }}</p>
            </div>
            @endforeach

            <hr>

            <h4 class="fw-bold">Language</h4>
            @foreach (explode(',', $resume->languages) as $lang)
                <span class="badge bg-dark me-1">{{ trim($lang) }}</span>
            @endforeach

            <hr>

            <h4 class="fw-bold">Diploma / Certification</h4>
            <h5>{{ $resume->diploma_title }}</h5>
            <small class="text-muted">{{ $resume->diploma_year }}</small>
            <p>{{ $resume->diploma_description }}</p>
        </div>
    </div>
</div>
@endsection


--}}
