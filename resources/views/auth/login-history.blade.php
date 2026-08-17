<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login History</title>

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

        /* =========================================
           PAGE
        ========================================= */

        .page {
            min-height: 100vh;
            padding: 35px 20px;
        }

        .container {
            max-width: 1280px;
            margin: auto;
        }

        /* =========================================
           TOP HEADER
        ========================================= */

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .brand-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #7c3aed);

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;
            font-size: 25px;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, .22);
        }

        .heading h1 {
            margin: 0;

            font-size: 28px;
            font-weight: 750;

            color: #0f172a;
        }

        .heading p {
            margin: 5px 0 0;

            color: #64748b;
            font-size: 14px;
        }

        .dashboard-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 17px;

            background: white;

            color: #334155;

            border: 1px solid #e2e8f0;

            border-radius: 10px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition: .2s;
        }

        .dashboard-btn:hover {
            border-color: #cbd5e1;
            transform: translateY(-1px);

            box-shadow:
                0 5px 15px rgba(15, 23, 42, .07);
        }

        /* =========================================
           STATISTICS
        ========================================= */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 22px;
        }

        .stat-card {
            background: white;

            border: 1px solid #e8edf4;

            border-radius: 14px;

            padding: 20px;

            display: flex;
            align-items: center;

            gap: 15px;

            box-shadow:
                0 4px 16px rgba(15, 23, 42, .04);
        }

        .stat-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            flex-shrink: 0;
        }

        .blue-icon {
            background: #eff6ff;
            color: #2563eb;
        }

        .green-icon {
            background: #ecfdf5;
            color: #16a34a;
        }

        .red-icon {
            background: #fef2f2;
            color: #dc2626;
        }

        .orange-icon {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-label {
            font-size: 12px;

            color: #64748b;

            margin-bottom: 4px;
        }

        .stat-number {
            font-size: 23px;

            font-weight: 750;

            color: #0f172a;
        }

        /* =========================================
           FILTER CARD
        ========================================= */

        .filter-card {
            background: white;

            border: 1px solid #e8edf4;

            border-radius: 14px;

            padding: 22px;

            margin-bottom: 22px;

            box-shadow:
                0 4px 16px rgba(15, 23, 42, .04);
        }

        .filter-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 18px;
        }

        .filter-heading {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .filter-icon {
            width: 36px;
            height: 36px;

            border-radius: 9px;

            background: #eff6ff;

            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filter-title {
            margin: 0;

            font-size: 15px;

            font-weight: 700;

            color: #1e293b;
        }

        .filter-subtitle {
            margin: 3px 0 0;

            font-size: 12px;

            color: #94a3b8;
        }

        .active-filter {
            padding: 5px 10px;

            border-radius: 20px;

            background: #eff6ff;

            color: #2563eb;

            font-size: 12px;

            font-weight: 600;
        }

        .filters {
            display: grid;

            grid-template-columns:
                2fr 1fr 1fr 1fr auto auto;

            gap: 10px;

            align-items: center;
        }

        .input-box {
            position: relative;
        }

        .input-box span {
            position: absolute;

            left: 12px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #94a3b8;

            font-size: 14px;
        }

        input,
        select {

            width: 100%;

            height: 44px;

            border: 1px solid #dce3ec;

            border-radius: 9px;

            padding: 0 12px;

            background: #fff;

            color: #334155;

            font-size: 13px;

            outline: none;

            transition: .2s;
        }

        .search {
            padding-left: 36px;
        }

        input:focus,
        select:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, .09);
        }

        .btn {

            height: 44px;

            padding: 0 17px;

            border-radius: 9px;

            border: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            font-size: 13px;

            font-weight: 650;

            cursor: pointer;

            text-decoration: none;

            white-space: nowrap;

            transition: .2s;
        }

        .filter-btn {

            background: #2563eb;

            color: white;
        }

        .filter-btn:hover {

            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 6px 15px rgba(37, 99, 235, .20);
        }

        .reset-btn {

            background: #f8fafc;

            color: #475569;

            border: 1px solid #e2e8f0;
        }

        .reset-btn:hover {

            background: #f1f5f9;
        }

        /* =========================================
           TABLE
        ========================================= */

        .table-card {

            background: white;

            border: 1px solid #e8edf4;

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 4px 16px rgba(15, 23, 42, .04);
        }

        .table-top {

            padding: 20px 22px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom: 1px solid #edf1f5;
        }

        .table-heading h2 {

            margin: 0;

            font-size: 16px;

            font-weight: 700;

            color: #0f172a;
        }

        .table-heading p {

            margin: 4px 0 0;

            color: #94a3b8;

            font-size: 12px;
        }

        .records-count {

            padding: 7px 11px;

            border-radius: 8px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            color: #475569;

            font-size: 12px;

            font-weight: 600;
        }

        .table-wrapper {

            width: 100%;

            overflow-x: auto;
        }

        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        th {

            padding: 14px 22px;

            text-align: left;

            background: #f8fafc;

            color: #64748b;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .05em;

            font-weight: 750;

            border-bottom:
                1px solid #edf1f5;
        }

        td {

            padding: 16px 22px;

            border-bottom:
                1px solid #f0f2f5;

            font-size: 13px;

            color: #475569;

            vertical-align: middle;
        }

        tbody tr {

            transition: .15s;
        }

        tbody tr:hover {

            background: #f8fbff;
        }

        tbody tr:last-child td {

            border-bottom: none;
        }

        /* =========================================
           STATUS
        ========================================= */

        .badge {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;
        }

        .dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: currentColor;
        }

        .success {

            background: #ecfdf5;

            color: #15803d;
        }

        .danger {

            background: #fef2f2;

            color: #dc2626;
        }

        .warning {

            background: #fffbeb;

            color: #b45309;
        }

        /* =========================================
           IP
        ========================================= */

        .ip {

            display: inline-flex;

            padding: 6px 9px;

            border-radius: 7px;

            background: #f1f5f9;

            color: #334155;

            font-family: Consolas, monospace;

            font-size: 12px;

            font-weight: 600;
        }

        /* =========================================
           DEVICE
        ========================================= */

        .device-wrapper {

            display: flex;

            align-items: center;

            gap: 10px;

            max-width: 430px;
        }

        .device-icon {

            width: 34px;

            height: 34px;

            flex-shrink: 0;

            border-radius: 8px;

            background: #f1f5f9;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #64748b;
        }

        .device {

            line-height: 1.5;

            color: #64748b;

            word-break: break-word;
        }

        /* =========================================
           DATE
        ========================================= */

        .date {

            white-space: nowrap;

            color: #475569;

            font-size: 12px;

            font-weight: 600;
        }

        /* =========================================
           EMPTY
        ========================================= */

        .empty {

            padding: 70px 20px;

            text-align: center;
        }

        .empty-icon {

            width: 64px;

            height: 64px;

            margin: auto auto 15px;

            border-radius: 50%;

            background: #f1f5f9;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #94a3b8;

            font-size: 25px;
        }

        .empty h3 {

            margin: 0 0 6px;

            font-size: 16px;

            color: #334155;
        }

        .empty p {

            margin: 0;

            font-size: 13px;

            color: #94a3b8;
        }

        /* =========================================
           PAGINATION
        ========================================= */

        .pagination {
            padding: 18px 22px;

            border-top: 1px solid #edf1f5;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            flex-wrap: wrap;
        }

        .pagination-info {
            color: #64748b;

            font-size: 13px;
        }

        .pagination-info strong {
            color: #334155;
        }

        .pagination-buttons {
            display: flex;

            align-items: center;

            gap: 6px;
        }

        .page-btn {
            min-width: 36px;

            height: 36px;

            padding: 0 10px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border-radius: 8px;

            border: 1px solid #e2e8f0;

            background: white;

            color: #475569;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: all .2s;
        }

        .page-btn:hover {
            background: #eff6ff;

            border-color: #bfdbfe;

            color: #2563eb;
        }

        .page-btn.active {
            background: #2563eb;

            border-color: #2563eb;

            color: white;

            box-shadow:
                0 4px 10px rgba(37, 99, 235, .20);
        }

        .page-btn.disabled {
            background: #f8fafc;

            color: #cbd5e1;

            border-color: #e2e8f0;

            cursor: not-allowed;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 1100px) {

            .stats {

                grid-template-columns:
                    repeat(2, 1fr);
            }

            .filters {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media(max-width: 650px) {

            .page {

                padding: 20px 12px;
            }

            .top-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .dashboard-btn {

                width: 100%;

                justify-content: center;
            }

            .stats {

                grid-template-columns: 1fr;
            }

            .filters {

                grid-template-columns: 1fr;
            }

            .filter-btn,
            .reset-btn {

                width: 100%;
            }

            .table-top {

                align-items: flex-start;

                gap: 10px;
            }

        }
    </style>

</head>


<body>

    <div class="page">

        <div class="container">


            {{-- =====================================
             HEADER
        ====================================== --}}

            <div class="top-header">

                <div class="brand-area">

                    <div class="brand-icon">
                        ↗
                    </div>

                    <div class="heading">

                        <h1>
                            Login History
                        </h1>

                        <p>
                            Monitor and review your account authentication activity
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('dashboard') }}"
                    class="dashboard-btn">
                    ← Dashboard
                </a>

            </div>


            {{-- =====================================
             STATISTICS
        ====================================== --}}

            @php

            $totalRecords = $loginLogs->total();

            $successCount = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )
            ->where('status', 'success')
            ->count();

            $failedCount = \App\Models\LoginLog::where(
            'user_id',
            auth()->id()
            )
            ->where('status', 'failed')
            ->count();

            $otherCount = \App\Models\LoginLog::where(
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


                {{-- TOTAL --}}

                <div class="stat-card">

                    <div class="stat-icon blue-icon">
                        ◷
                    </div>

                    <div>

                        <div class="stat-label">
                            Total Attempts
                        </div>

                        <div class="stat-number">
                            {{ $totalRecords }}
                        </div>

                    </div>

                </div>


                {{-- SUCCESS --}}

                <div class="stat-card">

                    <div class="stat-icon green-icon">
                        ✓
                    </div>

                    <div>

                        <div class="stat-label">
                            Successful
                        </div>

                        <div class="stat-number">
                            {{ $successCount }}
                        </div>

                    </div>

                </div>


                {{-- FAILED --}}

                <div class="stat-card">

                    <div class="stat-icon red-icon">
                        !
                    </div>

                    <div>

                        <div class="stat-label">
                            Failed
                        </div>

                        <div class="stat-number">
                            {{ $failedCount }}
                        </div>

                    </div>

                </div>


                {{-- OTHER --}}

                <div class="stat-card">

                    <div class="stat-icon orange-icon">
                        ⚠
                    </div>

                    <div>

                        <div class="stat-label">
                            Other Events
                        </div>

                        <div class="stat-number">
                            {{ $otherCount }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================
             FILTER
        ====================================== --}}

            <div class="filter-card">

                <div class="filter-header">

                    <div class="filter-heading">

                        <div class="filter-icon">
                            ⚙
                        </div>

                        <div>

                            <div class="filter-title">
                                Filter Activity
                            </div>

                            <div class="filter-subtitle">
                                Narrow down login attempts
                            </div>

                        </div>

                    </div>


                    @php

                    $activeFilters = 0;

                    if (!empty($search)) {
                    $activeFilters++;
                    }

                    if (!empty($status)) {
                    $activeFilters++;
                    }

                    if (!empty($dateFrom)) {
                    $activeFilters++;
                    }

                    if (!empty($dateTo)) {
                    $activeFilters++;
                    }

                    @endphp


                    @if($activeFilters > 0)

                    <div class="active-filter">

                        {{ $activeFilters }}
                        Active
                        {{ $activeFilters === 1 ? 'Filter' : 'Filters' }}

                    </div>

                    @endif

                </div>


                <form
                    method="GET"
                    action="{{ route('login.history') }}"
                    class="filters">

                    {{-- SEARCH --}}

                    <div class="input-box">

                        <span>
                            🔍
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            class="search"
                            placeholder="Search IP address or browser...">

                    </div>


                    {{-- STATUS --}}

                    <select name="status">

                        <option value="">
                            All Status
                        </option>

                        <option
                            value="success"
                            {{ ($status ?? '') === 'success' ? 'selected' : '' }}>
                            ✓ Success
                        </option>

                        <option
                            value="failed"
                            {{ ($status ?? '') === 'failed' ? 'selected' : '' }}>
                            ✕ Failed
                        </option>

                        <option
                            value="expired"
                            {{ ($status ?? '') === 'expired' ? 'selected' : '' }}>
                            ⚠ Expired
                        </option>

                        <option
                            value="already_used"
                            {{ ($status ?? '') === 'already_used' ? 'selected' : '' }}>
                            ◷ Already Used
                        </option>

                        <option
                            value="rate_limited"
                            {{ ($status ?? '') === 'rate_limited' ? 'selected' : '' }}>
                            ⚡ Rate Limited
                        </option>

                    </select>


                    {{-- FROM --}}

                    <input
                        type="date"
                        name="date_from"
                        value="{{ $dateFrom ?? '' }}">


                    {{-- TO --}}

                    <input
                        type="date"
                        name="date_to"
                        value="{{ $dateTo ?? '' }}">


                    {{-- FILTER --}}

                    <button
                        type="submit"
                        class="btn filter-btn">
                        🔍 Filter
                    </button>


                    {{-- RESET --}}

                    <a
                        href="{{ route('login.history') }}"
                        class="btn reset-btn">
                        ↻ Reset
                    </a>

                </form>

            </div>


            {{-- =====================================
             TABLE
        ====================================== --}}

            <div class="table-card">


                <div class="table-top">

                    <div class="table-heading">

                        <h2>
                            Authentication Activity
                        </h2>

                        <p>
                            All login attempts associated with your account
                        </p>

                    </div>


                    <div class="records-count">

                        {{ $totalRecords }}
                        {{ $totalRecords == 1 ? 'Record' : 'Records' }}

                    </div>

                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    IP Address
                                </th>

                                <th>
                                    Browser / Device
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Date & Time
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse($loginLogs as $log)

                            <tr>


                                {{-- IP --}}

                                <td>

                                    <span class="ip">

                                        {{ $log->ip_address ?? 'Unknown' }}

                                    </span>

                                </td>


                                {{-- DEVICE --}}

                                <td>

                                    <div class="device-wrapper">

                                        <div class="device-icon">
                                            ◉
                                        </div>

                                        <div class="device">

                                            {{ $log->user_agent ?? 'Unknown Device' }}

                                        </div>

                                    </div>

                                </td>

                                {{-- STATUS --}}

                                <td>

                                    @if($log->status === 'success')

                                    <span class="badge success">

                                        <span class="dot"></span>

                                        Successful

                                    </span>

                                    @elseif(in_array(
                                    $log->status,
                                    [
                                    'expired',
                                    'already_used',
                                    'rate_limited'
                                    ]
                                    ))

                                    <span class="badge warning">

                                        <span class="dot"></span>

                                        {{ $log->status_label }}

                                    </span>

                                    @else

                                    <span class="badge danger">

                                        <span class="dot"></span>

                                        {{ $log->status_label }}

                                    </span>

                                    @endif

                                </td>


                                {{-- DATE --}}

                                <td>

                                    <div class="date">

                                        {{ $log->created_at?->format(
                                        'd M Y, h:i A'
                                    ) }}

                                    </div>

                                </td>


                            </tr>

                            @empty


                            <tr>

                                <td colspan="4">

                                    <div class="empty">

                                        <div class="empty-icon">
                                            ◷
                                        </div>

                                        <h3>
                                            No Login Activity Found
                                        </h3>

                                        <p>
                                            No login attempts match your current filters.
                                        </p>

                                    </div>

                                </td>

                            </tr>


                            @endforelse


                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}

                @if($loginLogs->hasPages())

                <div class="pagination">

                    <div class="pagination-info">
                        Showing
                        <strong>{{ $loginLogs->firstItem() }}</strong>
                        to
                        <strong>{{ $loginLogs->lastItem() }}</strong>
                        of
                        <strong>{{ $loginLogs->total() }}</strong>
                        records
                    </div>

                    <div class="pagination-buttons">

                        {{-- Previous --}}

                        @if ($loginLogs->onFirstPage())

                        <span class="page-btn disabled">
                            ←
                        </span>

                        @else

                        <a
                            href="{{ $loginLogs->previousPageUrl() }}"
                            class="page-btn">
                            ←
                        </a>

                        @endif


                        {{-- Page Numbers --}}

                        @foreach ($loginLogs->getUrlRange(1, $loginLogs->lastPage()) as $page => $url)

                        @if ($page == $loginLogs->currentPage())

                        <span class="page-btn active">
                            {{ $page }}
                        </span>

                        @else

                        <a
                            href="{{ $url }}"
                            class="page-btn">
                            {{ $page }}
                        </a>

                        @endif

                        @endforeach


                        {{-- Next --}}

                        @if ($loginLogs->hasMorePages())

                        <a
                            href="{{ $loginLogs->nextPageUrl() }}"
                            class="page-btn">
                            →
                        </a>

                        @else

                        <span class="page-btn disabled">
                            →
                        </span>

                        @endif

                    </div>

                </div>

                @endif


            </div>


        </div>

    </div>

</body>

</html>