<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();
                return redirect()->back()->withErrors('Your account has been disabled. Please contact the administrator.');
            }

            if ($user->role == 'tenant') {
                if ($user->expiration_date->isPast()) {
                    Auth::logout();
                    return redirect()->back()->withErrors('Your subscription has expired.');
                }
                $subdomain = $user->subdomain;
                return redirect()->to("http://{$subdomain}.readsphere.com:8000/admin/dashboard")->with('success', 'Login successful!');
            }

            if ($user->role == 'landlord') {
                return redirect()->route('landlord.dashboard.index')->with('success', 'Login successful!');
            }

            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors('Invalid credentials.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Logout successful!');
    }
}
