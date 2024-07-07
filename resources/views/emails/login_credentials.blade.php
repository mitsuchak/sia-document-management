<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-radius: 5px 5px 0 0;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
        }

        .login-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Your Account is Approved!</h2>
        </div>
        <div class="content">
            <p>Hello {{ $first_name }},</p>
            <p>Your account has been approved by the administrator.</p>
            <p>You can now login to our site using the following credentials:</p>
            <ul>
                <li><strong>Email:</strong> {{ $email }}</li>
                <li><strong>Password:</strong> {{ $password }}</li>
            </ul>
            <div class="login-link">
                <a href="{{ url('login') }}" target="_blank">Login to Your Account</a>
            </div>
            <p>Thank you!</p>
        </div>
        <div class="footer">
            <p>This email was sent automatically. Please do not reply.</p>
        </div>
    </div>
</body>
</html>
