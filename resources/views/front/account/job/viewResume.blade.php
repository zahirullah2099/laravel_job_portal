<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Viewer</title>
</head>
<body class="d-flex justify-content-center">
    @php
        $extension = pathinfo($resume->resume, PATHINFO_EXTENSION);
    @endphp

    @if($extension === 'pdf')
        <iframe src="{{ asset('resumes/' . $resume->resume) }}" width="100%" height="600px"></iframe>
    @elseif(in_array($extension, ['doc', 'docx']))
        <p>This is a Word document. You can download it below:</p>
        <a href="{{ asset('resumes/' . $resume->resume) }}" class="btn btn-primary" download>Download Resume</a>
        {{-- Or open in Microsoft Office online --}}
        <p><a href="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode(asset('resumes/' . $resume->resume)) }}" target="_blank">View in Office Online</a></p>
    @else
        <p>Unsupported file type.</p>
    @endif
</body>
</html>
