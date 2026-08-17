<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->is_admin) {
            abort(403, 'You are not authorized to access this page.');
        }

        if (!auth()->user()->is_active) {
            auth()->logout();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Your account has been deactivated.',
                ]);
        }

        return $next($request);
    }
}
