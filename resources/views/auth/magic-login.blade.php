<!DOCTYPE html>
<html>

<head>

    <title>Passwordless Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 11px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .alert {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .security-note {
            margin-top: 20px;
            font-size: 13px;
            color: #777;
            text-align: center;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Passwordless Login</h1>

    <p class="description">
        Enter your email and we'll send you a secure magic login link.
    </p>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>

    @endif

    <form method="POST" action="{{ route('magic.send') }}">

        @csrf

        <div class="form-group">

            <label for="email">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                id="email"
                required
                value="{{ old('email') }}"
                placeholder="Enter your email"
            >

        </div>

        <button type="submit">
            Send Magic Link
        </button>

    </form>

    <div class="security-note">
        Your magic link is valid for 30 minutes and can only be used once.
    </div>

</div>

</body>

</html>