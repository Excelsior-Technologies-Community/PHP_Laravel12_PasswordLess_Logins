<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    /**
     * Display authenticated user's login history.
     */
    public function index(Request $request)
    {
        $loginLogs = $request->user()
            ->loginLogs()
            ->latest('created_at')
            ->paginate(10);

        return view('auth.login-history', compact('loginLogs'));
    }
}