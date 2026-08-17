<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .email {
            padding: 12px;
            background: #f8f9fa;
            border-radius: 5px;
            margin: 20px 0;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .history {
            background: #007bff;
            color: white;
        }

        .logout {
            background: #dc3545;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Welcome to Dashboard</h1>

        <div class="email">
            You are logged in as:

            <strong>
                {{ Auth::user()->email }}
            </strong>
        </div>

        <div class="actions">

            <a
                href="{{ route('login.history') }}"
                class="button history">
                View Login History
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="button logout">
                    Logout
                </button>
            </form>

        </div>

    </div>

</body>

</html>