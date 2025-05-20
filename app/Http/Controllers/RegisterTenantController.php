<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\TenantRegisteredMail;

class RegisterTenantController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'         => 'required|string|max:255',
                'email'        => 'required|email|unique:users,email',
                'subdomain'    => 'required|string|max:10',
                'subscription' => 'required|in:free,pro',
            ]);
            
            $randomDigits = mt_rand(10000000, 99999999);
            $generatedPassword = "READ_{$randomDigits}_SPHERE";
            $domain = $request->subdomain . '.readsphere.com:8000';
            $subscription = $request->subscription;
            $expiration_date = $subscription === 'free' ? now()->addDays(3) : now()->addDays(30);

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'subdomain'    => $request->subdomain,
                'password'     => bcrypt($generatedPassword),
                'subscription' => $request->subscription,
                'role'         => 'tenant',
                'expiration_date' => $expiration_date,
            ]);
    
            $tenant = Tenant::create([
                'name' => $request->name,
            ]);
    
            $tenant->domains()->create([
                'domain' => $request->subdomain,
            ]);
    
            $user->tenants()->attach($tenant->id);

            event(new Registered($user));

            try {
                Mail::to($user->email)->send(new TenantRegisteredMail($user, $generatedPassword, $subscription, $domain));
            } catch (\Exception $mailEx) {
                Log::error('Mail sending failed: ' . $mailEx->getMessage());
                return redirect()->route('register')->withErrors('Something went wrong while registering the tenant.');
            }
        
            return redirect()->route('login')->with('success', 'Tenant registered successfully!');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Tenant registration failed: ' . $e->getMessage());
            return redirect()->route('register')->withErrors('Something went wrong while registering the tenant.');
        }
    }
}
