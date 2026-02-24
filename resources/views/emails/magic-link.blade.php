<!DOCTYPE html>
<html>
<head>
    <title>Magic Login Link</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>Hello!</h2>
        
        <p>Click the button below to log in to your account:</p>
        
        <a href="{{ url('/login/magic/' . $magicLink->token) }}" 
           style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
            Login Now
        </a>
        
        <p style="margin-top: 20px;">This link will expire in 30 minutes.</p>
        
        <p>If you didn't request this login, you can safely ignore this email.</p>
    </div>
</body>
</html>