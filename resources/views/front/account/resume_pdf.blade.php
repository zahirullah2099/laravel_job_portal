<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume PDF</title>
</head>
<body style="font-family: 'Montserrat', sans-serif; font-size: 13px; margin: 0; padding: 40px;">

    <div style="max-width: 900px; margin: 0 auto;">
        @if ($resume)
            <div style="display: flex; flex-wrap: wrap; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 10px; padding: 20px;">

                <!-- Left Column -->
                <div style="flex: 1; min-width: 400px; padding-right: 20px; border-right: 1px solid #ccc;">
                    <div style="text-align: center;">
                        @if ($resume->profile_image)
                            <img src="{{ public_path('createResume/' . $resume->profile_image) }}"
                                 style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;"
                                 alt="Profile Image">
                        @endif
                        <h3 style="font-weight: 600; margin-top: 10px;">{{ $resume->name }}</h3>
                        <p style="color: gray; margin: 0;">{{ $resume->job_title }}</p>
                    </div>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Contact</h5>
                    <p style="margin: 2px 0;">📞 {{ $resume->phone }}</p>
                    <p style="margin: 2px 0;">📧 {{ $resume->email }}</p>
                    <p style="margin: 2px 0;">📍 {{ $resume->location }}</p>
                    <p style="margin: 2px 0;"><a href="https://portfolio.example.com" target="_blank">{{ $resume->portfolio_url }}</a></p>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Education</h5>
                    <p style="margin: 2px 0;"><strong>{{ $resume->degree }}</strong></p>
                    <p style="margin: 2px 0;">{{ $resume->level }}</p>
                    <p style="margin: 2px 0;">{{ $resume->university }}</p>
                    <p style="margin: 2px 0;">{{ $resume->education_duration }}</p>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Skills</h5>
                    <ul style="padding-left: 20px; margin: 0;">
                        @foreach (preg_split('/[\s,]+/', $resume->skills) as $skill)
                            @if (trim($skill) !== '')
                                <li>{{ trim($skill) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Right Column -->
                <div style="flex: 1; min-width: 400px; padding-left: 20px; margin-top: 20px;">
                    <h5 style="font-weight: 600; margin-bottom: 5px;">Profile Summary</h5>
                    <p style="margin: 5px 0;">{{ $resume->summary }}</p>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Experience</h5>
                    <div style="margin-bottom: 15px;">
                        <p style="margin: 2px 0;"><strong>{{ $resume->job_title_1 }}</strong><br>
                            <span style="color: gray;">{{ $resume->job_description_1 }}</span></p>
                        <p style="margin: 10px 0 2px 0;"><strong>{{ $resume->job_title_2 }}</strong><br>
                            <span style="color: gray;">{{ $resume->job_description_2 }}</span></p>
                    </div>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Languages</h5>
                    <div style="margin-bottom: 10px;">
                        @foreach (preg_split('/[\s,]+/', $resume->languages) as $lang)
                            @if (trim($lang) !== '')
                                <span style="display: inline-block; background: #000; color: #fff; padding: 2px 6px; margin-right: 5px; margin-bottom: 5px; font-size: 12px; border-radius: 4px;">{{ trim($lang) }}</span>
                            @endif
                        @endforeach
                    </div>

                    <hr style="margin: 5px 0;">

                    <h5 style="font-weight: 600; margin-bottom: 5px;">Diploma / Certification</h5>
                    <p style="margin: 2px 0;"><strong>{{ $resume->diploma_title }}</strong></p>
                    <small style="color: gray;">{{ $resume->diploma_year }}</small>
                    <p style="margin: 5px 0;">{{ $resume->diploma_description }}</p>
                </div>

            </div>
        @endif
    </div>

</body>
</html>
