<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;

            background: #f6f8fc;

            color: #1e293b;
        }

        .page {
            min-height: 100vh;
            padding: 35px 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        /* HEADER */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 28px;
        }

        .welcome h1 {
            margin: 0;

            font-size: 30px;

            color: #0f172a;
        }

        .welcome p {
            margin-top: 7px;

            color: #64748b;

            font-size: 14px;
        }

        .user-badge {
            padding: 10px 15px;

            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 10px;

            color: #475569;

            font-size: 13px;

            font-weight: 600;
        }

        /* SUCCESS MESSAGE */

        .success-card {

            background:
                linear-gradient(135deg,
                    #eff6ff,
                    #f5f3ff);

            border: 1px solid #dbeafe;

            border-radius: 15px;

            padding: 22px;

            margin-bottom: 24px;

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .success-icon {

            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #dcfce7;

            color: #16a34a;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;

            flex-shrink: 0;
        }

        .success-card h3 {

            margin: 0 0 5px;

            color: #166534;

            font-size: 16px;
        }

        .success-card p {

            margin: 0;

            color: #64748b;

            font-size: 13px;
        }

        /* STATISTICS */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 25px;
        }

        .stat {

            background: white;

            border: 1px solid #e8edf4;

            border-radius: 14px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 14px;

            box-shadow:
                0 4px 15px rgba(15, 23, 42, .04);
        }

        .stat-icon {

            width: 45px;
            height: 45px;

            border-radius: 11px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;
        }

        .blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .green {
            background: #ecfdf5;
            color: #16a34a;
        }

        .red {
            background: #fef2f2;
            color: #dc2626;
        }

        .purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .stat-title {

            color: #64748b;

            font-size: 12px;

            margin-bottom: 4px;
        }

        .stat-value {

            color: #0f172a;

            font-size: 23px;

            font-weight: 750;
        }

        /* MAIN GRID */

        .grid {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 20px;
        }

        .card {

            background: white;

            border: 1px solid #e8edf4;

            border-radius: 14px;

            padding: 22px;

            box-shadow:
                0 4px 15px rgba(15, 23, 42, .04);
        }

        .card h2 {

            margin: 0;

            font-size: 17px;

            color: #0f172a;
        }

        .card-description {

            margin-top: 5px;

            margin-bottom: 20px;

            color: #94a3b8;

            font-size: 12px;
        }

        /* MENU */

        .menu {

            display: grid;

            gap: 10px;
        }

        .menu-item {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 14px;

            border: 1px solid #edf1f5;

            border-radius: 10px;

            text-decoration: none;

            color: #334155;

            transition: .2s;
        }

        .menu-item:hover {

            background: #f8fbff;

            border-color: #bfdbfe;

            transform: translateX(2px);
        }

        .menu-left {

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .menu-icon {

            width: 36px;
            height: 36px;

            border-radius: 9px;

            background: #f1f5f9;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #475569;
        }

        .menu-title {

            font-size: 13px;

            font-weight: 650;
        }

        .menu-subtitle {

            margin-top: 3px;

            font-size: 11px;

            color: #94a3b8;
        }

        .arrow {

            color: #94a3b8;

            font-size: 16px;
        }

        /* LAST LOGIN */

        .login-info {

            display: grid;

            gap: 13px;
        }

        .info-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-bottom: 12px;

            border-bottom: 1px solid #f1f5f9;
        }

        .info-row:last-child {

            border-bottom: none;

            padding-bottom: 0;
        }

        .info-label {

            color: #64748b;

            font-size: 12px;
        }

        .info-value {

            color: #334155;

            font-size: 12px;

            font-weight: 650;

            text-align: right;
        }

        /* LOGOUT */

        .logout {

            display: block;

            width: 100%;

            margin-top: 15px;

            padding: 12px;

            border-radius: 9px;

            background: #fef2f2;

            color: #dc2626;

            text-align: center;

            text-decoration: none;

            font-size: 13px;

            font-weight: 650;

            transition: .2s;
        }

        .logout:hover {

            background: #fee2e2;
        }

        /* RESPONSIVE */

        @media(max-width: 900px) {

            .stats {

                grid-template-columns:
                    repeat(2, 1fr);
            }

            .grid {

                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 600px) {

            .page {

                padding: 20px 12px;
            }

            .header {

                flex-direction: column;

                align-items: flex-start;

                gap: 12px;
            }

            .stats {

                grid-template-columns: 1fr;
            }

            .welcome h1 {

                font-size: 24px;
            }

        }
    </style>

</head>


<body>

    <div class="page">

        <div class="container">


            {{-- HEADER --}}

            <div class="header">

                <div class="welcome">

                    <h1>
                        Welcome to Dashboard 👋
                    </h1>

                    <p>
                        Manage your passwordless authentication account
                    </p>

                </div>


                <div class="user-badge">

                    👤
                    {{ auth()->user()->email }}

                </div>

            </div>


            {{-- SUCCESS --}}

            <div class="success-card">

                <div class="success-icon">
                    ✓
                </div>

                <div>

                    <h3>
                        Successfully authenticated
                    </h3>

                    <p>
                        You are successfully logged in using passwordless authentication.
                    </p>

                </div>

            </div>


            {{-- STATISTICS --}}

            @php

            $totalAttempts = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )->count();

            $successfulAttempts = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )
            ->where('status', 'success')
            ->count();

            $failedAttempts = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )
            ->where('status', 'failed')
            ->count();

            $otherAttempts = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )
            ->whereIn('status', [
            'expired',
            'already_used',
            'rate_limited'
            ])
            ->count();

            @endphp


            <div class="stats">


                <div class="stat">

                    <div class="stat-icon blue">
                        ◷
                    </div>

                    <div>

                        <div class="stat-title">
                            Total Login Attempts
                        </div>

                        <div class="stat-value">
                            {{ $totalAttempts }}
                        </div>

                    </div>

                </div>


                <div class="stat">

                    <div class="stat-icon green">
                        ✓
                    </div>

                    <div>

                        <div class="stat-title">
                            Successful Logins
                        </div>

                        <div class="stat-value">
                            {{ $successfulAttempts }}
                        </div>

                    </div>

                </div>


                <div class="stat">

                    <div class="stat-icon red">
                        !
                    </div>

                    <div>

                        <div class="stat-title">
                            Failed Attempts
                        </div>

                        <div class="stat-value">
                            {{ $failedAttempts }}
                        </div>

                    </div>

                </div>


                <div class="stat">

                    <div class="stat-icon purple">
                        ⚡
                    </div>

                    <div>

                        <div class="stat-title">
                            Other Events
                        </div>

                        <div class="stat-value">
                            {{ $otherAttempts }}
                        </div>

                    </div>

                </div>


            </div>


            {{-- MAIN CONTENT --}}

            <div class="grid">


                {{-- ACCOUNT MENU --}}

                <div class="card">

                    <h2>
                        Account
                    </h2>

                    <div class="card-description">
                        Manage your account and authentication activity
                    </div>


                    <div class="menu">

                        <a
                            href="{{ route('login.history') }}"
                            class="menu-item">

                            <div class="menu-left">

                                <div class="menu-icon">
                                    ◷
                                </div>

                                <div>

                                    <div class="menu-title">
                                        Login History
                                    </div>

                                    <div class="menu-subtitle">
                                        View all authentication attempts
                                    </div>

                                </div>

                            </div>

                            <span class="arrow">
                                →
                            </span>

                        </a>


                        {{-- Analytics --}}

                        @if(Route::has('login.analytics'))

                        <a
                            href="{{ route('login.analytics') }}"
                            class="menu-item">

                            <div class="menu-left">

                                <div class="menu-icon">
                                    📊
                                </div>

                                <div>

                                    <div class="menu-title">
                                        Login Analytics
                                    </div>

                                    <div class="menu-subtitle">
                                        Analyze your login activity
                                    </div>

                                </div>

                            </div>

                            <span class="arrow">
                                →
                            </span>

                        </a>

                        @endif


                    </div>


                    {{-- LOGOUT --}}

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="logout"
                            style="border:none; cursor:pointer;">
                            🚪 Logout
                        </button>

                    </form>

                </div>


                {{-- LOGIN INFORMATION --}}

                <div class="card">

                    <h2>
                        Security Information
                    </h2>

                    <div class="card-description">
                        Information about your recent authentication activity
                    </div>


                    @php

                    $lastLogin = \App\Models\LoginLog::where(
                    'user_id',
                    auth()->id()
                    )
                    ->where('status', 'success')
                    ->latest('created_at')
                    ->first();

                    @endphp


                    <div class="login-info">


                        <div class="info-row">

                            <span class="info-label">
                                Account
                            </span>

                            <span class="info-value">
                                {{ auth()->user()->email }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Authentication
                            </span>

                            <span class="info-value">
                                Passwordless
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Last Successful Login
                            </span>

                            <span class="info-value">

                                @if($lastLogin)

                                {{ $lastLogin->created_at->format(
                                'd M Y, h:i A'
                            ) }}

                                @else

                                No login found

                                @endif

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Account Status
                            </span>

                            <span
                                class="info-value"
                                style="color:#16a34a;">
                                ● Active
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Security
                            </span>

                            <span
                                class="info-value"
                                style="color:#2563eb;">
                                ✓ Passwordless
                            </span>

                        </div>


                    </div>

                </div>


            </div>


        </div>

    </div>

</body>

</html>