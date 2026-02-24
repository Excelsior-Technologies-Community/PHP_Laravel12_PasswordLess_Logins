<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MagicLink;
use App\Mail\MagicLinkMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MagicLinkController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.magic-login');
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            // Delete any existing unused tokens for this email
            MagicLink::where('email', $request->email)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->delete();

            // Create magic link token
            $magicLink = MagicLink::generateToken($request->email);

            // Send email with magic link
            Mail::to($request->email)->send(new MagicLinkMail($magicLink));

            return back()->with('success', 'Magic login link has been sent to your email!');
            
        } catch (\Exception $e) {
            Log::error('Magic link send failed: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send magic link. Please try again.']);
        }
    }

    public function verifyLogin($token)
    {
        try {
            $magicLink = MagicLink::where('token', $token)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->first();

            if (!$magicLink) {
                return redirect()->route('login')
                    ->withErrors(['email' => 'Invalid or expired magic link. Please request a new one.']);
            }

            // Mark token as used
            $magicLink->update(['used' => true]);

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $magicLink->email],
                [
                    'name' => explode('@', $magicLink->email)[0],
                    'password' => Hash::make(Str::random(40)) // Generate a strong random password
                ]
            );

            // Log in the user
            Auth::login($user, true);

            // Regenerate session for security
            request()->session()->regenerate();

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            Log::error('Magic link verification failed: ' . $e->getMessage());
            return redirect()->route('login')
                ->withErrors(['email' => 'Login failed. Please try again.']);
        }
    }
}