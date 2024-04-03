<!-- send_sms.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
</head>
<body>
    <h1>Send SMS Notification</h1>
    <p>Click the button below to send the notification:</p>
    <a href="{{ route('send.notification') }}" class="btn btn-primary">Send Notification</a>
</body>
</html>
