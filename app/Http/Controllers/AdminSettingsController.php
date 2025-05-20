<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $color_hex = User::find(Auth::id())?->color_hex;
        return view("tenant.admin.settings", compact('color_hex'));
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        $user = User::find(Auth::id());
        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['error' => 'Current password is incorrect.']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();
        return back()->with('success', 'Password changed successfully.');
    }

    public function customize(Request $request)
    {
        $request->validate([
            'color_hex' => 'nullable|string',
            'logo' => 'nullable|file|image|max:2048',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        if ($user->subscription === 'free') {
            return back()->withErrors(['error' => 'Customization is only available for pro users.']);
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $user->subdomain . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->logo_name = $filename;
        }

        if ($request->filled('color_hex')) {
            $user->color_hex = $request->color_hex;
        }

        $user->save();

        return back()->with('success', 'Settings updated successfully.');
    }

    public function pro(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:500',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        if ($user->subscription === 'pro') {
            return back()->with('info', 'You already have a pro subscription.');
        }

        if ($request->amount >= 500) {
            $user->subscription = 'pro';
            $user->save();
            return back()->with('success', 'Subscription upgraded to pro.');
        }

        return back()->withErrors(['error' => 'Insufficient amount.']);
    }
}
