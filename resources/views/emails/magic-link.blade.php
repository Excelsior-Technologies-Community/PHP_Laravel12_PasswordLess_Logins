<!DOCTYPE html>
<html>

<head>
    <title>Magic Login Link</title>
</head>

<body>

    <div style="
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
">

        <h2>Hello!</h2>

        <p>
            You requested a passwordless login link.
        </p>

        <p>
            Click the button below to securely log in to your account.
        </p>

        <a
            href="{{ route('magic.verify', $magicLink->token) }}"
            style="
            display: inline-block;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        ">
            Login Now
        </a>

        <p style="margin-top: 20px;">
            This link will expire in
            <strong>30 minutes</strong>.
        </p>

        <p>
            This link can only be used once.
        </p>

        <p>
            If you didn't request this login, you can safely ignore this email.
        </p>

        <hr>

        <p style="font-size: 12px; color: #777;">
            This is an automated security email. Please do not reply.
        </p>

    </div>

</body>

</html>