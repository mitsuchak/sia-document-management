<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Credentials</title>
</head>
<body>
    <p>Dear User,</p>
    
    <p>Your login credentials are as follows:</p>
    
    <p><strong>Username:</strong> {{ $username }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    
    <p>Please keep these credentials secure and do not share them with anyone.</p>
    
    <p>Thank you.</p>
    
    <p>Sincerely,<br>{{ config('app.name') }}</p>
</body>
</html>
