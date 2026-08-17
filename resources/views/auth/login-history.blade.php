<!DOCTYPE html>
<html>

<head>
    <title>Login History</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #333;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .failed {
            background-color: #f8d7da;
            color: #721c24;
        }

        .warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .pagination {
            margin-top: 20px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        <a href="{{ route('dashboard') }}" class="back">
            ← Back to Dashboard
        </a>

        <h1>Authentication History</h1>

        @if($loginLogs->count())

        <table>

            <thead>
                <tr>
                    <th>Status</th>
                    <th>IP Address</th>
                    <th>Device / Browser</th>
                    <th>Date & Time</th>
                </tr>
            </thead>

            <tbody>

                @foreach($loginLogs as $log)

                <tr>

                    <td>

                        @if($log->status === 'success')

                        <span class="status success">
                            Successful Login
                        </span>

                        @elseif($log->status === 'expired')

                        <span class="status warning">
                            Expired Link
                        </span>

                        @elseif($log->status === 'already_used')

                        <span class="status warning">
                            Already Used
                        </span>

                        @elseif($log->status === 'rate_limited')

                        <span class="status warning">
                            Rate Limited
                        </span>

                        @else

                        <span class="status failed">
                            {{ ucfirst(str_replace('_', ' ', $log->status)) }}
                        </span>

                        @endif

                    </td>

                    <td>
                        {{ $log->ip_address ?? 'Unknown' }}
                    </td>

                    <td>
                        {{ $log->user_agent ?? 'Unknown' }}
                    </td>

                    <td>
                        {{ $log->created_at?->format('d M Y, h:i A') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="pagination">
            {{ $loginLogs->links() }}
        </div>

        @else

        <div class="empty">
            <p>No authentication history found.</p>
        </div>

        @endif

    </div>

</body>

</html>