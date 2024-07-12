<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Confirmation</title>
    <style>
        /* Add your custom CSS styles here */
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Signup Confirmation</h2>
        </div>
        <div class="content">
            <p>Dear {{ $first_name }},</p>
            <p></p>
            <p>Thank you for registering with us. You will receive your username and password soon, which will allow you to access the documents.</p>
            <p>If you have any questions or need further assistance, please do not hesitate to contact us.</p>
            <p></p>
            <p>Best regards,</p>
            <p>ASTER MEDISPRO PRIVATE LIMITED</p>
        </div>
        <div class="footer">
            <p>This email was sent automatically. Please do not reply.</p>
        </div>
    </div>
</body>

</html>
