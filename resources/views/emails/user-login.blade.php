<!DOCTYPE html>
<html>
<head>
    <title>User Login Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You have successfully logged in to your account on {{ config('app.name') }}.</p>
    <p>If this wasn't you, please contact support immediately.</p>
    <p>Thank you for using our service!</p>
</body>
</html>
