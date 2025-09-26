@extends('front.layouts.app')
@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">

            <form id="resumeForm" action="/submit-resume" method="POST" enctype="multipart/form-data">
                @csrf
            
                <!-- Section 1: Personal Info -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Personal Information</h4>
                    <input type="file" name="profile_image" class="form-control my-2">
                    <input type="text" name="name" class="form-control my-2" placeholder="Full Name">
                    <input type="text" name="job_title" class="form-control my-2" placeholder="Job Title">
                    <textarea name="summary" class="form-control my-2" placeholder="Short Bio / Summary"></textarea>
                </div>
            
                <!-- Section 2: Contact Info -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Contact Information</h4>
                    <input type="text" name="phone" class="form-control my-2" placeholder="Phone Number">
                    <input type="email" name="email" class="form-control my-2" placeholder="Email">
                    <input type="text" name="location" class="form-control my-2" placeholder="Location">
                    <input type="url" name="portfolio_url" class="form-control my-2" placeholder="Portfolio URL (optional)">
                </div>
            
                <!-- Section 3: Education -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Education</h4>
                    <input type="text" name="degree" class="form-control my-2" placeholder="Degree Title">
                    <input type="text" name="level" class="form-control my-2" placeholder="Level (e.g. Undergraduate)">
                    <input type="text" name="university" class="form-control my-2" placeholder="University/College Name">
                    <input type="text" name="education_duration" class="form-control my-2" placeholder="Duration (e.g. 2020-2024)">
                </div>
            
                <!-- Section 4: Experience -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Experience</h4>
                    <input type="text" name="job_title_1" class="form-control my-2" placeholder="Job Title">
                    <textarea name="job_description_1" class="form-control my-2" placeholder="Job Description"></textarea>
            
                    <input type="text" name="job_title_2" class="form-control my-2" placeholder="Job Title (Optional)">
                    <textarea name="job_description_2" class="form-control my-2" placeholder="Job Description (Optional)"></textarea>
                </div>
            
                <!-- Section 5: Skills -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Skills</h4>
                    <input type="text" name="skills" class="form-control my-2" placeholder="e.g. HTML, CSS, JavaScript, PHP">
                </div>
            
                <!-- Section 6: Languages -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Languages</h4>
                    <input type="text" name="languages" class="form-control my-2" placeholder="e.g. English, Urdu, Pashto">
                </div>
            
                <!-- Section 7: Diploma / Certifications -->
                <div class="p-4 my-4 shadow rounded bg-white">
                    <h4>Diploma / Certifications</h4>
                    <input type="text" name="diploma_title" class="form-control my-2" placeholder="Diploma Title">
                    <input type="text" name="diploma_year" class="form-control my-2" placeholder="Duration (e.g. 2018–2020)">
                    <textarea name="diploma_description" class="form-control my-2" placeholder="Diploma Description"></textarea>
                </div>
            
                <!-- Submit Button -->
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-primary px-5">Generate Resume</button>
                    {{-- <a href="{{ route('show.Resume') }}">submit resume</a> --}}
                </div>
            </form>
            

        </div>
    </div>
</div>

@section('customJs')
<script>
    // $(document).ready(function () {
    //     $('form').on('submit', function (e) {
    //         e.preventDefault();

    //         let formData = new FormData(this);

    //         $.ajax({
    //             url: "{{ route('resume.store') }}", // route name
    //             method: "POST",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             success: function (response) {
    //                 console.log("Success:", response);
    //             },
    //             error: function (xhr) {
    //                 console.log("Error:", xhr.responseText);
    //             }
    //         });
    //     });
    // });

    $('#resumeForm').on('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "/account/submit-resume",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log("Success:", response.success);
            $('.text-danger').remove(); // clear old errors
            $("#resumeForm")[0].reset();
            window.location.href = "{{ route('show.Resume') }}";
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                $('.text-danger').remove(); // clear old errors

                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    let input = $(`[name="${key}"]`);
                    input.after(`<small class="text-danger">${value[0]}</small>`);
                });
            }
        }
    });
});

</script>


@endsection
@endsection