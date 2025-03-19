<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>job Notification Email</title>
</head>
<body>
    
    <h1>Hello: <span class="text-decoration-underline text-primary">{{ $mailData['employer']->name }}</span></h1>
    <p>job title:  <span class="text-decoration-underline text-primary">{{ $mailData['job']->title }}</span></p>

    <p>Employee Details</p>
    <p>name: <span class="text-decoration-underline text-primary">{{ $mailData['user']->name }}</span></p>
    <p>Email: <span class="text-decoration-underline text-primary">{{ $mailData['user']->email }}</span></p>
    <p>Mobile No: <span class="text-decoration-underline text-primary">{{ $mailData['user']->mobile }}</span></p>
</body>
</html>