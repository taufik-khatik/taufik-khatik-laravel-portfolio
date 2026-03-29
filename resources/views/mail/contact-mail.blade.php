<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f8fa;
            padding: 15px;
            color: #333;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.08);
        }

        .header-box {
            background: #4F46E5;
            padding: 18px;
            border-radius: 8px;
            color: #fff;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .info-box {
            background: #f1f5f9;
            padding: 15px 20px;
            border-left: 5px solid #4F46E5;
            margin-bottom: 22px;
            border-radius: 6px;
        }

        .info-row {
            margin-bottom: 8px;
        }

        .info-row strong {
            display: inline-block;
            width: 120px;
        }

        .message-box {
            background: #fff7e6;
            border-left: 5px solid #ff9800;
            padding: 18px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 15px;
            white-space: pre-line;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header-box">
            📩 New Portfolio Contact Form Submission
        </div>

        <div class="info-box">
            <div class="info-row"><strong>Name:</strong> {{ $mailData['name'] }}</div>
            <div class="info-row"><strong>Email:</strong> {{ $mailData['email'] }}</div>
        </div>

        <div class="info-box">
            <div class="info-row"><strong>IP Address:</strong> {{ $mailData['ip'] }}</div>
            <div class="info-row"><strong>Device:</strong> {{ $mailData['device'] }}</div>
            <div class="info-row"><strong>User Agent:</strong> {{ $mailData['userAgent'] }}</div>
            <div class="info-row"><strong>Country:</strong> {{ $mailData['country'] }}</div>
            <div class="info-row"><strong>Region:</strong> {{ $mailData['region'] }}</div>
            <div class="info-row"><strong>City:</strong> {{ $mailData['city'] }}</div>
        </div>

        <div class="message-box">
            <strong>Message:</strong><br><br>
            {{ $mailData['message'] }}
        </div>

        <div class="footer">
            This email was automatically generated from your portfolio contact form.
        </div>
    </div>

</body>
</html>
