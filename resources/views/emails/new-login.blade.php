<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>New Login Detected</title>

</head>

<body>

    <h2>New Login Detected</h2>

    <p>Hello,</p>

    <p>
        A successful login was detected on your account.
    </p>

    <p>
        <strong>Email:</strong>
        {{ $email }}
    </p>

    <p>
        <strong>IP Address:</strong>
        {{ $ipAddress }}
    </p>

    <p>
        <strong>Browser / Device:</strong>
        {{ $userAgent ?? 'Unknown' }}
    </p>

    <p>
        <strong>Time:</strong>
        {{ now()->format('d M Y, h:i A') }}
    </p>

    <hr>

    <p>
        If this login was not made by you, please review your
        account activity immediately.
    </p>

    <p>
        Thank you.
    </p>

</body>

</html>