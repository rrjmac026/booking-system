<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        // Get the current full domain and build a dynamic redirect URI
        $redirectUrl = request()->getSchemeAndHttpHost() . '/auth/google/callback';

        return Socialite::driver('google')
            ->redirectUrl($redirectUrl) // Dynamically set the callback URI
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Use the dynamic redirect again to match the original
            $redirectUrl = request()->getSchemeAndHttpHost() . '/auth/google/callback';

            $googleUser = Socialite::driver('google')
                ->redirectUrl($redirectUrl)
                ->stateless() // Optional, use if session issues arise
                ->user();

            $student = Students::where('email', $googleUser->email)->first();

            if (!$student) {
                return redirect('/welcome')->withErrors('Student does not exist.');
            }

            Auth::guard('students')->login($student);

            return redirect()->route('user.borrow.index')->with('success', 'Login successfully!');
        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect('/welcome')->withErrors('Login failed');
        }
    }

    public function logout()
    {
        Auth::guard('students')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/welcome')->with('success', 'Logged out successfully.');
    }
}
