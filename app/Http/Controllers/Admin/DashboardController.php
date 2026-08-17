<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalUsers = User::count();

        $activeUsers = User::where('is_active', true)->count();

        $inactiveUsers = User::where('is_active', false)->count();

        $totalAttempts = LoginLog::count();

        $successfulLogins = LoginLog::where(
            'status',
            'success'
        )->count();

        $failedAttempts = LoginLog::where(
            'status',
            '!=',
            'success'
        )->count();

        $todayLogins = LoginLog::where(
            'status',
            'success'
        )
            ->whereDate('created_at', $today)
            ->count();

        $todayFailed = LoginLog::where(
            'status',
            '!=',
            'success'
        )
            ->whereDate('created_at', $today)
            ->count();

        $recentLogs = LoginLog::with('user')
            ->oldest('created_at')
            ->limit(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'activeUsers',
                'inactiveUsers',
                'totalAttempts',
                'successfulLogins',
                'failedAttempts',
                'todayLogins',
                'todayFailed',
                'recentLogs'
            )
        );
    }
}
