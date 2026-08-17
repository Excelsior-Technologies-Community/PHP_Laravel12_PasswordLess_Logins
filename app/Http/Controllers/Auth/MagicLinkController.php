<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MagicLinkMail;
use App\Models\LoginLog;
use App\Models\MagicLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class MagicLinkController extends Controller
{
    /**
     * Show the passwordless login form.
     */
    public function showLoginForm()
    {
        return view('auth.magic-login');
    }

    /**
     * Send a magic login link to the user's email.
     */
    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = strtolower(trim($request->email));

        /*
        |--------------------------------------------------------------------------
        | Rate Limiting
        |--------------------------------------------------------------------------
        |
        | Allow maximum 3 magic-link requests per email + IP address
        | within one hour.
        |
        */

        $rateLimitKey = 'magic-login:' . $email . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {

            $seconds = RateLimiter::availableIn($rateLimitKey);

            LoginLog::create([
                'email' => $email,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'rate_limited',
            ]);

            return back()
                ->withErrors([
                    'email' => 'Too many login requests. Please try again in '
                        . ceil($seconds / 60)
                        . ' minutes.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Record Attempt
        |--------------------------------------------------------------------------
        */

        RateLimiter::hit($rateLimitKey, 3600);

        try {

            /*
            |--------------------------------------------------------------------------
            | Remove Existing Active Magic Links
            |--------------------------------------------------------------------------
            */

            MagicLink::where('email', $email)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->delete();

            /*
            |--------------------------------------------------------------------------
            | Generate New Magic Link
            |--------------------------------------------------------------------------
            */

            $magicLink = MagicLink::generateToken($email);

            /*
            |--------------------------------------------------------------------------
            | Send Email
            |--------------------------------------------------------------------------
            */

            Mail::to($email)->send(
                new MagicLinkMail($magicLink)
            );

            return back()->with(
                'success',
                'Magic login link has been sent to your email!'
            );

        } catch (\Exception $e) {

            Log::error(
                'Magic link send failed: ' . $e->getMessage(),
                [
                    'email' => $email,
                    'ip' => $request->ip(),
                ]
            );

            LoginLog::create([
                'email' => $email,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'failed',
            ]);

            return back()
                ->withErrors([
                    'email' => 'Failed to send magic link. Please try again.',
                ])
                ->withInput();
        }
    }

    /**
     * Verify magic link and authenticate the user.
     */
    public function verifyLogin(Request $request, $token)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Find Token
            |--------------------------------------------------------------------------
            |
            | We intentionally don't filter by used/expired here.
            | This allows us to record the exact reason for failure.
            |
            */

            $magicLink = MagicLink::where('token', $token)->first();

            /*
            |--------------------------------------------------------------------------
            | Token Does Not Exist
            |--------------------------------------------------------------------------
            */

            if (!$magicLink) {

                LoginLog::create([
                    'email' => 'unknown',
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'status' => 'invalid',
                ]);

                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' =>
                            'Invalid or expired magic link. Please request a new one.',
                    ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Token Already Used
            |--------------------------------------------------------------------------
            */

            if ($magicLink->used) {

                LoginLog::create([
                    'magic_link_id' => $magicLink->id,
                    'email' => $magicLink->email,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'status' => 'already_used',
                ]);

                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' =>
                            'This magic link has already been used. Please request a new one.',
                    ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Token Expired
            |--------------------------------------------------------------------------
            */

            if ($magicLink->expires_at->isPast()) {

                LoginLog::create([
                    'magic_link_id' => $magicLink->id,
                    'email' => $magicLink->email,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'status' => 'expired',
                ]);

                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' =>
                            'This magic link has expired. Please request a new one.',
                    ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Find or Create User
            |--------------------------------------------------------------------------
            */

            $user = User::firstOrCreate(
                [
                    'email' => $magicLink->email,
                ],
                [
                    'name' => explode('@', $magicLink->email)[0],
                    'password' => Hash::make(Str::random(40)),
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Mark Magic Link as Used
            |--------------------------------------------------------------------------
            */

            $magicLink->update([
                'used' => true,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Login User
            |--------------------------------------------------------------------------
            */

            Auth::login($user, true);

            /*
            |--------------------------------------------------------------------------
            | Regenerate Session
            |--------------------------------------------------------------------------
            */

            $request->session()->regenerate();

            /*
            |--------------------------------------------------------------------------
            | Record Successful Login
            |--------------------------------------------------------------------------
            */

            LoginLog::create([
                'user_id' => $user->id,
                'magic_link_id' => $magicLink->id,
                'email' => $magicLink->email,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'success',
            ]);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {

            Log::error(
                'Magic link verification failed: ' . $e->getMessage(),
                [
                    'token' => $token,
                    'ip' => $request->ip(),
                ]
            );

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Login failed. Please try again.',
                ]);
        }
    }
}