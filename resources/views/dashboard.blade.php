<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div style="max-width: 600px; margin: 50px auto;">
        <h1>Welcome to Dashboard</h1>
        <p>You are logged in as: {{ Auth::user()->email }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>