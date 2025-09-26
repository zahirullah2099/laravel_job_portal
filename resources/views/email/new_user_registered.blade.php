<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New User Registration</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; padding:20px;">
    <div style="background:#fff; padding:20px; border-radius:8px;">
        <h2 style="color:#333;">New User Registered 🚀</h2>
        <p>A new user has just registered on your website:</p>

        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>

        <p style="margin-top:20px;">Best Regards,<br>CareerVibe Team</p>
    </div>
</body>
</html>
