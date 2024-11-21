<!DOCTYPE html>
<html>
<head>
    <title>User Login Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You've logged in to your account successfully on {{ config('app.name') }}.</p>
    <p>If you didn’t make this login attempt, please contact customer support without delay.</p>
    <p>Thank you for using our service!</p>
</body>
</html>

